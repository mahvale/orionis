<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Response;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ForumController extends Controller
{
     public function index($courseId)
    {
         $forums = Forum::where('course_id', $courseId)
        ->with(['posts' => function($query) {
            $query->with('responses')->orderBy('created_at', 'desc');
        }])
        ->orderBy('created_at', 'desc') // Sort forums if needed
        ->get();
    
    return view('forums.index', compact('forums'));
    }

    public function store(Request $request, $courseId)
    {
        $request->validate(['content' => 'required']);
        $forum = Forum::where('course_id', $courseId)->first();
         $user = auth()->user(); 
        
        $classroomName = $user->professor ? 1 : 0;
        $profName = $user->professor ? "Professeur" : "Eleves";

         $post = new Post();
         $post->content = $request->content;
         $post->forum_id = $forum->id;
         $post->user_id = auth()->id(); // ou un autre moyen d'obtenir l'utilisateur
         $post->is_professor = $classroomName; // ou un autre moyen d'obtenir l'utilisateur
         $post->save();

        return response()->json(['content' => $post->content,'profName' => $profName]);
    }

    public function respond(Request $request, $postId)
    {
            $response = new Response();
            $response->content = $request->content;
            $response->post_id = $postId;
            $response->user_id = auth()->id(); // ou un autre moyen d'obtenir l'utilisateur
            $response->save();

    return response()->json(['content' => $response->content, 'user' => ['name' => $response->user->name]]);
    }

            public function markResponseCorrect(Request $request, $responseId)
        {
            $response = Response::findOrFail($responseId);
            $response->is_correct = true;
            $response->save();

            return response()->json(['status' => 'marked_correct']);
        }

        public function markResponseIncorrect(Request $request, $responseId)
        {
            $response = Response::findOrFail($responseId);
            $response->is_correct = false;
            $response->save();

            return response()->json(['status' => 'marked_incorrect']);
        }


        public function like(Request $request, $postId)
    {
        $like = Like::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'likable_id' => $postId,
                'likable_type' => Post::class,
            ],
            ['is_like' => true]
        );

        return response()->json(['status' => 'liked']);
    }

 public function dislike(Request $request, $postId)
{
    Like::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'likable_id' => $postId,
            'likable_type' => Post::class,
        ],
        ['is_like' => false]
    );

    return response()->json(['status' => 'disliked']);
}


public function upload(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'file' => 'nullable|required|file|mimes:jpg,jpeg,png,pdf,docx,pptx,pub,txt,xlsx|max:2048',
        'course_id' => 'required', // Ensure the forum exists
    ]);
 
    // Handle the file upload
    $filePath = null;
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('uploads', 'public');
    }

        if ($request->hasFile('file')) {
        $imageName = time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('uploads/posts'), $imageName);
    }
      $user = auth()->user(); 
      $forum = Forum::where('course_id', $request->input('course_id'))->first();
      $classroomName = $user->professor ? 1 : 0;
    // Create the new post
    Post::create([
        'content' => $request->input('comment'),
        'is_professor' => $classroomName, // Adjust according to your logic
        'forum_id' => $forum->id,
        'user_id' => auth()->id(), // Current authenticated user
        'file_path' => $imageName,
        'extension' => $request->file('file')->getClientOriginalExtension(),
    ]);

    return response()->json(['success' => 'Post created successfully!']);
}

public function fetchPosts($courseId)
{
    $forums = Forum::where('course_id', $courseId)->with('posts.responses')->get();
    return response()->json($forums);
}

 }


 
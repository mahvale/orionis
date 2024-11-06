<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Td;
use App\Models\Tp;
use App\Models\Post;
use App\Models\Forum;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $course_id = $request->input('course_id');
        $tab = $request->input('tab');  // Récupère l'onglet actif

        $results = [];

        // Filtre en fonction de l'onglet actif
        switch ($tab) {
            case 'courses-grid':
                $results = Chapter::with('materials')
                ->where('chapters.course_id',$course_id)
                ->where('title', 'LIKE', '%' . $query . '%')
                ->get();
                break;
            case 'courses-list':
               $results = Td::with('materials')
                ->where('chapters.course_id',$course_id)
                ->where('title', 'LIKE', '%' . $query . '%')
                ->get();
                break;
            case 'courses-tp':
               $results = Tp::with('materials')
                ->where('chapters.course_id',$course_id)
                ->where('title', 'LIKE', '%' . $query . '%')
                ->get();
                break;
            case 'courses-f':
                 $results = Forum::where('course_id', $course_id)
                     ->with('posts.responses')
                     ->where('content', 'LIKE', '%' . $query . '%')
                     ->orderBy('id','DESC')
                     ->get();
                break;
        }

        // Retourner une vue partielle pour mettre à jour le contenu de l'onglet
        return view('partials.search-results-' . $tab, compact('results'))->render();
    }
}

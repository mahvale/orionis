<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Classrooms;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfsController extends Controller
{
    // Afficher la liste des professeurs  
    public function index()
    {
        $professors = Professor::with('user')->get();
        $users = User::all();
        $classrooms = Classrooms::all();
        $courses  = Course::all();
        return view('admin.professors', compact('professors','users','classrooms','courses'));
    }

    // Ajouter un professeur (enregistrement dans un modal)
   public function store(Request $request)
{
    $request->validate([
        'is_permanent' => 'required|boolean',
        'email' => 'required|email',
        'user_id' => 'required',
        'classroom_id' => 'required|exists:classrooms,id',
        'course_id' => 'required|exists:courses,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]); 

    $filePath = null;
    if ($request->hasFile('image')) {
         $fileName = time() . '.' . $request->image->extension();
        $filePath = "uploads/profile_pictures/$fileName";
          $request->image->move(public_path('uploads/profile_pictures'), $fileName);
    }

     $user = User::create([
            'name' => $request->user_id,
            'classroom_id' => $request->classroom_id,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'avatar' => $filePath,
        ]);
 
    $professor = Professor::create([
        'is_permanent' => $request->is_permanent,
        'user_id' => $user->id,
        'images' => $filePath,
    ]);

    // Attribuer la classe et le cours au professeur
    $professor->classrooms()->attach($request->classroom_id);
    $professor->courses()->attach($request->course_id);

    return redirect()->route('profs_admin.index')->with('success', 'Professeur ajouté avec succès.');
}


    // Modifier un professeur (affichage dans un modal)
    public function update(Request $request, Professor $professor)
{
    $request->validate([
        'is_permanent' => 'required|boolean',
        'user_id' => 'required|exists:users,id',
        'classroom_id' => 'required|exists:classrooms,id',
        'course_id' => 'required|exists:courses,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($professor->images) {
            Storage::disk('public')->delete($professor->images);
        }
        $professor->images = $request->file('image')->store('images/professors', 'public');
    }

    $professor->update([
        'is_permanent' => $request->is_permanent,
        'user_id' => $request->user_id,
    ]);

    // Mettre à jour la classe et le cours
    $professor->classrooms()->sync($request->classroom_id);
    $professor->courses()->sync($request->course_id);

    return redirect()->route('profs_admin.index')->with('success', 'Professeur modifié avec succès.');
}


    // Supprimer un professeur
    public function destroy(Professor $professor)
    {
        if ($professor->images) {
            Storage::disk('public')->delete($professor->images);
        }
        $professor->delete();

        return redirect()->route('profs_admin.index')->with('success', 'Professeur supprimé avec succès.');
    }

    public function getCoursesByClassroom(Request $request)
    {
        $classroom_id = $request->classroom_id;

        // Récupérer les cours de la classe sélectionnée
        $courses = Course::where('classroom_id', $classroom_id)->get();

        // Retourner les cours au format JSON
        return response()->json($courses);
    }
}

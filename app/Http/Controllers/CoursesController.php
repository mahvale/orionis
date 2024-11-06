<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Classrooms;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classrooms::orderBy('created_at', 'desc')->get();
        $courses  = Course::orderBy('created_at', 'desc')->get();
        return view('admin.courses_admin', compact('courses','classrooms'));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'classroom_id' => 'required|exists:classrooms,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Limite de taille à 2MB
    ]);

    // Création du cours
    $course = new Course();
    $course->title = $request->input('title');
    $course->description = $request->input('description');
    $course->classroom_id = $request->input('classroom_id');

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/courses'), $imageName);
        $course->image = $imageName;
    }

    // Sauvegarde du cours dans la base de données
    $course->save();

    // Redirection après ajout avec message de succès
    return redirect()->route('courses_admin.index')->with('success', 'Cours ajouté avec succès.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'classroom_id' => 'required|exists:classrooms,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Limite de taille à 2MB
    ]);

    // Recherche du cours à mettre à jour
    $course = Course::findOrFail($id);
    $course->title = $request->input('title');
    $course->description = $request->input('description');
    $course->classroom_id = $request->input('classroom_id');

    // Gestion de l'image
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($course->image && file_exists(public_path('uploads/courses/' . $course->image))) {
            unlink(public_path('uploads/courses/' . $course->image));
        }

        // Sauvegarder la nouvelle image
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/courses'), $imageName);
        $course->image = $imageName;
    }

    // Sauvegarde des modifications
    $course->save();

    // Redirection après modification avec message de succès
    return redirect()->route('courses_admin.index')->with('success', 'Cours mis à jour avec succès.');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trouver la classe à supprimer
    $course = Course::findOrFail($id);

    // Supprimer l'image associée, si elle existe
    $imagePath = public_path('uploads/course/' . $course->name . '.jpg'); // Change l'extension si nécessaire
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Supprimer la classe
    $course->delete();

    // Redirection après suppression
    return redirect()->route('courses_admin.index')->with('success', 'Classe supprimée avec succès.');
    }

    
}

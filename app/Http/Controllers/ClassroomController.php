<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classrooms;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $classrooms = Classrooms::orderBy('created_at', 'desc')->get();
        return view('admin.classes', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Classrooms::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.classes')->with('success', 'Classe ajoutée avec succès');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image
    ]);

    // Créer une nouvelle classe
    $classroom = Classrooms::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Si une image est fournie
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Créer le nom du fichier avec le nom de la classe
        $filename = $classroom->name . '.' . $image->getClientOriginalExtension();

        // Enregistrer l'image dans le dossier public/classrooms
        $image->move(public_path('uploads/classrooms'), $filename);
    }

    return redirect()->route('classes.store')->with('success', 'Classe ajoutée avec succès');
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
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image
    ]);

    $classroom = Classrooms::findOrFail($id);

    // Mettre à jour les informations de la classe
    $classroom->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Si une image est fournie
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Créer le nom du fichier avec le nom de la classe
        $filename = $classroom->name . '.' . $image->getClientOriginalExtension();

        // Enregistrer l'image dans le dossier public/classrooms
        $image->move(public_path('uploads/classrooms'), $filename);
    }

    return redirect()->route('classes.index')->with('success', 'Classe modifiée avec succès');
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
    $classroom = Classrooms::findOrFail($id);

    // Supprimer l'image associée, si elle existe
    $imagePath = public_path('uploads/classrooms/' . $classroom->name . '.jpg'); // Change l'extension si nécessaire
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Supprimer la classe
    $classroom->delete();

    // Redirection après suppression
    return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
}

}

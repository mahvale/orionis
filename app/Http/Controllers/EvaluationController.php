<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer tous les chapitres avec leur cours associé
        $evaluations = Evaluation::with('course')->orderBy('created_at', 'desc')->get();
        $courses = Course::all(); // Si vous avez besoin d'afficher les cours dans la vue pour ajouter ou filtrer
        
        return view('admin.evaluations', compact('evaluations', 'courses'));
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
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $evaluation = new Evaluation();
        $evaluation->title = $request->title;
        $evaluation->course_id = $request->course_id;
        $evaluation->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/evaluations'), $fileName);
            $evaluation->image = $fileName;
        }

        $evaluation->save();

        return redirect()->route('evaluations.index')->with('success', 'Chapitre ajouté avec succès.');
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
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $chapter = Evaluation::findOrFail($id);
        $chapter->title = $request->title;
        $chapter->course_id = $request->course_id;
        $chapter->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($chapter->image) {
                Storage::delete(public_path('uploads/evaluations/' . $chapter->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/evaluations'), $fileName);
            $chapter->image = $fileName;
        }

        $chapter->save();

        return redirect()->route('evaluations.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Récupérer le chapitre par son ID
        $chapter = Evaluation::findOrFail($id);

        // Vérifier s'il a une image associée et la supprimer du stockage
        if ($chapter->image) {
            $imagePath = 'uploads/evaluations/' . $chapter->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        // Supprimer le chapitre
        $chapter->delete();

        // Rediriger avec un message de succès
        return redirect()->route('evaluations.index')->with('success', 'Chapitre supprimé avec succès.');
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Td;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TdController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $td = new Td();
        $td->title = $request->title;
        $td->course_id = $request->course_id;
        $td->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/td'), $fileName);
            $td->image = $fileName;
        }

        $td->save();

        return redirect()->route('td_admin.index')->with('success', 'Chapitre ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $td = Td::findOrFail($id);
        $td->title = $request->title;
        $td->course_id = $request->course_id;
        $td->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($td->image) {
                Storage::delete(public_path('uploads/td/' . $td->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/td'), $fileName);
            $td->image = $fileName;
        }

        $td->save();

        return redirect()->route('td_admin.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    public function index()
    {
        // Récupérer tous les chapitres avec leur cours associé
        $tds = Td::with('course')->orderBy('created_at', 'desc')->get();
        $courses = Course::all(); // Si vous avez besoin d'afficher les cours dans la vue pour ajouter ou filtrer
        
        return view('admin.td_admin', compact('tds', 'courses'));
    }

     public function destroy($id)
    {
        // Récupérer le chapitre par son ID
        $td = Td::findOrFail($id);

        // Vérifier s'il a une image associée et la supprimer du stockage
        if ($td->image) {
            $imagePath = 'uploads/td/' . $td->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        // Supprimer le chapitre
        $td->delete();

        // Rediriger avec un message de succès
        return redirect()->route('td_admin.index')->with('success', 'Chapitre supprimé avec succès.');
    }
}
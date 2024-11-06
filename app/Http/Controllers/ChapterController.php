<?php
namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $chapter = new Chapter();
        $chapter->title = $request->title;
        $chapter->course_id = $request->course_id;
        $chapter->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/chapters'), $fileName);
            $chapter->image = $fileName;
        }

        $chapter->save();

        return redirect()->route('chapitre.index')->with('success', 'Chapitre ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $chapter = Chapter::findOrFail($id);
        $chapter->title = $request->title;
        $chapter->course_id = $request->course_id;
        $chapter->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($chapter->image) {
                Storage::delete(public_path('uploads/chapters/' . $chapter->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/chapters'), $fileName);
            $chapter->image = $fileName;
        }

        $chapter->save();

        return redirect()->route('chapitre.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    public function index()
    {
        // Récupérer tous les chapitres avec leur cours associé
        $chapters = Chapter::with('course')->orderBy('created_at', 'desc')->get();
        $courses = Course::all(); // Si vous avez besoin d'afficher les cours dans la vue pour ajouter ou filtrer
        
        return view('admin.chapitre', compact('chapters', 'courses'));
    }

     public function destroy($id)
    {
        // Récupérer le chapitre par son ID
        $chapter = Chapter::findOrFail($id);

        // Vérifier s'il a une image associée et la supprimer du stockage
        if ($chapter->image) {
            $imagePath = 'uploads/chapters/' . $chapter->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        // Supprimer le chapitre
        $chapter->delete();

        // Rediriger avec un message de succès
        return redirect()->route('chapitre.index')->with('success', 'Chapitre supprimé avec succès.');
    }

    public function getMaterials(Chapter $chapter)
{
    // Retourner les matériaux liés au chapitre
    return response()->json([
        'materials' => $chapter->materials()->get()
    ]);
}

}

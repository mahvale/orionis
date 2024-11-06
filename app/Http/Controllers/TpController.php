<?php
namespace App\Http\Controllers;

use App\Models\Tp;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $Tp = new Tp();
        $Tp->title = $request->title;
        $Tp->course_id = $request->course_id;
        $Tp->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/tp'), $fileName);
            $Tp->image = $fileName;
        }

        $Tp->save();

        return redirect()->route('tp_admin.index')->with('success', 'Chapitre ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $Tp = Tp::findOrFail($id);
        $Tp->title = $request->title;
        $Tp->course_id = $request->course_id;
        $Tp->is_new = $request->is_new ? true : false;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($Tp->image) {
                Storage::delete(public_path('uploads/tp/' . $Tp->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/tp'), $fileName);
            $Tp->image = $fileName;
        }

        $Tp->save();

        return redirect()->route('tp_admin.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    public function index()
    {
        // Récupérer tous les chapitres avec leur cours associé
        $tps = Tp::with('course')->orderBy('created_at', 'desc')->get();
        $courses = Course::all(); // Si vous avez besoin d'afficher les cours dans la vue pour ajouter ou filtrer
        
        return view('admin.tp_admin', compact('tps', 'courses'));
    }

     public function destroy($id)
    {
        // Récupérer le chapitre par son ID
        $Tp = Tp::findOrFail($id);

        // Vérifier s'il a une image associée et la supprimer du stockage
        if ($Tp->image) {
            $imagePath = 'uploads/tp/' . $Tp->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        // Supprimer le chapitre
        $Tp->delete();

        // Rediriger avec un message de succès
        return redirect()->route('tp_admin.index')->with('success', 'Chapitre supprimé avec succès.');
    }
}
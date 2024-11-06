<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Tp;
use App\Models\Td;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Classrooms;
use App\Models\Exercise;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Storage;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $tps = Tp::all();  // Récupérer tous les TP
        $tds = Td::all();  // Récupérer tous les TD
        $evaluations = Evaluation::all();  // Récupérer tous les Evaluation
        $exercises = Exercise::all();  // Récupérer tous les TD
        $chapters = Chapter::all();  // Récupérer tous les Chapitres
        $classrooms = Classrooms::all();
        $materials = Material::with(['tp', 'td', 'chapter','evaluation'])->orderBy('created_at', 'desc')->get();
        return view('admin.materials_admin',compact('materials', 'tps', 'tds', 'chapters','classrooms','exercises','evaluations'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // evaluation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

public function store(Request $request)
{
    $material = new Material();
    $material->title = $request->input('title');
    $material->type = $request->input('type');
    // Gestion du fichier ou lien externe
    if ($request->input('link_type') === 'internal') {
        // Upload de fichier interne
           if ($request->hasFile('file')) {
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/materials'), $fileName);
        $material->file = $fileName;
        $material->external_file = 0;
    }
    } else {
        // Lien externe
        $material->file = $request->input('external_file');
        $material->external_file = 1;
    }

    // Association avec soit un chapter, un td, ou un tp evaluation
    $associationType = $request->input('association_type');
    if ($associationType === 'chapter') {
        $material->chapter_id = $request->input('chapter_id');
    } elseif ($associationType === 'td') {
        $material->td_id = $request->input('td_id');
    } elseif ($associationType === 'tp') {
        $material->tp_id = $request->input('tp_id');
    }
    elseif ($associationType === 'exercise') {
        $material->exercise_id = $request->input('exercise_id');
    }
    elseif ($associationType === 'evaluation') {
        $material->evaluation_id = $request->input('evaluation_id');
    }

    $material->save();

    return redirect()->back()->with('success', 'Matériel ajouté avec succès.');
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
       public function update(Request $request, Material $material)
    {
        $validatedData = $request->validate([
        'type' => 'required',
        'title' => 'required',
        'file' => 'nullable|file',
        'tp_id' => 'nullable|exists:tps,id',
        'td_id' => 'nullable|exists:tds,id',
        'chapter_id' => 'nullable|exists:chapters,id',
    ]);

    if ($request->hasFile('file')) {
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads/materials'), $fileName);
        $material->file = $fileName;
    }

    $material->update($request->except(['file']));
    
    return redirect()->route('materials_admin.index')->with('success', 'Matériel mis à jour avec succès');
    }

                public function destroy($id)
            {
                 $material = Material::findOrFail($id);

                 if ($material->file) {
            $imagePath = 'uploads/materials/' . $material->file;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }
                $material->delete();
                
                return redirect()->route('materials_admin.index')->with('success', 'Matériel supprimé avec succès');
            }

            public function getCoursesByClassroom($classroom_id)
            {
                $courses = Course::where('classroom_id', $classroom_id)->get();
                return response()->json($courses);
            }

             public function getCoursesByChapter($chapter_id)
            {
                $exercises = Exercise::where('chapter_id', $chapter_id)->get();
                return response()->json($exercises);
            }

            public function getMaterialsByCourse($course_id)
            {
                $tps = TP::where('course_id', $course_id)->get();
                $tds = TD::where('course_id', $course_id)->get();
                $chapters = Chapter::where('course_id', $course_id)->get();
                return response()->json([
                    'tps' => $tps,
                    'tds' => $tds,
                    'chapters' => $chapters,
                ]);
            }

   
}

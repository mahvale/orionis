<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Chapter;
use App\Models\Correction;

class ConrectionEvaluation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
         $exercises = Evaluation::with('course')->get(); // Récupérer les exercices avec leurs relations
         $corrections = Correction::Join("evaluations","evaluations.id","=","corrections.evaluation_id")->get(); // Récupérer les exercices avec leurs relations
         //dd($corrections);
        $chapters = Chapter::all();
        return view('admin.correction_evaluation', compact('exercises', 'chapters','corrections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'type' => 'required',
            'exercise_id' => 'required|exists:evaluations,id',
        ]);

    $correction = new Correction();
    $correction->title = $request->input('title');
    $correction->type = $request->input('type');
    $correction->evaluation_id = $request->input('exercise_id');
    $correction->is_new = $request->is_new ? true : false;
    // Gestion du fichier ou lien externe
   if ($request->hasFile('file')) {
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/corrections'), $fileName);
        $correction->file = $fileName;
    }

    // Association avec soit un chapter, un td, ou un tp


    $correction->save();

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

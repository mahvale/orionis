<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Exam::query();

        // Filtres de recherche
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->input('date'));
        }

        $exams = $query->orderBy('year', 'desc')->paginate(10);
        
        return view('admin.exam', compact('exams'));
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
            'category' => 'required',
            'year' => 'required',
            'date' => 'required',
            'file' => 'required',
        ]);

        $exam = new Exam();
        $exam->title = $request->title;
        $exam->category = $request->category;
        $exam->year = $request->year;
        $exam->date = $request->date;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/exams'), $fileName);
            $exam->file = $fileName;
        }

        $exam->save();

        return redirect()->route('exams.index')->with('success', 'exams ajouté avec succès.');
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

   public function search(Request $request)
{
    $year = $request->input('year');
    $category = $request->input('category');
    $date = $request->input('date');

    $exams = Exam::query();

    if ($year) {
        $exams->whereYear('date', $year);
    }

    if ($category) {
        $exams->where('category', $category);
    }

    if ($date) {
        $exams->whereDate('date', $date);
    }

    $exams = $exams->paginate(8);

    if ($request->ajax()) {
        return view('partials.exam_list', compact('exams'))->render();
    }

    return view('partials.exam_list', compact('exams'))->render();
}


}

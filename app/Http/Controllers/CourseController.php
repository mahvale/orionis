<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Rating;
use App\Models\Td;
use App\Models\Tp;
use App\Models\Exercise;
use App\Models\Evaluation;
use App\Models\Exam;

class CourseController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('title', 'LIKE', "%{$query}%")->pluck('title');
        return response()->json($courses);
    }
  
    public function search2(Request $request)
    {
        $query = $request->input('query');
        
        // Fetch courses based on the search query
         $user = auth()->user(); 
        $classroomName = $user->classroom ? $user->classroom->name : 'No Classroom Assigned';

        // Recherche des cours en fonction de la classe de l'élève et du mot-clé
        $courses = Course::where('classroom_id', $user->classroom_id)
            ->where('title', 'like', '%' . strtolower($query) . '%')
            ->with('professors') // Charger les professeurs
            ->paginate(4); // Pagination à 4 résultats par page

        // Filtrer les professeurs titulaires pour chaque cours
        $titularProfessors = $courses->map(function ($course) {
            return [
                'course' => $course,
                'titular_professors' => $course->professors->where('is_permanent', true), // Filtrer les titulaires
            ];
        });

        // Return a view with the search results
        return view('partials.course-results',  [
            'titularProfessors' => $titularProfessors,
            'courses' => $courses, // Passer la variable courses
            'classroomName' => $classroomName,
            'user' => $user,
            'totalResults' => Course::where('classroom_id', $user->classroom_id)
                ->where('title', 'like', '%' . $query . '%')
                ->count(), // Total des résultats
        ])->render();
    }


    public function show($id)
    {
   $course = Course::with([
    'chapters.materials', // Les matériaux associés aux chapitres
    'chapters.exercises.corrections', // Les corrections associées aux exercices des chapitres
    'materials', // Les matériaux associés directement au cours (via les chapitres)
    'exercises.corrections' // Les corrections associées aux exercices directement au cours (via les chapitres)
])->findOrFail($id);
   $cour = Course::find($id); 
   $chapitre = Chapter::where('course_id',$id)->get();
    $route = 'cour';
        return view('cours-show', compact('course','route','cour','chapitre'));
    }
 
     public function getRatingsByCourseTitle($courseTitle)
    {
        $results = User::select(
                'users.id as user_id', 
                'users.name as user_name', 
                'courses.id as course_id', 
                'courses.title as course_title', 
                'chapters.id as chapter_id', 
                'chapters.title as chapter_title', 
                \DB::raw('COUNT(ratings.id) as number_of_ratings')
            )
            ->leftJoin('ratings', 'users.id', '=', 'ratings.user_id')
            ->leftJoin('chapters', 'ratings.chapter_id', '=', 'chapters.id')
            ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
            ->where('courses.title', $courseTitle)
            ->groupBy('users.id', 'users.name', 'courses.id', 'courses.title', 'chapters.id', 'chapters.title')
            ->orderBy('users.id', 'DESC')
            ->get();

        return count($results);
    }


     public function getRatingsByCourseTitle_Moyenne($courseTitle)
    {
        $somme = 0;
        $countRating = $this->getRatingsByCourseTitle($courseTitle);
        $results = User::select(
                'users.id as user_id', 
                'users.name as user_name', 
                'courses.id as course_id', 
                'courses.title as course_title', 
                'chapters.id as chapter_id', 
                'chapters.title as chapter_title', 
                'ratings.rating as rating_rating', 
                \DB::raw('COUNT(ratings.id) as number_of_ratings')
            )
            ->leftJoin('ratings', 'users.id', '=', 'ratings.user_id')
            ->leftJoin('chapters', 'ratings.chapter_id', '=', 'chapters.id')
            ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
            ->where('courses.title', $courseTitle)
            ->groupBy('users.id', 'users.name', 'courses.id', 'courses.title', 'chapters.id', 'chapters.title','ratings.rating')
            ->orderBy('users.id', 'DESC')
            ->get();



            foreach ($results as $value) {
                $somme = $somme + $value->rating_rating;
            }

        return round($somme / 5);
    }
 
    public function fichier($pdf,$title)
    {
         $route = "cour";
         $file = $pdf;
         $title = $title;
         return view('fichier',compact('route','file','title'));
    }

     public function fichier_corrections($pdf,$title)
    {
         $route = "cour";
         $file = $pdf;
         $title = $title;
         return view('fichier_corrections',compact('route','file','title'));
    }

     public function fichier2($pdf1,$pdf2)
    {
         $route = "cour";
         $file1 = $pdf1;
         $file2 = $pdf2;
         return view('exercices',compact('route','file1','file2'));
    }

     public function fichier3($pdf1,$pdf2)
    {
         $route = "cour";
         $file1 = $pdf1;
         $file2 = $pdf2;
         return view('exams',compact('route','file1','file2'));
    }

    public function fichier_exercise($pdf,$title,$exercise)
    {
        $exercices = Exercise::find($exercise);
        //dd($exercices->corrections->first()->file);
         $route = "cour";
         $file = $pdf;
         $file2 = $exercices->corrections->first()->file;
         $title = $title;
         return view('fichier_exercise',compact('route','file','title','exercices','file2'));
    }

 public function fichier_exams($pdf,$title,$exercise)
    {
        $exams = Exam::find($exercise);
        //dd($exams->correction->first()->file);
         $route = "cour";
         $file = $pdf;
         $file2 = $exams->correction->first()->file;
         $title = $title;
         return view('fichier_exam',compact('route','file','title','exams','file2'));
    }

    public function fichier_external_file(Request $request)
{
    $file = urldecode($request->query('pdf'));
    $title = $request->query('title');
    $route = "cour";
    // Votre logique ici
    return view('fichier_external_file', compact('file', 'title','route'));
}


     public function exercices($pdf,$title,$correction)
    {
         $route = "cour";
         $file = $pdf;
         $title = $title;
         $correction = $correction;
         return view('exercices',compact('route','file','title','correction'));
    }

    public function filterChaptersByTrimestre(Request $request)
{
    // Récupérer le trimestre depuis la requête
    $trimestre = $request->input('trimestre');
    $course_id = $request->input('course_id');
    $menu_tabs = $request->input('menu_tabs');

    // Filtrer les chapitres par trimestre (par exemple, en fonction de la date de création)
     $chapters = Chapter::with('materials')
        ->where('trimestre', $trimestre)
        ->where('chapters.course_id',$course_id)
        ->get();

         $tds = Td::with('materials')
        ->where('trimestre', $trimestre)
        ->where('tds.course_id',$course_id)
        ->get();

         $evaluations = Evaluation::with('materials')
        ->where('trimestre', $trimestre)
        ->where('evaluations.course_id',$course_id)
        ->get();


         $tps = Tp::with('materials')
        ->where('trimestre', $trimestre)
        ->where('tps.course_id',$course_id)
        ->get();

    // Retourner une vue partielle avec les chapitres filtrés

        switch ($menu_tabs) {
            case 'cours':
                 return view('partials.chapters', compact('chapters','tds'));
                break;
            case 'td':
                 return view('partials.td', compact('chapters','tds'));
                break;
            case 'tp':
                return view('partials.tp', compact('chapters','tps'));
                break;
            case 'exercices':
                 return view('partials.exercices', compact('chapters','tds'));
                break;
            case 'evaluation':
                  return view('partials.evaluation', compact('chapters','tds','evaluations'));
                break;
            default:
                 return view('partials.chapters', compact('chapters','tds'));
        }
    return view('partials.chapters', compact('chapters','tds'));
}

}
 
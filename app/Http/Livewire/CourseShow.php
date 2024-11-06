<?php

namespace App\Http\Livewire;
use Parsedown;
use Livewire\Component;
use App\Models\Chapter;
use App\Models\Td;
use App\Models\Tp;
use App\Models\Forum;
use App\Models\User;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class CourseShow extends Component
{
     use WithPagination;
     public $course;
     public $cour; 
     public $chapitre;
     protected $paginationTheme = 'bootstrap';

    public function render(Request $request)
    {
        
        $chapters = Chapter::with('materials')
        ->where('chapters.course_id',$this->course->id)
        ->get();

         $tds = Td::with('materials')
        ->where('tds.course_id',$this->course->id)
        ->get();

        $tps = Tp::with('materials')
        ->where('tps.course_id',$this->course->id)
        ->get();
        
    $forums = Forum::where('course_id', $this->course->id)
    ->with('posts.responses')
    ->orderBy('id', 'DESC')
    ->paginate(5); // Par exemple, 5 forums par page

          $evaluations = Evaluation::where('course_id', $this->course->id)
         ->orderBy('id','DESC')
         ->get();

                // Récupérer le cours avec ses épreuves
                $course = Course::with(['exercises' => function($query) {
                    $query->with('corrections'); // Charger les corrections liées aux épreuves
                }])->find($this->course->id);

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

        return view('livewire.course-show',compact('chapters','tds','tps','forums','course','evaluations','exams'));
    }


    public function mount($course,$cour,$chapitre)
   {
       $this->chapitre = $chapitre;
       $this->course = $course;
       $this->cour = $cour;
   }
}

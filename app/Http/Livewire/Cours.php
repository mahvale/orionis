<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Rating;

class Cours extends Component
{
    use WithPagination;
 
    public $search = '';
    public $ratings;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = auth()->user(); 
        $classroomName = $user->classroom ? $user->classroom->name : 'No Classroom Assigned';


        // Recherche des cours en fonction de la classe de l'élève et du mot-clé
        $courses = Course::where('classroom_id', $user->classroom_id)
            ->where('title', 'like', '%' . strtolower($this->search) . '%')
            ->with('professors') // Charger les professeurs
            ->paginate(4); // Pagination à 4 résultats par page

        // Filtrer les professeurs titulaires pour chaque cours
        $titularProfessors = $courses->map(function ($course) {
            return [
                'course' => $course,
                'titular_professors' => $course->professors->where('is_permanent', true), // Filtrer les titulaires
            ];
        });



        return view('livewire.cours', [
            'titularProfessors' => $titularProfessors,
            'courses' => $courses, // Passer la variable courses
            'classroomName' => $classroomName,
            'user' => $user,
            'totalResults' => Course::where('classroom_id', $user->classroom_id)
                ->where('title', 'like', '%' . $this->search . '%')
                ->count(), // Total des résultats
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Réinitialiser la page à 1 lors de la recherche
    }
}
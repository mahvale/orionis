<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\BookController;
 use App\Http\Controllers\ChapterController;
 use App\Http\Controllers\TdController;
 use App\Http\Controllers\TpController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProfsController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ConrectionEvaluation;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|fichier_exams
*/
Route::get('/exams/search', [ExamController::class, 'search'])->name('exams.search');

Route::get('/exams/search', [ExamController::class, 'search'])->name('exams.search');

Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

Route::resource('materials_admin', MaterialController::class);
Route::resource('classes', ClassroomController::class);
Route::resource('courses_admin', CoursesController::class);

Route::resource('profs_admin', ProfsController::class);
Route::get('/courses/byClassroom', [ProfsController::class, 'getCoursesByClassroom'])->name('courses.byClassroom');

Route::get('/chapters/{chapter}/materials', [ChapterController::class, 'getMaterials']);
Route::resource('chapitre', ChapterController::class);
Route::resource('evaluations', EvaluationController::class);

Route::resource('exams', ExamController::class);

Route::resource('td_admin', TdController::class);
Route::resource('tp_admin', TpController::class);
Route::resource('exercises_admin', ExerciseController::class);
Route::resource('corrections_admin', CorrectionController::class);
Route::resource('corrections_evaluations', ConrectionEvaluation::class);


Route::get('/getCoursesByClassroom/{classroom_id}', [MaterialController::class, 'getCoursesByClassroom']);
Route::get('/getMaterialsByCourse/{course_id}', [MaterialController::class, 'getMaterialsByCourse']);
Route::get('/getCoursesByChapter/{chapter_id}', [MaterialController::class, 'getCoursesByChapter']);



Route::get('/exercice/{pdf}/{title}/{correction}', [CourseController::class, 'exercices']);
Route::get('/', function () {
    $route = "home";
    return view('welcome',compact('route'));
});

Route::get('/chatgpt', function () {
    $route = "home";
    return view('chatgpt',compact('route'));
});

Route::get('/propos', function () {
    $route ='about';
    return view('propos',compact('route'));
});


 Route::post('/upload', [ForumController::class, 'upload'])->name('upload');
 Route::get('/courses/{courseId}/forums/fetch', [ForumController::class, 'fetchPosts']);

// routes/web.php
Route::get('/search-courses', [CourseController::class, 'search'])->name('courses.search');
Route::get('/search2/courses2', [CourseController::class, 'search2'])->name('search2.courses2');

Route::post("search_matire/", [BookController::class,'search_matire'])->name('search_matire');
Route::get("search_maget/", [BookController::class,'search_maget'])->name('search_maget');

Route::get('/home-forum', function () {
    return view('forums.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('/courses', function () {
        $route = 'cour';
        return view('cours',compact('route'));
    })->name('courses.index');

      Route::get('/prepas', function () {
        $route = 'prepas';
        return view('prepas',compact('route'));
    })->name('courses.prepas');

        Route::get('/orientation', function () {
        $route = 'orientation';
        return view('orientation',compact('route'));
    })->name('courses.orientation');

    Route::get('/ratings/{title}', [CourseController::class, 'getRatingsByCourseTitle']);

 
   Route::get('/fichier/{pdf}/{title}', [CourseController::class, 'fichier']);

   Route::get('/fichier_corrections/{pdf}/{title}', [CourseController::class, 'fichier_corrections']);


   Route::get('/fichier2/{pdf1}/{pdf2}', [CourseController::class, 'fichier2']);
   Route::get('/fichier3/{pdf1}/{pdf2}', [CourseController::class, 'fichier3']);

   Route::get('/fichier_exercise/{pdf}/{title}/{exercise}', [CourseController::class, 'fichier_exercise']);
   Route::get('/fichier_exams/{pdf}/{title}/{exercise}', [CourseController::class, 'fichier_exams']);

   Route::get('/fichier_external_file', [CourseController::class, 'fichier_external_file']);


    Route::get('/ratings_moyenne/{title}', [CourseController::class, 'getRatingsByCourseTitle_Moyenne']);
    Route::get('/chapters/filter', [CourseController::class, 'filterChaptersByTrimestre']);


    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    Route::post('/submit-rating', [RatingController::class, 'store']);
    Route::post('/submit-ratingtd', [RatingController::class, 'ratingtd']);
    Route::post('/submit-ratingtp', [RatingController::class, 'ratingtp']);

    Route::get('/chapters/{id}', [RatingController::class, 'show']);
    Route::get('/reviewCount/{id}', [RatingController::class, 'reviewCount']);
    Route::get('/reviewCounttd/{id}', [RatingController::class, 'reviewCounttd']);
    Route::get('/reviewCounttp/{id}', [RatingController::class, 'reviewCounttp']);


    Route::get('/courses/{course}/forums', [ForumController::class, 'index']);
    Route::post('/courses/{course}/forums', [ForumController::class, 'store']);
    Route::post('/posts/{post}/respond', [ForumController::class, 'respond']);
    Route::post('/responses/{response}/mark', [ForumController::class, 'markCorrect'])->middleware('is_professor');

    Route::post('/posts/{postId}/like', [ForumController::class, 'like']);
    Route::post('/posts/{postId}/dislike', [ForumController::class, 'dislike']);
    Route::post('/responses/{responseId}/like', [ForumController::class, 'likeResponse']);
    Route::post('/responses/{responseId}/dislike', [ForumController::class, 'dislikeResponse']);

    Route::post('/responses/{responseId}/mark-correct', [ForumController::class, 'markResponseCorrect']);
    Route::post('/responses/{responseId}/mark-incorrect', [ForumController::class, 'markResponseIncorrect']);
});

Route::post('/chatbot', function (Illuminate\Http\Request $request) {
    // Clé API OpenAI
   $apiKey = env('OPENAI_API_KEY');
    
    // Contenu de la requête envoyé par l'utilisateur
    $userMessage = $request->input('message');

    // Appel à l'API OpenAI via Guzzle
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
    ])->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-3.5-turbo',  // Vous pouvez utiliser le modèle de votre choix
        'messages' => [
            ['role' => 'system', 'content' => 'You are a helpful assistant.'],
            ['role' => 'user', 'content' => $userMessage],
        ],
    ]);

    // Retourner la réponse sous forme de JSON
    return response()->json($response->json());
});

require __DIR__.'/auth.php';



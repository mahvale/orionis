<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Chapter;
use App\Models\Td;
use App\Models\Tp;

class RatingController extends Controller
{
   public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'chapter_id' => 'required|exists:chapters,id',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Vérifier si l'utilisateur a déjà donné son avis sur ce chapitre
    $existingReview = Rating::where('user_id', auth()->id())
                            ->where('chapter_id', $request->input('chapter_id'))
                            ->first();

    if ($existingReview) {
        // Si un avis existe, on met à jour l'évaluation
        $existingReview->update([
            'rating' => $request->input('rating'),
        ]);
        
        return response()->json([
            'message' => 'Votre avis a été mis à jour.',
            'review' => $existingReview,
        ]);
    } else {
        // Sinon, on crée un nouvel avis
        $review = Rating::create([
            'user_id' => auth()->id(),
            'chapter_id' => $request->input('chapter_id'),
            'rating' => $request->input('rating'),
        ]);

        return response()->json([
            'message' => 'Votre avis a été ajouté.',
            'review' => $review,
        ]);
    }
}


    public function ratingtd(Request $request)
    {
         // Validation des données
    $request->validate([
        'td_id' => 'required|exists:tds,id',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Vérifier si l'utilisateur a déjà donné son avis sur ce chapitre
    $existingReview = Rating::where('user_id', auth()->id())
                            ->where('td_id', $request->input('td_id'))
                            ->first();

    if ($existingReview) {
        // Si un avis existe, on met à jour l'évaluation
        $existingReview->update([
            'rating' => $request->input('rating'),
        ]);
        
        return response()->json([
            'message' => 'Votre avis a été mis à jour.',
            'review' => $existingReview,
        ]);
    } else {
        // Sinon, on crée un nouvel avis
        $review = Rating::create([
            'user_id' => auth()->id(),
            'td_id' => $request->input('td_id'),
            'rating' => $request->input('rating'),
        ]);

        return response()->json([
            'message' => 'Votre avis a été ajouté.',
            'review' => $review,
        ]);
    }
    }

    public function ratingtp(Request $request)
    {
         // Validation des données
    $request->validate([
        'tp_id' => 'required|exists:tps,id',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Vérifier si l'utilisateur a déjà donné son avis sur ce chapitre
    $existingReview = Rating::where('user_id', auth()->id())
                            ->where('tp_id', $request->input('tp_id'))
                            ->first();

    if ($existingReview) {
        // Si un avis existe, on met à jour l'évaluation
        $existingReview->update([
            'rating' => $request->input('rating'),
        ]);
        
        return response()->json([
            'message' => 'Votre avis a été mis à jour.',
            'review' => $existingReview,
        ]);
    } else {
        // Sinon, on crée un nouvel avis
        $review = Rating::create([
            'user_id' => auth()->id(),
            'tp_id' => $request->input('tp_id'),
            'rating' => $request->input('rating'),
        ]);

        return response()->json([
            'message' => 'Votre avis a été ajouté.',
            'review' => $review,
        ]);
    }
    }

    public function show($chapterId)
    {
        $chapter = Chapter::with('ratings')->findOrFail($chapterId);
         $html='';
        $averageRating = $chapter->ratings->avg('rating');
        $reviewCount = $chapter->ratings->count();

        if(round($averageRating) >= 5){
           for ($i = 0; $i < 5; ++$i) {
               $html .='<span class="text-warning"><i class="fa fa-star"></i></span>';
           }
        }else {
             for ($i = 0; $i < round($averageRating); ++$i) {
               $html .='<span class="text-warning"><i class="fa fa-star"></i></span>';
           }
        }

        return $html;
    }

     public function reviewCount($chapterId)
    {
        $chapter = Chapter::with('ratings')->findOrFail($chapterId);
         $html='';
        $averageRating = $chapter->ratings->avg('rating');
        $reviewCount = $chapter->ratings->count();
        
        return $reviewCount;
    }

      public function reviewCounttd($chapterId)
    {
        $chapter = Td::with('ratings')->findOrFail($chapterId);
         $html='';
        $averageRating = $chapter->ratings->avg('rating');
        $reviewCount = $chapter->ratings->count();
        
        return $reviewCount;
    }

      public function reviewCounttp($chapterId)
    {
        $chapter = Tp::with('ratings')->findOrFail($chapterId);
         $html='';
        $averageRating = $chapter->ratings->avg('rating');
        $reviewCount = $chapter->ratings->count();
        
        return $reviewCount;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $duration = $request->duration;

        // Calcul de la date d'expiration
        switch ($duration) {
            case '1 day':
                $expiry = Carbon::now()->addDay();
                break;
            case '1 week':
                $expiry = Carbon::now()->addWeek();
                break;
            case '1 month':
                $expiry = Carbon::now()->addMonth();
                break;
            case '1 year':
                $expiry = Carbon::now()->addYear();
                break;
            case 'free':
                $expiry = Carbon::now()->addYear();
                break;
            default:
                return redirect()->back()->with('error', 'Durée invalide');
        }

        // Enregistre le paiement dans la base de données
        Payments::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'confirmed',
            'duration' => $duration
        ]);

        // Met à jour le statut du paiement de l'utilisateur
        $user->payment_status = 'paid';
        $user->payment_expiry = $expiry;
        $user->save();

        return redirect()->route('courses.index')->with('success', 'Paiement confirmé, vous avez accès aux cours.');
    }
}

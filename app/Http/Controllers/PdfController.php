<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Reservation;
use App\Models\Chambre;

class PdfController extends Controller
{
   public function generatePdf()
    {
        return view('printAdmin');
    }


    public function search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
             $reservations = Chambre::Join('block',"block.id","=","chambre.block")
         ->Join('residences',"residences.id","=","block.residence")
         ->Join('reservations',"chambre.id","=","reservations.room")
         ->Join('users',"users.id","=","reservations.studentId")
         ->whereBetween('reservations.date', [$startDate, $endDate])
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","reservations.isApproved as status","users.photo as photo","users.name as name","reservations.montant as montant","reservations.date as date","reservations.expire as expire","reservations.isApproved as status","reservations.id as idr"]);
    return view('admin.index',compact('reservations'));
        } else {
            // Gérer le cas où l'une ou les deux dates ne sont pas présentes
        }
    }
}

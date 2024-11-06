<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Residence;
use App\Models\Block;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;

class AdminControler extends Controller
{
     public function valider_residence(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'capacite' => 'required',
        ]);

             if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        $residence = Residence::create([
            'name'=>$request->name,
            'capacite'=>$request->capacite,
            'message'=>$request->message,
            'photo'=>$request->file,
        ]);
        return response()->json(['success' => 'Residence created successfully.']);
    }

           public function valider_block(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'capacite' => 'required',
        ]);

             if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        $residence = Block::create([
            'name'=>$request->name,
            'capacite'=>$request->capacite,
            'message'=>$request->message,
            'residence'=>$request->residence,
            'photo'=>$request->file,
        ]);
        return response()->json(['success' => 'Residence created successfully.']);
    }

     public function valider_chambre(Request $request)
    {
              $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'residence' => 'required',
            'block' => 'required',
            'prix' => 'required',
        ]);

             if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        $bloc = Block::find($request->block);
        $residence = Residence::find($bloc->residence);
        $chambre = Chambre::create([
            'name'=>$request->name,
            'capacite'=>$request->capacite,
            'message'=>$request->message,
            'photo'=>$request->file,
            'residence'=>$residence->id,
            'block'=>$request->block,
            'prix'=>$request->prix,
        ]);
        return response()->json(['success' => 'Residence created successfully.']);
    }
}

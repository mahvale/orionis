<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cahier;
use App\Models\Activite;
use App\Models\Periode;
class PageController extends Controller
{
        public function index(){
             return view('index');
        }

        public function saveActivitesLundi(){
             $activite = Activite::create([]);
        }

        public function showActivite(Request $request){

            $months = ["janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Julliet", "Aout", "Septembre",
            "Octobre", "Novembre", "Decembre"
        ];

            $htmlperiodes = '';
            $periode = Periode::whereRaw("mois = $request->mois")->whereRaw("debut <= $request->jour AND fin >= $request->jour ")->get();
            $htmlperiodes = "Semaine du ". $periode[0]->debut. " au ". $periode[0]->fin."  ".$months[$request->mois].' / '.$request->year;
            session(['periode' => $htmlperiodes]);
                 return $htmlperiodes;
            }  

        public function saveCahier(Request $request){
           
           $value = session('prof');
           $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'cour' => 'required',
        ]);

         if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        Cahier::create([
            'titre' => $request->titre,
            'cour' => $request->cour,
            'img' => $request->photo,
            'id_p' => $value->id,
        ]);
  
        return response()->json(['success' => 'Cahier created successfully.']);
    }

    public function uploadFile(Request $request){

         $data = array();

         $validator = Validator::make($request->all(), [
              'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
         ]);

         if ($validator->fails()) {

              $data['success'] = 0;
              $data['error'] = $validator->errors()->first('file');// Error response

         }else{
              if($request->file('file')) {

                   $file = $request->file('file');
                   $filename = time().'_'.$file->getClientOriginalName();

                   // File extension
                   $extension = $file->getClientOriginalExtension();

                   // File upload location
                   $location = 'files';

                   // Upload file
                   $file->move($location,$filename);
             
                   // File path
                   $filepath = url('files/'.$filename);

                   // Response
                   $data['success'] = 1;
                   $data['message'] = 'Uploaded Successfully!';
                   $data['filepath'] = $filepath;
                   $data['extension'] = $extension;
              }else{
                   // Response
                   $data['success'] = 2;
                   $data['message'] = 'File not uploaded.'; 
              }
         }

         return $filename;
    }

}

//
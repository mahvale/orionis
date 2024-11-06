<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Residence;
use App\Models\Block;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NomDuMail;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
       
    }

        public function selectblock(Request $request)
    {   
        $html='';
        $blocks = Block::where('residence',$request->residence)->get();
        $residence = Residence::where('id',$request->residence)->first();

        $html .= '<div class="col-lg-12" style=""><div class="blog-item set-bg" data-setbg=""> <img style="width: 100%;height:100%" src="http://127.0.0.1:8080/files/'.$residence->photo.'"><div class="bi-text"><span class="b-tag">'.$residence->capacite.'</span><h4><a href="detail-block/'.$residence->id.'">'.$residence->name.'</a></h4><div class="b-time"><i class="icon_clock_alt"></i> '.$residence->created_at.'</div></div></div></div>';
        return response()->json(['residence' => $html,'blocks'=>$blocks]);
    }

    public function add_reservation(Request $request)
    {
        $user = $request->session()->get('user');
        $reservation = Reservation::create([
            'room' => $request->chambre,
            'studentId' => $user->id,
        ]);

         return response()->json($reservation);
    }

        public function show_block_residence(Request $request)
    {
        $blocs = Block::where('residence',$request->id_residence)->get();
        return response()->json($blocs);
    }

     public function detail_chambre(Request $request,$id)
    {
       $user = $request->session()->get('user');
        $route = 'chambre'; 
        $users = User::all();
        $block = Block::where('id',$id)->first(); 
          $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where('block',$id)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre"]); 
         return view('chambre-detail',compact('user','route','users','chambres','block'));
    }

    public function residence(Request $request)
    {
        $user = $request->session()->get('user');
        $route = 'residence'; 
        $users = User::all();  
        $residences = Residence::all();  
        return view('admin.residence',compact('user','route','users','residences'));
    }

      public function residences(Request $request)
    {
        $user = $request->session()->get('user');
        $route = 'residence'; 
        $users = User::all();  
        $res = Residence::all();
        $blocks = Block::all();  
        return view('user.residence',compact('user','route','users','res','blocks'));
    }

      public function reservation(Request $request)
    {
        $user = $request->session()->get('user');
        $route = 'reservation'; 
        $users = User::all();  
        $blocks = Block::all();  
        $residences = Residence::all();  
         $chambres = Chambre::Join('block',"block.id","=","chambre.block")
         ->Join('residences',"residences.id","=","block.residence")
         ->Join('reservations',"chambre.id","=","reservations.room")
         ->Join('users',"users.id","=","reservations.studentId")
         ->where('users.id',$user->id)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","reservations.isApproved as status"]);
         return view('reservations',compact('user','route','users','chambres','residences','blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        
    }

     public function show_block(Request $request,$id)
    {
        $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $blocks = Block::where("residence",$id)->get();
         $res = Residence::where("id",$id)->get();  
         return view('admin.block',compact('user','route','users','blocks','res'));
    }

     public function show_block2(Request $request,$id)
    {
        $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $blocks = Block::where("residence",$id)->get();
         $res = Residence::where("id",$id)->get();  
         return view('user.blocks',compact('user','route','users','blocks','res'));
    }

        public function show_chambre_residense(Request $request,$id)
    {
        $user = $request->session()->get('user');  
        $route = 'chambre';
        $res = Residence::where("id",$id)->get();  
        $blocks = Block::leftJoin('residences','block.residence','=','residences.id')->where('block.residence',$id)->get();  
        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where('chambre.residence',$id)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence"]);   
    return view('admin.chambre',compact('user','route','chambres','res','blocks'));
    }





      public function block(Request $request)
    {
         $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $blocks = Block::all();
         $res = Residence::all();  
         return view('admin.block',compact('user','route','users','blocks','res'));
    }

        public function blocks(Request $request)
    {
         $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $blocks = Block::all();
         $res = Residence::all();  
         return view('user.blocks',compact('user','route','users','blocks','res'));
    }

         public function detail_block(Request $request,$idr)
    {
         $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $residences = Block::where('id',$idr)->get();
         $res = Residence::all();  
         return view('block',compact('user','route','users','residences','res'));
    }

         public function detail_block2(Request $request,$idr)
    {
         $user = $request->session()->get('user');
         $route = 'block'; 
         $users = User::all();  
         $residences = Block::where('id',$idr)->get();
         $res = Residence::all();  
         return view('user.blocks',compact('user','route','users','residences','res'));
    }

    /**
     * Store a newly created responseJSON.message "SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'photo' at row 1 (SQL: insert into `users` (`name`, `tel`, `sexe`, `photo`, `email`, `filiere`, `password`, `updated_at`, `created_at`) values (orionis mah, 652105979, F, 1711976837_Logo-UY1-removebg-preview.png, mahvale@gmail.com, ict401, 123456789, 2024-04-01 13:07:31, 2024-04-01 13:07:31))"
 resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|min:5',
            'sexe' => 'required',
            'tel' => 'required|min:9|unique:users',
            'email' => 'required|unique:users',
            'filiere' => 'required',
            'passe' => 'required|min:5',
            'matricule' => 'required|min:7',
            'niveau' => 'required',
            'Prenom' => 'required',
            'date' => 'required',
            'lieu' => 'required',
            'actuelle' => 'required',
            'lieu_parents' => 'required',
            'confirm_passe' => 'required',
        ]);

             if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

            if ($request->passe !== $request->confirm_passe) {
            return response()->json([
                        'error' => 'verifier vos mot de passe'
                    ]);
        }

        $user = User::create([
            'name'=>$request->nom,
            'tel'=>$request->tel,
            'sexe'=>$request->sexe,
            'photo'=>$request->file,
            'email'=>$request->email,
            'filiere'=>$request->filiere,
            'matricule'=>$request->matricule,
            'niveau'=>$request->niveau,
            'password'=>$request->passe,    
            'Prenom'=>$request->Prenom, 
            'date'=>$request->date, 
            'lieu'=>$request->lieu, 
            'actuelle'=>$request->actuelle, 
            'lieu_parents'=>$request->lieu_parents, 
        ]);
        $request->session()->put('my_session','my_session');
        $request->session()->put('user',$user);
        return response()->json(['success' => 'User created successfully.']);
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

 
   

     public function login(Request $request)
    {
       $user = User::where('email',$request->email)->where('password',$request->passe)->first();
       if ($user) {
            $request->session()->put('my_session','my_session');
            $request->session()->put('user',$user);
           return response()->json($user);
       } else {
           return response()->json(['error' => 'User created successfully.']);
       }
       return response()->json($user);
    }

   

     public function select_residence_chambre(Request $request)
    {
        $blocks = Block::where('residence',$request->residence)->get();  
        return response()->json($blocks);
    }

    /**
     * Remove destroy the specified resource from storage. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
  

    public function search_room(Request $request,$idr,$idb)
    {
        $user = $request->session()->get('user');  
        $route = 'chambre';
        $residences = Residence::all();  
        $blocks = Block::all();  

        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where('block.id',$idb)
         ->where('residences.id',$idr)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre"]);
         return view('chambre',compact('user','route','chambres','residences','blocks'));
    }

    public function chambre(Request $request)
    {
        $user = $request->session()->get('user');  
        $route = 'chambre';
        $res = Residence::all();  
        $blocks = Block::all();  
        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence","chambre.prix as chambre_prix"]);   
    return view('admin.chambre',compact('user','route','chambres','res','blocks'));
    }


    public function show_chambre(Request $request,$id)
    {
        $user = $request->session()->get('user');  
        $route = 'chambre';
        $res = Residence::all();  
        $blocks = Block::where("id",$id)->get();  
        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where("block",$id)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence"]);   
    return view('admin.chambre',compact('user','route','chambres','res','blocks'));
    }

     public function show_chambre2(Request $request,$id)
    {
        $user = $request->session()->get('user');  
        $route = 'chambre';
        $res = Residence::all();  
        $blocks = Block::where("id",$id)->get();  
        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where("block",$id)
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence"]);   
    return view('user.index',compact('user','route','chambres','res','blocks'));
    }

    public function logout(Request $request)
    {
        $request->session()->remove('my_session');
        $request->session()->remove('user');
       // $request->session()->clear();
        return view('login');
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

    public function destroy($id)
    {
        $element = Residence::find($id);

        if ($element) {
            $element->delete();
            return response()->json(['success' => 'Element deleted successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

     public function destroy_block($id)
    {
        $element = Block::find($id);

        if ($element) {
            $element->delete();
            return response()->json(['success' => 'Element deleted successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

    public function edit($id)
    {
        $element = Residence::find($id);

        if ($element) {
            return response()->json(['element' => $element]);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

    public function update(Request $request, $id)
    {
        $element = Residence::find($id);

        if ($element) {
            $element->name = $request->input('name');
            $element->capacite = $request->input('capacite');
            $element->message = $request->input('message');
            $element->save();
            return response()->json(['success' => 'Element updated successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

      public function update_r(Request $request)
    {
        $id = $request->input('id');
        $element = Residence::find($id);

        if ($element) {
            $element->name = $request->input('name');
            $element->capacite = $request->input('capacite');
            $element->message = $request->input('message');
            $element->photo = $request->input('file');
            $element->save();
            return response()->json(['success' => 'Element updated successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }


    public function edit_block($id)
    {
        $element = Block::find($id);

        if ($element) {
            return response()->json(['element' => $element]);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

     public function update_b(Request $request)
    {
        $id = $request->input('id');
        $element = Block::find($id);

        if ($element) {
            $element->name = $request->input('name');
            $element->capacite = $request->input('capacite');
            $element->message = $request->input('message');
            $element->photo = $request->input('file');
            $element->save();
            return response()->json(['success' => 'Element updated successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

public function edit_chambre($id)
    {
        $element = Chambre::find($id);

        if ($element) {
            return response()->json(['element' => $element]);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }


       public function update_c(Request $request)
    {
        $id = $request->input('id');
        $element = Chambre::find($id);

        if ($element) {
            $element->name = $request->input('name');
            $element->capacite = $request->input('capacite');
            $element->message = $request->input('message');
            $element->photo = $request->input('file');
            $element->save();
            return response()->json(['success' => 'Element updated successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }

     public function destroy_chambre($id)
    {
        $element = Chambre::find($id);

        if ($element) {
            $element->delete();
            return response()->json(['success' => 'Element deleted successfully.']);
        }

        return response()->json(['error' => 'Element not found.'], 404);
    }
     public function room(Request $request,$id)
    {
        $res = Residence::all();  
        $blocks = Block::all();  
        $user = $request->session()->get('user'); 
        $chambre = Chambre::find($id);
        $prix_chambre = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where('prix',$chambre->prix)->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence","chambre.prix as chambre_prix","chambre.message as contenu"]);
       
        $chambres = Chambre::leftJoin('block',"block.id","=","chambre.block")
         ->leftJoin('residences',"residences.id","=","block.residence")
         ->where('chambre.id',$id)
         ->first(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","residences.id as id_residence","chambre.prix as chambre_prix","chambre.message as contenu"]);  
        return view('user.room',compact('chambres','user','prix_chambre'));
       
    }

       public function payement($montant,$debut,$room,Request $request)
    {
        $user = $request->session()->get('user');
        $request->session()->put('debut', $debut);
        $request->session()->put('room', $room);
        $request->session()->put('montant', $montant);
        $token = Str::random(40);
        $data = array(
            'amount' => $montant,
            'currency_code' => 'XAF',
            'ccode' => 'CM',
            'lang' => 'en',
            'item_ref' => $token,
            'item_name' => 'ORIONIS',
            'description' => 'Description de nom produit',
            'email' => $user->email,
            'phone' => '+237652105979',
            'first_name' =>$user->name,
            'last_name' =>$user->name,
            'public_key' => 'PK_uDycEJ4g3K4w3k7v7k0T',
            'logo' => 'https://paymooney.com/images/logo_paymooney2.png',
            'environement' => 'test'
        );

    //Generer le Payment URL
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://www.paymooney.com/api/v1.0/payment_url',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => [],
      CURLOPT_POSTFIELDS => $data,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if ($response) {
         //Récuperer le payment URL
    $rep=json_decode($response);
    //dd($response);
    //Appel de l'API
     if($rep->response === "success"){
        return redirect()->away($rep->payment_url);
     }
     //return redirect($rep->payment_url);  //redirect permet de rediriger sur laravel. En Php pure, utilsez la fonction 'header'
    }else{
        return view('user.echec');
    }

    }

    public function success(Request $request)
    {
        $duree = $request->session()->get('debut');
        $room = $request->session()->get('room');
        $montant = $request->session()->get('montant');
        $user = $request->session()->get('user');
       $prix = (int)$montant * (int)$duree;
        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDay();

         Reservation::create([
          "room"=> $room,
          "studentId"=>$user->id,
          "isApproved" => 1,
          "date"=>$currentDateTime,
          "expire"=>$newDateTime,
          "duree"=>$duree,
          "montant"=>$prix,
        ]);
        return view("user.success");
    }

     public function cancel()
    {
        return view("user.echec");
    }

    public function reserver($montant,$debut,$room,Request $request)
    {
        $user = $request->session()->get('user');
        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDay();

        $request->session()->put('debut', $debut);
        $request->session()->put('room', $room);
        $request->session()->put('montant', $montant);

        $user_reservation = Reservation::where("studentId",$user->id)->get();
        
        if (count($user_reservation) > 0) {
            return back()->with('error', 'Chambre dejas reserve');
        } else {
        $m = (int) $montant * (int) $debut;
            Reservation::create([
          "room"=> $room,
          "studentId"=>$user->id,
          "isApproved" => 0,
          "date"=>$currentDateTime,
          "expire"=>$newDateTime,
          "duree"=>$debut,
          "montant"=>$m,
        ]);

             return view("user.success");
        }

        

        
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $results = Chambre::Join('block',"block.id","=","chambre.block")
         ->Join('residences',"residences.id","=","block.residence")
         ->Join('reservations',"chambre.id","=","reservations.room")
         ->Join('users',"users.id","=","reservations.studentId")
        ->where('users.name', 'LIKE', "%{$query}%")->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","reservations.isApproved as status","reservations.date as date","users.name as name","reservations.montant as montant","reservations.id as idr"]); // Remplacez 'name' par le champ que vous voulez rechercher

        return response()->json($results);
    }

    public function search2(Request $request)
    {
        $query = $request->get('query');
        $results = Chambre::Join('block',"block.id","=","chambre.block")
         ->Join('residences',"residences.id","=","block.residence")
         ->Join('reservations',"chambre.id","=","reservations.room")
         ->Join('users',"users.id","=","reservations.studentId")
         ->get(["chambre.name as nom_chambre","residences.name as nom_residence","block.name as num_block","chambre.capacite as chambre_capacite","chambre.photo as chambre_photo","block.id as id_block","chambre.id as id_chambre","reservations.isApproved as status","reservations.date as date","users.name as name","reservations.montant as montant","reservations.id as idr"]); 

        return response()->json($results);
    }


    

     public function signature(Request $request)
       {
           $request->validate([
               'signature' => 'required|string',
           ]);

           // Décoder l'image de la signature
           $image = str_replace('data:image/png;base64,', '', $request->input('signature'));
           $image = str_replace(' ', '+', $image);
           $imageName = 'signature_' . time() . '.png';

           // Enregistrer l'image sur le disque
           Storage::disk('public')->put($imageName, base64_decode($image));
          
          $reservation = Reservation::find($request->input('id'));
          if ($reservation->isApproved != 0 ) {
              //return back()->with('error', 'Chambre dejas reserve');
             return view('printAdmin',compact("reservation"));
          } else {
               $reservation->signature = $imageName;
               $reservation->isApproved = 1;
               $reservation->save();
                $request->session()->put('reservation',$reservation);

                $dompdf = new Dompdf();
                $html = view('printAdmin')->render();
                $dompdf->loadHtml($html); 
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
               // $dompdf->stream(); // Afficher le PDF dans le navigateur
                $user = User::find($reservation->studentId);
                 $pdfOutput = $dompdf->output();
                file_put_contents(public_path('pdf/'.$user->name.'.pdf'), $pdfOutput);
                    //$dompdf->stream(); 
                return redirect()->route('admin2')->with('valide', 'merci');
                //return view('printAdmin2',compact("reservation")); 
              //return view('printAdmin',compact("reservation"));
          }
        

           //return back()->with('success', 'Signature saved successfully');
       }


       public function annuler(Request $request)
       {
       
          
          $reservation = Reservation::find($request->input('idr'));
          if ($reservation->isApproved != 0) {
              return back()->with('error', 'Chambre dejas reserve');
          } else {
               $reservation->isApproved = 2;
               $reservation->save();
              return response()->json(['success' => 'Element deleted successfully.']);
          }
       
}
          public function search_chambre(Request $request)
            {
                $query = Chambre::query();

               if ($request->filled('capacite')) {
                    $query->where('capacite',$request->input('capacite'));
                }

                if ($request->filled('residence')) {
                    $query->where('residence',$request->input('residence'));
                }

                if ($request->filled('block')) {
                    $query->where('block', $request->input('block'));
                }

                 if ($request->filled('min')) {
                    $query->whereBetween('prix', [$request->input('min'), $request->input('max')]);
                }
                $user = $request->session()->get('user');  
                $route = 'chambre';
                $res = Residence::all();  
                $blocks = Block::all();  

                $results = $query->get();
         
                return view('search.results_chambre', compact('results',"res","blocks","user"));
            }


                public function envoyerEmail(Request $request)
    {
        
        $user = User::find(session('reservation')->studentId);
         
        Mail::to($user->email)->send(new NomDuMail());

        return redirect()->route('admin2')->with('success', 'merci');
    }
           
}

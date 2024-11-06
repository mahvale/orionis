<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Classe;
use App\Models\Matire;
use App\Models\BookComment;
use App\Models\Chapitre;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BookController extends Controller
{
    public function index($book)
    {
       $boo = Book::where('id',$book)->get();
       $books = Book::all();
       $bookComments = BookComment::where("book_id",$book)->get();
       //dd($boo);
       return view('book-single',compact("boo","books","bookComments"));
    }

    public function all(){
      $books = Book::all();
      $classes = Classe::all();
      $matieres = Matire::all();
      return view('books',compact('books','classes','matieres'));
    }

    public function seachBook(Request $request){
     // dd($request->book);
     $livre = BookComment::create(["nom"=>Auth::user()->name,"comment"=>$request->comment,"rate"=>$request->rate,"book_id"=>$request->book]);
     return redirect()->route('single-book',['book'=>$request->book]);
      
    }

    public function search_matire(Request $request)
    {

        $classes = Classe::where('id',Auth::user()->classe_id)->get();
        $nom = array();
        $html='';
        $term = $request->value;
        $data = Matire::leftJoin("concerners","matires.id","=","concerners.matire_id")
                                ->leftJoin("classes","classes.id","=","concerners.classe_id")
                                ->leftJoin("enseigners","classes.id","=","enseigners.classe_id")
                                ->leftJoin("professeurs","professeurs.id","=","enseigners.professeur_id")
                                ->where("code_classe",$classes[0]->code_classe)
                                ->where('nom_matiere', 'LIKE', '%' . $term . '%')->get();

        foreach ($data as $m) {
           $m_id = $this->count_chapitre($m->matire_id);
           $e_id = $this->count_eleves($m->classe_id);

            $html .='<div class="col-lg-12"><div class="singel-course mt-30"><div class="row no-gutters"> <div class="col-md-6"> <div class="thum"><div class="image"><img src="images/course/'.$m->images.'" alt="Course"></div><div class="price"><span> '.$m->code_classe.' </span></div></div></div><div class="col-md-6"><div class="cont"><ul><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li> <i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li></ul><span>('.$m_id.')Chapitres)</span><br><a href="single/'.$m->matire_id.'"><h4 class="text-uppercase">matiere  '.$m->nom_matiere.' </h4></a><div class="course-teacher"><div class="thum"><a href="#"><img src="images/teachers/'.$m->images_prof.' " alt="teacher"></a></div><div class="name"><a href="#" class="text-uppercase"><h6>Profs  '.$m->nom_prof.' </h6></a></div><div class="admin"><ul><li><a href="#"><i class="fa fa-user"></i><span>'.$e_id.'</span></a></li></ul></div></div></div></div></div></div></div>';
           
        }
   
        return response()->json(["html"=>$html]);
    }

     public function search_maget(Request $request)
    {
        $nom = array();
        $term = $request->input('term');
        $data = Matire::where('nom_matiere', 'LIKE', '%' . $term . '%')->get(['nom_matiere as label']);
        
        return response()->json($data);
    }

    public function count_chapitre($idm)
    {
        return Chapitre::where('matire_id',$idm)->count();
    }

   public function count_eleves($idc)
{
    return User::where('classe_id',$idc)->count();
}
}




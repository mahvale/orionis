<div>
   
       <section id="page-banner" class="pt-105 pb-110 bg_cover" dta-p="ggg" data-overlay="8" style="background-image: url(/uploads/classrooms/{{$classroomName}}.png)">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="page-banner-cont"> 
                          @auth <h2 style="font-family: Time New Roman">  {{ $user->name }}
                           <span style="color:#ffc600" >{{ $classroomName }}</span>  </h2>  @endauth
                           <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Cours  </li>
                               </ol>
                           </nav>
                       </div>  <!-- page banner cont  -->
                   </div>
               </div> <!-- row -->
           </div> <!-- container -->  
       </section> 
     
              <!--====== COURSES PART START ======-->
<section id="courses-part" class="pt-120 pb-120 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="courses-list-tab" data-bs-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false">
                                <i class="fa fa-th-list">&nbsp;&nbsp;Liste Cours</i> 
                            </a>
                        </li>
                        <li class="nav-item"> 
                         &nbsp;  &nbsp; <span style="font-family: Times New Roman">Affichage {{ $titularProfessors->count() }} sur {{ $totalResults }} résultats</span> 
                        </li>
                    </ul>

                    <div class="d-flex">
                        <form class="d-flex">
                            <input type="text" class="form-control me-2"  id="search-input" placeholder="Rechercher un cours...">

                            <button type="button" id="search-button" class="btn btn-primary ml-2">
                                <i class="fa fa-search"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                <div class="row">
                   @foreach($titularProfessors as $item)
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/uploads/courses/{{ $item['course']->image }}" class="img-fluid rounded-start" alt="Course">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-family: Time New Roman">{{ $item['course']->title }}</h5>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="d-flex me-3">
                                                    
                                                </div>
                                                <span class="avis" data-avis="{{ $item['course']->title }}" >&nbsp;&nbsp;({{ $item['course']->chapters->count() }} Chapitres)</span>
                                            </div>
                                            <p class="card-text" style="font-family: Time New Roman">{{ $item['course']->description }}</p>
                                            <a href="{{ route('courses.show', $item['course']->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye">&nbsp;Voir le cours</i>
                                            </a>
                                        </div>
                                        <div class="card-footer d-flex align-items-center">
                                            @foreach($item['titular_professors'] as $professor)
                                                <img src="{{$professor->images}}" class="rounded-circle me-2" alt="teacher" style="width: 40px; height: 40px;">
                                                <div>
                                                    <h6 style="font-family: Time New Roman" class="mb-0">{{ $professor->user->name }}</h6>
                                                    <small style="font-family: Time New Roman">&nbsp;&nbsp; Enseignant</small>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div> <!-- tab content -->

                <div class="d-flex justify-content-center align-items-center" style="">
            <div class="text-center">
                <nav aria-label="Page navigation">
                    {{ $courses->links() }} <!-- Liens de pagination -->
                </nav>
            </div>
        </div>


    </div> <!-- container -->
</section>
<!--====== COURSES PART END laravel ajouter la table proffesseur remarque les professeurs sont assoviers a la tables users . les proffesseurs donnent cours dans plusieurs salle de classe et a plusierus matieres parmis les proffesseur nous avons les proffesseur titulaires. voicis les tables dejas existants dans mon applis               . ======-->

       
   </div>
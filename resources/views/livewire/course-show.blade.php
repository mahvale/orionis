<div>
   <style>
/* Styles pour la barre des onglets */
.nav-pills {
    border-bottom: 2px solid #ddd;
    display: flex;
    justify-content: space-around;
    background-color: #f8f9fa;
}

.nav-item {
    position: relative;
}
 
.nav-link {
    padding: 15px 20px;
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
    color: #555; 
    transition: all 0.3s ease;
}

.nav-link:hover {
    color: #e0a800;
} 

.nav-link.active { 
    color: #e0a800;
    font-weight: bold;
}

.nav-link::after {
    content: '';
    display: block;
    width: 0;
    height: 3px;
    background: #e0a800;
    transition: width 0.3s;
    position: absolute;
    bottom: -2px;
    left: 0;
}

.nav-link.active::after {
    width: 100%;
}

.nav-link:hover::after {
    width: 100%;
}

/* Animation de transition entre les onglets */
.tab-pane {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.tab-pane.show.active {
    opacity: 1;
    transform: translateY(0);
}

/* Style pour les cartes des cours */
.card {
     transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
/* Pour un arrondi plus léger */
.rounded-sm {
    border-radius: 10px;
}

/* Amélioration de l'input de recherche */
.search-input {
    padding: 8px 15px;
    font-size: 14px;
    box-shadow: none;
    border: 1px solid #ccc; /* Optionnel : Légère bordure pour plus de visibilité */
    transition: border-color 0.3s ease;
}

.search-input:focus {
    border-color: #e0a800; /* Couleur de la bordure au focus */
    outline: none;
}

/* Style du bouton de recherche */
.search-button {
    padding: 8px 20px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #0056b3; /* Couleur survolée startd */ 
    border-color: #0056b3;
}
.star {
    font-size:10px;
    cursor: pointer;
    color: lightgray;
}

.star.selected {
    color: gold;
}


.startd {
    font-size:10px;
    cursor: pointer;
    color: lightgray;
}

.startd.selected {
    color: gold;
}

.startp {
    font-size:10px;
    cursor: pointer;
    color: lightgray;
}

.startp.selected {
    color: gold;
}

  .post {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #ffffff;
            transition: box-shadow 0.2s ease;
        }
        .post:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .post h5 {
            color: #e0a800;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

    .professor-response {
    background-color: #26465e; /* Light gray for professors */
    border-left: 4px solid #e0a800; /* Blue left border */
}

.student-response {
    background-color: #26465e; /* Slightly darker gray for students */
    border-left: 4px solid #28a745; /* Green left border */
}

.card {
    border-radius: 10px;
}

.card-body {
    padding: 20px;
}

.no-border {
    border: none !important;
    background: transparent; /* Optional: to make it appear flat */
}

.bg-success {
    background-color: #28a745 !important; /* Green background for correct */
}

.bg-danger {
    background-color: #dc3545 !important; /* Red background for incorrect */
}

.text-white {
    color: #fff !important; /* Ensure text is readable on colored backgrounds */
}

/* Add some responsiveness */
@media (max-width: 576px) {
    .card {
        margin: 10px 0; /* Adjust margins for small screens */
    }
}

#editor.dragging {
    border: 2px dashed #e0a800; /* Bordure bleue lorsque vous faites glisser un fichier */
}

.position-relative {
    display: flex;
    align-items: flex-start;
}

textarea {
    padding-left: 40px; /* Leave space for the icon */
}

.upload-icon {
    position: absolute;
    top:30px; /* Adjust this based on your textarea's padding */
    left: 10px; /* Adjust for spacing */
    cursor: pointer;
    color: #3aaae0; /* Optional: change the color */
    font-size:20px; /* Adjust icon size */
}

.upload-icon i {
    pointer-events: none; /* Prevent the icon from blocking clicks on the textarea */
}
@media (max-width: 768px) {
    /* Ajustement des onglets pour les petits écrans */
    .nav-pills {
        flex-wrap: wrap;
    }

    .nav-item {
        width: 100%;
        text-align: center;
    }

    /* Formulaire de recherche pour les petits écrans */
    .search-form {
        width: 100%;
    }

    .search-input {
        width: 80%;
    }

    .search-button-detail {
        width: 20%;
    }
}

.rating .star {
    color: #ccc; /* Couleur par défaut des étoiles startd */
    font-size: 24px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.rating .star:hover,
.rating .star:hover ~ .star {
    color: #f39c12; /* Couleur des étoiles au survol */
}

.rating .star.selected {
    color: #f39c12; /* Couleur des étoiles sélectionnées */
}

.rating .startd {
    color: #ccc; /* Couleur par défaut des étoiles startd */
    font-size: 24px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.rating .startd:hover,
.rating .startd:hover ~ .startd {
    color: #f39c12; /* Couleur des étoiles au survol */
}

.rating .startd.selected {
    color: #f39c12; /* Couleur des étoiles sélectionnées */
}

.rating .startp {
    color: #ccc; /* Couleur par défaut des étoiles startd */
    font-size: 24px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.rating .startp:hover,
.rating .startp:hover ~ .startp {
    color: #f39c12; /* Couleur des étoiles au survol */
}

.rating .startp.selected {
    color: #f39c12; /* Couleur des étoiles sélectionnées */
}

.submitRating {
    background-color: #f39c12;
    color: #fff;
    transition: background-color 0.3s ease;
}

.submitRating:hover {
    background-color: #e67e22; /* Changement de couleur au survol */
}


.submitRatingTd {
    background-color: #f39c12;
    color: #fff;
    transition: background-color 0.3s ease;
}

.submitRatingTd:hover {
    background-color: #e67e22; /* Changement de couleur au survol */
}

.submitRatingTp {
    background-color: #f39c12;
    color: #fff;
    transition: background-color 0.3s ease;
}

.submitRatingTp:hover {
    background-color: #e67e22; /* Changement de couleur au survol */
}

 /* Style pour le conteneur du dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Style pour le bouton du dropdown */
        .dropdown-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Style pour le contenu du menu */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
        }

        /* Style pour les éléments du menu */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #ddd;
        }

        /* Hover effect pour les éléments du menu */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Affiche le contenu lorsque le dropdown est activé */
        .dropdown.show .dropdown-content {
            display: block;
        }

    /* Styles de base pour l'icône en bas à droite */
           .chatbot-icon {
               position: fixed;
               bottom: 20px;
               right: 20px;
               background-color: #007bff;
               color: white;
               border-radius: 50%;
               width: 50px;
               height: 50px;
               display: flex;
               align-items: center;
               justify-content: center;
               font-size: 24px;
               cursor: pointer;
               box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
               transition: transform 0.3s;
           }
           .chatbot-icon:hover {
               transform: scale(1.1);
           }

</style>


<div>
   
       <section id="page-banner" class="pt-105 pb-110 bg_cover" dta-p="ggg" data-overlay="8" style="background-image: url(/uploads/courses/{{ $cour->image }})">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="page-banner-cont">
                         <h2 style="font-family: Times New Roman;" class="text-uppercase" > Cour de  <span style="color:#ffc600" >{{$cour->title}}</span>  </h2> 
                           
                           <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a style="font-family: Times New Roman;" href="/">Accueil</a></li>
                                   <li class="breadcrumb-item"><a style="font-family: Times New Roman;" href="/courses">Cours</a></li>
                                   <li class="breadcrumb-item active" style="font-family: Times New Roman;" aria-current="page">Cour-{{$cour->title}}  </li>
                               </ol>
                           </nav>
                       </div>  <!-- page banner cont -->
                   </div>
               </div> <!-- row -->
           </div> <!-- container -->  
       </section> 
    
              <!--====== COURSES PART START ======-->
<section id="courses-part" class="pt-120 pb-120 bg-light"> 
    <div class="container">
        <!--====== TABS MENUS ======-->
       <div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <!-- Onglets de navigation -->
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-tabs-menu="cours" id="courses-grid-tab" data-bs-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true">
                        <i class="fa fa-file-alt"></i> COURS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-list-tab" data-tabs-menu="td"  data-bs-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false">
                        <i class="fa fa-chalkboard-teacher"></i> TD
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-tp-tab" data-tabs-menu="tp"  data-bs-toggle="tab" href="#courses-tp" role="tab" aria-controls="courses-tp" aria-selected="false">
                        <i class="fa fa-flask"></i> TP
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-exams-tab" data-tabs-menu="exercices"  data-bs-toggle="tab" href="#courses-exams" role="tab" aria-controls="courses-exams" aria-selected="false">
                        <i class="fa fa-clipboard"></i> exercises
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="courses-exams-f" data-bs-toggle="tab" data-tabs-menu="forum"  href="#courses-f" role="tab" aria-controls="courses-f" aria-selected="false">
                       <i class="fa fa-comments"></i> FORUM
                    </a>
                </li>


                 <li class="nav-item">
                    <a class="nav-link" id="courses-exams-f" data-tabs-menu="evaluation"  data-bs-toggle="tab" href="#courses-ia" role="tab" aria-controls="courses-f" aria-selected="false">
                       <i class="fa fa-clipboard-list"></i> Evaluation
                    </a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" id="courses-exams-ep" data-tabs-menu="epreuves"  data-bs-toggle="tab" href="#courses-ep" role="tab" aria-controls="courses-f" aria-selected="false">
                      <i class="fa fa-folder-open">&nbsp; Voir</i> épreuves
                    </a>
                </li>
            </ul>

            <!-- Formulaire de recherche -->
            <div class="mt-3 mt-md-0 d-flex">
                <form class="d-flex search-form">
                    <input type="text" class="form-control me-2 rounded-sm search-input" id="search-input-detail" placeholder="Rechercher...">
                    <button style="height:33px;" type="button" id="search-button-detail" class="btn btn-primary rounded-sm search-button-detail ml-1">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--====== TABS MENUS  ======-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row" id="chapters-container">
                    <!-- Course Card -->
                    @forelse($chapters as $chapter)
                    <div class="col-lg-3 col-md-4 mb-2">
    <div class="card" style="border: none;">
        <img src="{{ asset('/uploads/chapters/' . $chapter->image) }}" class="card-img-top" alt="Chapter">
        <div class="card-body">
            <h5 class="card-title">{{ $chapter->title }}</h5>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $chapter->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRating = $chapter->ratings()->average('rating');
                        $totalRatings = $chapter->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRating ? number_format($averageRating, 1) : '0' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCount" data-chapterRating="{{ $chapter->id }}">&nbsp;&nbsp;({{ $totalRatings }} Avis)</span>
                </div>
            </div>
                
            <div style="display:flex;">
                @foreach ($chapter->materials as $material)
                    @if($material->type == 'video')
                          @if(!$material->external_file)
                            <button data-video-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>  
                          @endif
                           @if($material->external_file)
                        <button data-video-url="{{ $material->file }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                    @endif
                    @if($material->type == 'pdf')
                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $chapter->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                            <i class="fa fa-file-pdf">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'audio')
                        <button data-audio-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-audio-button ml-1">
                            <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="rating ml-2" data-chapter-id="{{ $chapter->id }}">
                <span data-value="1" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="5" class="star">&#9733;</span>
            </div>
            <button data-chatId="{{$chapter->id}}" data-selectedRating="0" class="btn btn-primary submitRating" style="font-family: 'Times New Roman'; border-radius: 2px; padding: 5px 15px;">
        <i class="fa fa-comment"></i> Avis
    </button>
        </div>
    </div>
</div>


                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun cours disponible pour cette lecons </p>
                    </div>
                   

                   @endforelse
                </div>
                <!-- end row -->
            </div>

            <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row" id="tds-container">
                    <!-- tds listes Card -->
                    
                    @forelse($tds as $td)
                    <div class="col-lg-3 col-md-4 mb-2">
    <div class="card" style="border: none;">
        <img src="{{ asset('/uploads/td/' . $td->image) }}" class="card-img-top" alt="td">
        <div class="card-body">
            <h5 class="card-title">{{ $td->title }}</h5>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $td->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRatingTd = $td->ratings()->average('rating');
                        $totalRatingsTd = $td->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRatingTd ? number_format($averageRatingTd, 1) : '0' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCounttd" style="" data-chapterRating="{{ $td->id }}">&nbsp;&nbsp;({{ $totalRatingsTd }} Avis)</span>
                </div>
            </div>
            <p class="card-text">Description du chapitre</p>

            <div style="display:flex;">
                @foreach ($td->materials as $material)
                    @if($material->type == 'video')
                          @if(!$material->external_file)
                            <button data-video-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>  
                          @endif
                        <button data-video-url="{{ asset($material->file) }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'pdf')
                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $td->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                            <i class="fa fa-file-pdf">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'audio')
                        <button data-audio-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-audio-button ml-1">
                            <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="rating ml-2" data-chapter-id="{{ $td->id }}">
                <span data-value="1" class="startd">&#9733;</span>
                <span data-value="2" class="startd">&#9733;</span>
                <span data-value="3" class="startd">&#9733;</span>
                <span data-value="4" class="startd">&#9733;</span>
                <span data-value="5" class="startd">&#9733;</span>
            </div>
            <button data-chatId="{{$td->id}}" data-selectedRating="0" class="btn btn-primary submitRatingTd" style="font-family: 'Times New Roman'; border-radius: 20px; padding: 5px 15px;">
        <i class="fa fa-comment"></i> Avis
    </button>
        </div>
    </div>
</div>


                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun td disponible pour cette lecons </p>
                    </div>

                   

                   @endforelse
                   
                </div>
            </div>

             <div class="tab-pane fade" id="courses-tp" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row" id="tps-container">
                    <!-- Tp list  Card -->
                    
                    @forelse($tps as $tp)
                    <div class="col-lg-3 col-md-4 mb-1">
                        <div class="card">
                           <img src="{{ asset('/uploads/tp/' . $tp->image) }}" style="height:100px;"  class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">{{$tp->title}} </h5>
                                <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $tp->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRatingTp = $tp->ratings()->average('rating');
                        $totalRatingsTp = $tp->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRatingTp ? number_format($averageRatingTp, 1) : '0' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCounttp" style="" data-chapterRating="{{ $tp->id }}">&nbsp;&nbsp;({{ $totalRatingsTp }} Avis)</span>
                </div>
            </div>
            <p class="card-text">Description du chapitre</p>

                                <div style="display:flex;">
                @foreach ($tp->materials as $material)
                    @if($material->type == 'video')
                          @if(!$material->external_file)
                            <button data-video-url="/uploads/materials/{{$material->file}}" data-patch="{{$material->id}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>  
                          @endif
                           @if($material->external_file)
                        <button data-video-url="{{ asset($material->file) }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                    @endif

                    @if($material->type == 'pdf')
                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $chapter->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                            <i class="fa fa-file-pdf">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'audio')
                        <button data-audio-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-audio-button ml-1">
                            <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                @endforeach
            </div>
                              
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                                <div class="rating" data-chapter-id="{{$tp->id}}" style="display: flex; gap: 5px;">
                                    <span data-value="1" class="startp">&#9733;</span>
                                    <span data-value="2" class="startp">&#9733;</span>
                                    <span data-value="3" class="startp">&#9733;</span>
                                    <span data-value="4" class="startp">&#9733;</span>
                                    <span data-value="5" class="startp">&#9733;</span>
                                </div>
                                <button data-chatId="{{$tp->id}}" data-selectedRating="0" class="btn btn-primary submitRatingTp" style="font-family: 'Times New Roman'; border-radius: 20px; padding: 5px 15px;">
                                    <i class="fa fa-comment"></i> Avis
                                </button>
                            </div>
                        </div>
                    </div>

                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun TP disponible pour cette lecons </p>
                    </div>
                   

                   @endforelse
                   
                </div>
            </div>


             <div class="tab-pane fade" id="courses-exams" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row">
                    <!-- epreuves list  Card -->
                   @forelse($course->exercises as $exercise)
                            <div class="col-lg-6">
                                   <div class="singel-event-list mt-30">
                                       <div class="event-thum">
                                           <img style="width: 100%;height:100px" src="{{ asset('uploads/exercises/' . $exercise->image) }}" alt="Event">
                                       </div>
                                       <div class="event-cont">
                                           <span><i class="fa fa-calendar"></i> {{ $exercise->created_at->diffForHumans()  }}</span>


                                            @foreach ($exercise->materials as $material)
                                                            <a data-pdf-url="{{ $material->file }}" data-pdf-idexercise="{{ $exercise->id }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $exercise->title }}" class="btn btn-outline-primary js-pdf-button-exercise">
                                                               <h4>{{ $exercise->title }} sur {{ $exercise->chapter->title }} </h4>
                                                            </a>
                                                    @endforeach
                                             @if($exercise->corrections->isNotEmpty())
                                            <p class="text-center" style="font-family: Time New Roman;">Correction disponible :</p>
                                                <a href="{{ asset($exercise->corrections->first()->file) }}" data-pdf-url="{{ $material->file }}" data-pdf-idexercise="{{ $exercise->id }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $exercise->title }}" style="font-family: Time New Roman;" class="btn btn-outline-primary js-pdf-button-exercise">
                                                Voir la correction</a>
                                             @else
                                                    <p class="text-center btn" style="font-family: Time New Roman;" >Pas de correction disponible</p>
                                                    @endif
                                                </div>
                                          
                                            
                                       </div>
                                   </div>

                                    @empty

                                        <div>
                                            <p style="font-family: Times New Roman;">Aucun Exercices disponible  </p>
                                        </div>

                                   @endforelse
                               </div>
                             
                </div>
                 

             <div class="tab-pane fade" id="courses-ep" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row">
                    
                    <div class="col-lg-8 col-md-4 mb-4">
                        <!-- <div class="dropdown">
                            <button onclick="toggleDropdown()" class="dropdown-btn">Dropdown Button</button>
                            <div class="dropdown-content">
                                <a href="#action1">Action 1</a>
                                <a href="#action2">Action 2</a>
                                <a href="#action3">Action 3</a>
                            </div>
                        </div> -->

<div class="container">
     <h4 class="my-1 ml-4" style="font-family: Times New Roman;text-transform : uppercase;">Épreuves de: {{$cour->title}}</h4>
    <!-- Filtres -->
    <form method="GET" action="" class="" >

                    <div style="display:flex;flex-direction: row;justify-content: center;align-items: center;">
                        
                        <div class="form-group mx-sm-2">
                            <label for="category" class="sr-only">Catégorie</label>
                            <select name="category" class="form-control">
                                <option value="">Catégorie</option>
                                <option value="autre">Autres établissements</option>
                                <option value="site">Epreuves Orionis</option>
                                <option value="officiel">Examens officiels</option>
                                <option value="blanc">Épreuves blanches</option>
                            </select>
                        </div>

                        <div class="form-group mx-sm-2">
                            <label for="year" class="sr-only">Année</label>
                            <input type="number" name="year" class="form-control" placeholder="Année" min="2000" max="{{ date('Y') }}">
                        </div>

                        <div class="form-group mx-sm-2">
                            <label for="date" class="sr-only">Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Date">
                        </div>

                        <button type="submit" class="btn btn-primary mx-sm-2">Rechercher</button>
                    </div>

                    </form>

                    <div class="row ml-4">
    @forelse($exams as $exam)
        <div class="col-lg-4 col-md-6 mt-2 mr-1">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <!-- Titre de l'examen -->
                    <h5 class="card-title font-weight-bold text-primary">{{ $exam->title }}</h5>

                    <!-- Description du chapitre -->
            @if($exam->category == 'site') <p class="card-text text-muted" style="font-size: 0.9rem;"> Épreuves Orionis  </p> @endif 
            @if($exam->category == 'autre') <p class="card-text text-muted" style="font-size: 0.9rem;">Autre Épreuves   </p> @endif 
            @if($exam->category == 'officiel') <p class="card-text text-muted" style="font-size: 0.9rem;"> Épreuves Examens  </p> @endif 
            @if($exam->category == 'blanc') <p class="card-text text-muted" style="font-size: 0.9rem;"> Épreuves blanches  </p> @endif 

                    <!-- Bouton d'action -->
                    <div class="mt-1">
                        <button style="font-family: Times New Roman; text-align: center;" data-pdf-url="{{ $exam->file }}" 
                                data-pdf-idexercise="{{ $exam->id }}" 
                                data-external_file="0" 
                                data-pdf-title="{{ $exam->title }}" 
                                class="btn btn-outline-primary js-pdf-exams-button btn-block btn-sm">
                            <i class="fa fa-file-pdf mr-2"></i> Épreuves
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p style="font-family: Times New Roman; text-align: center;">Aucune Epreuve disponible</p>
        </div>
    @endforelse
</div>



                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $exams->links() }}
                    </div>
                </div>
                    </div>
                   
                </div>
            </div>


            <div class="tab-pane fade" id="courses-f" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row" style="">
                    <!-- forum list  Card -->
                      <h4 class="my-1 ml-4" style="font-family: Times New Roman;text-transform : uppercase;">Forum pour le cours: {{$cour->title}}</h4>
                
                                  <div class="container" id="forum">
    @foreach($forums as $forum)
        @foreach($forum->posts as $post)
            <div class="card mb-4 border">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <p class="card-title" style="font-family: Times New Roman;">
                            {{ $post->content }} ({{ $post->is_professor ? 'Professeur' : $post->user->name }})
                        </p>
                        <span style="font-family: Times New Roman; float:right;">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    @if($post->file_path)
                        <p>Fichier joint :</p>
                        @php
                            $extension = $post->extension;
                        @endphp

                        <!-- Vérifiez l'extension et affichez le lien en conséquence -->
                        <div>
                            @if($extension === 'pdf')
                                <a href="{{ asset('storage/' . $post->file_path) }}" download class="btn btn-outline-primary mb-2">
                                    📄 Télécharger le fichier PDF
                                </a>
                            @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                <a href="{{ asset('storage/' . $post->file_path) }}" download class="btn btn-outline-info mb-2">
                                    🖼️ Télécharger l'image
                                </a>
                            @elseif($extension === 'doc' || $extension === 'docx')
                                <a href="{{ asset('storage/' . $post->file_path) }}" download class="btn btn-outline-success mb-2">
                                    📝 Télécharger le document Word
                                </a>
                            @elseif($extension === 'ppt' || $extension === 'pptx')
                                <a href="{{ asset('storage/' . $post->file_path) }}" download class="btn btn-outline-warning mb-2">
                                    🎞️ Télécharger la présentation PowerPoint
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $post->file_path) }}" download class="btn btn-outline-secondary mb-2">
                                    📁 Télécharger le fichier
                                </a>
                            @endif
                        </div>
                    @endif

                    <button class="btn btn-primary border-5 btn-sm show-responses mb-2" style="font-family: Times New Roman;text-transform: uppercase;font-size: 10px;">réponses</button>
                    <div class="responses" style="display: none;">
                        @foreach($post->responses as $response)
                            @php
                                $text = htmlspecialchars($response->content);
                            @endphp
                            <div class="border-left border-info pl-3 mb-2 {{ $response->is_correct === 1 ? 'text-success' : ($response->is_correct === 0 ? 'text-danger' : '') }}">
                                <p style="font-family: Times New Roman;" class="{{ $response->is_correct === 1 ? 'text-success' : ($response->is_correct === 0 ? 'text-danger' : 'text-dark') }}">
                                    {{ htmlspecialchars($text) }} ({{ $response->user->name }})  
                                    <span style="float:right;">{{ $response->created_at->diffForHumans() }}</span>
                                </p>

                                @if(auth()->user()->professor && $response->is_correct === null)
                                    <button data-responseId="{{ $response->id }}" class="btn btn-outline-success no-border mark-correct-button">✔️ Juste</button>
                                    <button data-responseId="{{ $response->id }}" class="btn btn-outline-danger no-border mark-incorrect-button">❌ Faux</button>
                                @endif
                            </div>
                        @endforeach
                        <form style="display: none;" action="{{ url('/posts/' . $post->id . '/respond') }}" method="POST" class="response-form">
                            @csrf
                            <textarea name="content" class="form-control mb-2" required placeholder="Votre réponse..."></textarea>
                            <button type="submit" class="btn btn-primary mb-2">Répondre</button>
                        </form>
                    </div>

                    <div class="mb-2">
                        <button data-postId="{{$post->id}}" class="btn btn-outline-success no-border like-button">👍 J'aime ({{$post->likes()->where('is_like', true)->count()}})</button>
                        <button data-postId="{{$post->id}}" class="btn btn-outline-danger no-border dislike-button">👎 Pas J'aime ({{$post->likes()->where('is_like', false)->count()}})</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>


                                        <form action="{{ url('/courses/' . $cour->id . '/forums') }}" method="POST" class="mb-3 col-lg-12 post-form">
                                            @csrf
                                            <div class="position-relative">
                                                <textarea name="content" id="content" class="form-control" placeholder="" rows="3"></textarea>
                                                <label for="file-upload" class="upload-icon" aria-label="Upload File">
                                                    <input type="file" id="file-upload" style="display: none;" />
                                                    <i class="fas fa-upload"></i>
                                                </label>
                                            </div>
                                            <button type="submit" style="font-family: Time New Roman;" class="btn btn-primary mt-2 text-uppercase">Posez Question</button>
                                        </form>

                                    </div>
                                    {{ $forums->links('pagination::bootstrap-4') }}
                                </div>



                                <!-- IA -->

         <div class="tab-pane fade" id="courses-ia" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row" id="evaluation-container" style="">


                    

                   @forelse($evaluations as $evaluation)
                    <div class="col-lg-3 col-md-4 mb-2">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evaluation->title }}</h5>

                            <div style="display:flex;">
                                @foreach ($evaluation->materials as $material)
                                    @if($material->type == 'video')
                                          @if(!$material->external_file)
                                            <button data-video-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                                        </button>  
                                          @endif
                                           @if($material->external_file)
                                        <button data-video-url="{{ $material->file }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                                            <i class="fa fa-play">&nbsp; {{ $material->type }}</i>
                                        </button> 
                                    @endif
                                    @endif
                                    @if($material->type == 'pdf')
                                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $evaluation->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                                            <i class="fa fa-file-pdf">&nbsp; {{ $material->type }}</i>
                                        </button>
                                    @endif

                                   @if($evaluation->corrections->isNotEmpty())
                                        <button data-pdf-url="{{ $evaluation->corrections->first()->file }}" data-external_file="0" data-pdf-title="{{ $evaluation->corrections->first()->title }}" class="btn btn-outline-primary btn-sm js-pdf-corrections-button ml-1">
                                            <i class="fa fa-headphones">&nbsp; correction </i>
                                        </button>
                                        </a>
                                    @else
                                       <br><button class="btn btn-outline-primary btn-sm ml-2" disabled style="font-family: Time New Roman;" class="ml-2">Pas de correction</button>
                                    @endif
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucune Evaluation disponible  </p>
                    </div>
                   

                   @endforelse
                                       
                </div>
                </div>

                                <!-- IA -->




        </div> <!-- tab content --> 

        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="Page navigation" id="navigation-t">
                   <ul class="pagination justify-content-center">
    <li class="page-item page-item-previous disabled">
        <a class="page-link page-link-previous" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <li class="page-item active"><a class="page-link trimestre-link" href="#" data-trimestre="1">1 TRIMESTRE</a></li>
    <li class="page-item"><a class="page-link trimestre-link" href="#" data-trimestre="2">2 TRIMESTRE</a></li>
    <li class="page-item"><a class="page-link trimestre-link" href="#" data-trimestre="3">3 TRIMESTRE</a></li>
    <li class="page-item page-item-next">
        <a class="page-link page-link-next" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
 
 
                </nav>
            </div>
        </div>
    </div> <!-- container -->
</section>
<!--====== COURSES PART END ======-->

       
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" id="file-input" accept="*/*" style="display: none;">
                <textarea id="comment" class="form-control" placeholder="message"></textarea>
                <div id="file-preview" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferme</button>
                <button type="button" class="btn btn-primary" id="send-btn">
                    <i class="fas fa-paper-plane"></i> Envoyer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML (ajouter quelque part dans votre page) -->
<div id="audioModal" class="modal fade" tabindex="-1" aria-labelledby="audioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="audioModalLabel">Lecture de l'audio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <audio id="audioPlayer" controls>
                    <source id="audioSource" src="" type="audio/mpeg">
                    Votre navigateur ne supporte pas l'élément audio.
                </audio>
            </div>
        </div>
    </div>
</div>

<!-- <div id="loader" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">OR</span>
    </div>
</div> -->


<input type="hidden" id="course_id" value="{{ $cour->id  }}">
<input type="hidden" id="menu_tabs" value="cours">

 <a href="/chatify" class="chatbot-icon">
    <i class="fas fa-user"></i>
</a>

<div id="loader"style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <img src="/images/output-onlinegiftools.gif" alt="Chargement..." />
</div>

<script>
    // Fonction pour afficher/masquer le dropdown
    function toggleDropdown() {
        document.querySelector(".dropdown").classList.toggle("show");
    }

    // Fermer le dropdown si on clique à l'extérieur
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-btn')) {
            let dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                let openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Gérer la soumission du formulaire
        $('form').on('submit', function(event) {
            event.preventDefault();
            
            // Afficher le loader
            $('#loader').show();

            $.ajax({
                url: "{{ route('exams.search') }}",
                method: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    // Masquer le loader et mettre à jour la liste des épreuves
                    $('#loader').hide();
                    $('#courses-ep .exam-list').html(response);
                },
                error: function(xhr) {
                    console.error("Erreur:", xhr.responseText);
                    $('#loader').hide(); // Masquer le loader même en cas d'erreur
                }
            });
        });
    });
</script>


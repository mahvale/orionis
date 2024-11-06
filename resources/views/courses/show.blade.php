<style>
/* Styles pour la barre des onglets */
.nav-tabs {
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
    color: #007bff;
}

.nav-link.active {
    color: #007bff;
    font-weight: bold;
}

.nav-link::after {
    content: '';
    display: block;
    width: 0;
    height: 3px;
    background: #007bff;
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
    border-color: #007bff; /* Couleur de la bordure au focus */
    outline: none;
}

/* Style du bouton de recherche */
.search-button {
    padding: 8px 20px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #0056b3; /* Couleur survolée */
    border-color: #0056b3;
}
.star {
    font-size:1rem;
    cursor: pointer;
    color: lightgray;
}

.star.selected {
    color: gold;
}
</style>


<div>
   
       <section id="page-banner" class="pt-105 pb-110 bg_cover" dta-p="ggg" data-overlay="8" style="background-image: url(/images/classes/classroomName.jpg)">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="page-banner-cont">
                          @auth <h2> username 
                           <span style="color:#ffc600" >classroomName</span>  </h2>  @endauth
                           <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Cours  </li>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="courses-grid-tab" data-bs-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true">
                        <i class="fa fa-book"></i> COURS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-list-tab" data-bs-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false">
                        <i class="fa fa-chalkboard-teacher"></i> TD
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-tp-tab" data-bs-toggle="tab" href="#courses-tp" role="tab" aria-controls="courses-tp" aria-selected="false">
                        <i class="fa fa-flask"></i> TP
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-exams-tab" data-bs-toggle="tab" href="#courses-exams" role="tab" aria-controls="courses-exams" aria-selected="false">
                        <i class="fa fa-file-alt"></i> EPREUVES
                    </a>
                </li>
            </ul>

           <div class="d-flex">
            <form class="d-flex search-form">
                <input type="text" class="form-control me-2 rounded-sm search-input" id="search-input" placeholder="Rechercher...">
                <button style="height:33px;" type="button" id="search-button" class="btn btn-primary rounded-sm search-button ml-1">
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
                <div class="row">
                    <!-- Course Card -->
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="/images/course/cu-1.jpg" class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">title </h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex">
                                        <span style="cursor:pointer;"  class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                    </div>
                                    <span>&nbsp;&nbsp;(20 Avis)</span>
                                </div>
                                <p class="card-text">description </p>
                                <div style="display:flex;">
                                      <a href="{{ route('courses.show', $course->id) }}" data-video-id="202177974" class="btn btn-outline-primary btn-sm) js-video-button btn-sm ml-1"> <i class="fa fa-video">&nbsp; video</i> </a>
                                <a href="{{ route('courses.show', $course->id) }}" data-video-id="202177974" class="btn btn-outline-primary js-video-button btn-sm ml-1"><i class="fa fa-file">&nbsp; pdf</i></a>
                                <a href="{{ route('courses.show', $course->id) }}" data-video-id="202177974" class="btn btn-outline-primary js-video-button ml-1"><i class="fa fa-audio">&nbsp; audio</i></a>
                                </div>
                              
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="images/course/teacher/t-1.jpg" class="rounded-circle me-2 mr-4" alt="teacher" style="width: 40px; height: 40px;">
                                <div class="rating">
                                    <span data-value="1" class="star">&#9733;</span>
                                    <span data-value="2" class="star">&#9733;</span>
                                    <span data-value="3" class="star">&#9733;</span>
                                    <span data-value="4" class="star">&#9733;</span>
                                    <span data-value="5" class="star">&#9733;</span>
                                </div>
                                <button id="submitRating" class="btn btn-link">Donnez votre avis</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row">
                    <!-- Course Card -->
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="/images/course/cu-1.jpg" class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">list </h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex">
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                    </div>
                                    <span>&nbsp;&nbsp;(20 Avis)</span>
                                </div>
                                <p class="card-text">description </p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Voir le cours</a>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="images/course/teacher/t-1.jpg" class="rounded-circle me-2" alt="teacher" style="width: 40px; height: 40px;">
                                <div>
                                    <h6 class="mb-0">Mark Anthem </h6>
                                    <small> Enseignant</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

             <div class="tab-pane fade" id="courses-tp" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row">
                    <!-- Course Card -->
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="/images/course/cu-1.jpg" class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">tp </h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex">
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                    </div>
                                    <span>&nbsp;&nbsp;(20 Avis)</span>
                                </div>
                                <p class="card-text">description </p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Voir le cours</a>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="images/course/teacher/t-1.jpg" class="rounded-circle me-2" alt="teacher" style="width: 40px; height: 40px;">
                                <div>
                                    <h6 class="mb-0">Mark Anthem </h6>
                                    <small> Enseignant</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>


             <div class="tab-pane fade" id="courses-exams" role="tabpanel" aria-labelledby="courses-list-tab">
               <div class="row">
                    <!-- Course Card -->
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="/images/course/cu-1.jpg" class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">exams </h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex">
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                    </div>
                                    <span>&nbsp;&nbsp;(20 Avis)</span>
                                </div>
                                <p class="card-text">description </p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Voir le cours</a>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="images/course/teacher/t-1.jpg" class="rounded-circle me-2" alt="teacher" style="width: 40px; height: 40px;">
                                <div>
                                    <h6 class="mb-0">Mark Anthem </h6>
                                    <small> Enseignant</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div> <!-- tab content -->

        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
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
   
@include('layouts.footer')
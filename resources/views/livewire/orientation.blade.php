<div>
           <section id="page-banner" class="pt-105 pb-110 bg_cover" dta-p="ggg" data-overlay="8" style="background-image: url(/images/s-3.jpg)">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="page-banner-cont"> 
                          @auth <h2>  {{ $user->name }}
                           <span style="color:#ffc600" > Orientation</span>  </h2>  @endauth
                           <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Orientation  </li>
                               </ol>
                           </nav>
                       </div>  <!-- page banner cont -->
                   </div>
               </div> <!-- row -->
           </div> <!-- container -->  
       </section> 


       <!-- Service Start -->
    <div class="container-xxl" style="background-color: #111;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                         <a href="{{ URL::to('pdf-view',['pdfv'=>'professions']) }}">
                        <h5 class="mb-3">Profession</h5>
                            <p>Comment est structuré l’enseignement au Cameroun?  Quelles sont les filières d’études qui y sont proposées?
                        </p>
                        </a>
                        </div>
                    </div>
                </div>
                    {{-- {{ route('universites',['debut'=>1,'fin'=>2]) }} --}}
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <a href="{{ URL::to('pdf-view',['pdfv'=>'metiers']) }}">
                                <h5 class="mb-3">Fiches Metiers</h5>
                            <p>Mieux organiser sa recherche d’emploi pour éviter les pertes de temps. Quels sont les outils  indispensables?</p>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <a href="/ipes">
                                <h5 class="mb-3">Tribunes des Etablissements</h5>
                            <p>Mieux s’orienter c’est réussir sa vie sur tous les plans! Ainsi, quand  s’orienter pour un succès garanti?</p>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                             <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <a href="/chat-prepas">
                          <h5 class="mb-3">Discutions</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
</div>

@include('layouts.header')
    
    <!--====== PRELOADER PART START ======-->
   
    <!--====== HEADER PART START ======-->
    @include('layouts.menu')
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>À PROPOS</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">À PROPOS</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== ABOUT PART START ======-->
    
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">

                <div class="col-lg-7">
                    <div class="about-image">
                        <img src="images/about/about-2.jpg" style="width:550px;height: 550px;" alt="About">
                    </div>  <!-- about imag -->
                </div> 

                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>À propos de nous</h5>
                        <h2>Bienvenue sur Orionis Educ-service </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Orionis est une plateforme  qui vise à  Améliorer les performances des élèves et faciliter leur insertion dans les grandes écoles <br> <br> en produisant cours , épreuves corrigées(corrections video)  ,TD corrigéscorrigées(corrections video), arretés des différents concours et de présenter de l'offre de formation disponible ainsi que des écoles de formation</p>
                    </div>
                </div> <!-- about cont -->
               
               
            </div> <!-- row -->

             <div class="row mt-4">
                    <div class="col-lg-3" style="width: 100%;background-color: #fff;"></div>
                    <div class="col-lg-5">
                        <p class="mt-4" style="text-align: center;font-size: 30px;font-weight: bold;" >NOS SERVICES:</p>
                    </div>
                </div>
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>01</span>
                            <h4>ASSISTANCE SCOLAIRE</h4>
                            <img src="images/assistancescolaire.jpg" style="width: 350px;height:250px" />
                            <p>cours , épreuves corrigées(corrections video)  ,TD corrigées(corrections video), arretés des différents concours</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>02</span>
                            <h4>PREPAS CONCOURS</h4>
                            <img src="images/page-banner-1.jpg" style="width: 350px;height:250px" />
                            <p>Rappels des cours, épreuves corrigées(corrections video)  ,TD corrigées(corrections video), arretés des différents concours</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>03</span>
                            <h4>ORIENTATION SCOLAIRE</h4>
                            <img src="images/s-3.jpg" style="width: 350px;height:250px" />
                            <p>présentation de l offre de formation disponible ainsi que des écoles de formation</p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

    <!--====== COUNTER PART START ======-->
    
    <div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url(images/bg-1.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">30,000</span>+</span>
                        <p>Eleve Enregistrer</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">41,000</span>+</span>
                        <p>Cours Disponible</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">11,000</span>+</span>
                        <p>Conseiller Disponible</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">100</span>+</span>
                        <p>Professeur</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    
    <!--====== COUNTER PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Nos Professeurs</h5>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-1.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Jairo Corkery</h6></a>
                            <span>litterature</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-2.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Mozelle Robel PhD</h6></a>
                            <span>philosophie</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-3.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Vicky Hoppe</h6></a>
                            <span>langue</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-4.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Mr. Charley Armstrong Jr.</h6></a>
                            <span>francais</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-5.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Carolanne Sauer</h6></a>
                            <span>anglais</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-6.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Benjamin Bartoletti</h6></a>
                            <span>physique</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-7.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>Emmy Moen</h6></a>
                            <span>chimie</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="images/teachers/t-8.jpg" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>EBINI MAHVALE</h6></a>
                            <span>mathematique</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   
   
    <!--====== PATNAR LOGO PART START ======-->
    
    <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
        <div class="container">
            <div class="row patnar-slied">
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-1.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-2.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-3.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-4.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-2.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-3.png" alt="Logo">
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
    <!--====== PATNAR LOGO PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    @include('layouts.footer')
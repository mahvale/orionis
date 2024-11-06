@include('layouts.header')
@include('layouts.menu')

<!--====== HEADER PART ENDS ======-->
 
<!--====== SEARCH BOX PART START ======-->
@include('layouts.search')

<!--====== SEARCH BOX PART ENDS ======-->
<style>
    /* Styles par défaut pour les grands écrans */
#about-part .section-title h5,
#about-part .section-title h2,
#about-part .about-cont p,
#about-part .about-cont a {
    font-family: "Times New Roman";
}

#about-part .col-lg-6 {
    position: relative;
    top: 0; /* Réinitialise la position */
}

/* Styles pour les écrans moyens (tablettes) */
@media (max-width: 992px) {
    #about-part .col-lg-5, 
    #about-part .col-lg-6 {
        text-align: center;
    }
    #about-part .about-cont {
        margin-top: 20px;
    }
    #btn-about {
        position: relative;
        top: 200px;
    }
}

/* Styles pour les petits écrans (mobiles) */
@media (max-width: 768px) {
    #about-part .row {
        flex-direction: column;
    }
    #about-part .col-lg-5,
    #about-part .col-lg-6 {
        max-width: 100%;
        margin: 0 auto;
    }
    #about-part .about-bg img {
        width: 100%; /* Ajuste l'image en pleine largeur */
    }
    #about-part .about-cont a {
        display: block;
        margin: 20px auto;
    }
    #btn-about {
        position: relative;
        top: 200px;
    }

    #reduire{
        position: relative;
        top: -80px;
    }

     #reduire2{
        position: relative;
        top: -80px;
    }

     #reduire3{
        position: relative;
        top: -80px;
    }
}

</style>
<!--====== SLIDER PART START ======-->
<section id="slider-part" class="slider-active">
    <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-1.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Orionis Educ-Services</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Découvrez une plateforme éducative sur mesure.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="propos">En savoir plus</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Commencer</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->  
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-2.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">ASSISTANCE SCOLAIRE</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s"> Cours, corrections vidéo, TD corrigés et plus encore.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="propos">En savoir plus</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="/courses">Commencer</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/bg-1.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Préparation au concours</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Atteignez vos objectifs avec une préparation adéquate.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="/propos">En savoir plus</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="prepas">Commencer</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url(images/slider/s-3.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Orientation scolaire</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Obtenez des conseils avant de prendre votre décision.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="/propos">En savoir plus</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="/orientation">Commencer</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->


</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->
<section id="category-part" class="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text">
                        <h2>Nos plateformes pour tout apprendre</h2>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-0 col-md-10 offset-md-1">
                    <div class="row category-slide mt-40">
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <a href="#" class="single-category">
                                <span class="icon">
                                    <img src="images/all-icon/ctg-1.png" alt="Icon">
                                </span>
                                <span class="cont">
                                    <span>Youtube</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <a href="#" class="single-category">
                                <span class="icon">
                                    <img src="images/all-icon/ctg-2.png" alt="Icon">
                                </span>
                                <span class="cont">
                                    <span>Facebook</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mr-1">
                            <a href="#" class="single-category">
                                <span class="icon">
                                    <img src="images/all-icon/ctg-3.png" alt="Icon">
                                </span>
                                <span class="cont">
                                    <span>Whatsapp</span>
                                </span>
                            </a>
                        </div>
                    </div> <!-- category slide -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>


<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->
<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5 style="font-family: Times New Roman;" >À propos de nous</h5>
                    <h2 style="font-family: Times New Roman;" >Bienvenue sur Orionis Educ-Services</h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p style="font-family: Times New Roman;" >Orionis est une plateforme éducative dédiée à l'amélioration des performances des élèves, tout en facilitant leur insertion dans les grandes écoles. Elle propose des cours, des épreuves corrigées, des TD corrigés et présente les offres de formation ainsi que les établissements disponibles.</p>
                    <a style="font-family: Times New Roman" href="{{ url('propos') }}" id="btn-about" class="main-btn mt-55">En savoir plus</a>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-6 offset-lg-1" style="position: relative; top: -5000px;">
                <div class="about-event mt-5">
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        <img src="images/about/bg-1.png" alt="About">
    </div>

</section>

<!--====== ABOUT PART ENDS ======-->

 <!--====== ABOUT PART START ======-->
    
    <section id="about-page" class="pt-70 pb-110" style="margin-top: -100px;">
        <div class="container">
             <div class="row mt-0">
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
                            <p style="font-family: Time New Roman;text-align: center;" >cours , épreuves corrigées(corrections video)  ,TD corrigées(corrections video), arretés des différents concours</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>02</span>
                            <h4>PREPAS CONCOURS</h4>
                            <img src="images/page-banner-1.jpg" style="width: 350px;height:250px" />
                            <p style="font-family: Time New Roman;text-align: center;">Rappels des cours, épreuves corrigées(corrections video)  ,TD corrigées(corrections video), arretés des différents concours</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>03</span>
                            <h4>ORIENTATION SCOLAIRE</h4>
                            <img src="images/s-3.jpg" style="width: 350px;height:250px" />
                            <p style="font-family: Time New Roman;text-align: center;">présentation de l offre de formation disponible ainsi que des écoles de formation</p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

     <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-65 pb-120 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mt-50 pb-25">
                        <h5>Top Tutors</h5>
                        <h2>Featured Teachers</h2>
                    </div> <!-- section title -->
                    <div class="teachers-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30 gray-bg">
                                    <div class="thum">
                                        <img src="images/teachers/teacher-2/tc-1.jpg" alt="Teacher">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h5>Mark anthem</h5></a>
                                        <p>JAVA Expert</p>
                                        <span><i class="fa fa-book"></i>10 Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="images/teachers/teacher-2/tc-2.jpg" alt="Teacher">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h5>Hellen Mark</h5></a>
                                        <p>Laravel Expert</p>
                                        <span><i class="fa fa-book"></i>05 Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="images/teachers/teacher-2/tc-1.jpg" alt="Teacher">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h5>Maria Noor</h5></a>
                                        <p>JAVA Expert</p>
                                        <span><i class="fa fa-book"></i>10 Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="images/teachers/teacher-2/tc-1.jpg" alt="Teacher">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h5>Alan hen</h5></a>
                                        <p>Laravel Expert</p>
                                        <span><i class="fa fa-book"></i>05 Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- teachers 2 -->
                </div>
                <div class="col-lg-6 ">
                    <div class="happy-student mt-55">
                        <div class="happy-title">
                            <h3>Happy Students</h3>
                        </div>
                        <div class="student-slied">
                            <div class="singel-student">
                                <img src="images/teachers/teacher-2/quote.png" alt="Quote">
                                <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet</p>
                                <h6>Mark anthem</h6>
                                <span>Bsc, Engineering</span>
                            </div> <!-- singel student -->
                            
                            <div class="singel-student">
                                <img src="images/teachers/teacher-2/quote.png" alt="Quote">
                                <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet</p>
                                <h6>Mark anthem</h6>
                                <span>Bsc, Engineering</span>
                            </div> <!-- singel student -->
                            
                            <div class="singel-student">
                                <img src="images/teachers/teacher-2/quote.png" alt="Quote">
                                <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet</p>
                                <h6>Mark anthem</h6>
                                <span>Bsc, Engineering</span>
                            </div> <!-- singel student -->
                        </div> <!-- student slied -->
                        <div class="student-image">
                            <img src="images/teachers/teacher-2/happy.png" alt="Image">
                        </div>
                    </div> <!-- happy student -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->

<!--====== VIDEO FEATURE PART START ======-->
    <section id="video-feature" class="bg_cover pt-0 pb-110" style="background-image: url(images/bg-1.jpg);height:600px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last order-lg-first" style="margin-top:0px;">
                    <div class="video text-lg-left text-center pt-0">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=dGRCxhigojo"><i class="fa fa-play"></i></a>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                    <div class="feature pt-20">
                        <div class="feature-title">
                            <h3 style="font-family: Time New Roman;text-transform: uppercase;">Nos Objectifs</h3>
                        </div> 
                        <ul>
                            <li>
                                <div class="singel-feature d-flex flex-row" id="reduire">
                                    <div class="icon">
                                        <img src="images/all-icon/f-1.png" style="width: 60px;height: 60px;" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4 style="font-family: Time New Roman;">Réduire le taux d'échec aux examens</h4>
                                        <p style="font-family: Time New Roman;">En offrant un encadrement psychopédagogique aux candidats.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                            <li>
                                <div class="singel-feature d-flex flex-row" id="reduire2">
                                    <div class="icon">
                                        <img src="images/all-icon/f-2.png" style="width: 60px;height: 60px;" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4 style="font-family: Time New Roman;">Faciliter l'insertion des élèves</h4>
                                        <p>En leur fournissant les ressources et un accompagnement.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                            <li>
                                <div class="singel-feature d-flex flex-row" id="reduire3">
                                    <div class="icon">
                                        <img src="images/all-icon/f-3.png" style="width: 60px;height: 40px;" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4 style="font-family: Time New Roman;">Réduire le taux de chômage</h4>
                                        <p style="font-family: Time New Roman;">En orientant les élèves vers les écoles performantes et les métiers porteurs.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                        </ul>
                    </div> <!-- feature -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="feature-bg"></div> <!-- feature bg -->
    </section>

<!--====== VIDEO FEATURE PART ENDS ======-->

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

@include('layouts.footer')

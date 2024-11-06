<!--====== PRELOADER PART START ======-->
<style type="text/css">
    .scrolling {
    animation: scroll 10s linear infinite;
    z-index: 9999;
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}

.header-contact, .header-opening-time {
    overflow: hidden;
    max-height: 50px; /* Adjust based on content height */
}

/* Style de la barre de défilement */
::-webkit-scrollbar {
    width: 12px; /* Largeur de la barre de défilement */
}

/* Fond de la barre de défilement */ 
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}

/* Couleur de la barre de défilement */
::-webkit-scrollbar-thumb {
    background: #45aee2; 
    border-radius: 1px; /* Coins arrondis */
}

/* Couleur de la barre au survol */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}

/* Styles par défaut (grands écrans) */
.navigation {
    display: block; /* Le menu par défaut reste visible */
}

.menu-tabs {
    display: none; /* Le menu tabs est caché sur les grands écrans */
}

/* Styles pour les petits écrans (max-width: 768px) */
@media only screen and (max-width: 768px) {
    .navigation {
        display: none; /* Masquer le menu de navigation classique */
    }

    #hambumger{
        display: none;
    }

    .menu-tabs {
        display: flex; /* Afficher le menu tabs */
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #45aee2;
        z-index: 1000;
    }

    .menu-tabs ul {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0;
        list-style: none;
    }

   .menu-tabs ul li a {
    display: flex;
    flex-direction: column; /* Pour empiler l'icône et éventuellement le texte */
    justify-content: center; /* Centrer verticalement */
    align-items: center;     /* Centrer horizontalement */
    padding: 15px;
    color: #fff;
    font-size: 30px; /* Augmentation de la taille des icônes */
    text-decoration: none;
}

.menu-tabs ul li a:hover {
    color: #45aee2; /* Couleur de survol */
}

.menu-tabs ul li a span {
    display: block;
    font-size: 12px;
    margin-top: 5px;
    color: #fff;
}

    /* Style pour le bouton qui ouvre le menu mobile */
    .menu-mobile-btn {
        display: block;
        position: fixed;
        bottom: 10px;
        right: 10px;
        background-color: #45aee2;
        color: #fff;
        padding: 15px;
        border-radius: 50%;
        z-index: 1001;
        cursor: pointer;
    }

    .menu-tabs.active {
        display: flex;
    }
}

 .header {
            width: 100%;
            padding: 20px 0;
            background-color: #f8f9fa;
            color: #45aee2;
            position: relative;
            overflow: hidden;
        }

        .scrolling-text {
            white-space: nowrap;
            overflow: hidden;
            display: block;
            width: 100%;
            position: absolute;
            animation: scroll 15s linear infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }


</style>
<!--====== HEADER PART START ======-->

<header id="header-part">
    
   <div class="header-top d-none d-lg-block" style="z-index:1;">
    <div class="container-fluid">
        <div class="row">
            <header class="header">
        <div class="scrolling-text">
         Orionis-Educ-Services : Apprendre, se préparer, s’orienter vers le succès ! 
        </div>
    </header>
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- header top -->

    
    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="/">
                            <img src="/images/logo.png" style="width: 60px;height: 60px;border: 1px solid #fff;" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="/images/all-icon/support.png" alt="icon">
                            </div>
                            <div class="cont">
                                <p style="color: #fff;font-family: Times New Roman;" >Besoin d'aide? Appelez-nous</p>
                                <span style="color: #fff;font-family: Times New Roman;">696-159-103</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->
    
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar bg-white"></span>
                            <span class="icon-bar bg-white"></span>
                            <span class="icon-bar bg-white"></span>
                        </button>
 
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="@if($route == 'home') active @endif" style="font-family: Times New Roman"  href="/">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="@if($route == 'about') active @endif" style="font-family: Times New Roman"  href="{{ url('propos') }}">À propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="@if($route == 'cour') active @endif" style="font-family: Times New Roman"  href="/courses">Assistance scolaire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="@if($route == 'prepas') active @endif" style="font-family: Times New Roman"  href="/prepas">Prépas-concours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="@if($route == 'orientation') active @endif" style="font-family: Times New Roman"  href="/orientation">Orientation</a>
                                </li>
                                @if (Route::has('login'))
                                    @auth
                                    <li class="nav-item">
                                        <a style="font-family: Times New Roman" href="{{ url('logout') }}">Déconnexion</a>
                                    </li>
                                    @else
                                     <li class="nav-item">
                                        <a style="font-family: Times New Roman" href="{{ route('login') }}">Se connecter</a>
                                    </li>
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </nav> <!-- nav --> 
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" class="text-white"><i class="fa fa-search"></i></a></li>
                            <!-- <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li> -->
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    
        <div class="menu-tabs d-lg-none d-md-none d-sm-block">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i><span>Accueil</span></a></li>
                <li><a href="{{ url('propos') }}"><i class="fa fa-info-circle"></i><span>À propos</span></a></li>
                <li><a href="/courses"><i class="fa fa-book"></i><span>Cours</span></a></li>
                <li><a href="/prepas"><i class="fa fa-graduation-cap"></i><span>Prépas</span></a></li>
                <li><a href="/orientation"><i class="fa fa-compass"></i><span>Orientation</span></a></li>
            </ul>
        </div>
</header>

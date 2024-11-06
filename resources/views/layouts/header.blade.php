<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--====== Title ======-->
    <title style="font-family: Time New Roman;" >ORIONIS EDUC-SERV</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

    <!--====== Slick css video.css  ======-->
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/video.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    
    <!--====== Default css  ======-->
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/styles.css" />
     <link rel="stylesheet" href="/css/modal-video.min.css">
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde/dist/simplemde.min.css">

     <!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- AOS JS -->

     
     @livewireStyles

     <style>
        /* Container for the preloader */
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* Loader container */
.loader {
    position: relative;
    width: 300px;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Cube animation */
.cube {
    width: 100%;
    height: 100%;
    position: relative;
    transform-style: preserve-3d;
    transform: rotateX(0deg) rotateY(0deg);
    animation: rotate 2s infinite linear;
}

.cube::before, .cube::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #00aaff;
    transform-origin: center;
    transform-style: preserve-3d;
}

.cube::before {
    background: linear-gradient(45deg, #079ff1, #fff);
    transform: rotateY(0deg) translateZ(50px);
}

.cube::after {
    background: linear-gradient(45deg, #fff, #0b8ffc);
    transform: rotateX(90deg) translateZ(50px);
}

/* Animation for the cube */
@keyframes rotate {
    from { transform: rotateX(0deg) rotateY(0deg); }
    to { transform: rotateX(360deg) rotateY(360deg); }
}

/* Text styling */
.loader-text {
    position: absolute;
    color: hsl(210, 80%, 54%);
    font-family: 'Footlight MT', serif;
    font-weight: bold;
    font-size: 16px;
    text-align: center;
    top: 120px;
}
/* Category Section */

.category-text {
    text-align: center;
    margin-bottom: 40px;
}

.category-text h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #fff;
}

.single-category {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.single-category:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.single-category .icon img {
    max-width: 150px;
    height: auto;
    margin-bottom: 15px;
    height: 100px;
}

.single-category .cont span {
    display: block;
    font-size: 1.125rem;
    font-weight: 600;
    color: #333;
    margin-top: 10px;
}

@media (max-width: 767px) {
    .single-category {
        padding: 15px;
    }

    .single-category .icon img {
        max-width: 120px;
    }

    .category-text h2 {
        font-size: 2rem;
    }
}
  /* Police de caractères */
  body, header {
        font-family: 'Roboto', sans-serif;
    }

    /* Header top */
    .header-top {
        background-color: #f8f9fa;
        padding: 10px 0;
        border-bottom: 2px solid #45aee2;
    }
    .header-contact ul li, .header-opening-time p {
        font-size: 14px;
        color: #333;
    }

    /* Logo */
    .logo img {
        transition: transform 0.3s;
    }
    .logo img:hover {
        transform: scale(1.1);
    }

    /* Support section */
    .support-button {
        background-color: #45aee2;
        padding: 10px;
        border-radius: 8px;
        color: white;
    }
    .support p {
        font-size: 12px;
        margin-bottom: 0;
    }
    .support span {
        font-size: 16px;
        font-weight: 700;
    }

    /* Navigation */
    .navigation {
        background-color: #45aee2;
        padding:0px 0;
    }
    .navbar-nav .nav-item .nav-link {
        color: white;
        font-size: 16px;
        font-weight: 500;
        padding: 1px 2px;
    }
    .navbar-nav .nav-item .nav-link:hover,
    .navbar-nav .nav-item .nav-link.active {
        background-color: #38a1d1;
        border-radius: 4px;
    }

    /* Right icons */
    .right-icon ul li a {
        font-size:10px;
        color: white;
    }
    .right-icon ul li a:hover {
        color: #38a1d1;
    }

    /* Mobile menu */
    .navbar-toggler .icon-bar {
        background-color: white;
    }


    /* Improved Header Styles */
.header-top {
    background-color: #f8f9fa;
    padding: 10px 0; /* Slightly smaller padding */
    border-bottom: 1px solid #45aee2; /* Lighter border for a more subtle look */
}

.header-contact ul li,
.header-opening-time p {
    font-size: 14px;
    color: #333;
    margin: 0; /* Remove margins for a cleaner look */
}

.header-opening-time p {
    font-style: italic; /* Optional: Add italic style for emphasis */
}

.support-button {
    background-color: #45aee2;
    padding: 10px;
    border-radius: 8px;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add subtle shadow for better appearance */
}

.support p,
.support span {
    margin: 0; /* Remove margins for consistent spacing */
}

.support span {
    font-size: 16px;
    font-weight: 700;
}

/* Right icons styling */
.right-icon ul li a {
    font-size: 14px; /* Slightly larger for better visibility */
    color: white;
}

.right-icon ul li a:hover {
    color: #38a1d1; /* Adjust hover color to match theme */
}

     </style>
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader">
         <img src="/images/output-onlinegiftools.gif" style="">
        </div>
    </div>
    
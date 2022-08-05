<?php
session_start();
define("ROW_PER_PAGE",4);
error_reporting(0);
include 'includes/dbconnect.php';
if (strlen($_SESSION['obcsuid']>0)) {


$uid=$_SESSION['obcsuid'];
$put= "<header id='nav-generic' class='container-fluid' style='background: #3399ff'>
    <div class='row'>
        <div class='container pl-0 pr-0'>
<nav class='navbar navbar-expand-lg  pl-0 pr-0' >
<a class='navbar-brand' href='.'>
<img src='images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item'>
                            <a class='nav-link' href='for-sale' style='color: white'>For Sale <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class'nav-item'>
                            <a class='nav-link' href='for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link active' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item'>
<a class='nav-link' href='#'>Post a Listing</a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='post/request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>Account</a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='dashboard/dashboard' style='color: black'>Dashboard</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='dashboard/settings' style='color: black'>My Settings</a>
<a class='dropdown-item' href='logout' style='color: black'>Logout</a>
                                </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>";

  
}else {
    $out= "<header id='nav-generic' class='container-fluid' style='background: #3399ff'>
    <div class='row'>
        <div class='container pl-0 pr-0'>
<nav class='navbar navbar-expand-lg  pl-0 pr-0' >
<a class='navbar-brand' href='.'>
<img src='images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='#' style='color: white'>For Sale <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class'nav-item'>
                            <a class='nav-link' href='#' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='#' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link active' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item active'>
<a class='nav-link' href='#' style='color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;'>Post a Listing <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='post/request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>
                                    My Account
                                </a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='signin' style='color: black'>Sign In</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='signup' style='color: black'>Create Account</a>
                                </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>";
}
?>


<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Us | Hutblock</title>
<meta name="description" content="Find property for sale &amp; for rent on the most trusted real estate portal in Nigeria. Search for houses, lands, flats or apartments, office space, development projects and commercial property anywhere in Nigeria."/>
<meta name="author" content="Hutblock Properties."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutblock Properties."/>
<meta name="robots" content="index, follow">

<link rel="icon" type="image/png" sizes="32x32" href="images/icons/fav-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icons/fav-16x16.png">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="images/icons/fav-32x32.png"/>

<meta name="captchaKey" content="6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU">
<meta name="reCaptcha" content=""/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta itemprop="image" content="https://files.hutbay.com/images/icons/og-image.png"/>

<meta name="referrer" content="always"/>
<meta property="fb:app_id" content="373331779398384"/>
<meta property="og:title" content="About Us"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutblockng.com"/>
<meta property="og:site_name" content="Hutblock Real Estate"/>
<meta property="og:image" content="images/icons/fav-32x32.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="HUTBLOCKNG.com is the foremost trusted real estate and property portal in Nigeria. Find your ideal property or work with the best estate agents and developers in your choosing locality."/>
<meta name="google-signin-clientid" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com"/>
    <meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
     <link rel="stylesheet" type="text/css" href="css/account/util.css">
    <link rel="stylesheet" type="text/css" href="css/account/signin.css">
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-12701628-8');

</script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="scripts/lib/bootstrap-select.min.js"></script>

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/generic.css">
    <link rel="stylesheet" href="css/static.css">


</head>
<body>

    <div id="loading">
        <div class="spinner"></div>
    </div>

    <div id="body">
        <div>
                    <?php
                    if ($_SESSION['obcsuid']>0) {
                        echo $put;
                    }else {
                        echo $out;
                    }
                    
                    ?>
                </div>
<!--css for carousel-->
<style>
* {box-sizing: border-box;}

.mySlides {
   background:url(images/1.jpeg);
   background-size:cover;
    display: visible;
    background-position: center;
    width:100%;height:300px;
}

img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2.8s;
  animation-name: fade;
  animation-duration:2.8s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.text-centered{
position: absolute;
text-align:center;
  top: 50%;
  left: 50%;
  width:100%;
  transform: translate(-50%, -50%);
}
</style>
<!--End of carousel-->

<!--Code for carousel-->
<main class="page-content property_info">
<div class="slideshow-container">
<div class="mySlides fade">
  <!-- <img src="images/1.jpeg" style="width:100%;height:100%;"> -->
  <div class="text-centered">
<h2 style="color: white;font-weight: 900;">Nigeria's Online Real Estate Space at Your Fingertips</h2>
<h3 style="color: white; font-weight: 1000;">The Safest and Trusted Property Portal You Can Rely On</h3></div>
</div>

<div class="mySlides fade" style="background:url(images/2.jpeg);
   background-size:cover;
    display: visible;background-position: center;
    width:100%;height:300px;">
  <!-- <img src="images/2.jpeg" > -->
    <div class="text-centered">
<h2 style="color: white;font-weight: 900;">Nigeria's Online Real Estate Space at Your Fingertips</h2>
<h3 style="color: white; font-weight: 1000;">The Safest and Trusted Property Portal You Can Rely On</h3></div>
</div>

<div class="mySlides fade" style="background:url(images/3.jpeg);
   background-size:cover;
    display: visible;background-position: center;
    width:100%;height:300px;">
  <!-- <img src="images/3.jpeg"> -->
      <div class="text-centered">
<h2 style="color: white;font-weight: 900;">Nigeria's Online Real Estate Space at Your Fingertips</h2>
<h3 style="color: white; font-weight: 1000;">The Safest and Trusted Property Portal You Can Rely On</h3></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<section class="seo-offer-area bd-bottom">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="offer-content">
                    <div class="section-title-seo-left">
                        <div class="title text-center">
                            <h3>About Us</h3>
                            <span class="section-devider"><span><i class="fa fa-circle"></i></span></span>
                        </div>
                        
                        <p>
                          Hutblock Group is reimaging real estate firm that helps you unlock life’s next chapter.
As one of the fast growing real estate website in Nigeria ,  Hutblock  and its affiliates offer's customer's, an on-demand experience for selling, buying, renting and financing with transparency and nearly seamless end-to-end service. HutBlock Offers buying and selling of homes directly in dozens of markets across the country, allowing sellers control over their timeline. HutBlock recently launched HutBlockng , a licensed real estate online  entity, to streamline Property ease search
                        </p>
<p>HutBlock online real estate portal is also dedicated to helping real estate professionals, investors, property buyers, home owner's, sellers, mortgage Bank /Institutions and also offer rental Services and share vital information about homes and real estate. Our key motive is to provide you with the data needed to help you stay informed about property decision making/Management.
                        </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="welcome-area bg">
    <div class="container">

        <div class="row">
            <div class="col-md-8 offset-md-2 mb-4 text-center">
                             <div class="title">
                    <h3>Our Core Values</h3>
                    <span class="section-devider"><span><i class="fa fa-circle"></i></span></span>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-4">
                <div class="single-megaland-service text-center">
                    <div class="megaland-service-image">
                        <a href="#"><img src="images/decision.png" alt=""></a>
                    </div>
                    <div class="megaland-service-content">
                        <h3>You-First Relation</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="single-megaland-service text-center">
                    <div class="megaland-service-image">
                        <a href="#"><img src="images/decision.png" alt=""></a>
                    </div>
                    <div class="megaland-service-content">
                        <h3>Nobility</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="single-megaland-service text-center">
                    <div class="megaland-service-image">
                        <a href="#"><img src="images/decision.png" alt=""></a>
                    </div>
                    <div class="megaland-service-content">
                        <h3>Innovation</h3>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   </main>
<div class="footer-main container-fluid pt-4 pb-3" style="background: #3399ff">
    <div class="row">
        <div class="container  pr-4 pl-4">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="color: white">Company</h5>
                    <div><a href="contact.html" style="color: white">Contact Us</a></div>
                    <div><a href="#" style="color: white" target="_blank">HutBlock Blog</a></div>
                    <div><a href="#" style="color: white" target="_blank">Marketing Services</a></div>
                    <div><a href="#" style="color: white">Help/Guides</a></div>
                </div>
                <div class="col-md-3">
                    <h5 style="color: white">Business Products</h5>
                    <div><a href="#" style="color: white">Advertise</a></div>
                    <div><a href="#" style="color: white">Subscription Plans</a></div>
                    <div><a href="#" style="color: white">Developer Plus</a></div>
                    <div><a href="#" style="color: white">Hutblock Ads</a></div>
                </div>
                <div class="col-md-3">
                    <h5 style="color: white">Property Tools</h5>
                    <div><a href="#" style="color: white">Local Info</a></div>
                    <div><a href="#" style="color: white">Post a Listing</a></div>
                    <div><a href="#" style="color: white">Post a Request</a></div>
                    <div><a href="#" style="color: white">Moving Quotes</a></div>
                </div>
                <div class="col-md-3">
                    <h5 style="color: white">Website</h5>
                    <div><a href="#" style="color: white">Terms of Use</a></div>
                    <div><a href="#" style="color: white">Privacy Policy</a></div>
                   <div class="mt-2"><a href="#" style="color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;"><img width="123" src="images/app-store-badge.png" alt="app store"/></a></div>
                    <div><a href="#" style="color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;"><img width="123" src="images/google-play-badge.png" alt="google play"/></a></div>
                </div>
            </div>
            <div class="row border-top pt-3 mt-3 footbtm">
                <span class="col-md-6 pl-0" style="color: white">&copy; <script>
                                    document.write(new Date().getFullYear());
                                </script> Hutblock Properties</span>
                <span class="col-md-6 text-right">
                    <a href="https://instagram.com/hutblockng" target=_blank class="mr-2"><i style="color: #405DE6" class="fab fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=23407025571655" target=_blank class="mr-2"><i style="color: green" class="fab fa-whatsapp"></i></a>
                </span>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
    <script src="scripts/bootstrap.scripts.combine.min.js"></script>
    <script src="scripts/lib/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/plugin.generic.js"></script>
<script type="text/javascript" src="scripts/generic.js"></script>
<script type="text/javascript" src="scripts/landing.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6180df2d86aee40a573977f1/1fjfmfiuh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
<!--End of code-->
</body>
</html>
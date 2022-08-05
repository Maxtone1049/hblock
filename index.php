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
                        <li class='nav-item active'>
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
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item active'>
<a class='nav-link' href='post/listing' >Post a Listing </a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='post/request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>Account</a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='dashboard/.' style='color: black'>Dashboard</a>
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
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item active'>
<a class='nav-link' href='post/listing'>Post a Listing <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;'>Property Request</a>
                            
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
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home | Hutblock Properties </title>
<meta name="description" content="Find property for sale &amp; for rent on the most trusted real estate portal in Nigeria. Search for houses, lands, flats or apartments, office space, development projects and commercial property anywhere in Nigeria."/>
<meta name="author" content="Hutblock Properties."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutblock Properties."/>
<meta name="robots" content="index, follow">
<link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
<link rel="mask-icon" href="images/icons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="images/icons/fav-32x32.png"/>
<meta name="captchaKey" content="6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU">
<meta name="reCaptcha" content=""/>
<link rel="search" type="application/opensearchdescription+xml" href="opensearch.xml" title="Hutblock Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<link rel="start" title="Hutblock" href="index.html"/>
<meta name="referrer" content="always"/>
<meta property="fb:app_id" content="373331779398384"/>
<meta property="og:title" content="Property For Sale &amp; Rent in Nigeria"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutblock.com"/>
<meta property="og:site_name" content="Hutblock Real Estate"/>
<meta property="og:image" content="images/icons/fav-32x32.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Find property for sale &amp; for rent on the most trusted real estate portal in Nigeria. Search for houses, lands, flats or apartments, office space, development projects and commercial property anywhere in Nigeria."/>
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@hutblock">
<meta name="twitter:creator" content="@hutblock"/>
<meta name="twitter:title" content="Property For Sale &amp; Rent in Nigeria">
<meta name="twitter:description" content="Find property for sale &amp; for rent on the most trusted real estate portal in Nigeria. Search for houses, lands, flats or apartments, office space, development projects and commercial property anywhere in Nigeria.">
<meta name="twitter:image" content="images/fav-16x16.png">
<meta name="google-signin-clientid" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com"/>
    <meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="https://www.fontspace.com/local-bakery-font-f58940">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/post.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12701628-8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-12701628-8');
</script>
   <link rel="stylesheet" type="text/css" href="css/slick/slick.combine.min.css"/>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/generic.min.css">
    <link rel="stylesheet" href="css/landing.min.css">
     <link rel="stylesheet" type="text/css" href="css/account/util.css">
    <link rel="stylesheet" type="text/css" href="css/account/signin.css">
</head>
<body>
<div id="loading">
    <div class="spinner"></div>
</div>
    <div>
                    <?php
                    if ($_SESSION['obcsuid']>0) {
                        echo $put;
                    }else {
                        echo $out;
                    }
                    
                    ?>
                </div>
<div id="pitch" class="container-fluid">
    <style type="text/css">
        /* If the screen size is 601px wide or more, set the font-size of <div> to 80px */
@media screen and (min-width: 601px) {
.example {
    font-size: 80px;
  }
}

/* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
@media screen and (max-width: 600px) {
  .example {
    font-size: 30px;
  }
}
    </style>
    <div id="search" class="row">
        <div class="container">
            <div class="content">
                <div class="text-center">
                    <h1 style="font-family:Local Bakery Regular;font-size:60px;" class="example">Safer Property Search</h1>
                    <h2 style="font-weight: 800 ">Your Trusted And Smart Source For Real Estate In Nigeria</h2>
                </div>
                <form action="search" method="get">
                    <div id="search-actions" class="col-md-6 offset-md-3 d-flex">
                        <ul class="nav nav-tabs mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data="#">BUY</a>
                            </li>
                            <li class="nav-item middle">
                                <a class="nav-link" href="#" data="#">RENT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data="#" ptype="14">LAND</a>
                            </li>
                        </ul>
                    </div>
                </form>
                <div id="advFilter" class="text-center mt-3">
                    <a href="#">Advanced Filter</a>
                </div>
            </div>
        </div>
    </div>
</div>
<main id="landing" class="container-fluid">
           <div id="media" class="row">
        <div class="container">
            <h4 class="header text-center mt-1 mb-3 pt-5  pb-4 border-top">Find Your Needle in a Haystack</h4>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="media">
                        <img src="images/search.png" alt="search icon"/>
                        <div class="media-body ml-4">
                            <h5>Sort Properties With Ease</h5>
                            <p>Find your needle in an haystack. Narrow down to the perfected property, home or house for you!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="media">
                        <img src="images/alert.png" alt="alert icon"/>
                        <div class="media-body ml-4">
                            <h5>Be The First To Get Aware</h5>
                            <p>Intelligent, non-intrusive swift notification when your most perfect home or house comes to market</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="media">
                        <img src="images/decision.png" alt="alert icon"/>
                        <div class="media-body ml-4">
                            <h5>Make Informed Decisions</h5>
                            <p>Buying or renting a property is a critical decision. Be armed with enough and relevant information</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="media">
                        <img src="images/leads.png" alt="icon"/>
                        <div class="media-body ml-4">
                            <h5>Find Genuine Real Estate Pros</h5>
                            <p>Curated list of reputable real estate agents you can consult for professional services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pros" class="row mt-4 pb-5 border-top">
        <div class="container mt-4 mb-2 pb-4">
            <h4 class="header text-center mt-1 mb-1 pt-4 pb-4">Advertise Faster With The Safer Platform</h4>
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-4 text-center">
                    <h5 class="mb-3">Result-driven marketing solution</h5>
                    <p>
                        Market your for sale and for rent properties to thousands of potential buyers and renters.
                        With Hutblock marketing solutions, you can sell/rent out your properties faster. Talk to us today.
                    </p>
                    <a href="#" class="app-button mt-3 mr-3">Contact Sales</a> <a href="#" class="app-button mt-3">Learn More</a>
                </div>
            </div>
            <hr/>
            <div class="row mt-5">
                <div class="col-md-8  offset-md-2 text-center">
                    <h5 class="mb-3">Real Estate Agent Relationship</h5>
                <p>Are you a real estate agent or marketer? Start listing your properties for sale/ Rent today.
                        We have plans that suits your marketing budget. Get started today!
                    </p>
                    <a href="#" class="app-button mt-3 mr-3">Get Started</a> <a href="#" class="app-button mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</main>
   <div class="footer-main container-fluid pt-4 pb-3" style="background: #3399ff">
    <div class="row">
        <div class="container  pr-4 pl-4">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="color: white">Company</h5>
                    <div><a href="#" style="color: white">Contact Us</a></div>
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
<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
    <script src="scripts/bootstrap.scripts.combine.min.js"></script>
    <script src="scripts/lib/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/plugin.generic.js"></script>
<script type="text/javascript" src="scripts/generic.js"></script>
<script type="text/javascript" src="scripts/landing.js"></script>
</body>
</html>
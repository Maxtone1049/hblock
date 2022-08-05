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
<a class='nav-link' href='#' style='color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;'>Post a Listing <span class='sr-only'>(current)</span></a>
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
<a class='nav-link' href='#' style='color: black;opacity: 0.5;text-decoration: none;cursor: not-allowed;opacity: 0.5;'>Post a Listing <span class='sr-only'>(current)</span></a>
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
<title>Directory Real Estate Agents | Hutbay</title>
<meta name="description" content="Your smartest choice for all real estate listings in Nigeria, both for sale and for rent. Find your ideal property and and connect with trusted local professionals."/>
<meta name="author" content="Hutbay Limited."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
<meta name="robots" content="index, follow">
<link rel="mask-icon" href="https://files.hutbay.com/images/icons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<meta name="captchaKey" content="6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU">
<meta name="reCaptcha" content=""/>
<link rel="search" type="application/opensearchdescription+xml" href="opensearch.xml" title="Hutbay Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>

<meta property="og:title" content="Directory Real Estate Agents"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Your smartest choice for all real estate listings in Nigeria, both for sale and for rent. Find your ideal property and and connect with trusted local professionals."/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12701628-8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-12701628-8');
</script>
<script src="browser.sentry-cdn.com/5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
<script>
    Sentry.init({ dsn: 'https://3bb88b37f18e4d2aa08c5570fc68b266@o306584.ingest.sentry.io/5395544' });
</script>
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="scripts/lib/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="css/generic.css">
<link rel="stylesheet" href="css/search.css">
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

        <main class="page-content property_info">
            



<div id="contently" class="container-fluid">

    <div class="row">

        <div class="container mt-3">
            <div class="row">
                <div class="main-content col-md-8">
                    
<div id="dirSearchBar" class="row">
    <div class="col-12 searchContent">
        <form action="https://www.hutbay.com/search" method="get" id="quickSearch" _lpchecked="1" class="form-group" style="display: inline;">
            <div id="bookForm" style="background-color: hsla(216, 36%, 54%, 0.7);border: 1px solid transparent;border-radius: 3px;padding: 9px 7px;display: flex;/*! -webkit-box-orient: horizontal; *//*! -webkit-box-direction: normal; *//*! -webkit-flex-flow: row; *//*! -ms-flex-flow: row; *//*! flex-flow: row; */" class="row">
                <div class="col-md-7 pl-1 pr-1">
                    <input class="form-control searchListings" type="text" name="q" value="" placeholder="Search by city or company name" autocomplete="off">
                    <input type="hidden" name="cityId" value="">
                </div>
                <div class="sloc searchLoc3 col-md-3 pl-1 pr-1">
                    <select class="form-control selectric" name="type" id="type">
                        <option value="0">Estate Agents</option>
                        <option value="1">Moving Companies</option>
                    </select>
                </div>
                <div class="sloc searchLoc2 col-md-2 pl-1 pr-1">
                    <button class="col-auto btn btn-sm btn-primary" type="button">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

                    <div class="row">
                        <h1 id="resultTitle">Estate Agents in Nigeria</h1>
                    </div>


                    <div class="row cardly">
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/ikem-9840911192" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/default.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/ikem-9840911192" target="_blank" class="title text-primary mt-0">Ikem Nwabueze</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Kemchuta Homes Limited</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Lekki, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/blessingE" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8192_dcc177635b424432bd6ee49fba4ca6de.jpeg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/blessingE" target="_blank" class="title text-primary mt-0">Blessing Ezeagu</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Kenmaglory Homes And Properties</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Wuse 2, Abuja
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/oluwatobilobao-150" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/default.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/oluwatobilobao-150" target="_blank" class="title text-primary mt-0">Olasubomi Obadeyi</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Lily Gold Realtors</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Alagbado, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/igeoluwabunmia-133" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8179_733f2d8427c544bb855e56ac7d49f3f0.jpg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/igeoluwabunmia-133" target="_blank" class="title text-primary mt-0">Ige oluwabunmi Adewunmi</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Oxford International Group</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Alimosho, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/tohiro-107" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8178_876cbefe2df04cfd8527417c2beb0c8a.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/tohiro-107" target="_blank" class="title text-primary mt-0">Tohir Olanrewaju</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Tohir Olanrewaju Properties</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Abeokuta, Ogun
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/md%27sbasep-107" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8167_b6897a6edad847d190714aeb4c29815e.jpg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/md%27sbasep-107" target="_blank" class="title text-primary mt-0">Dominic Mbet</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>MD&#x27;sbase Property Hub</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Lekki, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                        <img src="../hutbay.blob.core.windows.net/company-profile/8167_9f6072e6fb924f37919f48c95463195a.png" />
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/adcrancag-137" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8163_65000698181b486aaebcd825c84971b0.jpg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/adcrancag-137" target="_blank" class="title text-primary mt-0">Adcranca Global</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Adcranca Global Resources Limited</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Ibeju Lekki, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/turrisf-184" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8162_8b3a06fcd7f946b38642e15b4e3474c3.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/turrisf-184" target="_blank" class="title text-primary mt-0">Turris Fortissima</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Turris</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Lekki, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/novel" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/default.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/novel" target="_blank" class="title text-primary mt-0">Novel Plus</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Novel Plus</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Central Business District, Abuja
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                        <img src="../hutbay.blob.core.windows.net/company-profile/8158_bc5bb513501a4eea88c9fe6250a8214b.jpg" />
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/yemiM" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8147_f51f31eec17144d5b52d897edd84af9d.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/yemiM" target="_blank" class="title text-primary mt-0">Yemi Marvel</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Emir Soft Nigeria Limited</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Oluyole, Oyo
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/eunice" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8138_415479f18add4032bfa312de69370e82.jpg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/eunice" target="_blank" class="title text-primary mt-0">EUNICE OLUWOLE</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Peculiar Jewel Properties</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Ibeju Lekki, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/lynda" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/default.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/lynda" target="_blank" class="title text-primary mt-0">Lynda Kalu</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Kalchrisco Services</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Egbeda, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/nosagied-168" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8127_635b083f15de48779b0360ebd437277e.jpg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/nosagied-168" target="_blank" class="title text-primary mt-0">NEW MILL CLASS PROPERTY LIMITED</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>New Mill Class Property Ltd</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Benin, Edo
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                        <img src="../hutbay.blob.core.windows.net/company-profile/8127_a7dd724c4c21433d91f82d38dca76959.jpg" />
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/philipU" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/default.png" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/philipU" target="_blank" class="title text-primary mt-0">Philip Ukah</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Immaculate Kingdom Capital</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Abeokuta, Ogun
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <a class="mediaLink" href="profile/oseR" target="_blank">

                                                <img src="../hutbay.blob.core.windows.net/user-detail/8122_a53cc949b204460995524601c411c115.jpeg" alt="photo">
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-12 pl-3">
                                            <div class="row">
                                                <div class="col-md-9">

                                                    <p class="pb-0 pt-0">
                                                        <a href="profile/oseR" target="_blank" class="title text-primary mt-0">Ose Realtors</a>
                                                    </p>

                                                    <div>
                                                        <span>
                                                            <text>Ose Realtors</text>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span class="font-bold">
                                                            <i class="fa fa-map-marker"></i>
                                                            Ajah, Lagos
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="coyLogo col-md-3">
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                

                                                <span class="btn-boost" hut-ref="#"><i class="fa fa-user mr-1"></i> Profile</span>
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="https://localhost:44333/contact/marketer/RT166026"><i class="fa fa-envelope mr-1"></i> Email</span>
                                                <span class="btn-boost"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="more col-md-12">
                                    <div class="float-left">Results 1 - 20 of 35,678 </div>

                                    <div class="float-right">
                                        <div class="pagination-container"><ul class="pagination"><li class="page-item active"><span class="page-link">1</span></li><li class="page-item"><a class="page-link" href="estate-agents5785?page=2&amp;count=15">2</a></li><li class="page-item"><a class="page-link" href="estate-agents8515?page=3&amp;count=15">3</a></li><li class="page-item"><a class="page-link" href="estate-agents2851?page=4&amp;count=15">4</a></li><li class="page-item"><a class="page-link" href="estate-agents3186?page=5&amp;count=15">5</a></li><li class="page-item disabled PagedList-ellipses"><a>&#8230;</a></li><li class="page-item PagedList-skipToNext"><a class="page-link" href="estate-agents5785?page=2&amp;count=15" rel="next">></a></li><li class="page-item PagedList-skipToLast"><a class="page-link" href="estate-agentsc789?page=238&amp;count=15">>></a></li></ul></div>
                                    </div>
                                </div>
                    </div>
                </div>


                <div id="sidebar" class="col-md-4">

                    <div class="card pt-0 pb-0 mb-3">
                        <div class="card-group-item">
                            <div class="card-body">
                                <div>Need help with your search?</div>
                                <p class="mb-3 mt-1">Engage the services of local real estate professionals to help with your search. It's faster and it is FREE.</p>
                                <div class="mb-3">
                                    <span class="app-button"><i class="far fa-paper-plane"></i> Post a Request</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card pt-0 pb-0">
                        <div class="card-group-item">
                            <h6><i class="fas fa-truck-moving"></i> Moving Soon?</h6>
                            <div class="card-body">
                                <div>Hassle-free moving!</div>
                                <p class="mb-3 mt-1">Relocate without hassle and within your budget. Start planning today.</p>
                                <div class="mb-3">
                                    <span class="app-button"><i class="far fa-bell"></i> Get FREE Quotes</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>

        </main>

        

    <div class="container-fluid indexLinks">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-4 mb-3">
                    <a class="indexBtn" data-toggle="collapse" href="#collapseLinks">
                        <span class="collapsed">Popular Property Searches in Nigeria</span>
                        <i class="ml-2 fa"></i>
                    </a>
                </div>

                <div class="col-md-12 text-center pt-2 collapse" id="collapseLinks">
                    <div class="row pt-4">
                        <div class="col-md-3">
                            <h5>Real Estate</h5>
                            <ul>
                                <li><a href="property-for-sale/abia">Abia property for sale</a></li>
                                <li><a href="property-for-sale/abuja">Abuja property for sale</a></li>
                                <li><a href="property-for-sale/adamawa.html">Adamawa property for sale</a></li>
                                <li><a href="property-for-sale/akwa-ibom">Akwa Ibom property for sale</a></li>
                                <li><a href="property-for-sale/anambra">Anambra property for sale</a></li>
                                <li><a href="property-for-sale/bauchi">Bauchi property for sale</a></li>
                                <li><a href="property-for-sale/bayelsa">Bayelsa property for sale</a></li>
                                <li><a href="property-for-sale/benue">Benue property for sale</a></li>
                                <li><a href="property-for-sale/borno">Borno property for sale</a></li>
                                <li><a href="property-for-sale/cross-river">Cross River houses</a></li>
                                <li><a href="property-for-sale/delta">Delta property for sale</a></li>
                                <li><a href="property-for-sale/ebonyi">Ebonyi property for sale</a></li>
                                <li><a href="property-for-sale/edo">Edo property for sale</a></li>
                                <li><a href="property-for-sale/ekiti">Ekiti property for sale</a></li>
                                <li><a href="property-for-sale/enugu">Enugu property for sale</a></li>
                                <li><a href="property-for-sale/gombe">Gombe property for sale</a></li>
                                <li><a href="property-for-sale/imo">Imo property for sale</a></li>
                                <li><a href="property-for-sale/jigawa">Jigawa property for sale</a></li>
                                <li><a href="property-for-sale/kaduna">Kaduna property for sale</a></li>
                                <li><a href="property-for-sale/kano">Kano property for sale</a></li>
                                <li><a href="property-for-sale/katsina">Katsina property for sale</a></li>
                                <li><a href="property-for-sale/kebbi">Kebbi property for sale</a></li>
                                <li><a href="property-for-sale/kogi">Kogi property for sale</a></li>
                                <li><a href="property-for-sale/kwara">Kwara property for sale</a></li>
                                <li><a href="property-for-sale/lagos">Lagos property for sale</a></li>
                                <li><a href="property-for-sale/nassarawa">Nassarawa property for sale</a></li>
                                <li><a href="property-for-sale/niger">Niger property for sale</a></li>
                                <li><a href="property-for-sale/ogun">Ogun property for sale</a></li>
                                <li><a href="property-for-sale/ondo">Ondo property for sale</a></li>
                                <li><a href="property-for-sale/osun">Osun property for sale</a></li>
                                <li><a href="property-for-sale/oyo">Oyo property for sale</a></li>
                                <li><a href="property-for-sale/plateau">Plateau property for sale</a></li>
                                <li><a href="property-for-sale/rivers">Rivers property for sale</a></li>
                                <li><a href="property-for-sale/sokoto">Sokoto property for sale</a></li>
                                <li><a href="property-for-sale/taraba">Taraba property for sale</a></li>
                                <li><a href="property-for-sale/yobe">Yobe property for sale</a></li>
                                <li><a href="property-for-sale/zamfara.html">Zamfara property for sale</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5>Rental Property</h5>
                            <ul>
                                <li><a href="property-for-rent/abia">Abia houses for rent</a></li>
                                <li><a href="property-for-rent/abuja">Abuja properties for rent</a></li>
                                <li><a href="property-for-rent/adamawa">Adamawa houses for rent</a></li>
                                <li><a href="property-for-rent/akwa-ibom">Akwa Ibom houses for rent</a></li>
                                <li><a href="property-for-rent/anambra">Anambra houses for rent</a></li>
                                <li><a href="property-for-rent/bauchi">Bauchi houses for rent</a></li>
                                <li><a href="property-for-rent/bayelsa">Bayelsa houses for rent</a></li>
                                <li><a href="property-for-rent/benue">Benue houses for rent</a></li>
                                <li><a href="property-for-rent/borno">Borno houses for rent</a></li>
                                <li><a href="property-for-rent/cross-river">Cross River houses</a></li>
                                <li><a href="property-for-rent/delta">Delta houses for rent</a></li>
                                <li><a href="property-for-rent/ebonyi">Ebonyi houses for rent</a></li>
                                <li><a href="property-for-rent/edo">Edo houses for rent</a></li>
                                <li><a href="property-for-rent/ekiti">Ekiti houses for rent</a></li>
                                <li><a href="property-for-rent/enugu">Enugu houses for rent</a></li>
                                <li><a href="property-for-rent/gombe">Gombe houses for rent</a></li>
                                <li><a href="property-for-rent/imo">Imo houses for rent</a></li>
                                <li><a href="property-for-rent/jigawa">Jigawa houses for rent</a></li>
                                <li><a href="property-for-rent/kaduna">Kaduna houses for rent</a></li>
                                <li><a href="property-for-rent/kano">Kano houses for rent</a></li>
                                <li><a href="property-for-rent/katsina">Katsina houses for rent</a></li>
                                <li><a href="property-for-rent/kebbi">Kebbi houses for rent</a></li>
                                <li><a href="property-for-rent/kogi">Kogi houses for rent</a></li>
                                <li><a href="property-for-rent/kwara">Kwara houses for rent</a></li>
                                <li><a href="property-for-rent/lagos">Lagos houses for rent</a></li>
                                <li><a href="property-for-rent/nassarawa">Nassarawa houses for rent</a></li>
                                <li><a href="property-for-rent/niger">Niger houses for rent</a></li>
                                <li><a href="property-for-rent/ogun">Ogun houses for rent</a></li>
                                <li><a href="property-for-rent/ondo">Ondo houses for rent</a></li>
                                <li><a href="property-for-rent/osun">Osun houses for rent</a></li>
                                <li><a href="property-for-rent/oyo">Oyo houses for rent</a></li>
                                <li><a href="property-for-rent/plateau">Plateau houses for rent</a></li>
                                <li><a href="property-for-rent/rivers">Rivers houses for rent</a></li>
                                <li><a href="property-for-rent/sokoto">Sokoto houses for rent</a></li>
                                <li><a href="property-for-rent/taraba">Taraba houses for rent</a></li>
                                <li><a href="property-for-rent/yobe">Yobe houses for rent</a></li>
                                <li><a href="property-for-rent/zamfara">Zamfara houses for rent</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5>Property Types</h5>
                            <ul>
                                <li><a href="property-for-sale/lagos/ikoyi/index.html">House for sale Ikoyi</a></li>
                                <li><a href="property-for-sale/lagos/ikoyi/flat">Flat for sale Ikoyi</a></li>
                                <li><a href="property-for-sale/lagos/ikoyi/duplex">Duplex for sale Ikoyi</a></li>
                                <li><a href="property-for-sale/lagos/ikoyi/land">Land for sale Ikoyi</a></li>

                                <li><a href="property-for-sale/lagos/lekki/index.html">House for sale Lekki</a></li>
                                <li><a href="property-for-sale/lagos/lekki/flat">Flat for sale Lekki</a></li>
                                <li><a href="property-for-sale/lagos/lekki/duplex">Duplex for sale Lekki</a></li>
                                <li><a href="property-for-sale/lagos/lekki/land">Land for sale Lekki</a></li>

                                <li><a href="property-for-sale/lagos/victoria-island/index.html">House for sale Victoria Island</a></li>
                                <li><a href="property-for-sale/lagos/victoria-island/flat">Flat for sale Victoria Island</a></li>
                                <li><a href="property-for-sale/lagos/victoria-island/duplex">Duplex for sale Victoria Island</a></li>
                                <li><a href="property-for-sale/lagos/victoria-island/land">Land for sale Victoria Island</a></li>

                                <li><a href="property-for-sale/abuja">House for Abuja</a></li>
                                <li><a href="flat-apartment/for-sale-in/abuja">Flat for sale Abuja</a></li>
                                <li><a href="duplex/for-sale-in/abuja">Duplex for sale Abuja</a></li>
                                <li><a href="land/for-sale-in/abuja">Land for sale Abuja</a></li>

                                <li><a href="property-for-sale/lagos/ikeja/index.html">House for sale Ikeja</a></li>
                                <li><a href="property-for-sale/lagos/ikeja/flat">Flat for sale Ikeja</a></li>
                                <li><a href="property-for-sale/lagos/ikeja/duplex">Duplex for sale Ikeja</a></li>
                                <li><a href="property-for-sale/lagos/ikeja/land">Land for sale Ikeja</a></li>

                                <li><a href="property-for-sale/oyo">House for Oyo Ibadan</a></li>
                                <li><a href="flat-apartment/for-sale-in/oyo/ibadan">Flat for sale Ibadan</a></li>
                                <li><a href="property-for-rent/oyo/ibadan">House for rent Ibadan</a></li>
                                <li><a href="land/for-sale-in/oyo/ibadan">Land for sale Ibadan</a></li>

                                <li><a href="office-space/for-rent-in/lagos">Office Space for rent Lagos</a></li>
                                <li><a href="office-space/for-rent-in/abuja">Office Space for rent Abuja</a></li>
                                <li><a href="office-space/for-rent-in/lagos/ikoyi">Ikoyi Office Space for rent</a></li>
                                <li><a href="office-space/for-rent-in/lagos/yaba">Yaba Office Space for rent</a></li>
                                <li><a href="office-space/for-rent-in/lagos/ikeja">Ikeja Office Space for rent</a></li>
                                <li><a href="office-space/for-rent-in/lagos/victoria-island">Office Space for rent VI</a></li>
                                <li><a href="office-space/for-rent-in/oyo/ibadan">Office Space for rent Ibadan</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5>Real Estate Agents</h5>
                            <ul>
                                <li><a href="directorydf99?query=abia">Abia Estate Agents</a></li>
                                <li><a href="directory3ed6?query=abuja">Abuja Estate Agents</a></li>
                                <li><a href="directory9e0f?query=adamawa">Adamawa Estate Agents</a></li>
                                <li><a href="directory7abb?query=akwa-ibom">Akwa Ibom Estate Agents</a></li>
                                <li><a href="directory1b9b?query=anambra">Anambra Estate Agents</a></li>
                                <li><a href="directory7e63?query=bauchi">Bauchi Estate Agents</a></li>
                                <li><a href="directory06f2?query=bayelsa">Bayelsa Estate Agents</a></li>
                                <li><a href="directoryecac?query=benue">Benue Estate Agents</a></li>
                                <li><a href="directory5fea?query=borno">Borno Estate Agents</a></li>
                                <li><a href="directory761d?query=cross-river">Cross River Estate Agents</a></li>
                                <li><a href="directory3493?query=delta">Delta Estate Agents</a></li>
                                <li><a href="directory90df?query=ebonyi">Ebonyi Estate Agents</a></li>
                                <li><a href="directory52ef?query=edo">Edo Estate Agents</a></li>
                                <li><a href="directoryfe6e?query=ekiti">Ekiti Estate Agents</a></li>
                                <li><a href="directory8b33?query=enugu">Enugu Estate Agents</a></li>
                                <li><a href="directorya6ba?query=gombe">Gombe Estate Agents</a></li>
                                <li><a href="directory8080?query=imo">Imo Estate Agents</a></li>
                                <li><a href="directory2532?query=jigawa">Jigawa Estate Agents</a></li>
                                <li><a href="directorycc75?query=kaduna">Kaduna Estate Agents</a></li>
                                <li><a href="directory5228?query=kano">Kano Estate Agents</a></li>
                                <li><a href="directoryf269?query=katsina">Katsina Estate Agents</a></li>
                                <li><a href="directoryc8af?query=kebbi">Kebbi Estate Agents</a></li>
                                <li><a href="directory288c?query=kogi">Kogi Estate Agents</a></li>
                                <li><a href="directory2226?query=kwara">Kwara Estate Agents</a></li>
                                <li><a href="directory3ce7?query=lagos">Lagos Estate Agents</a></li>
                                <li><a href="directory3ed6?query=abuja">Nassarawa Estate Agents</a></li>
                                <li><a href="directory3c02?query=nassarawa">Niger Estate Agents</a></li>
                                <li><a href="directory41a3?query=ogun">Ogun Estate Agents</a></li>
                                <li><a href="directory0b08?query=ondo">Ondo Estate Agents</a></li>
                                <li><a href="directoryea0c?query=osun">Osun Estate Agents</a></li>
                                <li><a href="directory09af?query=oyo">Oyo Estate Agents</a></li>
                                <li><a href="directory5fe2?query=plateau">Plateau Estate Agents</a></li>
                                <li><a href="directory3cf2?query=rivers">Rivers Estate Agents</a></li>
                                <li><a href="directory3372?query=sokoto">Sokoto Estate Agents</a></li>
                                <li><a href="directorydc83?query=taraba">Taraba Estate Agents</a></li>
                                <li><a href="directorya80a?query=yobe">Yobe Estate Agents</a></li>
                                <li><a href="directory53f7?query=zamfara">Zamfara Estate Agents</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer-main container-fluid pt-4 pb-3">
    <div class="row">
        <div class="container  pr-4 pl-4">
            <div class="row">

                <div class="col-md-3">
                    <h5>Company</h5>
                    <div><a href="about">About Us</a></div>
                    <div><a href="contact">Contact Us</a></div>
                    <div><a href="https://blog.hutbay.com/" target="_blank">Hutbay Blog</a></div>
                    <div><a href="digital-services" target="_blank">Marketing Services</a></div>
                    <div><a href="https://help.hutbay.com/">Help/Guides</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Business Products</h5>
                    <div><a href="advertise/index.html">Advertise</a></div>
                    <div><a href="pricing-plans/index.html">Subscription Plans</a></div>
                    <div><a href="http://www.realtywebng.com/" target="_blank">Agent Website</a></div>
                    <div><a href="advertise/developer-plus">Developer Plus</a></div>
                    <div><a href="advertise/ads">Hutbay Ads</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Property Tools</h5>
                    <div><a href="#">Local Info</a></div>
                    <div><a href="signin6315.html">Post a Listing</a></div>
                    <div><a href="post/request.html">Post a Request</a></div>
                    <div><a href="#">Moving Quotes</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Website</h5>

                    <div><a href="tos">Terms of Use</a></div>
                    <div><a href="privacy">Privacy Policy</a></div>

                    <div class="mt-2"><a href="#"><img width="123" src="../files.hutbay.com/images/app-store-badge.png" alt="app store"/></a></div>
                    <div><a href="#"><img width="123" src="../files.hutbay.com/images/google-play-badge.png" alt="google play" /></a></div>

                </div>
            </div>

            <div class="row border-top pt-3 mt-3 footbtm">
                <span class="col-md-6 pl-0">&copy; 2013 - 2021 Hutbay Limited (RC 1138631)</span>
                <span class="col-md-6 text-right">
                    <a href="https://instagram.com/hutbayng" target=_blank class="mr-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/hutbay" target=_blank class="mr-2"><i class="fab fa-twitter"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=2348179006524" target=_blank class="mr-2"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://facebook.com/hutbayng" target=_blank class="mr-2"><i class="fab fa-facebook"></i></a>
                </span>
            </div>
        </div>
    </div>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
<script src="scripts/bootstrap.scripts.combine.min.js"></script>
<script src="scripts/lib/bootstrap-select.min.js"></script>
    </div>
<script type="text/javascript" src="scripts/generic.js"></script>
</body>
</html>
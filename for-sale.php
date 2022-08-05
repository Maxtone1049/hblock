<?php
session_start();
define("ROW_PER_PAGE",10);
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
                        <li class'nav-item '>
                            <a class='nav-link' href='for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item'>
<a class='nav-link' href='#' >Post a Listing</a>
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
                            <a class='nav-link' href='for-sale' style='color: white'>For Sale</a>
                        </li>
                        <li class'nav-item active'>
                            <a class='nav-link' href='for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item'>
<a class='nav-link' href='#'>Post a Listing</a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >Property Request</a>
                            
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
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>For Sale or Buy | Hutblock</title>
<meta name="description" content="Search for property for sale from top estate agents and real estate developers in Nigeria. Browse photos, video, virtual tour and research neighborhoods"/>
<link rel="shortcut icon" href="images/icons/fav-32x32.png"/>
<meta name="author" content="Hutbay Limited."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
<meta name="robots" content="index, follow">
<link rel="search" type="application/opensearchdescription+xml" href="opensearch.xml" title="Hutbay Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta property="og:title" content="For Sale or Buy"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Search for property for sale from top estate agents and real estate developers in Nigeria. Browse photos, video, virtual tour and research neighborhoods"/>

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/post.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
<script>
    Sentry.init({ dsn: 'https://3bb88b37f18e4d2aa08c5570fc68b266@o306584.ingest.sentry.io/5395544' });
</script>
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="scripts/lib/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="css/generic.css">
<link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/account/util.css">
    <link rel="stylesheet" type="text/css" href="css/account/signin.css">
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
            
<div id="uniSearchBar">
    <div class="container">
        <div class="rowSearch">
            <div class="col-12 searchContent">
                <form action="https://www.hutbay.com/search" method="get" id="quickSearch" _lpchecked="1" class="form-group" style="display: inline;">
                    <div id="bookForm" class="row">
                        <div class="col-md-4 pl-1 pr-1">
                            <input class="form-control searchListings" type="text" name="query" placeholder="e.g. Ikoyi, Lagos or Property Reference" autocomplete="off">
                        </div>

                        <div class="sloc searchLoc3 col-md-2 pl-1 pr-1">
                            <select class="form-control" id="AdvertTypes" name="AdvertTypes">
                                <option value="1">For Sale</option>
                                <option value="2">For Rent</option>
                                <option value="3">Shortlet</option>
                                <option value="4">Joint Venture</option>
                            </select>
                        </div>
                        <div class="sloc searchLoc3 col-md-2 pl-1 pr-1">
                            <select class="form-control" id="PropertyTypes" name="PropertyTypes">
                                <option value="">-- all types --</option>
                                <option value="1">Duplex</option>
                                <option value="2">Flat Apartment</option>
                                <option value="3">Terrace</option>
                                <option value="4">Detached</option>
                                <option value="5">Bungalow</option>
                                <option value="6">Studio</option>
                                <option value="7">Semi Detached</option>
                                <option value="8">Mansion</option>
                                <option value="9">Town House</option>
                                <option value="10">Office Space</option>
                                <option value="11">Shop</option>
                                <option value="12">Warehouse</option>
                                <option value="13">Penthouse</option>
                                <option value="14">Land</option>
                                <option value="15">Massionates</option>
                                <option value="16">High Rise</option>
                                <option value="17">Block of Flats</option>
                                <option value="18">Hotel</option>
                                <option value="19">Factory</option>
                                <option value="20">Commercial Property</option>
                                <option value="21">Workspace</option>
                                <option value="23">Mini Flat</option>
                            </select>
                        </div>
                        <div class="sloc searchLoc3 col-md-2 pl-1 pr-1">
                            <select class="form-control" name="MaxPrice">
                                <option value="0">Max Price</option>
                                    <option value="500000">₦500,000</option>
                                    <option value="1000000">₦1,000,000</option>
                                    <option value="1500000">₦1,500,000</option>
                                    <option value="2000000">₦2,000,000</option>
                                    <option value="2500000">₦2,500,000</option>
                                    <option value="3000000">₦3,000,000</option>
                                    <option value="3500000">₦3,500,000</option>
                                    <option value="4000000">₦4,000,000</option>
                                    <option value="4500000">₦4,500,000</option>
                                    <option value="5000000">₦5,000,000</option>
                                    <option value="5500000">₦5,500,000</option>
                                    <option value="6000000">₦6,000,000</option>
                                    <option value="6500000">₦6,500,000</option>
                                    <option value="7000000">₦7,000,000</option>
                                    <option value="7500000">₦7,500,000</option>
                                    <option value="8000000">₦8,000,000</option>
                                    <option value="8500000">₦8,500,000</option>
                                    <option value="9000000">₦9,000,000</option>
                                    <option value="9500000">₦9,500,000</option>
                                    <option value="10000000">₦10,000,000</option>
                                    <option value="10500000">₦10,500,000</option>
                                    <option value="11000000">₦11,000,000</option>
                                    <option value="11500000">₦11,500,000</option>
                                    <option value="12000000">₦12,000,000</option>
                                    <option value="12500000">₦12,500,000</option>
                                    <option value="13000000">₦13,000,000</option>
                                    <option value="13500000">₦13,500,000</option>
                                    <option value="14000000">₦14,000,000</option>
                                    <option value="14500000">₦14,500,000</option>
                                    <option value="15000000">₦15,000,000</option>
                                    <option value="15500000">₦15,500,000</option>
                                    <option value="16000000">₦16,000,000</option>
                                    <option value="16500000">₦16,500,000</option>
                                    <option value="17000000">₦17,000,000</option>
                                    <option value="17500000">₦17,500,000</option>
                                    <option value="18000000">₦18,000,000</option>
                                    <option value="18500000">₦18,500,000</option>
                                    <option value="19000000">₦19,000,000</option>
                                    <option value="19500000">₦19,500,000</option>
                                    <option value="20000000">₦20,000,000</option>
                                    <option value="20500000">₦20,500,000</option>
                                    <option value="21000000">₦21,000,000</option>
                                    <option value="21500000">₦21,500,000</option>
                                    <option value="22000000">₦22,000,000</option>
                                    <option value="22500000">₦22,500,000</option>
                                    <option value="23000000">₦23,000,000</option>
                                    <option value="23500000">₦23,500,000</option>
                                    <option value="24000000">₦24,000,000</option>
                                    <option value="24500000">₦24,500,000</option>
                                    <option value="25000000">₦25,000,000</option>
                                    <option value="25500000">₦25,500,000</option>
                                    <option value="26000000">₦26,000,000</option>
                                    <option value="26500000">₦26,500,000</option>
                                    <option value="27000000">₦27,000,000</option>
                                    <option value="27500000">₦27,500,000</option>
                                    <option value="28000000">₦28,000,000</option>
                                    <option value="28500000">₦28,500,000</option>
                                    <option value="29000000">₦29,000,000</option>
                                    <option value="29500000">₦29,500,000</option>
                                    <option value="30000000">₦30,000,000</option>
                                    <option value="30500000">₦30,500,000</option>
                                    <option value="31000000">₦31,000,000</option>
                                    <option value="31500000">₦31,500,000</option>
                                    <option value="32000000">₦32,000,000</option>
                                    <option value="32500000">₦32,500,000</option>
                                    <option value="33000000">₦33,000,000</option>
                                    <option value="33500000">₦33,500,000</option>
                                    <option value="34000000">₦34,000,000</option>
                                    <option value="34500000">₦34,500,000</option>
                                    <option value="35000000">₦35,000,000</option>
                                    <option value="35500000">₦35,500,000</option>
                                    <option value="36000000">₦36,000,000</option>
                                    <option value="36500000">₦36,500,000</option>
                                    <option value="37000000">₦37,000,000</option>
                                    <option value="37500000">₦37,500,000</option>
                                    <option value="38000000">₦38,000,000</option>
                                    <option value="38500000">₦38,500,000</option>
                                    <option value="39000000">₦39,000,000</option>
                                    <option value="39500000">₦39,500,000</option>
                                    <option value="40000000">₦40,000,000</option>
                                    <option value="40500000">₦40,500,000</option>
                                    <option value="41000000">₦41,000,000</option>
                                    <option value="41500000">₦41,500,000</option>
                                    <option value="42000000">₦42,000,000</option>
                                    <option value="42500000">₦42,500,000</option>
                                    <option value="43000000">₦43,000,000</option>
                                    <option value="43500000">₦43,500,000</option>
                                    <option value="44000000">₦44,000,000</option>
                                    <option value="44500000">₦44,500,000</option>
                                    <option value="45000000">₦45,000,000</option>
                                    <option value="45500000">₦45,500,000</option>
                                    <option value="46000000">₦46,000,000</option>
                                    <option value="46500000">₦46,500,000</option>
                                    <option value="47000000">₦47,000,000</option>
                                    <option value="47500000">₦47,500,000</option>
                                    <option value="48000000">₦48,000,000</option>
                                    <option value="48500000">₦48,500,000</option>
                                    <option value="49000000">₦49,000,000</option>
                                    <option value="49500000">₦49,500,000</option>
                                    <option value="50000000">₦50,000,000</option>
                            </select>
                        </div>
                        <div class="sloc searchLoc2 col-md-2 pl-1 pr-1">
                            <button class="col-auto btn btn-sm btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
           


<div id="contently" class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-8">

                    <div class="row">
                        <h1 id="resultTitle">Results for Property for Sale in Nigeria</h1>
                    </div>
                    <div class="row cardly">
                            <div class="col-md-12 mb-3 pr-0" id="resTitle">
                                <div class="row resTitle">
                                    <span class="col-md-7">Results | For Sale </span>


                                    <span class="action col-md-5 text-sm-right pr-0">
                                        <span class="">
                                            <span class="mr-2">Sort by</span>
                                            <select>
                                                <option>Most recent</option>
                                                <option>Lowest price</option>
                                                <option>highest price</option>
                                            </select>
                                        </span>

                                        <span class="ml-2">
                                            <span href="#">
                                                <i class="fa fa-th-list"></i>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>

<style type="text/css">
                             .try{
                                width:90px;
                                background: #3399ff;
                                text-align:  center;
                                color: white;
                                font-family:arial;
                                letter-spacing:1px;
                                line-height:20px;
                                display: block;
                            }
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.btn-page{margin-right:10px;padding:5px 10px; border: #CCC 1px solid; background:#FFF; border-radius:4px;cursor:pointer;}
.btn-page:hover{background:#F0F0F0;}
.btn-page.current{background:#F0F0F0;}
                        </style>


<?php   
    $search_keyword = '';
    if(!empty($_POST['search']['keyword'])) {
        $search_keyword = $_POST['search']['keyword'];
    }
    $sql = 'SELECT * FROM property_request WHERE availablefor LIKE :keyword ORDER BY id ASC ';
/* Pagination Code starts */
    $per_page_html = '';
    $page = 1;
    $start=0;
    if(!empty($_POST["page"])) {
        $page = $_POST["page"];
        $start=($page-1) * ROW_PER_PAGE;
    }
    $limit=" limit " . $start . "," . ROW_PER_PAGE;
    $pagination_statement = $dbh->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->execute();

    $row_count = $pagination_statement->rowCount();
    if(!empty($row_count)){
        $per_page_html .= "<div class='container' style='text-align:center;margin:20px 0px;'>";
        $page_count=ceil($row_count/ROW_PER_PAGE);
        if($page_count>1) {
            for($i=1;$i<=$page_count;$i++){
                if($i==$page){
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
                } else {
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
                }
            }
        }
        $per_page_html .= "</div>";
    }
    

    $query = $sql.$limit;
    $look = $dbh->prepare($query);
    $look->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $look->execute();
    $result = $look->fetchAll();
?>
 <form name="frmSearch" action="" method="post"> 
<input type='submit' class="try" name='search[keyword]' placeholder="Search property for-rent" value="For Sale" id='keyword' maxlength='40'>

<?php
    if(!empty($result)) { 
foreach($result as $row) { ?>
   

<!-- Commented Ads to applied when customer pays for advanced ads -->
    <!-- <div class="recentLs boosted col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="mediaLink" href="details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330.html" target="_blank">

                        <img data-fancybox="RF40330" title="3 Bedroom Flat Apartment For sale at Maryland, Lagos" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/902d79120a854acaad281d58be528bfb.jpg" src="https://hutbay.blob.core.windows.net/listing-preview/902d79120a854acaad281d58be528bfb.jpg" alt="3 Bedroom Flat Apartment For sale at Maryland, Lagos">


                        <div class="posBottom mediaCount">
                            <span><i class="fa fa-camera"></i> 13 photos</span>

                        </div>


                </a>

                    <div class="boostedAd"><span>Boosted Ad</span></div>
            </div>

                <span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/ff663e0b8282401fbec53e536c613951.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/3963d9dca961440ab759bdc265f56374.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/b6ffa3bd378f4cfba64f6cb2f0ce28a1.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/a3817e49428d409db8c0ee919b5b856d.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/6bff18ec323e47229814b4b003d8f741.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/00183b9909c44dd9959a8494ed95a03e.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/61d0699e3672463e91ca80d67a6de3f6.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/86732023a27b4b75b9ca93b6aa271ea2.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/09345a651ad94dbb8a92be7350a3b3ad.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/fb6f572f744d4f7b90069125d0154c97.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/a35f8429e28646e48e3172d73c1543e9.jpg"></span>
                        <span data-fancybox="RF40330" title="Now Selling At Faith Haven Apartments" data-caption="3 Bedroom Flat Apartment For sale at Maryland, Lagos, Maryland, Lagos <br /><br /> <a href='details/RF40330' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/ac26272d41f0444b8b5486ea6fd1b9c6.jpg"></span>
                </span>

            <div class="col-md-8 col-sm-12 pl-2">
                <div class="row">
                    <div class="col-md-9">
                        <div>
                            <span class="mt-0">

                                <span class="bold">
                                    <a class="price" href="details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330.html" target="_blank">
&#x20A6;55,000,000
                                    </a>
                                </span>
                            </span>

                        </div>


                        <div>
                            <span>
                                    <span class="mr-1"><i class="fa fa-bed"></i> 3 bedrooms</span>
                                    <span class="mr-1"><i class="fa fa-bath"></i> 3 bathrooms</span>
                                        <span class="mr-1"><i class="fas fa-toilet"></i> 3 toilets</span>

                            </span>

                        </div>

                        <p class="pb-0 pt-0">
                            <a href="details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330.html" target="_blank" class="title text-primary mt-0">3 Bedroom Flat Apartment For sale</a>
                        </p>

                        <div>
                            <span class="font-bold">
                                <i class="fa fa-map-marker"></i>

                                Maryland Crescent, Maryland, Lagos
                            </span>
                        </div>
                    </div>
                    <div class="coyLogo col-md-3">
                            <img src="../hutbay.blob.core.windows.net/company-profile/505_5e77f51ed9a84ab3abddf34258fa0e31.jpg" title="Richard Brainsworth Resources Limited" />
                    </div>
                </div>

                <div class="summary row mt-2 mb-2">
                    <p class="col-md-12">The Faith Haven Apartments is a private residential apartments located in one of the most central and accessible part of... | <a href="details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330.html" target="_blank">more details <i class="fa fa-external-link-alt"></i></a></p>
                </div>

                <div>
                    <div class="mt-0">

                        <div>


                            <span class="lsNotifs2">for sale</span>

                                        <span class="lsNotifs"><i class="fas fa-fire"></i> now selling</span>
                                    <span class="lsNotifs3">sponsored</span>

                            <label class="float-right">
                                <i class="fa fa-calendar-alt"></i> 6 months ago
                            </label>

                        </div>

                        <div class="mt-2 mb-0 marketer">
                            <label clss="mb-0">
                                Marketer:
                            </label>
                            <span>
Richard Brainsworth Resources Limited                            </span>


                        </div>
                    </div>

                    <div>
                        <span class="btn-boost" data-fancybox data-type="iframe" href="contact/marketer/RF40330"><i class="fa fa-envelope mr-1"></i> Email</span>
                        <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI/DBC43A25-D06B-41A4-A265-859041FFD8CE"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                        <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI/DBC43A25-D06B-41A4-A265-859041FFD8CE"><i class="mr-1 fab fa-whatsapp"></i> WhatsApp</span>
                        <span class="btn-boost saveListing " hut-ref="RF40330" url="api/dashboards/SaveListing"><i class="fa fa-bookmark mr-1"></i> Save</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    
    <div class="recentLs  col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="mediaLink" href="details/5-bedroom-duplex-for-sale-at-karsana-abuja-RF41884.html" target="_blank">

                        <img data-fancybox="RF41884" title="5 Bedroom Duplex For sale at Karsana, Abuja" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/6de868102f644bdab6666729cff168aa.png" src="https://hutbay.blob.core.windows.net/listing-preview/6de868102f644bdab6666729cff168aa.png" alt="5 Bedroom Duplex For sale at Karsana, Abuja">


                        <div class="posBottom mediaCount">
                            <span><i class="fa fa-camera"></i> 9 photos</span>

                        </div>


                </a>

            </div>

                <span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/fe600a2df0664795a8d84bca6bd5c8a0.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/f2c6f4e79d1f401c985b0c7fa3e142c1.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/62fe7c35118046b28a311f784c3ac8e5.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/5b8746835d84428abeb4f27d11aca987.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/e3e6375a566f4d7fa98666e30a1fee62.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/dea4f3ddb3f1450ca37c9afc64dd56fb.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/bc1d2dfb0d394602961efe168f85a22b.png"></span>
                        <span data-fancybox="RF41884" title="Top Notch 5Bedroom Detached Duplex For Sale" data-caption="5 Bedroom Duplex For sale at Karsana, Abuja, Karsana, Abuja <br /><br /> <a href='details/RF41884' target='_blank'>View Details</a>" data-src="https://hutbay.blob.core.windows.net/listing-big/82ec1ece22a3458180300919946517dd.png"></span>
                </span>

            <div class="col-md-8 col-sm-12 pl-2">
                <div class="row">
                    <div class="col-md-9">
                        <div>
                            <span class="mt-0">
                                <span class="bold">
<a class="price" href="details/3-bedroom-flat-apartment-shortlet-at-victoria-island-lagos-RS38549" target="_blank">
&#x20A6;<?php echo $row['budgetrange'];?>
                                    </a>
                                </span>
                            </span>
                        </div>
                        <div>
                            <span>
<span class="mr-1"><i class="fa fa-bed"></i><?php echo $row['bedroomsnum']?></span>
<span class="mr-1"><i class="fa fa-bath"></i> <?php echo $row['bathroomnum']?></span>
<span class="mr-1"><i class="fas fa-toilet"></i> <?php echo $row['toiletsnum']?></span>
                            </span>
                        </div>
                        <p class="pb-0 pt-0">
                            <a href="details/3-bedroom-flat-apartment-shortlet-at-victoria-island-lagos-RS38549" target="_blank" class="title text-primary mt-0"><?php echo $row['bedroomsnum']?> Bedroom Flat Apartment <?php echo $row['availablefor']?></a>
                        </p>
                        <div>
                            <span class="font-bold">
                                <i class="fa fa-map-marker"></i>
                                <?php echo $row['choosecities']?>
                            </span>
                        </div>
                    </div>
                    <div class="coyLogo col-md-3">
                            <img src="../hutbay.blob.core.windows.net/company-profile/1522_2dfb5ec9f58d4e29a994ec73bee6fd59.jpg" title="<?php echo $row['name']?>" />
                    </div>
                </div>
                <div class="summary row mt-2 mb-2">
                    <p class="col-md-12">Super Luxury <?php echo $row['bedroomsnum']?> bedroom apartment situated at <?php echo $row['choosecities']?>. It has it master bedroom ensuite with ba... | <a href="details/3-bedroom-flat-apartment-shortlet-at-victoria-island-lagos-RS38549" target="_blank">more details <i class="fa fa-external-link-alt"></i></a></p>
                </div>
                <div>
                    <div class="mt-0">
                        <div>
                            <span class="lsNotifs3">shortlet</span>
                                        <span class="lsNotifs">available</span>
                            <label class="float-right">
                                <i class="fa fa-calendar-alt"></i> yesterday
                            </label>
                        </div>
                        <div class="mt-2 mb-0 marketer">
                            <label clss="mb-0">
                                Marketer:
                            </label>
                            <span><?php echo $row['name']?></span>
                        </div>
                    </div>
                    <div>
                        <span class="btn-boost" data-fancybox data-type="iframe" href="contact/marketer/RS38549"><i class="fa fa-envelope mr-1"></i> Email</span>
                        <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI/76D18705-2A2A-4A80-8ABA-CEE775C231FD"><i class="mr-1 fa fa-phone fa-rotate-90"></i> Phone</span>
                        <span class="btn-boost" data-fancybox href="https://api.whatsapp.com/send?phone=<?php echo '+234'.$row['wnum'];?>" data-type="iframe"><i class="mr-1 fab fa-whatsapp"></i> WhatsApp</span>
                        <span class="btn-boost saveListing " hut-ref="RS38549" url="api/dashboards/SaveListing"><i class="fa fa-bookmark mr-1"></i> Save</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
    }
    ?>

    <!-- Listing on for-sale stops here -->

              <?php echo $per_page_html; ?>
          </form>
                    </div>
                    

                </div>


                <div id="sidebar" class="col-md-4">

                    <div class="card pt-0 pb-0 mb-3">
                        <div class="card-group-item">
                            <div class="card-body">
                                <div>Need help with your search?</div>
                                <p class="mb-3 mt-1">Engage the services of local real estate professionals to help with your search. It's faster and it is FREE.</p>
                                <div class="mb-3">
                                    <a href="post/request.html" class="app-button"><i class="far fa-paper-plane"></i> Post a Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card pt-0 pb-0 bg-transparent border-0">
                        <div class="mx-auto mb-3">
                            
<!-- /13234205/HutbayLargeRectangle -->
<div id='div-gpt-ad-1585925456315-0' style='width: 336px; height: 280px;'>
  <script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1585925456315-0'); });
  </script>
</div>
                        </div>
                    </div>

                    <div class="card pt-0 pb-0 mb-3">
                        <div class="card-group-item">
                            <h6><i class="far fa-bell"></i> Email Alert</h6>
                            <div class="card-body">
                                <div>Be the first to know!</div>
                                <p class="mb-3 mt-1">Be the first to know when new listings matching this search is posted. You can set the frequency.</p>
                                <div class="mb-3">
                                    <span class="app-button"><i class="far fa-bell"></i> Create Email Alert</span>
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
                                    <a href="cdn-cgi/l/email-protection#a3d0d6d3d3ccd1d7e3cbd6d7c1c2da8dc0ccce" class="app-button"><i class="far fa-bell"></i> Get FREE Quotes</a>
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
                    <div><a href="#">Advertise</a></div>
                    <div><a href="#">Subscription Plans</a></div>
                    <div><a href="#" target="_blank">Agent Website</a></div>
                    <div><a href="#">Developer Plus</a></div>
                    <div><a href="#">Hutblock Ads</a></div>
                </div>
                <div class="col-md-3">
                    <h5>Property Tools</h5>
                    <div><a href="#">Local Info</a></div>
                    <div><a href="#">Post a Listing</a></div>
                    <div><a href="#">Post a Request</a></div>
                    <div><a href="#">Moving Quotes</a></div>
                </div>
                <div class="col-md-3">
                    <h5>Website</h5>
                    <div><a href="tos">Terms of Use</a></div>
                    <div><a href="privacy">Privacy Policy</a></div>
                    <div class="mt-2"><a href="#"><img width="123" src="images/app-store-badge.png" alt="app store"/></a></div>
                    <div><a href="#"><img width="123" src="images/google-play-badge.png" alt="google play" /></a></div>
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
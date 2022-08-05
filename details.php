<?php
session_start();
error_reporting(0);
include '../includes/dbconnect.php';
if (strlen($_SESSION['obcsuid']>0)) {
$uid=$_SESSION['obcsuid'];
$put= "<header id='nav-generic' class='container-fluid' style='background: #3399ff'>
    <div class='row'>
        <div class='container pl-0 pr-0'>
<nav class='navbar navbar-expand-lg  pl-0 pr-0' >
<a class='navbar-brand' href='..'>
<img src='../images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='../for-sale' style='color: white'>For Sale <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link' href='../for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='../estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='../about' style='color: white'>About Us</a></li>
                        <li class='nav-item'>
<a class='nav-link' href='listing' >Post a Listing</a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='../property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>Account</a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='../dashboard/.' style='color: black'>Dashboard</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='../dashboard/settings' style='color: black'>My Settings</a>
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
<a class='navbar-brand' href='..'>
<img src='../images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='../for-sale' style='color: white'>For Sale</a>
                        </li>
                        <li class='nav-item active'>
                            <a class='nav-link' href='../for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='../estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='../about' style='color: white'>About Us</a></li>
                        <li class='nav-item'>
<a class='nav-link' href='listing'>Post a Listing</a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='../property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>
                                    My Account
                                </a>
<div class='dropdown-menu' aria-labelledby='navAccount'>
<a class='dropdown-item' href='../signin' style='color: black'>Sign In</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='../signup' style='color: black'>Create Account</a>
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
    <head>
        <script src="/cdn-cgi/apps/head/XDQX6hPm8kkpvT5u0sx2V6iQFZ4.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?render=6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU'></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Needed For rent in  Abak | Hutblock</title>
        <meta name="description"/>
        <meta name="author" content="Hutbay Limited."/>
        <meta name="theme-color" content="#15A154"/>
        <meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
        <meta name="robots" content="index, follow">
        <meta name="google-signin-client_id" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com">
        <link rel="apple-touch-icon" sizes="180x180" href="https://files.hutbay.com/images/icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://files.hutbay.com/images/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://files.hutbay.com/images/icons/favicon-16x16.png">
        <link rel="mask-icon" href="https://files.hutbay.com/images/icons/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="https://files.hutbay.com/images/icons/favicon.ico">
        <meta name="theme-color" content="#ffffff">
        <link rel="shortcut icon" href="https://files.hutbay.com/images/icons/favicon-32x32.png"/>
        <meta name="captchaKey" content="6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU">
        <meta name="reCaptcha" content=""/>
        <meta name="email" content="tonymax1049@gmail.com">
        <link rel="search" type="application/opensearchdescription+xml" href="https://www.hutbay.com/opensearch.xml" title="Hutbay Real Estate Search">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta itemprop="image" content="https://files.hutbay.com/images/icons/og-image.png"/>
        <link rel="start" title="Hutbay" href="/"/>
        <meta name="referrer" content="always"/>
        <meta property="fb:app_id" content="373331779398384"/>
        <meta property="og:title" content="Needed For rent in  Abak"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://www.hutbay.com"/>
        <meta property="og:site_name" content="Hutbay Real Estate"/>
        <meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
        <meta property="og:image:width" content="240">
        <meta property="og:image:height" content="240">
        <meta property="og:description"/>
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@hutbay">
        <meta name="twitter:creator" content="@hutbay"/>
        <meta name="twitter:title" content="Needed For rent in  Abak">
        <meta name="twitter:description">
        <meta name="twitter:image" content="https://files.hutbay.com/images/og_image_meta.jpg">
        <meta name="google-signin-clientid" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com"/>
        <meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>
        <script type="application/ld+json">
               
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "https://www.hutbay.com/",
  "logo":"https://files.hutbay.com/images/icons/og-image.png",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.hutbay.com/search?query={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}

        </script>
        <script type="application/ld+json">
            

[{
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Rent",
        "url": "https://www.hutbay.com/for-rent"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Sale",
        "url": "https://www.hutbay.com/for-sale"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Real Estate Agents",
        "url": "https://www.hutbay.com/estate-agents"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Real Estate Blog",
        "url": "https://blog.hutbay.com"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Rent in Lagos",
        "url": "https://www.hutbay.com/property-for-rent/lagos"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Sale in Lagos",
        "url": "https://www.hutbay.com/property-for-sale/lagos"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Rent in Abuja",
        "url": "https://www.hutbay.com/property-for-rent/abuja"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property for Sale in Abuja",
        "url": "https://www.hutbay.com/property-for-sale/abuja"
    },

    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Property Advert",
        "url": "https://www.hutbay.com/advertise/"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Marketing Services",
        "url": "https://www.hutbay.com/digital-services"
    },
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Virtual Reality for Real Estate",
        "url": "https://www.hutbay.com/vr"
    }
]


        </script>
        <script type="application/ld+json">
            
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "HUTBAY.com",
    "url": "https://www.hutbay.com",
    "sameAs": [
        "https://www.twitter.com/hutbay",
        "https://www.facebook.com/hutbayng",
        "https://www.linkedin.com/company/hutbay",
        "https://www.instagram.com/hutbayng"
    ]
}

        </script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://files.hutbay.com/css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://files.hutbay.com/css/jquery.fancybox.min.css"/>
        <link rel="stylesheet" href="https://files.hutbay.com/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://files.hutbay.com/css/bootstrap-select.min.css">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-12701628-8"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-12701628-8');
        </script>
        <script src="https://browser.sentry-cdn.com/5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
        <script>
            Sentry.init({
                dsn: 'https://3bb88b37f18e4d2aa08c5570fc68b266@o306584.ingest.sentry.io/5395544'
            });
        </script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://files.hutbay.com/css/bootstrap-select.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://files.hutbay.com/scripts/lib/bootstrap-select.min.js"></script>
        <!-- STYLE CSS -->
        <link rel="stylesheet" href="https://files.hutbay.com/css/generic.css">
        <link rel="stylesheet" href="https://files.hutbay.com/css/requests.css">
    </head>
    <body>
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="body">
            <header id="nav-generic" class="container-fluid">
                <div class="row">
                    <div class="container pl-0 pr-0">
                        <nav class="navbar navbar-expand-lg  pl-0 pr-0">
                            <a class="navbar-brand" href="/">
                                <img src="https://files.hutbay.com/images/hutbay_logo_243_64.png" alt="hutbay logo"/>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span>
                                    <i class="fa fa-bars"></i>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/for-sale">
                                            For Sale <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/for-rent">To Rent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/estate-agents">Estate Agents</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/post/listing">
                                            Post a Listing <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="/post/request" id="navRequest" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Property Request
                            </a>
                                        <div class="dropdown-menu" aria-labelledby="navRequest">
                                            <a class="dropdown-item" href="/post/request">Post a Request</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/property-requests">View Property Requests</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">maxwell antho...
                                </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                            <a class="dropdown-item" href="/dashboard/feed">Listing Feed</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/dashboard/subscription">Manage Subscription</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/logout">Sign Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <main class="page-content property_info">
                <div id="contently" class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="main-content col-md-8">
                                    <div class="row">
                                        <h1 id="resultTitle">Needed For rent in  Abak</h1>
                                    </div>
                                    <div class="row cardly">
                                        <div class="recentLs col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 pl-4 pr-4 mb-4">
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="row mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="mr-1">Reference</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <span>0A98ILVD</span>
                                                                    <label class="float-right mb-0">
                                                                        <i class="ml-2 fa fa-calendar-alt"></i>
                                                                        one month ago
                                                    
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-md-3">Budget:</div>
                                                                <div class="col-md-9">
                                                                    <span class="price">
                                                                        &#x20A6;20,000<span class="pricePer">/ year</span>
                                                                    </span>
                                                                    <label class="float-right mb-0">Direct, 
Individual                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <div class="col-md-3">Types</div>
                                                                <div class="col-md-9">
                                                                    <span class="title text-primary mt-0">Shop
                                                    </span>
                                                                    <span class="lsNotifs float-right">rent/lease</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-3">Locations:</div>
                                                                <div class="col-md-9 font-bold">Akwa Ibom:
                                                         Abak
                                                    </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-3">Name:</div>
                                                                <div class="col-md-9 font-bold">Erik
                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-3">Phone Number:</div>
                                                                <div class="col-md-9 font-bold">09060718411
                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-3">Email Address:</div>
                                                                <div class="col-md-9 font-bold"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="summary row mt-0 mb-2">
                                                        <div class="col-md-3">Comment:</div>
                                                        <div class="col-md-9">Just for Work</div>
                                                    </div>
                                                </div>
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
                                                    <a href="/post/request" class="app-button">
                                                        <i class="far fa-paper-plane"></i>
                                                        Post a Request
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card pt-0 pb-0 mb-3">
                                        <div class="card-group-item">
                                            <h6>
                                                <i class="fa fa-user"></i>
                                                Find Estate Agents
                                            </h6>
                                            <div class="card-body">
                                                <div>Contact a Local Agent</div>
                                                <p class="mb-3 mt-1">Narrow down to reputable estate agents in the locality of your choice. Send one message to all.</p>
                                                <div class="mb-3">
                                                    <a href="/estate-agents" class="app-button">
                                                        <i class="fa fa-search"></i>
                                                        Find Estate Agents
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card pt-0 pb-0">
                                        <div class="card-group-item">
                                            <h6>
                                                <i class="fas fa-truck-moving"></i>
                                                Moving Soon?
                                            </h6>
                                            <div class="card-body">
                                                <div>Hassle-free moving!</div>
                                                <p class="mb-3 mt-1">Relocate without hassle and within your budget. Start planning today.</p>
                                                <div class="mb-3">
                                                    <a href="/cdn-cgi/l/email-protection#13606663637c6167537b666771726a3d707c7e" class="app-button">
                                                        <i class="far fa-bell"></i>
                                                        Get FREE Quotes
                                                    </a>
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
            <div class="footer-main container-fluid pt-4 pb-3">
                <div class="row">
                    <div class="container  pr-4 pl-4">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Company</h5>
                                <div>
                                    <a href="/about">About Us</a>
                                </div>
                                <div>
                                    <a href="/contact">Contact Us</a>
                                </div>
                                <div>
                                    <a href="https://blog.hutbay.com" target="_blank">Hutbay Blog</a>
                                </div>
                                <div>
                                    <a href="/digital-services" target="_blank">Marketing Services</a>
                                </div>
                                <div>
                                    <a href="https://help.hutbay.com">Help/Guides</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5>Business Products</h5>
                                <div>
                                    <a href="/advertise/">Advertise</a>
                                </div>
                                <div>
                                    <a href="/pricing-plans/">Subscription Plans</a>
                                </div>
                                <div>
                                    <a href="http://www.realtywebng.com/" target="_blank">Agent Website</a>
                                </div>
                                <div>
                                    <a href="/advertise/developer-plus">Developer Plus</a>
                                </div>
                                <div>
                                    <a href="/advertise/ads">Hutbay Ads</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5>Property Tools</h5>
                                <div>
                                    <a href="#">Local Info</a>
                                </div>
                                <div>
                                    <a href="/post/listing">Post a Listing</a>
                                </div>
                                <div>
                                    <a href="/post/request">Post a Request</a>
                                </div>
                                <div>
                                    <a href="#">Moving Quotes</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5>Website</h5>
                                <div>
                                    <a href="/tos">Terms of Use</a>
                                </div>
                                <div>
                                    <a href="/privacy">Privacy Policy</a>
                                </div>
                                <div class="mt-2">
                                    <a href="#">
                                        <img width="123" src="https://files.hutbay.com/images/app-store-badge.png" alt="app store"/>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img width="123" src="https://files.hutbay.com/images/google-play-badge.png" alt="google play"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top pt-3 mt-3 footbtm">
                            <span class="col-md-6 pl-0">&copy;2013 - 2021 Hutbay Limited (RC 1138631)</span>
                            <span class="col-md-6 text-right">
                                <a href="https://instagram.com/hutbayng" target=_blank class="mr-2">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://twitter.com/hutbay" target=_blank class="mr-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=2348179006524" target=_blank class="mr-2">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://facebook.com/hutbayng" target=_blank class="mr-2">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script type="text/javascript" src="https://files.hutbay.com/scripts/jquery.combine.min.js"></script>
            <script src="https://files.hutbay.com/scripts/bootstrap.scripts.combine.min.js"></script>
            <script src="https://files.hutbay.com/scripts/lib/bootstrap-select.min.js"></script>
        </div>
        <script type="text/javascript" src="https://files.hutbay.com/scripts/generic.js"></script>
    </body>
</html>

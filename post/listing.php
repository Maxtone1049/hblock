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

<html>
    <head>
        <script src="/cdn-cgi/apps/head/XDQX6hPm8kkpvT5u0sx2V6iQFZ4.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?render=6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU'></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Post Listing | Hutblock</title>
        <meta name="description" content="Advertise your properties on Nigeria&#x27;s leading real estate portal."/>
       <link rel="shortcut icon" href="../images/icons/fav-32x32.png"/>
<meta name="author" content="Hutblock Properties."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutblock Properties."/>
<meta name="robots" content="index, follow">
<link rel="search" type="application/opensearchdescription+xml" href="../opensearch.xml" title="Hutblock Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta name="referrer" content="always"/>
<meta property="fb:app_id" content="373331779398384"/>
<meta property="og:title" content="Request for Property in Nigerian"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<link rel="shortcut icon" href="../images/icons/fav-32x32.png"/>
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Post a property request (to buy, rent, shortlet or joint venture) and engage local real estate agents/professionals in Nigeria to help you quickly find your ideal property."/>

<meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../css/jquery.fancybox.min.css"/>
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/bootstrap-select.min.css">
        <!-- STYLE CSS -->
        <link rel="stylesheet" href="../css/generic.css">
        <link rel="stylesheet" href="../css/post.css">
        <link rel="stylesheet" href="../css/datepicker.min.css">
         <link rel="stylesheet" type="text/css" href="../css/account/util.css">
    <link rel="stylesheet" type="text/css" href="../css/account/signin.css">
        <!-- Start of Async Drift Code -->
        <script>
            "use strict";

            !function() {
                var t = window.driftt = window.drift = window.driftt || [];
                if (!t.init) {
                    if (t.invoked)
                        return void (window.console && console.error && console.error("Drift snippet included twice."));
                    t.invoked = !0,
                    t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e),
                            t.push(n),
                            t;
                        }
                        ;
                    }
                    ,
                    t.methods.forEach(function(e) {
                        t[e] = t.factory(e);
                    }),
                    t.load = function(t) {
                        var e = 3e5
                          , n = Math.ceil(new Date() / e) * e
                          , o = document.createElement("script");
                        o.type = "text/javascript",
                        o.async = !0,
                        o.crossorigin = "anonymous",
                        o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    }
                    ;
                }
            }();
            drift.SNIPPET_VERSION = '0.3.1';
            drift.load('7c936uud9mdh');

            try {
                $(document).ready(function() {
                    var email = $("meta[name='email']").attr('content');

                    // https://devdocs.drift.com/docs/contact-properties

                    drift.on('ready', function() {
                        //drift.api.setUserAttributes({email: email}) 
                        drift.identify(email, {
                            email: email
                        })
                    })
                });
            } catch {
            }
        </script>
    </head>
    <body>
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="body">
            <div style="width: 100%">
                    <?php
                    if ($_SESSION['obcsuid']>0) {
                        echo $put;
                    }else {
                        echo $out;
                    }
                    
                    ?>
                </div>
            <div id="modalContent"></div>
                      <div class="modal fade" id="ModalBankAcct" aria-labelledby="ModalBankAcctTitle">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background: #FCFCFC;border: 1px solid green !important;">
                        <div class="modal-header" style="">
                            <h6 id="ModalBankAcctTitle" class="modal-title" style="width: 100%;text-align: center;">Bank Account Details</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div style="" class="modal-body">
                            <p style="font-size: 1em !important;color: #505050;line-height: 22px;text-align: center;" class="mt-2">
                                Invoice Reference: <span class="mbaReference">{Reference}</span>
                                <br/>
                                Pay the sum of <span class="mbaAmount" style="font-weight: bold;font-size: 1.1em;">{Amount}</span>
                                to the following bank account. Our support
                    staff will follow-up on your order within 12 hours: 
                
                            </p>
                            <table style="margin: 0 auto;" class="mb-4 mt-3">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Account Name: </strong>
                                        </td>
                                        <td>Hutbay Limited</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Account Number: </strong>
                                        </td>
                                        <td>1013616714</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Bank (Nigeria): </strong>
                                        </td>
                                        <td>Zenith Bank Plc</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="post" class="container">
                <div class="wrapper">
                    <form id="postListing" class="selectpicker areYouSure">
                        <div class="steps clearfix wizard">
                            <div class="f1-progress">
                                <div class="f1-progress-line"></div>
                            </div>
                            <ul role="tablist">
                                <li role="tab" aria-disabled="false" class="first current" aria-selected="true">
                                    <a id="wizard-t-0" href="post/listing" aria-controls="wizard-p-0">
                                        <img src="https://files.hutbay.com/images/details-icon.png" alt="">
                                        <span class="step-order">Details</span>
                                    </a>
                                </li>
                                <li role="tab" aria-disabled="false" class="done" aria-selected="false">
                                    <a id="wizard-t-1" href="post/media" aria-controls="wizard-p-1">
                                        <img src="https://files.hutbay.com/images/add-photo-icon.png" alt="">
                                        <span class="step-order">Media</span>
                                    </a>
                                </li>
                                <li role="tab" aria-disabled="false" class="last done" aria-selected="false">
                                    <a id="wizard-t-3" href="post/description" aria-controls="wizard-p-3">
                                        <img src="https://files.hutbay.com/images/details-complete-icon2.png" alt="">
                                        <span class="step-order">Description</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="content clearfix">
                            <!-- SECTION 1 -->
                            <h4 id="wizard-h-0" tabindex="-1" class="title current"></h4>
                            <section id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="false" style="">
                                <h3>Property Details</h3>
                                <div class="gentleAlert row">
                                    <h5>Important notice</h5>
                                    <p>We do not allow the posting or marketing of properties that you do not have the legal authority to do so. Should we suspect potential scam or are reported to,
                            we reserve the right to notify security operatives and share your information to the authorities before account is permanently closed. Thank you for your honesty.
                        </p>
                                </div>
                                <div class="serverMessage row"></div>
                                <div class="form-row row">
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Listing Title</span>
                                        <input class="form-control" id="Title" maxlength="70" name="Title" placeholder="e.g. 4 Bedroom Serviced Duplex with BQ" type="text" value=""/>
                                        <input id="ListingRef" name="ListingRef" type="hidden" value=""/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-holder col-md-6 pl-0 pr-0">
                                            <span class="help-block text-muted">Advertising For</span>
                                            <select class="form-control" data-val="true" data-val-range="Select type of Advert (is it forsale, tolet, etc?)" data-val-range-max="4" data-val-range-min="1" data-val-required="Select the type of Advert" id="AdvertTypeId" name="AdvertTypeId">
                                                <option value="">--select--</option>
                                                <option value="1">For sale</option>
                                                <option value="2">For rent</option>
                                                <option value="3">Shortlet</option>
                                                <option value="4">Joint Venture</option>
                                            </select>
                                        </div>
                                        <div class="form-holder col-md-6 pr-0">
                                            <span class="help-block text-muted">Property Type</span>
                                            <select class="form-control" data-val="true" data-val-range="Select valid Property Type" data-val-range-max="23" data-val-range-min="1" data-val-required="Property Type field is required" id="PropertyTypeId" name="PropertyTypeId">
                                                <option value="">--select--</option>
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
                                                <option value="15">Maisonettes</option>
                                                <option value="16">High Rise</option>
                                                <option value="17">Block of Flats</option>
                                                <option value="18">Hotel</option>
                                                <option value="19">Factory</option>
                                                <option value="20">Commercial Property</option>
                                                <option value="21">Workspace</option>
                                                <option value="22">Mini Flat</option>
                                                <option selected="selected" value="23">House</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Use of Property</span>
                                        <select class="form-control" data-val="true" data-val-range="Select valid Use of Property" data-val-range-max="7" data-val-range-min="1" data-val-required="Select Use(s) of Property" id="PropertyUseId" name="PropertyUseId">
                                            <option value="">--select--</option>
                                            <option value="1">Residential</option>
                                            <option value="2">Commercial</option>
                                            <option value="3">Either Residential or Commercial</option>
                                            <option value="4">Educational</option>
                                            <option value="5">Religious</option>
                                            <option selected="selected" value="6">Unspecified</option>
                                            <option value="7">Shortlet</option>
                                        </select>
                                    </div>
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Market Status</span>
                                        <select class="form-control" data-val="true" data-val-range="Select valid Market Status" data-val-range-max="7" data-val-range-min="1" data-val-required="Market Status is required" id="MarketStatusId" name="MarketStatusId">
                                            <option value="1">Available</option>
                                            <option value="2">Now Selling</option>
                                            <option value="3">Coming Soon</option>
                                            <option value="4">Unavailable</option>
                                            <option value="5">Sold Out</option>
                                            <option value="6">SOLD</option>
                                            <option value="7">Rented / Leased</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="row"/>
                                <div class="explainer row">
                                    <p>Provide information on location of property</p>
                                </div>
                                <div class="form-row row">
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Country</span>
                                        <select class="form-control" data-val="true" data-val-required="The CountryId field is required." id="CountryId" name="CountryId">
                                            <option selected="selected" value="5">Nigeria</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group col-md-6">
                                        <div class="form-holder col-md-6 pr-0 pl-0">
                                            <span class="help-block text-muted">State</span>
                                            <select class="form-control" data-val="true" data-val-required="Select the STATE Property is Located" id="StateId" name="StateId">
                                                <option value="">--select--</option>
                                                <option value="1">Abia</option>
                                                <option value="37">Abuja</option>
                                                <option value="2">Adamawa</option>
                                                <option value="3">Akwa Ibom</option>
                                                <option value="4">Anambra</option>
                                                <option value="5">Bauchi</option>
                                                <option value="6">Bayelsa</option>
                                                <option value="7">Benue</option>
                                                <option value="8">Borno</option>
                                                <option value="9">Cross River</option>
                                                <option value="10">Delta</option>
                                                <option value="11">Ebonyi</option>
                                                <option value="12">Edo</option>
                                                <option value="13">Ekiti</option>
                                                <option value="14">Enugu</option>
                                                <option value="15">Gombe</option>
                                                <option value="16">Imo</option>
                                                <option value="17">Jigawa</option>
                                                <option value="18">Kaduna</option>
                                                <option value="19">Kano</option>
                                                <option value="20">Katsina</option>
                                                <option value="21">Kebbi</option>
                                                <option value="22">Kogi</option>
                                                <option value="23">Kwara</option>
                                                <option value="24">Lagos</option>
                                                <option value="25">Nassarawa</option>
                                                <option value="26">Niger</option>
                                                <option value="27">Ogun</option>
                                                <option value="28">Ondo</option>
                                                <option value="29">Osun</option>
                                                <option value="30">Oyo</option>
                                                <option value="31">Plateau</option>
                                                <option value="32">Rivers</option>
                                                <option value="33">Sokoto</option>
                                                <option value="34">Taraba</option>
                                                <option value="35">Yobe</option>
                                                <option value="36">Zamfara</option>
                                            </select>
                                        </div>
                                        <div class="form-holder col-md-6 pr-0">
                                            <span class="help-block text-muted">City</span>
                <select class="form-control" data-val="true" data-val-required="Select the City Property is Located" id="CityId" name="CityId">
                                                <option value="">--select--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Property Address</span>
                                        <input class="form-control" data-val="true" data-val-required="The Address/Location is required" id="Address" name="Address" placeholder="e.g. 70 Maitama Close" type="text" value=""/>
                                    </div>
                                    <div class="form-holder col-md-6">
                                        <span class="help-block text-muted">Show address to viewers?</span>
                                        <div class="checkbox">
                                            <label>
                                                <input checked="checked" data-val="true" data-val-required="The ShowAddress field is required." id="ShowAddress" name="ShowAddress" type="radio" value="True"/>
                                                YES, show it (recommended)
                                    <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input id="ShowAddress" name="ShowAddress" type="radio" value="False"/>
                                                NO, do not
                                    <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="row"/>
                                <div class="form-row row">
                                    <div class="form-group form-groupLeft">
                                        <div class="form-holder col-md-6 pr-0 pl-0">
                                            <span class="help-block text-muted">Currency</span>
                                            <select class="form-control" data-val="true" data-val-range="Select valid Currency" data-val-range-max="3" data-val-range-min="1" data-val-required="Currency field is required" id="CurrencyId" name="CurrencyId">
                                                <option selected="selected" value="1">&#x20A6;- Nigerian Naira</option>
                                                <option value="2">$ - US Dollar</option>
                                                <option value="3">&#xA3;- British Pound</option>
                                            </select>
                                        </div>
                                        <div class="form-holder col-md-6 pr-0">
                                            <span class="help-block text-muted">Price</span>
                                            <input class="form-control digits" data-val="true" data-val-number="The field Price must be a number." data-val-required="The Price field is required." id="Price" name="Price" placeholder="Price" type="text" value="0"/>
                                        </div>
                                    </div>
                                    <div class="form-group form-group">
                                        <div class="form-holder col-md-6">
                                            <span class="help-block text-muted">Price Per What?</span>
                                            <select class="form-control" data-val="true" data-val-range="Select valid Price per What" data-val-range-max="12" data-val-range-min="1" data-val-required="Price per Whats is required" id="PricePerWhatId" name="PricePerWhatId">
                                                <option value="">--select--</option>
                                                <option selected="selected" value="1">not applicable</option>
                                                <option value="2">unit</option>
                                                <option value="3">year</option>
                                                <option value="4">half yr</option>
                                                <option value="5">month</option>
                                                <option value="6">week</option>
                                                <option value="7">day</option>
                                                <option value="8">night</option>
                                                <option value="9">square meter</option>
                                                <option value="10">plot</option>
                                                <option value="11">hectare</option>
                                                <option value="12">acre</option>
                                            </select>
                                        </div>
                                        <div class="form-holder col-md-6">
                                            <span class="help-block text-muted">Show Price to Viewers?</span>
                                            <div class="checkbox">
                                                <label>
                                                    <input checked="checked" data-val="true" data-val-required="The ShowPrice field is required." id="ShowPrice" name="ShowPrice" type="radio" value="True"/>
                                                    Yes (recommended)
                                        <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input id="ShowPrice" name="ShowPrice" type="radio" value="False"/>
                                                    No Don't
                                        <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="row"/>
                                <div class="form-row row">
                                    <div class="form-group form-groupLeft col-md-6">
                                        <div class="form-holder col-md-6 pr-0 pl-0">
                                            <span class="help-block text-muted">No of Bedrooms</span>
                                            <input class="form-control numeric" id="NoBed" name="NoBed" placeholder="No of bedrooms" type="text" value=""/>
                                        </div>
                                        <div class="form-holder col-md-6 pr-0">
                                            <span class="help-block text-muted">No of Bathrooms</span>
                                            <input class="form-control intFloat" data-val="true" data-val-number="The field NoBath must be a number." id="NoBath" name="NoBath" placeholder="No of bathrooms" type="text" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-holder col-md-6 pr-0 pl-0">
                                            <span class="help-block text-muted">No of Toilets</span>
                                            <input class="form-control intFloat" data-val="true" data-val-number="The field NoToilets must be a number." id="NoToilets" name="NoToilets" placeholder="No of toilets" type="text" value=""/>
                                        </div>
                                        <div class="form-holder col-md-6 pr-0">
                                            <span class="help-block text-muted">Year Built</span>
                                            <input class="form-control numeric" data-val="true" data-val-range="The field YearBuilt must be between 1900 and 2021." data-val-range-max="2021" data-val-range-min="1900" id="YearBuilt" name="YearBuilt" placeholder="Year property was built" type="text" value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="explainer row">
                                    <p>Select the available facilities at this property</p>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group form-groupLeft">
                                        <div class="form-holder col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input data-val="true" data-val-required="The StandByGenerator field is required." id="StandByGenerator" name="StandByGenerator" type="checkbox" value="true"/>
                                                    24/7 Electricity
                                        <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input data-val="true" data-val-required="The HaveWater field is required." id="HaveWater" name="HaveWater" type="checkbox" value="true"/>
                                                    Water Facility
                                        <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-holder col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input data-val="true" data-val-required="The IsFurnished field is required." id="IsFurnished" name="IsFurnished" type="checkbox" value="true"/>
                                                    Furnished
                                        <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input data-val="true" data-val-required="The IsServicedListing field is required." id="IsServicedListing" name="IsServicedListing" type="checkbox" value="true"/>
                                                    Serviced
                                        <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-holder col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input data-val="true" data-val-required="The OutdoorPool field is required." id="OutdoorPool" name="OutdoorPool" type="checkbox" value="true"/>
                                                    Swimming Pool
                                        <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input data-val="true" data-val-required="The ParkingSpace field is required." id="ParkingSpace" name="ParkingSpace" type="checkbox" value="true"/>
                                                    Parking Space
                                        <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-holder col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input data-val="true" data-val-required="The Elevator field is required." id="Elevator" name="Elevator" type="checkbox" value="true"/>
                                                    Elevator
                                        <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input data-val="true" data-val-required="The Gym field is required." id="Gym" name="Gym" type="checkbox" value="true"/>
                                                    Gym
                                        <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="row"/>
                                <div class="form-row row">
                                    <div class="form-group form-groupLeft col-md-6">
                                        <div class="form-holder mr0">
                                            <span class="help-block text-muted">Total Area</span>
                                            <input class="form-control intFloat" data-val="true" data-val-number="The field TotalAreaSize must be a number." id="TotalAreaSize" name="TotalAreaSize" placeholder="Total Area" type="text" value="0"/>
                                        </div>
                                        <div class="form-holder">
                                            <span class="help-block text-muted">Total Area Unit</span>
                                            <select class="form-control" data-val="true" data-val-required="The TotalAreaSizeUnitId field is required." id="TotalAreaSizeUnitId" name="TotalAreaSizeUnitId">
                                                <option selected="selected" value="1">sqm</option>
                                                <option value="2">hectares</option>
                                                <option value="3">acres</option>
                                                <option value="4">plots</option>
                                                <option value="5">sqft</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-holder mr0">
                                            <span class="help-block text-muted">Covered Area</span>
                                            <input class="form-control intFloat" data-val="true" data-val-number="The field CoveredAreaSize must be a number." id="CoveredAreaSize" name="CoveredAreaSize" placeholder="Covered Area" type="text" value="0"/>
                                        </div>
                                        <div class="form-holder">
                                            <span class="help-block text-muted">Covered Area Unit</span>
                                            <select class="form-control" data-val="true" data-val-required="The CoveredAreaSizeUnitId field is required." id="CoveredAreaSizeUnitId" name="CoveredAreaSizeUnitId">
                                                <option selected="selected" value="1">sqm</option>
                                                <option value="2">hectares</option>
                                                <option value="3">acres</option>
                                                <option value="4">plots</option>
                                                <option value="5">sqft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <hr class="row"/>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination" class="">
                                <li>
                                    <button type="submit" class="app-button" url="/api/posts/listing" nextAction="/post/media">
                                        <i class="fas fa-spin fa-spinner"></i>
                                        Save &Continue
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <input name="StandByGenerator" type="hidden" value="false"/>
                        <input name="HaveWater" type="hidden" value="false"/>
                        <input name="IsFurnished" type="hidden" value="false"/>
                        <input name="IsServicedListing" type="hidden" value="false"/>
                        <input name="OutdoorPool" type="hidden" value="false"/>
                        <input name="ParkingSpace" type="hidden" value="false"/>
                        <input name="Elevator" type="hidden" value="false"/>
                        <input name="Gym" type="hidden" value="false"/>
                    </form>
                </div>
            </div>
            <footer class="footer-basic-centered">
                <p class="footer-links">
                    <a href="/">Home</a>
                    <a href="advertise" target="_blank">Advertise</a>
                    <a href="http://blog.hutbay.com" target="_blank">Blog</a>
                    <a href="pricing-plans" target="_blank">Subscription Plans</a>
                    <a href="about" target="_blank">About</a>
                    <a href="tos" target="_blank">Terms of Use</a>
                    <a href="contact" target="_blank">Contact Us</a>
                </p>
                <p class="footer-company-name">&copy;2013 - 2021 Hutbay Limited (RC 1138631)</p>
            </footer>
            <script type="text/javascript" src="../scripts/jquery.combine.min.js"></script>
            <script src="../scripts/bootstrap.scripts.combine.min.js"></script>
            <script src="../scripts/lib/bootstrap-select.min.js"></script>
        </div>
        <script src="../scripts/lib/loadingoverlay.min.js"></script>
        <script type="text/javascript" src="../scripts/lib/datepicker.min.js"></script>
        <script type="text/javascript" src="../scripts/generic.js"></script>
        <script type="text/javascript" src="../scripts/post.js"></script>
    </body>
</html>

<?php
session_start();
error_reporting(0);
include('../includes/dbconnect.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:../logout.php');
  } else{

$uid=$_SESSION['obcsuid'];
$sql=" SELECT * FROM  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{  $cnt=$cnt+1;}
}             
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Listing Feed | Hutblock</title>
<meta name="description"/>
<meta name="author" content="Hutbay Limited."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#ffffff">
<meta name="email" content="tonymax1049@gmail.com">
<link rel="search" type="application/opensearchdescription+xml" href="https://www.hutbay.com/opensearch.xml" title="Hutbay Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta itemprop="image" content="../images/icons/og-image.png"/>
<link rel="start" title="Hutbay" href="/"/>
<meta name="referrer" content="always"/>
<meta property="fb:app_id" content="373331779398384"/>
<meta property="og:title" content="Listing Feed"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="../css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="../css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-select.min.css">
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
        <link href="https://fonts.googleapis.com/css?family=Open&#x2B;Sans" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery.mCScrollbar.min.css">
        <link rel="stylesheet" href="../css/generic.min.css">
        <link rel="stylesheet" href="../css/sidebar-dashboard.min.css">
        <link rel="stylesheet" href="../css/dashboard.css">
    </head>
    <body>
        <div id="modalContent"></div>
        <!-- Modal Alert -->
        <div id="ModalAlert" class="modal fade">
            <div class="modal-dialog modal-alert">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="fal fa-times"></i>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p id="ModalAlertMessage">Doy ou really want to perform this action?.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Model Alert ends-->
        <!-- Modal Thank You -->
        <div id="ModalSuccess" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="fal fa-check"></i>
                        </div>
                        <h4 class="modal-title w-100">Success!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="ModalSuccessMessage">Your submission is successful.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Model Success ends-->
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
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="body">
            <input type="hidden" id="_email" value="tonymax1049@gmail.com"/>
            <input type="hidden" id="_firstname" value="maxwell"/>
            <input type="hidden" id="_lastname" value="anthony"/>
            <input type="hidden" id="_phoneno" value="09060718411"/>
            <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                  <?php include_once('includes/sidebar.php'); ?>
                <!-- sidebar-content  -->
                <main class="page-content property_info">
                    <div id="contently" class="container-fluid">
                        <div class="row card cardly">
                            <h3>Listing Feed (updates from your cities)</h3>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/land-for-sale-at-idinmu-lagos-LF42035" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/e9265ccbf2834b018cadf58c7e5ee015.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;165,000,000                </span>
                                            <label class="float-right">
                                                Tony Attah Real Estate Co...
                    | <i class="fa fa-calendar-alt"></i>
                                                yesterday
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/land-for-sale-at-idinmu-lagos-LF42035" target="_blank" class="text-primary mt-0">Land For sale at Idinmu, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Arida Bus Stop, Idimu, Idinmu, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/LF42035">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="LF42035" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/5-bedroom-detached-for-sale-at-lekki-lagos-RF42034" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/ee1c94340eda435f95f6945debcee240.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;120,000,000                </span>
                                            <label class="float-right">
                                                Tony Attah Real Estate Co...
                    | <i class="fa fa-calendar-alt"></i>
                                                yesterday
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/5-bedroom-detached-for-sale-at-lekki-lagos-RF42034" target="_blank" class="text-primary mt-0">5 Bedroom Detached For sale at Lekki, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Lekki County Estate, Ikota, Lekki, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42034">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42034" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/4-bedroom-terrace-for-sale-at-anthony-lagos-RF40331" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/da016cced0c64da6bd4f2caad798754e.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;70,000,000                </span>
                                            <label class="float-right">
                                                Richard Brainsworth Resou...
                    | <i class="fa fa-calendar-alt"></i>
                                                7 months ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/4-bedroom-terrace-for-sale-at-anthony-lagos-RF40331" target="_blank" class="text-primary mt-0">4 Bedroom Terrace For sale at Anthony, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Ajao Estate, Anthony, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF40331">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=DBC43A25-D06B-41A4-A265-859041FFD8CE">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=DBC43A25-D06B-41A4-A265-859041FFD8CE">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF40331" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/902d79120a854acaad281d58be528bfb.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;55,000,000                </span>
                                            <label class="float-right">
                                                Richard Brainsworth Resou...
                    | <i class="fa fa-calendar-alt"></i>
                                                7 months ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/3-bedroom-flat-apartment-for-sale-at-maryland-lagos-RF40330" target="_blank" class="text-primary mt-0">3 Bedroom Flat Apartment For sale at Maryland, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Maryland Crescent, Maryland, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF40330">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=DBC43A25-D06B-41A4-A265-859041FFD8CE">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=DBC43A25-D06B-41A4-A265-859041FFD8CE">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF40330" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/land-for-sale-at-ikotun-lagos-LF42036" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/118393e32fdb40139ff5b8e0baf211b1.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;500,000,000                </span>
                                            <label class="float-right">
                                                Tony Attah Real Estate Co...
                    | <i class="fa fa-calendar-alt"></i>
                                                yesterday
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/land-for-sale-at-ikotun-lagos-LF42036" target="_blank" class="text-primary mt-0">Land For sale at Ikotun, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Along LASU-Igando Expressway, Ikotun, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/LF42036">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="LF42036" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/commercial-property-for-sale-at-egbeda-lagos-CF42074" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/6cec11b1bd894fb0ac982387ca26e75b.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;7,000,000                </span>
                                            <label class="float-right">
                                                Tony attah
                    | <i class="fa fa-calendar-alt"></i>
                                                58 minutes ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/commercial-property-for-sale-at-egbeda-lagos-CF42074" target="_blank" class="text-primary mt-0">Commercial Property For sale at Egbeda, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Egbeda market, Egbeda Lagos, Egbeda, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/CF42074">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=6505222b-96bf-4f8d-a739-2581fc322d20">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=6505222b-96bf-4f8d-a739-2581fc322d20">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="CF42074" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/5-bedroom-duplex-for-sale-at-lekki-lagos-RF42071" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/21f9d246e544459a8b9c0ab720f3c93b.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;130,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                4 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/5-bedroom-duplex-for-sale-at-lekki-lagos-RF42071" target="_blank" class="text-primary mt-0">5 Bedroom Duplex For sale at Lekki, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Ikota Lekki, Lekki, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42071">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42071" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/office-space-for-rent-at-ikeja-lagos-CT42004" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/0d6ca847b5394a5680ad250af1218ef2.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;6,000,000                </span>
                                            <span class="ml-2">per year
                    </span>
                                            <label class="float-right">
                                                Treasure Magnus
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/office-space-for-rent-at-ikeja-lagos-CT42004" target="_blank" class="text-primary mt-0">Office Space For rent at Ikeja, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Airport Road, Ikeja, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/CT42004">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=53090ff9-45d6-4b7d-8cc1-85db66df37d5">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=53090ff9-45d6-4b7d-8cc1-85db66df37d5">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="CT42004" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/4-bedroom-duplex-for-sale-at-ajah-lagos-RF42017" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/c224a2db514545a5b1ff572961ab1ad8.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;75,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/4-bedroom-duplex-for-sale-at-ajah-lagos-RF42017" target="_blank" class="text-primary mt-0">4 Bedroom Duplex For sale at Ajah, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Ajah, Ajah, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42017">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42017" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/4-bedroom-semi-detached-for-sale-at-eti-osa-lagos-RF42002" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/3fb768d7b9294763b5068acd8f4892ef.jpeg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;50,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/4-bedroom-semi-detached-for-sale-at-eti-osa-lagos-RF42002" target="_blank" class="text-primary mt-0">4 Bedroom Semi Detached For sale at Eti Osa, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Ajah, Lekki, Eti Osa, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42002">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42002" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/2-bedroom-flat-apartment-for-sale-at-agungi-lagos-RF42018" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/13930567c50b43aa9bd966975df65cd6.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;42,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/2-bedroom-flat-apartment-for-sale-at-agungi-lagos-RF42018" target="_blank" class="text-primary mt-0">2 Bedroom Flat Apartment For sale at Agungi, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Agungi Lekki, Agungi, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42018">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42018" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/4-bedroom-duplex-for-sale-at-lekki-lagos-RF42014" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/233f41cd46b1441882afddfae5693b83.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;85,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/4-bedroom-duplex-for-sale-at-lekki-lagos-RF42014" target="_blank" class="text-primary mt-0">4 Bedroom Duplex For sale at Lekki, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Eleganza Lekki, Lekki, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42014">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42014" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/5-bedroom-duplex-for-sale-at-lekki-lagos-RF41631" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/ad2df9a777cb4f068ea330dd62376364.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;140,000,000                </span>
                                            <label class="float-right">
                                                Blue planet real estate  ...
                    | <i class="fa fa-calendar-alt"></i>
                                                5 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/5-bedroom-duplex-for-sale-at-lekki-lagos-RF41631" target="_blank" class="text-primary mt-0">5 Bedroom Duplex For sale at Lekki, Lagos</a>
                                        </p>
                                        <div>
                                            <span>Agungi Lekki, Lekki, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF41631">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=3da03b96-158d-4265-bc82-b9de748b0180">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF41631" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/4-bedroom-duplex-for-sale-at-gwarinpa-abuja-RF42070" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/0a0cc3ae064b427abf99117e2d95c328.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;165,000,000                </span>
                                            <label class="float-right">
                                                Rhema Properties
                    | <i class="fa fa-calendar-alt"></i>
                                                6 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/4-bedroom-duplex-for-sale-at-gwarinpa-abuja-RF42070" target="_blank" class="text-primary mt-0">4 Bedroom Duplex For sale at Gwarinpa, Abuja</a>
                                        </p>
                                        <div>
                                            <span>Gwarinpa, Abuja, Gwarinpa, Abuja
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/RF42070">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=108b4155-d0a7-4b6d-8b77-743e577b135a">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=108b4155-d0a7-4b6d-8b77-743e577b135a">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="RF42070" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/land-for-sale-at-abule-egba-lagos-LFQ6AB968P" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/a21f6febc562446d835213b715eb029d.jpg" alt="property">
                                    </a>
                                    <div class="media-body ml-2">
                                        <span class="mt-0">
                                            <span class="price bold">&#x20A6;4,000,000                </span>
                                            <span class="ml-2">per plot
                    </span>
                                            <label class="float-right">
                                                Tony Attah Real Estate Co...
                    | <i class="fa fa-calendar-alt"></i>
                                                12 hours ago
                
                                            </label>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/land-for-sale-at-abule-egba-lagos-LFQ6AB968P" target="_blank" class="text-primary mt-0">Land For sale at Abule Egba, Lagos</a>
                                        </p>
                                        <div>
                                            <span>off Olota/Captain Road, Abule Egba, Lagos
                </span>
                                            <span class="float-right">
                                                <span class="btn-boost" data-fancybox data-type="iframe" href="/contact/marketer/LFQ6AB968P">
                                                    <i class="fa fa-envelope"></i>
                                                    Email
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetPhoneNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-phone fa-rotate-90"></i>
                                                    Phone
                                                </span>
                                                <span class="btn-boost" data-fancybox data-type="ajax" data-src="/directory/GetWhatsAppNoUI?id=F4BC3315-B1E8-40A4-AFE3-D9558D275C36">
                                                    <i class="fa fa-info-circle"></i>
                                                    WhatsApp
                                                </span>
                                                <span class="btn-boost saveListing " hut-ref="LFQ6AB968P" url="/api/dashboards/SaveListing">
                                                    <i class="fa fa-bookmark mr-1"></i>
                                                    Save
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more col-md-12">
                                <div class="float-right">
                                    <div class="pagination-container">
                                        <ul class="pagination">
                                            <li class="page-item active">
                                                <span class="page-link">1</span>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=2&amp;count=15">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=3&amp;count=15">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=4&amp;count=15">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=5&amp;count=15">5</a>
                                            </li>
                                            <li class="page-item disabled PagedList-ellipses">
                                                <a>&#8230;</a>
                                            </li>
                                            <li class="page-item PagedList-skipToNext">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=2&amp;count=15" rel="next">></a>
                                            </li>
                                            <li class="page-item PagedList-skipToLast">
                                                <a class="page-link" href="/dashboard/feed?&amp;page=1694&amp;count=15">>></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- page-content" -->
            </div>
        </div>
        <script type="text/javascript" src="../scripts/jquery.combine.min.js"></script>
        <script src="../scripts/bootstrap.scripts.combine.min.js"></script>
        <script src="../scripts/lib/bootstrap-select.min.js"></script>
        <script src="../scripts/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../scripts/lib/loadingoverlay.min.js"></script>
        <script src="../scripts/generic.js"></script>
        <script src="../scripts/dashboard/main.js"></script>
        <script src="../scripts/dashboard.js"></script>
        <script src="../scripts/order.js"></script>
    </body>
</html>

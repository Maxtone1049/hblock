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
        <title>Settings | Hutblock</title>
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
        <meta property="og:title" content="Manage Settings - Dashboard"/>
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
        <script src="../browser.sentry-cdn.com/5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
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
        <?php include_once('includes/acc.php'); ?>
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="body">
            <input type="hidden" id="_email" value="tonymax1049@gmail.com"/>
            <input type="hidden" id="_firstname" value="maxwell"/>
            <input type="hidden" id="_lastname" value="anthony"/>
            <input type="hidden" id="_phoneno" value="09060718411" style="color:blue" />
            <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <?php include_once('includes/sidebar.php'); ?>
                <!-- sidebar-content  -->
                <main class="page-content property_info">
                    <div id="contently" class="container-fluid">
                        <div class="row">
                            <form id="accountSettings" class="col-md-12">
                                <div class="mb-0">
                                    <div class="mt-2">
                                        <h3 class="mb-3">Email Notification Settings</h3>
                                        <p class="mb-3">Use your account settings to specify type of communications and deals you want to receive from HUTBAY.
                    </p>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Hutbay Weekly</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The Weeklies field is required." id="Weeklies" name="Weeklies" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="Weeklies">Curated highlights of real estate news</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Property Alerts</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The PropertyAlerts field is required." id="PropertyAlerts" name="PropertyAlerts" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="PropertyAlerts">New listings that match your saved properties</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Real Estate Reports</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The RealEstateReport field is required." id="RealEstateReport" name="RealEstateReport" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="RealEstateReport">Special reports on the Real Estate Sector</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Matching Property Requests</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The PropertyRequest field is required." id="PropertyRequest" name="PropertyRequest" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="PropertyRequest">Property request leads in your areas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Listing Approval</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The ListingApproval field is required." id="ListingApproval" name="ListingApproval" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="ListingApproval">Notify when listing is approved</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Listing Broadcast</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The ListingBroadcast field is required." id="ListingBroadcast" name="ListingBroadcast" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="ListingBroadcast">Send me promotional property Ads</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Listing in Service Areas</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The ListingServiceAreas field is required." id="ListingServiceAreas" name="ListingServiceAreas" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="ListingServiceAreas">Latest listings in your service areas</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="help-block text-muted small-font">Promotions and Deals</span>
                                                <div class="custom-control custom-switch">
                                                    <input checked="checked" class="settings custom-control-input" data-val="true" data-val-required="The MarketingEmail field is required." id="MarketingEmail" name="MarketingEmail" type="checkbox" value="True"/>
                                                    <label class="custom-control-label" for="MarketingEmail">Email on deals and promotions</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input name="Weeklies" type="hidden" value="false"/>
                                <input name="PropertyAlerts" type="hidden" value="false"/>
                                <input name="RealEstateReport" type="hidden" value="false"/>
                                <input name="PropertyRequest" type="hidden" value="false"/>
                                <input name="ListingApproval" type="hidden" value="false"/>
                                <input name="ListingBroadcast" type="hidden" value="false"/>
                                <input name="ListingServiceAreas" type="hidden" value="false"/>
                                <input name="MarketingEmail" type="hidden" value="false"/>
                            </form>
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
            </body>
</html>

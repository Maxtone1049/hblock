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
        <title>Active Listings | Hutbay</title>
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
        <meta property="og:title" content="Active Listings"/>
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
        <meta name="twitter:title" content="Active Listings">
        <meta name="twitter:description">
        <meta name="twitter:image" content="https://files.hutbay.com/images/og_image_meta.jpg">
        <meta name="google-signin-clientid" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com"/>
        <meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>
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
                            <h3 class="border-0">Active Listings</h3>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="listings">Active Listings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard/listings/drafts">Drafts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="listings/pending-approval">Pending Approval</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="listings/sold-rented">Unavailable</a>
                                </li>
                            </ul>
                            <div class="recentLs col-md-12 pl-0">
                                <div class="media align-items-center">
                                    <a href="/details/RT41920" target="_blank">
                                        <img src="https://hutbay.blob.core.windows.net/listing-preview/777b365566844d168b88cea5d0ff217c.jpg" data-lity data-lity-target="https://hutbay.blob.core.windows.net/listings/777b365566844d168b88cea5d0ff217c.jpg" alt="media">
                                    </a>
                                    <div class="media-body ml-2 pt-0">
                                        <span class="mt-0">
                                            <span class="price bold">
                                                &#x20A6;60,000
<span class="pricePer">/ year</span>
                                            </span>
                                            <span class="float-right toggleBtns">
                                                <span class="custom-control custom-switch mr-4" data-toggle="tooltip" data-placement="top" title="Change market availability">
                                                    <input name="IsPublished" type="checkbox" data="RT41920" class="custom-control-input changeStatusBtn" data="RT41920" id="x-RT41920" value="true" checked="checked">
                                                    <label class="custom-control-label" for="x-RT41920">Available</label>
                                                </span>
                                                <span class="custom-control custom-switch" data-toggle="tooltip" data-placement="top" title="Change publish status">
                                                    <input name="IsPublished" type="checkbox" data="RT41920" class="custom-control-input publishBtn" data="RT41920" id="RT41920" value="true" checked="checked">
                                                    <label class="custom-control-label" for="RT41920">Publish</label>
                                                </span>
                                            </span>
                                        </span>
                                        <p class="pb-0 pt-0">
                                            <a href="/details/RT41920" target="_blank" class="mt-0">Self Contained</a>
                                        </p>
                                        <div>
                                            <span>Abiakpo Ntak Inyang, Ikot ekpene, Ikot Ekpene, Akwa Ibom.</span>
                                            <span class="float-right">
                                                <a href="/subscription/order" data="RT41920" class="boostLs btn-boost" data-toggle="modal" data-placement="top" title="Boost to reach more audience">
                                                    <i class="fa fa-bolt"></i>
                                                    Boost
                                                </a>
                                                <span class="btn-boost refreshListing" data="RT41920" data-toggle="tooltip" data-placement="top" title="Mark listing as available and NEWLY UPDATED">
                                                    <i class="fas fa-sync"></i>
                                                    Refresh
                                                </span>
                                                <span class="dropdown show">
                                                    <span class="show btn-boost" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </span>
                                                    <span class="dropdown-menu dropdown-menu-right mt-0">
                                                        <a class="dropdown-item text-dark" href="/post/published/RT41920" target="_blank">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a class="dropdown-item text-dark" href="/dashboard/reporting/RT41920">
                                                            <i class="fa fa-chart-line"></i>
                                                            Stats
                                                        </a>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="text-muted">
                                            <span>Added: 13-Oct-2021 | Last Updated: 2 days ago</span>
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
        <script type="text/javascript" src="https://files.hutbay.com/scripts/jquery.combine.min.js"></script>
        <script src="https://files.hutbay.com/scripts/bootstrap.scripts.combine.min.js"></script>
        <script src="https://files.hutbay.com/scripts/lib/bootstrap-select.min.js"></script>
        <script src="https://files.hutbay.com/scripts/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="https://files.hutbay.com/scripts/lib/loadingoverlay.min.js"></script>
        <script src="https://files.hutbay.com/scripts/generic.js"></script>
        <script src="https://files.hutbay.com/scripts/dashboard/main.js"></script>
        <script type="text/javascript" src="https://js.paystack.co/v1/inline.js"></script>
        <script src="https://files.hutbay.com/scripts/dashboard.js"></script>
        <script src="https://files.hutbay.com/scripts/order.js"></script>
        <input type="hidden" id="PSKey" value="pk_live_aafb4588c7053437c6f0bf4c43e222dfe6795d44"/>
    </body>
</html>

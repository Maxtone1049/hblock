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
        <script src="/cdn-cgi/apps/head/XDQX6hPm8kkpvT5u0sx2V6iQFZ4.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?render=6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU'></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Saved Listings | Hutblock</title>
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
        <meta property="og:title" content="Saved Listings"/>
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
                <main class="page-content property_info">
                    <div id="contently" class="container-fluid">
                        <div class="row card cardly">
                            <h3>Your Saved Listings</h3>
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

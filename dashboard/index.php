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
        <title>Dashboard | Hutblock</title>
        <meta name="description"/>
        <meta name="author" content="Hutblockng Limited."/>
        <meta name="theme-color" content="#15A154"/>
        <meta name="Copyright" content="Copyright (c) 2021 Hutblockng Limited."/>
        <meta name="robots" content="index, follow">
        <meta name="theme-color" content="#ffffff">
<link rel="search" type="application/opensearchdescription+xml" href="https://www.hutblockng.com/opensearch.xml" title="Hutblockng Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <link rel="icon" type="image/png" sizes="32x32" href="../images/icons/fav-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/icons/fav-16x16.png">
        <meta itemprop="image" content="../images/icons/hut.png"/>
        <link rel="start" title="Hutbay" href="/"/>
        <meta name="referrer" content="always"/>
        <meta property="fb:app_id" content="373331779398384"/>
        <meta property="og:title" content="Dashboard"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://www.hutbay.com"/>
        <meta property="og:site_name" content="Hutbay Real Estate"/>
        <meta property="og:image" content="../images/icons/hut.png">
        <meta property="og:image:width" content="240">
        <meta property="og:image:height" content="240">
        <meta property="og:description"/>
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
                <?php
include_once('includes/sidebar.php');

 ?>
                <!-- sidebar-content  -->
                <main class="page-content property_info">
                    <div id="contently" class="container-fluid">
                        <div class="row cardly">
                            <h3>
                                <?php echo $row->fname."'s"?> Office Space
            
                                <span class="help">
                                    <span>Help Line:</span>
                                    <a href="https://api.whatsapp.com/send?phone=2348179006524&amp;text=Hello%20HUTBLOCK.com" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        +234 817 900 6524
                                    </a>
                                </span>
                            </h3>
                            <div class="col-md-12 mb-2 mt-2 pl-0">Welcome back <?php echo $row->fname.' ' .$row->lname ?></div>
                            <a href="/post/listing" class="welcome2 col-md-4 text-center">
                                <div>
                                    <i class="far fa-building"></i>
                                </div>
                                <div>Post a Listing</div>
                            </a>
                            <a href="subscription" class="welcome2 col-md-4 text-center">
                                <div>
                                    <i class="fas fa-money-check-alt"></i>
                                </div>
                                <div>Manage Subscriptions</div>
                            </a>
                            <a href="website/" class="welcome2 col-md-4 text-center">
                                <div>
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div>Manage Website</div>
                            </a>
                        </div>

                        <!-- User_listings_Preview -->
                        <div id="recentLs" class="row card cardly">
                            <h3>Your Recent Listings</h3>
                            <div id="recentCont">
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
                                                            <a class="dropdown-item text-dark" href="reporting/RT41920">
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
                            </div>
                            <div class="more col-md-12">
                                <div>
                                    <a href="listings">See more...</a>
                                </div>
                            </div>
                        </div>

                        <!-- User's_Listings_ends_here -->
                        <div class="row card cardly">
                            <h3>Latest from Your Service Areas</h3>
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
                            <div class="more col-md-12">
                                <div>
                                    <a href="feed">See everything...</a>
                                </div>
                            </div>
                        </div>
                        <div class="row cardly">
                            <div id="blogRss" class="col-md-6 pl-0">
                                <h3>
                                    News and Update <span class="loader"></span>
                                </h3>
                                <div class="blogRss"></div>
                                <div class="more">
                                    <div>
                                        <a href="http://blog.hutbay.com" target="_blank">
                                            Visit blog... <i class="fa fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="forumRss" class="col-md-6">
                                <h3>
                                    Latest from Help &Support Center <span class="loader"></span>
                                </h3>
                                <div class="forumRss"></div>
                                <div class="more">
                                    <div>
                                        <a href="http://help.hutbay.com" target="_blank">
                                            Visit Helo Center... <i class="fa fa-external-link-alt"></i>
                                        </a>
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
        <input type="hidden" id="PSKey" value="pk_live_aafb4588c7053437c6f0bf4c43e222dfe6795d44"/>
    </body>
</html>

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
        <title> Profile | Hutblock</title>
      <meta name="description" content="Search for property for sale from top estate agents and real estate developers in Nigeria. Browse photos, video, virtual tour and research neighborhoods"/>
<link rel="shortcut icon" href="../images/icons/fav-32x32.png"/>
        <meta name="theme-color" content="#ffffff">
<link rel="search" type="application/opensearchdescription+xml" href="https://www.hutbay.com/opensearch.xml" title="Hutbay Real Estate Search">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
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
  
            <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="body">
            <input type="hidden" id="_email" value="<?php echo $row->email?>"/>
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
                        <div class="row">
                            <div class="col-sm-12 property_info">
                                <form class="areYouSure selectpicker">
                                    <h3 class="">Profile Information</h3>
                                    <div class="serverMessage"></div>
                                    <div class="form-group mb-0">
                                        <div class="mt-2">
                                            <div class="form-box  mb-3 pb-3 border-bottom">
                                                <div class="form--title">Profile Picture</div>
                                                <div class="gentleAlert mt-1 mb-2">
<p class="font-bold">Increase online credibility and generate more leads by adding professionally-looking profile photo to help boost your listing and profile. We recommend photo showing mostly your face and clearly.</p>
                                                </div>
                                                <div class="upload--img-area">
                                                    <div class="preview--img">
                                                        <img src="https://hutbay.blob.core.windows.net/user-detail/8201_592ced4459024302aff156b02dfbdac3.jpg" id="output--img" class="output--img profile-img-one">
                                                    </div>
                                                    <a class="btn btn--primary upload-profile-img ml-5 mr-3">
                                                        <i class="fas fa-spinner fa-spin"></i>
                                                        Upload
                                                    </a>
                                                    <a href="#" class="btn delete--img delete-profile-img">
                                                        <i class="fa fa-times"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">First name</span>
                                                    <input class="form-control" data-val="true" data-val-required="The FirstName field is required." id="FirstName" name="FirstName" placeholder="Your first name" type="text" value="maxwell"/>
                                                </div>
                                                <div class="col-sm-6 pt-0">
                                                    <span class="help-block text-muted small-font">Last name</span>
                                                    <input class="form-control" data-val="true" data-val-required="The LastName field is required." id="LastName" name="LastName" placeholder="Your last name" type="text" value="anthony"/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">Primary phone no</span>
                                                    <input class="form-control" data-val="true" data-val-phone="The PhoneNo field is not a valid phone number." data-val-required="The PhoneNo field is required." id="PhoneNo" name="PhoneNo" placeholder="Your phone number" type="text" value="09060718411"/>
                                                </div>
                                                <div class="col-sm-6 pt-0">
                                                    <span class="help-block text-muted small-font">
                                                        Email address 
                                                        <span>
                                                            (<a href="/account/updateEmail" target="blank">Change</a>
                                                            )
                                                        </span>
                                                    </span>
                                                    <input class="form-control" id="Email" name="Email" readonly="readonly" type="text" value="tonymax1049@gmail.com"/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">WhatsApp phone no</span>
                                                    <input class="form-control" data-val="true" data-val-phone="The MessagingPhoneNo field is not a valid phone number." id="MessagingPhoneNo" name="MessagingPhoneNo" type="text" value=""/>
                                                </div>
                                                <div class="col-sm-6 pt-0">
                                                    <span class="help-block text-muted small-font">Alternate Email
                                </span>
                                                    <input class="form-control" data-val="true" data-val-email="The SecondaryEmail field is not a valid e-mail address." id="SecondaryEmail" name="SecondaryEmail" placeholder="Alternate email address" type="text" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-sm-6">
                                                <a href="/profile/maxwell" target="_blank">View Your Profile Page</a>
                                            </div>
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="checkbox" id="isPro" class="mr-2"/>I am a real estate professional
                                                </label>
                                                <button class="btn btn-lg float-right app-button submitForm" form-id="saveProfile" url="/api/dashboards/SaveProfile">
                                                    <i class="fas fa-spinner  fa-spin"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form class="areYouSure hide isPro">
                                    <h3 class="">Company Profile Information</h3>
                                    <div class="gentleAlert font-bold mt-3 mb-2">
                                        <p class="font-bold">Only fill this form if you are a practicing real estate professional operating under with duly registered business with the Corporate Affairs Commission. Please ensure all information are valid. </p>
                                    </div>
                                    <div class="serverMessage"></div>
                                    <div class="form-group mb-0">
                                        <div class="mt-2">
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">Company Name</span>
                                                    <input class="form-control" data-val="true" data-val-required="The CompanyName field is required." id="CompanyName" name="CompanyName" placeholder="Company name" type="text" value=""/>
                                                </div>
                                                <div class="col-sm-6 pt-0">
                                                    <span class="help-block text-muted small-font">Company Phone</span>
                                                    <input class="form-control" data-val="true" data-val-phone="The CompanyPhoneNo field is not a valid phone number." data-val-required="The CompanyPhoneNo field is required." id="CompanyPhoneNo" name="CompanyPhoneNo" placeholder="Office phone no" type="text" value=""/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">Category</span>
                                                    <select class="form-control" data-val="true" data-val-required="The CompanyCategoryId field is required." id="CompanyCategoryId" name="CompanyCategoryId">
                                                        <option value="">--select--</option>
                                                        <option value="1">Brokerage</option>
                                                        <option value="2">Estate Agent</option>
                                                        <option value="3">Law Firm</option>
                                                        <option value="4">Developer</option>
                                                        <option value="5">Marketer</option>
                                                        <option value="6">Moving Company</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">Website</span>
                                                    <input class="form-control" id="Website" name="Website" placeholder="Website adress" type="text" value=""/>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 pt-0">
                                                    <span class="help-block text-muted small-font">Country</span>
                                                    <select class="form-control" data-val="true" data-val-required="The CountryId field is required." id="CountryId" name="CountryId">
                                                        <option selected="selected" value="5">Nigeria</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">State</span>
                                                    <select class="form-control" data-val="true" data-val-required="The StateId field is required." id="StateId" name="StateId">
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
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">City</span>
                                                    <select class="form-control" data-val="true" data-val-required="The CityId field is required." id="CityId" name="CityId">
                                                        <option value="">--select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span class="help-block text-muted small-font">Address</span>
                                                    <input class="form-control" data-val="true" data-val-required="The CompanyAddress field is required." id="CompanyAddress" name="CompanyAddress" placeholder="Office Address" type="text" value=""/>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-group mb-2">
                                                <span class="help-block">About Us</span>
                                                <textarea class="form-control profile" id="AboutUs" name="AboutUs" placeholder="About company..." value=""></textarea>
                                            </div>
                                            <div class="form-group mb-2  mt-4">
                                                <span class="help-block">Our Services</span>
                                                <textarea class="form-control profile" id="ServiceDescription" name="ServiceDescription" placeholder="Services..." value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6 offset-md-6">
                                            <button class="btn btn-lg float-right app-button submitForm" url="/api/dashboards/SaveCompanyProfile">
                                                <i class="fas fa-spinner fa-spin"></i>
                                                Save
                        
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
        <script type="text/javascript" src="../scripts/dropzone.js"></script>
        <script type="text/javascript" src="https://js.paystack.co/v1/inline.js"></script>
        <script src="../scripts/dashboard.js"></script>
        <script src="../scripts/order.js"></script>
        </body>
</html>

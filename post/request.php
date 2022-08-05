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
<a class='nav-link' href='#' >Post a Listing</a>
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
<a class='dropdown-item' href='../dashboard/dashboard' style='color: black'>Dashboard</a>
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
<a class='nav-link' href='#'>Post a Listing</a>
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
<div class='dropdown-menu'aria-labelledby='navAccount'>
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


if(isset($_POST['load']))  
{
    $uid=$_SESSION['obcsuid'];
    $propertyu=$_POST['pid'];
    $proptype=$_POST['ptype'];
    $advert=$_POST['afor'];
    $state=$_POST['sts'];
    $city=$_POST['csc'];
    $bednum=$_POST['bnum'];
    $bathnum=$_POST['banum'];
    $toilnum=$_POST['tonum'];
    $currency=$_POST['cur'];
    $budgrange=$_POST['bud'];
    $budkind=$_POST['budk'];
    $deadline=$_POST['del'];
    $comment=$_POST['coms'];
    $name=$_POST['name'];
    $phone=$_POST['ph'];
    $email=$_POST['email'];
    $reales=$_POST['rss'];
    $requestpat=$_POST['rpat'];
    $hemail=$_POST['hmil'];
    $notify=$_POST['nty'];
    $Reference= $_POST['ref'];
  
$sql="INSERT INTO property_request(reference,propertyneed,propertytype,availablefor,stateid,choosecities,bedroomsnum,bathroomnum,toiletsnum,currency,budgetrange,budgetkind,deadline,comment,nameid,phone,email,realstate,requestpattern,hideemail,notify) 
Values(:ref, :pid, :ptype, :afor, :sts, :csc, :bnum, :banum, :tonum, :cur, :bud, :budk, :del, :coms, :name, :ph, :email, :rss, :rpat, :hmil, :nty)";

$query = $dbh->prepare($sql);
$query->bindParam(':pid',$propertyu,PDO::PARAM_STR);
$query->bindParam(':ptype',$proptype,PDO::PARAM_STR);
$query->bindParam(':afor',$advert,PDO::PARAM_STR);
$query->bindParam(':sts',$state,PDO::PARAM_STR);
$query->bindParam(':csc',$city,PDO::PARAM_STR);
$query->bindParam(':bnum',$bednum,PDO::PARAM_STR);
$query->bindParam(':banum',$bathnum,PDO::PARAM_STR);
$query->bindParam(':tonum',$toilnum,PDO::PARAM_STR);
$query->bindParam(':cur',$currency,PDO::PARAM_STR);
$query->bindParam(':bud',$budgrange,PDO::PARAM_STR);
$query->bindParam(':budk',$budkind,PDO::PARAM_STR);
$query->bindParam(':del',$deadline,PDO::PARAM_STR);
$query->bindParam(':coms',$comment,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':ph',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':rss',$reales,PDO::PARAM_STR);
$query->bindParam(':rpat',$requestpat,PDO::PARAM_STR);
$query->bindParam(':hmil',$hemail,PDO::PARAM_STR);
$query->bindParam(':nty',$notify,PDO::PARAM_STR);
$query->bindParam(':ref',$Reference,PDO::PARAM_STR);
$query->execute();

$lastin = $dbh->lastInsertId();
if($lastin){
$msg= '<script>alert("Request Sent Successfully, Our Agent will Get Back to You Shortly")</script>';
echo("<script type='text/javascript'> setTimeout(function(){window.location.href = '../.';}, 3000);</script>");
}
else
{
    $msg=" Error Sending Request, Try Again";
}

}
?>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Request for Property in Nigerian | Hutblock</title>
<meta name="description" content="Post a property request (to buy, rent, shortlet or joint venture) and engage local real estate agents/professionals in Nigeria to help you quickly find your ideal property."/>
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

<script src="../5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
   <!-- STYLE CSS -->
    <link rel="stylesheet" href="../css/generic.css">
    <link rel="stylesheet" href="../css/post.css">
    <link rel="stylesheet" href="../css/datepicker.min.css">
     <link rel="stylesheet" type="text/css" href="../css/account/util.css">
    <link rel="stylesheet" type="text/css" href="../css/account/signin.css">
    
<!-- Start of Async Drift Code -->


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
        
        <div id="modalContent"></div>
 
<style>
    .f1-progress-line {
        width: 50%;
    }
</style>
<div id="post">
<div class="wrapper">
<form id="postRequest" class="wizard selectpicker" method="post">
<div class="steps clearfix">
    <div class="f1-progress">
        <div class="f1-progress-line"></div>
    </div>
    <ul role="tablist">
        <li role="tab" aria-disabled="false" class="first current" aria-selected="true">
            <a id="wizard-t-0" href="#wizard-h-0" aria-controls="wizard-p-0">
                <img src="../images/details-icon.png" alt=""> <span class="step-order">Details</span>
            </a>
        </li>
                    <!-- <li role="tab" aria-disabled="false" class="done" aria-selected="false">
                        <a id="wizard-t-1" href="#wizard-h-1" aria-controls="wizard-p-1">
                            <img src="../images/message-sent-icon.png" alt=""><span class="step-order">Done</span>
                        </a>
                    </li> -->
    </ul>
</div>
<div class="content clearfix">
    <!-- SECTION 1 -->
    <h4 id="wizard-h-0" tabindex="-1" class="title current"></h4>
    <section id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="false" style="">
        <h3>Post a Property Request</h3>
        <p style="font-size:15px; border-radius:12px;color:#fff; width:70%;height: 90px; margin:auto; text-align:center; margin-bottom:6px; background-color:white;color: #000"> <?php if($msg){
    echo $msg;
  }  ?> </p>
        <div class="gentleAlert row">
            <p>
                Fill this form so top estate agents help you with your property request. The more detailed your request, 
                the better we can channel your request to the appropriate estate agents who can attend to you.
            </p>
        </div>
        <div class="serverMessage row"></div>
        <div class="form-row row">
            <?php
            //code to generate random number for property request;
            $alph = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = '';
            for ($i=0; $i < 25; $i++) { 
                $code .= $alph[rand(0,90)];
            }
            ?>
            <div class="form-holder col-md-6">
<input class="form-control numeric" name="ref" placeholder="Reference Number" type="text" value="<?php echo $code;?>" hidden/>
                <span class="help-block text-muted">I need a property for:</span>
<select class="form-control" data-val="true"  id="propid" name="pid" required>
<option value="">--select--</option>
<option value="Residential use">Residential use</option>
<option value="Commercial use">Commercial use</option>
<option value="Either Residential or Commercial use">Either Residential or Commercial use</option>
<option value="Educational use">Educational use</option>
<option value="Religious use">Religious use</option>
<option selected="selected" value="Unspecified use">Unspecified use</option>
<option value="Shortlet use">Shortlet use</option>
</select>
            </div>
            <div class="form-group col-md-6">
                <div class="form-holder col-md-6 pl-0 pr-0">
                    <span class="help-block text-muted">Property Type</span>
<select class="form-control" id="proptype" multiple="multiple" name="ptype" required>
<option value="Duplex">Duplex</option>
<option value="Flat Apartment">Flat Apartment</option>
<option value="Terrace">Terrace</option>
<option value="Detached">Detached</option>
<option value="Bungalow">Bungalow</option>
<option value="Studio">Studio</option>
<option value="Semi Detached">Semi Detached</option>
<option value="Mansion">Mansion</option>
<option value="Town House">Town House</option>
<option value="Office Space">Office Space</option>
<option value="Shop">Shop</option>
<option value="Warehouse">Warehouse</option>
<option value="Penthouse">Penthouse</option>
<option value="Land">Land</option>
<option value="Maisonettes">Maisonettes</option>
<option value="High Rise">High Rise</option>
<option value="Block of Flats">Block of Flats</option>
<option value="Hotel">Hotel</option>
<option value="Factory">Factory</option>
<option value="Commercial Property">Commercial Property</option>
<option value="Workspace">Workspace</option>
<option value="Mini Flat">Mini Flat</option>
<option value="House">House</option>
</select>

                </div>
                <div class="form-holder col-md-6 pr-0">
                    <span class="help-block text-muted">Available For</span>
<select class="form-control" data-val="true" id="adtype" name="afor" required>
    <option value="">--select--</option>
<option value="For sale">For sale</option>
<option value="For rent">For rent</option>
<option value="Shortlet">Shortlet</option>
<option value="Joint Venture">Joint Venture</option>
</select>
      </div>
            </div>
        </div>

        <div class="form-row row">
            <div class="form-holder col-md-6">
                <span class="help-block text-muted">State</span>
<select class="form-control" data-val="true" id="state" name="sts" required>
    <option value="">--select--</option>
<option value="Abia">Abia</option>
<option selected="selected" value="Abuja">Abuja</option>
<option value="Adamawa">Adamawa</option>
<option value="Akwa Ibom">Akwa Ibom</option>
<option value="Anambra">Anambra</option>
<option value="Bauchi">Bauchi</option>
<option value="Bayelsa">Bayelsa</option>
<option value="Benue">Benue</option>
<option value="Borno">Borno</option>
<option value="Cross River">Cross River</option>
<option value="Delta">Delta</option>
<option value="Ebonyi">Ebonyi</option>
<option value="Edo">Edo</option>
<option value="Ekiti">Ekiti</option>
<option value="Enugu">Enugu</option>
<option value="Gombe">Gombe</option>
<option value="Imo">Imo</option>
<option value="Jigawa">Jigawa</option>
<option value="Kaduna">Kaduna</option>
<option value="Kano">Kano</option>
<option value="Katsina">Katsina</option>
<option value="Kebbi">Kebbi</option>
<option value="Kogi">Kogi</option>
<option value="Kwara">Kwara</option>
<option value="Lagos">Lagos</option>
<option value="Nasarawa">Nasarawa</option>
<option value="Niger">Niger</option>
<option value="Ogun">Ogun</option>
<option value="Ondo">Ondo</option>
<option value="Osun">Osun</option>
<option value="Oyo">Oyo</option>
<option value="Plateau">Plateau</option>
<option value="Rivers">Rivers</option>
<option value="Sokoto">Sokoto</option>
<option value="Taraba">Taraba</option>
<option value="Yobe">Yobe</option>
<option value="Zamfara">Zamfara</option>
</select>
            </div>
           <div class="form-holder col-md-6">
<span class="help-block text-muted">City</span>
<input type="text" class="form-control" id="city" name="csc" required>
        </div>
        </div>

        <div class="form-row row mt-4">
            <div class="form-holder col-md-6">
                <span class="help-block text-muted">No of Bedrooms (optional)</span>
                <input class="form-control numeric" id="nobed" name="bnum" placeholder="No of bedrooms" type="text" value="0" />
            </div>
            <div class="form-group col-md-6">
                <div class="form-holder col-md-6 pl-0 pr-0">
                    <span class="help-block text-muted">No of Bathrooms (optional)</span>
                    <input class="form-control intFloat" id="nobath" name="banum" placeholder="No of Bathrooms" type="text" value="0" />

                </div>

                <div class="form-holder col-md-6 pr-0">
                    <span class="help-block text-muted">No of Toilets (optional)</span>
                    <input class="form-control intFloat" id="notoil" name="tonum" placeholder="No of Toilets" type="text" value="0" />
                </div>
            </div>
        </div>

        <hr class="row"/>

        <div class="form-row row">
            <div class="form-group  col-md-6">
                <div class="form-holder  col-md-6  pr-0 pl-0">
                    <span class="help-block text-muted">Currency</span>
<select class="form-control" data-val="true" id="currency" name="cur">
<option value="Nigerian Naira">Nigerian Naira</option>
<option value="US Dollar">US Dollar</option>
<option value="British Pound">British Pound</option>
</select>

                </div>
                <div class="form-holder  col-md-6  pr-0">
<span class="help-block text-muted">My Budget is</span>
<input class="form-control digits" id="budp" name="bud" placeholder="Your budget" type="text" required/>
                </div>
            </div>

            <div class="form-group  col-md-6 pl-0 pr-0">
                <div class="form-holder  col-md-6">
                    <span class="help-block text-muted">Budget is per</span>
 <select class="form-control" data-val="true" id="price" name="budk" required>
    <option value="">--select--</option>
<option selected="selected" value="">per not applicable</option>
<option value="">per unit</option>
<option value="">per year</option>
<option value="">per half yr</option>
<option value="">per month</option>
<option value="">per week</option>
<option value="">per day</option>
<option value="">per night</option>
<option value="">per square meter</option>
<option value="">per plot</option>
<option value="">per hectare</option>
<option value="">per acre</option>
</select>
  </div>
       <div class="form-holder  col-md-6">
            <span class="help-block text-muted">I need this on or before</span>
                    <div>
<input class="form-control datepicker-here" id="endby" name="del" placeholder="DD-MM-YYYY" type="text" value="" required/>
                    </div>
                </div>
            </div>
        </div>
        <hr class="row"/>
        <div class="post-request form-row row">
            <div class="col-md-12">
                <span class="help-block text-muted">comment <span class="hint">(optional)</span></span>
<textarea class="form-control" id="comment" name="coms" placeholder="specify additional details here not more than 250 words" value=""></textarea>
       </div>
        </div>
        <hr class="row"/>
        <div class="form-row row">
            <div class="form-group col-md-6">
                <div class="form-holder col-md-6 pr-0 pl-0">
                    <span class="help-block text-muted">Your Name</span>
                    <input class="form-control" id="fname" name="name" placeholder="Your name" type="text" value="" required/>
                </div>
                <div class="form-holder col-md-6 pr-0">
                    <span class="help-block text-muted">Phone No</span>
                    <input class="form-control" id="phone" name="ph" placeholder="Your phone number" type="text" value="" required/>
                </div>
            </div>
            <div class="form-holder col-md-6">
                <span class="help-block text-muted">Your email</span>
                <input class="form-control" id="email" name="email" placeholder="Your email" type="text" value="" required/>

            </div>
        </div>

        <div class="form-row row">
            <div class="form-holder col-md-6">
                <div class="checkbox col-md-12 pl-0 pr-0">
                    <label>
                        <input class="form-check-input" id="estate" name="rss" type="checkbox" value="true" /> I am the one who directly need this property
                        <span class="checkmark"></span>
                    </label>
                    <label>
<input class="form-check-input" id="pattern" name="rpat" type="checkbox" value="true" /> I am a real estate agent / professional
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="form-holder col-md-6">
                <div class="checkbox col-md-12 pl-0 pr-0">
                    <label>
<input class="form-check-input" id="hemail" name="hmil" type="checkbox" value="true" /> Hide my email. I prefer only phone call
                        <span class="checkmark"></span>
                    </label>
                    <label>
<input class="form-check-input"  id="notify" name="nty" type="checkbox" value="true" /> Notify me when a new property matches this request
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
    </section>
</div>

<hr class="row"/>
<div class="actions clearfix">
    <ul role="menu" aria-label="Pagination" class="">
        <li>
            <input type="submit" name="load" class="login100-form-btn btnAccount" value="Submit Request">
        </li>
    </ul>
</div>
</form>
</div>
</div>
<footer class="footer-basic-centered">
    <p class="footer-links">
        <a href="../.">Home</a>
        <a href="../about" target="_blank">About</a>
        <a href="../tos" target="_blank">Terms of Use</a>
        <a href="../contact" target="_blank">Contact Us</a>
    </p>
    <div class="row border-top pt-3 mt-3 footbtm">
                <span class="col-md-6 pl-0" style="color: black">&copy; <script>
                                    document.write(new Date().getFullYear());
                                </script> Hutblock Properties</span>
                <span class="col-md-6 text-right">
                    <a href="https://instagram.com/hutblockng" target=_blank class="mr-2"><i style="color: #405DE6" class="fab fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=23407025571655" target=_blank class="mr-2"><i style="color: green;" class="fab fa-whatsapp"></i></a>
                </span>
            </div>
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
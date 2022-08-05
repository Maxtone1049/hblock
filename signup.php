<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $Email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $Email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0){
$sql="Insert Into tbluser(fname,lname,Email,password,phone)Values(:fname,:lname,:email,:password,:phone)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$Email,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId){
$msg="Welcome To Hutblockng Properties";
echo("<script type='text/javascript'>  
 setTimeout(function(){
    window.location.href = 'dashboard/.';
 }, 5000);
</script>");
}
else
{
    $msg="Something went wrong.Please try again";
}
}
 else
{

    $msg= "This Email already exist. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en" class="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register | Hutblock</title>
<meta name="description" content="Sign up for a free account on Nigeria&#x27;s leading property portal and find your needle in a haystack."/>
<meta name="author" content="Hutbay Limited."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta property="og:title" content="Register"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Sign up for a free account on Nigeria&#x27;s leading property portal and find your needle in a haystack."/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12701628-8"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-12701628-8');

</script>
<script src="browser.sentry-cdn.com/5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
<script>
    Sentry.init({ dsn: 'https://3bb88b37f18e4d2aa08c5570fc68b266@o306584.ingest.sentry.io/5395544' });
</script>
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/generic.css">
    <link rel="stylesheet" href="css/account/signup.css">
</head>
<body>
<header id="nav-generic" class="container-fluid">
    <div class="row">
        <div class="container pl-0 pr-0">
            <nav class="navbar navbar-expand-lg  pl-0 pr-0">
                <a class="navbar-brand" href="."><img src="images/icons/hut.png" alt="hutbay logo"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="for-sale">For Sale <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="for-rent">To Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="estate-agents">Estate Agents</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="signin6315.html">Post a Listing <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="post/request.html" id="navRequest" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Property Request
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navRequest">
                                <a class="dropdown-item" href="post/request">Post a Request</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="property-requests">View Property Requests</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="signup" id="navAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navAccount">
                                    <a class="dropdown-item" href="signin">Sign In</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="signup">Create Account</a>
                                </div>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div>
</header>
    <div class="container">
        <div class="row row1">
                       <div class="col-lg-6 no-gutter bg">
                <!-- Default form register -->
                <form method="post" class="signUpForm text-center mb-0 p-5">
                    <p class="h5 mb-4">Create your account</p>
                    <p style="font-size:15px; border-radius:12px;color:#fff; width:70%; margin:auto; text-align:center; margin-bottom:30px; background-color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div id="socialSignin" class="socialSignin">
                        <p>Sign up with</p>
                        <div class="row">
                            <div class="col-6">
                                <a href="#" id="gSignInBtn" class="btn-google">
                                    <img src="images/icon-google.png" alt="GOOGLE">
                                    Google
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" id="faceSignInBtn" class="btn-face">
                                    <i class="fab fa-facebook"></i>
                                    Facebook
                                </a>
                            </div>
                        </div>
                    </div>
<div style="color: #6386ae;"><div style="width: 40%;float: left;border: 1px solid rgb(168, 193, 221);"></div>
<span style="position: relative; top: -10px;"><i18n-string>OR</i18n-string></span>
<div style="width: 40%;float: right;border: 1px solid rgb(168, 193, 221);"></div>
</div>
<div class="form-row mb-3">
<div class="col">
<label>First name</label>
<input class="form-control" id="FirstName" name="fname" placeholder="First name" type="text" required/>
</div>
<div class="col">
<label>Last name</label>
<input class="form-control" id="LastName" name="lname" placeholder="Last name" type="text" required />
</div>
</div>
<label>Email address</label>
<input class="form-control mb-3" id="Email" name="email" placeholder="Email address" type="text" required />
<label>Choose password</label>
<input type="password" name="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" required/>
<small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-3">At least 4 unique characters and above</small>
<div class="form-row">
<div class="col">
<label>Country code</label>
<input class="form-control numeric" name="phonec" placeholder="e.g. 234 (for Nigeria)" type="text" value="234"/>
</div>
<div class="col">
<label>Phone no</label>
<input class="form-control" id="PhoneNumber" name="phone" placeholder="Phone number" type="text" value="" required/>
    </div>
</div>
<!-- Sign up button -->
<input type="submit" name="submit" class="btn btnSubmit my-4 btn-block btnAccount" value="SIGN UP">
                </form>
            </div>
             <div class="col-lg-6 no-gutter slide bg">
                <img src="images/lagos_ikoyi_one.jpg" />
            </div>
        </div>
    </div>
<footer class="footer-basic-centered">
    <p class="footer-links">
        <a href="#">Home</a>
        <a href="#" target="_blank">Advertise</a>
        <a href="#" target="_blank">Blog</a>
        <a href="pricing-plans" target="_blank">Subscription Plans</a>
        <a href="about" target="_blank">About</a>
        <a href="tos" target="_blank">Terms of Use</a>
        <a href="contact" target="_blank">Contact Us</a>
    </p>
    <p class="footer-company-name">&copy; 2013 - 2021 Hutbay Limited (RC 1138631)</p>
</footer>
<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
    <script src="scripts/bootstrap.scripts.combine.min.js"></script>
    <script src="scripts/lib/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="scripts/generic.js"></script>
</body>
</html>


<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');

if(isset($_POST['login'])) 
  {
    $Email=$_POST['Email'];
    $password=$_POST['pass'];
    $sql ="SELECT ID FROM tbluser WHERE Email=:Email and password=:pass";
    $query=$dbh->prepare($sql);
    $query->bindParam(':Email',$Email,PDO::PARAM_STR);
$query-> bindParam(':pass', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['obcsuid']=$result->ID;
}

$_SESSION['login']=$_POST['Email'];
echo "<script type='text/javascript'> document.location ='dashboard/.'; </script>";
} else{
    $msg= "Invalid Details";
}
}

?>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Hutblock</title>
<meta name="description" content="Find property for sale &amp; for rent on the most trusted real estate portal in Nigeria. Search for houses, lands, flats or apartments, office space, development projects and commercial property anywhere in Nigeria."/>
<meta name="author" content="Hutblock Properties."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutblock Properties."/>
<meta name="robots" content="index, follow">
<meta name="google-signin-client_id" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com">
<link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="images/icons/fav-32x32.png"/>
<meta name="captchaKey" content="6LcB34UUAAAAAIQI7Nwi4JCMl38DsUstCO3VrQXU">
<meta name="reCaptcha" content=""/>
<link rel="search" type="application/opensearchdescription+xml" href="opensearch.xml" title="Hutbay Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta name="google-signin-clientid" content="334753001295-ut0rr7jhr176jg4s9ldgm0pqc14e3cn5.apps.googleusercontent.com"/>
<meta name="keywords" content="property, real estate, nigeria, estate agents, estate valuers, surveyors, marketer, listings, houses, land, new development, for sale, for rent, shortlet"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-select.min.css">

<script src="5.20.1/bundle.min.js" integrity="sha384-O8HdAJg1h8RARFowXd2J/r5fIWuinSBtjhwQoPesfVILeXzGpJxvyY/77OaPPXUo" crossorigin="anonymous"></script>
<script>
    Sentry.init({ dsn: 'https://3bb88b37f18e4d2aa08c5570fc68b266@o306584.ingest.sentry.io/5395544' });
</script>
    <link rel="stylesheet" type="text/css" href="css/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/generic.css">
    <link rel="stylesheet" type="text/css" href="css/account/util.css">
    <link rel="stylesheet" type="text/css" href="css/account/signin.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <div class="row p-b-30">
                    <div class="col-centered">
                        <a href=".">
                            <img src="images/icons/hut.jpg" />
                        </a>
                    </div>
                </div>
    <form id="accountForm" class="login100-form validate-form" method="post">
        <span class="login100-form-title p-b-20">
            Login
        </span>
        <p style="font-size:15px; border-radius:12px;color:#fff; width:70%; margin:auto; text-align:center; margin-bottom:30px; background-color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>

        <div class="wrap-input100 validate-input m-b-16">
<input class="input100" name="Email" placeholder="Email" type="email" required />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <span class="lnr lnr-envelope"></span>
            </span>
        </div>
        <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" name="pass" placeholder="Password" type="password" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <span class="lnr lnr-lock"></span>
            </span>
        </div>
        <div class="contact100-form-checkbox m-l-4">
            <input type="hidden" name="returnUrl" />
            <input type="hidden" value="0" name="Action" />
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
                Remember me
            </label>
        </div>
        <div class="container-login100-form-btn p-t-25">
                <input type="submit" name="login" class="login100-form-btn btnAccount" value="Login">
            <div class="w-full text-center p-t-25">
                <span class="txt1">
                    Don't have account?
                </span>
                <a class="txt1 bo1" href="signup">
                    Create a free account.
                </a>
            </div>
        </div>
        <div class="text-center w-full p-t-42 p-b-22">
            <span class="txt1">
                Or login with
            </span>
        </div>
        <a href="#" class="btn-google m-b-10" id="gSignInBtn">
            <img src="images/icon-google.png" alt="GOOGLE">
            Google
        </a>

        <a href="#" class="btn-face m-b-10" id="faceSignInBtn">
            <i class="fab fa-facebook"></i>
            Facebook
        </a>
        <div class="text-center w-full p-t-115">
                     <div>
                <a class="txt1 bo1" href="reset-password">
                    Forgot your password?
                </a>
            </div>
        </div>
    </form>
            </div>
        </div>
    </div>
<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
<script src="scripts/bootstrap.scripts.combine.min.js"></script>
<script src="scripts/lib/bootstrap-select.min.js"></script>
<script type="text/javascript" src="scripts/generic.js"></script>
<script type="text/javascript" src="scripts/account.js"></script>
</body>
</html>

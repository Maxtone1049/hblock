<?php
session_start();
define("ROW_PER_PAGE",5);
error_reporting(0);
include 'includes/dbconnect.php';
if (strlen($_SESSION['obcsuid']>0)) {
$uid=$_SESSION['obcsuid'];
$put= "<header id='nav-generic' class='container-fluid' style='background: #3399ff'>
    <div class='row'>
        <div class='container pl-0 pr-0'>
<nav class='navbar navbar-expand-lg  pl-0 pr-0' >
<a class='navbar-brand' href='.'>
<img src='images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='for-sale' style='color: white'>For Sale </a>
                        </li>
                        <li class'nav-item '>
                            <a class='nav-link active' href='for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item active'>
<a class='nav-link' href='#'>Post a Listing</a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='post/request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>Account</a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='dashboard/.' style='color: black'>Dashboard</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='dashboard/settings' style='color: black'>My Settings</a>
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
<a class='navbar-brand' href='.'>
<img src='images/icons/hut.png' alt='hutblock logo'/></a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'><span style='color: white'><i class='fa fa-bars'></i></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='for-sale' style='color: white'>For Sale <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class'nav-item'>
                            <a class='nav-link active' href='for-rent' style='color: white'>To Rent</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='estate-agents' style='color: white'>Estate Agents</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item' ><a class='nav-link' href='about' style='color: white'>About Us</a></li>
                        <li class='nav-item active'>
<a class='nav-link' href='#' >Post a Listing <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navRequest' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Property Request</a>
                            
<div class='dropdown-menu' aria-labelledby='navRequest'>
<a class='dropdown-item' href='post/request' style='color: black'>Post a Request</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='property-requests' style='color: black'>View Property Requests</a>
                            </div>
                        </li>

                        <li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' id='navAccount' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  style='color: white'>
                                    My Account
                                </a>
<div class='dropdown-menu'aria-labelledby='navAccount'>
<a class='dropdown-item' href='signin' style='color: black'>Sign In</a>
                                    <div class='dropdown-divider'></div>
<a class='dropdown-item' href='signup' style='color: black'>Create Account</a>
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
<?php   
    $search_keyword = '';
    if(!empty($_POST['search']['keyword'])) {
        $search_keyword = $_POST['search']['keyword'];
        $search = $_POST['search']['next'];
    }
    $sql = 'SELECT * FROM property_request WHERE availablefor LIKE :keyword or availablefor LIKE :next ORDER BY id ASC ';
/* Pagination Code starts */
    $per_page_html = '';
    $page = 1;
    $start=0;
    if(!empty($_POST["page"])) {
        $page = $_POST["page"];
        $start=($page-1) * ROW_PER_PAGE;
    }
    $limit=" limit " . $start . "," . ROW_PER_PAGE;
    $pagination_statement = $dbh->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->bindValue(':next', '%' . $search . '%', PDO::PARAM_STR);
    $pagination_statement->execute();

    $row_count = $pagination_statement->rowCount();
    if(!empty($row_count)){
        $per_page_html .= "<div class='container' style='text-align:center;margin:20px 0px;'>";
        $page_count=ceil($row_count/ROW_PER_PAGE);
        if($page_count>1) {
            for($i=1;$i<=$page_count;$i++){
                if($i==$page){
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
                } else {
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
                }
            }
        }
        $per_page_html .= "</div>";
    }
    
    $query = $sql.$limit;
    $look = $dbh->prepare($query);
    $look->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $look->bindValue(':next', '%' . $search . '%', PDO::PARAM_STR);
    $look->execute();
    $result = $look->fetchAll();
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Property Requests in Nigeria | Hutblock</title>
<meta name="description" content="Search for property for rent from top estate agents and real estate developers in Nigeria. Browse photos, video, virtual tour and research neighborhoods"/>
<link rel="shortcut icon" href="images/icons/fav-32x32.png"/>
<meta name="author" content="Hutbay Limited."/>
<meta name="theme-color" content="#15A154"/>
<meta name="Copyright" content="Copyright (c) 2021 Hutbay Limited."/>
<meta name="robots" content="index, follow">
<link rel="search" type="application/opensearchdescription+xml" href="opensearch.xml" title="Hutbay Real Estate Search">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
<meta property="og:title" content="For Rent &amp; Lease"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://www.hutbay.com"/>
<meta property="og:site_name" content="Hutbay Real Estate"/>
<meta property="og:image" content="https://files.hutbay.com/images/icons/og-image.png">
<meta property="og:image:width" content="240">
<meta property="og:image:height" content="240">
<meta property="og:description" content="Search for property for rent from top estate agents and real estate developers in Nigeria. Browse photos, video, virtual tour and research neighborhoods"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-select.min.css">
    <script src="scripts/lib/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="css/generic.css">
    <link rel="stylesheet" href="css/requests.css">
    <link rel="stylesheet" type="text/css" href="css/account/util.css">
    <link rel="stylesheet" type="text/css" href="css/account/signin.css">
    <link rel="stylesheet" href="css/post.css">
    <style type="text/css">
                            .try{
                                width:90px;
                                background: #3399ff;
                                text-align:  center;
                                color: white;
                                font-family:arial;
                                letter-spacing:1px;
                                line-height:20px;
                                display: block;
                            }
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.btn-page{margin-right:10px;padding:5px 10px; border: #CCC 1px solid; background:#FFF; border-radius:4px;cursor:pointer;}
.btn-page:hover{background:#F0F0F0;}
.btn-page.current{background:#F0F0F0;}
@media (max-width: 767px){
body {
    background: #ebebeb;
    height: auto;
    display: block;
    width: 100%;
    box-sizing: border-box;
}}
                        </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <div id="body" >
 <div style="width: 100%">
                    <?php
                    if ($_SESSION['obcsuid']>0) {
                        echo $put;
                    }else {
                        echo $out;
                    }
                    
                    ?>
                </div>
        <main class="page-content property_info">
<div id="contently" class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-8">

                    <div class="row">
                        <h1 id="resultTitle">Property Requests</h1>
                    </div>


                    <div class="row cardly">
                            <div class="col-md-12 mb-3 pr-0" id="resTitle">
                                <div class="row resTitle">
                                    <span class="col-md-12">Results</span>
                                </div>
                            </div>
                            <form name="frmSearch" action="" method="post" style="width: 100%"> 
<input type='text' name='search[keyword]' placeholder="Search property for-rent" value="" id='keyword' maxlength='40' autofocus="" hidden>

 <?php
    if(!empty($result)) { 
foreach($result as $row) { ?>
                                <div class="recentLs col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 pl-4 pr-4">
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="row mb-2">
                                                        <div class="col-md-3">
                                                            <span class="mr-1">Reference</span>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <span><?php echo $row['reference'];?></span>
                                                            <label class="float-right mb-0">
                                                                <i class="ml-2 fa fa-calendar-alt"></i><?php echo $row['timestamp'];?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                       <div class="col-md-3">Budget:</div>
                                                        <div class="col-md-9">
<span class="price">&#x20A6;<?php echo $row['budgetrange'];?><span class="pricePer"> / plot</span></span>
                                                            <label class="float-right mb-0">
                                                                        <?php
                                                                $direct='Direct, '; 
                                                                $notdirect='Not Direct, ';
                                                                $estate='Real estate professional';
                                                                $notestate='';
                    if ($row['realstate']=='true' && $row['requestpattern']=='true') {
                              echo $direct.$estate;
                                       }elseif ($row['realstate']=='true' || $row['requestpattern']=='') {
                                           echo $direct.$notestate;
                                       }
                                       elseif ($row['realstate']=='' || $row['requestpattern']=='') {
                                           echo $notdirect.$notestate;
                                       }
                          ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-md-3">Types</div>
                                                        <div class="col-md-9">
                                                            <span class="title text-primary mt-0">
                                                                <?php echo $row['propertytype'];?>
                                                            </span>
                                                                <span class="lsNotifs float-right">buy/sell</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3">Locations:</div>
                                                            <div class="col-md-9 font-bold">
                                                               <?php echo $row['state']. ': '. $row['choosecities']?>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="summary row mt-0 mb-2">
                                                <div class="col-md-3">Comment:</div>
                                                <div class="col-md-9"><?php echo $row['comment'];?></div>
                                           </div>
                                            <div class="row mb-4 text-right">
                                                <div class="col-md-12">
                                                    <a class="app-button" href="propertyrequest/details/0A9KCSYH" target="_blank"><i class="mr-1 fa fa-user"></i> Full Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
        }
    }
    ?>
<!-- code to display data from database of Stored listings -->
 <?php echo $per_page_html; ?>
                            </form>
                    </div>
                </div>

                
<div id="sidebar" class="col-md-4">
    <div class="card pt-0 pb-0 mb-3">
        <div class="card-group-item">
            <div class="card-body">
                <div>Need help with your search?</div>
                <p class="mb-3 mt-1">Engage the services of local real estate professionals to help with your search. It's faster and it is FREE.</p>
                <div class="mb-3">
                    <a href="post/request" class="app-button"><i class="far fa-paper-plane"></i> Post a Request</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card pt-0 pb-0 mb-3">
        <div class="card-group-item">
            <h6><i class="fa fa-user"></i> Find Estate Agents</h6>
            <div class="card-body">
                <div>Contact a Local Agent</div>
                <p class="mb-3 mt-1">Narrow down to reputable estate agents in the locality of your choice. Send one message to all.</p>
                <div class="mb-3">
                    <a href="estate-agents" class="app-button"><i class="fa fa-search"></i> Find Estate Agents</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card pt-0 pb-0">
        <div class="card-group-item">
            <h6><i class="fas fa-truck-moving"></i> Moving Soon?</h6>
            <div class="card-body">
                <div>Hassle-free moving!</div>
                <p class="mb-3 mt-1">Relocate without hassle and within your budget. Start planning today.</p>
                <div class="mb-3">
                    <a href="cdn-cgi/l/email-protection#54272124243b2620143c212036352d7a373b39" class="app-button"><i class="far fa-bell"></i> Get FREE Quotes</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</main>
<div class="footer-main container-fluid pt-4 pb-3">
    <div class="row">
        <div class="container  pr-4 pl-4">
            <div class="row">
                <div class="col-md-3">
                    <h5>Company</h5>
                    <div><a href="about">About Us</a></div>
                    <div><a href="contact">Contact Us</a></div>
                    <div><a href="#" target="_blank">Hutbay Blog</a></div>
                    <div><a href="digital-services" target="_blank">Marketing Services</a></div>
                    <div><a href="#">Help/Guides</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Business Products</h5>
                    <div><a href="advertise/index">Advertise</a></div>
                    <div><a href="pricing-plans/index">Subscription Plans</a></div>
                    <div><a href="http://www.realtywebng.com/" target="_blank">Agent Website</a></div>
                    <div><a href="advertise/developer-plus">Developer Plus</a></div>
                    <div><a href="advertise/ads">Hutbay Ads</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Property Tools</h5>
                    <div><a href="#">Local Info</a></div>
                    <div><a href="signin6315">Post a Listing</a></div>
                    <div><a href="post/request">Post a Request</a></div>
                    <div><a href="#">Moving Quotes</a></div>
                </div>

                <div class="col-md-3">
                    <h5>Website</h5>

                    <div><a href="tos">Terms of Use</a></div>
                    <div><a href="privacy">Privacy Policy</a></div>

                    <div class="mt-2"><a href="#"><img width="123" src="images/app-store-badge.png" alt="app store"/></a></div>
                    <div><a href="#"><img width="123" src="images/google-play-badge.png" alt="google play" /></a></div>

                </div>
            </div>

            <div class="row border-top pt-3 mt-3 footbtm">
                <span class="col-md-6 pl-0">&copy; 2013 - 2021 Hutbay Limited (RC 1138631)</span>
                <span class="col-md-6 text-right">
                    <a href="https://instagram.com/hutblockng" target=_blank class="mr-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" target=_blank class="mr-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" target=_blank class="mr-2"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" target=_blank class="mr-2"><i class="fab fa-facebook"></i></a>
                </span>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="scripts/jquery.combine.min.js"></script>
<script src="scripts/bootstrap.scripts.combine.min.js"></script>
<script src="scripts/lib/bootstrap-select.min.js"></script>
    </div>
    <script type="text/javascript" src="scripts/generic.js"></script>
</body>
</html>
<?php 
ob_start();
session_start();
include '../config.inc.php';
$msglog='';
if(isset($_POST['s_login'])){
$usr = mysqli_real_escape_string($con,trim($_POST['username']));
$login_password = $_POST['password'];

$sql_usr = mysqli_query($con,"SELECT COUNT(*) AS n_log,id,role,name,email,phone,username FROM users WHERE (username='".$usr."' OR email='$usr') AND password='".$login_password."' AND status=1") or die(mysqli_error($con));
$r_usr = mysqli_fetch_array($sql_usr);

if ($r_usr['n_log']==1){
    
    $token = uniqid();
    $_SESSION["login"] = $token;
    $_SESSION['stoken'] = 'bbd93f4ec95f7d856c53e3f9c4bf7dee71acaf34f290ef277f9effd35cb6e513';
    $_SESSION["login_id"] = $r_usr['id'];
	$_SESSION["user_type"] = $r_usr['role'];
	
	header("location: dashboard.php");
	
   } else {
	   $msglog ='<div class="alert alert-danger alert-dismissible fade show">
                                       Invalid Username or password
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
	}   
 }
?>
<!DOCTYPE html>
<html lang="en" itemscope="" itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Unity Aid | Login</title>
	<meta name="title" content="Unity Aid | Login">
	<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
	<meta name="keywords" content="charity,donation,contribution,crowdfund,crowdfunding,donate,fund,fundraiser,fundraising,give help,help,laravel,php script,raising,script,charity application,crowdfunding-script,crowdfunding-solution,donation script,fundraised,fundraiser script,kickstarter,laravel crowdfunding script,laravel-crowdfunding,php mysql crowdfunding script,php-crowdfunding,ultimate-crowdfunding,campaigns,crowdfunding platform,crowdfunding system,fund raising,fund-raising,campaign,crowd funding,crowd sourcing,donations,fund raiser,funding,fundme,rewards">
	<link rel="shortcut icon" href="../assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="../assets/universal/images/logoFavicon/logo_dark.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Unity Aid | Login">
	<meta itemprop="name" content="Unity Aid | Login">
	<meta itemprop="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
	  
	<meta name="twitter:card" content="summary_large_image">
	<link rel="stylesheet" href="../assets/universal/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/slick.css">
	<link rel="stylesheet" href="../assets/universal/css/line-awesome.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/lightbox.min.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/aos.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/main.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/custom.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713"> </head>

<body>
	<div class="preloader">
		<div class="loader-p"></div>
	</div>
	<div class="body-overlay"></div>
	<div class="sidebar-overlay"></div>
	<a class="scroll-top"> <i class="fas fa-angle-double-up"></i> </a>
	<section class="account py-120">
		<div class="account__bg bg-img" data-background-image="../assets/universal/images/65b74764a461f1706510180.png"></div>
		<div class="container">
			<div class="row justify-content-md-between justify-content-center align-items-center">
				<div class="col-xl-6 col-lg-5 col-md-4">
					<div class="account-thumb"> <img src="../assets/images/site/login/6601340586cdd1711354885.png" alt=""> </div>
				</div>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<div class="d-flex justify-content-between align-items-center mb-md-4 mb-3">
						<div class="login__logo">
							<a href="http://localhost/project/index.php"><img src="../assets/universal/images/logoFavicon/logo_dark.png" alt="Logo" style="width: 100px;"></a>
						</div>
						<a href="http://localhost/project/index.php" class="back-to-home"> <i class="las la-home"></i> </a>
					</div>
					<div class="account-form">
						<div class="account-form__content mb-4">
							<h3 class="account-form__title mb-2">Sign in to your account</h3> </div>
						<form action="" method="POST" class="verify-gcaptcha" >
						    <?=$msglog?>
							<input type="hidden" name="_token" value="vHIMb2fk9ylBNPcQbC8BcSt8Q2QuW6IoKCeEOcSl" autocomplete="off">
							<div class="row">
								<div class="col-sm-12 form-group">
									<label class="form--label">Username or Email Address</label>
									<input type="text" class="form--control" name="username" value="" required=""> </div>
								<div class="col-sm-12 form-group">
									<label class="form--label">Password</label>
									<div class="position-relative">
										<input id="your-password" type="password" class="form-control form--control" name="password" required=""> <span class="password-show-hide fa-regular fa-eye toggle-password" id="#your-password"></span> </div>
								</div>
								<div class="col-sm-12 form-group">
									<div class="d-flex flex-wrap justify-content-between">
										<div class="form--check">
											<input class="form-check-input" type="checkbox" name="remember" id="remember">
											<label class="form-check-label" for="remember">Remember me</label>
										</div> <a href="forgot.php" class="forgot-password text--base">
                                            Forgot Your Password?                                        </a> </div>
								</div>
								<div class="col-sm-12 form-group">
									<button type="submit" name="s_login" class="btn btn--base w-100" id="recaptcha"> Log In </button>
								</div>
								<div class="col-sm-12">
									<div class="have-account text-center">
										<p class="have-account__text">Don't have any account? <a href="register.php" class="have-account__link text--base">Create Account</a></p>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="../assets/universal/js/jquery-3.7.1.min.js"></script>
	<script src="../assets/universal/js/bootstrap.js"></script>
	<script src="../assets/themes/primary/js/slick.min.js"></script>
	<script src="../assets/themes/primary/js/viewport.jquery.js"></script>
	<script src="../assets/themes/primary/js/lightbox.min.js"></script>
	<script src="../assets/themes/primary/js/aos.js"></script>
	<script src="../assets/themes/primary/js/main.js"></script>
	<link rel="stylesheet" href="../assets/universal/css/iziToast.min.css">
	<script src="../assets/universal/js/iziToast.min.js"></script>
	<script>
	"use strict";

	function showToasts(status, message) {
		if(typeof message == 'string') {
			iziToast[status]({
				message: message,
				position: "topRight"
			});
		} else {
			$.each(message, function(i, val) {
				iziToast[status]({
					message: val,
					position: "topRight"
				});
			});
		}
	}
	</script>
</body>

</html>
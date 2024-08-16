<?php 
ob_start();
session_start();
include '../config.inc.php';
$msglog='';
if(isset($_POST['login'])){
$usr = mysqli_real_escape_string($con,trim($_POST['username']));
$login_password = $_POST['password'];

$sql_usr = mysqli_query($con,"SELECT COUNT(*) AS n_log,id,username FROM admin WHERE username='".$usr."' AND password='".$login_password."'") or die(mysqli_error($con));
$r_usr = mysqli_fetch_array($sql_usr);

if ($r_usr['n_log']==1){
    
    $token = uniqid();
    $_SESSION["admin_login"] = $token;
    $_SESSION['admin_stoken'] = 'bbd93f4ec95f7d856c53e3f9c4bf7dee71acaf34f290ef277f9effd35cb6e513';
    $_SESSION["admin_id"] = $r_usr['id'];
	 
	
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
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<title>Unity Aid | Admin Login</title>
	<link rel="shortcut icon" type="image/png" href="../assets/universal/images/logoFavicon/favicon-1.png">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
	<link href="../css2-1?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
	<!-- Css -->
	<link rel="stylesheet" href="../assets/admin/css/style.css">
	<link rel="stylesheet" href="../assets/admin/css/theme.css">
	<link rel="stylesheet" href="../assets/admin/css/custom.css">
	<link rel="stylesheet" href="../assets/admin/css/scrollbar.css">
	<link rel="stylesheet" href="../assets/universal/css/font-awesome-1.css">
	<link rel="stylesheet" href="../assets/universal/css/line-awesome-1.css">
	<link rel="stylesheet" href="../assets/admin/css/page/auth.css"> </head>

<body>
	<div class="authentication-wrapper authentication-cover">
		<div class="authentication-inner row m-0">
			<div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
				<div class="w-100 d-flex justify-content-center"> <img src="../assets/admin/images/login.png" class="img-fluid" alt="Login image" width="700"> </div>
			</div>
			<div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
				<div class="w-px-400 mx-auto">
					<div class="app-brand mb-3 justify-content-center">
					 
					</div>
					<div class="text-center">
						<h4 class="mb-2">
                            Welcome to Unity Aid
                            <img src="../assets/admin/images/wave.gif" alt="emoji" class="animated-emoji">
                        </h4>
						<p class="mb-4">Please sign-in to your account</p>
					</div>
					<form class="mb-3 verify-gcaptcha" action="" method="POST">
					    <?=$msglog?>
						<input type="hidden" name="_token" value="ZByAHmL1IczxM0aVDLeyaPsTts9zii4kyOuX1VsD" autocomplete="off">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="username" value="" placeholder="Enter your username" required="" autofocus=""> </div>
						<div class="mb-3 form-password-toggle">
							<label class="form-label">Password</label>
							<div class="input-group">
								<input type="password" class="form-control" name="password" placeholder="" required=""> <span aria-valuemax="" class="input-group-text cursor-pointer"><i class="las la-eye-slash"></i></span> </div>
						</div>
						<div class="mb-3">
							<div class="d-flex justify-content-between">
								<div class="form-check">
									<input class="form-check-input" name="remember" type="checkbox" id="remember">
									<label class="form-check-label" for="remember">Remember Me</label>
								</div>
								<a href="forgot.php"> <small>Forgot Password?</small> </a>
							</div>
						</div>
						<button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="../assets/admin/js/helpers.js"></script>
	<script src="../assets/admin/js/config.js"></script>
	<script src="../assets/universal/js/jquery-3.7.1.min-1.js"></script>
	<script src="../assets/universal/js/bootstrap-1.js"></script>
	<script src="../assets/admin/js/scrollbar.js"></script>
	<link rel="stylesheet" href="../assets/universal/css/iziToast.min-1.css">
	<script src="../assets/universal/js/iziToast.min-1.js"></script>
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
	<script src="../assets/admin/js/main.js"></script>
</body>

</html>
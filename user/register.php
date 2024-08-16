<?php
include '../config.inc.php';
$msgresp='';
$success_msg = '';
if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($con,trim($_POST['name']));  
    $role = $_POST['role'];
    $username = mysqli_real_escape_string($con,trim($_POST['username']));
    $email = mysqli_real_escape_string($con,trim($_POST['email']));
    $phone = mysqli_real_escape_string($con,trim($_POST['phone']));
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $today = date("Y-m-d H:i:s");

    // Client-side validation
    if(empty($name) || empty($role) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_pass)) {
        $msgresp='<div class="alert alert-danger alert-dismissible fade show">Please fill in all required fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';
    } else {
        // Proceed with registration
        if($password != $confirm_pass) {
            $msgresp='<div class="alert alert-danger alert-dismissible fade show">Password and Confirm Password do not match.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';  
        } else {
            $u_sql = mysqli_query($con,"SELECT * FROM users WHERE (email='$email' OR phone='$phone') ORDER BY id DESC LIMIT 1");  
            $num_rows = mysqli_num_rows($u_sql);

            if($num_rows == 0) {
                 
                $c_sql = mysqli_query($con,"INSERT into users set name='$name',username='$username',email='$email',phone='$phone',password='$confirm_pass',
                                             role='$role',status=1,created_date='$today'");   
                $insert_id = mysqli_insert_id($con);                            
                if($c_sql) {
                   header("location: login.php");
                }
            } else {
                $msgresp='<div class="alert alert-danger alert-dismissible fade show">Account already exists.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';  
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" itemscope="" itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Unity Aid | Register</title>
	<meta name="title" content="Unity Aid | Register">
	<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
	<meta name="keywords" content="charity,donation,contribution,crowdfund,crowdfunding,donate,fund,fundraiser,fundraising,give help,help,laravel,php script,raising,script,charity application,crowdfunding-script,crowdfunding-solution,donation script,fundraised,fundraiser script,kickstarter,laravel crowdfunding script,laravel-crowdfunding,php mysql crowdfunding script,php-crowdfunding,ultimate-crowdfunding,campaigns,crowdfunding platform,crowdfunding system,fund raising,fund-raising,campaign,crowd funding,crowd sourcing,donations,fund raiser,funding,fundme,rewards">
	<link rel="shortcut icon" href="../assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="../assets/universal/images/logoFavicon/logo_dark.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Unity Aid | Register">
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
					<div class="account-thumb"> <img src="../assets/images/site/register/660134ff6365b1711355135.png" alt=""> </div>
				</div>
				<div class="col-xl-5 col-lg-6 col-md-7">
					 
					<div class="account-form">
						<div class="account-form__content mb-4">
							<h3 class="account-form__title mb-2">Create new account</h3> </div>
						<form action="" method="POST" class="verify-gcaptcha">
							<?=$msgresp?>
							<div class="row g-3">
							    <div class="col-sm-12">
									<label class="form--label required"> User Type </label>
									<select class="form--control" name="role" value="" required=""> 
									  <option value="">Select User Type</option>
									  <option value="user">User</option>
									  <option value="event_organizer">Event Organizers</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="form--label required"> Name</label>
									<input type="text" class="form--control" name="name" value="" required=""> 
								</div>
								<div class="col-sm-6">
									<label class="form--label required">Username</label>
									<input type="text" class="form--control checkUser" name="username" value="" required=""> <small class="text-danger usernameExist"></small> </div>
								<div class="col-sm-6">
									<label class="form--label required">Email Address</label>
									<input type="email" class="form--control checkUser" name="email" value="" required=""> <small class="text-danger emailExist"></small> </div>
								 <div class="col-sm-6">
									<label class="form--label required">Phone</label>
									<input type="text" class="form--control checkUser" name="phone" value="" required=""> <small class="text-danger emailExist"></small> 
								 </div>
								 <div class="col-sm-6">
									<label class="form--label required">Password</label>
									<div class="position-relative">
										<input type="password" class="form-control form--control " name="password" id="your-password" required=""> <span class="password-show-hide fa-regular fa-eye toggle-password" id="#your-password"></span> </div>
								</div>
								<div class="col-sm-6">
									<label class="form--label required">Confirm Password</label>
									<div class="position-relative">
										<input type="password" class="form-control form--control" name="confirm_pass" id="confirm-password" required=""> <span class="password-show-hide fa-regular fa-eye toggle-password" id="#confirm-password"></span> </div>
								</div>
								<div class="col-sm-12">
									<div class="form--check">
										<input type="checkbox" class="form-check-input" name="agree" id="agree" required>
										<label for="agree" class="form-check-label">I agree with <a>Privacy Policy</a>, <a href="#">Terms of Service</a></label>
									</div>
								</div>
								<div class="col-sm-12">
									<button type="submit" name="register" class="btn btn--base w-100" id="recaptcha"> Sign Up </button>
								</div>
								<div class="col-sm-12">
									<div class="have-account text-center">
										<p class="have-account__text">Already have an account? <a href="login.php" class="have-account__link text--base">Sign In</a> here.</p>
									</div>
								</div>
							    </div>
								
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	 <!-- Success Modal -->
	 <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Your registration was successful! You can now login using your credentials.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Your existing JavaScript and footer scripts go here... -->
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
	<script>
	(function($) {
		"use strict";
		$(`option[data-code=IN]`).attr('selected', '');
		$('select[name=country]').change(function() {
			$('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
			$('input[name=country_code]').val($('select[name=country] :selected').data('code'));
			$('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
		});
		$('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
		$('input[name=country_code]').val($('select[name=country] :selected').data('code'));
		$('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
		 
	})(jQuery);
	</script>
</body>

</html>
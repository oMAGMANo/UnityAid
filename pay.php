<?php 
include 'config.inc.php';
ob_start();
session_start();
$targetDir = "uploads/";
$allowTypes = array('jpg','jpeg','png');
$msglog='';
$row = mysqli_fetch_assoc(mysqli_query($con,"select * from donation where id='".$_GET['id']."'"));
if(isset($_POST['pay_now'])){
  extract($_POST);
  $sql = mysqli_query($con,"update donation set txn_id='$txn_id' where id='".$_POST['id']."'");
  // Handle file uploads (assuming image and document)
        if(!empty($_FILES["attachment"]["name"])){
            $fileName = uniqid().'_'.basename($_FILES["attachment"]["name"]);
            $file_name = str_replace(' ', '-', $fileName);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
                    mysqli_query($con,"UPDATE donation SET attachment='$file_name' WHERE id='".$_POST['id']."'");
                }else{
                    $err_msg = 0;
                }
            }else{
                $err_msg = 0;
            }
        }
        
   $msglog = '<div class="alert alert-success alert-dismissible fade show">
                                      Successfully Submitted
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';     
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>UnityAid | Donation Confirmation</title>
	<meta name="title" content="UnityAid | Donation Confirmation">
	<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
	<meta name="keywords" content="charity,donation,contribution,crowdfund,crowdfunding,donate,fund,fundraiser,fundraising,give help,help,laravel,php script,raising,script,charity application,crowdfunding-script,crowdfunding-solution,donation script,fundraised,fundraiser script,kickstarter,laravel crowdfunding script,laravel-crowdfunding,php mysql crowdfunding script,php-crowdfunding,ultimate-crowdfunding,campaigns,crowdfunding platform,crowdfunding system,fund raising,fund-raising,campaign,crowd funding,crowd sourcing,donations,fund raiser,funding,fundme,rewards">
	<link rel="shortcut icon" href="../assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="../assets/universal/images/logoFavicon/logo_dark.png">
 
	<link rel="stylesheet" href="../assets/universal/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/slick.css">
	<link rel="stylesheet" href="../assets/universal/css/line-awesome.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/lightbox.min.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/aos.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/main.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/custom.css">
	<link rel="stylesheet" href="../assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713">
	<style>
	.payment-preview-text {
		color: hsl(var(--black) / 0.6);
	}
	</style>
	<style>

	</style>
</head>

<body>
	<?php include 'nav.php'; ?>
	<section class="breadcrumb bg-img" data-background-image="../assets/images/site/breadcrumb/65b24f623fe111706184546.png">
		<div class="breadcrumb__bg bg-img" data-background-image="../assets/themes/primary/images/breadcrumb-vector.png"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="breadcrumb__wrapper">
						<h1 class="breadcrumb__title">Donation Confirmation</h1>
						<ul class="breadcrumb__list">
						
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="py-120">
		<div class="container">
			<div class="row gy-5 justify-content-lg-around justify-content-center align-items-center">
				<div class="col-lg-7 col-md-10">
					<div class="card custom--card" data-aos="fade-up" data-aos-duration="1500">
						<div class="card-header">
							<h3 class="title">Donation via QR Code or UPI</h3> </div>
						<div class="card-body">
							<form action="" method="POST" class="row g-3" enctype="multipart/form-data">
							    <?=$msglog?>
								<input type="hidden" name="id" value="<?=$row['id']?>" autocomplete="off">
								<div class="text-center">
									<p class="fw-bold payment-preview-text"> You have requested a donation of <span class="text--base">₹<?=$row['amount']?></span>, Please pay <span class="text--base">₹<?=$row['amount']?></span> for the successful payment. </p>
									<h5 class="payment-preview-text mt-4 mb-1">Please follow the instruction below</h5> </div>
								<center><p>Pay by using upi id <strong>unityaid@icici</strong>
									<br>
								</p>
								<p><strong>OR</strong></p>
								<img src="uploads/upi-qr.jpg" style="width: 250px;">
								</center>
								<div class="col-12">
									<label class="form--label required"> Transaction ID</label>
									<input type="text" class="form--control" name="txn_id" required>
								</div>
								<div class="col-12">
									<label class="form--label required"> Transaction Screenshot</label>
									<input type="file" class="form--control" name="attachment" required accept=" .jpg,   .jpeg,   .png "> <pre class="text--base mt-2 mb-1">Supported mimes: jpg,jpeg,png</pre> 
								</div>
								<div class="col-12">
									<button type="submit" name="pay_now" class="btn btn--base w-100 mt-2">Pay Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	 <?php include 'footer.php'; ?>
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
		$(".langSel").on("change", function() {
			window.location.href = "../change/" + $(this).val();
		});
		$('.policy').on('click', function() {
			$.get('../cookie/accept', function(response) {
				$('.cookies-card').addClass('d-none');
			});
		});
		setTimeout(function() {
			$('.cookies-card').removeClass('hide');
		}, 2000);
		Array.from(document.querySelectorAll('table')).forEach(table => {
			let heading = table.querySelectorAll('thead tr th');
			Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
				Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
					colum.setAttribute('data-label', heading[i].innerText)
				});
			});
		});
	})(jQuery);
	</script>
</body>

</html>
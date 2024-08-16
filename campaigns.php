<?php 
include 'config.inc.php';
ob_start();
session_start();
?>
	<!DOCTYPE html>
	<html lang="en" itemscope="" itemtype="http://schema.org/WebPage">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Unity Aid | Campaigns</title>
		<meta name="title" content="Unity Aid | Campaigns">
		<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
		<meta name="keywords" content="charity,donation,contribution,crowdfund,crowdfunding,donate,fund,fundraiser,fundraising,give help,help,laravel,php script,raising,script,charity application,crowdfunding-script,crowdfunding-solution,donation script,fundraised,fundraiser script,kickstarter,laravel crowdfunding script,laravel-crowdfunding,php mysql crowdfunding script,php-crowdfunding,ultimate-crowdfunding,campaigns,crowdfunding platform,crowdfunding system,fund raising,fund-raising,campaign,crowd funding,crowd sourcing,donations,fund raiser,funding,fundme,rewards">
		<link rel="shortcut icon" href="assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="assets/universal/css/bootstrap.css">
		<link rel="stylesheet" href="assets/universal/css/font-awesome.css">
		<link rel="stylesheet" href="assets/themes/primary/css/slick.css">
		<link rel="stylesheet" href="assets/universal/css/line-awesome.css">
		<link rel="stylesheet" href="assets/themes/primary/css/lightbox.min.css">
		<link rel="stylesheet" href="assets/themes/primary/css/aos.css">
		<link rel="stylesheet" href="assets/themes/primary/css/main.css">
		<link rel="stylesheet" href="assets/themes/primary/css/custom.css">
		<link rel="stylesheet" href="assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713">
		<link rel="stylesheet" href="assets/universal/css/datepicker.css">
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>
		.campaign-card__img {
			-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
			background: url("assets/themes/primary/images/campaign-image-shape.png");
			mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		}
		</style>
		<style>

		</style>
		<style>
		.date-picker {
			caret-color: transparent;
			cursor: pointer;
		}
		</style>
	</head>

	<body>
		<?php include 'nav.php'; ?>
			<section class="breadcrumb bg-img" data-background-image="https://phinix.digital/pnixfund/assets/images/site/breadcrumb/65b24f623fe111706184546.png">
				<div class="breadcrumb__bg bg-img" data-background-image="https://phinix.digital/pnixfund/assets/themes/primary/images/breadcrumb-vector.png"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="breadcrumb__wrapper">
								<h1 class="breadcrumb__title">Campaigns</h1>
								<ul class="breadcrumb__list">
									<li><a href="index.php">Home</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="donation pt-120 pb-60">
				<div class="container">
					<div class="row g-4">
						<div class="col-lg-4">
							<div class="post-sidebar">
								<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
									<h3 class="post-sidebar__card__header">Filter By Category</h3>
									<div class="post-sidebar__card__body">
										<ul class="d-flex flex-column gap-2">
										    <!-- <li class="campaign-category" data-category_slug="all">
												<a href="campaigns.php" class="d-flex align-items-center gap-2"> <i class="fa-solid fa-arrow-left"></i> All </a>
											</li> -->
										    <?php
												     $sql_cat = mysqli_query($con,"SELECT * FROM category");
												     while($row=mysqli_fetch_assoc($sql_cat)){
												    ?>
											<li class="campaign-category" data-category_slug="<?=$row['id']?>">
												<a href="campaigns.php?category=<?=$row['id']?>" class="d-flex align-items-center gap-2"> <i class="fa-solid fa-arrow-left"></i> <?=$row['name']?> </a>
											</li>
											 <?php } ?>
										</ul>
									</div>
								</div>
								<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
									<h3 class="post-sidebar__card__header">Filter by name</h3>
									<div class="post-sidebar__card__body">
										<div class="input--group">
											<input type="text" class="form--control" placeholder="Campaign Name" value="" id="campaign-name">
											<button class="btn btn--base px-3 search-campaign"> <i class="fa-solid fa-magnifying-glass"></i> </button>
										</div>
									</div>
								</div>
								 
							</div>
						</div>
						<div class="col-lg-8">
							<div class="row g-4">
							    <?php
								// Check if the 'category' and 'name' keys are set in the $_GET array
   								$category = isset($_GET['category']) ? $_GET['category'] : '';
    							$name = isset($_GET['name']) ? $_GET['name'] : '';
	                            // Construct the SQL query
								$sql = "SELECT * FROM campaign WHERE status = 1";
								if (!empty($category)) {
									$sql .= " AND category_id = '$category'";
								}
								if (!empty($name)) {
									$sql .= " AND name LIKE '%$name%'";
								}
								$sql .= " ORDER BY id DESC";

								// Execute the SQL query and fetch the results
								$result = mysqli_query($con, $sql);
	                            if(mysqli_num_rows($result) > 0){
	                            while($row=mysqli_fetch_assoc($result))  {
	                              $res_dona = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_amount from donation where campaign_id='".$row['id']."'"));
	                          ?>
								<div class="col-sm-6" data-aos="fade-up" data-aos-duration="1500">
									<div class="campaign-card">
										<div class="campaign-card__img">
											<a href="campaigns-details.php?campaign_id=<?=$row['id']?>"> <img src="uploads/<?=$row['image']?>" alt="image"> </a>
										</div>
										<div class="campaign-card__txt">
											<h3 class="campaign-card__title">
        <a href="campaigns-details.php?campaign_id=<?=$row['id']?>">
            <?=$row['name']?>
        </a>
    </h3>
											<div class="campaign__countdown" data-target-date="<?=$row['start_date']?>T00:00:00"></div>
										 
											<div class="campaign-card__bottom">
												<ul class="campaign-card__list">
													<li> <span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> ₹<?=$row['goal_amount']?> </li>
													<li> <span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> ₹<?=number_format($res_dona['total_amount']); ?> </li>
												</ul> <a href="campaigns-details.php?campaign_id=<?=$row['id']?>" class="btn btn--sm btn--base">Explore Event <i class="fa-solid fa-arrow-right"></i>       </a> 
											</div>
										</div>
									</div>
								</div>
							<?php } } ?>	 
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="" method="GET" class="d-none search-form">
				<input type="hidden" name="category" value="">
				<input type="hidden" name="name" value="">
				<input type="hidden" name="date_range" value=""> 
				</form>
			<?php include 'footer.php'; ?>
				<script src="assets/universal/js/jquery-3.7.1.min.js"></script>
				<script src="assets/universal/js/bootstrap.js"></script>
				<script src="assets/themes/primary/js/slick.min.js"></script>
				<script src="assets/themes/primary/js/viewport.jquery.js"></script>
				<script src="assets/themes/primary/js/lightbox.min.js"></script>
				<script src="assets/themes/primary/js/aos.js"></script>
				<script src="assets/themes/primary/js/main.js"></script>
				<link rel="stylesheet" href="assets/universal/css/iziToast.min.css">
				<script src="assets/universal/js/iziToast.min.js"></script>
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
				<script src="assets/universal/js/datepicker.js"></script>
				<script src="assets/universal/js/datepicker.en.js"></script>
				<script>
				(function($) {
					'use strict'
					$('.date-picker').datepicker({
						dateFormat: 'dd-mm-yyyy',
					})
					$('.date-picker').on('input keyup keydown keypress', function() {
						return false
					})
					$('.campaign-category').on('click', function(event) {
						event.preventDefault()
						let slug = $(this).data('category_slug')
						$('input[name="category"]').val(slug)
						$('.search-form').submit()
					})
					$('.search-campaign').on('click', function() {
						let name = $('#campaign-name').val()
						$('input[name="name"]').val(name)
						$('.search-form').submit()
					})
					$('.filter-by-date').on('click', function() {
						let range = $('#date-range').val()
						$('input[name="date_range"]').val(range)
						$('.search-form').submit()
					})
				})(jQuery)
				</script>
				 
	</body>

	</html>
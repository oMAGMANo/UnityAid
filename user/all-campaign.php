<?php 
include '../config.inc.php';
include 'session.php';
?>
	<!DOCTYPE html>
	<html lang="en" itemscope itemtype="http://schema.org/WebPage">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Unity Aid | All Campaigns</title>
		<meta name="title" content="Unity Aid | All Campaigns">
		<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
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

		</style>
	</head>

	<body>
	
	   <?php include 'header.php'; ?>
	   
		<section class="breadcrumb bg-img" data-background-image="../assets/images/site/breadcrumb/65b24f623fe111706184546.png">
			<div class="breadcrumb__bg bg-img" data-background-image="../assets/themes/primary/images/breadcrumb-vector.png"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="breadcrumb__wrapper">
							<h1 class="breadcrumb__title">All Campaigns</h1>
							<ul class="breadcrumb__list">
							 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="dashboard py-60">
			<div class="container">
				<div class="card custom--card">
					<div class="card-body">
						<div class="d-flex justify-content-end mb-3">
							<form action="" class="input--group">
								<input type="text" class="form--control" name="search" value="" placeholder="Campaign/Category...">
								<button type="submit" class="btn btn--sm btn--base"> <i class="fa-solid fa-magnifying-glass"></i> </button>
							</form>
						</div>
						<table class="table table-striped table-borderless table--responsive--xl">
	<thead>
		<tr>
			<th>S.N.</th>
			<th>Name</th>
			<th>Category</th>
			<th>Goal Amount</th>
			<th>Fund Raised</th>
			<th>Deadline</th>
			<th>Approval Status</th>
			<th>Campaign Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	    <?php
	     $sql = "select * from campaign where user_id='".$_SESSION["login_id"]."'";
	     if(!empty($_GET['status'])){
	         $sql .= " and status='".$_GET['status']."'";
	     }
	     $sql .= " order by id desc";
	     $cquery = mysqli_query($con,$sql);
	     $num_rows = mysqli_num_rows($cquery);
	     if($num_rows > 0){
	       $i=0;  
	       while($row=mysqli_fetch_assoc($cquery)) { 
	         $i++;
	         $cat_res = mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='".$row['category_id']."'"));
	     ?>
		<tr>
			<td> <?=$i?> </td>
			<td> <span class="text-overflow-1 text--base"><?=$row['name']?></span> </td>
			<td><?=$cat_res['name']?></td>
			<td>$<?=$row['goal_amount']?></td>
			<td>$0.00</td>
			<td> <span> <span class="d-block"><?=date("d-F-Y", strtotime($row['end_date']))?></span> </span>
			</td>
			<td> 
			<?php if($row['status']==0){
			 echo '<span class="badge badge--warning">Pending</span>'; 
			} elseif($row['status']==1){
			   echo '<span class="badge badge--success">Approved</span>'; 
			} else {
			  echo '<span class="badge badge--danger">Disapprove</span>';   
			}
			?>
			</td>
			<td> <span>N/A</span> </td>
			<td>
				<div class="custom--dropdown dropdown-sm">
					<button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Action </button>
					<ul class="dropdown-menu">
						<li>
							<a href="../campaigns-details.php?campaign_id=<?=$row['id']?>" target="_blank" class="dropdown-item"> <i class="fa-regular fa-eye text--info"></i> Details </a>
						</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php } } else { ?>
		  <tr>
		     <td class="text-muted text-center" colspan="100%" data-label="S.N.">No data found</td>
		  </tr>
		<?php } ?>
	</tbody>
</table>
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
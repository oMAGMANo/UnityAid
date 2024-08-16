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
		<title>Unity Aid | My Donations</title>
		<meta name="title" content="Unity Aid | My Donations">
		<meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
		<link rel="shortcut icon" href="../assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
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
								<h1 class="breadcrumb__title"> Volunteering</h1>
								<ul class="breadcrumb__list"> </ul>
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
								<!--<form action="" method="GET" class="input--group">-->
								<!--	<input type="text" class="form--control" name="search" value="" placeholder="Search by Name">-->
								<!--	<button type="submit" class="btn btn--sm btn--base"> <i class="fa-solid fa-magnifying-glass"></i> </button>-->
								<!--</form>-->
							</div>
							<table class="table table-striped table-borderless table--responsive--xl">
								<thead>
									<tr>
										<th>S.N.</th>
										<th>Campaign</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Date</th>
									 </tr>
								</thead>
								<tbody>
								    <?php
	                                 $sql = "select * from volunteers where organizer_id='".$_SESSION["login_id"]."'";
	                                 $cquery = mysqli_query($con,$sql);
	                                 $num_rows = mysqli_num_rows($cquery);
	                                 if($num_rows > 0){
	                                   $i=0;  
	                                   while($row=mysqli_fetch_assoc($cquery)) { 
	                                     $i++; 
	                                     $cat_camp = mysqli_fetch_assoc(mysqli_query($con,"select * from campaign where id='".$row['campaign_id']."'"));
	                                 ?>
									<tr>
										<td> <?=$i?> </td>
										<td><a> <span class="text-overflow-1 text--base"><?=substr($cat_camp['name'],0,50) . " ..."; ?></span> </a></td>
										<td> <span class="text--base"><?=$row['name']?></span></td>
										<td><strong><?=$row['email']?></strong> </td>
										<td><strong><?=$row['phone']?></strong> </td>
										<td> <?=date("d-m-Y h:i A", strtotime($row['created_date'])) ?></td>
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
			<div class="modal custom--modal fade" id="detailsModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fs-5">Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<ul class="list-group userData"></ul>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn--sm btn--secondary" data-bs-dismiss="modal">Close</button>
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
				"use strict"
				$('[data-bs-toggle="tooltip"]').each(function(index, element) {
					new bootstrap.Tooltip(element)
				})
				$('.detailsBtn').on('click', function() {
					let modal = $('#detailsModal')
					let userData = $(this).data('info')
					let html = ''
					if(userData) {
						let fileDownloadUrl = $(this).data('url')
						userData.forEach(element => {
							if(!element.value) return
							if(element.type != 'file') {
								html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>${element.name}</span>
                                        <span>${element.value}</span>
                                    </li>`
							} else {
								html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>${element.name}</span>
                                        <span>
                                            <a href="${fileDownloadUrl}&fileName=${element.value}">
                                                <i class="las la-arrow-circle-down"></i> Attachment                                            </a>
                                        </span>
                                    </li>`
							}
						})
					}
					if($(this).data('admin_feedback') != undefined) {
						html += `<li class="list-group-item">
                                <span class="text--base">Admin Feedback</span>
                                <p class="mt-2 mb-0 fs-16">${$(this).data('admin_feedback')}</p>
                            </li>`
					}
					modal.find('.userData').html(html)
					modal.modal('show')
				})
			})(jQuery)
			</script>
		  
	</body>

	</html>
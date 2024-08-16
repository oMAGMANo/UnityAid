<?php 
include '../config.inc.php';
include 'session.php';
extract($_POST);
if(isset($_POST['upd_status'])){
    $sql_upd = mysqli_query($con,"update donation set status='$status' where id='$id'");
    if($sql_upd){
        header("location: donation.php");
    }
}
?>
	<!DOCTYPE html>
	<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>
			UnityAid | All Donations</title>
		<link rel="shortcut icon" type="image/png" href="../assets/universal/images/logoFavicon/favicon.png">
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<!-- Css -->
		<link rel="stylesheet" href="../assets/admin/css/style.css">
		<link rel="stylesheet" href="../assets/admin/css/theme.css">
		<link rel="stylesheet" href="../assets/admin/css/custom.css">
		<link rel="stylesheet" href="../assets/admin/css/scrollbar.css">
		<link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
		<link rel="stylesheet" href="../assets/universal/css/line-awesome.css">
		<link rel="stylesheet" href="../assets/universal/css/datepicker.css"> </head>

	<body>
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				<?php include 'sidebar.php'; ?>
				<div class="layout-page">
					<div class="content-wrapper">
						<div class="container-fluid flex-grow-1 container-p-y">
							<div class="row">
								<div class="col-xxl">
									<div class="card mb-4">
										<div class="card-header d-flex flex-wrap gap-3 justify-content-between align-items-center">
											<h5 class="mb-0">All Donations</h5>
											<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center">
												<form action="" method="GET" class="d-flex flex-wrap gap-2">
													<div class="d-inline">
														<div class="input-group justify-content-end">
															<input type="search" name="search" class="form-control" placeholder="Transaction ID" value="">
															<button class="btn btn-label-primary input-group-text" type="submit"> <i class="fa fa-search"></i> </button>
														</div>
													</div>
													<!--<div class="d-inline">-->
													<!--	<div class="input-group justify-content-end">-->
													<!--		<input type="search" name="date" class="form-control datepicker-here" data-range="true" data-multiple-dates-separator=" - " data-language="en" data-format="Y-m-d" data-position='bottom right' placeholder="Start Date - End Date" autocomplete="off" value="" value="">-->
													<!--		<button class="btn btn-label-primary input-group-text" type="submit"> <i class="fa fa-search"></i> </button>-->
													<!--	</div>-->
													<!--</div>-->
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card mb-4">
										<div class="card-widget-separator-wrapper">
											<div class="card-body card-widget-separator">
												<div class="row gy-4 gy-sm-1">
													<a href="#" class="col-sm-6 col-lg-4">
														<div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
															<div>
															    <?php 
															      $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='1'"));
															      ?> 
																<h3 class="mb-1">₹<?=number_format($res_donate['total_donation'])?></h3>
																<p class="mb-0">Done Donation Amount</p>
															</div> <span class="badge bg-label-success rounded p-2 me-sm-4">
                                            <i class="las la-check-circle fs-3"></i>
                                        </span> </div>
														<hr class="d-none d-sm-block d-lg-none me-4"> </a>
														 <?php 
															      $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='0'"));
															      ?> 
													<a href="#" class="col-sm-6 col-lg-4">
														<div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
															<div>
																<h3 class="mb-1">₹<?=number_format($res_donate['total_donation'])?></h3>
																<p class="mb-0">Pending Donation Amount</p>
															</div> <span class="badge bg-label-warning rounded p-2 me-sm-4">
                                            <i class="las la-spinner fs-3"></i>
                                        </span> </div>
														<hr class="d-none d-sm-block d-lg-none me-4"> </a>
														<?php 
															      $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='2'"));
															      ?> 
													<a href="#" class="col-sm-6 col-lg-4">
														<div class="d-flex justify-content-between align-items-start">
															<div>
																<h3 class="mb-1">₹<?=number_format($res_donate['total_donation'])?></h3>
																<p class="mb-0">Cancelled Donation Amount</p>
															</div> <span class="badge bg-label-danger rounded p-2">
                                            <i class="lar la-times-circle fs-3"></i>
                                        </span> </div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xxl">
									<div class="card">
										<div class="card-body table-responsive text-nowrap fixed-min-height-table">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Gateway | Transaction</th>
														<th>Donation Date</th>
														<th>Donor</th>
														<th>User Type</th>
														<th>Doantion Type</th>
														<th>Amount</th>
													 
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody class="table-border-bottom-0">
													<?php
	                                                     $sql = "select * from donation where is_all=0";
	                                                     if($_GET['status']!=''){
	                                                         $sql .= " and status='".$_GET['status']."'";
	                                                     }
	                                                     if(!empty($_GET['search'])){
	                                                         $sql .= " and txn_id like '%".$_GET['search']."%'";
	                                                     }
	                                                     $sql .= " order by id desc";
	                                                     $cquery = mysqli_query($con,$sql);
	                                                     $num_rows = mysqli_num_rows($cquery);
	                                                     if($num_rows > 0){
	                                                       $i=0;  
	                                                       while($row=mysqli_fetch_assoc($cquery)) { 
															$cat_res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM category WHERE id='".$row['id']."'"));
															$res_user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='".$row['id']."'")); 
													?> 
													<tr>
														<td>
															<div> <span class="text-primary">Manual</span>
																<br> <small title="Transaction Number">
                                                <?=$row['txn_id']; ?>
                                            </small> </div>
														</td>
														<td>
															<div> <?=$row['created_date']; ?>
																  </div>
														</td>
														<td>
															<div> <span class="fw-bold"><?=$row['name']; ?></span>  
															</div>
														</td>
														<td> <span class="badge bg-label-info">Registered</span> </td>
														<td> <span class="badge bg-label-info">Visible</span> </td>
														<td>
															<div> ₹<?=$row['amount']; ?></div>
														</td>
													 
														<td>
														    <?php if($row['status']==0) { 
														     echo '<span class="badge bg-label-warning">Pending</span>';
														    } else if($row['status']==1) {
														        echo '<span class="badge bg-label-success">Approved</span>';
														    } else {
														      echo '<span class="badge bg-label-danger">Rejected</span>';  
														    }
														     ?>
														    </td>
														<td>
															<button type="button" class="btn btn-sm btn-label-info donorViewBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" data-user_type="32" data-donation_type="1" data-donor_name="<?=$row['name']?>" data-donor_email="<?=$row['email']?>" data-donor_phone="<?=$row['phone']?>" data-donor_country="<?=$row['country']?>" data-user_data="[{&quot;name&quot;:&quot;Trx Number&quot;,&quot;type&quot;:&quot;text&quot;,&quot;value&quot;:&quot;54634563456346346&quot;},{&quot;name&quot;:&quot;Receipt&quot;,&quot;type&quot;:&quot;file&quot;,&quot;value&quot;:&quot;2024\/04\/11\/661757ccb3c7b1712805836.jpg&quot;}]" data-admin_feedback="" data-url="../uploads/<?=$row['attachment']?>"> <span class="tf-icons las la-info-circle me-1"></span> Details </button>
															<div class="btn-group">
																<button type="button" class="btn btn-sm btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Action </button>
																<ul class="dropdown-menu">
																	<li>
																		<button type="button" class="dropdown-item decisionBtn" data-question="Do you want to approve this donation?" data-action="<?=$row['id']?>" data-status="1"> <i class="las la-check-circle fs-6 link-success"></i> Approve </button>
																	</li>
																	<li>
																		<button type="button" class="dropdown-item decisionBtn" data-action="<?=$row['id']?>" data-status="2"> <i class="lar la-times-circle fs-6 link-danger" ></i> Reject </button>
																	</li>
																</ul>
															</div>
														</td>
													</tr>
													 <?php } } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
								<div class="offcanvas-header">
									<h3 id="offcanvasBothLabel" class="offcanvas-title">Donation Details</h3> </div>
								<div class="offcanvas-body my-auto mx-0 flex-grow-0">
									<div class="basicData"></div>
									<div class="userData"></div>
									<button type="button" class="btn btn-secondary d-grid w-100 mt-4" data-bs-dismiss="offcanvas"> Close </button>
								</div>
							</div>
							
							<div class="modal-onboarding modal fade animate__animated" id="decisionModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content text-center">
										<div class="modal-header border-0">
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body p-0">
											<div class="onboarding-media">
											 
											</div>
											<div class="onboarding-content mb-0">
												<h4 class="onboarding-title text-body">Make Your Decision</h4>
												<div class="onboarding-info question"></div>
											</div>
										</div>
										<form action="" method="POST">
											<input type="hidden" name="id" id="id" value="" autocomplete="off">
											<input type="hidden" name="status" id="status" value="" autocomplete="off">
											<div class="modal-footer border-0 justify-content-center">
												<button type="submit" name="upd_status" class="btn btn-primary">Yes</button>
												<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">No</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="modal-onboarding modal fade animate__animated" id="cancelModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content text-center">
										<div class="modal-header border-0">
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form action="" method="POST">
											
											<div class="modal-body p-0 text-center">
												<div class="onboarding-media">
												
												</div>
												<div class="onboarding-content mb-0">
													<h4 class="onboarding-title text-body">Make Your Decision</h4>
													<div class="onboarding-info question"> Do you want to reject this donation? </div>
													<div class="row">
														<div class="col-sm-12 mt-3">
															<h5>Reason</h5>
															<div class="mb-3">
																<textarea class="form-control" name="admin_feedback" rows="3" required></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer border-0 justify-content-center">
												<button type="submit" class="btn btn-primary">Yes</button>
												<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">No</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php include 'footer.php'; ?>
					</div>
				</div>
			</div>
			<div class="layout-overlay layout-menu-toggle"></div>
			<div class="drag-target"></div>
		</div>
		<script src="../assets/admin/js/helpers.js"></script>
		<script src="../assets/admin/js/config.js"></script>
		<script src="../assets/universal/js/jquery-3.7.1.min.js"></script>
		<script src="../assets/universal/js/bootstrap.js"></script>
		<script src="../assets/admin/js/scrollbar.js"></script>
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
		<script src="../assets/universal/js/datepicker.js"></script>
		<script src="../assets/universal/js/datepicker.en.js"></script>
		<script src="../assets/admin/js/page/menu.js"></script>
		<script>
		(function($) {
			"use strict";
			$(document).on('click', '.decisionBtn', function() {
				let modal = $('#decisionModal');
				let data = $(this).data();
				modal.find('.question').text(`${data.question}`);
				modal.find('#id').val(`${data.action}`);
				modal.find('#status').val(`${data.status}`); 
				modal.modal('show');
			});
		})(jQuery);
		</script>
		<script>
		(function($) {
			"use strict";
			$('.datepicker-here').on('input keyup keydown keypress', function() {
				return false;
			});
			if(!$('.datepicker-here').val()) {
				$('.datepicker-here').datepicker();
			}
		})(jQuery);
		</script>
		<script>
		(function($) {
			"use strict"
			$('.donorViewBtn').on('click', function() {
				let donorType, donoationType;
				if($(this).data('user_type')) {
					donorType = '<span class="badge bg-label-info">Registered</span>';
				} else {
					donorType = '<span class="badge bg-label-primary">Guest</span>';
				}
				if($(this).data('donation_type')) {
					donoationType = '<span class="badge bg-label-info">Visible</span>';
				} else {
					donoationType = '<span class="badge bg-label-primary">Anonymous</span>';
				}
				let donorName = $(this).data('donor_name')
				let donorEmail = $(this).data('donor_email')
				let donorPhone = $(this).data('donor_phone')
				let donorCountry = $(this).data('donor_country')
				let html = `<div class="mb-4">
                                <h5>Basic Information</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>User Type</b>
                                        ${donorType}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Donation Type</b>
                                        ${donoationType}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Name</b>
                                        <span>${donorName}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Email</b>
                                        <span>${donorEmail}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Phone</b>
                                        <span>${donorPhone}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Country</b>
                                        <span>${donorCountry}</span>
                                    </li>`
				let feedback = $(this).data('admin_feedback')
				if(feedback) {
					html += `<li class="list-group-item">
                                <b class="text-primary">Admin Feedback</b>
                                <p class="mt-2 mb-0 d-none d-sm-block">${feedback}</p>
                            </li>`
				}
				html += `</ul>
                    </div>`
				$('.basicData').html(html)
				let userData = $(this).data('user_data')
				if(userData) {
					let downloadURL = $(this).data('url')
					let infoHtml = `<div class="mt-4">
                                        <h5>Donation Related Data</h5>
                                        <ul class="list-group">`
					userData.forEach(element => {
						if(!element.value) return
						if(element.type != 'file') {
							infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>${element.value}</span>
                                        </li>`
						} else {
							infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>
                                                <a href="${downloadURL}">
                                                    <i class="las la-arrow-circle-down"></i> Attachment                                                </a>
                                            </span>
                                        </li>`
						}
					})
					infoHtml += `</ul>
                            </div>`
					$('.userData').html(infoHtml)
				} else {
					$('.userData').html('')
				}
			})
			$('.cancelBtn').on('click', function() {
				let cancelModal = $('#cancelModal')
				cancelModal.find('form').attr('action', $(this).data('action'))
				cancelModal.modal('show')
			})
		})(jQuery)
		</script>
		<script src="../assets/admin/js/main.js"></script>
	</body>

	</html>
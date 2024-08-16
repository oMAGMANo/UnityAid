<?php 
include '../config.inc.php';
include 'session.php';
extract($_POST);
if(isset($_POST['upd_status'])){
    $sql_upd = mysqli_query($con,"update campaign set status='$status' where id='$id'");
    if($sql_upd){
        header("location: campaigns.php");
    }
}
?>
	<!DOCTYPE html>
	<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>
			UnityAid | All Campaigns</title>
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
		<link rel="stylesheet" href="../assets/universal/css/line-awesome.css"> </head>

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
												<h5 class="mb-0">All Events</h5>
												<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center">
													<form action="" method="GET" class="d-flex flex-wrap gap-2">
														<div class="d-inline">
															<div class="input-group justify-content-end">
																<input type="search" name="search" class="form-control" placeholder="Search..." value="">
																<button class="btn btn-label-primary input-group-text" type="submit"> <i class="fa fa-search"></i> </button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xxl">
										<div class="card">
											<div class="card-body table-responsive text-nowrap fixed-min-height-table">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>Name</th>
															<th>Category</th>
															<th>Author</th>
															<th>Goal | Raised</th>
															<th>Start Date | End Date</th>
															<th>Approval Status</th>
															<th>Campaign Status</th>
															<th>Featured</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody class="table-border-bottom-0">
														<?php
	                                                     $sql = "select * from campaign where is_all=0";
	                                                     if($_GET['status']!=''){
	                                                         $sql .= " and status='".$_GET['status']."'";
	                                                     }
	                                                     if(!empty($_GET['search'])){
	                                                         $sql .= " and name like '%".$_GET['search']."%'";
	                                                     }
	                                                     $sql .= " order by id desc";
	                                                     $cquery = mysqli_query($con,$sql);
	                                                     $num_rows = mysqli_num_rows($cquery);
	                                                     if($num_rows > 0){
	                                                       $i=0;  
	                                                       while($row=mysqli_fetch_assoc($cquery)) { 
	                                                         $i++;
	                                                         $cat_res = mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='".$row['category_id']."'"));
	                                                         $res_user = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='".$row['user_id']."'")); 
	                                                     ?> 
														<tr>
															<td> <span title="<?=$row['name']?>"><?=substr($row['name'],0,20) . " ..."; ?></span> </td>
															<td> <strong><?=$cat_res['name']?></strong> </td>
															<td>
																<div> <span class="fw-bold"><?=$res_user['name']?></span>
																	<br> <span class="small"> <a href="user-details.php?uid=<?=$res_user['id']?>">@<?=$res_user['username']?></a> </span> </div>
															</td>
															<td>
																<div> <span class="text-success">₹<?=$row['goal_amount']?></span></div>
															</td>
															<td>
																<div> <span><?=date("d-F-Y", strtotime($row['start_date']))?></span>
																	<br> <span class="text-warning"><?=date("d-F-Y", strtotime($row['end_date']))?></span> </div>
															</td>
															<td>
															    <?php if($row['status']==0){
			                                                      echo '<span class="badge bg-label-warning">Pending</span>'; 
			                                                     } elseif($row['status']==1){
			                                                        echo '<span class="badge bg-label-success">Approved</span>'; 
			                                                     } else {
			                                                       echo '<span class="badge bg-label-danger">Disapprove</span>';   
			                                                     }
			                                                     ?>
															</td>
															<td> <span class="badge bg-label-warning">N/A</span> </td>
															<td> <span class="badge bg-label-warning">No</span> </td>
															<td>
																<a href="../campaigns-details.php?campaign_id=<?=$row['id']?>" target="_blank" class="btn btn-sm btn-label-info"> <span class="tf-icons las la-info-circle me-1"></span> Details </a>
																<div class="btn-group">
																	<button type="button" class="btn btn-sm btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Action </button>
																	<ul class="dropdown-menu">
																		<li>
																			<button type="button" class="dropdown-item decisionBtn" data-question="Do you want to approve this campaign?" data-id="<?=$row['id']?>" data-status="1"> <i class="las la-check-circle fs-6 link-success"></i> Approve </button>
																		</li>
																		<li>
																			<button type="button" class="dropdown-item decisionBtn" data-question="Do you want to reject this campaign?" data-id="<?=$row['id']?>" data-status="2"> <i class="las la-ban fs-6 link-danger"></i> Reject </button>
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
		<script src="../assets/admin/js/page/menu.js"></script>
		<script>
		(function($) {
			"use strict";
			$(document).on('click', '.decisionBtn', function() {
				let modal = $('#decisionModal');
				let data = $(this).data();
				modal.find('#id').val(`${data.id}`);
				modal.find('#status').val(`${data.status}`);
			    modal.modal('show');
			});
		})(jQuery);
		</script>
		<script src="../assets/admin/js/main.js"></script>
	</body>

	</html>
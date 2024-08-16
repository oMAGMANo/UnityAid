<?php 
include '../config.inc.php';
include 'session.php';
extract($_POST);
$role = $_GET['role'];
if(isset($_POST['delete'])){
    $sql = mysqli_query($con,"delete from volunteers where id='$id'");
    if($sql){
        header("location: volunteering.php");
    }
}
?>
	<!DOCTYPE html>
	<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>
		UnityAid | All Users</title>
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
											<h5 class="mb-0">All Volunteering</h5>
											<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center">
												<form action="" method="GET" class="d-flex flex-wrap gap-2">
													<div class="d-inline">
														<div class="input-group justify-content-end">
															<input type="search" name="search" class="form-control" placeholder="Username" value="">
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
													    <th>Event</th>
														<th>User</th>
														<th>Email | Phone</th>
														<th>Country</th>
													    <th>Joined</th>
													    <th>Action</th>
													</tr>
												</thead>
												<tbody class="table-border-bottom-0">
												    <?php
	                                                     $sql = "select * from volunteers where 1=1";
	                                                     if(!empty($_GET['search'])){
	                                                         $sql .= " and name like '%".$_GET['search']."%'";
	                                                     }
	                                                     $sql .= " order by id desc";
	                                                     $cquery = mysqli_query($con,$sql);
	                                                     $num_rows = mysqli_num_rows($cquery);
	                                                     if($num_rows > 0){
	                                                       $i=0;  
	                                                       while($row=mysqli_fetch_assoc($cquery)) {
	                                                       
	                                                         $res_event = mysqli_fetch_assoc(mysqli_query($con,"select * from campaign where id='".$row['campaign_id']."'"));
	                                                       
	                                                       ?>
													<tr>
													    <td><span title="<?=$res_event['name']?>"><?=substr($res_event['name'],0,20) . " ..."; ?></span></td>
														<td>
															<div> <span class="fw-bold"><?=$row['name']?></span>  
															</div>
														</td>
														<td>
															<div> <?=$row['email']?>
																<br><?=$row['phone']?> </div>
														</td>
														 <td>
															<div> <?=$row['country']?> </div>
														</td>
														<td>
															<div> <?=$row['created_date']?></div>
														</td>
														 
														<td>
															<a href="../campaigns-details.php?campaign_id=<?=$row['campaign_id']?>" target="_blank" class="btn btn-sm btn-label-info"> <span class="tf-icons las la-info-circle me-1"></span> Details </a>
														    <button type="button" class="btn btn-sm btn-label-danger decisionBtn" data-question="Are you sure to Delete this Volunteering?" data-action="<?=$row['id']?>"> <span class="tf-icons las la-ban me-1"></span> Delete </button>
														</td>
													</tr>
													<?php } } ?>
													 
												</tbody>
											</table>
										</div>
										<div class="card-footer pagination justify-content-center">
											<!--<nav>-->
											<!--	<ul class="pagination">-->
											<!--		<li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous"> <span class="page-link" aria-hidden="true">&lsaquo;</span> </li>-->
											<!--		<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>-->
											<!--		<li class="page-item"><a class="page-link" href="users.php?page=2">2</a></li>-->
											<!--		<li class="page-item"> <a class="page-link" href="users.php?page=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a> </li>-->
											<!--	</ul>-->
											<!--</nav>-->
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
											
											<div class="onboarding-content mb-0">
												<h4 class="onboarding-title text-body">Make Your Decision</h4>
												<div class="onboarding-info question"></div>
											</div>
										</div>
										<form action="" method="POST">
											<input type="hidden" name="id" id="cat_id" value="" autocomplete="off">
											<div class="modal-footer border-0 justify-content-center">
												<button type="submit" name="delete" class="btn btn-primary">Yes</button>
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
				$('#cat_id').val(`${data.action}`); 
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
			"use strict";
			$('.detailBtn').on('click', function() {
				let kycData = $(this).data('kyc_data');
				let infoHtml = ``;
				if(kycData) {
					let fileDownloadUrl = '../admin/file-download?filePath=verify';
					infoHtml += `<div class="mt-3">
                                                <ul class="list-group">`;
					kycData.forEach(element => {
						if(!element.value) return;
						if(element.type != 'file') {
							infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>${element.value}</span>
                                        </li>`;
						} else {
							infoHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>${element.name}</b>
                                            <span>
                                                <a href="${fileDownloadUrl}&fileName=${element.value}">
                                                    <i class="las la-arrow-circle-down"></i> Attachment                                                </a>
                                            </span>
                                        </li>`;
						}
					});
					infoHtml += `</ul>
                            </div>`;
				} else {
					infoHtml += `<div class="mt-3">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <b>No data found</b>
                                        </li>
                                    </ul>
                                </div>`;
				}
				$('.kycData').html(infoHtml);
			});
		})(jQuery);
		</script>
		<script src="../assets/admin/js/main.js"></script>
	</body>

	</html>
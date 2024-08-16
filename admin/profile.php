<?php 
include '../config.inc.php';
include 'session.php';
 $res_u = mysqli_fetch_assoc(mysqli_query($con,"select * from admin where id='".$_SESSION['admin_id']."'"));
 $msglog='';
 extract($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $sql = mysqli_query($con,"update admin set name='$name',email='$email',username='$username' where id='".$_SESSION['admin_id']."'");  
  if($sql){
      $msglog = '<div class="alert alert-success alert-dismissible fade show">
                                     Profile Updated Successfully
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
  } else {
      $msglog = '<div class="alert alert-danger alert-dismissible fade show">
                                       Something Went Wrong
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
  }
}
?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title>UnityAid | Profile</title>
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
										<h5 class="mb-0">Profile</h5>
										<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center"> </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
								<div class="card mb-4">
									<div class="card-body">
										<div class="user-avatar-section">
											 
										</div>
										<h5 class="pb-2 border-bottom mb-4 mt-4"></h5>
										<div class="info-container">
											<table class="table table-borderless">
												<tbody>
													<tr>
														<td class="px-0 w-40"><span class="fw-medium me-2">Username:</span></td>
														<td class="text-end px-0 w-60"><span><?=$res_u['username']?></span></td>
													</tr>
													<tr>
														<td class="px-0 w-40"><span class="fw-medium me-2">Email:</span></td>
														<td class="text-end px-0 w-60"><span><?=$res_u['email']?></span></td>
													</tr>
													<tr>
														<td class="px-0 w-40"><span class="fw-medium me-2">Status:</span></td>
														<td class="text-end px-0 w-60"><span class="badge bg-label-success">Active</span></td>
													</tr>
													 
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
								<ul class="nav nav-pills flex-column flex-md-row mb-3">
									<li class="nav-item"> <a class="nav-link active" href="profile.php"><i class="las la-user-circle me-1"></i>Profile</a> </li>
									<li class="nav-item"> <a class="nav-link" href="password.php"><i class="las la-key me-1"></i>Password</a> </li>
								</ul>
								<div class="card mb-4">
									<h5 class="card-header">Details</h5>
									<div>
										<form class="card-body" action="" method="POST" enctype="multipart/form-data">
										    <?=$msglog?>
											<input type="hidden" name="_token" value="etQykMtpmprmmE4ASml1iB95rGPRhRqsWsf1Zsze" autocomplete="off">
											<div class="row mb-3">
												<label class="col-sm-3 col-form-label required">Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="name" value="<?=$res_u['name']?>" required> </div>
											</div>
											<div class="row mb-3">
												<label class="col-sm-3 col-form-label required">Username</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="username" value="<?=$res_u['username']?>" required> </div>
											</div>
											<div class="row mb-3">
												<label class="col-sm-3 col-form-label required">Email</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="email" value="<?=$res_u['email']?>" required> </div>
											</div>
											 
											 
											<div class="row pt-4">
												<div class="col-12 text-center">
													<button type="submit" name="submit" class="btn btn-primary me-sm-2 me-1">Submit</button>
													<button type="reset" class="btn btn-label-secondary">Cancel</button>
												</div>
											</div>
										</form>
									</div>
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
	<script src="../assets/admin/js/main.js"></script>
</body>

</html>
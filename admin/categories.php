<?php 
include '../config.inc.php';
include 'session.php';
$targetDir = "../uploads/";
$msglog = '';
$allowTypes = array('jpg','png','jpeg','gif');
extract($_POST);
if(isset($_POST['delete'])){
    $sql = mysqli_query($con,"delete from category where id='$id'");
    if($sql){
        header("location: categories.php");
    }
}
if(isset($_POST['add_cat'])){
   $sql_add = "insert into category set name='$name'";
   if(mysqli_query($con,$sql_add)){
       $last_id = mysqli_insert_id($con);
       if(!empty($_FILES["image"]["name"])){
            $fileName = uniqid().'_'.basename($_FILES["image"]["name"]);
            $file_name = str_replace(' ', '-', $fileName);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    mysqli_query($con,"UPDATE category SET image='$file_name' WHERE id='".$last_id."'");
                }else{
                    $err_msg = 0;
                }
            }else{
                $err_msg = 0;
            }
        }
    
     header("location: categories.php");    
        
   }
}
if(isset($_POST['upd'])){
   $sql_add = "update category set name='$name' where id='$cat_id'";
   if(mysqli_query($con,$sql_add)){
       $last_id = $cat_id;
       if(!empty($_FILES["image"]["name"])){
            $fileName = uniqid().'_'.basename($_FILES["image"]["name"]);
            $file_name = str_replace(' ', '-', $fileName);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    mysqli_query($con,"UPDATE category SET image='$file_name' WHERE id='".$last_id."'");
                }else{
                    $err_msg = 0;
                }
            }else{
                $err_msg = 0;
            }
        }
    
     header("location: categories.php");    
        
   }
}
?>
	<!DOCTYPE html>
	<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>UnityAid | Campaign Categories</title>
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
											<h5 class="mb-0">Campaign Categories</h5>
											<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center">
											 
												<button type="button" class="btn btn-label-primary addBtn"> <span class="tf-icons las la-plus-circle me-1"></span> Add New </button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xxl">
									<div class="card">
										<div class="card-body table-responsive text-nowrap">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Image</th>
														<th>Name</th>
													    <th>Action</th>
													</tr>
												</thead>
												<tbody class="table-border-bottom-0">
												    <?php
												     $sql_cat = mysqli_query($con,"select * from category");
												     while($row=mysqli_fetch_assoc($sql_cat)){
												    ?>
													<tr>
														<td>
															<div class="avatar me-2"> <img src="../uploads/<?=$row['image']?>" alt="image" class="rounded"> </div>
														</td>
														<td><?=$row['name']?></td>
													    <td>
															<button type="button" class="btn btn-sm btn-label-primary editBtn" data-name="<?=$row["name"]?>" data-image="./uploads/<?=$row['image']?>" data-id="<?=$row["id"]?>"> <span class="tf-icons las la-pen me-1"></span> Edit </button>
															<button type="button" class="btn btn-sm btn-label-danger decisionBtn" data-question="Are you sure to Delete this category?" data-action="<?=$row['id']?>"> <span class="tf-icons las la-ban me-1"></span> Delete </button>
														</td>
													</tr>
												 <?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalCenterTitle">Add New Category</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<hr>
										<form action="" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="BauNVIatwEL8G9RJ3ORgcZ9m9VzacJ1cC0UKlBuO" autocomplete="off">
											<div class="modal-body">
												<div class="row mb-3">
													<label class="col-sm-3 col-form-label required">Image</label>
													<div class="col-sm-9">
														<div class="image-upload">
															<div class="thumb">
																<div class="avatar-preview">
																	<div class="profilePicPreview" style="background-image: url(../placeholder-image/300x300)">
																		<button type="button" class="remove-image"> <i class="las la-times"></i> </button>
																	</div>
																</div>
																<div class="avatar-edit">
																	<input type="file" class="profilePicUpload" name="image" id="addImage" accept=".png, .jpg, .jpeg" required>
																	<label for="addImage" class="btn btn-primary upload-btn" title="Image"> <i class="las la-upload"></i> </label>
																	<p class="pt-2"> Supported files:
																		<mark>jpeg, jpg, png.</mark> Image size
																		<mark>300x300px.</mark>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-3 col-form-label required">Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="name" required> </div>
												</div>
											</div>
											<hr>
											<div class="modal-footer">
												<button type="submit" name="add_cat" class="btn btn-primary">Add</button>
												<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalCenterTitle">Update Category</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<hr>
										<form action="" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="cat_id" id="cat_id" value="BauNVIatwEL8G9RJ3ORgcZ9m9VzacJ1cC0UKlBuO" autocomplete="off">
											<div class="modal-body">
												<div class="row mb-3">
													<label class="col-sm-3 col-form-label">Image</label>
													<div class="col-sm-9">
														<div class="image-upload">
															<div class="thumb">
																<div class="avatar-preview">
																	<div class="profilePicPreview">
																		<button type="button" class="remove-image"> <i class="las la-times"></i> </button>
																	</div>
																</div>
																<div class="avatar-edit">
																	<input type="file" class="profilePicUpload" name="image" id="fileUploader" accept=".png, .jpg, .jpeg">
																	<label for="fileUploader" class="btn btn-primary upload-btn" title="Image"> <i class="las la-upload"></i> </label>
																	<p class="pt-2"> Supported files:
																		<mark>jpeg, jpg, png.</mark> Image size
																		<mark>300x300px.</mark>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-3 col-form-label required">Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="name" id="name" required> </div>
												</div>
											</div>
											<hr>
											<div class="modal-footer">
												<button type="submit" name="upd" class="btn btn-primary">Update</button>
												<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
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
			"use strict"
			let addModal = $('#addModal')
			let editModal = $('#editModal')
			$('.addBtn').on('click', function() {
				addModal.modal('show')
			})
			$('.editBtn').on('click', function() {
			    let image = $(this).data('image');
			    let id = $(this).data('id');
			    let name = $(this).data('name');
				let formAction = $(this).data('action');
				editModal.find('.profilePicPreview').css("background-image", `url(${image})`)
				editModal.find('[name=cat_id]').val(id);
				$('#name').val(`${name}`); 
				editModal.find('form').attr('action', formAction);
				editModal.modal('show');
			})
		})(jQuery)
		</script>
		<script src="../assets/admin/js/main.js"></script>
	</body>

	</html>
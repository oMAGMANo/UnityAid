<?php 
include '../config.inc.php';
include 'session.php';
$msglog='';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upd"])) {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $address = $_POST["address"];

    // Handle image upload if provided
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "../uploads/";
        $allowTypes = array('jpg','jpeg','png');

        $image_name = $_FILES["image"]["name"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];
        $image_size = $_FILES["image"]["size"];

        $image_file_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        // Check if file type is allowed
        if (!in_array($image_file_type, $allowTypes)) {
             $msglog = '<div class="alert alert-danger alert-dismissible fade show">
                                      Error: Only JPG, JPEG, and PNG files are allowed for the image.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
          
        }

        // Check image dimensions (assuming 200x200px)
        list($width, $height) = getimagesize($image_tmp_name);
        if ($width != 200 || $height != 200) {
            
            $msglog = '<div class="alert alert-danger alert-dismissible fade show">
                                     Error: Image size must be 200x200 pixels.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
            
        }

        // Generate a unique filename for the image
        $image_unique_name = uniqid() . '_' . $image_name;

        // Move the uploaded image to the upload directory
        move_uploaded_file($image_tmp_name, $targetDir . $image_unique_name);

        // Update user information with the image filename
        $sql = "UPDATE users SET name='$name', phone='$phone', state='$state', city='$city', zip='$zip', address='$address', image='$image_unique_name' WHERE id = '".$_SESSION['login_id']."'";
    } else {
        // Update user information without the image
        $sql = "UPDATE users SET name='$name', phone='$phone', state='$state', city='$city', zip='$zip', address='$address' WHERE  id = '".$_SESSION['login_id']."'";
    }

    if (mysqli_query($con,$sql)) {
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
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Unity Aid | Profile Settings</title>

        <meta name="title" content="Unity Aid | Profile Settings">

       
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
        .upload__img input, 
        .image-preview {
            width: 200px;
        }

        .upload__img .image-preview {
            color: rgb(136, 134, 134);
        }
    </style>
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
                            <h1 class="breadcrumb__title">Profile Settings</h1>
                            <ul class="breadcrumb__list">
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <div class="dashboard py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card custom--card">
                        <div class="card-body">
                            <div class="row g-4">
                                <?php
                                 $res_u = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='".$_SESSION['login_id']."'"));
                                ?>
                                <div class="col-lg-5">
                                    <ul class="user-profile-list">
                                        <li><span><i class="fa-solid fa-user"></i> Username</span> <?=$res_u['username']?></li>
                                        <li><span><i class="fa-solid fa-envelope"></i> Email</span> <?=$res_u['email']?></li>
                                        <li><span><i class="fa-solid fa-mobile"></i> Mobile</span> <?=$res_u['phone']?></li>
                                        <li><span><i class="fas fa-map-marker-alt"></i> Address</span> <?=$res_u['address']?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <?=$msglog?>
                                    <form action="" method="POST" class="row gx-4 gy-3" enctype="multipart/form-data">
                                        <div class="col-12 text-center">
                                            <div class="upload__img mb-2">
                                                <label for="imageUpload" class="upload__img__btn"><i class="las la-camera"></i></label>
                                                <input type="file" id="imageUpload" name="image" accept=".jpeg, .jpg, .png">
                                                <div class="upload__img-preview image-preview">
                                                 <?php if($res_u['image']!=''){ echo '<img src="../uploads/'.$res_u['image'].'">'; } ?>   
                                               </div>
                                            </div>
                                            <span><em><small>*Supported files: <span class="text--base fw-bold">jpeg, jpg, png</span>. Image size: <span class="text--base fw-bold">200x200px</span>.</small></em></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label required"> Name</label>
                                            <input type="text" class="form--control" name="name" value="<?=$res_u['name']?>" required>
                                        </div>
                                         <div class="col-sm-6">
                                            <label class="form--label required">Phone</label>
                                            <input type="text" class="form--control" name="phone" value="<?=$res_u['phone']?>" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">State</label>
                                            <input type="text" class="form--control" name="state" value="<?=$res_u['state']?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">City</label>
                                            <input type="text" class="form--control" name="city" value="<?=$res_u['city']?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">Zip Code</label>
                                            <input type="text" class="form--control" name="zip" value="<?=$res_u['zip']?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form--label">Address</label>
                                            <input type="text" class="form--control" name="address" value="<?=$res_u['address']?>">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="upd" class="btn btn--base w-100 mt-2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
        if (typeof message == 'string') {
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

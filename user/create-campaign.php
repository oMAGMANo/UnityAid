<?php 
include '../config.inc.php';
include 'session.php';
$targetDir = "../uploads/";
$msglog = '';
$allowTypes = array('jpg','png','jpeg','gif','pdf','docx','xlsx');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters
    $name = $_POST["name"];
    $category_id = $_POST["category_id"];
    $goal_amount = $_POST["goal_amount"];
    $start_date = ($_POST["start_date"]!='') ? date("Y-m-d", strtotime($_POST["start_date"])) : '';
    $end_date = ($_POST["end_date"]!='') ? date("Y-m-d", strtotime($_POST["end_date"])) : '';
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    
    
    $sql = "INSERT INTO campaign SET user_id='".$_SESSION['login_id']."',name='$name',category_id='$category_id',goal_amount='$goal_amount',
    start_date='$start_date',end_date='$end_date',description='$description'";

    // Execute SQL statement
    if (mysqli_query($con,$sql)) {
        $last_id = mysqli_insert_id($con);

        // Handle file uploads (assuming image and document)
        if(!empty($_FILES["image"]["name"])){
            $fileName = uniqid().'_'.basename($_FILES["image"]["name"]);
            $file_name = str_replace(' ', '-', $fileName);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    mysqli_query($con,"UPDATE campaign SET image='$file_name' WHERE id='".$last_id."'");
                }else{
                    $err_msg = 0;
                }
            }else{
                $err_msg = 0;
            }
        } 
        
        if(!empty($_FILES["document"]["name"])){
            $fileName = uniqid().'_'.basename($_FILES["document"]["name"]);
            $file_name = str_replace(' ', '-', $fileName);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)){
                    mysqli_query($con,"UPDATE campaign SET document='$file_name' WHERE id='".$last_id."'");
                }else{
                    $err_msg = 0;
                }
            }else{
                $err_msg = 0;
            }
        } 

        // Inserting gallery images
        if (!empty($_FILES["galimages"]["name"])) {
            foreach ($_FILES["galimages"]["tmp_name"] as $key => $tmp_name) {
                $galimage_name = $_FILES["galimages"]["name"][$key];
                $file_type = pathinfo($galimage_name, PATHINFO_EXTENSION);
                if (in_array($file_type, $allowTypes)) {
                    move_uploaded_file($_FILES["galimages"]["tmp_name"][$key], "../uploads/" . $galimage_name);
                    mysqli_query($con,"INSERT INTO gallery SET campaign_id='$last_id',image='$galimage_name'"); 
                } else {
                    $err_msg = 0;
                }
            }
        }

        // Generate shareable link using the campaign ID
        $shareLink = generateShareLink($last_id);
        
        // Update the shareable link in the database
        mysqli_query($con, "UPDATE campaign SET share_link='$shareLink' WHERE id='$last_id'");

        
        $msglog = '<div class="alert alert-success alert-dismissible fade show">
                                      Campaign Created Successfully Please wait for admin approval.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
    } else {
        $msglog = '<div class="alert alert-danger alert-dismissible fade show">
                                       Something Went Wrong
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
    }
}
function generateShareLink($campaignID)
{
    // Example: You can concatenate the base URL of your website with the campaign ID
    $baseURL = 'https://localhost/project/';
    // http://localhost/project/campaigns-details.php?campaign_id=6
    $shareLink = $baseURL . 'campaign-details.php?campaign_id=' . $campaignID;
    return $shareLink;
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Unity Aid | Create New Campaign</title>

        

        <link rel="stylesheet" href="../assets/universal/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/slick.css">
        <link rel="stylesheet" href="../assets/universal/css/line-awesome.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/lightbox.min.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/aos.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/main.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/custom.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713">

            <link rel="stylesheet" href="../assets/themes/primary/css/dropzone.min.css">
    <link rel="stylesheet" href="../assets/universal/css/datepicker.css">
            <style>
        .date-picker {
            caret-color: transparent;
            cursor: pointer;
        }
        .dropzone {
            border-color: hsl(var(--black) / 0.1);
            min-height: auto;
            transition: .3s
        }
        .dropzone:hover,
        .dropzone:focus,
        .dropzone:focus-within {
            border-color: hsl(var(--base));
        }
        .dropzone .dz-message {
            margin: 30px 0;
        }
        .dropzone .dz-message button::before {
            content: "\f382";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            display: block;
            font-size: 3rem;
            color: hsl(var(--base));
        }
        .dropzone .dz-preview .dz-image {
            border-radius: 5px;
        }
        .dropzone .dz-preview .dz-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .dropzone .dz-preview .dz-remove {
            position: absolute;
            top: -3px;
            right: -3px;
            font-size: 0;
            width: 17px;
            height: 17px;
            background: hsl(var(--danger));
            border-radius: 50%;
            z-index: 20;
        }
        .dropzone .dz-preview .dz-remove::after {
            content: '\f00d';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-45%, -50%);
            font-size: 12px;
            color: hsl(var(--white));
            line-height: 17px;
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
                            <h1 class="breadcrumb__title">Create New Events</h1>
                            <ul class="breadcrumb__list">
                                <li><a href="/">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <div class="create-campaign py-60">
        <div class="container">
            <div class="row g-4 justify-content-center">
               
                <div class="col-lg-9">
                    <div class="custom--card">
                        <div class="card-body">
                            <?=$msglog?>
                            <form action="" method="POST" class="row g-4" enctype="multipart/form-data">
                                 <div class="col-12">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="upload__img mb-2 ms-auto">
                                            <label for="imageUpload" class="form--label required">Event Image</label>
                                            <label for="imageUpload" class="upload__img__btn"><i class="las la-camera"></i></label>
                                            <input type="file" id="imageUpload" name="image" required accept=".jpeg, .jpg, .png">
                                            <div class="upload__img-preview image-preview">+</div>
                                        </div>
                                        <span><em><small><i class="fas fa-info-circle me-1"></i>Supported files: <span class="text--base fw-bold">jpeg, jpg, png</span>. Image size: <span class="text--base fw-bold">855x475px</span>. Thumbnail size: <span class="text--base fw-bold">415x230px</span>.</small></em></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">Name</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-h"></i></span>
                                        <input type="text" class="form--control" name="name" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">Category</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select class="form--control form-select" name="category_id" required>
                                            <option value="" selected>Select Category</option>
                                             <?php
                                              $sqlcat = mysqli_query($con,"select * from category WHERE id != 0");
                                              while($row=mysqli_fetch_assoc($sqlcat)){
                                             ?>
                                              <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                              <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">Goal Amount</label>
                                    <div class="input--group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" step="any" min="0" class="form--control" name="goal_amount" value="" required>
                                    </div>
                                </div>
                                <!--<div class="col-12">-->
                                <!--    <label class="form--label required">Preferred Amounts</label>-->
                                <!--    <div class="d-flex gap-2">-->
                                <!--        <div class="input--group w-100">-->
                                <!--            <span class="input-group-text">₹</span>-->
                                <!--            <input type="number" step="any" min="0" class="form--control" name="preferred_amounts[]" value="" required>-->
                                <!--        </div>-->
                                <!--        <a role="button" class="btn btn--base px-3 d-flex align-items-center" id="addMoreAmounts">-->
                                <!--            <i class="fa-solid fa-plus"></i>-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <div class="add-more-amounts"></div>-->
                                <!--</div>-->
                                <div class="col-sm-6">
                                    <label class="form--label required">Start Date</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                        <input type="text" class="form--control date-picker" name="start_date" value="" data-language="en" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form--label required">End Date</label>
                                    <div class="input--group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                        <input type="text" class="form--control date-picker" name="end_date" value="" data-language="en" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label">Document</label>
                                    <div class="d-flex mb-1">
                                        <input type="file" class="form--control" name="document" accept=".pdf">
                                    </div>
                                    <span><em><small>Supported file: <span class="text--base fw-bold">.pdf</span>.</small></em></span>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">Description</label>
                                    <textarea class="form--control ck-editor" name="description" rows="10"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="col-12">
                                    <label class="form--label required">Gallery</label>
                                    <input type="file" name="galimages[]" class="form--control" required accept=".jpeg, .jpg, .png" multiple>
                                    <span><em><small>*Supported files: <span class="text--base fw-bold">jpeg, jpg, png</span>. Image size: <span class="text--base fw-bold">855x475px</span>.</small></em></span>
                                </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn--base w-100">Create Campaign</button>
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

            <script src="../assets/themes/primary/js/dropzone.min.js"></script>
    <script src="../assets/themes/primary/js/ckeditor.js"></script>
    <script src="../assets/universal/js/datepicker.js"></script>
    <script src="../assets/universal/js/datepicker.en.js"></script>
            <script type="text/javascript">
        (function($) {
            "use strict"

            new Dropzone('.dropzone', {
                thumbnailWidth: 200,
                acceptedFiles: '.jpg, .jpeg, .png',
                addRemoveLinks: true,
                success: function(file, response) {
                    file.unique_name = response.image

                    showToasts('success', response.message)
                },
                error: function(file, response) {
                    showToasts('error', response.error.file[0])
                },
                removedfile: function(file) {
                    let url = "../user/campaign/gallery-remove"
                    let data = {
                        file: file.unique_name,
                        _token: "zDE2VNWNv81RTCQmecnGuTVDHhvfL6RNfMorea8j",
                    }

                    $.post(url, data, function(response) {
                        if (response.status === 'success') {
                            showToasts('success', response.message)
                        } else {
                            console.error(response)
                        }
                    })

                    let fileRef = file.previewElement

                    return fileRef != null ? fileRef.parentNode.removeChild(fileRef) : void 0
                }
            });
        })(jQuery)
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
    <script type="text/javascript">
        (function($) {
            "use strict"

            // Add More Preferred Amounts On Campaign Create Start
            $('#addMoreAmounts').on('click', function () {
                $('.add-more-amounts').append(`
                    <div class="extra-amount d-flex gap-2 pt-2">
                        <div class="input--group w-100">
                            <span class="input-group-text">$</span>
                            <input type="number" step="any" min="0" class="form--control" name="preferred_amounts[]" required>
                        </div>
                        <a role="button" class="btn btn--danger px-3 d-flex align-items-center close-extra-amount">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                `)
            })

            $(document).on('click', '.close-extra-amount', function () {
                $(this).closest('.extra-amount').remove()
            })
            // Add More Preferred Amounts On Campaign Create End

            $('.date-picker').datepicker({
                dateFormat: 'dd-mm-yyyy',
                minDate: new Date(),
            })

            $('.date-picker').on('input keyup keydown keypress', function() {
                return false
            })
        })(jQuery)
    </script>
    </body>
</html>

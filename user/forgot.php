<?php
include '../config.inc.php';
$msglog='';
if(isset($_POST['reset'])){
    $usr = mysqli_real_escape_string($con,trim($_POST['email']));
    $sql_usr = mysqli_query($con,"SELECT COUNT(*) AS n_log,id,role,email,name,password FROM users WHERE (email='".$usr."' or username='".$usr."')") or die(mysqli_error($con));
    $r_usr = mysqli_fetch_array($sql_usr);

    if($r_usr['n_log']==1){
        
        // Send reset password link to the user's email
        $to = $r_usr['email'];
        $subject = "Password Reset";
        $message = "Dear ".$r_usr['name'].",\n\n";
        $message .= "Your Password is:\n";
        $message .= $r_usr['password'];
        $message .= "If you did not request a password reset, please ignore this email.\n\n";
        $message .= "Best regards,\nYour Unity Aid";
        
        $headers = "From: Unity Aid";
        
        if(mail($to, $subject, $message, $headers)){
            $msglog='<div class="alert alert-success alert-dismissible fade show">A Reset Link has been sent to your registered email.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';        
        } else {
            $msglog='<div class="alert alert-danger alert-dismissible fade show">Failed to send reset link. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';  
        }
    } else {
        $msglog='<div class="alert alert-danger alert-dismissible fade show">Email ID not found.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>';  
    }
}
?>
<!DOCTYPE html>
<html lang="en" itemscope="" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Unity Aid | Forgot Password</title>

 
    
    <meta name="twitter:card" content="summary_large_image">

        <link rel="stylesheet" href="../assets/universal/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/slick.css">
        <link rel="stylesheet" href="../assets/universal/css/line-awesome.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/lightbox.min.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/aos.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/main.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/custom.css">
        <link rel="stylesheet" href="../assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713">

                    </head>

    <body>
        <div class="preloader">
            <div class="loader-p"></div>
        </div>

        <div class="body-overlay"></div>
        <div class="sidebar-overlay"></div>

        <a class="scroll-top">
            <i class="fas fa-angle-double-up"></i>
        </a>

            <section class="account py-120">
        <div class="account__bg bg-img" data-background-image="../assets/universal/images/65b74764a461f1706510180.png"></div>
        <div class="container">
            <div class="row justify-content-md-between justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-5 col-md-4">
                    <div class="account-thumb">
                        <img src="../assets/images/site/forgot_password/660135faac49e1711355386.png" alt="">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7">
                    

                    <div class="account-form">
                        <div class="account-form__content mb-4">
                            <h3 class="account-form__title mb-2">Recover your account</h3>
                        </div>
                        <form action="" method="POST" class="verify-gcaptcha">
                            <?=$msglog?>
                            <input type="hidden" name="_token" value="vHIMb2fk9ylBNPcQbC8BcSt8Q2QuW6IoKCeEOcSl" autocomplete="off"> 
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label class="form--label">Username or Email Address</label>
                                    <input type="text" class="form--control" name="email" value="" required="">
                                </div>

                                
                                <div class="col-sm-12">
                                    <button type="submit" name="reset" class="btn btn--base w-100" id="recaptcha"> Reset Password </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

                    </body>
</html>

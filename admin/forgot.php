<?php
include '../config.inc.php';
$msglog='';
if(isset($_POST['reset'])){
    $usr = mysqli_real_escape_string($con,trim($_POST['email']));
    $sql_usr = mysqli_query($con,"SELECT COUNT(*) AS n_log,id,username,password,email FROM admin WHERE email='".$usr."'") or die(mysqli_error($con));
    $r_usr = mysqli_fetch_array($sql_usr);

    if($r_usr['n_log']==1){
        
        // Send reset password link to the user's email
        $to = $r_usr['email'];
        $subject = "Password Reset";
        $message = "Dear ".$r_usr['username'].",\n\n";
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

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Pnixfund | Forgot Password</title>
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

            <link rel="stylesheet" href="../assets/admin/css/page/auth.css">
            </head>

    <body>
            <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="../assets/admin/images/forgot.png" class="img-fluid" alt="Login image" width="700">
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <div class="app-brand mb-3 justify-content-center">
                        <a href="/" target="_blank" class="app-brand-link gap-2">
                          <span class="app-brand-logo demo"><img src="../assets/universal/images/logoFavicon/logo_dark.png" alt="logo"></span>
                        </a>
                    </div>
                    <div class="text-center">
                        <h4 class="mb-2">
                            Forgot Password?                            <img src="../assets/admin/images/forgot.gif" alt="emoji" class="animated-emoji">
                        </h4>
                        <p class="mb-4">Let's make sure that it's you</p>
                    </div>

                    <form class="mb-3 verify-gcaptcha" action="" method="POST">
                        <?=$msglog?>
                        <input type="hidden" name="_token" value="8KsDbgxDMlm0fE7cNMkbpqC7Nwo3CmenNXbnYdpD" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required autofocus>
                        </div>
                      <button class="btn btn-primary d-grid w-100" type="submit" name="reset">Send</button>
                    </form>

                    <div class="text-center">
                        <a href="../admin" class="d-flex align-items-center justify-content-center">
                            <i class="las la-angle-double-left"></i> Back to login </a>
                    </div>
                </div>
            </div>
        </div>
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
                
        <script src="../assets/admin/js/main.js"></script>
    </body>
</html>

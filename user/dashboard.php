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
        <title>Unity Aid | Dashboard</title>

        <meta name="title" content="Unity Aid | Dashboard">

    <meta name="description" content="Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let&#039;s make a difference. Donate now.">
    <meta name="keywords" content="charity,donation,contribution,crowdfund,crowdfunding,donate,fund,fundraiser,fundraising,give help,help,laravel,php script,raising,script,charity application,crowdfunding-script,crowdfunding-solution,donation script,fundraised,fundraiser script,kickstarter,laravel crowdfunding script,laravel-crowdfunding,php mysql crowdfunding script,php-crowdfunding,ultimate-crowdfunding,campaigns,crowdfunding platform,crowdfunding system,fund raising,fund-raising,campaign,crowd funding,crowd sourcing,donations,fund raiser,funding,fundme,rewards">
    <link rel="shortcut icon" href="/project/index.php" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="index.php">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Unity Aid | Dashboard">
 

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
                            <h1 class="breadcrumb__title">Dashboard</h1>
                            <ul class="breadcrumb__list">
                                <li><a href="/project/index.php">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <div class="dashboard py-60">
        <div class="container">
                             
            
            <div class="row g-md-4 g-3 dashboard-card__row pb-60">
               <?php if($role=='event_organizer') { ?>	
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-bullhorn"></i>
                        </div>
                        <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where user_id='".$_SESSION["login_id"]."'")); ?>
                        <div class="dashboard-card__txt">
                            <span class="dashboard-card__number"><?=$camp_num?></span>
                            <span class="dashboard-card__title">Total Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-hourglass-half"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status=0 and user_id='".$_SESSION["login_id"]."'")); ?>
                            <span class="dashboard-card__number"><?=$camp_num?></span>
                            <span class="dashboard-card__title">Pending Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-check-circle"></i>
                        </div>
                        <div class="dashboard-card__txt">
                             <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status=1 and user_id='".$_SESSION["login_id"]."'")); ?>
                            <span class="dashboard-card__number"><?=$camp_num?></span>
                            <span class="dashboard-card__title">Approved Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-times-circle"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status=2 and user_id='".$_SESSION["login_id"]."'")); ?>
                            <span class="dashboard-card__number"><?=$camp_num?></span>
                            <span class="dashboard-card__title">Rejected Campaign</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-hand-holding-usd"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <?php $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='1' and organizer_id='".$_SESSION["login_id"]."'")); ?>  
                            <span class="dashboard-card__number">₹<?=number_format($res_donate['total_donation'])?></span>
                            <span class="dashboard-card__title">Received Donation</span>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xsm-6">
                    <div class="dashboard-card">
                        <div class="dashboard-card__icon">
                            <i class="las la-bullhorn"></i>
                        </div>
                        <div class="dashboard-card__txt">
                            <?php $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='1' and user_id='".$_SESSION['login_id']."'")); ?> 
                            <span class="dashboard-card__number">₹<?=number_format($res_donate['total_donation'])?></span>
                            <span class="dashboard-card__title">My Donation</span>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
               
                 
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

            <script src="../assets/themes/primary/js/apexcharts.js"></script>
            <script>
        (function($) {
            'use strict'

            if ($('#donationReport').length) {
                var baseColorForChart = $('html').css('--success')
                var donationReportOptions = {
                    series: [{
                        name: 'Donation',
                        color: "hsl(" + baseColorForChart + " / .5)",
                        data: JSON.parse('[0,0,0,0,0,0,0,0,0,0,0,0]')
                    }],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'light',
                            type: 'vertical',
                            shadeIntensity: 0,
                            gradientToColors: ["hsl(" + baseColorForChart + " / .1)"],
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100]
                        }
                    },
                    chart: {
                        height: 400,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2,
                        curve: 'smooth'
                    },
                    title: {
                        text: 'Year - ' + new Date().getFullYear(),
                        align: 'center'
                    },
                    xaxis: {
                        fill: '#FFFFFF',
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        labels: {
                            format: 'dddd',
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                    responsive: [
                        {
                            breakpoint: 1199,
                            options: {
                                chart: {
                                    height: 300,
                                },
                            },
                        }, 
                        {
                            breakpoint: 991,
                            options: {
                                chart: {
                                    height: 350,
                                },
                            },
                        }, 
                        {
                            breakpoint: 767,
                            options: {
                                chart: {
                                    height: 300,
                                },
                            },
                        }, 
                        {
                            breakpoint: 575,
                            options: {
                                chart: {
                                    height: 250,
                                },
                            },
                        }
                    ]
                }

                var donationReport = new ApexCharts(document.querySelector("#donationReport"), donationReportOptions)
                donationReport.render()
            }

            if ($('#withdrawReport').length) {
                var baseColorForChart = $('html').css('--warning')
                var withdrawReportOptions = {
                    series: [{
                        name: 'Withdraw',
                        color: "hsl(" + baseColorForChart + " / .5)",
                        data: JSON.parse('[0,0,0,0,0,0,0,0,0,0,0,0]')
                    }],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'light',
                            type: 'vertical',
                            shadeIntensity: 0,
                            gradientToColors: ["hsl(" + baseColorForChart + " / .1)"],
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100]
                        }
                    },
                    chart: {
                        height: 400,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2,
                        curve: 'smooth'
                    },
                    title: {
                        text: 'Year - ' + new Date().getFullYear(),
                        align: 'center'
                    },
                    xaxis: {
                        fill: '#FFFFFF',
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        labels: {
                            format: 'dddd',
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                    responsive: [
                        {
                            breakpoint: 1199,
                            options: {
                                chart: {
                                    height: 300,
                                },
                            },
                        }, 
                        {
                            breakpoint: 991,
                            options: {
                                chart: {
                                    height: 350,
                                },
                            },
                        }, 
                        {
                            breakpoint: 767,
                            options: {
                                chart: {
                                    height: 300,
                                },
                            },
                        }, 
                        {
                            breakpoint: 575,
                            options: {
                                chart: {
                                    height: 250,
                                },
                            },
                        }
                    ]
                }

                var withdrawReport = new ApexCharts(document.querySelector("#withdrawReport"), withdrawReportOptions)
                withdrawReport.render()
            }
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
    </body>
</html>

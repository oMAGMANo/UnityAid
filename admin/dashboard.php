<?php 
include '../config.inc.php';
include 'session.php';
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>UnityAid | Dashboard</title>
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

                    </head>

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
                                        <h5 class="mb-0">Dashboard</h5>
                                        <div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center">
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
                            <?php $user_num = mysqli_num_rows(mysqli_query($con,"select * from users where role='user'")); ?>
                            <a href="#" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1"><?=$user_num?></h3>
                                        <p class="mb-0">Total Users</p>
                                    </div>
                                    <span class="badge bg-label-primary rounded p-2 me-sm-4">
                                        <i class="las la-users fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </a>
                            <?php $user_num = mysqli_num_rows(mysqli_query($con,"select * from users where role='event_organizer'")); ?>
                             <a href="#" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1"><?=$user_num?></h3>
                                        <p class="mb-0">Total Event Organizer</p>
                                    </div>
                                    <span class="badge bg-label-primary rounded p-2 me-sm-4">
                                        <i class="las la-users fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </a>
                        </div>
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
                            <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status='0'")); ?>
                            <a href="campaigns.php?status=0" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1"><?=$camp_num?></h3>
                                        <p class="mb-0">Pending Campaigns Count</p>
                                    </div>
                                    <span class="badge bg-label-warning rounded p-2 me-sm-4">
                                        <i class="las la-spinner fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </a>
                            <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status='1'")); ?>
                            <a href="campaigns.php?status=1" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1"><?=$camp_num?></h3>
                                        <p class="mb-0">Approved Campaigns Count</p>
                                    </div>
                                    <span class="badge bg-label-success rounded p-2 me-lg-4">
                                        <i class="la las la-running fs-3"></i>
                                    </span>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none">
                            </a>
                             <?php $camp_num = mysqli_num_rows(mysqli_query($con,"select * from campaign where status='2'")); ?>
                            <a href="campaigns.php?status=2" class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h3 class="mb-1"><?=$camp_num?></h3>
                                        <p class="mb-0">Reject Campaigns Count</p>
                                    </div>
                                    <span class="badge bg-label-danger rounded p-2">
                                        <i class="las la-battery-empty fs-3"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h5 class="mb-4">Donation Insights</h5>
    </div>
    <div class="row">
      <?php $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='1'")); ?>  
        <a href="#" class="col-lg-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text text-success">Donated</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">₹<?=number_format($res_donate['total_donation'])?></h4>
                            </div>
                            <small>Total donated amount</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="las la-hand-holding-usd fs-3"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='0'")); ?>  
        <a href="#" class="col-lg-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-warning">
                            <p class="card-text text-warning">Pending</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">₹<?=number_format($res_donate['total_donation'])?></h4>
                            </div>
                            <small>Pending donations count</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded p-2">
                                <i class='las la-spinner fs-3'></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php $res_donate = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_donation from donation where status='2'")); ?> 
        <a href="#" class="col-lg-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-danger">
                            <p class="card-text text-danger">Cancelled</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">₹<?=number_format($res_donate['total_donation'])?></h4>
                            </div>
                            <small>Cancelled donations count</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded p-2">
                                <i class='las la-times-circle fs-3'></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
         
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
            <script src="../assets/admin/js/page/apexcharts.js"></script>
    <script src="../assets/admin/js/page/logistics.js"></script>
    <script src="../assets/admin/js/page/menu.js"></script>
            <script>
        "use strict";

        
        var options = {
            series: [{
                name: 'Total Donation',
                data: [
                                            12100,
                                    ]
            }, {
                name: 'Total Withdraw',
                data: [
                                            100,
                                    ]
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ["March-2024"],
            },
            yaxis: {
                title: {
                    text: "$",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

        <script src="../assets/admin/js/main.js"></script>
    </body>
</html>

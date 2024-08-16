<?php 
$r_user = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='".$_SESSION['login_id']."'"));
$u_id = $r_user['id'];
$role=$r_user['role'];
$username = $r_user['username'];
?>

<div class="preloader">
	<div class="loader-p"></div>
</div>
<div class="body-overlay"></div>
<div class="sidebar-overlay"></div>
<a class="scroll-top"> <i class="fas fa-angle-double-up"></i> </a>
<header class="header" id="header">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand logo" href="/project/index.php"> <img src="../assets/universal/images/logoFavicon/logo_light.png" alt="logo"> </a>
			<button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span id="hiddenNav"><i class="las la-bars"></i></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
					<li class="nav-item d-block d-lg-none">
						<div class="top-button d-flex flex-wrap justify-content-between align-items-center">
							<div class="language-box">
								<select class="select form--control form-select langSel">
									<option value="en" selected> English </option>
									<option value="bn"> Bangla </option>
									<option value="fn"> French </option>
								</select>
							</div>
							<ul class="login-registration-list d-flex flex-wrap align-items-center">
								<li class="login-registration-list__item"> <a href="/project/index.php" class="btn btn--sm btn--base">Home</a> </li>
							</ul>
						</div>
					</li>
				   <?php if($role=='event_organizer') { ?>	
					<li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        My Events                                    </a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu__list"> <a href="create-campaign.php" class="dropdown-menu__link">Create Events</a> </li>
							<li class="dropdown-menu__list"> <a href="all-campaign.php" class="dropdown-menu__link">All Events</a> </li>
							<li class="dropdown-menu__list"> <a href="all-campaign.php?status=1" class="dropdown-menu__link">Approved Events</a> </li>
							<li class="dropdown-menu__list"> <a href="all-campaign.php?status=0" class="dropdown-menu__link">Pending Events</a> </li>
							<li class="dropdown-menu__list"> <a href="all-campaign.php?status=2" class="dropdown-menu__link">Rejected Events</a> </li>
						</ul>
					</li>
					<?php } ?>
					<?php if($role=='event_organizer') { ?>
					<li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Donations                                    </a>
						<ul class="dropdown-menu">
							 <li class="dropdown-menu__list"> <a href="received-donation.php" class="dropdown-menu__link">Received Donations</a> </li>
						</ul>
					</li>
					<?php } ?>
				<?php if($role=='user') { ?>	
					<li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Donations                                    </a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu__list"> <a href="donation.php" class="dropdown-menu__link">My Donations</a> </li>
						 </ul>
					</li>
					<?php } ?>
					<!--<li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
     <!--                                   Withdraw                                    </a>-->
					<!--	<ul class="dropdown-menu">-->
					<!--		<li class="dropdown-menu__list"> <a href="../user/withdraw" class="dropdown-menu__link">Withdraw Money</a> </li>-->
					<!--		<li class="dropdown-menu__list"> <a href="../user/withdraw/index" class="dropdown-menu__link">Withdraw History</a> </li>-->
					<!--	</ul>-->
					<!--</li>-->
					<?php if($role=='event_organizer') { ?>
					<li class="nav-item"> <a href="volunteering.php" class="nav-link">Volunteers</a> </li>
					<?php } ?>
					<li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?=$username?>
                                    </a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu__list"> <a href="dashboard.php" class="dropdown-menu__link">Dashboard</a> </li>
							<li class="dropdown-menu__list"> <a href="profile.php" class="dropdown-menu__link">Profile Settings</a> </li>
							<!--<li class="dropdown-menu__list"> <a href="password" class="dropdown-menu__link">Change Password</a> </li>-->
							<!--<li class="dropdown-menu__list"> <a href="../user/twofactor" class="dropdown-menu__link">2FA Settings</a> </li>-->
							<li class="dropdown-menu__list"> <a href="logout.php" class="dropdown-menu__link">Log Out</a> </li>
						</ul>
					</li>
					<li class="nav-item d-lg-block d-none">
						<div class="d-flex gap-2"> <a href="/project/index.php" class="btn btn--sm btn--base">Home</a>
							 
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
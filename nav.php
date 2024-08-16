<div class="preloader">
	<div class="loader-p"></div>
</div>
<div class="body-overlay"></div>
<div class="sidebar-overlay"></div>
<a class="scroll-top"> <i class="fas fa-angle-double-up"></i> </a>
<header class="header" id="header">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand logo" href="/project/index.php"> <img src="assets/universal/images/logoFavicon/logo_light.png" alt="logo"> </a>
			<button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span id="hiddenNav"><i class="las la-bars"></i></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
					<li class="nav-item d-block d-lg-none">
						<div class="top-button d-flex flex-wrap justify-content-between align-items-center">
							<div class="language-box">
								<select class="select form--control form-select langSel">
									<option value="en" selected=""> English </option>
									<option value="bn"> Bangla </option>
									<option value="fn"> French </option>
								</select>
							</div>
							<ul class="login-registration-list d-flex flex-wrap align-items-center">
								<li class="login-registration-list__item"> <a href="user/login.php" class="btn btn--sm btn--base">Login</a> </li>
							</ul>
						</div>
					</li>
					<li class="nav-item"> <a href="index.php" class="nav-link">Home</a> </li>
					<li class="nav-item"> <a href="about.php" class="nav-link">About</a> </li>
				    <li class="nav-item"> <a href="campaigns.php" class="nav-link">Events</a> </li>
				 
					<li class="nav-item"> <a href="contact.php" class="nav-link">Contact</a> </li>
					<li class="nav-item d-lg-block d-none">
						<div class="d-flex gap-2"> 
						<?php if(isset($_SESSION["login_id"])){ ?>
						 <a href="user/dashboard.php" class="btn btn--sm btn--base">Dashboard</a>   
					   <?php	} else { ?>
						<a href="user/login.php" class="btn btn--sm btn--base">Login</a>
						<?php } ?>
							 
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
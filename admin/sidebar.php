<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="../admin/dashboard" class="app-brand-link"> <span class="app-brand-text demo menu-text fw-bolder ms-2 logo-big">
                <img src="../assets/universal/images/logoFavicon/logo_dark.png" alt="logo">
            </span> <span class="app-brand-text demo menu-text fw-bolder logo-small">
                <img src="../assets/universal/images/logoFavicon/favicon.png" alt="logo">
            </span> </a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto"> <i class="las la-chevron-left align-middle"></i> </a>
	</div>
	<div id="searchBoxSm"></div>
	<div class="menu-inner-shadow"></div>
	<ul class="menu-inner py-1">
		<li class="menu-item active">
			<a href="dashboard.php" class="menu-link"> <i class="menu-icon tf-icons las la-tachometer-alt text-primary"></i>
				<div class="text-truncate">Dashboard</div>
			</a>
		</li>
		<li class="menu-item ">
			<a href="categories.php" class="menu-link"> <i class="menu-icon tf-icons las la-stream text-warning"></i>
				<div class="text-truncate">Categories</div>
			</a>
		</li>
		<li class="menu-item ">
			<a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons las la-bullhorn text-cyan"></i>
				<div class="text-truncate text-nowrap d-inline-block">Events</div>
				<div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"><i class="las la-exclamation"></i></div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item ">
					<a href="campaigns.php" class="menu-link">
						<div class="text-truncate">All</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="campaigns.php?status=0" class="menu-link">
						<div class="text-truncate">Pending</div>
						 
					</a>
				</li>
				<li class="menu-item ">
					<a href="campaigns.php?status=1" class="menu-link">
						<div class="text-truncate">Approved</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="campaigns.php?status=2" class="menu-link">
						<div class="text-truncate">Rejected</div>
					</a>
				</li>
		    </ul>
		</li>
	 
	   <li class="menu-item ">
			<a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons las la-users text-purple"></i>
				<div class="text-truncate text-nowrap d-inline-block">Users</div>
				<div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"> <i class="las la-exclamation"></i> </div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item ">
					<a href="users.php?role=user" class="menu-link">
						<div class="text-truncate">Users</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="users.php?role=event_organizer" class="menu-link">
						<div class="text-truncate">Event Organizer</div>
					</a>
				</li>
				 
			</ul>
		</li>
		<li class="menu-item ">
			<a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons las la-hand-holding-usd text-success"></i>
				<div class="text-truncate text-nowrap d-inline-block">Donations</div>
				<div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"> <i class="las la-exclamation"></i> </div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item ">
					<a href="donation.php" class="menu-link">
						<div class="text-truncate">All</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="donation.php?status=0" class="menu-link">
						<div class="text-truncate text-nowrap d-inline-block">Pending</div>
						<div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">3</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="donation.php?status=1" class="menu-link">
						<div class="text-truncate">Done</div>
					</a>
				</li>
				<li class="menu-item ">
					<a href="donation.php?status=2" class="menu-link">
						<div class="text-truncate">Cancelled</div>
					</a>
				</li>
			</ul>
		</li>
		 
		<li class="menu-item ">
			<a href="volunteering.php" class="menu-link"> <i class="menu-icon tf-icons las la-exchange-alt text-primary"></i>
				<div class="text-truncate">Volunteering</div>
			</a>
		</li>
	  
	</ul>
</aside>
 
 
<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
		<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)"> <i class="fas fa-bars"></i> </a>
	</div>
	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		<div class="navbar-nav align-items-center">
			 
		</div>
		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<!-- Visit Website  -->
			<li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
				<a class="nav-link text-primary" href="/" target="_blank" title="Visit Website"> <i class="fas fa-globe"></i> </a>
			</li>
			<!-- Visit Website  -->
			<!-- Quick links  -->
			 
			<!-- Quick links -->
			<!-- Notification -->
			 
			<!--/ Notification -->
			<!-- Admin -->
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="avatar avatar-online"> <img src="../uploads/users-avtar.jpg" alt class="w-px-40 h-auto rounded-circle"> </div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item d-flex" href="profile.php"> <i class="las la-user-tie fs-4 me-2"></i> <span class="align-middle">Profile</span> </a>
					</li>
					<li>
						<a class="dropdown-item d-flex" href="password.php"> <i class="las la-key fs-4 me-2"></i> <span class="align-middle">Password</span> </a>
					</li>
					 
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a class="dropdown-item d-flex" href="logout.php"> <i class="las la-power-off fs-4 me-2"></i> <span class="align-middle">Log Out</span> </a>
					</li>
				</ul>
			</li>
			<!--/ Admin -->
		</ul>
	</div>
</nav>
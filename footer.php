<footer class="footer-area">
		<div class="footer-area__bg bg-img" data-background-image="https://phinix.digital/pnixfund/assets/themes/primary/images/footer-mask.png"></div>
		<div class="pb-60 pt-60">
			<div class="container">
				<div class="row justify-content-center gy-5">
					<div class="col-xl-4 col-sm-6 col-xsm-6">
						<div class="footer-item">
							<div class="footer-item__logo">
								<a href="index.php"> <img src="assets/universal/images/logoFavicon/logo_light.png" alt="footer logo"> </a>
							</div>
							<p class="footer-item__desc">Join our community and be part of the change. Follow us on social media for updates, success stories, and more. Make a difference.</p>
							<ul class="social-list">
								<li class="social-list__item">
									<a href="https://www.facebook.com/" class="social-list__link flex-center" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
								</li>
								<li class="social-list__item">
									<a href="https://twitter.com/" class="social-list__link flex-center" target="_blank"> <i class="fa-brands fa-x-twitter"></i> </a>
								</li>
								<li class="social-list__item">
									<a href="https://www.linkedin.com/" class="social-list__link flex-center" target="_blank"> <i class="fab fa-linkedin-in"></i> </a>
								</li>
								<li class="social-list__item">
									<a href="https://www.instagram.com/" class="social-list__link flex-center" target="_blank"> <i class="fab fa-instagram"></i> </a>
								</li>
								<li class="social-list__item">
									<a href="https://youtube.com" class="social-list__link flex-center" target="_blank"> <i class="fab fa-youtube"></i> </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-2 col-sm-6 col-xsm-6">
						<div class="footer-item">
							<h5 class="footer-item__title">Useful Links</h5>
							<ul class="footer-menu">
								<li class="footer-menu__item"> <a href="#" class="footer-menu__link">
                                            Privacy Policy
                                        </a> </li>
								<li class="footer-menu__item"> <a href="#" class="footer-menu__link">
                                            Terms of Service
                                        </a> </li>
								<li class="footer-menu__item"> <a href="#" class="footer-menu__link">
                                            Support Policy
                                        </a> </li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-xsm-6">
						<div class="footer-item">
							<h5 class="footer-item__title">Categories</h5>
							<ul class="footer-menu">
							    <?php
												     $sql_cat = mysqli_query($con,"select * from category");
												     while($row=mysqli_fetch_assoc($sql_cat)){
												    ?>
								<li class="footer-menu__item"> <a href="campaigns.php?category=<?=$row['id']?>" class="footer-menu__link">  <?=$row['name']?>   </a> </li>
							 <?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-xsm-6">
						<div class="footer-item">
							<h5 class="footer-item__title">Contact With Us</h5>
							<ul class="footer-contact-menu">
								<li class="footer-contact-menu__item">
									<div class="footer-contact-menu__item-icon"> <i class="fas fa-map-marker-alt"></i> </div>
									<div class="footer-contact-menu__item-content">
										<p>VIT Chennai, India</p>
									</div>
								</li>
								<li class="footer-contact-menu__item">
									<div class="footer-contact-menu__item-icon"> <i class="fas fa-envelope"></i> </div>
									<div class="footer-contact-menu__item-content">
										<p>info@unityaid.com</p>
									</div>
								</li>
								<li class="footer-contact-menu__item">
									<div class="footer-contact-menu__item-icon"> <i class="fas fa-phone"></i> </div>
									<div class="footer-contact-menu__item-content">
										<p>+91234 567 890</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Top End-->
		<!-- bottom Footer -->
		<div class="bottom-footer py-3">
			<div class="container">
				<div class="text-center">
					<p class="bottom-footer__text">© Copyright 2024 Unity Aid. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
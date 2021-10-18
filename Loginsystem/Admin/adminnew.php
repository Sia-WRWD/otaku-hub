<!DOCTYPE html>
<html>
	<head>
		<title>Otaku Page| Admin Set New Password</title>
	<!--Css drop below here OwO-->
		<link rel="stylesheet" href= "../../style.css">
		<link rel="stylesheet" href= "../NewStyle.css">
		<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<!--Navigation-->
		<header>
			<div class="container">
				<input type="checkbox" name="" id="check">
	
				<div class="logo-container">
					<h3 class="logo">Otaku<span>Page</span></h3>
				</div>
	
				<div class="nav-btn">
					<div class="nav-links">
						<ul>
							<li class="nav-link" style="--i: .6s">
								<a href="http://localhost/otaku/index/index.php">Home</a>
							</li>
							<li class="nav-link" style="--i: .85s">
								<a href="#">Anime & Manga<i class="fas fa-caret-down"></i></a>
								<div class="dropdown">
									<ul>
										<li class="dropdown-link">
											<a href="http://localhost/otaku/list/anime/animelist.php">Anime List</a>
										</li>
										<li class="dropdown-link">
											<a href="http://localhost/otaku/list/manga/mangalist.php">Manga List</a>
										</li>
										<div class="arrow"></div>
									</ul>
								</div>
							</li>
							<li class="nav-link" style="--i: 1.1s">
								<a href="#">Help<i class="fas fa-caret-down"></i></a>
								<div class="dropdown">
									<ul>
										<li class="dropdown-link">
											<a href="http://localhost/otaku/others/terms/terms.php">Terms</a>
                                    	</li>
                                    	<li class="dropdown-link">
                                        	<a href="http://localhost/otaku/others/privacy/privacy.php">Privacy</a>
										</li>
										<li class="dropdown-link">
											<a href="#">Community<i class="fas fa-caret-down"></i></a>
											<div class="dropdown second">
												<ul>
													<li class="dropdown-link">
														<a href="http://localhost/otaku/ListView/UserPage.php">Users</a>
													</li>
													<li class="dropdown-link">
														<a href="http://localhost/otaku/ListView/ModeratorPage.php">Moderators</a>
													</li>
													<li class="dropdown-link">
														<a href="#">Socials<i class="fas fa-caret-down"></i></a>
														<div class="dropdown second">
															<ul>
																<li class ="dropdown-link">
																	<a href="https://www.facebook.com/otaku.page.986" target="_blank">Facebook<i class="fa fa-facebook"></i></a>
																</li>
																<li class ="dropdown-link">
																	<a href="https://www.instagram.com/otakupage69/" target="_blank">Instagram<i class="fa fa-instagram"></i></a>
																</li>
																<li class ="dropdown-link">
																	<a href="https://twitter.com/OtakuPage3" target="_blank">Twitter<i class="fa fa-twitter"></i></a>
																</li>
																<li class ="dropdown-link">
                                                                <a href="https://discord.gg/JeK2W2h" target="_blank">Discord<i class="fab fa-discord"></i></a>
																</li>
																<div class="arrow"></div>
															</ul>
														</div>
													</li>
													<div class="arrow"></div>
												</ul>
											</div>
										</li>
										<div class="arrow"></div>
									</ul>
								</div>
							</li>
							<li class="nav-link" style="--i: 1.35s">
								<a href="http://localhost/otaku/others/AboutUs/AboutUs.php">About</a>
							</li>
						</ul>
					</div>
				<!--Login and Sign up-->
				<div class="log-sign" style="--i: 1.8s">
						<a href="http://localhost/otaku/loginsystem/user/login.php" class="btn transparent">Log in</a>
						<a href="http://localhost/otaku/loginsystem/user/signup.php" class="btn solid">Sign up</a>
					</div>
				</div>
	
				<!--Phone Menu Container-->
				<div class="hamburger-menu-container">
					<div class="hamburger-menu">
						<div></div>
					</div>
				</div>
			</div>
		</header>

		<main>
			<!--Welcome Message-->
			<div class="header1"><h1>Welcome to OtakuPage </h1><span class = "header1-5">where your journey filled with anime and manga begins...</span></div>
			
			<!--Below are the code for Login Form-->
			<div class="form-box">
				<?php
					$selector = $_GET["selector"];
					$validator = $_GET["validator"];

					if (empty($selector) || empty($validator)) {
						echo "Could not validate your request!";
					} else {
						if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
				?>

					<form action="../../connection/admin/adminnew.con.php" method="post">
						<div class="ResetContainer">
						<center>
							<h1>Set Your New Password</h1>
							<p><i> DON'T FORGET YOUR PASSWORD OR JOJO WILL COME FIND YOU! </i></p>
							<img class="resize" src="../new.gif"><br>
						</center>
							<input type="hidden" name="selector" value="<?php echo $selector ?>">
							<input type="hidden" name="validator" value="<?php echo $validator ?>">
							<label for="uname"><b>Enter New Password</b></label><br>
							<input type="password" name="password" placeholder="Enter New Password">
							<label for="repassword"><b>Re-Enter New Password</b></label><br>
							<input type="password" name="repassword" placeholder="Re-Enter New Password">
						</div>

						<div class="clearfix" style="background-color: #f1f1f1">
							<button type="submit" name="adminnew-submit">Reset Password</button> 
						</div>
					</form>
				<?php
						}
					}
				?>

			</div>
		</main>

		<footer>
			<div class="footer-main-div">
			   <div class="footer-social-icons">
					<ul>
						<li><a href="https://www.facebook.com/otaku.page.986" target="blank"><i class="fab fa-facebook-square"></i></a></li>
						<li><a href="https://www.instagram.com/otakupage69/" target="blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/OtakuPage3" target="blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://discord.gg/JeK2W2h" target="blank"><i class="fab fa-discord"></i></a></li>
					</ul>
				</div> 
		</footer>
	</body>
</html>
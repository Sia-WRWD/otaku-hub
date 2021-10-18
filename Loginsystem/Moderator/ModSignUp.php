<!DOCTYPE html>
<html>

<script>function userValidation(){
    alert("Access Denied! You are not allowed to access this page!");
    location.href = "../../Index/index.php";

    } 
</script>
	<head>
		<title>OtakuPage | Moderator Sign Up</title>
	<!--Css drop below here OwO-->
		<link rel="stylesheet" href= "../../style.css">
		<link rel="stylesheet" href= "../SignUpStyle.css">
		<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<!--Navigation-->
		<header>

		<?php
    session_start();
    if (isset($_SESSION['position'])) {
        $posvalue = $_SESSION['position'];

        if( $posvalue != 'Admin'){
            echo '<script type="text/javascript">',
             'userValidation();',
             '</script>;';
        }
    }
?>
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

			<!--Below are the code for SignUp Form-->
			<div class="form-box">
				<form action="../../connection/moderator/modsignup.con.php" method="post">
					<div class="signContainer">
						<center>
                            <img class="resize" src="modsignup.gif"><br>
                            
							<h1><b>Welcome to the Cool Kids Club!</b></h1>
							<p>
                                <b><i>Congratulation for being able to serve the Anime God himself and at the same time getting the unlimited power
                                you desire! Create your account now and start working for the Anime God!</i></b>
							</p>
						</center>

						<br>

						<input type="hidden" name="position" value="Moderator">

						<label for="email"><b>Email<b></label><br>
						<input type="email" placeholder="Enter Email" name="email" required><br>

						<label for="uname"><b>FBI Codename</b></label><br>
						<input type="text" placeholder="Enter FBI Codename (within 8-16 characters)" name="uname" required><br>

						<label for="psw"><b>FBI Code</b></label><br>
						<input type="password" placeholder="Enter FBI Code" name="psw" required><br>

						<label for="repsw"><b>Re-Enter FBI Code</b><label><br>
						<input type="password" placeholder="Re-Enter FBI Code" name="repsw" required><br>

						<label>
							<input type="checkbox" name="chkagree" required><span class="chk"> I have read and agree to 
							<a href="http://localhost/otaku/others/terms/terms.php" target="blank" style="color:dodgerblue">Term of Service</a> and 
							<a href="http://localhost/otaku/others/privacy/privacy.php" target="blank" style="color:dodgerblue">Privacy Policy</a>.</span>
						</label>
					</div>

					<div class="clearfix" style="background-color:#f1f1f1">
						<button type="button" class="cancelbtn" onclick="window.location.href='http://localhost/otaku/index/index.php';">Cancel</button>
						<button type="submit" class="signupbtn" name="modsignup-submit">Sign Up</button>
					</div>
				</form>
			</div>
		</main>

				<?php
					if (isset($_GET["signup"])) {
						if ($_GET["signup"] == "success") {
							echo '<script>alert("You have successfully signed up!")</script>';
						}
					}
				?>

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="EditProfile.css">
    <title>OtakuPage| Edit Profile Page</title>
</head>

<body>
    <!--Navigation-->
    <header>

<?php
    session_start();
    include_once '../connection/db.con.php';
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
            <?php
                if (isset($_SESSION['id'])) {
                    echo '<form class ="log-sign" style="--i: 1.8s" action="http://localhost/otaku/connection/logout.con.php" method="post">
                                <button type="submit" name="logout-submit" class = "btn opaque">Logout</button>
                          </form>';
                }
                else {
                    echo '<a href="http://localhost/otaku/loginsystem/user/login.php" class="btn transparent">Log in</a>
                          <a href="http://localhost/otaku/loginsystem/user/signup.php" class="btn solid">Sign up</a>';
                }
            ?>
            </div>
            <ul>
            <li class="nav-link-profile" style="--i: 1.8s">

                    <a href="http://localhost/otaku/Profile/Profile.php"><?php
                if (isset($_SESSION['id']) AND isset($_SESSION['position'])) {
                    $id = $_SESSION['id'];
                    $pos = $_SESSION['position'];
                    $sqlImg = "SELECT * FROM profileimg WHERE UserID = '$id' AND PosID = '$pos';";
                    $resultImg = mysqli_query($conn, $sqlImg);
                  while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                   if ($rowImg['ImgStatus'] == 0){
                    echo "<img style='float: left; padding-left: 3px' width='35px' height='35px' src='..\UploadedFiles\profile".$pos."".$id.".jpg?" .mt_rand(). "'>";
                         } else {
                    echo "<img width='35px' height='35px' src='..\UploadedFiles\profiledefault.jpg'>";
                         }
                  }
                }
            ?>
        </a>
            </li>
            </ul>
        </div>

        <!--Phone Menu Container-->
        <div class="hamburger-menu-container">
            <div class="hamburger-menu">
                <div></div>
            </div>
        </div>
    </div>
</header>
    
    <!--Welcome-->
    <div class="header1"><h1>Welcome to OtakuPage </h1><span class = "header1-5">where your journey filled with anime and manga begins...</span></div>
    
    <br>

     <body>
         <div class="content-box">  
         <div class="title"><br><h1><?php echo $_SESSION['uname']; ?>'s Profile Page<h1><br></div>
         <?php
        $id = $_SESSION['id'];
        $pos = $_SESSION['position'];
        $sqlImg = "SELECT * FROM profileimg WHERE UserID = '$id' AND PosID = '$pos';";
        $resultImg = mysqli_query($conn, $sqlImg);
              while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                  echo "<div class='userimg'>";
                  if ($rowImg['ImgStatus'] == 0){
                    echo "<img src='..\UploadedFiles\profile".$pos."".$id.".jpg?" .mt_rand(). "'>";
                  } else {
                      echo "<img src='..\UploadedFiles\profiledefault.jpg'>";
                  }
                  echo "<br><br>
                  <form class='img-select-button' style='--i: 1.8s' action='../connection/fileupload.con.php' method='POST' enctype='multipart/form-data'>
                    <input class='btn transparent' type='file' name='file'>
                    <button class='btn transparent' type='submit' name='img-submit'>Upload And Save Image Changes</button>
                    </form></div>";
                }
             ?>
         <div class="aboutme"><br><h2>Edit Profile Page</h2><br></div>
         <div class="emptyspace1"><h2>blank</h2></div>
         <div class="infobox">
        
      


        <form action= <?php

        if(isset($_SESSION['position'])){

            if ($_SESSION['position'] == 'User'){
                echo '"../connection/profileedit.con.php" method="post">';
            } else if ($_SESSION['position'] == 'Moderator'){
                echo '"../connection/profileeditmod.con.php" method="post">';
            } else if($pos == 'Admin') { 
                echo '"../connection/profileeditadmin.con.php" method="post">'; 
            }
        }

            ?>
                    <div class="updatebox">

                    <input type="userinvisid" name="userinvisid" value = <?php echo $_SESSION['id'] ?>  required>	
                    <input type="userinvisid" name="userinvispos" value =" <?php echo $_SESSION['position'] ?> " required><br>

						<label for="realname"><b>User's Real Name<b></label><br>
                        <input type="realname" placeholder="Enter User's Real Name" name="realname" value =" <?php echo $_SESSION['realname'] ?> " required><br>

                        <label for="desc"><b>User's Description<b></label><br>
                        <input type="desc" placeholder="Enter User's Description" name="desc" value=" <?php echo $_SESSION['desc'] ?>" required><br>

                        <label for="age"><b>User's Age<b></label><br>
                        <input type="age" placeholder="Enter User's Age" name="age" value=" <?php echo $_SESSION['age'] ?>" required><br>

                        <label for="country"><b>User's Country<b></label><br>
                        <input type="country" placeholder="Enter User's Country" name="country" value=" <?php echo $_SESSION['country'] ?>" required><br>
                        
                        <button type="button" class="btn transparent" onclick="window.location.href='../Profile/Profile.php';">Cancel Edit</button>
						<button type="update" class="btn transparent" name="update-submit">Save Changes Made To Profile</button>
					</div>		
				</div>
             </form>
        </div>
        </div> 


        
	</body>
	
    <footer class="footer-main-div">
       

       <div class="footer-social-icons">
           <ul>
                <li><a href="https://www.facebook.com/otaku.page.986" target="blank"><i class="fab fa-facebook-square"></i></a></li>
               <li><a href="https://www.instagram.com/otakupage69/" target="blank"><i class="fa fa-instagram"></i></a></li>
               <li><a href="https://twitter.com/OtakuPage3" target="blank"><i class="fa fa-twitter"></i></a></li>
               <li><a href="https://discord.gg/JeK2W2h" target="blank"><i class="fab fa-discord"></i></a></li>
            </ul>
        </div> 
        </footer>
        

    </main>

</body>


</html>

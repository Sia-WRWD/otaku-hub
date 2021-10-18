<?php
        date_default_timezone_set('Asia/Singapore');
        include '../../../connection/db.con.php';
        include '../../../connection/comment.con.php';
        include '../../../connection/MangaComment/ttigraas.mc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../content.css">
    <title>OtakuPage| That Time I Got Reincarnated as a Slime</title>
</head>

<body>
<header>

<?php
    session_start();
    include_once '../../../connection/db.con.php';
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
                    echo "<img style='float: left; padding-left: 3px' width='35px' height='35px' src='..\..\..\UploadedFiles\profile".$pos."".$id.".jpg?" .mt_rand(). "'>";
                         } else {
                    echo "<img width='35px' height='35px' src='..\..\..\UploadedFiles\profiledefault.jpg'>";
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

    <main>
    <!--Welcome-->
    <div class="header1"><h1>Welcome to OtakuPage </h1><span class = "header1-5">where your journey filled with anime and manga begins...</span></div>

    <br>

     <body>
	
		<div class="content-box" style="width:950px; margin:0 auto;">
            <div class="title"><h1>That Time I Got Reincarnated as a Slime</h1></div>
			<div class="image"><br><img src="Images/cover.png" alt="main_cover" style="width:350px;height:450px;"></div>
            <div class="desc"><br>After regaining consciousness, Satoru discovers that he has been reincarnated as a Slime in an unfamiliar 
                                  world. At the same time, he also acquires new-found skills, particularly the ability called "Predator," 
                                  which allows him to devour anything and mimic its appearance and skills. He stumbles upon Veldora, a 
                                  Catastrophe-level 'Storm Dragon', who was sealed for 300 years for reducing a town to ashes. Feeling 
                                  sorry for him, Satoru befriends the dragon, promising to help him in destroying the seal. In return, 
                                  Veldora bestows upon him the name Rimuru Tempest, to grant him divine protection.
                                  <br></br>
                                  Now free from his stale past life, Rimuru embarks on a quest to prove his worth. As he starts to get used 
                                  to his current physique, word of his weird accomplishments start to spread like wildfire across the world, 
                                  changing his fate completely.              
                <br></br>               
                <i><b>(Source: Wikipedia)</b></i>     
            </div>
            <div class = "titlespace1"><h2>blank</h2></div>
            <div class="scimages"><h2>Previews</h2></div>
            <div class = "titlespace2"><h2>blank</h2></div>
            <div class="reviewtitle"><h2>Anime Review</h2></div>
            <div class="review">
            <br>
                <?php
                    if (isset($_SESSION['id'])) {
                        $pos = $_SESSION['position'];
                         echo "<form method='POST' action='".setComments($conn)."'>
                                    <input type='hidden' name ='anime' value ='TTIGRAAS'>
                                    <input type='hidden' name ='id' value ='".$_SESSION['id']."'>
                                    <input type='hidden' name ='date' value ='".date('Y-m-d H:i:s')."'>
                                    <input type='hidden' name ='position' value ='".$pos."'>
                                    <br><textarea class='txta' name='message'></textarea><br>
                                    <button class='btn transparent' type='submit' name='commentSubmit'>Comment</button>
                                    <br></br>
                                </form>";
                    }
                    else {
                        echo "<i><b>YOU NEED TO LOG IN TO COMMENT!</b></i>
                        <br></br>";
                    }
                
                getComments($conn);
                ?>

            </div>
            <div class = "titlespace3"><h2>blank</h2></div>
            <div class="slide">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div><img src="Images/preview-1.jpg" style="width:100%"></div>
                    <div class="mySlides fade"><div class="numbertext">2 / 4</div><img src="Images/preview-2.jpg" style="width:100%"></div>
                    <div class="mySlides fade"><div class="numbertext">3 / 4</div><img src="Images/preview-3.jpg" style="width:100%"></div>
                    <div class="mySlides fade"><div class="numbertext">4 / 4</div><img src="Images/preview-4.jpg" style="width:100%"></div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div><br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        </div>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}    
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
            }
        </script>
    </main>

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
         
    <section>   
        <div class="overlay"></div>
    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../List.css">
    <title>OtakuPage| Manga List</title>
</head>

<body>
    <!--Navigation-->
    <header>

<?php
    session_start();
    include_once '../../connection/db.con.php';
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
                    echo "<img style='float: left; padding-left: 3px' width='35px' height='35px' src='..\..\UploadedFiles\profile".$pos."".$id.".jpg?" .mt_rand(). "'>";
                         } else {
                    echo "<img width='35px' height='35px' src='..\..\UploadedFiles\profiledefault.jpg'>";
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
         <div class="title"><br><h1>Manga List</h1><br></div>
        <table class="animetable">
          <tr> 
          <td class="zoom" background="Images/AOT.jpeg" data-href="http://localhost/otaku/content/Manga/AOT/AOT.php"><h2 style="background-color:white">Attack on Titan</h2></td>
          <td class="zoom" background="Images/GB.jpg" data-href="http://localhost/otaku/content/Manga/GB/GB.php"><h2 style="background-color:white">Grand Blue</h2></td>
          </tr>
          <tr>
          <td class="zoom" background="Images/IWSTTN.jpg" data-href="http://localhost/otaku/content/Manga/IWSTTN/IWSTTN.php"><h2 style="background-color:white">Isekai wa Smartphone to Tomo ni</h2></td>
          <td class="zoom" background="Images/KNYM.jpg" data-href="http://localhost/otaku/content/Manga/KNYM/KNYM.php"><h2 style="background-color:white">Kimetsu no Yaiba</h2></td>
          </tr>
          <tr>
          <td class="zoom" background="Images/KSSNSW.jpeg" data-href="http://localhost/otaku/content/Manga/KSSNSW/KSSNSW.php"><h2 style="background-color:white">Kono Subarashii Sekai ni Shukufuku wo!</h2></td>
          <td class="zoom" background="Images/O.jpg" data-href="http://localhost/otaku/content/Manga/O/O.php"><h2 style="background-color:white">Overlord</h2></td>
          </tr>
          <tr>
          <td class="zoom" background="Images/OP.jpg" data-href="http://localhost/otaku/content/Manga/OP/OP.php"><h2 style="background-color:white">One Piece</h2></td>
          <td class="zoom" background="Images/OPMM.jpg" data-href="http://localhost/otaku/content/Manga/OPMM/OPMM.php"><h2 style="background-color:white">One Punch Man</h2></td>
          </tr>
          <tr>
          <td class="zoom" background="Images/TTIGRAAS.jpg" data-href="http://localhost/otaku/content/Manga/TTIGRAAS/TTIGRAAS.php"><h2 style="background-color:white">That Time I Got Reincarnated as a Slime</h2></td>
          <td class="zoom" background="Images/YONSLCWM.jpg" data-href="http://localhost/otaku/content/Manga/YONSLCWM/YONSLCWM.php"><h2 style="background-color:white">Yahari Ore no Seishun Rabukome wa Machigatteiru.</h2></td>
          </tr>
        </table>
          <div class="emptyspace1"><h2>blank</h2></div>

        <!--Script For Linking The Table Cell To Another Page-->
          <script>
              document.addEventListener("DOMContentLoaded", () =>{
                  const rows = document.querySelectorAll("td[data-href]");

                  rows.forEach(row => {
                      row.addEventListener("click", () => {
                          window.location.href = row.dataset.href;
                      });       
                  });
              });
          </script>
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
        
        <section>

        </section>
    </main>

</body>

</html>
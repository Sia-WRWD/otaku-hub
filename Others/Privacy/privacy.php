<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../tp.css">
    <title>OtakuPage| Privacy</title>
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
    
    <main>
    <!--Welcome Message-->
    <div class="header1"><h1>Welcome to OtakuPage </h1><span class = "header1-5">where your journey filled with anime and manga begins...</span></div>
    
    <br>

            <!--Terms-->
            <div class="termsContainer">
                <div class="heading">
                    <h2><b>Privacy Policy</b></h2>
                </div>

                <div class="content">
                    <p class="Fparagraph">LAST UPDATE: 15 SEPTEMBER 2020<p></p>
                    <br>
                    <p class="paragraph"><b>
                        Your privacy is important to the Company, and we take your privacy very seriously. We 
                        designed our Privacy Policy to cover how we collect and use your information in connection 
                        with use of our Sites; how you can control the use and disclosure of your information; how 
                        your information is protected; and how this information may be used and disclosed. If you 
                        have any questions about this Privacy Policy, please find us at 
                        <a href="https://www.facebook.com/otaku.page.986">Facebook</a>, 
                        <a href="https://twitter.com/OtakuPage3">Twitter</a>, 
                        <a href="https://www.instagram.com/otakupage69/">Instagram</a> or
                        <a href="https://discord.gg/JeK2W2h" target="blank">Discord</a>.
                    </b></p>
                    <br>
                    <ul class="termsList">
                        <li><a href="#1">1. Scope</a></li>
                        <li><a href="#2">2. What information the Sites collect</a></li>
                        <li><a href="#3">3. How we use the information that we collect</a></li>
                        <li><a href="#4">4. Protecting Your Information</a></li>
                        <li><a href="#5">5. Contact Us</a></li>
                    </ul>
                    <br>

                    <h3><a name="1"><b>1. Scope</b></a></h3><hr>
                    <p class="paragraph">
                        This Privacy Policy is applicable only to the Sites and does not extend to information 
                        collected by any other websites or applications or to the practices or procedures of Sites 
                        that the Sites does not control. Note that the Sites may contain links to other websites, 
                        such as ad banners linking to another website. In such cases, this Privacy Policy does not 
                        apply to information collected on that website (or other websites). We are not responsible for 
                        the privacy practices of other websites, and we recommend that you read the privacy policies of 
                        each website that you visit or application that you use.
                    </p>
                    <br>

                    <h3><a name="2"><b>2. What information the Sites collect</b></a></h3><hr>
                    <p class="paragraph">
                        <b>Information you provide to us:</b><br>
                        You do not need to provide information directly to us in order to view the Sites. However, when 
                        you use certain functions on the Sites, such as accessing certain features or content, registering 
                        for certain services, setting up a profile or contacting the Sites directly, you may provide us or 
                        we may ask for personally identifiable information or other information, which may include:
                        <br><br>
                        <ul class="disList">
                            <li>contact information, such as email address;</li>
                            <li>username and password for your account;</li>
                            <li>information posted in community discussions and other interactive online features;</li>
                            <li>information you may decide to provide on your profile or through your account, such as comments;</li>
                        </ul>
                    </p>
                    <br>
                    <p class="paragraph">
                        <b>Information automatically collected when you visit and interact with the Sites:</b><br>
                        When you use, interact with and visit the Sites, certain information may automatically be collected, including:
                        <br><br>
                        <ul class="disList">
                            <li>information collected through HTML cookies, Flash cookies, web beacons, and similar technologies;</li>
                            <li>the web pages you were visiting immediately before and after you came to the Sites; </li>
                            <li>activities within community discussions; and </li>
                            <li>standard server log information. </li>
                        </ul>
                    </p>
                    <br>
                    <p class="paragraph">
                        The above listed technologies and information track your usage of the Sites and help us with respect to certain 
                        functionality of the Sites such as recognizing you, remembering your preferences, bringing you advertising (both 
                        on and off the Sites) and otherwise providing you with a more personalized experience.
                    </p>
                    <br>
                    
                    <h3><a name="3"><b>3. How we use the information that we collect</b></a></h3><hr>
                    <p class="paragraph">
                        <b>Email Communications:</b><br>
                        We may use the information that we collect to send you e-mail communications, such as information about changes to 
                        the Sites or your account, promotional messages about our email newsletters, and our own or our affiliates’ or 
                        marketing partners' products and services.
                        <br><br>

                        <b>User Accounts:</b><br>
                        To provide you with an open and civil, discussion forum, we track user involvement in our community discussions. 
                        Our forum moderators monitor discussions and delete comments that we deem inappropriate in our forums. For more 
                        information on this process, please see the Sites' community rules, forum rules or comment policies about comment 
                        moderation guidelines.
                        <br><br>

                        <b>Statistical Analysis:</b><br>
                        In order to learn more about how the Sites are used, we aggregate and analyze the data that we collect. We may use 
                        this information, for example, to better tailor our content and design to suit our visitors' needs, to increase our 
                        Sites' functionality, and to monitor and analyze use of the Sites.
                        <br><br>

                        <b>Support, Personalization and Security:</b>   <br>
                        We may use the information we collect to provide support for and personalize the Sites and our products and services, 
                        and to create, maintain and secure your account. We may also use the information we collect to develop and improve and 
                        to help maintain the safety, security, and integrity of our Sites, products and services.
                        <br><br>

                        <b>Enforcement:</b><br>
                        We may use the information that we collect to prevent illegal activities, to enforce the our Terms of Use, and/or to 
                        otherwise protect our rights and the rights of our users.<br>
                        By using the Sites, you consent to the uses stated above and any other use of information identified in this Privacy 
                        Policy. In addition, we may use the information that we collect for any other purposes disclosed to you at the time 
                        we collect your information or pursuant to your consent.
                    </p>
                    <br>

                    <h3><a name="4"><b>4. Protecting Your Information</b></a></h3><hr>
                    <p class="paragraph">
                        We take your privacy very seriously and employ reasonable administrative, physical, and electronic measures to safeguard 
                        information received from you and held by us against identity theft and unauthorized access or alteration. In addition, 
                        we will take reasonable steps to assure that third parties to whom we transfer any personal data will provide sufficient 
                        protection of your personal information. We do not and will not, at any time, request your credit card information, your 
                        username, login password, or any national identification numbers in a non-secure or unsolicited communication (e.g., via 
                        e-mail, telephone, or mobile device).
                        <br><br>
                        We will make any legally required disclosures of any breach of the security, confidentiality, or integrity of your unencrypted 
                        electronically stored "personal data" or "personal information" (as defined in applicable statutes on security breach notification) 
                        to you via email or conspicuous posting on our website in the most expedient time possible and without unreasonable delay, consistent 
                        with (i) the legitimate needs of law enforcement; or (ii) any measures necessary to determine the scope of the breach and restore the 
                        reasonable integrity of the data system.
                        <br><br>
                        If you have any concerns with the way we collect and handle your personal information, or would like to correct or request that we delete 
                        such personal information held by us, please contact us. We will use commercially reasonable efforts to honor your request. You understand 
                        that deletion of your personal information may result in you not being able to view or use portions of our Services which depend on such information.
                    </p>
                    <br>

                    <h3><a name="5"><b>5. Contact Us</b></a></h3><hr>
                    <p class="paragraph">
                        If you have any questions about our Services, you can find us through 
                        <a href="https://www.facebook.com/otaku.page.986" target="blank">Facebook</a>, 
                        <a href="https://twitter.com/OtakuPage3" target="blank">Twitter</a>, 
                        <a href="https://www.instagram.com/otakupage69/" target="blank">Instagram</a> or
                        <a href="https://discord.gg/JeK2W2h" target="blank">Discord</a>.
                    </p>
                    <br>
                </div>
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
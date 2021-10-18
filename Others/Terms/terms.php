<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../tp.css">
    <title>OtakuPage| Terms</title>
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
                    <h2><b>Terms of Use Agreement</b></h2>
                </div>

                <div class="content">
                    <p class="paragraph">LAST UPDATED: 15 SEPTEMBER 2020<p></p>
                    <br>
                    <p class="paragraph"><b>
                        IMPORTANT NOTICE: THIS TERMS OF USE AGREEMENT CONTAINS A BINDING 
                        ARBITRATION PROVISION AND CLASS ACTION WAIVER. IT AFFECTS YOUR 
                        LEGAL RIGHTS AS DETAILED IN THE ARBITRATION AND CLASS ACTION WAIVER 
                        SECTION BELOW. PLEASE READ CAREFULLY.
                    </b></p>
                    <br>
                    <ul class="termsList">
                        <li><a href="#Intro">Introduction</a></li>
                        <li><a href="#1">1. Amendments to these Terms of Use</a></li>
                        <li><a href="#2">2. Disclaimer</a></li>
                        <li><a href="#3">3. Use of the Service</a></li>
                        <li><a href="#4">4. User Content</a></li>
                        <li><a href="#5">5. Privacy Policy</a></li>
                        <li><a href="#6">6. Contact Us</a></li>
                    <ul>
                    <br>

                    <h3><a name="Intro"><b>Introduction</b></a></h3><hr>
                    <p class="paragraph">
                        By accessing or using the Service, you signify that you have read, 
                        understood, and agreed to be bound by these Terms of Use, Privacy Policy, 
                        and any additional terms and conditions, notices and disclaimers displayed 
                        through the Service, whether or not you are a registered user of the Service. 
                        You agree that by clicking “Sign Up”, “Join” or other similar registration links 
                        or buttons or by accessing or using the Service, you are agreeing to enter a legally 
                        binding contract with the Company. If you do not agree to these Terms of Use, Privacy 
                        Policy, or any other terms and conditions, notices or disclaimers displayed through the 
                        Service, do not click “Sign Up”, “Join” or other similar links or buttons and do not access 
                        or use any of our Services.
                    </p>
                    <br>

                    <h3><a name="1"><b>1. Amendments to these Terms of Use</b></a></h3><hr>
                    <p class="paragraph">
                        These Terms of Use may be amended by us from time to time and we reserve the right to do so at
                        any time. When we amend these Terms of Use, we will provide a notice to you. We may provide you
                        notice of amended Terms of Use by sending an email to the email address associated with your 
                        user account or by otherwise providing notice through our Service. Any amendments to the Terms 
                        of Use will be posted here and the date indicated on the top of the Terms of Use will state the 
                        date the Terms of Use were last revised. If you do not agree to the Terms of Use, you may not 
                        access or use the Services and should therefore immediately cease any use of the Services.
                    </p>
                    <br>

                    <h3><a name="2"><b>2. Disclaimer</b></a></h3><hr>
                    <p class="paragraph">
                        This site operates by uploading messages in real time and does not bear any legal responsibility 
                        for the authenticity, completeness and position of all messages. All remarks only represent the 
                        personal opinions of the person who left the message, not the position of this site. Readers should 
                        not trust the message area, and please judge the authenticity of the content. The site has the right 
                        to delete any message and reject any person's message and has the right not to delete the message. Do 
                        not write foul language, slander, pornographic or personal attacks, etc. Please be self-disciplined.
                        <br><br>
                        Without limiting the foregoing, and to the extent allowed by applicable laws, We assume no liability 
                        or responsibility, including but not limited to, for any of the following:
                        <br><br>
                        <ul class="disList">
                            <li>Any interruption or cessation of transmission to or from the Service;</li>
                            <li>Errors, mistakes, or inaccuracies of content;</li>
                            <li>Any unauthorized access to or use of our secure servers and/or all personal information stored therein;</li>
                            <li>User content or the defamatory, offensive, or illegal conduct of any third party;</li>
                            <li>Any bugs, viruses, trojan horses, or the like that may be transmitted to or through our Service by any third party;</li>
                            <li>Personal injury or property damage, of any nature whatsoever, resulting from your access to and use of our Service;</li>
                            <li>Any errors or omissions in any content or for any loss or damage incurred as a result of the use of any content posted, 
                                emailed, transmitted, or otherwise made available through the Service; and/or</li>
                            <li>Any damages of any kind suffered by you or claimed to have been suffered by you arising out of or as a result of your 
                                use of any third party websites, applications or other services that may link to, be linked to from, access or integrate with our Services.</li>
                        </ul>
                    </p>
                    <br>
                    
                    <h3><a name="3"><b>3. Use of the Service</b></a></h3><hr>
                    <p class="paragraph">
                        In the site's sole discretion, this site may temporarily or permanently suspend, terminate, or otherwise refuse to permit your access to the Service without 
                        notice and liability, if, in site's sole determination, you violate any provision of the Agreement, including, but not limited to, by carrying out any of the 
                        following prohibited actions:
                        <br><br>
                        <ul class="disList">
                            <li>By passing the measures we may use to prevent or restrict access to the Service;</li>
                            <li>Interfering with the proper working of the Service;</li>
                            <li>Taking any action that imposes or may impose, at our sole discretion, an unreasonable or disproportionately large load on our infrastructure;</li>
                            <li>Uploading invalid data, viruses, worms, or other software agents through the Service;</li>
                            <li>Attempting to interfere with, compromise the system integrity or security or decipher any transmissions to or from the servers running the Service;</li>
                            <li>Using the Service in any manner that could interfere with, disrupt, negatively affect, or inhibit other Users from fully enjoying the Service or that could 
                                damage, disable, overburden, or otherwise impair the functioning of the Service in any manner;</li>
                            <li>Attempting to gain unauthorized access to another User’s account;</li>
                            <li>Using the Service to harvest, collect, gather or assemble information or data regarding the Service or Users of the Service except as permitted in these Terms 
                                of Use or in a separate agreement with OtakuPage</li>
                            <li>Violating any law in connection with your use of the Service;</li>
                            <li>Impersonating another person or otherwise misrepresenting your affiliation with a person or entity, conducting fraud, hiding or attempting to hide your identity;</li>
                            <li>Acting maliciously or fraudulently;</li>
                            <li>Harassing, threatening or defaming other Users; or</li>
                            <li>Attempting to directly undertake any of the foregoing</li>
                        </ul>
                        <br>
                        You are solely responsible for your interactions with other Users. We reserve the right, but have no obligation, to monitor User activity, including disputes between you and other 
                        Users, and to take any action or not take action in a manner and to the extent we deem appropriate to prevent the violation or further violation of these Terms of Use. Company shall 
                        have no liability for your interactions with other Users, or for any User's action or inaction.
                    </p>
                    <br>
                    
                    <h3><a name="4"><b>4. User Content</b></a></h3><hr>
                    <p class="paragraph">
                        The Service may allow Users to create Member accounts or profiles, post comments on message boards and perform moderating. You are solely responsible for your User Content and any 
                        User Content that you upload, publish, display, link to or otherwise make available (hereinafter, "post") on or through the Service, and you agree that we are only acting as a passive 
                        conduit for your online distribution and publication of your User Content. You agree not to post User Content that:
                        <br><br>
                        <ul class="disList">
                            <li>Contains any information or content that we deem to be unlawful, harmful, abusive, racially or ethnically offensive, defamatory, infringing, invasive of personal privacy or 
                                publicity rights, harassing, humiliating to other people (publicly or otherwise), libelous, threatening, or otherwise objectionable;</li>
                            <li>May create a risk of any other loss or damage to any person or property;</li>
                            <li>May create a risk of harm, loss, physical or mental injury, emotional distress, death, disability, disfigurement, or physical or mental illness to you, to any other person, 
                                or to any animal;</li>
                            <li>May constitute or contribute to a crime or tort;</li>
                            <li>Contains any information or content that is illegal;</li>
                            <li>Contains any information or content that you know is not correct and current; or</li>
                            <li>Contains any information or content that you do not have a right to make available under any law or under contractual or fiduciary relationships; or</li>
                            <li>Constitutes "Spam", advertising, or business-related communications.</li>
                        </ul>
                    </p>
                    <br>
                    
                    <h3><a name="5"><b>5. Privacy Policy</b></a></h3><hr>
                    <p class="paragraph">
                        Please refer to our <a href="http://localhost/otaku/others/privacy/privacy.php" style="color:dodgerblue">Privacy Policy</a>. 
                        By using the Service, you grant Company the right to collect, store, use, share 
                        and/or disclose information in the manner permitted by the Privacy Policy.
                    </p>
                    <br>
                    
                    <h3><a name="6"><b>6. Contact Us</b></a></h3><hr>
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
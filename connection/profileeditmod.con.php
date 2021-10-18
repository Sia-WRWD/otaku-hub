<?php

      

if(isset($_POST['update-submit'])) {
    
    session_start();
    require 'db.con.php';
    $currentUserID = $_POST['userinvisid'];
    $realname = $_POST['realname'];
    $userdesc = $_POST['desc'];
    $userage = $_POST['age'];
    $usercountry = $_POST['country'];

    $sql = "UPDATE moderator SET ModRealName = '$realname', ModDescription = '$userdesc', ModAge = '$userage', ModCountry = '$usercountry' WHERE ModID= '$currentUserID'";
       if(mysqli_query($conn, $sql)){

        session_start();
        session_unset();
        session_destroy();
        header("Location: ../LoginSystem/user/Login.php?updateprofile=success");

       }
      
    
 } 

        


?>

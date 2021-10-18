<?php
if (isset($_POST['modlogin-submit'])) {

  require '../db.con.php';

  $username = $_POST['uname'];
  $password = $_POST['psw'];

  if (empty($username) || empty($password)) {
    header("Location: ../../loginsystem/moderator/modlogin.php?error=emptyfields&uname=".$username);
    exit();
  }
  else {

    $sql = "SELECT * FROM moderator WHERE ModFBICodename=?;";
   
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../../loginsystem/moderator/modlogin.php?error=sqlerror");
      exit();
    }
    else {
      
      mysqli_stmt_bind_param($stmt, "s", $username);
      
      mysqli_stmt_execute($stmt);
      
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
       
        $pwdCheck = password_verify($password, $row['ModPassword']);
        
        if ($pwdCheck == false) {
         
          header("Location: ../../loginsystem/moderator/modlogin.php?error=wrongpwd");
          exit();
        }
        
        else if ($pwdCheck == true) {

          session_start();
          
          $_SESSION['id'] = $row['ModID'];
          $_SESSION['uname'] = $row['ModFBICodename'];
          $_SESSION['email'] = $row['ModEmail'];
          $_SESSION['realname'] = $row['ModRealName'];
          $_SESSION['desc'] = $row['ModDescription'];
          $_SESSION['age'] = $row['ModAge'];
          $_SESSION['country'] = $row['ModCountry'];
          $_SESSION['position'] = $row['ModPosition'];
          
          header("Location: ../../index/index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../../loginsystem/moderator/modlogin.php?login=wrongusernamepwd");
        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  
  header("Location: ../../loginsystem/moderator/modlogin.php");
  exit();
}

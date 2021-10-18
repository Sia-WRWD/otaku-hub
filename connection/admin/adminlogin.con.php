<?php
if (isset($_POST['adminlogin-submit'])) {

  require '../db.con.php';

  $username = $_POST['uname'];
  $password = $_POST['psw'];

  if (empty($username) || empty($password)) {
    header("Location: ../../loginsystem/admin/adminlogin.php?error=emptyfields&uname=".$username);
    exit();
  }
  else {

    $sql = "SELECT * FROM admin WHERE AdminGodCodename=?;";
   
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../../loginsystem/admin/adminlogin.php?error=sqlerror");
      exit();
    }
    else {
      
      mysqli_stmt_bind_param($stmt, "s", $username);
      
      mysqli_stmt_execute($stmt);
      
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
       
        $pwdCheck = password_verify($password, $row['AdminPassword']);
        
        if ($pwdCheck == false) {
         
          header("Location: ../../loginsystem/admin/adminlogin.php?error=wrongpwd");
          exit();
        }
        
        else if ($pwdCheck == true) {

          session_start();
          
          $_SESSION['id'] = $row['AdminID'];
          $_SESSION['uname'] = $row['AdminGodCodename'];
          $_SESSION['email'] = $row['AdminEmail'];
          $_SESSION['realname'] = $row['AdminRealName'];
          $_SESSION['desc'] = $row['AdminDescription'];
          $_SESSION['age'] = $row['AdminAge'];
          $_SESSION['country'] = $row['AdminCountry'];
          $_SESSION['position'] = $row['AdminPosition'];


          
          header("Location: ../../index/index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../../loginsystem/admin/adminlogin.php?login=wrongusernamepwd");
        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  
  header("Location: ../../loginsystem/admin/adminlogin.php");
  exit();
}

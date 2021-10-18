<?php
if (isset($_POST['login-submit'])) {

  require '../db.con.php';

  $username = $_POST['uname'];
  $password = $_POST['psw'];

  if (empty($username) || empty($password)) {
    header("Location: ../../loginsystem/user/login.php?error=emptyfields&uname=".$username);
    exit();
  }
  else {

    $sql = "SELECT * FROM users WHERE Username=?;";
   
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../../loginsystem/user/login.php?error=sqlerror");
      exit();
    }
    else {
      
      mysqli_stmt_bind_param($stmt, "s", $username);
      
      mysqli_stmt_execute($stmt);
      
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
       
        $pwdCheck = password_verify($password, $row['UserPassword']);
        
        if ($pwdCheck == false) {

          header("Location: ../../loginsystem/user/login.php?error=wrongpwd");

          exit();
        }
        
        else if ($pwdCheck == true) {

          session_start();
          
          $_SESSION['id'] = $row['UserID'];
          $_SESSION['uname'] = $row['Username'];
          $_SESSION['email'] = $row['UserEmail'];
          $_SESSION['realname'] = $row['UserRealName'];
          $_SESSION['desc'] = $row['UserDescription'];
          $_SESSION['age'] = $row['UserAge'];
          $_SESSION['country'] = $row['UserCountry'];
          $_SESSION['position'] =$row['UserPosition'];
          
          header("Location: ../../index/index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../../loginsystem/user/login.php?login=wrongusernamepwd");

        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  
  header("Location: ../../loginsystem/user/login.php");
  exit();
}

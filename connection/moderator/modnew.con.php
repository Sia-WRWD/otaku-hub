<?php

if(isset($_POST["modnew-submit"]))  {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    if (empty($password) || empty($repassword)) {
        header("Location: ../../loginsystem/moderator/modlogin.php?newpwd=empty");
        exit();
    } else if ($password != $repassword) {
        header("Location: ../../loginsystem/moderator/modlogin.php?newpwd=repwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require '../db.con.php';

    $sql = "SELECT * FROM reset WHERE ResetSelector=? AND ResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request!";
            exit();
        } else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["ResetToken"]);

            if ($tokenCheck === false) {
                echo "You need to re-submit your request!";
                exit();
            } elseif ($tokenCheck === true) {
                
                $tokenEmail = $row['ResetEmail'];

                $sql = "SELECT * FROM moderator WHERE ModEmail=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
            } else {
              mysqli_stmt_bind_param($stmt, "s", $tokenEmail);  
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if (!$row = mysqli_fetch_assoc($result)) {
                  echo "There was an error!";
                  exit();
              } else {
                
                $sql = "UPDATE moderator SET ModPassword=? WHERE ModEmail=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $sql = "DELETE FROM reset WHERE ResetEmail=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error!";
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../../loginsystem/moderator/modlogin.php?newpwd=passwordupdated");
                } 

              }
            }
        }

     }
    }

} else {
    header("Location: ../Index/index.php");
}
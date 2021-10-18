<?php

if(isset($_POST['modsignup-submit'])) {

    require '../db.con.php';

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['repsw'];
    $position = $_POST['position'];

    // Check for empty fields
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../../loginsystem/moderator/modsignup.php?error=emptyfields&uname=".$username."&email=".$email);
        exit();
    }
      //Check for an invalid username AND email.
      else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../loginsystem/moderator/modsignup.php?error=invaliduname&email");
        exit();
      }
      // Check for an invalid username (ONLY letters and numbers.)
      else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../../loginsystem/moderator/modsignup.php?error=invaliduname&email=".$email);
        exit();
      }
      // Check for an invalid email
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../loginsystem/moderator/modsignup.php?error=invalidemail&uname=".$username);
        exit();
      }
      // Check if the repeated password is NOT the same.
      else if ($password !== $passwordRepeat) {
        header("Location: ../../loginsystem/moderator/modsignup.php?error=passwordcheck&uname=".$username."&email=".$email);
        exit();
      }
      else {
        
        //Check Database
        $sql = "SELECT ModFBICodename FROM moderator WHERE ModFBICodename=?;";
        //Prepared Statement
        $stmt = mysqli_stmt_init($conn);
        // Prepare SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // error = sent back to signup page.
          header("Location: ../../loginsystem/moderator/modsignup.php?error=sqlerror");
          exit();
        }
        else {
          // Bind type of parameters expected to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "s", $username);
          // Execute the prepared statement and send it to the database!
          mysqli_stmt_execute($stmt);
          // Store the result from the statement.
          mysqli_stmt_store_result($stmt);
          // Gete the number of result we received from the statement = check if username already exists?
          $resultCount = mysqli_stmt_num_rows($stmt);
          // Close the prepared statement!
          mysqli_stmt_close($stmt);
          // Check if the username exists.
          if ($resultCount > 0) {
            header("Location: ../../loginsystem/moderator/modsignup.php?error=usertaken&email=".$email);
            exit();
          }
          else {
            // Insert Statement + PlaceHolders
            $sql = "INSERT INTO moderator (ModFBICodename, ModEmail, ModPassword, ModRealName, ModDescription, ModAge, ModCountry, ModPosition) VALUES (?, ?, ?, ?, ?, ?, ?, '$position');";
            // New statement using the connection from the db.con.php file.
            $stmt = mysqli_stmt_init($conn);
            // Prepare SQL statement AND check if there are any errors with it.
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              // Error = send the user back to the signup page.
              header("Location: ../../loginsystem/moderator/modsignup.php?error=sqlerror");
              exit();
            }
            else {
    
              //Before send data --> db (hash password)
              $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
              $realname = 'New Moderator';
              $userdesc = 'Insert Your Description Here!';
              $userage = '1';
              $usercountry = 'Isekai';
              
              // Bind the type of parameters expected to pass into the statement, and bind the data from the user.
              mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $hashedPwd, $realname, $userdesc, $userage, $usercountry);
              // Execute the prepared statement and send it to the db.
              // User = registered.
              if (mysqli_stmt_execute($stmt)) {
                $last_id = mysqli_insert_id($conn);

                $sql = "INSERT INTO profileimg (UserID, ImgStatus, PosID) VALUES ('$last_id', 1, '$position')";
                mysqli_query($conn, $sql);

                // Send user bck to signup page with success message
              header("Location: ../../loginsystem/moderator/modsignup.php?signup=success");
              exit(); 
            } else {
              echo '<script>Alert("beep boop error occured!")</script>';
              }
            }
          }
        }
      }
      // Close the prepared statement and the db connection!
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
    else {
      // If User tries to access this page an inproper way, we send them back to the signup page.
      header("Location: ../../loginsystem/moderator/modsignup.php");
      exit();
    }
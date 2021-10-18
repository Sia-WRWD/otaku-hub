<?php

if (isset($_POST["adminforgot-submit"])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/otaku/loginsystem/admin/adminnew.php?selector=" . $selector . "&validator=" . bin2hex($token); 

    $expires = date("U") + 3600;

    require '../db.con.php'; 

    $Email = $_POST["email"];

    $sql = "DELETE FROM reset WHERE ResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $Email);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO reset (ResetEmail, ResetSelector, ResetToken, ResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $Email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to =  $Email;

    $subject = 'Password Reset for OtakuPage';

    $message = '<p> A password reset was requested by you. The link to reset your password is below.
                    If you did not make this request, you can ignore this email. </p>';
    $message .= '<p> Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: OtakuPage <otakupage69@gmail.com>\r\n";
    $headers .= "Reply-To: otakupage69@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../../loginsystem/admin/adminforgot.php?reset=success");
    
} else {
    header("Location: ../../Index/index.php");
}
<?php

session_start();
include_once '..\Connection\db.con.php';
$id = $_SESSION['id'];
$pos = $_SESSION['position'];

if (isset($_POST['img-submit'])){
$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg');

if(in_array($fileActualExt, $allowed)){
   if($fileError === 0){
      if($fileSize < 1000000){
         $fileNameNew = "profile".$pos."".$id.".".$fileActualExt;
         $fileDestination = '../UploadedFiles/'.$fileNameNew;
         move_uploaded_file($fileTmpName, $fileDestination);
         $sql = "UPDATE profileimg SET ImgStatus = 0 WHERE UserID= '$id' AND PosID= '$pos';";
         $result = mysqli_query($conn, $sql);
         header("Location: ..\Profile\EditProfile.php?upload=success");
      } else {
        echo "The File Size Is Too Big, Try Something Smaller!";
      } 
   } else {
    echo "An Error Happened While Uploading, Please Try Again :^(";
   }
} else {
    echo "You cannot upload files of this type!!!";
}
}
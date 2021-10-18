<?php

function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $Anime = $_POST['anime'];
        $positionvalue = $_POST['position'];    

        $sql = "INSERT INTO comments (UserID, CommentDate, CommentMessage, CommentAnime, PosID) VALUES ('$id', '$date', '$message', '$Anime', '$positionvalue')";
        $result = $conn->query($sql);
    }
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $cid = $_POST['cid'];
        $id = $_POST['id'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "UPDATE comments SET CommentMessage='$message' WHERE CommentID='$cid'";
        $result = $conn->query($sql);
        echo "<script>
             alert('Comment editted successfully!'); 
             window.history.go(-3);
             </script>";
    }
}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
        $cid = $_POST['cid'];

        $sql = "DELETE FROM comments WHERE CommentID='$cid'";
        $result = $conn->query($sql);
        $secondsWait = 1;
        echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';
    }
}
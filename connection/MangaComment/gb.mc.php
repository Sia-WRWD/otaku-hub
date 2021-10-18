<?php

function getComments($conn) {
    $sql = "SELECT * FROM comments WHERE CommentAnime='GB' and PosID='User' ";
    $result = $conn->query($sql);
    $sql3 = "SELECT * FROM comments WHERE CommentAnime='GB' and PosID='Admin' ";
    $result3 = $conn->query($sql3);
    $sql5 = "SELECT * FROM comments WHERE CommentAnime='GB' and PosID='Moderator' ";
    $result5 = $conn->query($sql5);



    while ($row3 = $result3->fetch_assoc()) {
        $id = $row3['UserID'];
        $sql4 = "SELECT * FROM admin WHERE AdminID='$id'";
        $result4 = $conn->query($sql4);
        if ($row4 = $result4->fetch_assoc()) {
            echo "<div class='revbx' style='background-color: white';><p>";
            echo $row4['AdminGodCodename']."<br>";
            echo $row3['CommentDate']."<br>";
            echo nl2br($row3['CommentMessage']);
            echo "</p>";
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == $row3['UserID'] and $_SESSION['position'] == $row4['AdminPosition']) {
                echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                    <input type='hidden' name='cid' value='".$row3['CommentID']."'>
                    <button type='submit' class='btn-delete' name='commentDelete'>Delete</button>
                    </form>
                    <form class='edit-form' method='POST' action='../../../content/editcomment.php'>
                        <input type='hidden' name='cid' value='".$row3['CommentID']."'>
                        <input type='hidden' name='id' value='".$row3['UserID']."'>
                        <input type='hidden' name='date' value='".$row3['CommentDate']."'>
                        <input type='hidden' name='message' value='".$row3['CommentMessage']."'>
                        <button class='btn-edit'>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
        }
    }

    while ($row5 = $result5->fetch_assoc()) {
        $id = $row5['UserID'];
        $sql6 = "SELECT * FROM moderator WHERE ModID='$id'";
        $result6 = $conn->query($sql6);
        if ($row6 = $result6->fetch_assoc()) {
            echo "<div class='revbx' style='background-color: white';><p>";
            echo $row6['ModFBICodename']."<br>";
            echo $row5['CommentDate']."<br>";
            echo nl2br($row5['CommentMessage']);
            echo "</p>";
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == $row5['UserID'] and $_SESSION['position'] == $row6['ModPosition']) {
                echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                    <input type='hidden' name='cid' value='".$row5['CommentID']."'>
                    <button type='submit' class='btn-delete' name='commentDelete'>Delete</button>
                    </form>
                    <form class='edit-form' method='POST' action='../../../content/editcomment.php'>
                        <input type='hidden' name='cid' value='".$row5['CommentID']."'>
                        <input type='hidden' name='id' value='".$row5['UserID']."'>
                        <input type='hidden' name='date' value='".$row5['CommentDate']."'>
                        <input type='hidden' name='message' value='".$row5['CommentMessage']."'>
                        <button class='btn-edit'>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
        }
    }


    while ($row = $result->fetch_assoc()) {
        $id = $row['UserID'];
        $sql2 = "SELECT * FROM users WHERE UserID='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
            echo "<div class='revbx' style='background-color: white';><p>";
            echo $row2['Username']."<br>";
            echo $row['CommentDate']."<br>";
            echo nl2br($row['CommentMessage']);
            echo "</p>";
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == $row2['UserID'] and $_SESSION['position'] == $row2['UserPosition']) {
                echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                    <input type='hidden' name='cid' value='".$row['CommentID']."'>
                    <button type='submit' class='btn-delete' name='commentDelete'>Delete</button>
                    </form>
                    <form class='edit-form' method='POST' action='../../../content/editcomment.php'>
                        <input type='hidden' name='cid' value='".$row['CommentID']."'>
                        <input type='hidden' name='id' value='".$row['UserID']."'>
                        <input type='hidden' name='date' value='".$row['CommentDate']."'>
                        <input type='hidden' name='message' value='".$row['CommentMessage']."'>
                        <button class='btn-edit'>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
        }
    }
}
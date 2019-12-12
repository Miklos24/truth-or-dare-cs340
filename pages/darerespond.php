<!DOCTYPE html>
<?php /* This page is where you can create a dare response for a certain dare */
include 'header.php'; // this acts kinda like handlebars ?>

<html> <body>

    <?php include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs mysqli_close() to end connection

        $gName = $_GET['group'];
        $dID = $_GET['dID'];
        $username = $_SESSION["username"];

        $darequery = "SELECT dare_text FROM DarePrompts WHERE dID = '$dID' ";

        $dare_text = mysqli_query($conn, $darequery)->fetch_array()[0];

        echo "<div class='container-fluid'>";
            echo "<div class='jumbotron'>";
                echo "<h1 class='display-4'>$dare_text</h1>";
                echo "<p class='lead'> Use the field below to upload a picture of you completing this dare!</p>";
                echo "<hr class='my-4'>";
                echo "<form class='input-group mb-3' action='upload.php?group=".$gName."&dID=".$dID."' method='post' enctype='multipart/form-data'>";
                    echo "<div class='input-group-prepend'>";
                        echo "<input class='input-group-text' type='submit' value='Upload Image' name='submit'>";
                    echo "</div>";
                    echo "<div class='custom-file'>";
                        echo "<input class='custom-file-input' type='file' name='fileToUpload' id='fileToUpload'>";
                        echo "<label class='custom-file-label' for='fileToUpload'>Choose file</label>";
                    echo "</div>";
                echo "</form>";
            echo "</div>";
        echo "</div>";

        mysqli_free_result($dare_text);
        mysqli_close($conn); // ends connection started in connectDB.php
    ?>

  </body>

</html>

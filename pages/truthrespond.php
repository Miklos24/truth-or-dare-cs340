<!DOCTYPE html>
<?php /* This page is where you can create a dare response for a certain dare */
include 'header.php'; // this acts kinda like handlebars ?>

<html> <body>

    <?php include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs mysqli_close() to end connection

        $gName = $_GET['group'];
        $tID = $_GET['tID'];
        $username = $_SESSION["username"];

        $truthquery = "SELECT truth_text FROM TruthPrompts WHERE tID = '$tID' ";

        $truth_text = mysqli_query($conn, $truthquery)->fetch_array()[0];

        echo "<div class='container-fluid'>";
            echo "<div class='jumbotron'>";
                echo "<h1 class='display-4'>$truth_text</h1>";
                echo "<p class='lead'> Answer this truth in the textbox below!</p>";
                echo "<hr class='my-4'>";
                echo "<form method='post' action='submit.php?group=".$gName."&tID=".$tID."' class='form-group'>";
                    echo "<textarea class='form-control' name='truthTextResponse' rows=8></textarea>";
                    echo "<input type='submit' value='Submit Response' class='btn btn-primary btn-lg m-2'/>";
                echo "</form";
            echo "</div>";
        echo "</div>";

        mysqli_free_result($dare_text);
        mysqli_close($conn); // ends connection started in connectDB.php
    ?>

  </body>

</html>

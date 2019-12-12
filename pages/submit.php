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
        $submission_text = mysqli_real_escape_string($conn, $_POST['truthTextResponse']);

        echo "<div class='container-fluid'>";
            echo "<div class='jumbotron'>";
                echo "<h1 class='display-4'>$truth_text</h1>";
                echo "<p class='lead'> Answer this truth in the textbox below!</p>";
                echo "<hr class='my-4'>";
                echo "<form method='post' action='submit.php?group=".$gName."&tID=".$tID."' class='form-group'>";
                    echo "<textarea class='form-control' id='truthTextResponse' rows=8 readonly>$submission_text</textarea>";
                    if( trim ( " \t\n\r\0\x0B", $submission_text, "  \t\n\r\0\x0B")  != "") {
                      if (mysqli_query($conn, "INSERT INTO TruthResponses (`tID`,`responder`,`response_text`,`upvotes`) VALUES ('$tID', '$username', '$submission_text', 0)")){
                          echo "<button class='btn btn-primary btn-lg m-2' disabled>Submitted!</button>";
                          echo "<a class='btn btn-primary btn-lg' href='truthresponses.php?group=".$gName."&tID=".$tID."'>See All Responses</a>";
                      } else {
                          echo "<button class='btn btn-primary btn-lg m-2' disabled>Submission Failed!</button>";
                          echo "<a class='btn btn-primary btn-lg' href='truthresponses.php?group=".$gName."&tID=".$tID."'>See All Responses</a>";
                          echo "<p>You've already submitted a response to this prompt. </p>";
                      }
                    }
                    else {
                      echo "<script>";

                      echo "function emptyresponse() {";
                      echo "alert('can not have an empty response');";
                      echo "window.location.replace('truthrespond.php?group=".$gName."&tID=".$tID."');";
                      echo "}";
                      echo "emptyresponse()";
                      echo "</script>";
                    }

                echo "</form";
            echo "</div>";
        echo "</div>";

        mysqli_free_result($truth_text);
        mysqli_close($conn); // ends connection started in connectDB.php
    ?>

  </body>

</html>

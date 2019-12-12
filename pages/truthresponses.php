 <!DOCTYPE html>

<?php
  /*
  * This is where you can view all of the responses for a certain truth.
  *
  */
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="TruthResponses"; // $ signals a variable in php
?>

<html>
  <body>
    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $gName = $_GET['group']; // this is gotten from the url parameters.
      $tID = $_GET['tID'];

      $truthResponses = "SELECT tID, responder, response_text, upvotes, gName
                        FROM TruthResponses NATURAL JOIN (TruthGroup NATURAL JOIN Groups)
                        WHERE gName = '$gName' AND tID = '$tID'";

      $truthPrompt = "SELECT truth_text FROM TruthPrompts WHERE tID = $tID";

      $truthResponses = mysqli_query($conn, $truthResponses);
      $truthPrompt = mysqli_query($conn, $truthPrompt);
      if(!$truthResponses || !$truthPrompt) {
        die("response page query failed");
      }

      echo "<div class='container'>";

      $truth_prompt = mysqli_fetch_array($truthPrompt);

      echo "<h3>" . $truth_prompt['truth_text'] . "</h3>";
      if(mysqli_num_rows($truthResponses) == 0) {
        echo "There are not any responses to this truth prompt yet";
      }
      while($row = mysqli_fetch_array($truthResponses)){
        echo "<div class='rounded card m-2'>";
            echo "<div class='card-body'>";;
                echo $row['response_text'];
            echo "</div>"; //end body
            echo "<div class=card-footer>";
                echo  $row['responder'];
            echo "</div>"; //end footer;

        echo "</div>";
      }
      echo "</div>";
      mysqli_free_result($truthResponses);
      mysqli_free_result($truthPrompt);

      mysqli_close($conn);
    ?>

  </body>
</html>

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

      $truthResponses = "SELECT response_text, responder
            FROM TruthResponses R, TruthPrompts P, Groups G
            WHERE G.gID = R.gID AND P.tID = R.tID AND G.gName = ‘$gName’ AND P.tID = ‘$tID’";
      $truthPrompt = "SELECT truth_text FROM TruthPrompts WHERE tID = $tID";

      $truthResponses = mysqli_query($conn, $truthResponses);
      $truthPrompt = mysqli_query($conn, $truthPrompt);
      if(!$truthResponses || !$truthPrompt) {
        die("response page query failed");
      }

      echo "<div class='container'>";

      echo "<h3>$truthPrompt</h3>";
      if(mysqli_num_rows($truthResponses) == 0) {
        echo "There are not any responses to this dare yet";
      }
      while($row = mysqli_fetch_array($truthResponses)){
        echo "<div class='rounded card'>";
            echo "<div class='card-body'>";;
                echo $row['response_text'];
                echo  $row['responder'];
            echo "</div>"; //end top;
        echo "</div>"; 
      }
      echo "</div>";
      mysqli_free_result($truthResponses);
      mysqli_free_result($truthPrompt);

      mysqli_close($conn);
    ?>

  </body>
</html>

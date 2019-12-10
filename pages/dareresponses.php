<!DOCTYPE html>
<?php
  /*
  * This is where you can view all of the responses for a certain dare.
  *
  */
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Dare responses"; // $ signals a variable in php
?>

<html>
  <body>

    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $gName = $_GET['group']; // this is gotten from the url parameters.
      $dID = $_GET['dID'];

      $dareResponses = "SELECT dID, responder, pictureURL, upvotes, gName
                        FROM DareResponses NATURAL JOIN (DareGroup NATURAL JOIN Groups)
                        WHERE gName = '$gName' AND dID = '$dID'";

      $darePrompt = "SELECT dare_text FROM DarePrompts WHERE dID = $dID";


      $dareResponses = mysqli_query($conn, $dareResponses);
      $darePrompt = mysqli_query($conn, $darePrompt);

      if(!$dareResponses || !$darePrompt) {
        die("response page query failed");
      }

      echo "<div class='container'>";

      $dare_text = mysqli_fetch_array($darePrompt);

      echo "<h3>" . $dare_text['dare_text'] . "</h3>";
      if(mysqli_num_rows($dareResponses) == 0) {
        echo "There are not any responses to this dare yet";
      }
      while($row = mysqli_fetch_array($dareResponses)){
        echo "<div class='rounded card'>";
            echo "<div class='card-body'>";
                echo "<img src='".$row['pictureURL']."'/>";
            echo "</div>"; // end body
            echo "<div class=card-footer>";
                echo  $row['responder'];
            echo "</div>"; //end footer;
        echo "</div>";
      }
      echo "</div>";
      mysqli_free_result($dareResponses);
      mysqli_free_result($darePrompt);

      mysqli_close($conn);
    ?>
  </body>

</html>

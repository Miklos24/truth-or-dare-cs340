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

      $dareResponses = "SELECT picture_url, responder
      FROM DareResponses R, DarePrompts P, Groups G
      WHERE G.gID = R.gID AND P.dID = R.dID AND G.gName = ‘$gName’ AND P.dID = ‘$dID’";

      $darePrompt = "SELECT dare_text FROM darePrompts WHERE dID = $dID";


      $dareResponses = mysqli_query($conn, $dareResponses);
      $darePrompt = mysqli_query($conn, $darePrompt);
      if(!$truthResponses || !$truthPrompt) {
        die("response page query failed");
      }

      echo "<div class='container'>";

      echo "<h3>$darePrompt</h3>";
      if(mysqli_num_rows($dareResponses) == 0) {
        echo "There are not any responses to this dare yet";
      }
      while($row = mysqli_fetch_array($dareResponses)){
        echo "<div class='rounded card'>";
            echo "<div class='card-body'>";;
                echo "<img src='".$row['picture_url']."'/>";
                echo  $row['responder'];
            echo "</div>"; //end top;
        echo "</div>"; 
      }
      echo "</div>";
      mysqli_free_result($dareResponses);
      mysqli_free_result($darePrompt);

      mysqli_close($conn);
    ?>
  </body>

</html>

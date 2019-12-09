<!DOCTYPE html>

<?php
  /*
  * This page shows the truths and the dare prompts for a specific group.
  * This will use the url parameters in order to get the groupid for the page this is for.
  * We will use a similar layout for the homepage where all of the top voted truths and dares are split up.
  */
  include 'header.php';
?>

<html>
  <body>
    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $gName = $_GET['group']; // this is gotten from the url parameters.

      $darequery = "SELECT dID, dare_text, dare_pt_val
                FROM Groups G, (
	                 DarePrompts
                   NATURAL JOIN DareGroup D)
                WHERE G.gID = D.gID AND G.gName = '$gName'
               ";

      $truthquery = "SELECT tID, truth_text, truth_pt_val
                FROM Groups G, (
	                 TruthPrompts
                   NATURAL JOIN TruthGroup T) 
                WHERE G.gID = T.gID AND G.gName = '$gName'
               ";

      $dares = mysqli_query($conn, $darequery);
      $truths = mysqli_query($conn, $truthquery);
      if(!$truths || !$dares) {
        die("group page query failed");
      }
      echo "<div class='container-fluid'>";

      echo "<h1>$gName</h1>";
      echo "<div class='row'>"; // the container with both sides
      echo "<div class='col-md-6 col-sm-6'>";  // container with the dares
        echo "Groups Dares";
      
        while($row = mysqli_fetch_array($dares)){
              echo "<div class='card rounded'>";
                echo "<div id='card-body'>";
                echo "<a href='dareresponses.php?group=".$row['gName']."&dID=".$row['dID']."'>".$row['dare_text']."</a>";
                echo "</div>"; //end top;
                echo "<div class=card-footer>";
                  echo  $row['dare_pt_val']; // do we want a point value
                echo "</div>";
              echo "</div>"; 
        }
        echo "</div>";

        echo "<div class='col-md-6 col-sm-6'>";  // right container with the truths
        echo "Groups Truths";
        while($row = mysqli_fetch_array($truths)){
          echo "<div class='card rounded'>";
            echo "<div id='card-body'>";
                echo "<a href='truthresponses.php?group=".$row['gName']."&tID=".$row['tID']."'>".$row['truth_text']."</a>";
            echo "</div>";
            echo "<div class=card-footer>";
              echo $row['truth_pt_val'];
            echo "</div>";
          echo "</div>"; 
        }
        echo "</div>";

      echo "</div>"; // end row
      echo "</div>"; // end container

      mysqli_free_result($dares);
      mysqli_free_result($truths);

      mysqli_close($conn); // ends connection started in connectDB.php
    ?>
  </body>

</html>

<!DOCTYPE html>



<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Dare responses"; // $ signals a variable in php
?>

<html>
  <body>

    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $gName = "OSU Boys";
      $dID = 2;

      $query = "SELECT pictureURL, upvotes
                FROM DareResponses R, DarePrompts P, Groups G
                WHERE G.gID = P.dID AND P.dID = R.dID AND G.gName = '$gName' AND P.dID = '$dID'
               ";

      $result = mysqli_query($conn, $query);

      if(!$result) {
        die("dare response query failed");
      }

      if(mysqli_num_rows($result) > 0) {

        echo "<div class='container'>";

        echo "<div class='TorD'>";
        echo "<h1>Dare responses</h1>";

      }

      while($row = mysqli_fetch_array($result)){
            echo "<div class='card rounded'>";
              echo "<div id='top'>";
    				    echo "<div id='TDtext'>";
    				        echo "<img class='rounded' id='dareimage' src=" . $row['pictureURL'] . ">";
                echo "</div>"; // end TDtext
              echo "</div>"; //end top;
              echo "<div id='bottom'>";
                echo "<div id='TDpoints'>";
    				        echo  $row['upvotes'];
                    echo "<button> △ </button>";
                    echo "<button> ▽ </button>";
    				    echo "</div>"; // end TDpoints
              echo "</div>"; //end bottom
            echo "</div>"; //end singleTD

        }
          echo "</div>"; // end TorD
         echo "</div>"; // end container

        mysqli_free_result($result);
      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


  </body>

</html>

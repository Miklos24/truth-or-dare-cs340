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

      $gName = 'OSU Boys'; // hard coded should be based off the website

      $query = "SELECT dare_text, upvotes
                FROM Groups G, (
	                 DarePrompts
                   NATURAL JOIN DareResponses)
                WHERE G.gID = dID AND G.gName = '$gName'
               ";

               $result = mysqli_query($conn, $query);
               if(!$result) {
                 die("group page query failed");
               }

               if(mysqli_num_rows($result) > 0) {

                 echo "<div class='container'>";

                 echo "<div class='TorD'>";
                 echo "<h1>Group Dares</h1>";

               }

               while($row = mysqli_fetch_array($result)){
                     echo "<div class='card rounded'>";
                       echo "<div id='top'>";
             				    echo "<div id='TDtext'>";
             				        echo $row['dare_text'];
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

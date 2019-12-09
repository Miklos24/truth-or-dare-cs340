<!DOCTYPE html>

<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Groups"; // $ signals a variable in php
?>

<html>
  <body>
    <?php

      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      // example php
      $query = "SELECT * FROM Groups "; //should change query for homepage

      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("query failed");
      }

      if(mysqli_num_rows($result) > 0)
      {
		    // Create the table header
        echo "<div class='container'>";

        echo "<div class='TorD'>";
        echo "<h1>Groups</h1>";;
      }

		    // Extract rows from the results returned from the database
        while($row = mysqli_fetch_array($result)){
          echo "<div class='card rounded'>";
            echo "<div id='top'>";
              echo "<div id='TDtext'>";
                  echo $row['gName'];
              echo "</div>"; // end TDtext
            echo "</div>"; //end top;
            echo "<div id='bottom'>";
              echo "<div id='TDpoints'>";
                  echo  $row['owner'];
              echo "</div>"; // end TDpoints
            echo "</div>"; //end bottom
          echo "</div>"; //end singleTD

      }
        echo "</div>"; // end TorD
       echo "</div>"; // end container
		// Free result set
        mysqli_free_result($result);

      mysqli_close($conn); //neccessary after connnectDB.php
    ?>

  </body>
</html>

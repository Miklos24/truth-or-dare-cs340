<!DOCTYPE html>

<?php //this is how to signal that it is a php section
  $currentpage="Home"; // $ signals a variable in php
?>

<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title> Truth or Dare! </title>
     <!-- Link for stuff like css -->
    <link rel="stylesheet" href="index.css">

    <!-- script for things like a javascript file. -->
    <!-- We may need a js file to test userinput and error handle. -->

  </head>
  <body>

    <?php
      include 'header.php'; // this acts kinda like handlebars
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $query = "SELECT txt, pts
                FROM (
                  SELECT dare_text AS txt, dare_pt_val AS pts
                  FROM DarePrompts
                  UNION
                  SELECT truth_text AS txt, truth_pt_val AS pts
                  FROM TruthPrompts
                ) C
                ORDER BY pts DESC
                LIMIT 10
                ";

      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("home page query failed");
      }

      if(mysqli_num_rows($result) > 0) {
        echo "<h1>Top Truths or Dares</h1>";
        echo "<table id='t01' border='1'>";
        // Create the table header
        echo "<thead>";
          echo "<tr>";
            echo "<th>Text</th>";
            echo "<th>Points</th>";
          echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
      }

      // Extract rows from the results returned from the database
      while($row = mysqli_fetch_array($result)){
          //  ADD code to display the parts  *****
  		//  This is similar to how suppliers were displayed  ***
				echo "<tr>";
				echo "<td>" . $row['txt'] . "</td>";
				echo "<td>" . $row['points'] . "</td>";
				echo "</tr>";
        }
          echo "</tbody>";
          echo "</table>";
  		// Free result set
          mysqli_free_result($result);

      mysqli_close($conn);
    ?>


    <div class="container"> <!-- I do containers for flex boxes -->
      <div>
        This is the home screen
      </div>
    </div>
  </body>

</html>

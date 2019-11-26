<!DOCTYPE html>

<?php //this is how to signal that it is a php section
  $currentpage="Groups"; // $ signals a variable in php
?>

<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title> Groups! </title>
     <!-- Link for stuff like css -->
    <link rel="stylesheet" href="index.css">

    <!-- script for things like a javascript file. -->
    <!-- We may need a js file to test userinput and error handle. -->

  </head>
  <body>
    <?php
      include 'header.php'; // this acts kinda like handlebars
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      // example php
      $query = "SELECT * FROM Groups "; //should change query for homepage

      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("query failed");
      }

      if(mysqli_num_rows($result) > 0)
      {
        echo "<h1>Groups</h1>";
		    echo "<table id='t01' border='1'>";
		// Create the table header
        echo "<thead>";
    			echo "<tr>";
      			echo "<th>gID</th>";
      			echo "<th>gName</th>";
      			echo "<th>Owner</th>";
    			echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
      }

		// Extract rows from the results returned from the database
        while($row = mysqli_fetch_array($result)){
        //  ADD code to display the parts  *****
		//  This is similar to how suppliers were displayed  ***
						echo "<tr>";
						echo "<td>" . $row['gID'] . "</td>";
				echo "<td>" . $row['gName'] . "</td>";
						echo "<td>" . $row['owner'] . "</td>";
						echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
		// Free result set
        mysqli_free_result($result);

      mysqli_close($conn); //neccessary after connnectDB.php
    ?>

    groups body
  </body>
</html>

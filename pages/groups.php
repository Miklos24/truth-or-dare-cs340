<!DOCTYPE html>

<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Groups"; // $ signals a variable in php
?>

<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title> Groups! </title>
     <!-- Link for stuff like css -->
    <link rel="stylesheet" href="../assets/index.css" media="screen">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


  </head>
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
          echo "<div class='singleTD'>";
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

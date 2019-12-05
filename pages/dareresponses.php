<!DOCTYPE html>



<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Dare responses"; // $ signals a variable in php
?>

<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title> TITLE </title>
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
            echo "<div class='singleTD'>";
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

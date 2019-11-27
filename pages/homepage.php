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
    <link rel="stylesheet" href="../assets/index.css" media="screen">

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

        echo "<div class='container'>";

        echo "<div class='TorD'>";
        echo "<h1>Top Truths or Dares</h1>";

      }

      while($row = mysqli_fetch_array($result)){
            echo "<div class='singleTD'>";
              echo "<div id='top'>";
    				    echo "<div id='TDtext'>";
    				        echo $row['txt'];
                echo "</div>"; // end TDtext
              echo "</div>"; //end top;
              echo "<div id='bottom'>";
                echo "<div id='TDpoints'>";
    				        echo  $row['pts'];
                    echo "<button> △ </button>";
                    echo "<button> ▽ </button>";
    				    echo "</div>"; // end TDpoints
              echo "</div>"; //end bottom
            echo "</div>"; //end singleTD

        }
          echo "</div>"; // end TorD
         echo "</div>"; // end container

        mysqli_free_result($result);

      mysqli_close($conn);
    ?>


    <!-- <div class="container">
      <div class="TorD">
        <div id="TDtext">
          This is the home screen
        </div>
        <div id="TDpoints">
          pts
          <button> ^ </button>
          <button> v </button>
        </div>
      </div>
    </div> -->

  </body>

</html>

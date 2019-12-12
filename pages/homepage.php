<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Home"; // $ signals a variable in php
?>

<html>
  <body>


    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $darequery = "SELECT dID, num_responses, dare_text, author, gName
                    FROM DarePrompts NATURAL JOIN DareGroup NATURAL JOIN Groups
                    ORDER BY num_responses DESC
                    LIMIT 10;
                   ";

      $truthquery = "SELECT tID, truth_text, num_responses, author, gName
                      FROM TruthPrompts NATURAL JOIN TruthGroup NATURAL JOIN Groups
                      ORDER BY num_responses DESC
                      LIMIT 10;
                ";

      $dares = mysqli_query($conn, $darequery);
      $truths = mysqli_query($conn, $truthquery);
      if(!$dares || !$truths) {
        die("home page query failed");
      }

      echo "<div class='container-fluid' id='buttonID' >";
      echo "<h1>Top Truths and Dares</h1>";

      echo "<div class='row'>"; // the container with both sides
      echo "<div class='col-md-6 col-sm-6'>";  // container with the dares
        echo "<h3>Groups Dares</h3>";

        while($row = mysqli_fetch_array($dares)){
              echo "<div class='card rounded mt-2'>";
                echo "<div id='card-body'>";
                    // echo $row['dare_text'];
                    echo "<a class='nav-link' href='dareresponses.php?group=".$row['gName']."&dID=".$row['dID']."'>".$row['dare_text']."</a>";
                echo "</div>";
                echo "<div class='card-footer'>";
                  echo $row['author'] . "\t-\t" . $row['gName'] . "\t" ;
                  echo "<div class='float-right'>" . $row['num_responses'] . " Resonses</div>"; 
                echo "</div>";
              echo "</div>";
        }
        echo "</div>";

        echo "<div class='col-md-6 col-sm-6'>";  // right container with the truths
        echo "<h3>Groups Truths</h3>";
        while($row = mysqli_fetch_array($truths)){
          echo "<div class='card rounded mt-2'>";
            echo "<div id='card-body'>";
                echo "<a class='nav-link' href='truthresponses.php?group=".$row['gName']."&tID=".$row['tID']."'>".$row['truth_text']."</a>";
            echo "</div>"; //end top;
            echo "<div class='card-footer'>";
              echo $row['author'] . "\t-\t" . $row['gName'] . "\t";
                echo "<div class='float-right'>" . $row['num_responses'] . " Resonses</div>"; // do we want a point value
            echo "</div>";
          echo "</div>";
        }
        echo "</div>";

      echo "</div>"; // end row

        mysqli_free_result($result);

      mysqli_close($conn);
    ?>


    <script>
      document.getElementById('buttonID').addEventListener('click', function(e) {
        if(e.target && e.target.matches('button.likebutton')){
          console.log("like button pressed");
          e.target.innerHTML = '★';


        }
      });
    </script>

  </body>

</html>

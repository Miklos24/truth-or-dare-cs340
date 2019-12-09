<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Home"; // $ signals a variable in php
?>

<html>
  <body>


    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $darequery = "SELECT dID, dare_text, dare_pt_val
                FROM DarePrompts
                ORDER BY dare_pt_val DESC
                LIMIT 10;
               ";

      $truthquery = "SELECT tID, truth_text, truth_pt_val
                FROM TruthPrompts
                ORDER BY truth_pt_val DESC
                LIMIT 10;
                ";
      
      $dares = mysqli_query($conn, $darequery);
      $truths = mysqli_query($conn, $truthquery);
      if(!$dares || !$truths) {
        die("home page query failed");
      }

      echo "<div class='container-fluid'>";
      echo "<h1>Top Truths and Dares</h1>";

      echo "<div class='row'>"; // the container with both sides
      echo "<div class='col-md-6 col-sm-6'>";  // container with the dares
        echo "<h3>Groups Dares</h3>";
      
        while($row = mysqli_fetch_array($dares)){
              echo "<div class='card rounded'>";
                echo "<div id='card-body'>";
                    echo $row['dare_text'];
                echo "</div>";
                echo "<div class=card-footer>";
                  echo  $row['dare_pt_val']; // do we want a point value
                echo "</div>";
              echo "</div>"; 
        }
        echo "</div>";

        echo "<div class='col-md-6 col-sm-6'>";  // right container with the truths
        echo "<h3>Groups Truths</h3>";
        while($row = mysqli_fetch_array($truths)){
          echo "<div class='card rounded'>";
            echo "<div id='card-body'>";
                echo $row['truth_text'];
            echo "</div>"; //end top;
            echo "<div class=card-footer>";
              echo  $row['truth_pt_val']; // do we want a point value
            echo "</div>";
          echo "</div>"; 
        }
        echo "</div>";

      echo "</div>"; // end row

        mysqli_free_result($result);

      mysqli_close($conn);
    ?>
    

    <script>
      document.getElementById('likebuttonID').addEventListener('click', function(e) {
        if(e.target && e.target.matches('button.likebutton')){
          console.log("button pressed");
          e.target.innerHTML = '★';
        }
      });
    </script>

  </body>

</html>

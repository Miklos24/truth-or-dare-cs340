<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Home"; // $ signals a variable in php
?>

<html>
  <body>


    <?php
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

        echo "<div class='TorD' id='likebuttonID'>";
        echo "<h1>Top Truths or Dares</h1>";

      }

      while($row = mysqli_fetch_array($result)){
            echo "<div class='rounded card'>";
              echo "<div class='card-body'>";;
    				        echo $row['txt'];
              echo "</div>"; //end top;
              echo "<div class='card-footer'>";
    				        echo  $row['pts'];
                    echo "<button class='btn btn-link likebutton' id='likebutton'> ☆ </button>";
              echo "</div>"; //end bottom
            echo "</div>"; //end singleTD

        }
          echo "</div>"; // end TorD
         echo "</div>"; // end container

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

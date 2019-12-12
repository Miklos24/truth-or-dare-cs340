<!-- <!DOCTYPE html> -->
<!-- *********************************************** -->
<!-- view all Groups                                 -->
<!-- *********************************************** -->


<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="Search Groups"; // $ signals a variable in php
?>

<html>
  <body>

    <?php


      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $username = $_SESSION["username"];
      $setgID = 0;

      $query = "SELECT gID, gName, owner, numMembers
                FROM Groups";

      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("list groups query failed");
      }

      echo "<div class='container'>";

      echo "<div class='TorD'>";
      echo "<h1>Groups</h1>";

      if(mysqli_num_rows($result) == 0) {
        echo "<div>Well apparently there are no more groups, which means something went very wrong </div>";
      }

      $partOfGroup = "SELECT G.gName, G.owner, G.gID FROM Groups G, MemberOf M WHERE G.gID = M.gID AND '$username' = M.username";
      //$buttonResult = mysqli_query($conn, $partOfGroup);

      while($row = mysqli_fetch_array($result)) {
        $buttonResult = mysqli_query($conn, $partOfGroup);
        echo "<div class='card rounded'>";
          echo "<div class='card-body'>";
            echo "<a class='nav-link' href='grouppage.php?group=".$row['gName']."'>".$row['gName']."</a>";
          echo "</div>"; //end top;
          echo "<div class=card-footer>";

  echo "<form method='POST'>";

                echo " Group admin: " . $row['owner'] . "\t|\t";
                echo $row['numMembers'] . " Members \t|\t" ;
                $count = 0;
                while($buttonif = mysqli_fetch_array($buttonResult)){
                  if($buttonif['gName'] == $row['gName']){
                    echo "<input class='btn btn-outline-success' type='submit' name='leave' value='leave' />";
                    break;
                  }
                  else if($count == mysqli_num_rows($buttonResult)-1)
                  {
                    echo "<input class='btn btn-outline-primary' type='submit' name='join' value='join'/>";
                    if(isset($_POST['join'])){
                      joinbutton($username, $row['gID']);
                    }
                    break;
                  }
                  $count++;
                }
                $count = 0;

echo "</form>";
          echo "</div>";
        echo "</div>";
        mysqli_free_result($buttonResult);
      }
      echo "</div>";//end TorD
      echo "</div>"; //end container



      mysqli_free_result($result);

      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


  </body>

</html>

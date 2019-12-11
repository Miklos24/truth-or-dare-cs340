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

      while($row = mysqli_fetch_array($result)) {
        echo "<div class='card rounded'>";
          echo "<div class='card-body'>";
            echo "<a class='nav-link' href='grouppage.php?group=".$row['gName']."'>".$row['gName']."</a>";
          echo "</div>"; //end top;
          echo "<div class=card-footer>";
                echo "Group admin: " . $row['owner'] . "\t|\t";
                echo $row['numMembers'] . " Members";
          echo "</div>";
        echo "</div>";
      }
      echo "</div>";//end TorD
      echo "</div>"; //end container

      mysqli_free_result($result);

      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


  </body>

</html>

<!DOCTYPE html>

<?php
  /*
  * This page shows all of the users groups and links to each groups 'grouppage'
  * We will use url parameters in order to pass the group to the group page
  */
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="groups"; // $ signals a variable in php
?>

<html>
  <body>
    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection

      $username = $_SESSION["username"];
      // example php
      $query = "SELECT G.gName, G.owner FROM Groups G, MemberOf M WHERE G.gID = M.gID AND '$username' = M.username"; //should change query for homepage

      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("query failed");
      }
      // Create the table header
      echo "<div class='container'>";

      echo "<div class='TorD'>";
      echo "<h1>" . $username . "'s Groups</h1>";

      if(mysqli_num_rows($result) == 0){ // if the user is not a member of a group.
        echo "<div>You are not apart of any groups, explore the search groups tab to find one </div>";
      }

		    // Extract rows from the results returned from the database
        while($row = mysqli_fetch_array($result)){
          echo "<div class='card rounded m-2'>";
            echo "<div class='card-body'>";
              echo "<a class='nav-link' href='grouppage.php?group=".$row['gName']."'>".$row['gName']."</a>";
            echo "</div>"; //end top;
            echo "<div class=card-footer>";
                  echo "Group admin: " . $row['owner'];
            echo "</div>";
          echo "</div>";
      }
      echo "</div>";
      echo "</div>";

      // Free result set
      mysqli_free_result($result);
      mysqli_close($conn); //neccessary after connnectDB.php
    ?>

  </body>
</html>

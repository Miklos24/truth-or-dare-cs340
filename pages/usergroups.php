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
      $query = "SELECT G.gName, G.owner, G.gID FROM Groups G, MemberOf M WHERE G.gID = M.gID AND '$username' = M.username"; //should change query for homepage

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
              $partOfGroup = "SELECT G.gName, G.owner, G.gID FROM Groups G, MemberOf M WHERE G.gID = M.gID AND '$username' = M.username";
              $buttonResult = mysqli_query($conn, $partOfGroup);
              while($buttonif = mysqli_fetch_array($buttonResult)){
                if($buttonif['gName'] == $row['gName'] && $buttonif['owner'] == $username){ // can not leave a group
                  echo "<button class='btn btn-outline-dark disabled float-right'>Leave</button>";
                  break;
                }
                else if($buttonif['gName'] == $row['gName']){ // non working button if owner
                  echo "<button class='btn btn-outline-danger float-right' onClick='leave(\"" . $username . "\"," . $row['gID'] . ",\"" . $row['gName'] . "\")'>Leave</button>";
                  break;
                }
              }
            echo "</div>";
          echo "</div>";
      }
      echo "</div>";
      echo "</div>";

      // Free result set
      mysqli_free_result($result);
      mysqli_close($conn); //neccessary after connnectDB.php
    ?>
        <script>
      function leave(username, gID, gName){
        console.log(username, gID, gName);
        data = { "username": username, "gID": gID, "gName": gName, "type": "leave" }
        console.log(data)
        $.ajax({
            type: "POST",
            url: "joinleave.php",
            data: JSON.stringify(data),
            success: function(resp) {
                if (resp == "success") {
                    window.location.replace('usergroups.php');
                }
                else {
                    console.log("error leaving group, try again later");
                }
            }
        });
      }
    </script>

  </body>
</html>

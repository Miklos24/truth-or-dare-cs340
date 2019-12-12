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
      echo "<h1>Find Groups</h1>";

      if(mysqli_num_rows($result) == 0) {
        echo "<div>Well apparently there are no more groups, which means something went very wrong </div>";
      }

      $partOfGroup = "SELECT G.gName, G.owner, G.gID FROM Groups G, MemberOf M WHERE G.gID = M.gID AND '$username' = M.username";

      while($row = mysqli_fetch_array($result)) { // loop through and display all of the group info
        echo "<div class='card rounded m-2'>";
          echo "<div class='card-body'>";
            echo "<a class='nav-link' href='grouppage.php?group=".$row['gName']."'>".$row['gName']."</a>";
            echo "<div class='float-right'>" .$row['numMembers'] . " Members </div>" ;
          echo "</div>"; //end top;
        echo "<div class=card-footer>";

        echo " Group admin: " . $row['owner'];

        $buttonResult = mysqli_query($conn, $partOfGroup);
        $count = 0;
        while($buttonif = mysqli_fetch_array($buttonResult)){
          if($buttonif['gName'] == $row['gName'] && $buttonif['owner'] == $username){ // can not leave a group
            echo "<button class='btn btn-outline-dark disabled float-right'>Leave</button>";
            $count = 1;
            break;
          }
          else if($buttonif['gName'] == $row['gName']){ // non working button if owner
            echo "<button class='btn btn-outline-danger float-right' onClick='leave(\"" . $username . "\"," . $row['gID'] . ",\"" . $row['gName'] . "\")'>Leave</button>";
            $count = 1;
            break;
          }
        }
        if($count != 1){ // if there user is not in the group
          echo "<button class='btn btn-outline-primary float-right' onClick='join(\"" . $username . "\"," . $row['gID'] . ",\"" . $row['gName'] . "\")'>Join</button>";
        }

        echo "</div>";
        echo "</div>";
        mysqli_free_result($buttonResult);
      }
      echo "</div>";//end TorD
      echo "</div>"; //end container

      mysqli_free_result($result);

      mysqli_close($conn); // ends connection started in connectDB.php
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
                    window.location.replace('searchgroups.php');
                }
                else {
                    console.log("error leaving group, try again later");
                }
            }
        });
      }
      function join(username, gID, gName){
        console.log(username, gID, gName);
        data = { "username": username, "gID": gID, "gName": gName, "type": "join" }
        console.log(data)
        $.ajax({
            type: "POST",
            url: "joinleave.php",
            data: JSON.stringify(data),
            success: function(resp) {
                if (resp != "failure") {
                    gName = resp;
                    window.location.replace('searchgroups.php');
                }
                else {
                    console.log("error joining group, try again later")
                }
            }
        });
      }
    </script>
  </body>

</html>

<!DOCTYPE html>

<?php
  /*
  * This page shows the truths and the dare prompts for a specific group.
  * This will use the url parameters in order to get the groupid for the page this is for.
  * We will use a similar layout for the homepage where all of the top voted truths and dares are split up.
  */
  include 'header.php';
?>

<html>
  <body>
      <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs mysqli_close() to end connection

      $gName = $_GET['group'];
      $dID = $_GET['dID'];
      $username = $_SESSION["username"];

      $darequery = "SELECT dare_text FROM DarePrompts WHERE dID = '$dID' ";

      $dare_text = mysqli_query($conn, $darequery)->fetch_array()[0];

      echo "<div class='container-fluid'>";
          echo "<div class='jumbotron'>";
              echo "<h1 class='display-4'>$dare_text</h1>";
              echo "<p class='lead'> Use the field below to upload a picture of you completing this dare!</p>";
              echo "<hr class='my-4'>";

              $target_dir = "uploads/";
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      $uploadOk = 1;
                  } else {
                      echo "<p>File is not an image.</p>";
                      $uploadOk = 0;
                  }
              }

              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 5000000) {
                  echo "<p>Sorry, your file is too large.</p>";
                  $uploadOk = 0;
              }

              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                  echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                  $uploadOk = 0;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "<p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been successfully submitted!</p>";
                  } else {
                      echo "<p>Sorry, there was an error uploading your file.</p>";
                  }
              }
              echo "<a class='btn btn-primary' href='dareresponses.php?group=".$gName."&dID=".$dID."'>See All Responses</a>";
          echo "</div>";
      echo "</div>";

      mysqli_query($conn, "INSERT INTO DareResponses (`dID`,`responder`,`pictureURL`,`upvotes`) VALUES ('$dID', '$username', '$target_file', 0)")
      or die (mysqli_error($conn));

      mysqli_free_result($dare_text);
      mysqli_close($conn);
      ?>
  </body>

</html>

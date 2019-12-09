<!DOCTYPE html>
<?php
    /*
    This page is where you can create a dare response for a certain dare
    */
    include 'header.php'; // this acts kinda like handlebars
?>

<html>
  <body>

    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection


      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


  </body>

</html>

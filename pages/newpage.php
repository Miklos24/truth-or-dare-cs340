<!DOCTYPE html>
<!-- *********************************************** -->
<!-- THIS IS A BLANK DOCUMENT FOR CREATING NEW PAGES -->
<!-- It has only the important parts for each of our -->
<!-- web pages -->
<!-- *********************************************** -->


<?php //this is how to signal that it is a php section
  include 'header.php'; // this acts kinda like handlebars
  $currentpage="TO BE CHANGED"; // $ signals a variable in php
?>

<html>
  <body>

    <?php
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection


      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


  </body>

</html>

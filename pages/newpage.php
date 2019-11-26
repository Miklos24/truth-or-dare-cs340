<!DOCTYPE html>
<!-- *********************************************** -->
<!-- THIS IS A BLANK DOCUMENT FOR CREATING NEW PAGES -->
<!-- It has only the important parts for each of our -->
<!-- web pages -->
<!-- *********************************************** -->


<?php //this is how to signal that it is a php section
  $currentpage="Home"; // $ signals a variable in php
?>

<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title> TITLE </title>
     <!-- Link for stuff like css -->
    <link rel="stylesheet" href="../assets/index.css" media="screen">

    <!-- script for things like a javascript file. -->
    <!-- We may need a js file to test userinput and error handle. -->

  </head>
  <body>

    <?php
      include 'header.php'; // this acts kinda like handlebars
      include 'connectDB.php'; // has $conn=mysqli_connect(...) in it needs, mysqli_close() to end connection
      mysqli_close($conn); // ends connection started in connectDB.php
    ?>


    <div class="container"> <!-- I do containers for flex boxes -->
      <div>
        This is the body
      </div>
    </div>
  </body>

</html>

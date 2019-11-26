<?php
  // variables to connect
  define('DB_HOST', 'classmysql.engr.oregonstate.edu');
  define('DB_USER', 'cs340_oertlig');
  define('DB_PASSWORD', 'aYhXV54FQbVm');
  define('DB_NAME', 'cs340_oertlig');
  define('CON_STRING', 'mysql:host=classmysql.engr.oregonstate.edu;dname=cs340_oertlig');

  // actually connects
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
 ?>

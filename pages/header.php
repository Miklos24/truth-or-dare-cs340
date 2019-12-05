<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    die();
  }
  if(isset($_POST['logout'])){
    logout();
  }
  function logout(){
    unset($_SESSION["username"]);
    echo '<script>',
      'function logout(){',
        'window.location.replace("signin.php");',
      '}',
     'logout();',
     '</script>'
    ;
  }

  $user = $_GET['user'];

  $navitem = array(
    // FOR NEW PAGES TO GET ADDED TO THE NAV BAR ADD THE FILE LIKE THIS
    // ALSO MAKE SURE THE FILE HAS 700 ACCCESS
    // chmod 700 [filename.php]
    "Home" => "homepage.php",
    "Groups" => "groups.php",
    "Template Page" => "newpage.php", // this should be taken out in the end product
    "Groups Dares" => "GroupsDares.php", // this should probably not have a link but rather be something they switch to when a group is clicked on.
    "Dare Responses" => "dareresponses.php",
    "Login" => "signin.php"
  );
 ?>
<header>
  Truth or Dare! [Header]
    <nav class="navbar navbar-expand-sm bg-light">
        <ul class="navbar-nav">
          <?php
            foreach ($navitem as $page => $location) {
              echo "<li class='nav-item'><a class='nav-link' href='$location?user=".$user."' ".($page==$currentpage?" class='active'":"").">".$page."</a></li>";
            }
           ?>
           <li class="nav-item">
             <form method="POST">
               <input class="btn btn-link" type="submit" name="logout" value="Logout" />
              </form>
            </li>

        </ul>
    </nav>
</header>
<head>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="utf-8" http-equiv="encoding">
  <title> Truth or Dare! </title>
   <!-- Link for stuff like css -->
  <!-- <link rel="stylesheet" href="../assets/index.css" media="screen"> -->

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

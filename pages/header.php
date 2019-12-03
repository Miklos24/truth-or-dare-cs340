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
    "Login" => "signin.php"
  );
 ?>
<header>
  Truth or Dare! [Header]
  <div class='navbar'>
    <nav>
        <ul>
          <?php
            foreach ($navitem as $page => $location) {
              echo "<li><a href='$location?user=".$user."' ".($page==$currentpage?" class='active'":"").">".$page."</a></li>";
            }
           ?>
           <form method="POST">
             <input type="submit" name="logout" value="Logout" />
           </form>
        </ul>
    </nav>
  </div>
</header>


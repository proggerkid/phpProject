<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Home</h1>
    <?php
      include('/var/www/test/include/nav.php');

      if($_GET['w'] == 1){
        echo "welcome " . $_SESSION['username'] . " you are logged in"; 
      }
    ?>
  </body>
</html>

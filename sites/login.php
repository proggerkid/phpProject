<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Login</h1>
    <?php
      include('/var/www/test/include/nav.php');

      if($_GET['s'] == 1){
        echo "Registration complete. Please login.";
      }
    ?>

    <form method='POST' action='/sites/handler/handleLogin.php'>
      <label for='name'>name</label>
      <input id='name' type='text' name='name' /><br />
      <label for='password'>password</label>
      <input id='password' type='password' name='password' /><br />
      <input id='submitLogin' type='submit' value='login' />
    </form>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Registration</h1>
    <?php
      include('/var/www/test/include/nav.php');

      //verify if user filled out all fields.

      $error = '';

      if($_GET['noUsername'] == 1){
        $error = "<div id='error'>Please enter a username. </div> </br>";
      }
      if($_GET['noEmail'] == 1){
        $error .= "<div id='error'>Please enter an email. </div> </br>";
      }
      if($_GET['noPassword'] == 1){
        $error .= "<div id='error'>Please enter a password. </div> </br>";
      }

      //verify if username and/or email already exists.

      if($_GET['userExists'] == 1){
        $error = "<div id='error'>User already exists.</div><br />";
      }
      if($_GET['emailExists'] == 1){
        $error .= "<div id='error'>Email already exists.</div><br />";
      }
      echo $error;

    ?>
    <form method='post' action='/sites/handler/handleRegistration.php'>
      <label for='name'>name</label>
      <input id='name' type='text' name='name' /><br />
      <label for='email'>email</label>
      <input id='email' type='text' name='email' /><br />
      <label for='password'>password</label>
      <input id='password' type='password' name='password' /><br />
      <input id='submitRegistration' type='submit' value='registration' />
    </form>
  </body>
</html>

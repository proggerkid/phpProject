<?php
  include('/var/www/test/include/sqlConnect.php');
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  //verify email

  if(!empty($_GET['v'])){
    $conf_code = $_GET['v'];
    $res_object = $mysqli->query("SELECT confirm_code FROM users WHERE confirm_code = '$conf_code'");
    $res_array = $res_object->fetch_array();

    if($res_array['confirm_code'] == $conf_code){
      $mysqli->query("UPDATE users SET confirm = 1, confirm_code = 0 WHERE confirm_code = '$conf_code'");
    }

  header('location: /sites/login.php?s=1');
  $res_object->close();
  $mysqli->close();
  exit();
}

  //verify if user filled out all fields.

  $err_codes = '';
  if(strlen($name) == 0){
    $err_codes = 'noUsername=1&';
  }
  if(strlen($email) == 0){
    $err_codes .= 'noEmail=1&';
  }
  if(strlen($password) == 0){
    $err_codes .= 'noPassword=1';
  }
  if(strlen($err_codes) > 0){
    header('Location: /sites/registration.php?'.$err_codes);
    $mysqli->close();
    exit();
  }

  //verify if user and/or email already exists in database.

  $user = $mysqli->query('SELECT username, email, password FROM users');

  $err_codes2 = '';
  while($row = $user->fetch_array()){
    if($row['username'] == $name){
      $err_codes2 .= 'userExists=1&';
    }
    if($row['email'] == $email){
      $err_codes2 .= 'emailExists=1&';
    }
  }

  if(strlen($err_codes2) > 0){
    header('location: /sites/registration.php?'.$err_codes2);
    $mysqli->close();
    exit();
  }

  //add new user to database.

  $randomNumber = rand(100, 900);
  $randomNumber .= rand(100, 900);

  $mysqli->query("INSERT INTO users (username, email, password, confirm_code) VALUES ('$name', '$email', '$password', '$randomNumber')");

  $verify_user = "Please klick on the link localhost/sites/handler/handleRegistration.php?v=$randomNumber to verify your account";
  mail($email, "verify account", $verify_user);
  echo "please go to your email and klick on the link to confirm your account";
  $mysqli->close();
?>

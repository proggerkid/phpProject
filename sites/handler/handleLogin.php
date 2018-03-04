<?php
  session_start();
  include('/var/www/test/include/sqlConnect.php');

  $name = htmlspecialchars($_POST['name']);
  $password = htmlspecialchars($_POST['password']);

  $mysql_result = $mysqli->query("SELECT username, email, password FROM users WHERE username = '$name' AND password = '$password'");
  $mysql_array = $mysql_result->fetch_array();
  if($mysql_array['username'] == $name && $mysql_array['password'] == $password){
    $_SESSION['session'] = true;
    $_SESSION['username'] = $mysql_array['username'];
    $_SESSION['email'] = $mysql_array['email'];
  }
  header('location: /sites/home.php?w=1');
  $mysql_result->close();
  $mysqli->close();
  exit();
?>

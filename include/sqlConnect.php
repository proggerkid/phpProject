<?php
  $mysqli = new mysqli('localhost', 'root', 'geheim', 'test');
  if($mysqli->connect_error){
    echo 'cant connect with database';
  }
?>

<?php
session_start();
if(!isset($_SESSION['is_login'])){
  header('Location: login_login.php');
}
else{
  header('Location: instagram.php');
}
 ?>

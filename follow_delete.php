<?php
session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = "DELETE FROM followTBL WHERE name1='".$_SESSION['nickname']."'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
header("Location:profile.php?nickname=".$_POST['like_man']);
 ?>

<?php
session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = "INSERT INTO followTBL (name1,name2) VALUES(:name1,:name2)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':name1',$_SESSION['nickname']);
$stmt->bindParam(':name2',$_POST['like_man']);
$stmt->execute();
header("Location:profile.php?nickname=".$_POST['like_man']);


 ?>

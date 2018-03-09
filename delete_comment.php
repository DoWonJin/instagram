<?php
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql="DELETE FROM talk WHERE id='".$_POST['comment_id']."'";
$stmt=$dbh->prepare($sql);
$stmt->execute();
header("Location:instagram.php");

 ?>

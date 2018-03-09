<?php
session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql="INSERT INTO talk (section,writer,description,time) VALUES (:section,:writer,:description,:upload_times)";
$stmt=$dbh->prepare($sql);
$times=date( 'Y-m-d H:i:s', time() );
//datetime 클래스 사용법 익혀놓기 (검색해서 공부 dateinterval도 같이 )
$section=(int)$_POST['section'];
$id=(int)$_POST['id'];

$stmt->bindParam(':section',$section);
$stmt->bindParam(':writer',$id);
$stmt->bindParam(':description',$_POST['comment']);
$stmt->bindParam(':upload_times',$times);
$stmt->execute();
var_dump($stmt->errorInfo());

 ?>

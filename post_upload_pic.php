<?php
session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
ini_set("display_errors", "1");
//경로를 변수에 담기
$uploaddir= "user/".$_SESSION['email']."/upload/".basename($_FILES['upload_pic']['name']);//변수로 데이터베이스에 경로를 저장하기

$sql="SELECT id FROM user WHERE email='".$_SESSION['email']."'";//로그인한 사람의 user id값을 불러오기
$stmt=$dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$sql="INSERT INTO posts (user_id,photoupload,time) VALUES(:id,:upload,:upload_time)";
  $stmt = $dbh->prepare($sql);
  $times=date( 'Y-m-d H:i:s', time() );
  $stmt->bindParam(':id',$row['id']);//$row['id']는 user의 id임.
  $stmt->bindParam(':upload',$uploaddir);
  $stmt->bindParam(':upload_time',$times);
  $stmt->execute();

$sql="SELECT id FROM posts WHERE user_id='".$row['id']."' ORDER BY time DESC" ;
//방금게시한 post의 id를 찾는다.
$stmt= $dbh->prepare($sql);
$stmt->execute();
$res=$stmt->fetch(PDO::FETCH_ASSOC);

$sql="INSERT INTO talk (section,writer,description,time) VALUES (:section,:writer,:description,:upload_times)";
$stmt=$dbh->prepare($sql);

$section=(int)$res['id'];
$id=(int)$row['id'];
$times=date( 'Y-m-d H:i:s', time() );
//datetime 클래스 사용법 익혀놓기 (검색해서 공부 dateinterval도 같이 )
$stmt->bindParam(':section',$section);
$stmt->bindParam(':writer',$id);
$stmt->bindParam(':description',$_POST['comment']);
$stmt->bindParam(':upload_times',$times);
$stmt->execute();

//웹서버의 디렉토리에 이미지파일저장하기
if (move_uploaded_file($_FILES['upload_pic']['tmp_name'], $uploaddir)) {
     header("Location:profile.php?nickname=".$_SESSION['nickname']);
} else {
  switch ($_FILES['userfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
            throw new RuntimeException('Exceeded filesize limit in INI.');
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit in FORM.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
}

?>

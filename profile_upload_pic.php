<?php
// phpinfo();
// exit;

session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
ini_set("display_errors", "1");
//경로를 변수에 담기
$uploaddir= "user/".$_SESSION['email']."/profile/".basename($_FILES['userfile']['name']);
//변수로 데이터베이스에 경로를 저장하기
$sql="UPDATE user SET photosmall='".$uploaddir."' WHERE email='".$_SESSION['email']."'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
//웹서버의 디렉토리에 이미지파일저장하기
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir)) {
     echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
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

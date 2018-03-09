<?php
session_start();
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql="SELECT *FROM user WHERE email='".$_POST['email']."'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row)//중복된 양식기입으로 가입실패
{
  $_SESSION['error']=1;
  $_SESSION['name']=$_POST['name'];   //입력양식에 기존에 값이 남아있게 함.
  $_SESSION['email']=$_POST['email']; //입력양식에 기존에 값이 남아있게 함.
  $_SESSION['error_message']='경고 : 중복된 아이디입니다';
  header("Location:signup.php");
}
else{//새로운 php파일을 만들어서 그곳에 사용자의 게시물 양식에 들어갈 자료를 구조화해서 추가 시키는 작업을 한다.
  $sql="INSERT INTO user (name,password,email) VALUES (:name,:password,:email)";
  $stmt=$dbh->prepare($sql);
  //이름과 이메일 데이터 필터링
  $name=htmlentities($_POST['name'],ENT_QUOTES,'UTF-8');//필터링

  $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) ; //필터링
  //$email=filter_var($email,FILTER_VALIDATE_EMAIL);//필터링

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//비밀번호 해쉬화

  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':password',$password);
  $stmt->bindParam(':email',$email);
  $stmt->execute();

//팔로잉하고 있는 다른사람들의 계정TABLE

//나를 팔로잉하고 있는 사람들의 수 TABLE
  session_destroy();

  //웹서버에 계정의 정보를 이용하여 profile 과 upload 과 talk 폴더를 만들어준다.
  // Q.mkdir 인수안에서 php문을 이용하려면?
  $root="user/".$_POST['email']."/profile";
  mkdir($root,0700,true);
  $root="user/".$_POST['email']."/talk";
  mkdir($root,0700,true);
  $root="user/".$_POST['email']."/upload";
  mkdir($root,0700,true);
  header("Location:login.php");
}



 ?>

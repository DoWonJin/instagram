<?php
session_start();
//세션에 이메일정보가 등록되있지 않으면 로그인페이지로 돌아간다.
if(!isset($_SESSION['email'])){
  header("Location:signup.php");
}
//다른사용자가 접속했을 때, $otheruser의 값을 명시한다.
$otheruser=false;
if($_SESSION['nickname']!=$_GET['nickname']){
  $otheruser =true;
}
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <link rel="stylesheet" href="profile.css">
  <title>INSTAGRAM</title>
</head>
<body>

  <header>
    <div class="out">
      <a href="instagram.php"><div class="home"></div></a>
      <div class="search">
        <input type="text" name="" value="" placeholder="search" size="27.3">
      </div>
      <div class="personal">
      <?php
      $sql="SELECT nickname FROM user WHERE email='".$_SESSION['email']."' ";
      $result=$dbh->prepare($sql);
      $result->execute();
      $row=$result->fetch(PDO::FETCH_ASSOC);
       $url2="profile.php?nickname=".$row['nickname'];

      $link = array(
        'direc'=>"https://www.instagram.com/explore/",
        'heart_grp'=>"https://www.instagram.com/",
        'account'=> $url2
       );
        foreach ($link as $key => $value) {
          echo "<a class={$key} href={$value}></a>";
        }
         ?>
         <form enctype="multipart/form-data" action="post_upload_pic.php" method="POST">
               <label for="post_upload"><?php
// 다른사용자의 프로필열람일 때, 이렇게 가려주는거 맞나?
                if(!$otheruser){echo "사진업로드";}?></label>
               <input name="upload_pic" id="post_upload" type="file" onchange="this.form.submit()" style="display:none;"/>
               <input type="text" name="comment" >
         </form>
      </div>
    </div>
  </header>

  <article>
    <div class="profile_info">
        <!-- 사진 -->
      <div class="profile_pic1">
        <form enctype="multipart/form-data" action="profile_upload_pic.php" method="POST">
              <label for="file-input">
                  <img class="profile_pic2" src="<?php
                  //프로필사진 업로드하기
                      $sql="SELECT *FROM user WHERE nickname='".$_GET['nickname']."'";
                      $stmt = $dbh->prepare($sql);
                      $stmt->execute();
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      echo $row["photosmall"];
                        ?>"
                   width="150px" height="150px">
              </label>
              <input name="userfile" id="file-input" type="file" onchange="this.form.submit()" style="display:none;"/>
        </form>
      </div>
        <!-- 닉네임,톱니바퀴,프로필 편집 -->
        <div class="profile">
            <div class="profile_1">
              <!-- h1이 적용이 안되고 있음... -->
              <div><?php echo "<h1>".$row['nickname']."</h1>";
             ?>

             <!-- 팔로우버튼과 팔로워버튼 -->
             <!-- ★★★팔로우를 할 때, name1과 name2를 묶어서 unique key로 설정한다 -->
             <form class="" action="follow.php" method="post">
               <?php
               //다른사용자면 보이지 않기
               if($otheruser){
                 echo "<button type='submit' name='follow'>follow</button>";
               }
                 ?>
                <input type="hidden" name="like_man" value="<?=$_GET['nickname']?>">
             </form>
             <form class="" action="follow_delete.php" method="post">
               <?php
               if($otheruser){
                 echo "<button type='submit' name='unfollow'>unfollow</button>";
               }
                 ?>
                <input type="hidden" name="like_man" value="<?=$_GET['nickname']?>">
             </form>



             <!-- <button id='demo' onclick="myFunction()">팔로우</button>
             <script>
            function myFunction() {
              if(document.getElementById("demo").innerHTML == "팔로우")
                {document.getElementById("demo").innerHTML = "팔로잉";
                <?php
                // $sql = "INSERT INTO followTBL (name1,name2) VALUES(:name1,:name2)";
                // $stmt = $dbh->prepare($sql);
                // $stmt->bindParam(':name1',$_SESSION['nickname']);
                // $stmt->bindParam(':name2',$_GET['nickname']);
                // $stmt->execute();
                //
                ?>
              }
              else
              {
                document.getElementById("demo").innerHTML = "팔로우";

              }

            }
            </script> -->
           </div>

              <?php
              if(!$otheruser){
                //로그인 한 사용자의 프로필정보에서만 보여지도록 만듬.
                  echo "<div><input type='button' name='' value='프로필편집'></div>
                  <input type='button' class='settings' name='' value=''>
                   <div>
                   </div>
                  </button>
                  <form class='' action='logout.php' method='post'>
                   <input type='submit' name='logout' value='logout'>
                  </form>";
              }
               ?>
            </div>
            <div class="">
              <?php
                            //현재 프로필주인이 올린 게시글의 수 구하기
              $sql = "SELECT count(*)
              FROM posts P JOIN user U
              ON   P.user_id=U.id
              WHERE U.nickname='".$_GET['nickname']."'";
              $result = $dbh->prepare($sql);
              $result->execute();
              $number_of_rows = $result->fetchColumn();
              $num=$number_of_rows;
              echo "<span>게시물 {$num}</span>";

              // 팔로워의 수 구하기
              $sql = "SELECT count(*)
              FROM followTBL
              WHERE name2='".$_GET['nickname']."'";
              $res = $dbh->prepare($sql);
              $res->execute();
              $row = $res->fetchColumn();
              echo "<form action='follower_list.php' target='_blank' method='post'>
                <input type='submit' value='팔로워 {$row}'>
                <input type='hidden' name='nickname' value='".$_GET['nickname']."'>
              </form>";

              // 팔로우의 수 구하기
              $sql = "SELECT count(*)
              FROM followTBL
              WHERE name1='".$_GET['nickname']."'";
              $res = $dbh->prepare($sql);
              $res->execute();
              $row = $res->fetchColumn();
              echo "<form action='follow_list.php' target='_blank' method='post'>
                <input type='submit' value='팔로우 {$row}'>
                <input type='hidden' name='nickname' value='".$_GET['nickname']."'>
              </form>";
              ?>

            </div>
            <!-- Fullname -->
            <div class="">
              <span>이름</span>
              <span><?php $sql="SELECT name FROM user WHERE nickname='".$_GET['nickname']."'";
              $result = $dbh->prepare($sql);
              $result->execute();
              $row = $result->fetch(PDO::FETCH_ASSOC);
              echo $row['name']; ?></span>
              <div>자기소개</div>
              <div>홈페이지</div>
            </div>
        </div>
    </div>

    <section class="navi">
      <span>게시물</span>
      <span>저장됨</span>
    </section>
    <section class="pic_group">
      <?php
      $sql = "SELECT p.photoupload
         FROM posts P
        JOIN user U
        ON P.user_id=U.id
         WHERE U.nickname='".$_GET['nickname']."' ORDER BY time  DESC";
      $result = $dbh->prepare($sql);
      $result->execute();
      for($i=0;$i<$num;$i++)
      {
        $row = $result->fetch(PDO::FETCH_ASSOC);//백그라운드이미지가 비율이 맞지 않음.....;;
        echo "<div style='background:url({$row['photoupload']});background-size:cover;background-repeat: no-repeat;'></div>";
        //background -p osition :center로 잡기
      }

       ?>
    </section>
  </article>
</body>
</html>

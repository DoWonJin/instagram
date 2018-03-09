<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location:login.php");
}
$dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql="SELECT * FROM user WHERE email='".$_SESSION['email']."'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['nickname']=$row['nickname'];//nickname 정보를 session에 저장해놓고 profile.php로 건네주기
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <link rel="stylesheet" href="instagram.css">
  <title>INSTAGRAM</title>
</head>
<body>

  <header>
    <div class="out">
      <div class="home"></div>
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
      </div>
    </div>
  </header>

  <article>
    <?php
    //나와 내가 팔로우한 사람들의 userTBL 의 id를 구하기
    $sql = "SELECT id FROM posts
            WHERE user_id IN (SELECT U.id
            FROM user U
            JOIN followTBL F
            ON U.nickname = F.name2 AND F.name1='".$_SESSION['nickname']."' OR U.nickname ='".$_SESSION['nickname']."')
            ORDER BY time DESC
            ";
            $result = $dbh->prepare($sql);
            $result->execute();
            // 팔로우한 사람들의 게시물만 보여지도록 수정할 것. PostTBL과 followTBL의 결합으로 id값


      while($row = $result->fetch(PDO::FETCH_ASSOC))
      {  ?>
        <div class="news_<?php ?>">
          <section class="cotents">
            <div class="info">
              <div class="photo_small">
                <a href="<?php
                $sql="SELECT U.nickname
                 FROM posts p
                  INNER JOIN user U
                    ON P.user_id=U.id
                    WHERE P.id='".$row['id']."'
                    ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $nick = $stmt->fetch(PDO::FETCH_ASSOC);
                $url="profile.php?nickname=".$nick["nickname"];
                echo $url;
                ?>" style="width: 30px;height:30px;">
                  <img src=
                  <?php
                  $sql="SELECT P.id, P.photoupload,P.location,U.name,U.email,U.photosmall
                   FROM posts p
                    INNER JOIN user U
                      ON P.user_id=U.id
                    WHERE P.id='".$row['id']."'
                      ORDER BY P.time DESC
                      ";
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute();
                  $photo = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $photo["photosmall"];
                   ?>
                   width="32px" height="32px"></a>
              </div>
              <div class="person">
                <div class="id">
                  <a href="<?=$url?>"><?= $photo["name"];
                   ?></a>
                </div>
                <div class="location">
                  <a href="#"><?= $photo["location"] ?></a>
                </div>
              </div>

            </div>
            <div class="photo_upload">
              <img src=<?= $photo["photoupload"] ?> alt="" width="100%">
            </div>
            <div style="padding-left:10px;">
              <div class="middle">
                  <div class="heart_1">
                    <a href="#"></a>
                  </div>
                  <div class="talk1">
                    <a href="#"></a>
                  </div>
                  <div class="save">
                    <a href="#"></a>
                  </div>
                  <?php if($photo["email"]==$_SESSION['email']){?>
                    <div class='delete'>
                      <form class='' action='photoupload_delete_process.php' method='post'>
                        <input type='hidden' name='root' value="<?php echo $photo["photoupload"];?>.">
                        <input type='submit' name='delete' value='delete'>
                      </form>
                    </div>
                  <?php } ?>

              </div>
              <div class="like">
                <b>157likes</b>
              </div>
              <div class="talk2"><!-- 댓글모음 -->
                <ul class="lx">
                  <?php
                  //talk.section은 게시글의 고유번호
                  //user.nickname 해당 댓글을 작성했을떄 로그인되있는 계정
                  //talk.description 은 작성내용
                  $sql="SELECT U.nickname, T.description,T.time,T.id
                  FROM talk T
                  JOIN user U
                  ON T.writer=U.id
                  WHERE T.section =42
                  ORDER BY T.time";
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                  {
                    echo '<li><a href="">'.$row['nickname'].'</a><a href="">'.$row['description'].'</a></li>';
                    echo "<form class='' action='delete_comment.php' method='post'>
                         <input type='hidden' name='comment_id' value='".$row['id']."'>
                         <input type='submit' name='' value='삭제'>
                       </form>";
                  }

                   ?>

                </ul>
              </div>
            </div>
            <!-- 댓글입력 -->
            <div class="comment">
              <form class="" action="comment_process.php" method="post">
                <textarea name="comment" rows="1" cols="80"></textarea>
                <button type="submit" name="button" value=''>제출</button>
                <input type="hidden" name="id" value="
                <?php   //댓글 입력시간도 추가할것.
                $sql="SELECT id
                 FROM user
                  WHERE email='".$_SESSION['email']."'";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo $row['id'];
                ?>
                ">
                <!-- 게시글의 고유번호를 전달 -->
                <input type="hidden" name="section" value='
                <?php
                $sql="SELECT P.id AS postnum ,U.id
                 FROM posts p
                  INNER JOIN user U
                    ON P.user_id=U.id
                    ORDER BY P.time DESC
                    ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                  for($i=0;$i<=$num;$i++){      //질문 드리기
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  }
                echo $row['postnum'];
                ?>
                '>
              </form>
            </div>
          </section>
        </div>
<?php } ?> <!-- for 반복문 종료 -->

  </article>

  <section class="navi">
    <div class="tx">
      <div class="mine">
        <div class="photo_small">
          <a href="<?php
           echo $url2;
            ?>" style="width: 35px;height:35px;">
            <img src="<?php
            $sql="SELECT *FROM user WHERE email='".$_SESSION['email']."'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row["photosmall"];
              ?>" width="40px" height="40px">
          </a>
        </div>
        <div class="person_navi">
          <div class="NickName">
            <a href="<?php echo $url2; ?>"><b><?php
              $sql="SELECT * FROM user WHERE email='".$_SESSION['email']."'";
              $stmt = $dbh->prepare($sql);
              $stmt->execute();
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              echo $row['nickname'];
              $_SESSION['nickname']=$row['nickname'];//nickname 정보를 session에 저장해놓고 profile.php로 건네주기
             ?></b></a>
          </div>
          <div class="Name">
            <a href="<?php echo $url2; ?>"><?php echo $row['name'] ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="story">
      <p>Stories</p>
      <small>Stories from people you follow will show up here.</small>
    </div>
    <footer>
      <ul>
      <?php
        $li=array('About us','Support','Blog','Press','API','Jobs','Privacy','Terms','Directory','Language');
        for($n=0;$n<count($li);$n++){
          echo '<li>'.$li[$n].'</li>';
        }
       ?>
     </ul>
      <p>@2017 INSTAGRAM</p>
    </footer>
  </section>

  <div class="download">
    <div class="tc">
      <div class="pic2"></div>
      <div class="explain">
        <p>Experiencce the best version of<br> Instagram by getting the app.</p>
      </div>
      <div class="logo">
        <?php
          $logo = array('micro','google','apple');
          for($i=0;$i<count($logo);$i++)
          {
            echo '<div class='.$logo[$i].'></div>';
          }
         ?>
      </div>
    </div>

  </div>




</body>
</html>

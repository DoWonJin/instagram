<?php
session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="login.css">
    <style media="screen">

    </style>

  </head>
  <body>
    <div class="top">
      <a href="https://www.microsoft.com/en-us/store/apps/instagram/9nblggh5l9xt" target="_blank">
        <p>
          <b>Instagram</b><br><b><small>Find it for free on the Window Store.</small></b>
        </p>
      </a>
      <a href="https://www.microsoft.com/en-us/store/apps/instagram/9nblggh5l9xt">
        <input class="get" id="butt" type="button" value="GET"></a>

    </div>
    <article class="main">
      <div class="pic"></div>
      <div class="enter">
        <div class="sign_up">
          <div>
              <h1 style="text-align:center;">Instagram</h1>
            <form action="login_process.php" method="post">
                  <div><input type="text" name="email" value="<?php
                  if(isset($_SESSION['email_error'])||isset($_SESSION['password_error']))
                  {
                    echo $_SESSION['email'];
                  }
                    ?>" placeholder="Mobile Number or Email"></div>
                  <div><input type="password" name="pw" placeholder="Password"></div>
                  <button type="submit" name="button">
                    로그인
                  </button>
                  <?php
                  if(isset($_SESSION['email_error'])||isset($_SESSION['password_error'])){
                    if($_SESSION['email_error']){
                      echo '<div style="color:red">'.$_SESSION['email_error_message'].'</div>';
                      session_unset('email_error_message');
                      session_unset('password_error_message');
                    }
                    else{
                      echo '<div style="color:red">'.$_SESSION['password_error_message'].'</div>';
                      session_unset('error_message');
                      session_unset('email_error_message');
                    }
                  }?>
              </span>
            </form>
            <div class="lost_account">
              <a href="">Did you lost your Password?</a>
            </div>
          </div>

        </div>
        <div class="app">
          <div>Get the app</div>
          <div>
            <a href="https://itunes.apple.com/app/instagram/id389801252?pt=428156&ct=igweb.signupPage.badge&mt=8">
            <img src="https://www.instagram.com/static/images/appstore-install-badges/badge_ios_english-en.png/4b70f6fae447.png" width="100px" alt="">
          </a>
          </div>
          <div>
            <a href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=utm_source%3Dinstagramweb%26utm_campaign%3DsignupPage%26utm_medium%3Dbadge">
              <img src="https://www.instagram.com/static/images/appstore-install-badges/badge_android_english-en.png/f06b908907d5.png" width="100px">
            </a>
          </div>
          <div>
            <a href="https://www.microsoft.com/en-us/store/apps/instagram/9nblggh5l9xt">
              <img src="https://www.instagram.com/static/images/appstore-install-badges/badge_microsoft_english-en.png/f55c258e826e.png" width="100px">
            </a>
          </div>
        </div>
      </div>

    </article>
    <footer class="below">
      <ul>
        <li><a href="">ABOUT US</a></li>
        <li><a href="">SUPPORT</a></li>
        <li><a href="">BLOG</a></li>
        <li><a href="">PRESS</a></li>
        <li><a href="">API</a></li>
        <li><a href="">JOBS</a></li>
        <li><a href="">PRIVACY</a></li>
        <li><a href="">TERMS</a></li>
        <li><a href="">DIRECTORY</a></li>
        <li><a href="">LANGUAGE</a></li>
      </ul>
      <span>@2017 INSTAGRAM</span>
    </footer>
  </body>
</html>

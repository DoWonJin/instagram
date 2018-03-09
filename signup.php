<?php
session_start();
if(isset($_SESSION['email'])){
  header("Location:instagram.php");
}
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
      <a href="https://www.microsoft.com/en-us/store/apps/instagram/9nblggh5l9xt" target="_blank">  <!--p가 a를 감싸지 못함-->

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
            <form action="login_by_facebook.html" method="post">
              <h2>Sign up to see photos and videos from your friends.</h2>
              <span class="facebook">
                <button type="button" name="button">
                  <span class="facebook_img"></span>
                  Log in with Facebook
                </button>
                <div><h5>OR</h5></div>
            </form>
            <form action="signup_process.php" method="post">
                  <div><input type="text" name="email" value="<?php
                  if(isset($_SESSION['error']))
                  {
                    echo $_SESSION['email'];
                  }
                  ?>" placeholder="email"></div>
                  <!-- <div><input type="text" name="Fullname" placeholder="Fullname"></div> -->

                  <div><input type="text" name="name" value="<?php
                  if(isset($_SESSION['error']))
                  {
                    echo $_SESSION['name'];
                  }
                  ?>"
                     placeholder="Username"></div>(선택)
                  <div><input type="password" name="password" placeholder="Password"></div>
                  <button type="submit" name="button">
                    Sign up
                  </button>
                  <?php
                  if(isset($_SESSION['error'])){
                    echo '<div style="color:red">'.$_SESSION['error_message'].'</div>';
                    session_destroy();                   ;
                  }  ?>
                  <div>By signing up,you agree to our Terms & Privacy Policy</div>
              </span>
            </form>
          </div>
        </div>
        <div class="log_in">
          Have an account?  <a href="login.php">Log in</a>
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

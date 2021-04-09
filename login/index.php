<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" type="image/ico" href="../favicon.ico">
    <link rel = "stylesheet" type = "text/css" href = "../css/fontawesome/css/all.min.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class = "container">
      <div class = "header">
        <img src = "../img/logo.ico" style = "width: 100px; height: 100px;">
        <h1>login</h1>
      </div>
      <div class = "main">
        <form class="login-form" action="" method="POST" autocomplete = "off">
          <div class="input-username">
            <div class = "input-invalid" id = "username" style = "color: #fff; text-transform: uppercase; margin-bottom: 10px; font-weight: 400;"></div>
            <span>
              <i class = "fas fa-user"></i>
              <input type = "text" placeholder = "Username" name = "username">
            </span>
          </div>
          <div class = "input-password">
            <div class = "input-invalid" id = "password" style = "color: #fff; text-transform: uppercase; margin-bottom: 10px;"></div>
            <span>
              <i class = "fas fa-lock"></i>
              <input type = "password" placeholder = "Password" name = "password"><br>
              <span class = "password"><a href = "#">Forgot password?</a></span><br><br>
            </span>
          </div>
          <input type = "submit" class = "btn" value = "login">
        </form>
      </div>
    </div>

    <footer class = "login-footer">
      <p style = "float: left; padding-left: 10px;">University of the Philippines - Baguio Library Inventory System</p>
      <p style = "float: right; padding-right: 10px;">For news and related events visit:
        <a href = "https://www.facebook.com/OfficialUPB"><i class="fab fa-facebook-f"></i></a>
        <a href = "https://web.upb.edu.ph/"><i class="fas fa-globe"></i></a>
        <a href = "https://www.youtube.com/channel/UC1XJ8yRNRuDHmhJXtsLIB_g"><i class="fab fa-youtube"></i></a>
      </p>
    </footer>

    <script type = "text/javascript" src = "verify.js"></script>
    <script type = "text/javascript">
        $(".input-invalid").hide();
    </script>
  </body>
</html>

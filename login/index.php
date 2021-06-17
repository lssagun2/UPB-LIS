<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" type="image/ico" href="../favicon.ico">
    <link rel = "stylesheet" type = "text/css" href = "../css/fontawesome/css/all.min.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
    <link rel = "stylesheet" href ="../css/animation-login.css">
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
              <input type = "password" placeholder = "Password" name = "password" id="password-field"><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style = "z-index: 10; position: relative; margin-left: -25px; margin-right: 5px;"></span>
            </span>
          </div>
          <input type = "submit" class = "btn" value = "login">
        </form>
      </div>
    </div>

    <footer class = "login-footer">
      <p style = "float: left; padding-left: 10px;">University of the Philippines - Baguio Library Inventory System</p>
      <p style = "position: fixed; padding-left: 45%; padding-right: 25%">
        &copy; <a href = "https://www.facebook.com/adrieeeeeeeee" target = "_blank" style = "color: #fff;">Aniban</a> |
        <a href = "https://www.facebook.com/tj.almonia" target = "_blank" style = "color: #fff;">Almonia</a> |
        <a href = "https://www.facebook.com/chrlscrdl" target = "_blank" style = "color: #fff;">Cordial</a> |
        <a href = "https://www.facebook.com/gisselle.derije/" target = "_blank" style = "color: #fff;">Derije</a> |
        <a href = "https://www.facebook.com/leandrei.sagun" target = "_blank" style = "color: #fff;">Sagun</a>
      </p>
      <p style = "float: right; padding-right: 10px;">For news and related events visit:
        <a href = "https://www.facebook.com/upbaguiolibrary" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href = "http://mainlib.upb.edu.ph/" target="_blank"><i class="fas fa-globe"></i></a>
        <a href = "https://www.youtube.com/channel/UCgbOw9h1IXDnqH5SLc_nwFQ" target="_blank"><i class="fab fa-youtube"></i></a>
      </p>
    </footer>

    <script type = "text/javascript" src = "verify.js"></script>
    <script type = "text/javascript">
        $(".input-invalid").hide();
    </script>
    <script type = "text/javascript">
      $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    </script>
  </body>
</html>

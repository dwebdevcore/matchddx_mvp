<?php
session_start();
include_once("auth.php");
is_user_log();
?>

<!doctype html>
<html>
  <head>
    <title>Match MG DDX</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="popup.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="js/ajax.js"></script>
  </head>
  <body>
  <div class="top-header">
    <div class="title">
      DDX Platform
    </div>
    <div class="nav-container">
    </div>
     <div class="logo-wrap">
        <div class="match-logo">
          <img class="logo-img" src="img/match-logo.png" height="25px">
        </div>
        <div id="logout-2">
          <form method="post" action="" id="logout_form">
          </form>
        </div>
      </div>
  </div>
  <div id="wrapper_register">
    <form method="post" action="" id="register_form" enctype="multipart/form-data">
      <h1>Welcome. Please register on:</h1>
      <input type="text" name="name" placeholder="Username" required>
        <input type="text" name="reg_email" placeholder="Email" required>
      <input type="password" name="pass" placeholder="Password" required>
      <div>
        <label for="">Image</label>
        <input type="file"  name="image" class="f_image"  placeholder="Image">
          <img id="blah" src="#" style="display: none;" alt="your image" />
      </div>
      <div>
        <label for="">Role</label>
        <select name="role" id="">
          <option value="1">external agency</option>
          <option value="2">internal advertiser</option>
        </select>
      </div>
      <input type="submit" name="submit_register" value="Register">
        <a href="/index.php">Sign Up</a>
      <p><font style="color:red;"><?php echo $error;?></font></p>
    </form>

      <div class="popup_thx">
          <div class="popup_thx_content">
             <span>Thanks for register!</span>
          </div>
      </div>

  </div>


</body>
</html>
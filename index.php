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
<p>
<div id="wrapper">

<?php
if(!isset($_SESSION['user_id'])){
 ?>
 <form method="post" action="" id="login_form">
    <h1>Welcome. Please log in:</h1>
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="pass" placeholder="Password">
    <div>
      <input type="submit" name="submit_pass" value="Login">
      <a href="/recovery.php">Forgot password</a>
      <a href="/registration.php">Registration</a>

    </div>
    <p><font style="color:red;"><?php echo $error;?></font></p>
 </form>
 <?php	
}
?>

</div>
</body>
</html>
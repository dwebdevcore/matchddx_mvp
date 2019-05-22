<?php session_start();
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
<p>

<div id="wrapper_register">
	<form method="post" action="" id="recovery_form" enctype="multipart/form-data">
		<h1>Please enter your email. </h1>
		<input type="email" name="email" class="email_cl" placeholder="Email" required>
		<input type="submit" name="submit_recovery" value="Recover">
		<a href="/index.php">Back</a>
	</form>


        <div class="popup_thx">
            <div class="popup_thx_content">
                <span>Thanks for sign up!</span>
            </div>
        </div>

</div>

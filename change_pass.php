<?php session_start();
include_once("auth.php"); ?>
<?php if(!$_POST['hash']){
	is_user_logged();
} ?>
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
		<form method="post" action="" id="change_psd_form" enctype="multipart/form-data">
		<h1>Please enter your new password. </h1>
		<input type="password" name="new_psd" class="new_pass" placeholder="new password" required>
			<input type="hidden" name="hash" class="hash" value="<?php echo $_POST['hash'] ?>">
		<input type="submit" value="Change password">
	</form>
</div>
<div class="popup_thx">
	<div class="popup_thx_content">
		<span>Password successfully changed</span>
	</div>
</div>


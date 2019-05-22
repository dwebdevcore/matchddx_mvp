<?php
session_start();
include_once("auth.php");

is_user_logged();
?>

<html>
<head>
    <title>Match MG DDX</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="top-header">
   <div class="title">
    DDX Platform


</div>
  <div class="nav-container">
   <div class="nav-inactive"><a href="segment.php">Segment Details</a></div>
  <div class="nav-active">Performance Analysis</div>
   <div class="nav-inactive"><a href="plan.php">Planning</a></div>


  </div>
   <div class="logo-wrap">
   <div class="match-logo"> 
   <img class="logo-img" src="img/match-logo.png" height="25px">
  </div>
  <div id="logout-2">
  <form method="post" action="" id="logout_form">
  <input type="submit" class="link" name="page_logout" value="LOGOUT">
 </form>
</div>
</div>
 </div>
<p>
  <div>
       <script type='text/javascript' src='https://tableau.matchmg.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1016px; height: 991px;'><object class='tableauViz' width='100%' height='991' style='display:none;'><param name='host_url' value='https%3A%2F%2Ftableau.matchmg.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='AutoDash&#47;Story1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showAppBanner' value='false' /><param name='filter' value='iframeSizedToWindow=true' /></object></div>
    </div>    
</body>
</html>


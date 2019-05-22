<?php
session_start();
include_once("auth.php");

is_user_logged();
?>

<!doctype html>
<html>
  <head>

  <title>Match MG DDX</title>
    <link rel="stylesheet" href="style.css">

   <script src="js/Chart.js"></script>

    <script type="text/javascript">
    function calc() {
    var select1 = document.getElementById("segment_select");
    var item = select1.options[select1.selectedIndex];
    var select1_control = 10;

    var var1 = item.getAttribute('cur1');
    var var2 = item.getAttribute('cur2');
    var var3 = item.getAttribute('cur3');
    var var4 = item.getAttribute('R1');
    var var5 = item.getAttribute('R2');
    var var6 = item.getAttribute('R3');
    var var7 = item.getAttribute('E1');
    var var8 = item.getAttribute('E2');
    var var9 = item.getAttribute('E3');
    var var10 = item.getAttribute('PA1');
    var var11 = item.getAttribute('PA2');
    var var12 = item.getAttribute('PA3');


    document.getElementById("1.1a").innerHTML = var1;
    document.getElementById("1.2a").innerHTML = var2;
    document.getElementById("1.3a").innerHTML = var3;
    document.getElementById("1.1b").innerHTML = var4;
    document.getElementById("1.2b").innerHTML = var5;
    document.getElementById("1.3b").innerHTML = var6;
    document.getElementById("1.1c").innerHTML = var7;
	  document.getElementById("1.2c").innerHTML = var8;
    document.getElementById("1.3c").innerHTML = var9;
    document.getElementById("1.1d").innerHTML = var10;
	  document.getElementById("1.2d").innerHTML = var11;
    document.getElementById("1.3d").innerHTML = var12;
   }

  function model() {

    document.getElementById("2.1a").innerHTML = "120";
  	document.getElementById("2.2a").innerHTML = "105";
    document.getElementById("2.3a").innerHTML = "130";
    }
   </script>



  </head>

  <body>
  <div class="top-header">
   <div class="title">
  DDX Platform

</div>
  <div class="nav-container">
   <div class="nav-inactive"><a href="segment.php">Segment Details</a></div>
  <div class="nav-inactive"><a href="perf.php">Performance Analysis</a></div>
   <div class="nav-active">Planning</div>


  </div>
   <div class="logo-wrap">
   <div class="match-logo"> 
   <img class="logo-img" src="img/match-logo.png" height="25px">
  </div>
  <div id="logout">
  <form method="post" action="" id="logout_form">
  <input type="submit" class="link" name="page_logout" value="LOGOUT">
 </form>
</div>
</div>
 </div>
<p>
<div>
  <script type='text/javascript' src='https://tableau.matchmg.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1000px; height: 827px;'><object class='tableauViz' width='100%' height='827' style='display:none;'><param name='host_url' value='https%3A%2F%2Ftableau.matchmg.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='ScenarioPlanner&#47;Dashboard1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showAppBanner' value='false' /><param name='filter' value='iframeSizedToWindow=true' /></object></div>
</div>
</p>
	</body>	
  </html>

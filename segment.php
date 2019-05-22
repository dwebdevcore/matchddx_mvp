<?php
session_start();

include_once("auth.php");

is_user_logged();

?>
<!doctype html>
<html>
<head>
 <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


 <title>Match MG DDX</title>

 <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="popup.css">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

 <script src="js/Chart.js"></script>
 <script src="js/Chart.bundle.js"></script>
 <script src="js/utils.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="js/ajax.js"></script>

</head>

<body>
  <!-- png -->

  <div class="top-header">
   <div class="title">
    <!--<img src="img/hc.png" height="35px"/>--> DDX Platform

  </div>
  <div class="nav-container">
   <div class="nav-active">Segment Details</div>
   <div class="nav-inactive"><a href="perf.php">Performance Analysis</a></div>
   <div class="nav-inactive"><a href="plan.php">Planning</a></div>


 </div>
 <div class="logo-wrap">
   <div class="match-logo">
     <img class="logo-img" src="img/match-logo.png" height="25px">
   </div>
   <div id="logout">
    <form method="post" action="" id="logout_form">
        <button class="change_pass"> Change password</button>
        <input type="submit" class="link" name="page_logout" value="LOGOUT">
    </form>
  </div>
</div>
</div>
<p>

  <div id="body-wrap">
    <div id="wrapper">
      <div id="first" class="profile_image">
          <img src="<?php echo $DB->get_user_image($_SESSION['user_id']) ?>" alt="" style="border-radius: 50%;height: 65px;">
      </div>
      <div id="center">
       <div class="styled-select">
        Select JTBD: <br>

      <?php echo show_jtbd(); ?>
  
       
  </div>
</div>

<div id="center-2">
  <div id="summary" style="display:none;">
    <b>Segment Summary</b>
    <div id="sumdeets">
      Deets
    </div>
  </div>
</div>

</div>
</div>
</div>
<p>

  <div id="wrapper-3">
    <b>Reach & Engagement Index</b> <img src='img/questionicon.png' height='15px' data-toggle='tooltip' title="Reach indexes the reach of each channel to this audience against a selected baseline channel or channels (shown as 100). Engagement indexes against the performance KPIs set for each channel. Index >100 means outperforming planned channel-specific KPIs."/>
    <div class="bg2">
      <div id="bg-rail">
        <table id="mediatable"  style="display:none;"> 
          <tr>
            <tr>
              <th>Stage</th>
              <th>Channel</th>
              <th>Reach</th>
              <th>Eng.</th>
              <tr> 
                <td>Awareness</td>
                <td>Display</td>
                <td id="4.1c"></td>
                <td id="4.2c"></td>
              </tr>
              <tr>
               <td>Awareness</td>
               <td>Audio/I-radio</td>
               <td id="4.1d"></td>
               <td id="4.2d"></td>  
             </tr>
             <tr>
              <td>Consideration</td>
              <td>Experiential (PoS)</td>
              <td id="4.1f"></td>
              <td id="4.2f"></td>
            </tr> 
            <tr>
              <td>Consideration</td>
              <td>Online Video</td>
              <td id="4.1g"></td>
              <td id="4.2g"></td>
            </tr> 
            <tr>
             <td>Consideration</td>
             <td>Social</td>
             <td id="4.1h"></td>
             <td id="4.2h"></td>
           </tr> 
           <tr>
            <td>Consideration</td>
            <td><a onClick="showmodal();"">Native Content</a></td>
            <td id="4.1j"></td>
            <td id="4.2j"></td>
          </tr> 
          <tr>
            <td>Decision</td>
            <td>APIs/Assistant Apps</td>
            <td id="4.1k"></td>
            <td id="4.2k"></td>
          </tr> 
        </table>
      </div>
    </div>
    <br>
    <b>Shopper Index</b>
    <div class="bg2">
      <div id="bg-rail2">
        <table id="shoppertable" style="display:none;"">
          <tr>
            <td>Grocery</td>
            <td id="6.1a"></td>
          </tr>
          <tr>
            <td>Club</td>
            <td id="6.1b"></td>
          </tr> 
          <tr>
            <td>Amazon</td>
            <td id="6.1c"></td>
          </tr> 
          <tr>
            <td>Other e-comm</td>
            <td id="6.1d"></td>
          </tr> 
        </table>
      </div>  
    </div>
  </div>

  <b>Brands</b> <img src='img/questionicon.png' height='15px' data-toggle='tooltip' 
  title="The 'current' index shows this segments relationship to this brand where 100 is the average of all brands.

  The 'optimized' index shows the lift that our predicitive models assess is possible with optimized content."/>


  <div id="wrapper-2">
          <p></p>
          <div class="main_top_content">
            <b>Top Content</b><br>
            <div id="content-first" class="content-block">
              <div id="box1" class="fill">
                <img src="img/triangle-pattern.png">
                <div class="infill">
                 <div id="2.1b" align="left"> </div>
                 <div style="overflow: hidden;">
                   <div id="2.1c" style="height: 15px; width: 15px; float:left;display: flex; margin-right: 5px;"></div>
                   <div id="2.1a" style="font-size: 11px; color:white; display: flex;"> </div>
                 </div>
               </div>
             </div>
           </div>
           <div id="content-second" class="content-block">
            <div class="fill">
              <img src="img/card-2.png">
              <div class="infill">
               <div id="2.2b" align="left"> </div>
               <div style="overflow: hidden;">
                 <div id="2.2c" style="height: 15px; width: 15px; float:left;display: flex; margin-right: 5px;"></div>
                 <div id="2.2a" style="font-size: 11px; color:white; display: flex;"> </div>
               </div>
             </div>
           </div>
         </div>
         <div id="content-third" class="content-block">
          <div class="fill">
            <img src="img/green-rectangle.png">
            <div class="infill">
             <div id="2.3b" align="left"> </div>
             <div style="overflow: hidden;">
               <div id="2.3c" style="height: 15px; width: 15px; float:left;display: flex; margin-right: 5px;"></div>
               <div id="2.3a" style="font-size: 11px; color:white; display: flex;"> </div>
             </div>
           </div>
         </div>
       </div>

      <div id="content-fourth" class="content-block">
        <div id="bg-cloud" class="fill">
          <!--<img src="img/triangle-pattern.png">-->
          <!--<img src="img/cloud1.png" style="max-width: 100%; max-height: 100%; text-align: center;">-->
        </div>
      </div>


    </div>
    <p></p>
    <div id="brow-first"> 
     <b>Age</b>
     <div class="bg2">
      <div>

        <table id="agetable" style="display:none;">
          <tr>
            <td>23-38</td>
            <td id="3.1a"></td>
          </tr>
          <tr>
            <td>39-52</td>
            <td id="3.1b"></td>
          </tr>
          <tr>
            <td>53-57</td>
            <td id="3.1c"></td>
          </tr> 
          <tr>
            <td>58-71</td>
            <td id="3.1d"></td>
          </tr> 
          <tr>
            <td>72+</td>
            <td id="3.1e"></td>
          </tr> 
        </table>
      </div>
    </div> 
  </div>

  <div id="brow-second"> 
   <b>Gender</b> 
   <div class="bg2">

    
    <div id="male_div" style="display: none;"></div>
    <div id="female_div" style="display: none;"></div>

    <div id="chartcanvas"> 
    <canvas id="myChart" style="max-width: 180px; max-height: 180px;""></canvas>
  </div>

</div>
</div>

<div id="brow-third"> 
 <b>Details</b>
 <div class="bg2">
   <div>
    <table id="interests" style="display:none;">
      <tr>
        <td>Marital</td>
        <td id="5.1a"></td>
      </tr>
      <tr>
        <td>House Type</td>
        <td id="5.1b"></td>
      </tr>
      <tr>
        <td>HHI</td>
        <td id="5.1c"></td>
      </tr> 
      <tr>
        <td>Trade</td>
        <td id="5.1d"></td>
      </tr> 
      <tr>
        <td>Interests</td>
        <td id="5.1e"></td>
      </tr> 
    </table>
  </table>
</div>
</div> 
</div>
</div>
<p>

  <b>Propensity Distribution</b> <img src='img/questionicon.png' height='15px' data-toggle='tooltip' title="Propensity is the predicted likelihood to convert. Within deciles of predicted propensity to convert from lowest to highest, this chart shows the percentage of targetable consumers actively considering purchase, and the percentage of total consumers engaged by marketing. So for example; a .05 considertion means 5% of those considering purchase fall here, and a .1 engagement means that 10% of our marketing engagemet is with this consumers in the given band."/>
  <div class="bg2">
   <canvas id="canvas2" style="height: 200px; width:100%;"></canvas>
 </div>

 <div id="var_check" style="display: none;"></div>

<p></p>


</div>

<!--Modal-->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="close"><a onclick="hidemodal()">x</a></div>
    <table id="campaigns">
      <tr>
        <th>Campaign</th>
        <th>Segment(s)</th>
        <th>Relevance Type</th>
      </tr>
      <tr>
        <td>PGA</td>
        <td>Style & Service, Family & Function</td>
        <td>Focused: Present Brand at Cultural Event</td>
      </tr>
      <tr>
        <td><a href="#" onClick="showmodal2();">Major Promotion</a></td>
        <td>Style & Service, Family & Function</td>
        <td>Targeted: Recognize Major Life Event</td>
      </tr>
    </table>
  </div>

</div>

<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="close"><a onclick="hidemodal2()">x</a></div>
    <table id="documents">
      <tr>
        <th>Documentation</th>
        
      </tr>
      <tr>
        <td><a href="files/RoadAhead.pdf" target="_blank"">Project Brief</a></td>

      </tr>
      <tr>
        <td><a href="#">Digital Assets</a></td>

      </tr>
    </table>
  </div>

</div>

  <div class="popup_log">
      <div class="popup_log_content">
          <form action="#" id="test-form" method="post" class="save_password">
              <div class="popup_form_input">
                  <input type="password" name="old_password" placeholder="Password" required>
                  <input type="password" name="new_password" placeholder="New password" required>
                  <input type="password" name="conf_password" placeholder="Confirm new password" required>
                  <input type="submit" value="Save">
                  <button class="close_popup">Close</button>
              </div>
          </form>
      </div>
  </div>

</body>
</html>
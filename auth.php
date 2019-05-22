<?php 
require_once(__DIR__.'/class/conn.php');
$DB = new Connection(); //connect database


//sign up
if(isset($_POST['submit_pass']) && $_POST['pass'] && $_POST['login']){
	$login=$_POST['login'];
 	$pass=$_POST['pass'];

 	if($id = $DB->signUp($login,$pass)){
  		$_SESSION['user_id']=$id;
 	}
 	else{
  		$error="Incorrect Password";
 	}
}

//log out
if(isset($_POST['page_logout']) && isset($_SESSION['user_id'])){
 	unset($_SESSION['user_id']);
 	header("Location:".url()."/index.php");
	die();
}

//get current url
function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    ''
  );
}

// if user don't logged in system redirect to main page
function is_user_logged(){
  if(!isset($_SESSION['user_id'])){
    header("Location:".url()."/index.php");
    die();
  }
}
function is_user_log(){
  if(isset($_SESSION['user_id'])){
    header("Location:".url()."/segment.php");
    die();
  }
}

//show jtbd data
 function show_jtbd(){
  global $DB;

  $user_id = $_SESSION['user_id'];
  
  $html = '<select name="jtbd_select" class="jtbd_select" id="jtbd_select">
         <option avatar_img="<img class="gravitar" src="img/whitespace.png" style="border-radius: 50%; height="65px">
            (Select)
          </option>';
      foreach($DB->get_jtpd($user_id) as $jtpd){
        $html.='<option value="'.$jtpd['jtbd_id'].'">'.$jtpd['jtbd_name'].'</option>';
      }
  $html .='</select>
  <input type="hidden" class="user_id_class" value="'.$user_id.'">
  ';

  return $html;
}

?>
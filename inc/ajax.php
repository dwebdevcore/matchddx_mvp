<?php 

require_once '../auth.php';
global $DB;	


if($_POST['jtbd_id']){
	$html['jtbd'] = '';
	$html['brand'] = '';
	$html['age'] = '';
	$jtbd_id = $_POST['jtbd_id'];

	$brand_id = array();

	$dataJtbd = $DB->conn_sql("SELECT jtbd_seg_title,jtbd_seg_desc FROM jtbd WHERE [jtbd_id] = ".$jtbd_id)[0];

	//jtbd html
	$html['jtbd'] .= '
			<b>'.$dataJtbd['jtbd_seg_title'].'</b>
			<div id="sumdeets">'.$dataJtbd['jtbd_seg_desc'].'</div>';


	//brand html
	$dataBrand = $DB->conn_sql("SELECT * FROM brand WHERE [jtbd_id] = ".$jtbd_id);
	foreach($dataBrand as $brand){
		array_push($brand_id, $brand['brand_id']);
		$html['brand'] .= '
			<div id="bg-first" class="brand_class" data-brand="'.$brand['brand_id'].'">
			    <div class="bg" id="bg-1">
			      	<b>'.$brand['brand_name'].' 
				      	<a href="#" style="font-size:50%" class="hide_brand">(Hide)</a> 
				      	<a href="#" style="font-size:50%" class="show_brand">(Include)</a>
			      	</b>
			        <div id="brand1" style="display:none">use</div>
			      		<div id="wrapper-4">
			        		<div id="w4-1">CURRENT 
						        <div id="result">
						          <div id="1.1a">'.$brand['brand_current_score'].'</div>
						        </div>
			        		</div>
			        		<div class="rectangle-8"> </div>
			        		<div id="w4-2">OPTIMIZED
			          			<div id="result">
			            			<div id="1.1b"><img src="img/climb-copy.png" srcset="img/climb-copy@2x.png 2x,img/climb-copy@3x.png 3x" class="climb-copy" height="10">
			            				'.$brand['brand_optm_score'].'
			            			</div>
			            		</div>
			          		</div>
		    			</div>   
		      		</div>
		      	</div>
		    </div>
	    ';
	}

	//top content html
	$dataTopContent = $DB->conn_sql("SELECT * FROM topcontent WHERE [jtbd_id] = ".$jtbd_id);
	foreach($dataTopContent as $tcont){

		if($tcont['topcontent_date']=='1900-01-01') $tcont['topcontent_date']='';
		
		$html['top_content'] .='
			<div class="content-block">
	            <div id="box1" class="fill">
	              <img src="'.$tcont['topcontent_bg_url'].'" style="max-height: 100%;max-width: 100%">
	              <div class="infill">
	               <div id="2.1b" align="left">'.$tcont['topcontent_title'].'</div><br>
	               <div style="overflow: hidden;">
	                 <div id="2.1c" style="height: 15px; width: 15px; float:left;display: flex; margin-right: 5px;">
	                 	<img src="'.$tcont['topcontent_image_url'].'"></div>
	                 <div id="2.1a" style="font-size: 11px; color:white; display: flex;">'.$tcont['topcontent_kind'].' '.$tcont['topcontent_date'].'</div>
	               </div>
	             </div>
	           </div>
	        </div>
	    ';
	}


	//Age html
	$dataAge = $DB->conn_sql("SELECT * FROM age WHERE [jtbd_id] = ".$jtbd_id);
	$html['age'] = '
		<div>
		    <table id="agetable">
		        <tbody>';
					foreach($dataAge as $age){
						$html['age'] .= '
							<tr>
					            <td>'.$age['age_range'].'</td>
					            <td id="3.1a">'.$age['age_range_row_value'].'%</td>
					        </tr>
					    ';
					}	
	$html['age'].= '</tbody>
				</table>
			</div>';



	//Detals html
	$dataDetal = $DB->conn_sql("SELECT * FROM details WHERE [jtbd_id] = ".$jtbd_id);

	$html['detal'] = '
		<div>
		    <table id="interests">
		      	<tbody>';

	foreach($dataDetal as $detal){
		$html['detal'] .='
			<tr>
		        <td>'.$detal['detaild_row_kind'].'</td>
		        <td id="5.1a">'.$detal['details_row_value'].'</td>
	      	</tr>';
	}
	$html['detal'] .= '
				</tbody>
		    </table>
		</div>';

	/**
	 * Add Html Gender block
	 */


	//reachengindex html

	$numberBrand = count($brand_id);
	for($i=0;$i<$numberBrand;$i++){

		$sql = "SELECT * FROM reachengindex WHERE [brand_id] =".$brand_id[$i];

		foreach($DB->conn_sql($sql) as $data){

			$calc_index_e[$data['reacheng_index_channel']] += $data['reacheng_index_eng'];
			$calc_index_r[$data['reacheng_index_channel']] += $data['reacheng_index_reach'];
			$calc_index_s[$data['reacheng_index_channel']] = $data['reacheng_index_stage'];
		}	
	}
	
	$html['reach'] = '
		<table id="mediatable"> 
          	<tbody> 
          		<tr>
	      	   		<th>Stage</th>
	              	<th>Channel</th>
	              	<th>Reach</th>
	              	<th>Eng.</th>
              	</tr>';
          		foreach($calc_index_e as $key => $value){
	          		$html['reach'].='
		            <tr> 
		                <td>'.$calc_index_s[$key].'</td>
		                <td>'.$key.'</td>
		                <td id="4.1c">'.ceil($calc_index_r[$key]/$numberBrand).'</td>
		                <td id="4.2c">'.ceil($value/$numberBrand).'</td>
              		</tr>';
          		}
	    	$html['reach'] .='
	    	</tbody>
		</table>';
		



	//shope html
	for($i=0;$i<$numberBrand;$i++){

		$sql = "SELECT * FROM shopperindex WHERE [brand_id] =".$brand_id[$i];

		foreach($DB->conn_sql($sql) as $data){
			$dataShop[$data['shopper_index_row_kind']] += $data['shopper_index_row_vaue'];
		}	
	}	
	$html['shop'] = 
		'<table id="shoppertable">
  			<tbody>';
  				foreach($dataShop as $key => $shop){
	    			$html['shop'] .= '
			  			<tr>
				            <td>'.$key.'</td>
				            <td id="6.1a">'.round(($shop/$numberBrand)).'</td>
			          	</tr>';
	          	}
	    $html['shop'] .= '
        	</tbody>
        </table>';



   
    //graphic html

	for($i=0;$i<$numberBrand;$i++){

			$sql = "SELECT * FROM prospensitydistribution WHERE [brand_id] =".$brand_id[$i];

			foreach($DB->conn_sql($sql) as $data){
				$pros_dist_a[$data['pros_dist_range_value']] += $data['pros_dist_active_con_value'];
				$pros_dist_b[$data['pros_dist_range_value']] += $data['pros_dist_brand_eng_value'];
			}	
	}	


	$data_active = [];
	$data_eng = [];
	foreach ($pros_dist_a as $key => $value) {
		$data_active[] = round($value,2);
		$data_eng[] = round($pros_dist_b[$key],2);
		$label[] = round($key);
	}

	$html['p_active'] = $data_active;
	$html['p_brand'] = $data_eng;
	$html['p_range'] = $label;





	//gender html

	$male = [];
	$female = [];
	for($i=0;$i<$numberBrand;$i++){
		$sql = "SELECT * FROM gender WHERE [brand_id] =".$brand_id[$i];

		foreach($DB->conn_sql($sql) as $data){

			if($data['gender_type_id']==1){
				$male[] += $data['gender_value'];

			}else if($data['gender_type_id']==2){
				$female[] += $data['gender_value'];
			}
		}	
	}	

	$html['male'] = round(array_sum($male)/$numberBrand);
	$html['female'] = round(array_sum($female)/$numberBrand);


	// user profile


	exit(json_encode($html));
}



if($_POST['brand_id']){

	$brand_id = $_POST['brand_id'];
	$numberBrand = count($_POST['brand_id']);

	//reachengindex
	foreach($brand_id as $brand){
		$sql = "SELECT * FROM reachengindex WHERE [brand_id] = ".$brand;
		foreach($DB->conn_sql($sql) as $data){

			$calc_index_e[$data['reacheng_index_channel']] += $data['reacheng_index_eng'];
			$calc_index_r[$data['reacheng_index_channel']] += $data['reacheng_index_reach'];
			$calc_index_s[$data['reacheng_index_channel']] = $data['reacheng_index_stage'];
		}	
	}
	
	$html['reach'] = '
	<table id="mediatable"> 
      	<tbody> 
      		<tr>
      	   		<th>Stage</th>
              	<th>Channel</th>
              	<th>Reach</th>
              	<th>Eng.</th>
          	</tr>';
      		foreach($calc_index_e as $key => $value){
          		$html['reach'].='
	            <tr> 
	                <td>'.$calc_index_s[$key].'</td>
	                <td>'.$key.'</td>
	                <td id="4.1c">'.ceil($calc_index_r[$key]/$numberBrand).'</td>
	                <td id="4.2c">'.ceil($value/$numberBrand).'</td>
          		</tr>';
      		}
    	$html['reach'] .='
    	</tbody>
	</table>';


	//shope filter
	foreach($brand_id as $brand){

		$sql = "SELECT * FROM shopperindex WHERE [brand_id] =".$brand;

		foreach($DB->conn_sql($sql) as $data){
			$dataShop[$data['shopper_index_row_kind']] += $data['shopper_index_row_vaue'];
		}	
	}	

	$html['shop'] = 
		'<table id="shoppertable">
  			<tbody>';
  				foreach($dataShop as $key => $shop){
	    			$html['shop'] .= '
			  			<tr>
				            <td>'.$key.'</td>
				            <td id="6.1a">'.round(($shop/$numberBrand)).'</td>
			          	</tr>';
	          	}
	    $html['shop'] .= '
        	</tbody>
        </table>';


    //gender filter
	$male = [];
	$female = [];
	foreach($brand_id as $brand){
		$sql = "SELECT * FROM gender WHERE [brand_id] =".$brand;

		foreach($DB->conn_sql($sql) as $data){

			if($data['gender_type_id']==1){
				$male[] += $data['gender_value'];

			}else if($data['gender_type_id']==2){
				$female[] += $data['gender_value'];
			}
		}	
	}	



	$html['male'] = round(array_sum($male)/$numberBrand);
	$html['female'] = round(array_sum($female)/$numberBrand);

	//prospensitydistribution filter
	foreach($brand_id as $brand){

			$sql = "SELECT * FROM prospensitydistribution WHERE [brand_id] =".$brand;

			foreach($DB->conn_sql($sql) as $data){
				$pros_dist_a[$data['pros_dist_range_value']] += $data['pros_dist_active_con_value'];
				$pros_dist_b[$data['pros_dist_range_value']] += $data['pros_dist_brand_eng_value'];
			}	
	}	


	$data_active = [];
	$data_eng = [];
	
	foreach ($pros_dist_a as $key => $value) {

		$data_active[] = round($value,2);
		$data_eng[] = round($pros_dist_b[$key],2);
		$label[] = round($key);
	}
	
	$html['p_active'] = $data_active;
	$html['p_brand'] = $data_eng;
	$html['p_range'] = $label;

	exit(json_encode($html));
}



if($_POST['passval']){
	$old_pass = $_POST['passval'][0]['value'];
	$new_pass = $_POST['passval'][1]['value'];
	$user_id = $_POST['user_id'];

	$old_pass = md5($old_pass);
	$new_pass = md5($new_pass);

	$db_pass = $DB ->conn_sql('SELECT user_password FROM [user] where user_id ='.$user_id)[0]['user_password'];

	$html = '';
	if($old_pass == $db_pass){
		$res = $DB->do_query("UPDATE [user] SET user_password = '".$new_pass."' WHERE user_id=".$user_id);
		$html = '<p class="p_sus">Password updated successfully</p>';
	}else{
		$html .= '<p class="p_err">Old password incorrect</p>';
	}
	exit(json_encode($html));

}


if(isset($_POST['email'])){
	$sql = "SELECT user_hash FROM [user] WHERE user_email = '".$_POST['email']."'";
	$user_hash = $DB->conn_sql($sql)[0]['user_hash'];

	$recepient = $_POST['email'];

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$pagetitle = "Change Password";

	$text = "
	<form method=\"post\" action=\"http://".$_SERVER['SERVER_NAME']."/change_pass.php\" id=\"recovery_form\" enctype=\"multipart/form-data\">
		<input type=\"hidden\" name=\"hash\" class=\"email_cl\" value=\"".$user_hash."\" placeholder=\"Username\">
		If you want to change the password click on the 
		<input type=\"submit\" name=\"submit_recovery\" value=\"Reestablish\">
	</form>
	";

	//$text .= "<a href=\"http://".$_SERVER['SERVER_NAME']."/?hash=".$user_hash."\">link</a>";

	$result = mail($recepient, $pagetitle, $text, "Content-type: text/html; charset=\"utf-8\"\n From: $recepient");

	exit(json_encode($result));

}


//forgot password and changing
if(isset($_POST['new_psd'])){

	$psd = $_POST['new_psd'];
	$psd = md5($psd);

	$res = $DB->do_query("UPDATE [user] SET user_password = '".$psd."' WHERE user_hash='".$_POST['hash']."'");

	exit(json_encode($res));
}

//exit(json_encode(__DIR__));


//registration
if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['role']) && isset($_POST['reg_email'])){

	$user_name = $_POST['name'];
	$password = $_POST['pass'];
	$role = $_POST['role'];
	$email = $_POST['reg_email'];
	$new_dir =  str_replace('inc','',__DIR__);

	$uploaddir = $new_dir.'img/user_images';
	$file_name = uniqid().basename($_FILES['image']['name']);
	$tmp_name = $_FILES['image']['tmp_name'];
	$uploadfile = $uploaddir .'/'. $file_name;

	$res = $DB->registerUser($user_name,$password,$uploadfile,$role,$tmp_name,$file_name,$email);
	exit(json_encode($res));


}
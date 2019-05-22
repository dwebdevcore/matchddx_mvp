<?php 
class Connection{
	private $dsn = 'sqlsrv:Server=DESKTOP-JUFB3GF\INSTANCE2;Database=matchddx'; //server and database
	private $user = 'matchddxadmin'; //db user
	private $password = 'matchddx@admin123'; //db password
	private $conn; //db connection
	
	function __construct(){
		try {
		    $this->conn = new PDO($this->dsn, $this->user, $this->password); //create pdo connection
		    $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
		  	$this->conn->setAttribute( PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 1 );
		  	return $this->conn;
		} catch (PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}
	}

	//sign up
 	function signUp($login,$password){
 		$password = md5($password);
		$sql = "SELECT user_id,user_name,user_password FROM [user] WHERE [user_name] = '".$login."' 
				AND [user_password] LIKE '".$password."'";
		$getData = $this->conn->prepare($sql);  
		$getData->execute();
		$result = $getData->fetchAll(PDO::FETCH_ASSOC);
		return $result[0]['user_id'];
	}


	//register user
	function registerUser($user_name,$password,$image,$role,$tmp_name,$file_name,$email){
		try {

			$sql = "SELECT user_name,user_email FROM [user] WHERE [user_name] = '".$user_name."' or user_email ='".$email."'";
			$getData = $this->conn->prepare($sql);  
			$getData->execute();
			$result = $getData->fetchAll(PDO::FETCH_ASSOC);


			//if user_name no exists
			if(!$result){

				$hash = uniqid();
			    move_uploaded_file($tmp_name, $image);
			    $image = 'img/user_images/'.$file_name;
			    $password = md5($password);
				$statement = $this->conn->prepare("INSERT INTO [User](user_name, user_profile_image_url, user_type_id, user_password, user_email, user_hash) 
				VALUES (:user_name, :image, :role, :password, :email, :hash)");
				$statement->execute(
					array(
					    "user_name" => "$user_name",
					    "image" => "$image",
					    "role" => $role,
					    "password" => "$password",
						"email" => "$email",
						"hash" => "$hash"
					)
				);
				return $statement;
			}else{
				return 'Username or email alredy';
			}
		}catch(PDOException $e) {  
			die(print_r($e->getMessage()));  
		}  
	}


	//query function
	function conn_sql($query){
		$getData = $this->conn->prepare($query);  
		$getData->execute();  
		$result = $getData->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function do_query($sql){
		$getData = $this->conn->query($sql);
		return $getData->execute();
	}

	//get jtbd table
	function get_jtpd($user_id){
		$sql = "SELECT * FROM jtbd WHERE [user_id] = '".$user_id."'";
		return $this->conn_sql($sql);
	}


	//new code
	function  get_user_image($user_id){
		$html = $this->conn_sql("SELECT user_profile_image_url FROM [user] WHERE [user_id] = ".$user_id)[0]['user_profile_image_url'];
		return $html;
	}
}

 ?>
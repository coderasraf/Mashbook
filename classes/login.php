<?php

class Login{

	private $error = "";

	public function evaluate($data){

		$email     = addcslashes($data['email'], '/');
	$password  = addcslashes($_POST['password'], '/');

	$query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";

	$DB = new Database();
	$result = $DB->read($query);

	if ($result) {
		
		$row = $result[0];
		if ($password == $row['password']) {
			
			// Create session

			$_SESSION['mybook_userid'] = $row['userid'];

		}else{
			$this->error .= 'Not match email or password!'. '<br>';
		}
	}else{
		$this->error .= 'No user found!';
	}

	return $this->error;
	}


	public function check_login($id){

                if (is_numeric($id)) {

		$query = "SELECT * FROM users WHERE userid= '$id' LIMIT 1";
		$DB = new Database();
		$result = $DB->read($query);

		if($result){

			$user_data = $result[0];
                        return $user_data;
		}else{
        		header("Location:login.php");
                        die();
			
		}

	     }else{
                header("Location:login.php");
                die();
             }
        }
}

?>
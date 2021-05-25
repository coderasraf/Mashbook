<?php

class Signup{

	private $error = '';

	public function evaluate($data){

		foreach ($data as $key => $value) {

			if(empty($value))
			{
				$this->error = $this->error . $key . ' is empty.'.'<br>';
			}

			if($key == 'email'){
				if(!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $value)){

					$this->error = $this->error. 'Envalid e-mail address!' . '<br>';
				}
			}

			if($key == 'first_name'){
				if(is_numeric($value) || strstr($value, " ") ){

					$this->error = $this->error. 'First Name cant be number or any empty space!' . '<br>';
				}
			}

			if($key == 'last_name'){
				if(is_numeric($value) || strstr($value, " ")){

					$this->error = $this->error. 'Last Name cannot be number or any empty space!' . '<br>';
				}
			}

		}

		

		// Creating user
		if($this->error == "")
		{
			// No error
			$this->create_user($data);

		}
		else
		{
			return $this->error;
		}
	}

	public function create_user($data){

		$firstName = ucfirst($data['first_name']);
		$lastName  = ucfirst($data['last_name']);
		$gender    = $data['gender'];
		$email     = $data['email'];
		$password  = $data['password'];

		// creating user unique url address based their firsname and lastname
		$url_address= strtolower($firstName) .'.'. strtolower($lastName);
		$userid     = $this->create_userid();

		$query = "INSERT INTO users 
			(userid,first_name,last_name,gender,email,password,url_address) 
			VALUES 
			('$userid','$firstName','$lastName','$gender','$email','$password','$url_address')";

		$DB = new Database();
		$DB->save($query);
	}

	// Creating unique user id
	 private function create_userid(){

		$length = rand(4, 19);
		$number = '';
		for ($i=0; $i < $length ; $i++) { 
			$new_rand = rand(4, 9);
			$number = $number . $new_rand;
		}

		return $number;
	}
}
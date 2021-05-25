<?php

	
	class Post{

		private $error = '';

		// Creating post
		public function create_post($userid,$data, $files){

			if(!empty($data['post']) || !empty($files['image']['name']) || isset($data['is_profile_image']) || isset($data['is_cover_image'])){

				$my_image = '';
				$has_image = 0;
				$is_cover_image = 0;
				$is_profile_image = 0;

				if (isset($data['is_profile_image']) || isset($data['is_cover_image'])) {
					
					$my_image = $files;
					$has_image = 1;

					if (isset($data['is_profile_image'])) {
						$is_profile_image = 1;
					}

					if (isset($data['is_cover_image'])) {
						$is_cover_image = 1;
					}
					
					

				}else{
						if (!empty($files['image']['name'])) {

						$image_class = new Image();

						$filename = $files['image']['name'];
		                $extenstion = explode('.', $filename);

		               // Creating folder in root folder
		               $folder = "uploads/". $userid ."/";

		               if (!file_exists($folder)) {

		                  mkdir($folder, 0777, true);
		               }

	                   $my_image = $folder.time().rand(2,100).'.'.$extenstion[1];

	               		move_uploaded_file($files['image']['tmp_name'],$my_image);

	               		$image_class->resize_image($my_image,$my_image,1500,1500);
						$has_image = 1;
					}
				}


				$post = "";
				if (isset($data['post'])) {

					$post = addcslashes($data['post'],'/');
				}
				$postid = $this->create_postid();

				$query = "INSERT INTO posts 
					(userid,postid,post,image,has_image,is_profile_image,is_cover_image) 
					VALUES 
					('$userid','$postid','$post','$my_image', '$has_image','$is_profile_image', '$is_cover_image')";

				$DB = new Database();
				$DB->save($query);
			}
			else{

				$this->error .= 'Please type something to creating post';
			}

			return $this->error;
		}

		// getting post form database

		public function get_posts($id){

			$query = "SELECT * FROM posts WHERE userid='$id' ORDER BY id DESC LIMIT 20";
			$DB = new Database();
			$result = $DB->read($query);

			if($result){

				return $result;
			}else{
				return false;
			}

		}

		// Creating unique post id
		 private function create_postid(){

			$length = rand(4, 19);
			$number = '';
			for ($i=0; $i < $length ; $i++) { 
				$new_rand = rand(4, 9);
				$number = $number . $new_rand;
			}

			return $number;
		}
	}

?>
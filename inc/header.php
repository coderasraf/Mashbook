<div class="bar-top">
       	<div class="container">
       		<div class="bar-top-inner">
       			<div class="bar-top-left">
	       			<a style="color: #fff;text-decoration: none;" href="profile.php">
                                    <div class="left-area-header">
                                      MashBook
                                  </div>
                              </a>
       			</div>
       			<div class="bar-middle-search-bar">
       				<form>
       					<div class="form-group">
       						<input placeholder="Search Users...." type="text" class="search-bar" name="">
       						<i class="fa fa-search"></i>
       					</div>
       				</form>
       			</div>
       			<div class="right-profile-img">

               <?php 

                $image = '';

                  if (file_exists($user_data['profile_image'])) {
                    $image = $user_data['profile_image'];
                  }elseif($user_data['gender'] == 'Male'){
                    $image = 'images/contact.png';
                  }elseif ($user_data['gender'] == 'Female') {
                    $image = 'images/team1.jpg';
                  }else{
                    $image = 'images/contact.png';
                  }

                 ?>
                  <img id="showbar" src="<?php echo($image); ?>">
       			</div>
	       	</div>
	      </div>
       </div>
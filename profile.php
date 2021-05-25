<?php

      include 'classes/autoload.php';

      $login = new Login();
      $user_data = $login->check_login($_SESSION['mybook_userid']);

      // posting start here
      if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

            $post = new Post();
            $id = $_SESSION['mybook_userid'];
            $result = $post->create_post($id,$_POST, $_FILES);

            if($result == ""){
                  header("Location:profile.php");
            }else{

                  $error = "Please, write something to post!";
            }
      }

      // Collect posts

       $post = new Post();
      $id = $_SESSION['mybook_userid'];
      $posts = $post->get_posts($id);

      // Collect friends
       $user = new User();
      $id = $_SESSION['mybook_userid'];
      $friends = $user->get_friends($id);

      $image_class = new Image();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mash Book - Profile</title>
</head>
<body>
    
    <main>
    	<!-- topbar -->
       <?php include 'inc/header.php'; ?>
       <!-- End of topbar -->

       <section class="mashbook-cover-area">
       		<div class="container">
            <?php 

                  $image = '';

                  if (file_exists($user_data['cover_image'])) {
                    $image = $image_class->get_thumb_cover($user_data['cover_image']);
                  }
                  else{
                    $image = 'images/cover.jpg';
                  }
                 ?>
       			<div class="cover-image-profile cover-bg" style="background-image: url('<?php echo $image; ?>');">
              <a class="hover-effect2 btn btn-primary btn-sm" href="change-profile-image.php?change=cover">Change Cover</a>
       			  <div class="profile-picture">
 					    <a  href="change-profile-image.php?change=profile">
                <?php 

                  $image = '';

                  if (file_exists($user_data['profile_image'])) {
                    $image = $image_class->get_thumb_profile($user_data['profile_image']);
                  }elseif($user_data['gender'] == 'Male'){
                    $image = 'images/contact.png';
                  }elseif ($user_data['gender'] == 'Female') {
                    $image = 'images/team1.jpg';
                  }else{
                    $image = 'images/contact.png';
                  }

                 ?>
                <img src="<?php echo($image); ?>">

              </a>
 					    <p><?php echo $user_data['first_name'] .' '. $user_data['last_name']; ?></p>
       			   </div>
                <a class="hover-effect btn btn-primary btn-sm" href="change-profile-image.php?change=profile">Change Profile</a>
       			</div>
       		</div>


       </section>
       <section class="mashbook-menu-area">
       	<div class="container">
       		<div class="menu-area-inner">
       			<ul>
       				<li><a href="index.php">Timeline</a></li>
       				<li><a href="">About</a></li>
       				<li><a href="">Friends</a></li>
       				<li><a href="">Photos</a></li>
       				<li><a href="">Settings</a></li>
              <li><a href="logout.php">Logout</a></li>
       			</ul>
       		</div>
       	</div>
       </section>

       <section class="main-body-mashbook">
       	<div class="container">
       		<div class="main-body-inner">
       			<div class="left-main-body">
       				<div class="main-left-content">
       					<div class="title-main-left">
       						<h4>Friends</h4>
       					</div>
                  <?php 
                      if($friends){
                        foreach ($friends as $ROW_FRIENDS) {
                        include 'user.php';
                        }
                       }
                  ?>
       				</div>
       			</div>
       			<div class="right-main-body">
       				<div class="whats-mind-right">
         					<form method="post" enctype="multipart/form-data">
                   
         						<div class="form-group">
         							<textarea placeholder="Wht's on your mind?" autofocus="none" name="post" class="form-control pt-2"></textarea>
         							<div class="button-and-file">
                        <div class="form-groups">
                          <label for="file">
                          <img src="images/Editing-Attach-icon.png">
                        </label>
                        <img  class="preview-img" width="70px" height="70px" src="images/team1.jpg">
                          <input id="file" type="file" onchange="display_images(this.files[0])" name="image" hidden="">
                        </div>
                        <button type="submit" class="post-btn">Post</button>      
                      </div>
         						</div>
         					</form>
       		     </div>

       				<div id="post">
                <?php 
                    if($posts){
                      foreach ($posts as $ROW) {
                          $user = new User();
                          $ROW_USER = $user->get_user($ROW['userid']);

                          include 'post.php';
                      }
                    }
                ?>
       				</div>

       			</div>
       		</div>
       	</div>
       </section>


    </main>

<?php include 'inc/footer.php'; ?>
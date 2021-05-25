<?php
	
      include 'classes/autoload.php';

      $login = new Login();
      $user_data = $login->check_login($_SESSION['mybook_userid']);

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
    <title>Hass Asraf - Portfolio Website</title>
</head>
<body>
    
    <main>
    	<!-- topbar -->
       <?php include 'inc/header.php'; ?>
       <!-- End of topbar -->

       <section class="main-body-mashbook mt-3">
       	<div class="container">
       		<div class="main-body-inner timeline-inner">
       			<div class="left-main-body timeline-left">
       				<div class="main-left-content">

       					<!-- single friend box -->
       					<div class="single-friend-boxs">
       						<div class="friend-img-left">
       							<img src="images/profile-img.png">
       						</div>
       						<div class="right-friend-content">
       							<a href="profile.php" class="name">
       								<?php echo $user_data['first_name'] .' '. $user_data['last_name']; ?>
       							</a>
       							<p>1200 Follwers</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                                                <a class="btn-mashbook" href="">See Friends <i class="fa fa-users ml-2"></i></a>
       						</div>
       					</div>
       					<!-- End single friend box -->
       				</div>
       			</div>
       			<div class="right-main-body">
       				<div class="whats-mind-right">
       					<form>
       						<div class="form-group">
       							<textarea class="form-control"> What's on your mind?</textarea>
       							<button type="submit" class="post-btn">Post</button>
       						</div>
       					</form>
       				</div>
       				<div id="post">

       					<!-- Single Post box -->
		       			<div class="single-post-inner">
			       			<div>
			       				<img src="images/profile-img.png">
			       			</div>
			       			<div>
			       				<a href="" class="name post-details-name">Hass Asraf</a>
			       				<div>
			       					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       				</div>
			       				<div class="like-comment-bar">
			       					<a href="">Like</a> . <a href="">Comment</a> . April 23 2021
			       				</div>
			       			</div>
		       			</div>

		       			<!-- End of single post box -->

		       			<!-- Single Post box -->
		       			<div class="single-post-inner">
			       			<div>
			       				<img src="images/profile-img.png">
			       			</div>
			       			<div>
			       				<a href="" class="name post-details-name">Hass Asraf</a>
			       				<div>
			       					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       				</div>
			       				<div class="like-comment-bar">
			       					<a href="">Like</a> . <a href="">Comment</a> . April 23 2021
			       				</div>
			       			</div>
		       			</div>

		       			<!-- End of single post box -->

		       			<!-- Single Post box -->
		       			<div class="single-post-inner">
			       			<div>
			       				<img src="images/profile-img.png">
			       			</div>
			       			<div>
			       				<a href="" class="name post-details-name">Hass Asraf</a>
			       				<div>
			       					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       				</div>
			       				<div class="like-comment-bar">
			       					<a href="">Like</a> . <a href="">Comment</a> . April 23 2021
			       				</div>
			       			</div>
		       			</div>

		       			<!-- End of single post box -->

		       			<!-- Single Post box -->
		       			<div class="single-post-inner">
			       			<div>
			       				<img src="images/profile-img.png">
			       			</div>
			       			<div>
			       				<a href="" class="name post-details-name">Hass Asraf</a>
			       				<div>
			       					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       				</div>
			       				<div class="like-comment-bar">
			       					<a href="">Like</a> . <a href="">Comment</a> . April 23 2021
			       				</div>
			       			</div>
		       			</div>

		       			<!-- End of single post box -->

		       			<!-- Single Post box -->
		       			<div class="single-post-inner">
			       			<div>
			       				<img src="images/profile-img.png">
			       			</div>
			       			<div>
			       				<a href="" class="name post-details-name">Hass Asraf</a>
			       				<div>
			       					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       				</div>
			       				<div class="like-comment-bar">
			       					<a href="">Like</a> . <a href="">Comment</a> . April 23 2021
			       				</div>
			       			</div>
		       			</div>

		       			<!-- End of single post box -->

       				</div>
       			</div>
       		</div>
       	</div>
       </section>


    </main>

    <?php include 'inc/footer.php'; ?>
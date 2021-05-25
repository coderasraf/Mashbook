<div class="sidebar-right">
	<span class="closeBtn">&times;</span>
		<div class="menu-area-inner">
			<div class="profile-and-name">
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
                  <img src="<?php echo($image); ?>">

                  <h2 class="name-sidebar"><?php echo $user_data['first_name'].' '. $user_data['last_name']; ?></h2>
			</div>
			<ul>
				<li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
				<li><a href="index.php"><img src="images/contact-icon.png">Timeline</a></li>
				<li><a href=""><i class="fa fa-book-reader"></i>About</a></li>
				<li><a href=""><i class="fa fa-users"></i>Friends</a></li>
				<li><a href=""><img src="images/Editing-Attach-icon.png">Photos</a></li>
				<li><a href=""><i class="fa fa-users"></i>Group</a></li>
				<li><a href=""><img src="images/settings.png">Settings</a></li>
      			<li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
			</ul>
		</div>
</div>
<div class="overlay"></div>
<div class="cookie-box">
  <img width="100px" src="images/search-icon.png">
  <h2>Do you want best experience?</h2>
  <p>This site is use cookie to ensure you to get best on our website!</p>
  <div class="buttons">
    <button class="cookie-btn">Yes, I want</button>
    <a href="" class="learn-more-btn">Learn more</a>
  </div>
</div>
<footer class="footer-area">
        <div class="container">
            <div class="footer-main-content">
                <p>&copy; Copyrighted By MashBook 2021 <br> Developed by <a style="color: #fff;" href="https://www.hassasraf.netlify.app">Hassasraf</a></p>
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>
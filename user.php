<!-- single friend box -->
<div class="single-friend-box">
	<div class="friend-img-left">
		<?php
			$image = '';
			if ($ROW_FRIENDS['gender'] == 'Male') {
				$image = 'images/contact.png';
			}elseif ($ROW_FRIENDS['gender'] == 'Female'){
				$image = 'images/team1.jpg';
			}else{
				$image = 'images/team1.jpg';
			}

			?>
			<img src="<?php echo $image; ?>">
	</div>
	<div class="right-friend-content">
		<a href="#" class="name"><?php echo $ROW_FRIENDS['first_name'] . ' ' . $ROW_FRIENDS['last_name']; ?></a>
		<p>1200 Follwers</p>
	</div>
</div>
<!-- End single friend box -->
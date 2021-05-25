

<div class="single-post-inner">
<div>
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
	      <img class="profile_image" src="<?php echo($image); ?>">
</div>
<div>
	<a href="" class="name post-details-name">
		<?php echo $ROW_USER['first_name'].' '. $ROW_USER['last_name']; ?>
	</a>
	<div>
		<?php 

		echo $ROW['post']; 
		if ($ROW['post']) {
			echo "<br>";
		}
		?> 
		<?php 

		if (file_exists($ROW['image'])) {
			
			if ($ROW_USER['gender'] == 'Male') {
				$pronoun = 'his';
			}else{
				$pronoun = 'her';
			}

			if ($ROW['is_profile_image']) {

				echo "<span style='margin-bottom:10px;display:block;'>( Updated $pronoun profile image )</span>";
			}

			if ($ROW['is_cover_image']) {
				echo "<span style='margin-bottom:10px;display:block;'> (Updated $pronoun cover image) </span>";
			}
		}
			
		 ?>

		<?php 

			if (file_exists($ROW['image'])) { ?>
				<img class="img-post"  width="95%"  src="<?php echo $ROW['image']; ?>">
			<?php } ?>
	</div>
	<div class="like-comment-bar">
		<a href="">Like</a> . <a href="">Comment</a> . <?php echo $ROW['date']; ?> .
		<a href="">Edit</a> . <a href="">Delete</a>
	</div>
</div>
</div>
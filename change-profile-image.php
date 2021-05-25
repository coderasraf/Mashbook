<?php

      include 'classes/autoload.php';


      $login = new Login();
      $user_data = $login->check_login($_SESSION['mybook_userid']);

      // Profile and cover images uploading script

      if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {

           if (($_FILES['file']['type'] == 'image/jpeg') || ($_FILES['file']['type'] == 'image/jpg')) {
             
             $allowed_size = (1024 * 1024) * 7;

             if ($_FILES['file']['size'] < $allowed_size) {
               
               $filename = $_FILES['file']['name'];
               $extenstion = explode('.', $filename);

               // Creating folder in root folder
               $folder = "uploads/". $user_data['userid']."/";

               if (!file_exists($folder)) {

                  mkdir($folder, 0777, true);
               }

               $image = new Image();

               $filename = $folder.time().rand(2,100).'.'.$extenstion[1];

               move_uploaded_file($_FILES['file']['tmp_name'],$filename);

               // Image resize object with function

               $change = 'profile';

               if (isset($_GET['change'])) {
                 $change = $_GET['change'];
               }

               if ($change == 'cover') {

                // if cover image already exists then delete it
                if (file_exists($user_data['cover_image'])) {
                  unlink($user_data['cover_image']);
                }

                 $image->resize_image($filename,$filename,1500,1500);

               }else{

                // if profile image already exists then delete it

                if (file_exists($user_data['profile_image'])) {
                  unlink($user_data['profile_image']);
                }

                $image->resize_image($filename,$filename,1500,1500);

               }
               

               // Checking if file exist or not
               if (file_exists($filename)) {
                 
                 $id = $_SESSION['mybook_userid'];
                 $_POST['is_profile_image'] = 1;

                 // check get url change = profile or chang= cover
                 $change = 'profile';

                 if (isset($_GET['change'])) {
                   $change = $_GET['change'];
                 }

                 if ($change == 'cover') {

                   $query = "UPDATE users SET cover_image = '$filename' WHERE userid='$id'";
                   $_POST['is_cover_image'] = 1;
                 }else
                 {
                   $query = "UPDATE users SET profile_image = '$filename' WHERE userid='$id'";
                   $_POST['is_profile_image'] = 1;
                 }

                 $DB = new Database();
                 $result = $DB->save($query);

                // Create profile image and cover image post
                 $post = new Post();
                 $post->create_post($id,$_POST, $filename);


                 if ($result) {
                  
                    echo "<script>window.open('profile.php', '_self')</script>";

                 }
               }

             }else{
              echo "<script>alert('You should upload less that 3 mb file!')</script>";
             }

           }else{

            echo "<script>alert('Only jpeg,jpg,png format are allowed!')</script>";

           }
        }
    }

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
    <title>Change Profile Image</title>
</head>
<body>
    
    <main>
    	<!-- topbar -->
       <?php include 'inc/header.php'; ?>
       <!-- End of topbar -->

       <section class="main-body-mashbook mt-3">
       	<div class="container">
       		<div class="main-body-inner change-profile timeline-inner">
       			<div class="right-main-body">
       				<div class="whats-mind-right">
       					<form method="post" enctype="multipart/form-data">
       						<div class="form-group" style="display: flex;justify-content: space-between;align-items: baseline;">
       							<input onchange="display_images2(this.files[0])" id="changePic" class="ml-3" type="file" name="file" width="80%">
       							<button type="submit" class="post-btn">Upload</button>
       						</div>
       					</form>
                <div class="image-wrapper-preview">
                  <?php 

                    if (isset($_GET['change']) && $_GET['change'] == 'cover') {
                      
                        $change = 'cover';
                        $image = $user_data['cover_image'];

                    }elseif(isset($_GET['change']) && $_GET['change'] == 'profile'){
                        $change = 'profile';
                        $image = $user_data['profile_image'];

                    }

                   ?>
                   <hr>
                   <img class="p-3 m-3" id="previewImage" style="width: 400px;height: 300px;object-fit: cover;margin: 0 auto;text-align: center;box-shadow: var(--shadow);" src="<?php echo $image; ?>">
                </div>
       				</div>
       			</div>
       		</div>
       	</div>
       </section>


    </main>

    <?php include 'inc/footer.php'; ?>
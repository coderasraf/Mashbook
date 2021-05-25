<?php

    include 'classes/autoload.php';
    

        $firstName = "";
        $lastName  = "";
        $gender    = "";
        $email     = "";
        $password  = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $signup = new Signup();
        $result =  $signup->evaluate($_POST);

       if($result != ""){

        $input_error = $result . '<br>';

       }
       else
       {
        $success = "Your registration is successfully done!";

        echo "<script>
            setTimeout(function(){
                window.open('login.php', '_self')
            }, 1500)
        </script>";

       }
        $firstName = $_POST['first_name'];
        $lastName  = $_POST['last_name'];
        $gender    = $_POST['gender'];
        $email     = $_POST['email'];
        $password  = $_POST['password'];
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
    <title>MashBook - Sign Up</title>
</head>
<body>
    
    <main>
        <header>
            <div class="container">
                <div class="header-container-wrapper">
                    <div class="left-area-header">
                        MashBook
                    </div>
                    <div class="signup-btn-right">
                        <a class="signup-btn" href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Login area inner section -->
        <section class="login-wrapper">
            <div class="login-inner-area">
                <div class="login-top-title">
                    <h2>Signup into Mashbook</h2>
                </div>
                <?php
                if (isset($input_error)) {?>
                    <div class="alert alert-danger"><?php echo $input_error; ?> </div>
                <?php }?>

                <?php

                if (isset($success)) {?>
                    <div class="alert alert-success"><?php echo $success; ?> </div>
                <?php }?>

                <form method="POST" action="">
                    <div class="form-group">
                        <input id="text" value="<?php echo $firstName;?>" name="first_name" type="text" placeholder="First Name" name="">
                    </div>
                    <div class="form-group">
                        <input id="text" value="<?php echo $lastName;?>" name="last_name" type="text" placeholder="Last Name" name="">
                    </div>
                    <div class="form-group">
                        <input id="email" value="<?php echo $email;?>" name="email" type="text" placeholder="Enter your email" name="">
                    </div>
                    <div class="form-group">
                        <select value="<?php echo $gender;?>" id="text" name="gender" class="">
                            <option><?php echo $gender;?></option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="text" name="password" type="password" placeholder="Your password" name="">
                    </div>
                    <div class="form-group">
                        <input id="text" name="password2" type="password" placeholder="Re-type password" name="">
                    </div>

                    <button type="submit" id="loginBtn">Sign Up</button>
                </form>
            </div>
        </section>

    </main>

    <footer class="footer-area">
        <div class="container">
            <div class="footer-main-content">
                <p>&copy;Copyrighted By MashBook 2021 <br> Developed by <a href="https://www.hassasraf.netlify.app">Hassasraf</a></p>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
</body>
</html>
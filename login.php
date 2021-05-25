<?php

    include 'classes/autoload.php';

        $email     = "";
        $password  = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $login = new Login();
        $result =  $login->evaluate($_POST);

       if($result != ""){

        $input_error = $result;

       }
       else
       {
        $success = "You are logged in!";

        echo "<script>
            setTimeout(function(){
                window.open('index.php', '_self')
            }, 1500)
        </script>";

       }

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
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mash Book - Login</title>
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
                        <a class="signup-btn" href="signup.php">Signup</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Login area inner section -->
        <section class="login-wrapper">
            <div class="login-inner-area">
                <div class="login-top-title">
                    <h2 class="mb-3">Login into Mashbook</h2>
                    <?php if (isset($input_error)) {?>
                            <div class="alert alert-danger">
                                <?php echo $input_error; ?>
                            </div>
                    <?php } ?>

                    <?php if (isset($success)) {?>
                            <div class="alert alert-success">
                                <?php echo $success; ?>
                            </div>
                    <?php } ?>
                </div>
                <form method="POST" action="">
                    <div class="form-group">
                        <input value="<?php echo($email); ?>" type="text" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo($password); ?>" type="password" placeholder="Your password" name="password">
                    </div>
                    <button type="submit" id="loginBtn">Login</button>
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
<?php

session_start();

// initialize variables
// $username = "";
// $email = "";

$errors = array();

// conect to database
$db = mysqli_connect('localhost', 'codepark_intel', 'Photography101.', 'codepark_codepark') or die("could not connect to database");

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results)){
            $_SESSION['name'] = $username;
            header("location:data2.php");
            die;
        } else{
            array_push($errors, "Wrong username/password combination. Please try again");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In I Codepark</title>
    <!-- favicon -->
    <link rel="icon" href="/register/favicon.jpg">
    <!-- fontawesome-icon-links -->
    <script src="https://kit.fontawesome.com/f2b674ca10.js" crossorigin="anonymous"></script>
    <!-- google-fonts-link -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <!-- main-stylesheet-css -->
    <link rel="stylesheet" href="/register/style.css">
    <!-- register-stylesheet-css -->
    <link rel="stylesheet" href="register.css">
    <!-- moble-tablets-stylesheet -->
    <link rel="stylesheet" media="screen and (max-width:768px)" href="/register/mobile.css">
</head>
<body>
    <!-- register-body -->
    <div id="register">
        <div class="register-container">
            <div class="register-form">
                <!-- heading -->
                <i class="fab fa-earlybirds"></i><span><h2>Log In</h2></span>
                <!-- form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <?php include('errors.php') ?>
                    <div class="form-content">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="John Doe" required>
                    </div>
                    <div class="form-content">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                    <br>
                    <div class="form-content">
                        <input class="submit" type="submit" value="SUBMIT" name="login_user">
                    </div>
                    <p>Not a user? <a href="register.php"><b>Register</b></a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
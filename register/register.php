<?php 

    // include('config.php');

    session_start();

    // initialize variables
    $username = "";
    $email = "";

    $errors = array();

    // conect to database
    $db = mysqli_connect('localhost', 'codepark_intel', 'Photography101.', 'codepark_codepark') or die("could not connect to database");

    if(isset($_POST['reg_user'])){

        // register users
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $profile = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
        // form validation
        if(empty($username)) {array_push($errors, "Username is required");};
        if(empty($profile)) {array_push($errors, "Profile Picture is required");};
        if(empty($email)) {array_push($errors, "Email is required");};
        if(empty($password_1)) {array_push($errors, "Password is required");};
        if($password_1 != $password_2) {array_push($errors, "Passwords do not match");};
    
        // check database for existing user with same username or email
        $user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
    
        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results);
    
        if($user){
            if($user['username'] === $username){array_push($errors, "Username already exists");}
            if($user['email'] === $email){array_push($errors, "This email id already has a registerd username");}
        }
    
        // registration of user if there is no error
        if(count($errors) == 0){
            $password = md5($password_1); //This will ecrypt the password though apn its vulnerable to attack
            $query = "INSERT INTO users(profile, username, email, password) VALUES ('$profile', '$username', '$email', '$password')";
    
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
    
            header('location: in.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register I Codepark</title>
    <!-- favicon -->
    <link rel="icon" href="favicon.jpg">
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
                <i class="fab fa-earlybirds"></i><span><h2>Register</h2></span>
                <!-- form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <?php include('errors.php') ?>
                    <div class="form-content">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="John Doe" required>
                    </div>
                    <div class="form-content">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image"required>
                    </div>
                    <div class="form-content">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="john@doe.com" required>
                    </div>
                    <div class="form-content">
                        <label for="password">Password</label>
                        <input type="password" name="password_1" placeholder="password" required>
                    </div>
                    <div class="form-content">
                        <label for="password">Confirm Passowrd</label>
                        <input type="password" name="password_2" placeholder="password" required>
                    </div>
                    <br>
                    <div class="form-content">
                        <input class="submit" type="submit" value="SUBMIT" name="reg_user">
                    </div>
                    <p>Already a user? <a href="in.php"><b>Log in</b></a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
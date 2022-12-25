<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="favicon.jpg">
    <!-- fontawesome-icon-links -->
    <script src="https://kit.fontawesome.com/f2b674ca10.js" crossorigin="anonymous"></script>
    <!-- google-fonts-link -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">  
    <!-- main-stylesheet-css -->
    <link rel="stylesheet" href="/register/style.css">
        <!-- register-stylesheet-css -->
        <link rel="stylesheet" href="register.css">
    <!-- register-stylesheet-css -->
    <link rel="stylesheet" href="data.css">
    <title>Codepark Database</title>
</head>
<body style="background: #fff !important;">
    <!-- navbar -->
    <div id="edit-navbar">
        <div class="edit-container">
            <div class="container-logo">
                <img class="logo" src="code-park-full-web1.png" alt="">
            </div>
            <div class="container-heading">
                <h3>Form Edit</h3>
            </div>
        </div>
    </div>

    <!-- edit-form -->
    <?php require('process.php'); ?>
    <div id="register-form">
        <!-- heading -->
        <h2>Edit User Details</h2>
        <!-- form -->
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-content">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter username">
            </div>
            <div class="form-content">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" value="<?php echo $image; ?>" placeholder="Select Profile Picture.form">
            </div>
            <div class="form-content">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email" >
            </div>
            <br>
            <div class="form-content">
                <input class="submit" type="submit" value="UPDATE" name="update">
            </div>
        </form>
    </div>

</body>
</html>
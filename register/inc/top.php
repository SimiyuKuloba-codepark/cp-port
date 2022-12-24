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
    <link rel="stylesheet" href="data.css">
    <title>Codepark Database</title>
</head>
<body style="background: #fff;">  

    <section id="ui">
        <div class="ui-container">
            <div class="section-one">
                <div class="menu">
                    <div class="menu-container">
                        <img src="code-park-full-web1.png" alt="">
                        <!-- <h3>DATABASE</h3> -->
                        <br>
                        <h3>MAIN MENU</h3>
                        <ul>
                            <li><a href="" class="users-link"><span class="span"><i class="fas fa-users"></i></span>Users</a></li>
                            <li class="orders-link"><a href=""><span class="span"><i class="fas fa-shopping-cart"></i></span>Orders</a></li>
                            <li><a href="" class="messages-link"><span class="span"><i class="fas fa-envelope"></i></span>Messages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-two">
                <!-- navbar -->
                <?php if(isset($_SESSION['name'])) : ?>
   
                    <nav id="navbar">
                        <div class="navbar-container">
                            <div class="left">
                                <h2 class="order-h2" style="display: none;">Orders Databse</h2>
                                <h2 class="message-h2" style="display: none;">Messages Database</h2>
                                <h2 class="users-h2">Users Database</h2>
                            </div>
                            <!-- <div class="middle">
                                <form action="" method="POST">
                                    <input type="number" name="id" placeholder="Enter user ID">
                                    <input type="submit" name="search" value="Search">
                                </form>
                            </div> -->
                            <div class="right">
                                <li style="font-weight: bold; color:blue">Hi <?php echo $_SESSION['name']; ?>!</li>
                                <li><a href="logout.php"><span><i style="font-size: 1.8rem;" title="log-out" class="fas fa-sign-out-alt"></i></span></a></li>
                            </div>
                </div>
                    </nav>
                <?php endif ?> 

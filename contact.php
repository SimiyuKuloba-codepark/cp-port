<!--  -->
<?php

  require('config.php');
  require('db.php');

  // check for submit
  if(filter_has_var(INPUT_POST, 'submit')){
    // get form data
    $name = mysqli_real_escape_string($conn, $_POST['name'])  ;
    $email = mysqli_real_escape_string($conn, $_POST['data'])  ;
    $phone = mysqli_real_escape_string($conn, $_POST['phone'])  ;
    $message = mysqli_real_escape_string($conn, $_POST['message'])  ;

    // Check Req Fields
    if(!empty($email) && !empty($name)  && !empty($phone) && !empty($message)){
      // passed
      // check email 
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // failed
        $msg = 'Please use valid email!';
      }else{
        // passed
        $query = "INSERT INTO messages (name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')" ;

        if(mysqli_query($conn, $query)){
          header('Location: '.THANKS_URL. '');
        } else{
          echo 'ERROR: '. mysqli_error($conn);
        }
      }     
    }
  }else{
    // failed
    $msg = 'Please fill in all fields!';

    $msg = "<p class='red'>$msg</p>";

  }
      

  // message vars
  $msg = '';

  if(filter_has_var(INPUT_POST, 'submit')){
      // Get form Data
    $name = htmlspecialchars($_POST['name']);

    $email = htmlspecialchars($_POST['data']);

    $phone = htmlspecialchars($_POST['phone']);

    $message = htmlspecialchars($_POST['message']);

    // Check Req Fields
    if(!empty($email) && !empty($name)  && !empty($phone) && !empty($message)){
      // passed
      // check email 
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // failed
        $msg = 'Please use valid email!';

        $msg = "<p class='red'>$msg</p>";

      }else{
        // passed
        // recipient email
        
        $toEmail = 'simiyukuloba@codepark.co.ke';

        $subject = 'Site Inquiry from '.$name;

        $body = '<table style = "margin-left: auto; margin-right: auto; background: #fff; border: 2px solid #1E90FF; border-radius: 2rem;">
        <tr>
            <td style="padding:1rem 2rem 1rem 2rem">
                <hr>
                <h2 style="text-align: center; color: #1E90FF; font-size: 2.5rem">Inquiries</h2>
                <p style="text-align: center; font-size: 1.2rem;">Halo Simiyu! You have a new Inquiry from ' .$name. '</p>
                <hr>
            </td>
        </tr>
        <tr>
            <td style="padding:0rem 4rem 0rem 4rem">
                <h2 style="text-align: left;">Visitors Name</h2>
                <p style="text-align: left;">' .$name. ' </p>
            </td>
        </tr>

        <tr>
            <td style="padding:0rem 4rem 0rem 4rem">
                <h2 style="text-align: left;">Email</h2>
                <p style="text-align: left;">' .$email. ' </p>
            </td>
        </tr>

        <tr>
            <td style="padding:0rem 4rem 0rem 4rem">
                <h2 style="text-align: left;">Phone Number</h2>
                <p style="text-align: left;">' .$phone. ' </p>
            </td>
        </tr>
 
        <tr>
            <td style="padding:0rem 4rem 0rem 4rem">
                <h2 style="text-align: left;">Message/Inquiry</h2>
                <p style="text-align: justify;">' .$message. ' </p>
            </td>
        </tr>

        <tr>
            <td style="padding:0rem 2rem 1rem 2rem;  color: #1E90FF;">
                <hr>
                <p style="text-align: center;">Code Park Company LTD | A creative agency in Nairobi</p>
                <hr>
            </td>
        </tr>
    
    </table>';

        // Email Headers
        $headers = "From: " .$name. "<".$email.">". "\r\n";
        $headers .= "MIME-Version: 1.0" ."\r\n";
        $headers .= "Content-Type:text/html; charset=UTF-8" ."\r\n";

        // Additional headers
        // $headers .= "From: " .$name. "<".$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
          // email sent
          $msg = 'Your Email has been sent';

          $msg = "<p class='red'>$msg</p>";

        } else{
          // failed
          $msg = 'Your email was not sent';
        }

      }
    } else{
      // failed
      $msg = 'Please fill in all fields!';
    }
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us I Codepark</title>
  <!-- favicon -->
  <link rel="icon" href="favicon.jpg">
  <!-- fontawesome-icon-links -->
  <script src="https://kit.fontawesome.com/f2b674ca10.js" crossorigin="anonymous"></script>
  <!-- google-fonts-link -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">  
  <!-- main-stylesheet-css -->
  <link rel="stylesheet" href="style.css">
  <!-- home-page-stylesheet-css -->
  <link rel="stylesheet" href="home.css">
  <!-- contact-page-stylesheet-css -->
  <link rel="stylesheet" href="contact.css">
  <!-- orderform-css -->
  <link rel="stylesheet" href="orderform.css">
  <!-- php style -->
  <link rel='stylesheet' type='text/css' href='style.php' />
  <!-- moble-tablets-stylesheet -->
  <link rel="stylesheet" media="screen and (max-width:768px)" href="mobile.css">
</head>
<body>
  <!-- cd-navbar -->
  <navbar id="cp-navbar">
    <div class="cp-navbar-content">
      <div class="cp-logo flex-row-center">
        <a href="index.html"><img src="code-park-full-web1.png" alt="codepark logo" class="logo" /></a>
      </div>
      <div class="cp-menu">
        <ul class="flex-row-center">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="service.html">Services</a></li>
          <li><a href="process.html">Process</a></li>
          <li><a href="contact.php"  class="active-menu">Contact</a></li>
          <li><a class="cp-btn" href="tel:0795717545">GET FREE CONSULTANT</a></li>
        </ul>
      </div>
      <div class="phone-menu" id="phone-menu">
        <i class="fas fa-bars" id="bar-icon"></i>
        <i class="fas fa-times" id="close-icon"></i>
      </div>
    </div>
  </navbar>

  <!-- responsive-menu -->
  <div id="small-screen-menu" class="small-screen-menu">
    <a href="" id="close-menu"></i></a>
    <div class="small-screen-content">
      <ul>
        <!-- <img src="code-park1.png" alt="" width="50px"> -->
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="service.html">Services</a></li>
        <li><a href="process.html">Process</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a class="cp-btn cp-btn-small" href="tel:0795717545">GET FREE CONSULTANT</a></li>
      </ul>
    </div>
  </div>

  <!-- inside-cp-showcase -->
  <div id="inside-showcase">
    <div class="inside-showcase-content flex-column-center">
      <div class="inside-show-heading">
        <!-- php contact details -->
        <!-- <?php if($msg != '') : ?>
          <div>
            <?php echo $msg; ?>
          </div>
        <?php endif; ?> -->
        <h2>CONTACT US</h2>
      </div>
      <div class="heading-border">
        <div class="border-bottom"></div>
      </div>
      <div class="inside-show-descrip">
        <p>PLEASE GET IN TOUCH WITH ANY QUESTIONS YOU MAY HAVE OR TO DISCUSS YOUR PROJECT.</p>
      </div>

    </div>
  </div>

  <!-- contacts -->
  <div id="contact">
    <div class="contact-content flex-row-center">
      <div class="contacts flex-column-center">
        <div class="contact-heading">
          <h2 class="heading-3">OUR STATION</h2>
          <div class="heading-border">
            <div class="border-bottom"></div>
          </div>
        </div>
        <div class="our-location location-item">
          <i class="fas fa-city"></i>
          <p>Code Park Comapny Limited</p>
          <p>Nairobi, Kenya</p>
        </div>
        <div class="our-phone location-item">
          <i class="fas fa-mobile-alt"></i>
          <p>Tel: (+254) 795 717 545</p>
        </div>
        <div class="our-email location-item">
          <i class="far fa-envelope"></i>
          <p>Email: info@codepark.co.ke</p>
        </div>
      </div>
      <div class="contact-image">
        <img src="station.jpg" alt="Our-work-station-image">
      </div>
    </div>
  </div>

  <!-- message -->
  <div id="message">
    <div class="message-content flex-column-center">
      <div class="message-heading">
        <h2 id="not"></h2>
        <h2 class="heading-3">TALK TO US</h2>
        <div class="heading-border">
          <div class="border-bottom"></div>
        </div>
      </div>
      <p>Contact us with any questions you may have or to discuss how we can help with your project.</p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contact-form" method="post">
        <div class="form-content">
          <label for="name">Name:</label>
          <input id="name" type="text" name="name" placeholder="John Doe" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" required> 
        </div>
        <div class="form-content">
          <label for="email">Email:</label>
          <input id="email" type="email" name="data" placeholder="john@doe.com" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required>
        </div>
        <div class="form-content">
          <label for="phone">Phone:</label>
          <input id="phone" type="number" name="phone" placeholder="(+254) 123 456789" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>" required>
        </div>
        <div class="form-content">
          <label for="message">Your message</label>
          <textarea name="message" id="" cols="25" rows="10" placeholder="Type your message..." required><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
        </div>
        <div class="form-content">
          <input type="submit" name="submit" id="submit" value="SUBMIT">
        </div>
      </form>
    </div>
  </div>
 
  <!-- results -->
  <div id="results">
    <p class="resul"></p>
  </div>

  <!-- footer -->
  <div id="footer">
    <div class="footer-content">
      <div class="foot-one">
        <p>A creative agency in Nairobi</p>
        <div class="foot-contact">
          <a href="info@codepark.com">info@codepark.co.ke</a>
          <a href="tel:0795717545">(+254) 795 717545</a>
        </div>
        <p>Nairobi, Kenya</p>
        <p class="copyright">Copyright <script>document.write(new Date().getFullYear());</script> Code Park</p>
        <p style="color: grey;">All rights reserved.</p>
      </div>
      <div class="foot-two">
        <a href="index.html"><img src="code-park-full-web1-grey.png" alt="codepark logo" /></a>
      </div>

    </div>
  </div>
<script src="app.js"></script>
</body>
</html>
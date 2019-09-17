
 <?php 
include'connection.php';
$nameErr=  $phonenumberErr= $emailErr= $sexErr=  $courseErr= $addressErr= ""; 
$name= $sex= $email= $phonenumber= $course= $address= "";
if (array_key_exists('submit', $_POST)) {
 
      
      $name= mysqli_real_escape_string($conn, $_POST['name']);
      $sex= mysqli_real_escape_string($conn, $_POST['sex']);
      $email= mysqli_real_escape_string($conn, $_POST['email']);
      $phonenumber= mysqli_real_escape_string($conn, $_POST['phonenumber']);
      $course= mysqli_real_escape_string($conn, $_POST['course']);
      $address= mysqli_real_escape_string($conn, $_POST['address']);
      

    if (!$_POST['name']) {
        $nameErr="Full name is required";
    }


    if (isset($_POST['sex']) && $_POST['sex']=="0") {
        $sexErr="Choose your sex";
    }

    if (!$_POST['email']) {
        $emailErr="Email is required";

    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr="Invalid email";
    }


     if (!$_POST['address']) {
        $addressErr="Address is required";
    }


    if (!$_POST['phonenumber']) {
        $phonenumberErr="Phone number is required";
    }elseif (!preg_match('/^[0-9]*$/', $_POST['phonenumber'])) {
        $phonenumberErr="Enter a valid phone number";
    }

    if (isset($_POST['course']) && $_POST['course']=="0") {
        $courseErr="Choose a course";
    }

    if (isset($_POST['course']) && $_POST['course']=="Web Design") {
        $price= "NGN 40,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Web Development") {
       $price= "NGN 60,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Mobile Application") {
        $price= "NGN 100,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Graphics Design") {
        $price= "NGN 30,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Microsoft Office Suite") {
        $price= "NGN 15,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Desktop Application") {
        $price= "NGN 100,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Web Design and Development") {
        $price= "NGN 100,000";
    }elseif (isset($_POST['course']) && $_POST['course']=="Graphics Design and Web Design") {
         $price= "NGN 70,000";
    }






    if (empty($nameErr || $phonenumberErr || $emailErr || $sexErr || $courseErr || $addressErr)) {
       
$sql="SELECT id FROM registered WHERE email='$email'";
$runquery=mysqli_query($conn, $sql);
if (mysqli_num_rows($runquery) > 0) {
    $error="Sorry, email already exist";
}else{

    $sql="INSERT INTO registered (name, sex, email, address, phoneno, course)
VALUES('$name', '$sex', '$email', '$address', '$phonenumber', '$course' )";
if (mysqli_query($conn, $sql)) {

   $success="THANKS, You have successfully submitted";

}else{
    $error="something went wrong, try again later";
}

}



      
      
 


    }
    

}



?>



<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from gentium.pixerex.com/html/demo/blog-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 13:42:31 GMT -->
<head>
        <title>IBADAN 2019 ICT BOOTCAMP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/normalize.min.css" />
        <link rel="stylesheet" href="assets/css/pr.animation.css" />
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/css/uikit.min.css" />
        <link rel="stylesheet" href="assets/css/fonts.css" />
        <link rel="stylesheet" href="assets/css/pixeicons.css" />
        <link href="style.css" rel="stylesheet">
    </head>
    <body class="page-template page-template-blog-chess single page">

        <div id="loader" class="preloader pr__dark">
            <span class="loading">
                <span class="txt">Loading</span>
                <span class="progress">
                    <span class="bar-loading"></span>
                </span>
            </span>
        </div><!-- Preloader End -->

        <div class="pr__mobile__nav" id="navbar-mobile" data-uk-offcanvas="overlay: true; flip: true; mode: none">
            <div class="uk-offcanvas-bar">
    
                <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 2;"></button>

                <nav class="menu" data-uk-scrollspy-nav="offset: 0; closest: li; scroll: true">
                    <ul data-uk-scrollspy="target: > li; cls:uk-animation-slide-right; delay: 100; repeat: true;">
                                         <li><a href="index.php">Home</a></li>
                                        <li><a href="index.php">Courses</a></li>
                                        <li><a href="index.php">Works</a></li>
                                        <li><a href="index.php">About</a></li>
                                        <li><a href="registration.php">Register</a></li>
                        
                </nav>
        
            </div><!-- Off Canvas Bar End -->
        </div><!-- Mobile Nav End -->

        <div class="pr__wrapper" id="site-wrapper">

            <div class="pr__hero__wrap pr__dark" style="background-image: url('assets/images/hero_03.jpg');" data-uk-parallax="bgy: -200" id="site-hero">

                <header class="pr__header" data-uk-sticky="top: 443; animation: uk-animation-slide-top;">
                    <div class="uk-container">
                        <div class="inner">
                            <div class="logo">
                                <a href="index.html">
                                    <div class="brand"><img src="assets/images/logo.png"></div>
                                </a>
                            </div>
                            <div class="navbar pr-font-second">
                                <nav class="menu" data-uk-scrollspy-nav="offset: 0; closest: li; scroll: true">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="index.php">Courses</a></li>
                                        <li><a href="index.php">Works</a></li>
                                        <li><a href="index.php">About</a></li>
                                        <li><a href="registration.php">Register</a></li>
                                        
                                </nav>
                               
                            </div>
                            <div class="navbar-tigger" data-uk-toggle="target: #navbar-mobile">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </header><!-- Site Header End -->

                <section class="pr__hero uk-section" id="pr__hero">
                    <div class="uk-container">
                        <div class="section-inner">
                            <div class="hero-content uk-grid" data-uk-grid="">
                                <div class="uk-width-2-3@s">
                                    <hr class="line pr__hr__secondary">
                                    <h2 class="page-title h1">Registration.</h2>
                                    <ul class="breadcrumbs uk-breadcrumb">
                                        <li><a href="index.php">Home</a></li>
                                        <li><span>Registration</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- Site Hero End -->

            </div><!-- Hero Wrap End -->

            <div class="pr__content" id="site-content">

                <hr class="pr__vr__section">

                <div class="pr__primary uk-section uk-section-large full-width" id="site-primary">
                    <div class="outer">
                        <div class="uk-container uk-position-relative">
                            <div class="inner uk-grid uk-grid-large uk-grid-match" data-uk-grid="">
                                <div class="uk-width-expand">
                                    <main class="pr__main" id="site-main">
                                        <section class="blog-listing chess-layout outer" id="pr__blog__chess">
                                            

 <div id="pr__contact__form">
            
                <div class="form-outer">
                    <div class="uk-container uk-container-xsmall">
                        <div class="form-inner uk-position-relative">
                            <h2 class="uk-modal-title uk-h1">Register Now</h2>
                            <p>Input your details correctly</p>

<?php 
if (isset($error)) {
    echo "<p class='uk-button uk-button-large uk-button-danger'>$error</p>";
}

if (isset($success)) {
    echo "<p class='uk-button uk-button-large uk-button-secondary' style='background-color:#008000; border:none;'>$success</p>";
}
?>


                            <form method="post" class="pr__form" >
                                <div class="pr__form__group">
                                    <label for="name">Full Name <span style="color: red">*</span></label>
                                    <input class="pr-input" name="name" type="text" />
                                    <span style="color: red"><?php echo $nameErr;?></span>
                                </div>

                                <div class="pr__form__group">
                                     <label for="subject">Sex<span style="color: red">*</span></label>
                                    <select class="uk-select"  name="sex">
                                        <option value="0">&nbsp;</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                
                                    </select>
                                    <span style="color: red"><?php echo $sexErr;?></span>
                                </div>

                                <!--<div class="pr__form__group">
                                    <label for="email">Address</label>
                                    <input class="pr-input" name="address" type="text" />
                                   
                                </div>-->

                                <div class="pr__form__group">
                                    <label for="email">E-Mail <span style="color: red">*</span></label>
                                    <input class="pr-input" name="email" type="email" />
                                    <span style="color: red"><?php echo $emailErr; ?></span>
                                </div>

                                     <div class="pr__form__group">
                                    <label for="email">Address<span style="color: red">*</span></label>
                                    <input class="pr-input" name="address" type="text" />
                                    <span style="color: red"><?php echo $addressErr; ?></span>
                                </div>



                                <div class="pr__form__group">
                                    <label for="subject">Phone Number <span style="color: red">*</span></label>
                                    <input class="pr-input"  name="phonenumber" type="number" />
                                    <span style="color: red"><?php echo $phonenumberErr; ?></span>
                                </div>

                                    
                              <div class="pr__form__group">
                                     <label for="subject">Choose Courses <span style="color: red">*</span></label>
                                    <select class="uk-select"  name="course">
                                        <option value="0">&nbsp;</option>
                                        <option value="Web Design">Web Design</option>
                                        <option value="Web Development">Web Development</option>
                                        <option value="Web Design and Development">Web Design and Development</option>
                                        <option value="Mobile Application">Mobile Application</option>
                                        <option value="Desktop Application">Desktop Application</option>
                                        <option value="Microsoft Office Suite">Microsoft Office Suite</option>
                                        <option value="Graphics Design">Graphics Design</option>
                                        <option value="Graphics Design and Web Design">Graphics Design and Web Design</option>

                                    </select>
                                    <span style="color: red"><?php echo $courseErr; ?></span>
                                </div>
                               <!-- <div class="pr__form__group">
                                    <label for="message">Your message <span class="required">*</span></label>
                                    <textarea class="pr-textarea" id="message" name="message"></textarea>
                                </div>-->
                                <p class="pr__form__group uk-margin-large">
                                    <button class="uk-button uk-button-large uk-button-primary" name="submit">Submit</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
        
        </div>





                                        </section>
                                        
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="pr__vr__section">

            </div><!-- Site Content End -->
<?php include'footer.php'; ?>

        </div><!-- Site Wrapper End -->

      
        <!-- Needed Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/anime.min.js"></script>
        <script src="assets/js/pr.animation.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

<!-- Mirrored from gentium.pixerex.com/html/demo/blog-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 13:42:31 GMT -->
</html>


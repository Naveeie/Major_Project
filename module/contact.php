<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Contact : POS Dynamics</title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
</head>

<body>
<div class="page-wrapper">
 	
    <?php include'header.php'; ?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/pos_banner1.jpg);">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <ul class="bread-crumb">
            	<li><a href="index.php">Home</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#contact-section"><span class="icon fa fa-arrow-down"></span></div>
        </div>
    </section>
   
    <!--Contact Section-->
    <div class="contact-section" id="contact-section">
        <div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->
                <div class="col-md-8 col-sm-7 col-xs-12 column pull-right">
                	<div class="sec-title">
                         <h3>Drop us a line</h3>
                        <h2>We’d love to hear from you</h2>
                        <div class="line"></div>
                    </div>
                    <div class="form-box">
                    	<form id="contact-form" method="post">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                	<div class="field-label">Your Name *</div>
                                	<input type="text" name="username" placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                	<div class="field-label">Your Email *</div>
                                	<input type="email" name="email" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                	<div class="field-label">Subject *</div>
                                	<input type="text" name="subject" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Message *</div>
                                    <textarea name="message" placeholder=""></textarea>
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 text-right">
                                    <button class="normal-btn theme-btn" type="submit" name="submit-form">SEND US</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Left Side-->
                <div class="col-md-4 col-sm-5 col-xs-12 column pull-left">
                	<div class="sec-title">
                    	<h3>Contact Info.</h3>
                        <h2>Connect with us</h2>
                        <div class="line"></div>
                    </div>
                    
                    <div class="info-box">
                    	<h3>Information</h3>
                        
                        <ul>
                        	<li><span class="icon fa fa-phone"></span><p>(+044)-123-45678</p><p>(+044)-123-45678</p></li>
                            <li><span class="icon fa fa-envelope"></span><p><a href="mailto:info@mypos.co.in">info@mypos.co.in</a></p></li>
                        </ul>
                        <br>
                        
                        <h3>Connect With Us</h3>
                        <div class="social-links">
                        	<a href="#_"><span class="fa fa-facebook-f"></span></a>
                            <a href="#_"><span class="fa fa-twitter"></span></a>
                            <a href="#_"><span class="fa fa-pinterest"></span></a>
                            <a href="#_"><span class="fa fa-google-plus"></span></a>
                            <a href="#_"><span class="fa fa-youtube-play"></span></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php include'footer.php'; ?>
    
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="#main-header"><span class="fa fa-arrow-up"></span></div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/validate.js"></script>
<script src="js/wow.js"></script>
<script src="js/js-collection.js"></script>
<script src="js/script.js"></script>

</body>

</html>

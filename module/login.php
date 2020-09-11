
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POS DYNAMICS(P) Ltd | Home </title>
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
    
 	<!-- Preloader -->
    <div class="preloader"></div>
 	
    <?php include'header.php'; ?>
    
    <!--Page Title-->
    <?php include'flash.php'; ?>
    
    <!-- cart-page -->
    <section class="cart-page" id="sidebar-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3">
                    <div class="col-md-6">
						<form method="post">
							<div style="padding: 0px 25px 8px 25px;border: 2px solid #358606;">
								<p align="center" style="font-weight: bold;"><u>CUSTOMER LOGIN </u></p>
								<div class="form-group">
									 <label>User Email</label>
									   <input type="email" name="cust_name" id="cust_name" class="form-control" autocomplete="off">
								</div><div class="clearfix"></div>
								<div class="form-group">
									 <label>User Password</label>
									 <input type="text" name="cust_mobile" id="cust_mobile" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
								</div><div class="clearfix"></div>
								<div class="form-group" >
									<div class="col-md-8 col-xs-12">
										<p id="msgalert">	</p>
									</div>	
									<div class="col-md-4 col-xs-12">
									    <input type="submit" name="submitcustomerregister" onsubmit="return login()" class="ladda-button ladda-button-demo btn btn-primary"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Login">
									</div>
								</div><div class="clearfix"></div>
							</div>
						</form>
						<script>
							function login()
							{	
								$("#myProgress").show();
								$("#msgalert").html();
								bars(50);	
								var username=$("#username").val();
								var password=$("#password").val();	
								$.get("<?php echo URL ?>scripts.php?action=login&username="+username+"&password="+encodeURIComponent(password) , displogin);	
								return false;	
							}
							function displogin(msg)
							{   
								var s=bars(100);
								if(s)	
								{
									if(msg==1)
									{
										window.location.href="<?php echo URL ?>index";
										$("#loginbtn").val("Success");
									}
									else
									{			
										$("#myProgress").hide();
										$("#msgalert").html('<code>Login Failed..!</code>');
									}
								}
							}
						</script>
					</div>
					<div class="col-md-6">
						<div style="padding: 0px 25px 8px 25px;border: 2px solid #358606;">
							<p align="center" style="font-weight: bold;"><u>CUSTOMER REGISTER </u></p>
							 <?php
								include'config.php';
								$res1=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer order by customer_id desc limit 1"));
								if($res1["cust_id"]!='')
								{
									$membershipno=explode("00", $res1["cust_id"]);
									$membershipno="ZY00".($membershipno[1]+1);
								}
								else
									$membershipno="ZY001";	
							?>
							<div class="form-group">
								 <label>Customer ID</label>
								 <?php if($_GET["customer_id"]==''){ ?>
								 <input type="text" name="cust_id" readonly autofocus class="form-control" value="<?php echo $membershipno ?>">
								 <?php } ?>
								 <?php if($_GET["customer_id"]!=''){ ?>
								 <input type="text" name="cust_id" readonly autofocus class="form-control" value="<?php echo $patientdetails["cust_id"]?>">
								 <?php } ?>
							</div><div class="clearfix"></div>
							<div class="form-group">
								 <label>Customer Name</label>
								   <input type="text" name="cust_name" id="cust_name" class="form-control" autocomplete="off" value="<?php echo $patientdetails["cust_name"]?>">
							</div><div class="clearfix"></div>
							<div class="form-group">
								 <label>Customer Mobile</label>
								 <input type="text" name="cust_mobile" id="cust_mobile" value="<?php echo $patientdetails["cust_mobile"]?>" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
							</div><div class="clearfix"></div>
							<div class="form-group">
								 <label>Customer Email</label>
								 <input type="email" name="cust_email" id="cust_email" value="<?php echo $patientdetails["cust_email"]?>" autocomplete="off" class="form-control">
							</div><div class="clearfix"></div>
							<div class="form-group">
								 <label>Customer Location</label>
								  <input type="text" name="cust_location" id="cust_location" class="form-control" autocomplete="off" value="<?php echo $patientdetails["cust_location"]?>">
							</div><div class="clearfix"></div>
							<div class="form-group">
								 <label>Gender</label>
								 <select class="form-control" name="gender" id="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								 </select>
								 <?php if($_GET["customer_id"]!='') { ?>
								  <script>
									$("#gender").val("<?php echo $patientdetails["gender"]?>");
								 </script>
								 <?php } ?>
							</div><div class="clearfix"></div>
							<input type="submit" name="submitcustomerregister" class="btn btn-primary" value="Submit"> 
						</div>
					</div>
                </div>
            </div>
        </div>  
    </section>

    <!--Main Footer-->
    <?php include'footer.php'; ?>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="#main-header"><span class="fa fa-arrow-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-parallax.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/owl.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.js"></script>
<script src="js/js-collection.js"></script>
<script src="js/script.js"></script>
</body>

</html>

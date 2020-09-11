<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Product Details : POS Dynamics</title>
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
	<?php
	    $product=mysqli_fetch_assoc(mysqli_query($conn , "select *from tbl_product where p_id='".$_GET["p_id"]."' "));
		$product_name=mysqli_fetch_assoc(mysqli_query($conn , "select *from tbl_product_category where product_category='".$product["product_category"]."' "));
	?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/pos_banner1.jpg);">
        <div class="auto-container">
            <h1><?php echo $product["product_name"]; ?></h1>
            <ul class="bread-crumb">
            	<li><a href="index.php">Home</a></li>
                <li><a href="product.php?product_category=<?php echo $product["product_category"] ?>"><?php echo $product_name["productcategoryname"]; ?></a></li>
                <li><a href><?php echo $product["product_name"]; ?></a></li>
            </ul>
        </div>
        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#sidebar-section"><span class="icon fa fa-arrow-down"></span></div>
        </div>
    </section>
    <!--Sidebar Section-->
    <div class="sidebar-section no-bg" id="sidebar-section">
        <div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->
                <div class="col-md-9 col-sm-8 col-xs-12 content-side pull-right">
    				<!--Services Section-->
                    <!-- .product-details-page-content -->
                    <div class="product-details-page-content">
                        <div class="row product-details-box">
                            <div class="col-lg-6 img-holder">
                                <img src="admin/<?php echo $product["product_image"] ?>" alt="<?php echo $product["product_name"] ?>" class="img-responsive">
                            </div>
                            <div class="col-lg-6">
                                <h3><?php echo $product["product_name"] ?></h3>
                                <p><?php echo $product["product_small_description"] ?></p>
                                <?php if($product["product_modelno"]!='') { ?><span>Model No : <b><?php echo $product["product_modelno"] ?></b></span><?php } ?>
								<?php if($product["product_color"]!='') { ?><span>Color : <b><?php echo $product["product_color"] ?></b></span><?php } ?>
                                <a data-toggle="modal" href="#modal-getaquote-details<?php echo $product["p_id"] ?>" class="add-to-cart hvr-bounce-to-right">GET A QUOTE</a>
                            </div>
                        </div>
                        <div class="product-details-tab-title row">
                            <div class="col-lg-12">
                                <ul>
                                    <li data-tab-name="description" class="active"><span>Descripton</span></li>
                                    <li data-tab-name="specification"><span>Specification</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-details-tab-content row">
                            <div class="col-lg-12" id="description">
                                <p><?php echo $product["product_description"] ?></p>
                            </div>
                            <div class="col-lg-12" id="specification">
                                <p><?php echo $product["product_specification"] ?></p>
                            </div>
                        </div>
						<div class="modal fade" id="modal-getaquote-details<?php echo $product["p_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog style-one" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="border: 2px solid #0c8410;">
							    <span ><b>GET A QUOTE </b></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1.0"><span aria-hidden="true" >&times;</span></button>
                              </div>
							  <?php
								$customer_det=mysqli_fetch_assoc(mysqli_query($conn , "select *from tbl_customer where cust_id='".$_SESSION["posuserid"]."' "));
								?>
							  <div class="modal-body" style="border: 2px solid #358606;">
								<div class="row">
                                     <div id="message"></div>
									<div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="hidepassword">
										<h4 align="center" style="color:red"><?php echo $product["product_name"] ?></h4>
										<form method="post">
											<div class="col-md-6">
												<div class="form-group">
													 <label>First Name <span style="color:red">*</span></label>
													   <input type="text" name="quotes_fname" readonly id="quotes_fname" value="<?php echo $customer_det["cust_fname"]; ?>" class="form-control" autocomplete="off">
												</div><div class="clearfix"></div>
												<div class="form-group">
													 <label>Company Name <span style="color:red">*</span></label>
													   <input type="text" name="quotes_compname" readonly id="quotes_compname" value="<?php echo $customer_det["cust_compname"]; ?>" class="form-control" autocomplete="off">
												</div><div class="clearfix"></div>
												<div class="form-group">
													 <label>Mobile No <span style="color:red">*</span></label>
													 <input type="text" name="quotes_mobileno" readonly id="quotes_mobileno" value="<?php echo $customer_det["cust_mobileno"]; ?>" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
												</div><div class="clearfix"></div>
												<div class="form-group">
													 <label>Email Id <span style="color:red">*</span></label>
													   <input type="email" name="quotes_emailid1" readonly id="quotes_emailid1" value="<?php echo $customer_det["cust_emailid1"]; ?>" class="form-control" autocomplete="off">
												</div><div class="clearfix"></div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													 <label>Last Name</label>
													   <input type="text" name="quotes_lastname" readonly id="quotes_lastname" value="<?php echo $customer_det["cust_lastname"]; ?>" class="form-control" autocomplete="off">
												</div><div class="clearfix"></div>
												<div class="form-group">
													 <label>GST No <span style="color:red">*</span></label>
													 <input type="text" name="quotes_gstno" readonly id="quotes_gstno" value="<?php echo $customer_det["cust_gstno"]; ?>" autocomplete="off" class="form-control">
												</div><div class="clearfix"></div>
												<div class="form-group">
													 <label>Details</label>
													 <textarea name="quotes_details" id="quotes_details" class="form-control" rows="5"></textarea>
												</div><div class="clearfix"></div>
												<input type="hidden" name="quotes_cust_id" id="quotes_cust_id" value="<?php echo $customer_det["customer_id"]; ?>">
												<input type="hidden" name="quotes_p_id" id="quotes_p_id" value="<?php echo $_GET["p_id"]; ?>">
												<div class="form-group">
													<div class="col-md-8 col-xs-12">
														<input type="button" onclick="return productquotes()" class="ladda-button ladda-button-demo btn btn-success"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Submit">
													</div>
												</div><div class="clearfix"></div>
											</div>
										</form>
									</div>	
								</div>
                                <script>				
									function productquotes()
									{ //alert('ass');return false;
										   var quotes_p_id = document.getElementById("quotes_p_id").value;
										   var quotes_cust_id = document.getElementById("quotes_cust_id").value;
										   var quotes_details = document.getElementById("quotes_details").value;
										   if(quotes_details==""){	alert ("Enter Details");	document.getElementById("quotes_details").focus();	return false;	}

                                           //alert('checkregisters');return false;
                                           var active = 'active';
										   $.ajax({
											type: "POST",
											url: "popup-actions.php",
                                            //data: {status: status, name: name},
											data: {cust_quotes: active, quotes_details: quotes_details, quotes_cust_id: quotes_cust_id, quotes_p_id: quotes_p_id },   
											cache: false,
											success: function(checkquotes)
											{
                                                //alert(checkquotes);return false;
												//var fields = checkregisters.split(/-/);
												//var data1 = fields[0];
												//var data2 = fields[1];
												//var data3 = fields[2];	
												if(checkquotes==1)
												{
													alert('Error');return false;
												}
												else if(checkquotes==5)
												{
													alert('Successfully submitted');window.location.reload(true);													
												}
												else
												{
													$("#error").fadeIn(1000, function(){
														//$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
													});
												}
												//alert(checkregisters);return false;
												//$("#cust_regcheck2").html(checkregisters);
											}
											}); 
									}
                                    function custverification()
									{ //alert(val);
										   var customer_id = document.getElementById("customer_id").value;
                                           var cust_id = document.getElementById("cust_id").value;
										   var cust_password = document.getElementById("cust_password").value;
										   var confirm_password = document.getElementById("confirm_password").value;
										   //alert(confirm_password);return false;
										   if(cust_id==""){	alert ("Customer Id Error. Try After Some Times");	document.getElementById("cust_id").focus();	return false;	}
										   if(cust_password.length <= 5){	alert ("Minimum 5 character length required");	document.getElementById("cust_password").focus();	return false;	}
                                           //if((cust_password.value.length != 5)){	alert ("Minimum 5 character length required");	document.getElementById("cust_password").focus();	return false;	}
										   if(confirm_password!=confirm_password){	alert ("Confirm password mismatch");	document.getElementById("confirm_password").focus();	return false;	}
										  
                                           //alert('checkregisters');return false;
                                           var active = 'active';
										   $.ajax({
											type: "POST",
											url: "popup-actions.php",
                                            //data: {status: status, name: name},
											data: {cust_passwordverifyregister: active, customer_id: customer_id, cust_id: cust_id, cust_password: cust_password, confirm_password: confirm_password},   
											cache: false,
											success: function(checkpasswordregisters)
											{
                                                //alert(checkregisters);return false;
												var fields = checkpasswordregisters.split(/-/);
												var data1 = fields[0];
												var data2 = fields[1];
												var data3 = fields[2];	
												if(data1==1)
												{
													$("#error").fadeIn(1000, function(){
														$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Error on register !</div>');
													});
												}
												else if(data1=="registered")
												{
													$("#message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Profile Successfully Created !</div>').fadeIn('slow').delay(2000).hide(1);
													$("#hidepassword").hide();
                                                    $("#viewpassword").hide();
                                                    $("#viewpasswordstatus").show();
													$.ajax({
														type: "post",
														url: "customer_register_password_verify_list.php",
														data: 'customer_id=' + data2,
														success: function (data) { //alert(data);							  
															  $("#viewpasswordstatus").html('<div> '+data+' </div>');
														}
													});														
												}
												else
												{
													$("#error").fadeIn(1000, function(){
														//$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
													});
												}
												alert(checkregisters);return false;
												$("#cust_regcheck2").html(checkregisters);
											}
											}); 
									}
								</script>	
                              </div>
                            </div>
                          </div>
                        </div>
						
                    </div> <!-- /.product-details-page-content -->
                </div>
                <!--Sidebar-->
                <div class="col-md-3 col-sm-4 col-xs-12 pull-left">
                	<?php include'right-side-product.php'; ?>
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
<script src="js/jquery-parallax.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/owl.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.js"></script>
<script src="js/js-collection.js"></script>
<script src="js/script.js"></script>
</body>
</html>

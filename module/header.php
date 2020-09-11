<?php include'config.php'; ?>
<!-- Main Header -->
    <header class="main-header" id="main-header">
    	<!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container clearfix">
            	<!-- Top Left -->
            	<div class="top-left">
                	<ul class="clearfix">
                    	<li><a href="#"><span class="fa fa-circle"></span> Hello guest! Welcome to POS Dynamic, Inc.</a></li>
                    </ul>
                </div>
                <!-- Top Right -->
                <div class="top-right">
                	<ul class="clearfix">
                    	<li><a href="#"><span class="fa fa-phone"></span>  +91 9382180032</a></li>
						<li><a href="mailto:sales@zoyogroups.com"><span class="fa fa-at"></span> sales@zoyogroups.com</a></li>
                        <?php if($_SESSION["posloginid"]=='')	{	?>
						<li><a data-toggle="modal" href="#modal-customer-signup"><span class="fa fa-lock"></span> Customer Signup </a></li>
						<?php } ?>
						<div class="modal fade" id="modal-customer-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog style-one" role="document">
                            <div class="modal-content">
							  
                              <div class="modal-header" style="border: 2px solid #0c8410;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1.0"><span aria-hidden="true" >&times;</span></button>
                              </div>
                              <div class="modal-body" style="border: 2px solid #358606;">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<form method="post">
												<div style="padding: 0px 25px 8px 25px;">
													<p align="center" ><b>CUSTOMER LOGIN </b></p>
													<div class="form-group">
														 <label>User Name (Email)</label>
														   <input type="email" name="login_email" id="login_email" class="form-control" autocomplete="off">
													</div><div class="clearfix"></div>
													<div class="form-group">
														 <label>Password</label>
														 <input type="password" name="login_password" id="login_password" autocomplete="off" class="form-control">
													</div><div class="clearfix"></div>
													<div class="form-group" >
														<div class="col-md-8 col-xs-12">
															<p><a data-dismiss="modal" data-toggle="modal" href="#modal-customer-register">Register</a> | <a>Forget Password?</a></p>
															<p></p>
														</div>	
														<div class="col-md-4 col-xs-12">
															<input type="button" name="submitcustomerregister" onclick="return poslogin()" class="ladda-button ladda-button-demo btn btn-primary"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Login">
														</div>
													</div><div class="clearfix"></div>
													<div class="form-group" >
														<div class="col-md-6 col-xs-12"></div>	
														<div class="col-md-6 col-xs-12"></div>
													</div><div class="clearfix"></div>
												</div>
												<script>				
													function poslogin()
													{ //alert(val);
														   var login_email = document.getElementById("login_email").value;
														   var login_password = document.getElementById("login_password").value;
														  
														   if(login_email==""){	alert ("Enter User Name");	document.getElementById("login_email").focus();	return false;	}
														   if(login_password==""){	alert ("Password");	document.getElementById("login_password").focus();	return false;	}
														   //alert('checkregisters');return false;
														   var active = 'active';
														   $.ajax({
															type: "POST",
															url: "popup-actions.php",
															//data: {status: status, name: name},
															data: {cust_poslogin: active, login_email: login_email, login_password: login_password },   
															cache: false,
															success: function(checklogins)
															{
																//alert(checklogins);return false;
																if(checklogins==1)
																{
																	$("#error").fadeIn(1000, function(){
																		$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Error on login !</div>');
																	});
																}
																else if(checklogins=="success")
																{
                                                                    window.location.href="index.php";
																}
																else
																{
																	$("#error").fadeIn(1000, function(){
																		//$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
																	});
																}										
															}
															}); 
													}
												</script>
											</form>
									    </div>
										<div class="col-md-2"></div>
									</div>	
								</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal: donate now Ends -->
						<?php if($_SESSION["posloginid"]=='')	{	?>
						<li><a data-toggle="modal" href="#modal-customer-register"><span class="fa fa-user"></span> Customer Register </a></li>
						<?php } ?>
						<div class="modal fade" id="modal-customer-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog style-one" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="border: 2px solid #0c8410;">
							    <span ><b>CUSTOMER REGISTER </b></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1.0"><span aria-hidden="true" >&times;</span></button>
                              </div>
                              <div class="modal-body" style="border: 2px solid #358606;">
								<div class="row">
                                     <div id="message"></div>
									<div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="hidepassword">
										<form method="post">
										<div class="col-md-6">
											<div class="form-group">
												 <label>First Name <span style="color:red">*</span></label>
												   <input type="text" name="cust_fname" id="cust_fname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Company Name <span style="color:red">*</span></label>
												   <input type="text" name="cust_compname" id="cust_compname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Mobile No <span style="color:red">*</span></label>
												 <input type="text" name="cust_mobileno" id="cust_mobileno" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Email Id 1 <span style="color:red">*</span></label>
												   <input type="email" name="cust_emailid1" id="cust_emailid1" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Address 1 <span style="color:red">*</span></label>
												 <input type="text" name="cust_address1line1" id="cust_address1line1" autocomplete="off" placeholder="Address line 1" class="form-control">
												 <input type="text" name="cust_address1line2" id="cust_address1line2" autocomplete="off" placeholder="Address line 2" class="form-control">
												 <select class="form-control" name="cust_state1" id="cust_state1" onchange="return checkstate(this.value)">
													<option value="">--- select state ---</option>
													<?php
													$sel=mysqli_query($conn , "select *from tbl_states order by state_id asc");
													while($res=mysqli_fetch_assoc($sel))
													{
													?>
													<option value="<?php echo $res["state_id"] ?>"><?php echo $res["name"] ?></option>
													<?php } ?>
												 </select>
												 <script>				
													function checkstate(val)
													{ //alert(val);
														   $.ajax({
															type: "POST",
															url: "popup-actions.php",
															data: "stateid="+val,
															cache: false,
															success: function(checkstate)
																{
																		//alert(checkstate);return false;
																	$("#cust_district1").html(checkstate);
																}
																}); 
													}
												</script>	
												 <select class="form-control" name="cust_district1" id="cust_district1">
													<option value="">--- select district ---</option>
												 </select>
												 <input type="text" name="cust_pincode1" id="cust_pincode1" autocomplete="off" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Pincode" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group" >
												<div class="col-md-12 col-xs-12">
                                                    <div id="error"></div>													
													<p>Already register ? <a data-toggle="modal" href="#modal-customer-signup" data-dismiss="modal">Click here to login</a></p>
												</div>	
											</div><div class="clearfix"></div>
									    </div>
										<div class="col-md-6">
											<div class="form-group">
												 <label>Last Name</label>
												   <input type="text" name="cust_lastname" id="cust_lastname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>GST No <span style="color:red">*</span></label>
												 <input type="text" name="cust_gstno" id="cust_gstno" autocomplete="off" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Phone No</label>
												 <input type="text" name="cust_phoneno" id="cust_phoneno" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Email Id 2</label>
												   <input type="email" name="cust_emailid2" id="cust_emailid2" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Address 2 </label>
												 <input type="text" name="cust_address2line1" id="cust_address2line1" autocomplete="off" placeholder="Address line 1" class="form-control">
												 <input type="text" name="cust_address2line2" id="cust_address2line2" autocomplete="off" placeholder="Address line 2" class="form-control">
												 <select class="form-control" name="cust_state2" id="cust_state2" onchange="return checkstate2(this.value)">
													<option value="">--- select state ---</option>
													<?php
													$sel=mysqli_query($conn , "select *from tbl_states order by state_id asc");
													while($res=mysqli_fetch_assoc($sel))
													{
													?>
													<option value="<?php echo $res["state_id"] ?>"><?php echo $res["name"] ?></option>
													<?php } ?>
												 </select>
												 <script>				
													function checkstate2(val)
													{ //alert(val);
														   $.ajax({
															type: "POST",
															url: "popup-actions.php",
															data: "stateid2="+val,
															cache: false,
															success: function(checkstate2)
																{
																		//alert(checkstate);return false;
																	$("#cust_district2").html(checkstate2);
																}
																}); 
													}
												 </script>	
												 <select class="form-control" name="cust_district2" id="cust_district2">
													<option value="">--- select district ---</option>
												 </select>
												 <input type="text" name="cust_pincode2" id="cust_pincode2" autocomplete="off" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Pincode" class="form-control">
											</div><div class="clearfix"></div>
											<div id="cust_regcheck2"></div>
											<div class="form-group" >
												<div class="col-md-8 col-xs-12">
													<input type="button" name="submitcustomerregister" onclick="return custregister()" class="ladda-button ladda-button-demo btn btn-success"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Next">
												</div>
											</div><div class="clearfix"></div>
									    </div>
                                        
										</form>
									</div>	
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="viewpassword" style="display:none;"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="viewpasswordstatus" style="display:none;"></div>
								</div>
                                <script>				
									function custregister()
									{ //alert(val);
										   var cust_fname = document.getElementById("cust_fname").value;
										   var cust_lastname = document.getElementById("cust_lastname").value;
										   var cust_compname = document.getElementById("cust_compname").value;
										   var cust_gstno = document.getElementById("cust_gstno").value;
										   var cust_mobileno = document.getElementById("cust_mobileno").value;
										   var cust_phoneno = document.getElementById("cust_phoneno").value;
										   var cust_emailid1 = document.getElementById("cust_emailid1").value;
										   var cust_emailid2 = document.getElementById("cust_emailid2").value;
										   var cust_address1line1 = document.getElementById("cust_address1line1").value;
										   var cust_address1line2 = document.getElementById("cust_address1line2").value;
										   var cust_state1 = document.getElementById("cust_state1").value;
										   var cust_district1 = document.getElementById("cust_district1").value;
										   var cust_pincode1 = document.getElementById("cust_pincode1").value;
										   var cust_address2line1 = document.getElementById("cust_address2line1").value;
										   var cust_address2line2 = document.getElementById("cust_address2line2").value;
										   var cust_state2 = document.getElementById("cust_state2").value;
										   var cust_district2 = document.getElementById("cust_district2").value;
										   var cust_pincode2 = document.getElementById("cust_pincode2").value;

										   if(cust_fname==""){	alert ("Enter First Name");	document.getElementById("cust_fname").focus();	return false;	}
										   if(cust_compname==""){	alert ("Enter Company Name");	document.getElementById("cust_compname").focus();	return false;	}
										   if(cust_gstno==""){	alert ("Enter GST No");	document.getElementById("cust_gstno").focus();	return false;	}
										   if(cust_mobileno==""){	alert ("Enter Mobile No");	document.getElementById("cust_mobileno").focus();	return false;	}
										   if(cust_emailid1==""){	alert ("Enter Email Id 1");	document.getElementById("cust_emailid1").focus();	return false;	}
										   if(cust_address1line1==""){	alert ("Enter Address Line 1");	document.getElementById("cust_address1line1").focus();	return false;	}
										   if(cust_address1line2==""){	alert ("Enter Address Line 2");	document.getElementById("cust_address1line2").focus();	return false;	}
										   if(cust_state1==""){	alert ("Select Address 1 State ");	document.getElementById("cust_state1").focus();	return false;	}
										   if(cust_district1==""){	alert ("Select Address 1 District");	document.getElementById("cust_district1").focus();	return false;	}
										   if(cust_pincode1==""){	alert ("Enter Address 1 Pincode");	document.getElementById("cust_pincode1").focus();	return false;	}
                                           //alert('checkregisters');return false;
                                           var active = 'active';
										   $.ajax({
											type: "POST",
											url: "popup-actions.php",
                                            //data: {status: status, name: name},
											data: {cust_register: active, cust_fname: cust_fname, cust_lastname: cust_lastname, cust_compname: cust_compname, cust_gstno: cust_gstno, cust_mobileno: cust_mobileno, cust_phoneno: cust_phoneno, cust_emailid1: cust_emailid1, cust_emailid2: cust_emailid2, cust_address1line1: cust_address1line1, cust_address1line2: cust_address1line2, cust_state1: cust_state1, cust_district1: cust_district1, cust_pincode1: cust_pincode1, cust_address2line1: cust_address2line1, cust_address2line2: cust_address2line2, cust_state2: cust_state2, cust_district2: cust_district2, cust_pincode2: cust_pincode2 },   
											cache: false,
											success: function(checkregisters)
											{
                                                //alert(checkregisters);return false;
												var fields = checkregisters.split(/-/);
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
													$("#message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Profile Successfully Updated !</div>').fadeIn('slow').delay(2000).hide(1);
													$("#hidepassword").hide();
                                                    $("#viewpassword").show();
													$.ajax({
														type: "post",
														url: "customer_register_password_list.php",
														data: 'customer_id=' + data2,
														success: function (data) { //alert(data);							  
															  $("#viewpassword").html('<div> '+data+' </div>');
														}
													});														
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
										   if(cust_password!=confirm_password){	alert ("Confirm password mismatch");	document.getElementById("confirm_password").focus();	return false;	}
										  
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
												//alert(checkregisters);return false;
												//$("#cust_regcheck2").html(checkregisters);
											}
											}); 
									}
								</script>	
                              </div>
                            </div>
                          </div>
                        </div>
						<?php if($_SESSION["posloginid"]!='')	{	?>
						<li><a><span style="color: #73c145;font-weight: bolder;">Welcome</span> <?php echo $_SESSION["posuserfirstname"] ?> <?php echo $_SESSION["posuserlastname"] ?> (POS<?php echo $_SESSION["posuserid"] ?>) </a></li>
						<li><a href="logout.php"><span class="fa fa-lock"></span> Logout </a></li>
						<?php } ?>
                    </ul>
                </div>
                <div class="modal fade" id="customer-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog style-one" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  </div>
						  <div class="modal-body">
							<div class="appoinment-form-outer">
								<form action="#_" method="post" autocomplete="off">
									<!--Form Portlet-->
									<div class="form-portlet">
										<h3 class="text-thm">Sign Up</h3>
										<div class="row clearfix">
											<div class="form-group col-lg-6 col-md-6 col-xs-12">
												<div class="field-label">Email (User Name) <span class="required">*</span></div>
												<input type="email" required="" class="form-control" placeholder="Email" value="" name="name" autocomplete="off">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-xs-12">
												<div class="field-label">Password <span class="required">*</span></div>
												<input type="text" required="" class="form-control" placeholder="Phone" value="" name="name" autocomplete="off">
											</div>
											<div class="text-center"><button class="thm-btn b-inner font-16" type="submit">Appoinment</button></div>
										</div>
									</div>
								</form>
							</div>
						  </div>
						</div>
					</div>
                </div>
            </div>
        </div><!-- Header Top End -->
        
        <!-- Header Lower -->
        <div class="header-lower">
        	<div class="auto-container clearfix">

                <!--Outer Box-->
                <div class="outer-box">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="images/logo2.png" alt="POS DYNAMICS"></a>
                    </div>

                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation">
                                <li class="dropdown current"><a href="index.php">Home</a> </li>
								<li class="dropdown"><a href="about.php">About Us</a> </li>
								<?php if($_SESSION["posloginid"]=='') { ?>
                                <li class="dropdown"><a href="#_">Our Products</a>
                                    <ul>
                                        <?php
										$sel5=mysqli_query($conn , "select *from tbl_product_category order by product_category asc");
										while($res5=mysqli_fetch_assoc($sel5))
										{
										?>
										<li><a data-toggle="modal" href="#modal-customer-signup"><?php echo $res5["productcategoryname"] ?></a></li>
										<?php } ?>
                                    </ul>
                                </li>
								<?php } ?>
								<?php if($_SESSION["posloginid"]!='') { ?>
                                <li class="dropdown"><a href="#">Our Products</a>
                                    <ul>
                                        <?php
										$sel5=mysqli_query($conn , "select *from tbl_product_category order by product_category asc");
										while($res5=mysqli_fetch_assoc($sel5))
										{
										?>
										<li><a href="product.php?product_category=<?php echo $res5["product_category"] ?>"><?php echo $res5["productcategoryname"] ?></a></li>
										<?php } ?>
                                    </ul>
                                </li>
								<?php } ?>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->

                    
                    <div class="appoinment-btn">
                        <a class="thm-btn a-inner letter-spacing-1" target="_blank" href="https://www.google.com/maps?ll=11.000462,77.000669&z=16&t=m&hl=en&gl=IN&mapclient=embed&q=4,+Vinayagar+Koil+St+Palaniappa+Nagar,+Sowripalayam+Pirivu,+Ramanathapuram+Coimbatore,+Tamil+Nadu+641045">Our Direction</a>
                    </div>
					
					
					<div class="modal fade" id="modal-donate-now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog style-one" role="document">
						<div class="modal-content">
						  
						  <div class="modal-header" style="border: 2px solid #0c8410;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1.0"><span aria-hidden="true" >&times;</span></button>
						  </div>
						  <div class="modal-body" style="border: 2px solid #358606;">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<form method="post">
											<div style="padding: 0px 25px 8px 25px;">
												<p align="center" ><b>CUSTOMER LOGIN </b></p>
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
														<p><a href="">Register</a> | <a>Forget Password?</a></p>
														<p></p>
													</div>	
													<div class="col-md-4 col-xs-12">
														<input type="submit" name="submitcustomerregister" onsubmit="return login()" class="ladda-button ladda-button-demo btn btn-primary"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Login">
													</div>
												</div><div class="clearfix"></div>
												<div class="form-group" >
													<div class="col-md-6 col-xs-12">
														
													</div>	
													<div class="col-md-6 col-xs-12">
														
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
									<div class="col-md-2"></div>
								</div>	
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<!-- Modal: donate now Ends -->
                    <div class="modal fade" id="modal-customer-appointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog style-one" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="border: 2px solid #0c8410;">
							    <span ><b>CUSTOMER APPOINTMENT </b></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1.0"><span aria-hidden="true" >&times;</span></button>
                              </div>
                              <div class="modal-body" style="border: 2px solid #358606;">
								<div class="row">
                                     <div id="message"></div>
									<div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="hidepassword">
										<form method="post">
										<div class="col-md-6">
											<div class="form-group">
												 <label>First Name <span style="color:red">*</span></label>
												   <input type="text" name="app_fname" id="app_fname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Company Name <span style="color:red">*</span></label>
												   <input type="text" name="app_compname" id="app_compname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Mobile No <span style="color:red">*</span></label>
												 <input type="text" name="app_mobileno" id="app_mobileno" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Email Id 1 <span style="color:red">*</span></label>
												   <input type="email" name="app_emailid1" id="app_emailid1" class="form-control" autocomplete="off">
											</div>
									    </div>
										<div class="col-md-6">
											<div class="form-group">
												 <label>Last Name</label>
												   <input type="text" name="app_lastname" id="app_lastname" class="form-control" autocomplete="off">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>GST No <span style="color:red">*</span></label>
												 <input type="text" name="app_gstno" id="app_gstno" autocomplete="off" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Phone No</label>
												 <input type="text" name="app_phoneno" id="app_phoneno" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
											</div><div class="clearfix"></div>
											<div class="form-group">
												 <label>Email Id 2</label>
												   <input type="email" name="app_emailid2" id="app_emailid2" class="form-control" autocomplete="off">
											</div>
									    </div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Others</label>
												<textarea name="app_others" id="app_others" class="form-control"></textarea>
											</div><div class="clearfix"></div>
											<div class="form-group" >
												<input type="button" name="submitcustomerappointment" onclick="return custappointment()" class="ladda-button ladda-button-demo btn btn-success"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Submit">
											</div><div class="clearfix"></div>
									    </div>
                                        
										</form>
									</div>	
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="viewpassword" style="display:none;"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3" id="viewpasswordstatus" style="display:none;"></div>
								</div>
                                <script>				
									function custappointment()
									{ //alert(val);
										   var app_fname = document.getElementById("app_fname").value;
										   var app_lastname = document.getElementById("app_lastname").value;
										   var app_compname = document.getElementById("app_compname").value;
										   var app_gstno = document.getElementById("app_gstno").value;
										   var app_mobileno = document.getElementById("app_mobileno").value;
										   var app_phoneno = document.getElementById("app_phoneno").value;
										   var app_emailid1 = document.getElementById("app_emailid1").value;
										   var app_emailid2 = document.getElementById("app_emailid2").value;
										   var app_others = document.getElementById("app_others").value;
										  
										   if(app_fname==""){	alert ("Enter First Name");	document.getElementById("app_fname").focus();	return false;	}
										   if(app_compname==""){	alert ("Enter Company Name");	document.getElementById("app_compname").focus();	return false;	}
										   if(app_gstno==""){	alert ("Enter GST No");	document.getElementById("app_gstno").focus();	return false;	}
										   if(app_mobileno==""){	alert ("Enter Mobile No");	document.getElementById("app_mobileno").focus();	return false;	}
										   if(app_emailid1==""){	alert ("Enter Email Id 1");	document.getElementById("app_emailid1").focus();	return false;	}
                                           //alert('checkregisters');return false;
                                           var active = 'active';
										   $.ajax({
											type: "POST",
											url: "popup-actions.php",
                                            //data: {status: status, name: name},
											data: {cust_appointment: active, app_fname: app_fname, app_lastname: app_lastname, app_compname: app_compname, app_gstno: app_gstno, app_mobileno: app_mobileno, app_phoneno: app_phoneno, app_emailid1: app_emailid1, app_emailid2: app_emailid2, app_others: app_others },   
											cache: false,
											success: function(checkregisters)
											{
                                                //alert(checkregisters);return false;
												var fields = checkregisters.split(/-/);
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
													$("#message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Profile Successfully Updated !</div>').fadeIn('slow').delay(2000).hide(1);
													$("#hidepassword").hide();
                                                    $("#viewpassword").show();
													$.ajax({
														type: "post",
														url: "customer_register_password_list.php",
														data: 'customer_id=' + data2,
														success: function (data) { //alert(data);							  
															  $("#viewpassword").html('<div> '+data+' </div>');
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
                </div>
            </div>
        </div><!-- Header Lower End-->
        
    </header><!--End Main Header -->
    
<?php 
include("config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>Customer :: POS Dynamics(p) Ltd</title>
    <?php include("css.php"); ?>
	<link rel="stylesheet" href="<?php echo URL ?>vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="<?php echo URL ?>vendor/select2-bootstrap/select2-bootstrap.css" />
	<style>
		#ChildCat-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: absolute;z-index: 2;}
		#ChildCat-list li{padding: 5px;background: #8dbf71;border-bottom: #ed1f24 1px solid;color: #000;}
		#ChildCat-list li:hover{background: #067c70;color: #fff;cursor: pointer;}
	</style>
</head>
<body class="fixed-navbar fixed-sidebar">
<?php include"top.php" ?>
<!-- Navigation -->
<?php include"side.php" ?>
<!-- Main Wrapper -->
<div id="wrapper">
    <div class="color-line"></div>
	<div class="panel-body topbreadcrumb">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="<?php echo URL ?>dashboard">Dashboard</a></li>
                    <li>    <span>CUSTOMER</span>   </li>
					<li>   <span><a href="<?php echo URL ?>patientlist" style="color: #067c70;">Customer List</a></span>    </li>
                    <li class="active">    <span><?php if($_GET["customer_id"]!=''){ echo'EDIT'; } ?><?php if($_GET["customer_id"]==''){ echo'ADD'; } ?>  </span>   </li>
                </ol>
            </div>
            <h4 class="font-light m-b-xs">
                Customer 
            </h4>
    </div>
	<div class="content animate-panel">
        <?php
			$patientdetails=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer where customer_id='".$_GET["customer_id"]."'"));	
						
		?>
		
        <div class="row">
            <form method="post" action="#" enctype="multipart/form-data">
			<div class="col-lg-6">
				<div class="hpanel">
					<div class="panel-body" style="padding: 0px;">
						<p align="center" style="font-weight: bold;"><u>CUSTOMER DETAILS</u></p>
						<div class="modal-body">
							<div class="col-md-12">
							    <?php
									$res1=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer order by customer_id desc limit 1"));
									if($res1["cust_id"]!='')
									{
										$membershipno=explode("00", $res1["cust_id"]);
										$membershipno="ZY00".($membershipno[1]+1);
									}
									else
										$membershipno="ZY001";	
								?>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Customer ID</label>
										 <?php if($_GET["customer_id"]==''){ ?>
										 <input type="text" name="cust_id" readonly autofocus class="form-control" value="<?php echo $membershipno ?>">
										 <?php } ?>
										 <?php if($_GET["customer_id"]!=''){ ?>
										 <input type="text" name="cust_id" readonly autofocus class="form-control" value="<?php echo $patientdetails["cust_id"]?>">
										 <?php } ?>
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Customer Name</label>
										   <input type="text" name="cust_name" id="cust_name" class="form-control" autocomplete="off" value="<?php echo $patientdetails["cust_name"]?>">
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Customer Mobile</label>
										 <input type="text" name="cust_mobile" id="cust_mobile" value="<?php echo $patientdetails["cust_mobile"]?>" autocomplete="off" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control">
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Customer Email</label>
										 <input type="email" name="cust_email" id="cust_email" value="<?php echo $patientdetails["cust_email"]?>" autocomplete="off" class="form-control">
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Customer Location</label>
										  <input type="text" name="cust_location" id="cust_location" class="form-control" autocomplete="off" value="<?php echo $patientdetails["cust_location"]?>">
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
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
								</div>
							</div>
						</div>
			        </div>
                </div>
			</div>	
			<div class="col-lg-6">
				<div class="hpanel">
					<div class="panel-body" style="padding: 0px;">
						<p align="center" style="font-weight: bold;"><u>COMMON INFORMATION</u></p>
						<div class="modal-body">
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label>Date of Joining </label>
										<div class="input-group date">
											<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											<input type="text" id="datapicker1" name="joining_date"  autocomplete="off" class="form-control" value="<?php echo $patientdetails["joining_date"]?>">
										</div>   
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Password</label>
										   <input type="text" name="cust_password" id="cust_password" class="form-control" autocomplete="off" value="<?php echo $patientdetails["cust_password"]?>">
									</div><div class="clearfix"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										 <label>Status</label>
										 <select class="form-control" name="status" id="status">
											<option value="">- choose -</option>
											<option value="1">Active</option>
											<option value="0">De-Active</option>
										 </select>
										 <?php if($_GET["customer_id"]=='') { ?>
										 <script>
											$("#status").val("1");
										 </script>
										 <?php } ?>
										 <?php if($_GET["customer_id"]!='') { ?>
										  <script>
											$("#status").val("<?php echo $patientdetails["status"]?>");
										 </script>
										 <?php } ?>
									</div><div class="clearfix"></div>
								</div>
							</div>
						</div>
			        </div>
                </div>
			</div>	
			<div class="col-lg-12">
                <div class="hpanel">
				<input type="submit" name="submitcustomerregister" class="btn btn-primary" value="Submit"> 
				<?php
					if(isset($_REQUEST["submitcustomerregister"]))
					{  
						$cust_id=mysqli_real_escape_string($conn,$_POST["cust_id"]);
						$cust_name=mysqli_real_escape_string($conn,$_POST["cust_name"]);
						$cust_mobile=mysqli_real_escape_string($conn,$_POST["cust_mobile"]);
						$cust_email=mysqli_real_escape_string($conn,$_POST["cust_email"]);
						$cust_location=mysqli_real_escape_string($conn,$_POST["cust_location"]);
						$joining_date=mysqli_real_escape_string($conn,$_POST["joining_date"]);
						$cust_password=mysqli_real_escape_string($conn,$_POST["cust_password"]);
						$status=mysqli_real_escape_string($conn,$_POST["status"]);
						$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
												
						date_default_timezone_set('Asia/Calcutta'); 
						$date = date('Y-m-d');
						
						
						if($_GET["customer_id"]=='')
						{
							//echo "INSERT INTO tbl_customer(cust_id,cust_name,cust_mobile,cust_email,cust_password,cust_location,joining_date,status,date) VALUES
							//('$cust_id','$cust_name','$cust_mobile','$cust_email','$cust_password','$cust_location','$joining_date','$status','$date')";
							//exit;
							mysqli_query($conn, "INSERT INTO tbl_customer(cust_id,cust_name,cust_mobile,cust_email,cust_password,cust_location,gender,joining_date,status,date) VALUES
							('$cust_id','$cust_name','$cust_mobile','$cust_email','$cust_password','$cust_location','$gender','$joining_date','$status','$date')"); 
						    $studenttableid=mysqli_insert_id($conn);
						}
						else
						{
							mysqli_query($conn, "update tbl_customer set cust_id='$cust_id',cust_name='$cust_name',cust_mobile='$cust_mobile',cust_email='$cust_email',cust_password='$cust_password',cust_location='$cust_location',gender='$gender',joining_date='$joining_date',status='$status' where customer_id='".$_GET["customer_id"]."'");
						}
						echo '<script>alert("Updated Succesfully.");window.location.href="'.URL.'customerlist";</script>';
					}
				?>
                </div> 
			</div>
			</form>		
        </div>
    </div>
</div>
<script src="<?php echo URL ?>vendor/select2-3.5.2/select2.min.js"></script>
<?php include("footer.php"); ?>
<?php if($_GET["pregister_id"]!='') { ?>
<link rel="stylesheet" href="<?php echo URL ?>js/fancybox/jquery.fancybox.css" media="screen">
<script src="<?php echo URL ?>js/fancybox/jquery.fancybox.js"></script> 
<script type="text/jscript">
$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        closeEffect: "none"
    });
});
</script>
<?php } ?>
<script>
	$(function(){
		$(".js-source-states-2").select2();
		 });
</script>
</body>
</html>				
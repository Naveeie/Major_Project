<?php 
include'config.php';
$customerres=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer where customer_id='".$_POST["customer_id"]."' "));
?>
<form method="post">
	<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customerres["customer_id"]; ?>" >
    <div class="col-md-6">
		<div class="form-group">
			 <label>Customer ID <span style="color:red">*</span></label>
			   <input type="text" name="cust_id" readonly id="cust_id" value="<?php echo $customerres["cust_id_prefix"]; ?><?php echo $customerres["cust_id"]; ?>" class="form-control" autocomplete="off">
		</div><div class="clearfix"></div>
	</div>
    <div class="col-md-6">
		<div class="form-group">
			 <label>Name <span style="color:red">*</span></label>
			   <input type="text" readonly value="<?php echo $customerres["cust_fname"]; ?> <?php echo $customerres["cust_lastname"]; ?>" class="form-control" autocomplete="off">
		</div><div class="clearfix"></div>
	</div>
    <div class="col-md-6">
		<div class="form-group">
			 <label>Password <span style="color:red">*</span></label>
			   <input type="text" name="cust_password" id="cust_password" class="form-control" autocomplete="off">
		</div><div class="clearfix"></div>
	</div>
    <div class="col-md-6">
		<div class="form-group">
			 <label>Confirm Password <span style="color:red">*</span></label>
			   <input type="text" name="confirm_password" id="confirm_password" class="form-control" autocomplete="off">
		</div><div class="clearfix"></div>
	</div>
    <div class="col-md-12">
		<p style="color:red">Note : Password must be minimum 5 character and maximum 8 character</p>
	</div>
    <div class="col-md-6">
		<div id="error"></div>
	</div>
	<div class="col-md-6">
		<div class="form-group" >
			<div class="col-md-8 col-xs-12">
				<input type="button" name="submitcustomerverification" onclick="return custverification()" class="ladda-button ladda-button-demo btn btn-success"  style="width:100%"  data-style="zoom-in" id="loginbtn" value="Submit">
			</div>
		</div><div class="clearfix"></div>
	</div>
	
</form>
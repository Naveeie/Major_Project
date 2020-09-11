<?php 
include'config.php';
$customerres=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer where customer_id='".$_POST["customer_id"]."' "));
?>
    <div class="col-md-12">
		<h4 align="center">Dear <?php echo $customerres["cust_fname"]; ?> <?php echo $customerres["cust_lastname"]; ?> [<?php echo $customerres["cust_id_prefix"]; ?><?php echo $customerres["cust_id"]; ?>]</h4>
        <p align="center">Thank you for registering with us. Please check your email id for login credentials.</p>
        <p align="center">Back to our website <a href="index.php">Click here</a></p>
	</div>
    
	

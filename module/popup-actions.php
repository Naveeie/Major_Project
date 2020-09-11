<?php
include'config.php';
if($_POST["stateid"]!='')
{
	$stateid = $_POST['stateid'];
	echo'<select class="form-control" name="cust_district1" id="cust_district1">
		<option value="">--- select district ---</option>';
	        $selpd=mysqli_query($conn,"select *from tbl_districts where state_id='".$stateid."' order by name asc");
			while($resd=mysqli_fetch_assoc($selpd))
			{
				echo '<option value='.$resd["district_id"].' >'.$resd["name"].'</option>';
			}		
	echo' </select>';
}
if($_POST["stateid2"]!='')
{
	$stateid = $_POST['stateid2'];
	echo'<select class="form-control" name="cust_district2" id="cust_district2">
		<option value="">--- select district ---</option>';
	        $selpd=mysqli_query($conn,"select *from tbl_districts where state_id='".$stateid."' order by name asc");
			while($resd=mysqli_fetch_assoc($selpd))
			{
				echo '<option value='.$resd["district_id"].' >'.$resd["name"].'</option>';
			}		
	echo' </select>';
}
if($_POST["cust_register"]=='active')
{
	$cust_fname = $_POST['cust_fname'];
    $cust_lastname = $_POST['cust_lastname'];
    $cust_compname = $_POST['cust_compname'];
    $cust_gstno = $_POST['cust_gstno'];
    $cust_mobileno = $_POST['cust_mobileno'];
    $cust_phoneno = $_POST['cust_phoneno'];
    $cust_emailid1 = $_POST['cust_emailid1'];
    $cust_emailid2 = $_POST['cust_emailid2'];
    $cust_address1line1 = $_POST['cust_address1line1'];
    $cust_address1line2 = $_POST['cust_address1line2'];
    $cust_state1 = $_POST['cust_state1'];
    $cust_district1 = $_POST['cust_district1'];
    $cust_pincode1 = $_POST['cust_pincode1'];
    $cust_address2line1 = $_POST['cust_address2line1'];
    $cust_address2line2 = $_POST['cust_address2line2'];
    $cust_state2 = $_POST['cust_state2'];
    $cust_district2 = $_POST['cust_district2'];
    $cust_pincode2 = $_POST['cust_pincode2'];
    date_default_timezone_set('Asia/Calcutta'); 
	$date = date('Y-m-d'); 
    $res1=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer where status='1' order by cust_id desc limit 1"));
    $cust_id = $res1["cust_id"] + 1;
    $n = mysqli_query($conn, "INSERT INTO tbl_customer(cust_id_prefix,cust_id,cust_fname,cust_lastname,cust_compname,cust_gstno,cust_mobileno,cust_phoneno,cust_emailid1,cust_emailid2,cust_address1line1,cust_address1line2,cust_state1,cust_district1,cust_pincode1,cust_address2line1,cust_address2line2,cust_state2,cust_district2,cust_pincode2,date) VALUES
							('POS','$cust_id','$cust_fname','$cust_lastname','$cust_compname','$cust_gstno','$cust_mobileno','$cust_phoneno','$cust_emailid1','$cust_emailid2','$cust_address1line1','$cust_address1line2','$cust_state1','$cust_district1','$cust_pincode1','$cust_address2line1','$cust_address2line2','$cust_state2','$cust_district2','$cust_pincode2','$date')"); 
    if($n)
	{ 
        $customer_id = mysqli_insert_id($conn);
        echo 'registered-'.$customer_id.'-'.$cust_fname;  
	}  
    else
    {
        echo "1"; //  not available
    }  
}
if($_POST["cust_quotes"]=='active')
{
	$quotes_details = $_POST['quotes_details'];
    $quotes_cust_id = $_POST['quotes_cust_id'];
    $quotes_p_id = $_POST['quotes_p_id'];
    date_default_timezone_set('Asia/Calcutta'); 
	$date = date('Y-m-d'); 
    
    $n = mysqli_query($conn, "INSERT INTO tbl_quotes(p_id,customer_id,details,date,status) VALUES('$quotes_p_id','$quotes_cust_id','$quotes_details','$date','Not Closed')"); 
    if($n)
	{ 
        //$customer_id = mysqli_insert_id($conn);
         echo "5"; 
	}  
    else
    {
        echo "1"; //  not available
    }  
}
if($_POST["cust_passwordverifyregister"]=='active')
{
	$customer_id = $_POST['customer_id'];
    $cust_id = $_POST['cust_id'];
    $cust_password = $_POST['cust_password'];
    $confirm_password = $_POST['confirm_password'];
	
	$enquiry_name = 'aaaa';
	$enquiry_email = 'jenish.aswin@gmail.com';
   
    date_default_timezone_set('Asia/Calcutta'); 
	$date = date('Y-m-d'); 
    $n = mysqli_query($conn, "update tbl_customer set cust_password='$cust_password',joining_date='$date',status='1' where customer_id='".$_POST["customer_id"]."'");
    if($n)
	{ 
        echo 'registered-'.$customer_id.'-'.$cust_password;  
		require 'phpmailer/class.phpmailer.php';
		$fromemail='sureshnaveen868@gmail.com';
		//$toemail='aswin.e@zoyosolutions.com';
		$content= "
		<table><b>Dear ".$enquiry_name."</b>,
		<tr><td height='5' colspan='3'></td></tr>
		<tr><td height='10' colspan='3'>Thank you for registering with us. Please have your login credentials. </td></tr>
		<tr><td height='5' colspan='3'></td></tr>
		<tr><td >User Name </td><td> : </td><td><font color='#FF0000'> ".$enquiry_name."</font></td></tr>
		<tr><td height='5' colspan='3'></td></tr>
		<tr><td >Password </td><td> : </td><td><font color='#FF0000'> ".$cust_password."</font></td></tr>
		<tr><td height='5' colspan='3'></td></tr>
		<tr><td height='5' colspan='3'></td></tr>
		<tr><td>Thanks & Regards <br><font color='#FF0000'>MY POS</font></td></tr>
		<tr><td height='10' colspan='3'></td></tr>
		</table>";
		$mail = new PHPMailer;
		$mail->SMTPDebug = 4;                               // Enable verbose debug output
		$mail->IsSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';               // Specify main and backup server
		$mail->Port = 587;                                    // Set the SMTP port
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'jenish.aswin@gmail.com';           // SMTP username
		$mail->Password = 'jenishASWIN8152';                       // SMTP Password
		$mail->SMTPSecure = 'tls';						  // Enable encryption, 'ssl' also accepted
		$mail->From = '' .$fromemail. '';
		$mail->FromName = 'My POS';
		$mail->AddAddress('' .$enquiry_email. '','' .$enquiry_name. ''); 
		//$mail->AddCC('karthik.v@zoyosolutions.com', 'Karthick');
		//$mail->AddCC('person2@domain.com', 'Person Two');

		$mail->IsHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Acknowledgment Mail';
		$mail->Body    = '<strong>' .$content. '</strong>';
		if(!$mail->Send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   //exit;
		}
	}  
    else
    {
        echo "1"; //  not available
    }  	
}
if($_POST["cust_poslogin"]=='active')
{
	$login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    //$cust_password = $_POST['cust_password'];
    //$confirm_password = $_POST['confirm_password'];
    //echo "select *from tbl_customer where cust_emailid1='".$login_email."' and cust_password='".$login_password."' and status='1' "; 
	//exit;
    date_default_timezone_set('Asia/Calcutta'); 
	$date = date('Y-m-d'); 
	$res=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_customer where cust_emailid1='".$login_email."' and cust_password='".$login_password."' and status='1' "));
	$ncount=mysqli_num_rows(mysqli_query($conn, "select *from tbl_customer where cust_emailid1='".$login_email."' and cust_password='".$login_password."' and status='1' "));
    //$n = mysqli_query($conn, "update tbl_customer set cust_password='$cust_password',joining_date='$date',status='1' where customer_id='".$_POST["customer_id"]."'");
    if($ncount=='1')
	{ 
        $_SESSION["posuserfirstname"]=$res["cust_fname"];
		$_SESSION["posuserlastname"]=$res["cust_lastname"];
		$_SESSION["posuserid"]=$res["cust_id"] ;
		$_SESSION["posloginid"]=$res["customer_id"];
        echo "success"; //  available 
	}  
    else
    {
        echo "1"; //  not available
    }  	
}
?>
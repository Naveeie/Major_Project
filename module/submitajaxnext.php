<?php include'config.php'; ?>
<?php 
	 //error_reporting(0);
	 date_default_timezone_set('Asia/Kolkata');
	 $date = date('Y-m-d');
    
	 
	 if($_POST['enquirymessagevalue']!='')
	 {
		$fulldescription='';
		$to='jenish.aswin@gmail.com';
		$subject = "FUTURE TECH WIDE";			
		$fromname1='Enquiry from FTW ';
		$from1='green283828@gmail.com';
		$headers  = 'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
		$headers .='From: '.$fromname1.' <'.$from1.'>'. "\r\n";
		//$headers .= 'Cc: sybizsolutions@gmail.com' . "\r\n";
		//$headers .= 'Cc: shrisudersan@gmail.com' . "\r\n";
		//$headers .= 'Cc: sybizsolutions@gmail.com' . "\r\n";
	
		$resultmail = mail($to,$subject,$fulldescription,$headers);
		if(!$resultmail) {   
			 echo "Error";   
		} else {
			
		}		 
	 }
	 if($_POST['deletelodgerbook']!='')
	 {
		 //echo $_GET['academicyearvalue'];
		 $n=mysqli_query($conn, "delete from tbl_expense_entry where expenseentryid = '".$_POST["deletelodgerbook"]."'");
	     		 
	 }
	 if($_POST['deletecashbook']!='')
	 {
		 $n=mysqli_query($conn, "delete from tbl_cashbook_entry where cashbookid = '".$_POST["deletecashbook"]."'");		 
	 }
	 if($_POST['consultantadd']!='')
	 {
		 //echo "INSERT INTO tbl_patient_consultant(pregister_id,consultdate,doctorname,issue,fees,nextappointment,status,date) VALUES
							//('".$_POST["consultantadd"]."','".$_GET['consultdate']."','".$_GET['doctorname']."','".$_GET['issue']."','".$_GET['fees']."','".$_GET['nextappointment']."','1','$date')";
		 $n = mysqli_query($conn, "INSERT INTO tbl_patient_consultant(pregister_id,consultdate,doctorname,issue,fees,nextappointment,status,date) VALUES
							('".$_POST["consultantadd"]."','".$_GET['consultdate']."','".$_GET['doctorname']."','".$_GET['issue']."','".$_GET['fees']."','".$_GET['nextappointment']."','1','$date')"); 		 
	     $n=mysqli_query($conn , "update tbl_patientregister set appointment='".$_GET['nextappointment']."' where pregister_id='".$_POST['consultantadd']."' ");		 
	 }
	 if($_POST['deleteconsultants']!='')
	 {
		 $n=mysqli_query($conn, "delete from tbl_patient_consultant where patientconsultid = '".$_POST["deleteconsultants"]."'");		 
	 }
	  if($_POST['consultantedit']!='')
	 {
		 $resa=mysqli_fetch_assoc(mysqli_query($conn, "select *from tbl_patient_consultant where patientconsultid='".$_POST['consultantedit']."'"));
		 //echo "update tbl_patient_consultant set consultdate='".$_GET['consultdate']."',doctorname='".$_GET['doctorname']."',issue='".$_GET['issue']."',fees='".$_GET['fees']."',nextappointment='".$_GET['nextappointment']."' where patientconsultid='".$_POST['consultantedit']."' ";
		 $n=mysqli_query($conn , "update tbl_patient_consultant set consultdate='".$_GET['consultdate']."',doctorname='".$_GET['doctorname']."',issue='".$_GET['issue']."',fees='".$_GET['fees']."',nextappointment='".$_GET['nextappointment']."' where patientconsultid='".$_POST['consultantedit']."' ");		 
	     $n=mysqli_query($conn , "update tbl_patientregister set appointment='".$_GET['nextappointment']."' where pregister_id='".$resa['pregister_id']."' ");
	 }
	  if($_POST['groupvalueadd']!='')
	 {
		//echo "update tbl_patientregister set group".$_POST['groupvalueadd']."='".$_GET['statusname']."',groupdate".$_POST['groupvalueadd']."='".$_GET['renewaldates']."' where pregister_id='".$_POST['groupvalueadd']."' ";
		//exit;
		 $n=mysqli_query($conn , "update tbl_patientregister set group".$_POST['groupvalueadd']."='".$_GET['statusname']."',groupdate".$_POST['groupvalueadd']."='".$_GET['renewaldates']."' where pregister_id='".$_GET['ppregidname']."' ");		 
	   
	 }
	 
 ?>
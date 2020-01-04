<?php 


include"header.php";?>


	<?php 






if(!isset($_SESSION['cusid'])) {
	
?>

														<script type="text/javascript">
<!--
function Redirect() {
window.location="login.php";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 0;
//-->
</script>
<?php
	
} 

?>



<div class="container">


		<div class="row">
		
		
		
		
		
		
		
		
		

<?php 
							if(isset($_POST["submit"])){
								
															
								$f_service = $_POST["service"];
								
								
								$DATE = $_POST["date"];
								
								$time = strtotime($DATE);

								$DATE = date('Y-m-d',$time);
								
								
								$uid = $_SESSION['cusid'];
								$time = $_POST["time"];
								
								$name = $_SESSION['cusname'];
	
								$email = $_SESSION['email'];

								$mobile = $_SESSION['phone'];
								
								$paymenttype = $_POST["payment_type"];
	
								$acc_nmbr = $_POST["acc_nmbr"];
								$invid = rand(1000000,9999999);
								if($paymenttype=="bkash"){
			
									$transaction_nmbr = $_POST["tnsaction_id"];
								}
								else{
									$transaction_nmbr= "Cash On";
								}
								
								$query = "Select discounted_price from services where service_name = '$f_service'";
								 $run_query = mysqli_query($con,$query);
								
											while($row=mysqli_fetch_array($run_query))
											{
											$discounted_price = $row['discounted_price'];

											}
								
							
		
		
	
	$name1 = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
								
								
								
			if(!preg_match($name1,$name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $name is not valid..!</b>
			</div>
		";
		exit();
	}
	
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}					
								
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 11 or strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 11 digit</b>
			</div>
		";
		exit();
	}							
	
else

	{
		
	
								
								
														
								
						        
 $query=mysqli_query($con, "INSERT INTO appointment (name,service,date,mobile,email,user_id,time,appointment_type,type,transaction_no,acc_no,invid,total) VALUES ('$name','$f_service','$DATE','$mobile','$email','$uid','$time','0','$paymenttype','$transaction_nmbr','$acc_nmbr','$invid','$discounted_price')");	
							
								
								 if ($query) {
    
	
	?>

<center>
		<h2> Thank you. Your appoinment is under review. We will contact with you later. Keep an eye to see your appointment status on your profile.</h2>
		<br/>
		<a href="order_invoice1.php?Print_id= " class="btn btn-success">View Invoice</a>
		
		</center>

<?php
	
	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

		

 
// Close connection
mysqli_close($con);



	}
							}
							
							
							?>
							
		
		
		<?php 
							if(isset($_POST["submit1"])){
								$address = $_POST["address"];
							$service = $_POST["service"];
								
								
								$date = $_POST["date"];
								$time = strtotime($date);

								$date = date('Y-m-d',$time);								
								
								$uid = $_SESSION['cusid'];
								$time = $_POST["time"];
								
								
								$name = $_SESSION['cusname'];
	
								$email = $_SESSION['email'];

								$mobile = $_SESSION['phone'];
								
								$paymenttype = $_POST["payment_type"];
								$serv_id = $_POST["serv_id"];
								
								$acc_nmbr = $_POST["acc_nmbr"];
								$invid = rand(1000000,9999999);
								if($paymenttype=="bkash"){
			
									$transaction_nmbr = $_POST["tnsaction_id"];
								}
								else{
									$transaction_nmbr= "Cash On";
								}
								
								$query = "Select discounted_price from services where service_name = '$service'";
								 $run_query = mysqli_query($con,$query);
								
											while($row=mysqli_fetch_array($run_query))
											{
											$discounted_price = $row['discounted_price'];

											}
	
	$name1 = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";	
								
								
								
	if(!preg_match($name1,$name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>No</b>
			</div>
		";
		exit();
	}

	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This $email is not valid..!</b>
			</div>
		";
		exit();
	}					
								
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 11 or strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 11 digit</b>
			</div>
		";
		exit();
	}							
	
else

	{							
								
								
								
								
								
								
								
								
						        
							$query=mysqli_query($con,"INSERT INTO appointment (name,service,date,mobile,email,user_id,time,appointment_type, Address,type,transaction_no,acc_no,invid,total) VALUES ('$name','$service','$date','$mobile','$email','$uid','$time','1','$address','$paymenttype','$transaction_nmbr','$acc_nmbr','$invid','$discounted_price')");	
						
								
								if($query){
    ?>

<center>
		<h2> Thank you. Your appoinment is under review. We will contact with you later. Keep an eye to see your appointment status on your profile.</h2>
		<br/>
		<a href="order_invoice1.php?Print_id= " class="btn btn-success">View Invoice</a>
		
		</center>

<?php
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);

	}}
							
							
							
							?>
		
		
		
		
		
		
		
		
		
		
		
			
			
			  
			  
			  	
							

					   
			

		</div>

         </div>

</div>

	



<?php include"footer.php";?>
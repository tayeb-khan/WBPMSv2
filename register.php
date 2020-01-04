
	<?php 
		 include "header.php";
		 
		 ?>

<!DOCTYPE html>
<html>
<head>
	<title> User registration from </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body background ="img/background.jpg">
</br></br></br></br></br></br></br>
<div class="box_reg">
<?php 
		 include "db.php";
		 // include "header.php";

		 
		 if(isset($_POST["reg"])){
			 
			 $username = $_POST["name"];
			 $email = $_POST["email"];
			 $address = $_POST["address"];
			 $phone = $_POST["phone"];
			 $password = $_POST["pass"];
			 $password = md5($password);
			 
			 
			 $tmsql = "select * from users where email = '$email' ";
											$tre1 = mysqli_query($con,$tmsql);
											$number1 = mysqli_num_rows($tre1);
								  
								  if( $number1 > 0)
								  {
									  echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b style='color:red;'>Registration with username ".$email."  already exist.</b>
															</div></center>
														";
						
								  }
								  else{
									  
									  $sql = "INSERT INTO `users`
													(`username`, `email`, `address`, `password`, `phone`) 
													VALUES ('$username','$email','$address','$password','$phone')";
													if (mysqli_query($con,$sql)) {
														echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b style='color:green;'>Registration is successfull!</b>
															</div></center>
														";
														?>

														<script type="text/javascript">
															<!--
															function Redirect() {
															window.location="index.php";
															}
															
															setTimeout('Redirect()', 2000);
															//-->
															</script>


															<?php




													}
									  
								  }
			  
			 
		 }
		 
		 
		 ?>
	<h2>Registration</h2>
	<form action="" method="post">
		<div class="inputbox">

			<input type="text" name="name" required="" autocomplete="off">
			<label>Username</label>
			
			
		</div>
		
		<div class="inputbox">

			<input autocomplete="off" type="text" pattern="(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)" title="abc@gmail.com" name="email" required="">
			<label>Email</label>
			
			
		</div>
		<div class="inputbox">

			<input type="text" name="address" required="" autocomplete="off">
			<label>Address</label>
			
			
		</div>
		<div class="inputbox">

				<input type="text" name="phone" pattern="^01[567398][0-9]{8}" title="11 digits" required="" autocomplete="off">
			<label>Phone No</label>
			
			
		</div>
		
		<div class="inputbox">
			<input type="password" name="pass" required="" autocomplete="off">
			<label>Password</label>
			
		</div>
		<center>
		<input type="submit" class="btn btn-primary" name="reg" value="Register"><br><br>
		</center>

		</form>	
	   </div>
		 
		
</div>

</body>
</html>
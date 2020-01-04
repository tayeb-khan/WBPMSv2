<?php include "header.php";
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 style="color:#a51349">Parlour Information</h1>
				<p><b>Address:</b>Uttara 1230  Sector-10 Road-12.</p>
				<p><b>Email:</b>Service@gmail.com.</p>
				<p><b>Phone No:</b>+88 01773 257 139,+88 01755 174 090.</p>
				
			</div>
			<div class="col-md-6">
				<div class="contact-title">
					<center><h2 h2 style="color:#a51349">Contact Us</h2></center>
					
				</div>
				<div class="contact-form">
					<form id="contact-form" method="post" action="">
						<input type="text" name="name" class="form-control" placeholder="Your Name" >
						<br>
						<input type="text" name="mobile" class="form-control" pattern="/^01[3|4|5|6|7|8|9][0-9]{8}+$/"placeholder="Your mobile no" >
						<br>
						<input type="email" name="Email" class="form-control" placeholder="Your Email" >
						<br>
						<textarea name="message" class="form-control" placeholder="Your Message" ></textarea>
						<br>					
							<input type="submit" name="send" class="formhf" value="Send Message">
					</form>
				</div>
				
				
				
				
				
				
				
				<?php
				
				include"db.php";
				if(isset($_POST["send"]))
					
					{
						$name= $_POST["name"];
						$mobile= $_POST["mobile"];
						$email= $_POST["Email"];
						$message= $_POST["message"];
					


                     if( $name == '' || $mobile == ''|| $email == '' || $message == ''  )
					 {
									echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Please fill up the form first</b>
															</div></center>
														";
					 }

else

{	
						$sql = "INSERT INTO `message`
													(`name`, `mobile`,`email`, `message_body`) 
													VALUES ('$name','$mobile','$email','$message')";
													if (mysqli_query($con,$sql)) {
														echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Your Message is sent Successfully..!</b>
															</div></center>
														";
														
														
														
													}
}
						
					}
				
				?>
			</div>

			
		</div>
		
	</div>
	
	

	</div>
	<?php include"footer.php";?>
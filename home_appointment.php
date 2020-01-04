<?php
session_start();
error_reporting(0);
include('db.php');
if (!isset( $_SESSION['cusid'])) {


	?>
<script>

  alert('Please Login to Place an Appointment');
window.location="login.php";
</script>
<?php
}
include('header.php');

?>
 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>

	<br><br>
<div class="container">
	<div class="row">
		
		<div class="col-md-5" style="padding:0px;">
			<div class="app">
			<img src="img/hiclipart.com-id_yddch.png">
		   </div>
			
		</div>
		
		
		
		
		<?php
		
		if(!isset($_GET["id"]))
			
			{  ?>
				
				
			<div class="col-md-7" style="padding:0px;">
		
			<div class="box1">
	       <h2>Make a Home Appointment</h2>
		   
		
		  <form method="post"> 
		 
		 <label style="color:#fff;">Select a service</label>
		   <div class="inputbox">
			
			
			<select name="service">
			  
			  
			  <?php 
			    
						$product_query = "SELECT service_name,price FROM services ";
						$run_query = mysqli_query($con,$product_query);
				if(mysqli_num_rows($run_query) > 0){
				
				while($row = mysqli_fetch_array($run_query)){
					$serv_id    = $row['service_id'];
					$service  = $row['service_name'];
					$price  = $row['price'];
			
			?>
				
				
			 
			  
			  <option  value="<?php echo $service ;?>"><?php echo $service ;?> </option>
			  
			  
	<?php } }?>
			  
			</select>
			<input type="hidden" name="serv_id" value="<?php echo $serv_id ;?>" required="">
			
			 <input type="hidden" value="<?php echo $price ;?>" name="price">
			</div>
		<div class="inputbox">
			<input type="text" id="select_date" placeholder="Pick a date" name="date" required="">
			
		</div>
		
		<div class="inputbox">
			<input type="time" name="time" required="">
			
		</div>
		
			
			 <input type="hidden" value="<?php echo $price ;?>" name="price">



		<div class="inputbox">
			<input type="text" name="address" required="">
			<label>Address</label>
			
		</div>
		
					<div class="inputbox">

			<input type="submit" name="next" value="Submit">
			</div>
		</div>
		
	</form>
	<?php 
	
	?>
	
	
	
	
</div>

  
		  
		</div>
			
		<?php	}
		
		
		?>
		
		<?php 
					   if(isset($_POST["next"]))
						   
						   {
							   $address = $_POST["address"];
								$serv_id = $_POST["serv_id"];
							$service = $_POST["service"];
								
								
								$date = $_POST["date"];
								
								$time = $_POST["time"];
								
								$now = new DateTime();
							   $date_now = $now->format('m/d/Y');    
							   $time_now = $now->format('H:i'); 
							   
							   if($date<$date_now){
								   if($time<$time_now){
									  echo "
							<center> <div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>You entered previous date and time..!</b>
							</div></center>
							";
								   }
								   
								   else{
									   									  echo "
							<center> <div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>You entered previous date..!</b>
							</div></center>
							";
								   }
							   }
							   else{
							
						   
							   
					   
					   ?>
                           <div class="row">
                               
                              
                               
                               <!-- Payment Method -->
                               <div class="col-12 >
							   
							   
							  <aside class="col-sm-12" style="background-color:#f0faff;color:red;">
									<center> 	<h3>Payment Option</h3> </center> <hr/>

										<article class="card" style="background-color:#d2d2d2;">
										<div class="card-body ">

										<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
												
											<li class="nav-item">
												<a class="nav-link active" data-toggle="pill" href="#nav-tab-paypal">
												<i class="fab fa-paypal"></i>  Bkash</a></li>
												<li class="nav-item">
												<a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
												<i class="fa fa-university"></i>  Cash On</a></li>
											
										</ul>

										
										
										
										<div class="tab-content">
										
										
										
										
											
											
										 <!-- tab-pane.// -->
										<div class="tab-pane fade show active" id="nav-tab-paypal">
										
										<form action="success.php" method="post">
										<h4 style="color:green;"> Our Bkash Number  <b style="color:red;">  01568965897  </b>  </h4>
										<p> Send money to this number </p>
										
										<input type="hidden" class="form-control" name="address"  value="<?php echo $address ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="serv_id"  value="<?php echo $serv_id ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="service"  value="<?php echo $service ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="date"  value="<?php echo $date ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="time"  value="<?php echo $time ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
									
										
										<input type="hidden" class="form-control" name="payment_type"  value="bkash"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
											
											
											<div class="form-group row"><label class="col-sm-2 col-form-label" style="color:#444;">Your Bkash number</label>
                                                <div class="col-sm-10"><input type="text" name="acc_nmbr" class="form-control" placeholder=" Bkash number" required ></div>
                                            </div>
											
											<div class="form-group row"><label class="col-sm-2 col-form-label" style="color:#444;">Your Transaction Id</label>
                                                <div class="col-sm-10"><input type="text" name="tnsaction_id" class="form-control" placeholder=" transaction id" required ></div>
                                            </div>
											
											
											
											<div class="input-group mb-3">
											 
											  <input type="submit" class="form-control btn btn-success" name="submit1"  value=" Confirm Payment"   aria-label="Default" aria-describedby="inputGroup-sizing-default"  style="background-color:green;color:yellow;">
											</div>
											
										</form>
										</div>
										
										
										
										<div class="tab-pane fade" id="nav-tab-bank">
										<form action="success.php" method="post">
										
											
										<input type="hidden" class="form-control" name="address"  value="<?php echo $address ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="serv_id"  value="<?php echo $serv_id ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="service"  value="<?php echo $service ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="date"  value="<?php echo $date ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
										<input type="hidden" class="form-control" name="time"  value="<?php echo $time ;?>"   aria-label="Default" aria-describedby="inputGroup-sizing-default" >
										
									
										<input type="hidden" name="acc_nmbr" class="form-control"  value="0" placeholder=" Bkash number">
										<input type="hidden" name="tnx_id" class="form-control" value="none" placeholder=" transaction id">
										
										
				   
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment_type" value="cash on" required>
                                    Cash On delivary
                                </label>
                            </div>
                        </li>
                      
					<div class="input-group mb-3">
											 
											  <input type="submit" class="form-control btn btn-success" name="submit1"  value=" Confirm Payment"   aria-label="Default" aria-describedby="inputGroup-sizing-default" style="background-color:green;color:yellow;">
											</div>
					</form>
					
					
										</div> 
										
										
										 <!-- tab-pane.// -->
										</div> <!-- tab-content .// -->

										</div> <!-- card-body.// -->
										</article> <!-- card.// -->


	</aside> <!-- col.// -->
							   
							   
                               
                                  
                           
                                   
                                   
                                   
                               </div>
                               
                           </div>
						   
						   <?php 
						   }}
						   ?>
		
		
		
	</div>
</div>



<script type="text/javascript">
	$(function () {
		$("#select_date").datepicker({
		format: "YYYY-MM-DD",
		autoclose:true,
		todayHighlight:true,
		showOtherMonths:false,
		selectOtherMonths:false,
		autoclose:true,
		minDate:0
		});
	});
</script>
<?php include"footer.php";?>
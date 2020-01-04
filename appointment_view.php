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
		<div class="col-md-2">
		
		
		
		
		
		
		
		


		
		

			</div>
			
			<?php 
					   
					   if(isset($_GET["del"]))
						   
						   {
							   
							  $id = $_GET["del"];

								$sql = "UPDATE appointment set status = 4 WHERE id = '$id' ";
													if (mysqli_query($con,$sql)) {
														echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Service is Cancelled Successfully..!</b>
															</div></center>
														";
														
														
														?>
														
												<script type="text/javascript">
<!--
function Redirect() {
window.location="appointment_view.php";
}

setTimeout('Redirect()', 1000);
//-->
</script>		
														
														
														<?php
														exit();
													}
							   
							   
							   
							   
						   }
					   
					   ?>
			
			  
			  
			  	
							<?php 
							
							
							$id = $_SESSION['cusid'];
							$product_query = "SELECT * FROM appointment where user_id = $id";
							$run_query = mysqli_query($con,$product_query);
							if(mysqli_num_rows($run_query) > 0){?>
								<div class="col-cd-6">
			<br><br> 
			  <center> <h3> Your appointment Details  </h3></center><hr/>
			  
							<table class="table">
  <thead>
      <tr>
        <th>SL</th>
        <th>Date </th>
        <th>Time</th>
		<th>service</th>		
		<th>Status</th>
		
		
      </tr>
    </thead>
    <tbody>
		<?php 
			$sl = 0;
										while($row = mysqli_fetch_array($run_query)){
											$sl++;
											$id   = $row['id'];
											$date   = $row['date'];
											$time = $row['time'];
											$service = $row['service'];
											$status = $row['status'];
											?>
							

							
							
							
										  <tr>
											<td><?php echo $sl; ?></td>
											<td><?php echo date("F d, Y ", strtotime($date)) ?></td>
											<td><?php echo date(" h:i A", strtotime($time)) ?></td>
											<td><?php echo $service; ?></td>
											<td><?php 
											
											if($status==0)
											{
												echo" <a class='btn btn-danger'>Pending<a/>";
												
												if($status==0)
												{?>
													<a href="appointment_view.php?del=<?php echo $id;?> " class="btn btn-primary"> Cancel</a>
												<?php } 
											}
											if($status==1)
											{
												echo"<a class='btn btn-success'> confirmed<a/>";
											}
											if($status==2)
											{
												echo" <a class='btn btn-primary'>Rejected </a>";
											}
											if($status==3)
											{
												echo" <a class='btn btn-success'>Completed </a>";
											}
											if($status==4)
											{
												echo" <a class='btn btn-primary'>Cancelled </a>";
											}


											
											if($status!=4)
											{?>
												<a href="order_invoice.php?Print_id=<?php echo $id;?> " class="btn btn-success"> Invoice</a>
											<?php } ?>
											
											</td>
											 
											
										  </tr>
										  
							
							
							<?php
		}
							}
							else
							{?>
								<div class="h1"><br><h1>🤵:> You have no appointment</h1></div><br><br><br><br><br><br><br><br><br>
							<?php }
							?>
				
					
					 </tbody>
  </table>

					   
			

			</div>

         </div>

</div>

	



<?php include"footer.php";?>
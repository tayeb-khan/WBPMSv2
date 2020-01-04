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
							
							$date = date("Y-m-d");
							$tomorrow = date("Y-m-d", strtotime('tomorrow'));
							$beauty_id = $_SESSION['beauty_id'];
							$product_query = "SELECT * FROM appointment where (date(appointment.date) between '$date' and '$date') and beautician = $beauty_id ";
							$run_query = mysqli_query($con,$product_query);
							if(mysqli_num_rows($run_query) > 0){?>
								<div class="col-cd-6">
			<br><br> 
			  <center> <h3> Today's Schedule  </h3></center><hr/>
			  
							<table class="table">
  <thead>
      <tr>
        <th>SL</th>
        <th>Customer Name</th>
        <th>Date </th>
        <th>Time</th>
		<th>Service</th>		
		<th>Status</th>		
		
		
      </tr>
    </thead>
    <tbody>
		<?php 
			$sl = 0;
										while($row = mysqli_fetch_array($run_query)){
											$sl++;
											$id   = $row['id'];
											$name   = $row['name'];
											$date   = $row['date'];
											$time = $row['time'];
											$service = $row['service'];
											$status = $row['status'];
											?>
							

							
							
							
										  <tr>
											<td><?php echo $sl; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo date("F d, Y ", strtotime($date)) ?></td>
											<td><?php echo date(" h:i A", strtotime($time)) ?></td>
											<td><?php echo $service; ?></td>
											<td><?php 
											
											if($row['status']==0)
												{
													echo" <a class='btn btn-default'>Pending<a/>";
												}
												if($row['status']==1)
												{
													echo"<a class='btn btn-success'>Accepted<a/>";
												}
												if($row['status']==2)
												{
													echo" <a class='btn btn-danger'>Rejected</a>";
												}
												if($row['status']==3)
												{
													echo" <a class='btn btn-success'>Completed</a>";
												}
												if($row['status']==4)
												{
													echo" <a class='btn btn-danger'>Cancelled</a>";
												}
												?>
											
											</td>
											
											
										  </tr>
										  
							
							
							<?php
		}
							
							}
							else
							{?>
								<div class="h1"><br><h1>🤵:> You have no appointment Schedule yet..!</h1></div><br><br><br><br><br><br><br><br><br>
							<?php }
							?>
				
					
					 </tbody>
  </table>

					   
			

			</div>

         </div>

</div>

	



<?php include"footer.php";?>
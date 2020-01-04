<?php include "header.php";?>
<div class="bg1">
	<img src="img/slider/11.jpg">
</div>
	
		
		
		<br> 		<br>
<div class="h1"><center><h1 style="color:#a51349"> Our Beauticians</h1></center></div><br><br><br>
		<div class="container">
				
				<div class="row">
						
							

							<?php 
							
							$product_query = "SELECT * FROM beautician ";
							$run_query = mysqli_query($con,$product_query);
							$sl=0;
							if(mysqli_num_rows($run_query) > 0){
		
										while($row = mysqli_fetch_array($run_query)){
											$sl++;
											$id   = $row['beauty_id'];
											$name   = $row['name'];
											$email = $row['email'];
											$mobile = $row['mobile'];
											$expert = $row['expert_area'];
											$from = $row['deauty_starts_on'];
											$to = $row['deauty_ends_on'];
											$image = $row['image'];
											
											?>
        <div class="col-md-6">
<center>
            <img alt="<?php echo $name;?>" src="images/beautician/<?php echo $image;?>" style="height:200px;width:300px;">

            <h3>Beautician Details</h3></center>
			<table>
				    <tr>  <th>Beautician Name:  </th> <td> <?php echo $name;?> </td>  </tr>
					 <tr>  <th>Email: </th> <td> <?php echo $email;?> </td>  </tr>
					 
					<tr>  <th>Expert Area:  </th> <td> <?php echo $expert;?></td>  </tr>
					<tr>  <th>Serving Time:	</th> <td><?php echo date(" h:i A", strtotime($from)); ?> -- <?php echo date(" h:i A", strtotime($to)); ?></td>  </tr>
					 
				  
				   
				  </table><br><br>

        
</div>
<?php
		}
							}
							?>
			
</div>
</div>
		<?php include"footer.php";?>
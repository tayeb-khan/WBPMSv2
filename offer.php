<?php include "header.php";?>

<div class="bg1">
	<img src="img/slider/bg2.jpg">
</div>
	<div class="h1"><center><h1 style="color:#a51349">OFFERS OF THIS WEEK</h1></center></div><br>
	<div class="container">

            <div class="row">
                                    <?php

$ret=mysqli_query($con,"select * from services where discount>0");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-md-4 col-sm-4 col-xs-12">


                    <div class="flip-box">
                       <div class="flip-box-inner">
                          <div class="flip-box-front">
                          	<?php 
											if($row['discount'] > 0)
											{
											?>
											<span class="new-label1"><?php echo $row['discount'] ;?>% OFF</span>
											
											<?php } ?>
                            <img src="images/<?php echo $row['image']; ?>" style="height:183px;width:300px;border-radius: 15%;">
                             <h3 style="color:#fdc00a"><?php echo $row['service_name']; ?></h3>
                             
                             
                            </div>
                         <div class="flip-box-back"></br></br>
                            <h2 style="color:#040404"><?php echo $row['service_name']; ?></h2>

                            <?php
                            if($row['discount']>0){
                                ?>
                                <h3 style="color:red"><Del> <?php echo $row['price'];?>Tk</h3>
                                    <h3 style="color:green"><?php echo $row['price'] - ($row['discount'] * $row['price'])/100; ?> Tk</h3>
                                
                                <?php
                            }
                            else{?>
                                <h3 style="color:green"><?php echo $row['price']; ?> Tk</h3>
                                <?php
                            }
                            ?>
							 <a href="details.php?id=<?php echo $row['service_id'] ;?>" class="btn btn-success">  Details</a>
                            <a href="appointment.php?id=<?php echo $row['service_id'] ;?>" class="btn btn-success">  Place Appointment</a>
                            
                         </div>
                        </div>
                    </div>
                    
                
                
            </div>
            <?php } ?>
        </div>
    </div>
		
		<!-- <div class="container">
			<div class="row">
				
				<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Service name</th>
        <th>Category</th>
		<th>Discount</th>
		<th>Price</th>
		<th>Action</th>
		
		
      </tr>
    </thead>
    <tbody>

							<?php 
							
							
							include"db.php";
							$product_query = "SELECT * FROM services ";
							$run_query = mysqli_query($con,$product_query);
							$sl=0;
							if(mysqli_num_rows($run_query) > 0){
		
										while($row = mysqli_fetch_array($run_query)){
											$sl++;
											$service_id   = $row['service_id'];
											$service_name   = $row['service_name'];
											$category_name = $row['category_name'];
											$price = $row['price'];
											$dicount = $row['discount'];
											$image=$row['image'];
											
											
											
											$dis = ($dicount*$price)/100;
											
											$price1 = $price - $dis;
											
											?>
							
							
							
							
										  <tr>
											<td><b><?php echo $sl; ?></td>
											<td><?php echo $service_name; ?></td>
											<td><?php echo $category_name;?></td>
											<td><?php echo $dicount; ?>%</td>
											<td>
											<?php
											if($dis > 0)
												
												{ ?>
													
													<strike style="color:red;"> <?php echo $price; ?> </strike>Tk &nbsp
												 
													<b style="color:green;"> <?php echo $price1; ?> </b> Tk
													
												<?php
												}
												
												
												?>
												
											<?php
											if($dis == 0)
												
												{ ?>
													
													
												 
													<b style="color:green;"> <?php echo $price; ?> </b> Tk
													
												<?php
												}
												
												
												?>
											
											
											
											</td>
											
											<td> <a href="appointment.php?id=<?php echo $service_id ;?>" class="btn btn-success">  Place Appointment</a>  </td>
										  </tr>
										  
							
							
							<?php
		}
							}
							?>
				
					
					 </tbody>
  </table>

			   
			    
				
			</div>
			
		</div> -->
		
		
		<br> 		<br>
			   
			    
<?php include"footer.php";?>
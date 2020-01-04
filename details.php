<?php include "header.php";?>

	<div id="page-wrapper">
	<div class="container">
		<br>

            <div class="row">
                                    <?php
									$sid = $_GET["id"];

$ret=mysqli_query($con,"select * from services where service_id = '$sid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	
	
	$service_id   = $row['service_id'];
											$service_name   = $row['service_name'];
											$category_name = $row['category_name'];
											$price = $row['price'];
											$dicount = $row['discount'];
											$image=$row['image'];
											$details=$row['details'];

											$dis = ($dicount*$price)/100;
											
											$price1 = $price - $dis;
?>
                 <div class="col-md-6">
				<img src="images/<?php echo $row['image']; ?>" style="height:300px;width:80%; border-radius: 20%;border: 1px solid #e30047; padding: 10px;">
				
				 
				  
				 
				  </div>
				  <div class="col-md-6">
				  
				 <div class="h1">
				 <center><h1 style="color:#a51349">SERVICE DETAILS</h1></center></div><br>
				  
				  <table>
				    <tr>  <th>Servie name:  </th> <td> <?php echo $service_name;?> </td>  </tr>
					 <tr>  <th>Category:  </th> <td> <?php echo $category_name;?> </td>  </tr>
					 
					<tr>  <th>Discount:  </th> <td> <?php echo $dicount;?> %</td>  </tr>
					<tr>  <th>Prize:  </th> <td> <?php
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
											 </tr>
					 
				  
				  
				  </table>
				  
				  
				  </div>
				  
				
				 </div> 
				 
				 
				 
				 </div class="col-md-12">
				 
				 <br/>
				 <div class="h1 container"><center> <h1> Description </h1></center></div>
				 <br>
				 
				 <?php echo $row["details"];?>
				 
				 
				 </div>
				 


                    
                
                
            </div>
            <?php } ?>
        </div>
    </div>
		
		
		
		
		<br> 		<br>
			   
			    
		
		<?php include "footer.php"; ?>
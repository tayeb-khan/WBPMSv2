<?php session_start();
error_reporting(0);
include('db.php');
include 'header.php';
?>


 <div class="background">
  	<img src="img/slider/4.jpg">
  </div>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<img alt="about" src="images/about.jpg" width="400px" height="300px">

                 </div>
		
		<div class="col-md-6">
		<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	          
	          	<h1 style="color:#a51349">
	          	<span><?php  echo $row['PageTitle'];?></span></h1>
	           
	          

							<p><?php  echo $row['PageDescription'];?>.</p>
							
						</div>

<?php } ?>
		
		</div>
		
	</div>


<?php  include"footer.php";?>

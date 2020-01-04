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


			
			
			<div class="col-md-12">
			<br><br>
			 <center><b> Hi <?php echo $_SESSION['cusname'] ?> </b> <h3> Welcome to Dashboard  </h3></center>
			

			</div>

         </div>

</div>

	



<?php include"footer.php";?>
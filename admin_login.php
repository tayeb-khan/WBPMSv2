<?php 


include "db.php";
include "header.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body background ="img/login.jpg">
<div class="box">
	<h2>Welcome to PMS Admin Login</h2>
	<?php 
	if (!empty($_POST)) {
                                    $name=$_POST['username'];
                                    $pass=$_POST['password'];
                                    $pass=md5($pass);

                                    if (!empty($name)) {
                                        $sel="SELECT * FROM admin WHERE email='$name' AND password='$pass'";
                                        $Q=mysqli_query($con,$sel);
                                        $log=mysqli_fetch_assoc($Q);
                                        if ($log) {

												$_SESSION['adminName']=$log['name'];
                                            	$_SESSION['adminId']=$log['id'];

                                            ?>

                                            <script type="text/javascript">
                                            	window.location.href='admin/index.php';
                                            </script>


                                            <?php

											exit();
                                        }
                                        else{?>

                                        <center><h6 style="color: red">Email or Password Wrong</h5></center>
                                        <?php
                                    }
                                    }
                                
                                else{
                                            echo "Please Enter Email and Password";
                                        }
	}
                            ?>
	
	<form action="" method="post">
		<div class="inputbox">

			<input type="text" name="username" required="" autocomplete="off">
			<label>Email</label>
			
			
		</div>
		<div class="inputbox">
			<input type="password" name="password" required="" autocomplete="off">
			<label>Password</label>
			
		</div>
		<center><input  class="btn btn-primary" type="submit" name="submit" value="Login"><br><br></center>
		
	</form>
	<a href="index.php">Back to Home Page</a><br>
	
</div>
 

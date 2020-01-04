<?php 


include "db.php";
include "header.php";?>

<!DOCTYPE html>
<html>
<head>
	<title> Login form</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body background ="img/login.jpg">
<div class="box">
	<h2>Login</h2>
	<?php 
	if (!empty($_POST)) {
                                    $name=$_POST['username'];
                                    $pass=$_POST['password'];
                                    $pass=md5($pass);

                                    if (!empty($name)) {
                                        $sel="SELECT * FROM users WHERE email='$name' AND password='$pass'";
                                        $Q=mysqli_query($con,$sel);
                                        $log=mysqli_fetch_assoc($Q);
                                        if ($log) {
                                           
											$_SESSION['type']=$log['type'];
											
											
											if( $_SESSION['type'] == 0)
											{
												
												$_SESSION['cusname']=$log['username'];
												$_SESSION['email']=$log['email'];
												$_SESSION['phone']=$log['phone'];
                                            	$_SESSION['cusid']=$log['id'];

                                            ?>

                                            <script type="text/javascript">
                                            	window.location.href='profile.php';
                                            </script>


                                            <?php

											exit();
                                        }
                                        if( $_SESSION['type'] == 1)
											{
												
												$_SESSION['cusname']=$log['username'];
                                            	$_SESSION['cusid']=$log['id'];
                                            	$_SESSION['userId']=$log['id'];

                                            ?>

                                            <script type="text/javascript">
                                            	window.location.href='admin/index.php';
                                            </script>


                                            <?php

											exit();
                                        }
                                        
                                    }else{?>

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
	<a href="register.php">Do not have an account! Create a new account?</a><br>
	
</div>
 

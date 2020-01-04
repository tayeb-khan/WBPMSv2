<?php 
	include"header.php";
	if (!isset($_SESSION["cusid"])) {
		header("location:login.php");
	}
	$id = $_SESSION["cusid"];
	if(isset($_POST['user_edit'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$password = md5($_POST['password']);
     
    $query=mysqli_query($con, "update  users set username='$username', email='$email', phone='$phone', address='$address', password='$password 'where id='$id' ");
    if ($query) {
    $msg="Category has been Updated.";


		
		
			
   
	}
	 else echo $con->error;
	}

	$user_query = "SELECT * FROM users where id = $id ";
	$run_query = mysqli_query($con,$user_query);
	$row = mysqli_fetch_array($run_query);
?>
<div class="container">
	<div class="row">
		<div class="col-md-12"><br>
			<h3 class="text-center page-header">Hi <?php echo $_SESSION["cusname"]; ?>, Welcome to your profile </h3>
		</div>
		<div class="col-md-12"><u><strong>Your profile details</strong></u></div>
	</div>
<?php if(!isset($_GET['vorders'])) { ?>
	<div class="row">
		<div class="col-md-12">
			<div style="margin: 2em 0">
			<?php if(!isset($_GET['edit'])){ ?>
				<table class="table">
					<tbody>
						<tr><td><strong>Name</strong></td><td><?= $row['username'] ?></td></tr>
						<tr><td><strong>Email</strong></td><td><?= $row['email'] ?></td></tr>
						<tr><td><strong>Mobile</strong></td><td><?= $row['phone'] ?></td></tr>
						<tr><td><strong>Address</strong></td><td><?= $row['address'] ?></td></tr>
					</tbody>
				</table>
				<p>
					<a href="appointment_view.php" class="btn btn-info">View appointment history</a>
					<a href="?edit" class="btn btn-success">Edit Profile</a>
				</p>
			<?php } else { ?>
				<form action="" method="post">
					<input type="hidden" name="user_edit" />
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="username" value="<?= $row['username'] ?>" class="form-control" required />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" required />
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="phone" value="<?= $row['phone'] ?>" class="form-control" required/>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea name="address" class="form-control" required><?= $row['address'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" />
					</div>
					<div class="form-group">
						<input type="submit" value="Edit" class="btn btn-success" />
					</div>
				</form>
			<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
</div>
<?php include"footer.php";?>
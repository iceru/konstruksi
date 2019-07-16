<?php 
	include "includes/config.php";
	ob_start();
	session_start();
	
	if(isset($_SESSION['admin_email'])) {
		header("location:datakonstruksi.php");
	}
	
	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$sql_login = mysqli_query($connection, "SELECT * FROM login WHERE email = '$email' AND password = '$password'");
	
	
		if(mysqli_num_rows($sql_login) > 0) {
			$row_admin = mysqli_fetch_array($sql_login);
			$_SESSION['admin_id'] = $row_admin['idadmin'];
			$_SESSION['admin_email'] = $row_admin['email'];
			header("location:datakonstruksi.php");
		}
	}

?>

<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/login.css">
	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body id="LoginForm">
	<div class="container">
		<a href="homepage.php"><h1 class="form-heading">CV. BENTENG MANDIRI</h1></a>
		<div class="login-form">
			<div class="main-div">
			<div class="panel">
				<h2>Admin Login</h2>
				<p>Please enter your email and password</p>
			</div>
			<form id="Login" method="POST">
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email Address" required>
				</div>
			
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>

			
				<button type="submit" name="submit" class="btn btn-primary">Login</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	mysqli_close($connection);
	ob_end_flush();
?>

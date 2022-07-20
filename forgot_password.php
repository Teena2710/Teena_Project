<?php
error_reporting(0);
session_start();
//require("conn.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						
					</div><br><br>
					<div class="card fat" style="height:300px;width:400px;align:center;margin-top:30%">
						<div class="card-body">
							<h4 class="card-title" align="center">Reset Password</h4>
							<form method="POST" action="otpverify.php" class="my-login-validation" novalidate="">
								<div class="form-group" style="height:100px;width:300px;margin-left:30px;">
									<label for="email">Enter E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="user" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>
								
								<div class="form-group m-0" >
									<button type="submit" name='submit' class="btn btn-primary btn-block" style="height:50px;width:300px;margin-left:30px;">
										Send My Password
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
<?php
echo"<br><br><br><br><br><br><br><br>";
include("footer.php");
?>
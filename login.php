<?php
session_start();
include "connection.php";
if (isset($_GET['uid']))
	$id = $_GET['uid'];
// $quiz_type = $_GET['examid'];}
if (isset($_GET['cat']))
	$cat = $_GET['cat'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://thumbs.dreamstime.com/b/white-brain-black-background-simple-vector-156636546.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style="background-color: black;">
					Student Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="uid" placeholder="Unique Id">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input type="submit" name="submit" style="cursor: pointer;" class="login100-form-btn">

						<button type="button" class="btn btn-info" onclick="location.href = 'guidelines/index.html'" style="margin-top: 12px;">Not Able to access quiz? Please read Info</button>
					</div>
					<div class="alert alert-danger" id="error" style="margin-top: 10px; display: none;">
						<strong>Invalid!</strong> .
					</div>
				</form>

			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
	$count = 0;
	$res = mysqli_query($link, "select * from students where uid='$_POST[uid]'");
	$count = mysqli_num_rows($res);
	if ($count > 0) {
?>
		<script type="text/javascript">
			document.getElementById("error").style.display = "block";
			document.getElementById("success").style.display = "none";
		</script>
		<?php
	} else {
		if ($id == $_POST['uid']) {
			mysqli_query($link, "insert into students values (NULL,'$_POST[username]','$_POST[uid]')");
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['cat'] = $cat;
		?>
			<script type="text/javascript">
				window.location.href = "select_examnew.php";
			</script>
			<?php
			?>
		<?php
		} else {
		?>
			<script type="text/javascript">
				document.getElementById("error").style.display = "block";
				document.getElementById("success").style.display = "none";
			</script>
<?php
		}
	}
}
?>
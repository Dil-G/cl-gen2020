<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];
?>

	<!DOCTYPE html>
	<html>

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Society</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<script src="../js/errors.js"></script>
		<link rel="stylesheet" href="../css/view.css " type="text/css">
		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link type="text/css" rel="stylesheet" href="../css/register.css">
		<link rel="stylesheet" href="../css/messages.css " type="text/css">
	</head>

	<body>
		<div id="nav2"></div>

		<div class="content">
			<div class="container">
				<h2><b>Societies</b></h2>
				<form action="../../src/A_addsocieties.php" method="POST">
					<hr>
					<label for="name"><b>Society</b></label>
					<input type="text" name="societyName" pattern="[a-zA-Z]+" required>


					<label for="TID"><b>Teacher in charge Username</b></label>
					<input type="text" id="username" name="TID" onblur="validateUsername(username.value)" required>
					<hr>
					<div>
						<button type="submit" class="registerbtn" name="regbtn">Save</button>
						<a href="admin_societies.php" class="cancel-btn">Cancel</a>

					</div>
				</form>

			</div>

		</div>

	</body>

	</html>

<?php } ?>
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
		<title>Categories</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/main.css">

		<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
		<link type="text/css" rel="stylesheet" href="../css/button.css">
		<link type="text/css" rel="stylesheet" href="../css/category.css">
	</head>

	<body>
		<div id="nav2"></div>
		<div class="content">

			<h1 style="color: #6a7480;">CATEGORIES</h1>

			<div class="scroll">
				<table>
					<tr>
						<td>
							<a href="sports.php">
								<div class="container">
									<form>
										<button class="add" type="submit" formaction="add_sport.php">Add Sport</button>
									</form>

									<img src="../../images/sport.png" width="110" height="100">
									<br>
									<br>
									<br>
									<h2><b>Sports</b></h2>
									<p>20</p>
								</div>
							</a>
						</td>
						<td>
							<a href="societies.php">
								<div class="container">
									<form>
										<button class="add" type="submit" formaction="add_society.php">Add Society</button>
									</form>

									<img src="../../images/society.png" width="110" height="100">
									<br>
									<br>
									<br>
									<h2><b>Society</b></h2>
									<p>25</p>
								</div>
							</a>
						</td>

					</tr>
				</table>
			</div>

		</div>

	</body>

	</html>

<?php } ?>
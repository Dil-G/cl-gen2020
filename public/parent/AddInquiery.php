<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] != 'parent') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];

?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Inquieries</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/main_stu.css">
		<link type="text/css" rel="stylesheet" href="../css/register.css">
		<link type="text/css" rel="stylesheet" href="../css/register2.css">
		<link type="text/css" rel="stylesheet" href="../css/view.css">
		<link type="text/css" rel="stylesheet" href="../css/register.css">
		<link type="text/css" rel="stylesheet" href="../css/messages.css">
		<link type="text/css" rel="stylesheet" href="../css/button.css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>

	<body>


		<div id="nav"></div>

		<div class=content>

			<h1>INQUIERY FORM</h1>
			<div class="container " style="padding: 10px 20px;">
				<br>
				<button type="submit"><a href="inquiries.php">View Inquieries</a></button>
				<hr>
				<form action="../../src/add_inquiry.php" method="POST">


					<label for="title"><b> Inquiry Title</b></label>
					<input type="text" id="title" name="title" placeholder="Type Inquiry ID.."  required>

					<label for="reciever"><b>Reciever's ID</b></label>
					<input type="text" id="reciever" name="reciever" placeholder="Type Inquier ID.." value = "<?php if (isset ($_GET['userID'])){echo $_GET['userID'];}?>"required>

					<label for="msge"><b> Message </b></label>
					<textarea id="msge" name="msge" placeholder="Write something.." style="height:200px" required></textarea>

					<button type="submit" class="registerbtn" id="add_inq" name="add_inq">Submit</button>
					<hr>

				</form>
			</div>


		</div>

	</body>

	</html>

<?php } ?>
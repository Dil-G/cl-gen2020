<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

         $userID = $_SESSION['userID'];
?> 
	<!DOCTYPE html>
	<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register Office Staff</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>

		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/register.css " type="text/css">
		<script src="../js/user.js"></script>
	</head>

	<body>
		<div id="nav2"></div>

		<div class="content">

			<div class="container">

				<h1>Register</h1>
				<hr>
				<form action="../../src/add_user.php" method="POST">

					<label for="userType"><b>User Type</b></label>
					<br>
					<br>
					<label class="radio"> <input type="radio" name="userType" value="student" onclick="getData('student')" required> Student
						<span class="checkmark"></span></label>
					<label class="radio"> <input type="radio" name="userType" value="teacher" onclick="getData('teacher')" required> Teacher
						<span class="checkmark"></span></label>
					<label class="radio"><input type="radio" name="userType" value="officer" onclick="getData('officer')" required> Officer
						<span class="checkmark"></span></label>
					<label class="radio"><input type="radio" name="userType" value="admin" onclick="getData('admin')" required> Admin
						<span class="checkmark"></span></label>

					<br>
					<br>
					<br>
					<hr>


					<label for="userid"><b>User ID</b></label>
					<input type="text" id="userid" name="userid" required>

					<label for="username"><b>Username</b></label>
					<input type="text" id="username" name="username" required>

					<label for="pwd"><b>Password</b></label>
					<input type="text" name="pwd" id="pwd" required>

					<hr>

					<div>
						<button type="submit" class="registerbtn" name="regbtn">Save</button>
						<a href="admin_users.php" class="cancel-btn">Cancel</a>
					</div>


					<hr>
			</div>
		</div>

	</body>

	</html>
<?php } ?>
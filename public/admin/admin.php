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
<title>Admin User List</title>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>

<link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/users.css">
<link type="text/css" rel="stylesheet" href="../css/button.css">
</head>
<body>
	<div id="nav2"></div>
		
		<div class="content">
		
		<h1>Admin User List</h1>
		<form class="search" action="register_stu.html">
		<input type="text" placeholder="Search.." name="search">
		<button type="submit">Search</button>
		</form>
		<br>
		<br>
		<br>
			  <div class="card">
			  <form>
					<button type="submit" formaction="admin_registerUser.php">Add Admin</button>
				</form>
				<br>
				<br>
				
				<hr>
				<table>
					<tr>
						<th>User ID</th>
						<th>User name</th>
						<th>Update Profile</th>
						<th>Delete Profile</th>
						
					</tr>
					<tr>
						<td>AAA</td>
                        <td>BBB</td>
                        <td><a class='btn editbtn' href = SProfile.php > Update </a> </td>
						<td><a class='btn dltbtn' href = # > Delete </a> </td
						
					</tr>
				</table>
				</div>
				
		</div>
		
</body>
</html>

	 <?php } ?>

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
		 include('../../src/view_societies.php');
?> 
	<!DOCTYPE html>
	<html>

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Societies</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<link rel="stylesheet" href="../css/view.css " type="text/css">
		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link type="text/css" rel="stylesheet" href="../css/register.css">
	</head>

	<body>
		<div id="nav2"></div>

		<div class="content">

			<h1 style="color: #6a7480;">SOCIETIES</h1>
			<form class="search" action="action_page.php">
				<input type="text" placeholder="Search.." name="search">
				<button type="submit">Search</button>
			</form>
			<br>
			<br>
			<br>
			<hr>
			<div class="card">
				<form>
					<button type="submit" formaction="add_society.php">Add Society</button>
				</form>
				<h2><b>SOCIETIES</b></h2>
				<hr>

				<table>



					<tr>
						<th>Society ID</th>
						<th>Society </th>
						<th>Teacher In Charge ID</th>
						<th>Update</th>
						<th>Deactivate</th>

					</tr>

					<?php
					while ($row = mysqli_fetch_assoc($result)) {

					?>

						<tr>
							<td><?php echo $row['societyID'] ?></td>
							<td><?php echo $row['societyName'] ?></td>
							<td><?php echo $row['tcrID'] ?></td>
							<?php
							echo "<td><a class='btn editbtn' href = updateSociety.php?societyID=".$row['societyID']." > Update </a> </td>";
						 ?>
							<?php 
							echo "<td><a class='btn dltbtn' href = # > Deactivate </a> </td>";
					 ?>
						</tr>




					<?php
					}


					?>


	</body>

	</html>

<?php } ?>
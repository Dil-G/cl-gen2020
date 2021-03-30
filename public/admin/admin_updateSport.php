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
<title>Sports</title>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>
<script src="../js/errors.js"></script>
<link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">
<link rel="stylesheet" href="../css/messages.css " type="text/css">
</head>
<body>
<?php
if (isset($_GET['sportID'])){
            require_once '../../config/conn.php';   
            $sportID = $_GET['sportID'];
            $sql = "SELECT * FROM csports where SportID='$sportID' ";
			$result = $conn->query($sql);
			$row=mysqli_fetch_assoc($result);
}

            ?>
	<div id="nav2"></div>
		
		<div class="content">

				<div class="container">
					<h2><b>SPORTS</b></h2>
					
					<form action="../../src/updateCategory.php" method="POST">
					
						<hr>

						<input type="hidden"  name="sportID" id="sportID" value="<?php echo $row['SportID'] ?>">
						<label for="sportname"><b>Sport</b></label>
						<!--<input type="text"  name="Sname" id="sportname" onblur="return validatesportsname(sportname.value)" required> -->
						<input type="text"  name="Sname" id="sportname" pattern="[a-zA-Z]+"  value="<?php echo $row['SportName'] ?>">
						
						
						<label for="TID"><b>Teacher in charge Username</b></label>
						<input type="text"  id="username" name="TID" onblur="validateUsername(username.value)"  value="<?php echo $row['tcrID'] ?>" required>

						<!--<label for="tID"><b>Teacher in charge ID</b></label>
						<input type="text"  name="tID" id="username" onblur="return validateUsername(username.value)" required>
						-->
					
						
						<hr>
					
					
						<div>
							<button type="submit" class="registerbtn" name="updateSport">Save</button>
							
							<a href="admin_sports.php" class="cancel-btn">Cancel</a>

                    	</div>
					</form>
					
				</div>
				
			</div>
		
		
</body>
</html>

	 <?php } ?>
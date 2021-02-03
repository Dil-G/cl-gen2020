<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
        }else if($_SESSION['userType'] != 'teacher'){
            header('Location: ../common/error.html');
     }else if(($_SESSION['userType'] == 'teacher') && ($_SESSION['teacherType'] == 'both')){

         $userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fees and Fines 5</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/errors.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">
<link rel="stylesheet" href="../css/messages.css " type="text/css">
   
</head>

<body name=top>

    <body>
        <div id="nav3"></div>
            <div class="content">
               
				<div class="container">
					<h2><b>Fees and Fines</b></h2>
					
					<form action="../../src/add_fees2.php" method="POST">
					
						<hr>

						


						<label for="feesid"><b>Teacher ID</b></label>
						<!--<input type="text"  name="Sname" id="sportname" onblur="return validatesportsname(sportname.value)" required> -->
						<input type="text"  name="FID" value = <?php  echo  $_SESSION['userID']?> readonly>
						
						<label for="SID"><b>Student ID</b></label>
						<input type="text"  id="username" name="SID" onblur="validateUsername(username.value)"  required>

                        <label for="TID"><b>Student Name</b></label>
						<input type="text"  id="username" name="Sname" pattern="['a-z''A-Z' ]+$" required>

                       <!-- <label for="TID"><b>Fee Type</b></label>
						<input type="text"  id="username" name="Ftype"  required> -->

						<label><b>Fee Type:</b></label>
					<br></br>
					<label> <input type="radio" name="Ftype" value="School" required> School</label>
					<label> <input type="radio" name="Ftype" value="Examination" required>Examination</label>
					<label><input type="radio" name="Ftype" value="Library" required>Library</label>


					<br></br>
					<br>
                         
                        <label for="TID"><b>Amount</b></label>
						<input type="text"  id="username" name="amount" pattern="[0-9]{3,4}"required>

                      <!--  <label for="TID"><b>Status</b></label>
						<input type="text"  id="username" name="Stats"  required> -->

						
						<label><b>Status:</b></label>
					<br></br>
					<label> <input type="radio" name="Stats" value="Paid" required>Paid</label>
					<label> <input type="radio" name="Stats" value="Not Paid" required>Not Paid</label>
					



					
						
						
						<hr>
					
					
						<div>
							<button type="submit" class="registerbtn" name="regbtn">Save</button>
							
							<a href="Tcr_fees4.php" class="cancel-btn">Cancel</a>

                    	</div>
					</form>
					
				</div>
				
			</div>
		
		
</body>
</html>

	 <?php } ?>
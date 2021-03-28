<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
		header('Location: ../common/loginFile.php?error='.$error);
		
    } else if ($_SESSION['userType'] != 'officer') {
		header('Location: ../common/error.html');
	} else {
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (!in_array("d1", $dutyID)) {
		header('Location: o_dashboard.php');
	  }else{
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Officer Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="../css/pop.css">
	<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="../js/pop.js"></script>
	<script src="../js/nav.js"></script>
	<script src="../js/errors.js"></script>
	<link type="text/css" rel="stylesheet" href="../css/main.css">
	<link type="text/css" rel="stylesheet" href="../css/messages.css">
	<link type="text/css" rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
</head>
<body>
    <div id="officeNav"></div>
    
    
    <div class="content">
        <div class="container">
            <form action="../../src/register.php" method="POST" onsubmit="return validateRegistration()">
                <h1>Add Officer Details</h1>
                <hr>

					<label for="officerid"><b>ID</b></label>
					<input type="text" placeholder="Enter ID" name="officerid" value = "<?php if (isset ($_GET['userID'])){echo $_GET['userID'];}?>" required>
					
					<label for="fname"><b>First Name</b></label>
					<input type="text" placeholder="Enter Name" name="fname" id="fname" onblur="checkFname(fname.value)">

					<label for="lname"><b>Last Name</b></label>
					<input type="text" placeholder="Enter Name" name="lname" id="lname" onblur="checkLname(lname.value)" >

					<label for="nic"><b>NIC</b></label>
					<input type="text" placeholder="Enter NIC" id="nic" name="nic" onblur="NIC(nic.value)"  >

					<label for="dob"><b>Date of Birth</b></label>
					<input type="date" placeholder="Enter Date of Birth" name="dob" id="date"  onblur="checkDate(date.value)" >

					<label><b>Gender:</b></label>
					<label> <input type="radio" name="gender" value="male" required> Male</label>
					<label> <input type="radio" name="gender" value="female" required> Female</label>
					<label><input type="radio" name="gender" value="other" required> Other</label>

					<br></br>
					<br></br>
					<br>
										
					<label for="address"><b>Residential Addresss</b></label>
					<input type="text" placeholder="Enter current address" name="address" id="street" onblur="checkStreet(street.value)">
					

					<label for="contactNo"><b>Contact Number</b></label>
					<input type="text" placeholder="Enter Contact Number" name="contactNo" id="contactNo"  onblur="contact(contactNo.value)">

					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" id="email" onblur="validateEmail(email.value)">

                    <label><b>User Duties :</b></label>
                    <br>
                    <br>
                    <br>
					<div class="checkbox-group"  required>
                    <label> <input type="checkbox" name="checkbox[1]" value="d1" id="d1" >User Management</label>
                    <br>
                    <br>
					<label> <input type="checkbox" name="checkbox[2]" value="d2" id="d2"  >Exam Result Management</label>
                    <br>
                    <br>
					<label> <input type="checkbox" name="checkbox[3]" value="d3"  id="d3" >Document Management</label>
                    <br>
                    <br>
					<label> <input type="checkbox" name="checkbox[4]" value="d4" id="d4"  >Request Management</label>
                    <br>
                    <br>
					<label> <input type="checkbox" name="checkbox[5]" value="d5"  id="d5" >NewsFeed Management</label>
                    <br><br>
					<label> <input type="checkbox" name="checkbox[6]" value="d6" id="d6"  >Class Management</label>
                    <br>
					</div>

					
					<hr>
					<div id="msg"></div>
					<div>
                        <button type="submit" class="registerbtn" name="officerReg">Save</button>
                        
                        <a href="o_officersList.php" class="cancel-btn">Cancel</a>

                    </div>
            	</form>
        	</div>
    	</div>
	</body>
</html>

	  <?php }} ?>
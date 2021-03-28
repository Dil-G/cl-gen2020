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
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/errors.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div id="nav2"></div>


    <div class="content">
        <div class="container">
            <form action="../../src/register.php" method="POST" onsubmit="return validateRegistrations()">
                <h1>Add Teacher Details</h1>
                <hr>

                <label for="name"><b>ID</b></label>
                <input type="text" placeholder="Enter ID" name="id" value="<?php if (isset($_GET['userID'])) {
																					echo $_GET['userID'];
																				} ?>" required>

                <label for="fname"><b> Name</b></label>
                <input type="text" placeholder="Enter Name" name="fname" id="fname" onblur="checkFname(fname.value)">
                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Name" name="lname" id="lname" onblur="checkLname(lname.value)">


                <label for="nic"><b>NIC</b></label>
                <input type="text" placeholder="Enter NIC" id="nic" name="nic" onblur="NIC(nic.value)">


                <label for="dob"><b>Date of Birth</b></label>
                <input type="date" placeholder="Enter Date of Birth" name="dob" id="date"
                    onblur="checkDate(date.value)">


                <label><b>Gender:</b></label>
                <br></br>
                <label> <input type="radio" name="gender" value="male" required> Male</label>
                <label> <input type="radio" name="gender" value="female" required> Female</label>
                <label><input type="radio" name="gender" value="other" required> Other</label>


                <br></br>
                <br>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" id="email"
                    onblur="validateEmail(email.value)">

                <label for="stuAddress"><b>Residential Addresss</b></label>
                <input type="text" placeholder="Enter current address" name="stuAddress" id="street"
                    onblur="checkStreet(street.value)">

                <label for="contactNo"><b>Contact Number</b></label>
                <input type="text" placeholder="Enter Contact Number" name="contactNo" id="contactNo"
                    onblur="contact(contactNo.value)">
<!-- 
                <label><b>Teacher Type:</b></label>
                <br>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[1]" id="t1" value="classTeacher"> Class Teacher</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[2]" id="t2" value="teacherIncharge"> Teacher In charge</label> -->

                <hr>
                <div id="msg"></div>
                <div>
                    <button type="submit" class="registerbtn" name="teacherReg">Save</button>

                    <a href="o_teachersList.php" class="cancel-btn">Cancel</a>
                </div>

            </form>

        </div>

    </div>


</body>

</html>


<?php } ?>
<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

            $_SESSION['teacherID']=$_GET['userID'];
            $teacherID=$_GET['userID'];
         include '../../src/user_list.php';

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
    <link type="text/css" rel="stylesheet" href="../css/view.css">
</head>

<body>
    <div id="nav2"></div>


    <div class="content">
        <div class="container">
            <form action="../../src/update_user.php" method="POST" onsubmit="return validateRegistrations()">
                <h1>Add Teacher Details</h1>
                <hr>
                <?php
                while($row=mysqli_fetch_array($res_teacher)){
                        ?>
                <label for="name"><b>ID</b></label>
                <input type="text" placeholder="Enter ID" name="id" value="<?php if (isset($_GET['userID'])) {
																					echo $_GET['userID'];
																				} ?>" required>

                <label for="fname"><b> Name</b></label>
                <input type="text" placeholder="Enter Name" name="fname" id="fname" value="<?php echo $row['fName']?>" onblur="checkFname(fname.value)">
                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Name" name="lname" id="lname" value="<?php echo $row['lName']?>" onblur="checkLname(lname.value)">


                <label for="nic"><b>NIC</b></label>
                <input type="text" placeholder="Enter NIC" id="nic" name="nic" value="<?php echo $row['nic']?>" onblur="NIC(nic.value)">


                <label for="dob"><b>Date of Birth</b></label>
                <input type="date" placeholder="Enter Date of Birth" name="dob" id="date"
                value="<?php echo $row['dob']?>" onblur="checkDate(date.value)">


                <label><b>Gender:</b></label>
                    <input type="text" placeholder="Enter Gender" name="gender" id="gender"
                        value="<?php echo $row['gender']?>">

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" id="email"
                value="<?php echo $row['email']?>" onblur="validateEmail(email.value)">

                <label for="stuAddress"><b>Residential Addresss</b></label>
                <input type="text" placeholder="Enter current address" name="stuAddress" id="street"
                value="<?php echo $row['address']?>" onblur="checkStreet(street.value)">


                <label for="contactNo"><b>Contact Number</b></label>
                <input type="text" placeholder="Enter Contact Number" name="contactNo" id="contactNo"
                value="<?php echo $row['contactNo']?>"  onblur="contact(contactNo.value)">

   

                <label for="duty"><b>Current Duties</b></label>
                <br>
                <br>
                <br>

                <?php ?>


                <?php
                            while ($rows = mysqli_fetch_assoc($result_type)) {
                            ?>

                <?php echo $rows['teacherType'] . "<br />" ?>

                <?php }
                        
                     ?>
                <hr>
                <h1 style="color:#656565;">Select to re-assign Duties</h1>
                <p>(Current Duties will be removed when Re-assigning)</p>
                <label><b>User Duties :</b></label>
                <br>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[1]" value="classTeacher">Class Teacher</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[2]" value="teacherIncharge">Teacher Incharge</label>
                <br>
                <br>

                <hr>
                <div id="msg"></div>
                <div>
                    <button type="submit" class="registerbtn" name="update_teacher">Save</button>

                    <a href="o_teachersList.php" class="cancel-btn">Cancel</a>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</body>

</html>

<?php } ?>
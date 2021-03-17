<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }
    else if($_SESSION['userType'] != 'officer'){
        header('Location: ../common/error.html');
    }
    else{      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (!in_array("d2", $dutyID)) {
         header('Location: o_dashboard.php');
        }
	?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>

    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">

    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/errors.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>

    <div id="officeNav"></div>
    <?php

				require_once '../../config/conn.php';

				$sql = "SELECT * FROM student where admissionNo='".$_GET['userID']."'";

                $res= mysqli_query($conn,$sql);
                
            

				if($res){
				//echo "Sucessfull";
				}
				else{
				echo"failed";	
				}
?>

    <div id="pg1">
        <div class="content">
            <div class="container" style="margin-left:250px;">
                <form action="../../src/o_addStudentDetails.php" onsubmit="return validateStudent()" method="POST"
                    enctype="multipart/form-data">
                    <h1>Add Student Details</h1>
                    <hr>
                    <?php
                    while($row=mysqli_fetch_array($res)){
                        ?>
                    <label for="stuID"><b>Admission Number</b></label>
                    <input type="text" placeholder="Enter ID"
                        value="<?php if (isset ($_GET['userID'])){echo $_GET['userID'];}?>" name="stuID" required>

                    <label for="stufName"><b>First Name</b></label>
                    <input type="text" placeholder="Enter First Name" name="stufName" id="fname"  value="<?php echo $row['fName']?>"
                        onblur="checkFname(fname.value)">

                    <label for="stumName"><b>Middle Name</b></label>
                    <input type="text" placeholder="Enter Middle Name" name="stumName" id="mname" value="<?php echo $row['mName']?>"
                        onblur="checkMname(mname.value)">

                    <label for="stulName"><b>Last Name</b></label>
                    <input type="text" placeholder="Enter Last Name" name="stulName" id="lname" value="<?php echo $row['lName']?>"
                        onblur="checkLname(lname.value)">

                    <label for="stuDob"><b>Date of Birth</b></label> <br>
                    <input type="date" placeholder="Enter Date of Birth" name="stuDob" id="date" value="<?php echo $row['dob']?>"
                        onblur="checkStuDate(date.value)">

                    <label for="stuAdStreet"><b>Residential Addresss - Street</b></label>
                    <input type="text" placeholder="Enter Number and street" name="stuAdStreet" id="street" value="<?php echo $row['adStreet']?>"
                        onblur="checkStreet(street.value)">

                    <label for="stuAdCity"><b>Residential Addresss - City</b></label>
                    <input type="text" placeholder="Enter City" name="stuAdCity" id="city" value="<?php echo $row['adCity']?>"
                        onblur="checkCity(city.value)">

                    <label for="stuAdDistrict"><b>Residential Addresss - District</b></label>
                    <select name="stuAdDistrict" id="district" onblur="checkDistrict(district.value)">
                        <option  value="<?php echo $row['userID']?> "> <?php echo $row['adDistrict']?></option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                    <br><br>


                    <label for="stuReligion"><b>Religion</b></label>
                    <select name="stuReligion" id="religion" onblur="checkReligion(religion.value)">
                        <option value="<?php echo $row['userID']?>"><?php echo $row['religion']?></option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christian">Christian</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Islam">Islam</option>
                        </select>
                    <br><br>

                    <label for="stuEnteredGrade"><b>Entered Grade</b></label>
                    <input type="text" placeholder="Enter Grade Entered" name="stuEnteredGrade" id="grade" value="<?php echo $row['enteredGrade']?>"
                        onblur="checkGrade(grade.value)">

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" value="<?php echo $row['email']?>"
                        onblur="validateEmail(email.value)">

                    <label for="contactNo"><b>Contact Number</b></label>
                    <input type="text" placeholder="Enter Contact Number" name="contactNo" id="contactNo" value="<?php echo $row['contactNo']?>"
                        onblur="contact(contactNo.value)">
                    <br>
                    <label><b>Gender:</b></label>
                    <input type="text" placeholder="Enter Gender" name="gender" id="gender" value="<?php echo $row['gender']?>"
                     >
                  

                    <div id="showNIC">
                        <label for="nic"><b>NIC </b></label>
                        <input type="text" placeholder="Add NIC Number" id="nic" name="nic" onblur="NIC(nic.value)"> value="<?php echo $row['stuNIC']?>"
                        <div id="noNIC" class="text"></div>
                    </div>

                    <label for="stuPhoto"><b>Add Your Photo</b></label>
                    <input type="file" placeholder="Add Your Photo" name="stuPhoto" id="stuPhoto">
                    <br>
                    <div id="msg"></div>
                    <hr>
                    <div>


                        <button type="submit" class="registerbtn" style="margin-left: 5px;" name="regbtn1">Save</button>
                        <a href="o_studentsList.php" class="cancel-btn">Cancel</a>


                    </div>
                    <br>
                    <hr>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <!--page 1 END-->

    <!--Page 2-->




    <!--Page2 End-->


</body>

</html>

<?php } ?>
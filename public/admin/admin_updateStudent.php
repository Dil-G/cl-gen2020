<?php
session_start();

    if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error=' . $error);
    } else if ($_SESSION['userType'] != 'admin') {
        header('Location: ../common/error.html');
    } else {


        $_SESSION['studentID']=$_GET['userID'];
        include '../../src/user_list.php';

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

    <div id="nav2"></div>


   
    <div id="pg1">
                <div class="content">
                    <div class="container" style="margin-left:250px;">
                        <form action="../../src/update_user.php" onsubmit="return validateStudent()" method="POST" enctype="multipart/form-data">
                            <h1>Add Student Details</h1>
                            <hr>
                            <?php
                            while ($row_student = mysqli_fetch_array($res_student)) {
                            ?>

                                <label for="stuID"><b>Admission Number</b></label>
                                <input type="text" placeholder="Enter ID" value="<?php if (isset($_GET['userID'])) {
                                                                                        echo $_GET['userID'];
                                                                                    } ?>" name="stuID" required>

                                <label for="stufName"><b>First Name</b></label>
                                <input type="text" placeholder="Enter First Name" name="stufName" id="fname" value="<?php echo $row_student['fName'] ?>" onblur="checkFname(fname.value)">

                                <label for="stumName"><b>Middle Name</b></label>
                                <input type="text" placeholder="Enter Middle Name" name="stumName" id="mname" value="<?php echo $row_student['mName'] ?>" onblur="checkMname(mname.value)">

                                <label for="stulName"><b>Last Name</b></label>
                                <input type="text" placeholder="Enter Last Name" name="stulName" id="lname" value="<?php echo $row_student['lName'] ?>" onblur="checkLname(lname.value)">

                                <label for="stuDob"><b>Date of Birth</b></label> <br>
                                <input type="date" placeholder="Enter Date of Birth" name="stuDob" id="date" value="<?php echo $row_student['dob'] ?>" onblur="checkStuDate(date.value)">

                                <label for="stuAdStreet"><b>Residential Addresss - Street</b></label>
                                <input type="text" placeholder="Enter Number and street" name="stuAdStreet" id="street" value="<?php echo $row_student['adStreet'] ?>" onblur="checkStreet(street.value)">

                                <label for="stuAdCity"><b>Residential Addresss - City</b></label>
                                <input type="text" placeholder="Enter City" name="stuAdCity" id="city" value="<?php echo $row_student['adCity'] ?>" onblur="checkCity(city.value)">

                                <label for="stuAdDistrict"><b>Residential Addresss - District</b></label>

                                <input type="text" name="stuAdDistrict" id="district" value="<?php echo $row_student['adDistrict'] ?>" onblur="checkDistrict(district.value)">



                                <label for="stuReligion"><b>Religion</b></label>
                                <input type="text" name="stuReligion" id="religion" value="<?php echo $row_student['religion'] ?>" onblur="checkReligion(religion.value)">

                                <label for="stuEnteredDate"><b>Entered Date</b></label>
                                <input type="text" placeholder="Enter Grade Entered" name="stuEnteredDate" id="date" value="<?php echo $row_student['enteredDate'] ?>" readonly required>

                                <label for="stuEnteredGrade"><b>Entered Grade</b></label>
                                <input type="text" placeholder="Enter Grade Entered" name="stuEnteredGrade" id="grade" value="<?php echo $row_student['enteredGrade'] ?>" onblur="checkGrade(grade.value)">

                                <label for="email"><b>Email</b></label>
                                <input type="email" placeholder="Enter Email" name="email" id="email" value="<?php echo $row_student['email'] ?>" onblur="validateEmail(email.value)">

                                <label for="contactNo"><b>Contact Number</b></label>
                                <input type="text" placeholder="Enter Contact Number" name="contactNo" id="contactNo" value="<?php echo $row_student['contactNo'] ?>" onblur="contact(contactNo.value)">
                                <br>
                                <label><b>Gender:</b></label>
                                <input type="text" placeholder="Enter Gender" name="stuGender" id="gender" value="<?php echo $row_student['gender'] ?>">


                                <div id="showNIC">
                                    <label for="nic"><b>NIC </b></label>
                                    <input type="text" placeholder="Add NIC Number" id="nic" name="nic" onblur="NIC(nic.value)" value="<?php if (isset($row_student['stuNic'])) {
                                                                                                                                            echo $row_student['stuNic'];
                                                                                                                                        } ?>">
                                    <div id="noNIC" class="text"></div>
                                </div>

                                <?php
                                if ($row_student['stuPhoto'] == TRUE) { ?>
                                    <label class="radio"> <input type="checkbox" name="delete" value="delete"> <b>Delete Image</b>
                                        <span class="checkmark"></span></label>
                                    <br>
                                    <br>
                                    <div class="image">
                                        <?php echo "<img src='../../images/" . $row_student['stuPhoto'] . "'>"; ?>
                                    </div>
                                <?php }
                                ?>
                                <label for="image"><b>Update Image</b></label>
                                <br>
                                <input type="hidden" name="size" value="1000000" required>
                                <div>
                                    <input type="file" name="stuPhoto" id="stuPhoto" />
                                </div>


                                <br>
                                <div id="msg"></div>
                                <hr>
                                <div>


                                    <button type="submit" class="registerbtn" style="margin-left: 5px;" name="update_student">Save</button>
                                    <a href="admin_student.php" class="cancel-btn">Cancel</a>


                                </div>

                            <?php } ?>
                            <br>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>


</body>

</html>

<?php } ?>
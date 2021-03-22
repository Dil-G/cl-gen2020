<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d1", $dutyID)) {
	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Parents Details</title>
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div id="officeNav"></div>

    <div class="content">
        <div class="container">
            <form action="../php/register.php" method="POST">
                <h1>Add Parents Details</h1>
                <hr>


                <h2>Mother's Details</h2>
                <hr>

                <label for="pid"><b>Parent ID</b></label>
                <input type="text" placeholder="Enter ID" name="pid" required>

                <label for="mname"><b>Mother's Name</b></label>
                <input type="text" placeholder="Enter Name" name="mname" required>

                <label for="mnic"><b>Mother's NIC</b></label>
                <input type="text" placeholder="Enter NIC" name="mnic" required>

                <label for="memail"><b>Mother's Email</b></label>
                <input type="text" placeholder="Enter Email" name="memail" required>

                <label for="mdob"><b>Mother's Date of Birth</b></label>
                <input type="text" placeholder="Enter Date of Birth" name="mdob" required>

                <label for="mjob"><b>Mother's Occupation</b></label>
                <input type="text" placeholder="Enter Occupation" name="mjob" required>

                <label for="mjobaddress"><b>Mother's Workplace Address</b></label>
                <input type="text" placeholder="Enter workplace address" name="mjobaddress" required>

                <label for="mAddress"><b>Mother's Residential Addresss</b></label>
                <input type="text" placeholder="Enter current address" name="maddress" required>

                <label for="mContactNo"><b>Mother's Contact Number</b></label>
                <input type="text" placeholder="Enter Contact Number" name="mContactNo" required>

                <h2>Father's Details</h2>
                <hr>

                <label for="fid"><b>Parent ID</b></label>
                <input type="text" placeholder="Enter ID" name="fid" required>

                <label for="fname"><b>Father's Name</b></label>
                <input type="text" placeholder="Enter Name" name="fname" required>

                <label for="fnic"><b>Father's NIC</b></label>
                <input type="text" placeholder="Enter NIC" name="fnic" required>

                <label for="femail"><b>Father's Email</b></label>
                <input type="text" placeholder="Enter Email" name="femail" required>

                <label for="fdob"><b>Father's Date of Birth</b></label>
                <input type="text" placeholder="Enter Date of Birth" name="fdob" required>

                <label for="fAddress"><b>Father's Residential Addresss</b></label>
                <input type="text" placeholder="Enter current address" name="faddress" required>

                <label for="fContactNo"><b>Father's Contact Number</b></label>
                <input type="text" placeholder="Enter Contact Number" name="fContactNo" required>


                <label for="fjob"><b>Father's Occupation</b></label>
                <input type="text" placeholder="Enter Occupation" name="fjob" required>

                <label for="fjobaddress"><b>Father's Workplace Address</b></label>
                <input type="text" placeholder="Enter workplace address" name="fjobaddress" required>





                <hr>

                <button type="submit" class="registerbtn">Save</button>

                <hr>

            </form>

        </div>

    </div>


</body>

</html>

<?php }} ?>
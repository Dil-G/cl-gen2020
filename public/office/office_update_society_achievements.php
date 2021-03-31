<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'officer') {
    header('Location: ../common/error.html');
} else {
    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];


    if (!in_array("d2", $dutyID)) {
        header('Location: office_dashboard.php');
    }
    if (in_array("d1", $dutyID)) {
      //  $_SESSION['studentID'] = $_GET['userID'];
       include '../../src/office_update_achievements.php';





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
    <script src="../js/tabs.js"></script>
</head>

<body>

    <div id="officeNav"></div>


    <div id="pg1">

        <div class="content">
           
<!-- page2 -->
            <div id="page2" class="page">

            <div class="container" style="margin-left:250px;">
                    <form action="../../src/office_update_achievements.php" method="POST" enctype="multipart/form-data">
                        <h1>Update Student Achievements - Society</h1>


                        <hr>
                        <?php
                            while ($row = mysqli_fetch_array($results_select_society)) {
                            ?>

                        <label for="stuID"><b>Student ID</b></label>
                        <input type="text" placeholder="" value="<?php if (isset($_GET['studentID'])) {
                                                                                        echo $_GET['studentID'];
                                                                                    } ?>" name="stuID" required>

                        <label for="stufName"><b>Student Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="stufName" id="fname"
                            value="<?php echo $row['fName'].$row['lName'] ?>">

                        <label for="achievementID "><b>Achievement ID </b></label> <br>
                        <input type="text" placeholder="" name="achievementID" id="achievementID"
                            value="<?php echo $row['achievementID'] ?>">

                        <label for="achievementName "><b>Achievement Name </b></label> <br>
                        <input type="text" placeholder="" name="achievementName" id="achievementName"
                            value="<?php echo $row['achievementName'] ?>">

                        <label for="position "><b>Position </b></label> <br>
                        <input type="text" placeholder="" name="position" id="position"
                            value="<?php echo $row['position'] ?>">

                        <label for="impValue "><b>Important Value </b></label> <br>
                        <input type="text" placeholder="" name="impValue" id="impValue"
                            value="<?php echo $row['impValue'] ?>">

                        <label for="description "><b>Description </b></label> <br>
                        <input type="text" placeholder="" name="description" id="description"
                            value="<?php echo $row['description'] ?>">

                        <label for="achievementDate "><b>Date Achieved</b></label> <br>
                        <input type="date" placeholder="" name="achievementDate" id="achievementDate"
                            value="<?php echo $row['achievementDate'] ?>">


                        <br>
                        <div id="msg"></div>
                        <hr>
                        <div>


                            <button type="submit" class="registerbtn" style="margin-left: 5px;"
                                name="update_societies">Save</button>
                            <a href="office_view_student_achievements.php" class="cancel-btn">Cancel</a>


                        </div>

                        <?php } ?>
                        <br>
                        <hr>
                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>

<?php }
} ?>
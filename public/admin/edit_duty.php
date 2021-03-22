<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
    header('Location: ../common/error.html');
} else {

    $userID = $_SESSION['userID'];

    include_once '../../config/conn.php';
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
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div id="nav2"></div>


    <div class="content">
        <div class="container">
            <form action="../../src/editDuties.php" method="POST">
                <h1>Add Duties</h1>
                <hr>

                <label for="officerID"><b>User ID</b></label>
                <input type="text" placeholder="Enter ID" name="officerID" value="<?php if (isset($_GET['userID'])) {
                                                                                            echo $_GET['userID'];
                                                                                        } ?>" required>

                <label for="duty"><b>Current Duties</b></label>
                <br>
                <br>
                <br>

                <?php

                    if (isset($_GET['userID'])) {
                        $userID =  $_GET['userID'];

                        $sql =  "SELECT * FROM officerduties WHERE officerID ='$userID'";
                        $result = $conn->query($sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $dutyID = $row['dutyID'];
                            $sql1 =  "SELECT * FROM duty WHERE dutyID ='$dutyID'"; ?>

                <input type="hidden" name="dutyID" value="<?php echo $dutyID; ?>" required>

                <?php
                            $result1 = $conn->query($sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>

                <?php echo $row['duty'] . "<br />" ?>

                <?php }
                        }
                    } ?>
                <hr>
                <h1 style="color:#656565;">Select to re-assign Duties</h1>
                <p>(Current Duties will be removed when Re-assigning)</p>
                <label><b>User Duties :</b></label>
                <br>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[1]" value="d1">User Management</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[2]" value="d2">Exam Result Management</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[3]" value="d3">Document Management</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[4]" value="d4">Request Management</label>
                <br>
                <br>
                <label> <input type="checkbox" name="checkbox[5]" value="d5">NewsFeed Management</label>
                <br><br>
                <label> <input type="checkbox" name="checkbox[6]" value="d6">Class Management</label>
                <br>
                <hr>

                <div>
                    <button type="submit" class="registerbtn" name="regbtn">Save</button>
                    <a href="duty.php" class="cancel-btn">Cancel</a>
                </div>
            </form>


        </div>

    </div>


</body>

</html>
<?php } ?>
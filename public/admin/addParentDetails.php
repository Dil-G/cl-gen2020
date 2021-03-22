<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
    header('Location: ../common/error.html');
} else {

    require_once '../../config/conn.php';
    $userID = $_SESSION['userID'];
?>


<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parent Registration</title>

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
    <?php
        $stuID = ($_GET['parentID']);
        $charID = substr($stuID, 2);
        $pID = "PR" . $charID;

        ?>

    <div class="content">
        <div class="container" style="margin-left:250px;padding:0 20px">
            <form action="../../src/register.php" onsubmit="return validateParent()" method="POST">

                <h1>Parent's / Guardian's Details</h1>
                <hr>
                <input type="hidden" name="userID" id="userID" value="<?php if (isset($_GET['userID'])) {
                                                                                echo $_GET['userID'];
                                                                            } ?>">
                <label for="pID"><b>User ID</b></label>
                <input type="text" placeholder="Enter ID" value="<?php echo $pID; ?>" name="pID" readonly>

                <label for="parentName"><b> Name</b></label>
                <input type="text" placeholder="Enter  Name" name="parentName" id="pname"
                    onblur="checkPname(pname.value)">

                <label for="pNIC"><b>NIC</b></label>
                <input type="text" placeholder="Enter NIC" name="pNIC" id="pNIC" onblur="NICp(pNIC.value)">

                <label for="occ"><b>Occupation</b></label>
                <input type="text" placeholder="Enter Occupation" name="occ" id="occ" onblur="checkOcc(occ.value)">

                <label for="Pcontact"><b>Contact Number</b></label> <br>
                <input type="text" placeholder="Enter Contact Number" name="Pcontact" id="Pcontact"
                    onblur="contactP(Pcontact.value)">

                <label for="pEmail"><b>Email</b></label> <br>
                <input type="email" placeholder="Enter Email" name="pEmail" id="pEmail"
                    onblur="validateEmailP(pEmail.value)">


                <hr>
                <div id="msg"></div>
                <hr>
                <div>
                    <button type="submit" style="margin-left: 5px;" class="registerbtn" name="parentReg">Save</button>

                    <a href="o_studentsList.php" class="cancel-btn">Cancel</a>
                </div>
                <hr>
            </form>
        </div>
    </div>



</body>

</html>

<?php } ?>
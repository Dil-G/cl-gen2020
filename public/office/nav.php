<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    //   foreach($dutyID as $result) {
    //     echo $result;
    // }

?>

<link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<div>
    <button onclick="goBack()" class="backbtn" style="background-color: #1e8dd6;padding:1px;">Back</button>
</div>

<div class="navbar">

    <ul>
        <li>
            <form name="logout" action="../../src/logout.php" method="POST">
                <input type="submit" value="LOGOUT" name="logout" style="font-family: 'Playfair Display', serif;">
            </form>
        </li>
    </ul>
</div>

<div class="wrap">

    <img src="../../images/logo.png" width="100" height="100">

    <div class="menu">
        <h2 class="portal">OFFICE PORTAL</h2>
        <br>
        <ul>
            <li><a href="../office/o_dashboard.php">Dashboard</a></li>
            <li><a href="../office/newsfeed.php">Newsfeed</a></li>

            <?php
                if (in_array("d1", $dutyID)) {
                ?>
            <li class="drop">
                <div class="drop" id="drop">Manage User Information<i class="fa fa-angle-down"></i></div>
            </li>
            <div class="submenu" id="submenu">
                <ul>

                    <li><a href="o_studentsList.php">Student</a></li>
                    <li><a href="o_teachersList.php">Teacher</a></li>
                    <li><a href="o_officersList.php">Officers</a></li>
                    <li><a href="o_parentsList.php">Parents</a></li>
                </ul>
            </div>

            <?php }
                if (in_array("d2", $dutyID)) { ?>

            <li class="drop">
                <div class="drop" id="drop2">Add Exam results<i class="fa fa-angle-down" aria-hidden="true"></i> </div>
            </li>
            <div class="submenu2" id="submenu2">
                <ul>
                    <li><a href="../office/o_viewSchol.php">Grade 5 Scholarship</a></li>
                    <li><a href="../office/o_viewOl.php">G.C.E. O/L</a></li>
                    <li><a href="../office/o_viewAl.php">G.C.E. A/L</a></li>
                </ul>
            </div>

            <li class="drop">
                <div class="drop" id="drop7">Subjects<i class="fa fa-angle-down" aria-hidden="true"></i></div>
            </li>
            <div class="submenu7" id="submenu7">
                <ul>
                    <li><a href="../office/o_addClassYear.php">O/L Subjects</a></li>
                    <li><a href="../office/o_addClassYear.php">A/L Subjects</a></li>
                </ul>
            </div>

            <?php }
                if (in_array("d3", $dutyID)) { ?>

            <li class="drop">
                <div class="drop" id="drop3">Certificates<i class="fa fa-angle-down" aria-hidden="true"></i></div>
            </li>
            <div class="submenu3" id="submenu3">
                <ul>
                    <li><a href="../office/o_reqCc.php">Character Certificates</a>
                    <li><a href="../office/o_reqLc.php">Leaving Certificates</a></li>
                </ul>
            </div>

            <?php }
                if (in_array("d4", $dutyID)) { ?>

            <li><a href="../office/o_viewReq.php">Request Management</a></li>


            <?php }
                if (in_array("d5", $dutyID)) { ?>

            <li class="drop">
                <div class="drop" id="drop5">Edit Newsfeed<i class="fa fa-angle-down" aria-hidden="true"></i></div>
            </li>
            <div class="submenu5" id="submenu5">
                <ul>
                    <li><a href="../office/newsfeed.php"> Newsfeed</a>
                    <li><a href="../office/edit_newsfeed.php">Add News</a></li>
                    <li><a href="../office/news_list.php">News List</a></li>
                </ul>
            </div>

            <?php }
                if (in_array("d6", $dutyID)) { ?>

            <li><a href="../office/o_addClassYear.php">Class Management</a></li>


            <?php } ?>
    </div>

    </ul>

</div>
</div>

<script>
<?php if (in_array("d1", $dutyID)) { ?>
var menu = document.getElementById("drop");
<?php }
        if (in_array("d2", $dutyID)) { ?>

var menu2 = document.getElementById("drop2");
<?php }
        if (in_array("d3", $dutyID)) { ?>

var menu3 = document.getElementById("drop3");
<?php }
        if (in_array("d5", $dutyID)) { ?>

var menu5 = document.getElementById("drop5");
<?php } ?>
<?php if (in_array("d1", $dutyID)) { ?>
 
var menu7 = document.getElementById("drop7");
<?php } ?>
<?php if (in_array("d2", $dutyID)) { ?>

var submenu = document.getElementById("submenu");
<?php }
        if (in_array("d2", $dutyID)) { ?>
var submenu2 = document.getElementById("submenu2");
<?php }
        if (in_array("d3", $dutyID)) { ?>

var submenu7 = document.getElementById("submenu7");
<?php }
        if (in_array("d2", $dutyID)) { ?>

var submenu3 = document.getElementById("submenu3");
<?php }
        if (in_array("d5", $dutyID)) { ?>
var submenu5 = document.getElementById("submenu5");
<?php } ?>
<?php if (in_array("d1", $dutyID)) { ?>
submenu.style.display = "none";
<?php }
        if (in_array("d2", $dutyID)) { ?>
submenu2.style.display = "none";
<?php }
        if (in_array("d3", $dutyID)) { ?>
submenu3.style.display = "none";
<?php }
        if (in_array("d5", $dutyID)) { ?>
submenu5.style.display = "none";
<?php } ?>

<?php if (in_array("d1", $dutyID)) { ?>
menu.onclick = function(event) {
    if (submenu.style.display === "none") {
        submenu.style.display = "block";
    } else {
        submenu.style.display = "none";
    }
}
<?php }
        if (in_array("d2", $dutyID)) { ?>
menu2.onclick = function(event) {
    if (submenu2.style.display === "none") {
        submenu2.style.display = "block";
    } else {
        submenu2.style.display = "none";
    }
}
<?php }
        if (in_array("d3", $dutyID)) { ?>
menu3.onclick = function(event) {
    if (submenu3.style.display === "none") {
        submenu3.style.display = "block";
    } else {
        submenu3.style.display = "none";
    }
}

<?php }
        if (in_array("d5", $dutyID)) { ?>
menu5.onclick = function(event) {
    if (submenu5.style.display === "none") {
        submenu5.style.display = "block";
    } else {
        submenu5.style.display = "none";
    }
}

<?php } ?>
</script>


<?php } ?>
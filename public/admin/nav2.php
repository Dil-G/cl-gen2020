<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if (($_SESSION['userType'] == 'admin')) {

    $userID = $_SESSION['userID'];
?>

<link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<div>
    <button onclick="goBack()" class="backbtn" style="background-color: #1e8dd6;padding:1px;">Back</button>
</div>
<?php// $user = "n" ?>
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
        <h2 class="portal">ADMIN PORTAL</h2>
        <br>

        <ul>
            <br>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="newsfeed.php">Newsfeed</a></li>

            <li class="drop">
                <div class="drop" id="drop">User Management<i class="fa fa-angle-down"></i></div>
            </li>
            <div class="submenu" id="submenu">
                <ul>

                    <li><a href="users.php">Add Users</a></li>
                    <li><a href="staff.php">Office staff </a></li>
                    <li><a href="student.php">Students</a></li>
                    <li><a href="parent.php">Parents</a></li>
                    <li><a href="teachers.php"> Teachers</a></li>
                    <li><a href="userlist.php">System Users</a></li>

                    <!-- <li><a href="officerList.php">Add Officer</a></li> -->
                    <?php //if($user=="a"){ 
                        ?>
                    <?php //} 
                        ?>
                </ul>
            </div>
            <li><a href="duty.php">Duty Management</a></li>
            <li class="drop">
                <div class="drop" id="drop2">Category Management<i class="fa fa-angle-down"></i></div>
            </li>
            <div class="submenu2" id="submenu2">
                <ul>
                    <li><a href="categories.php">Manage Categories</a></li>
                    <li><a href="sports.php">Sports</a></li>
                    <li><a href="societies.php"> Societies</a></li>
                    <!-- <li><a href="educational.php">Educational </a></li> -->
                </ul>
            </div>


        </ul>

    </div>
</div>

<script>
var menu = document.getElementById("drop");
var menu2 = document.getElementById("drop2");
var submenu = document.getElementById("submenu");
var submenu2 = document.getElementById("submenu2");


submenu.style.display = "none";
submenu2.style.display = "none";


menu.onclick = function(event) {
    if (submenu.style.display === "none") {
        submenu.style.display = "block";
    } else {
        submenu.style.display = "none";
    }
}
menu2.onclick = function(event) {
    if (submenu2.style.display === "none") {
        submenu2.style.display = "block";
    } else {
        submenu2.style.display = "none";
    }
}
</script>

<?php } ?>
<?php
session_start();

require_once('../../config/conn.php');

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'parent') {


    $userID = $_SESSION['userID'];
    include '../../config/conn.php';

    $sql = "SELECT * FROM parent WHERE `parentID`='$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    //   foreach($teacherType as $result) {
    //     echo $result;
    // }

?>
<link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<div class="navbar">
	<ul>
		<li class="icon">
			<div class="burger-btn">
				<span onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
			</div>
		</li>
		<ul>
		<li>
			<form name="logout" action="../../src/logout.php" method="POST">
			<input type="submit" value="LOGOUT" name="logout" style="font-family: 'Ubuntu', sans-serif;float:right;margin-left:180px;margin-right:1px;">
			</form>
		</li>
		<li>
            <h4 style="float:right; margin:13px -200px 2px 5px;color:rgb(193, 187, 187);font-family: 'Ubuntu', sans-serif;"><i class="fa fa-user-o" aria-hidden="true" style="margin-right: 3px;"></i><?php echo $row['name']; ?></h4>
            </li>
		</ul>

	</ul>
</div>
<div class="wrap" id="wrap">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<img src="../../images/logo.png" width="100" height="100">
	<div class="menu">

		<ul>
			<li><a href="SProfile.php">Profile</a></li>


			<li class="drop"><a href="editRequest.php">Request Edits </a> </li>
			<li class="drop"><a href="character-form.php">Request Certificates</a></i> </li>
			<li class="drop"><a href="newsfeed.php">News Feed </a> </li>
			<li class="drop">
				<div class="drop" id="drop"> Inquiries and Replies<i class="fa fa-angle-down"></i> </div>
			</li>
			<div class="submenu" id="submenu">
				<ul>
					<li><a href="inquiries.php">View Inquiries</a></li>
					<li><a href="AddInquiery.php">Add Inquiery</a></li>
					<!-- <li><a href="ReplyInquiery.php">Reply Inquiery</a></li> -->

				</ul>
			</div>

		</ul>


	</div>


</div>



<script>

	var menu = document.getElementById("drop");
	var submenu = document.getElementById("submenu");


	submenu.style.display = "none";


	menu.onclick = function (event) {
		if (submenu.style.display === "none") {
			submenu.style.display = "block";
		} else {
			submenu.style.display = "none";
		}
	}

	function openNav() {
		document.getElementById("wrap").style.width = "220px";

	}

	function closeNav() {
		document.getElementById("wrap").style.width = "0";
	}



</script>

<?php } ?>
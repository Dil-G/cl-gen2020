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
		<li>
			<form name="logout" action="../../src/logout.php" method="POST">
				<input type="submit" value="LOGOUT" name="logout" style="font-family: 'Playfair Display', serif;">
			</form>
		</li>


	</ul>
</div>
<div class="wrap" id="wrap">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<img src="../../images/logo.png" width="100" height="100">
	<div class="menu">

		<ul>
			<li><a href="SProfile.php">Profile</a></li>

			<li class="drop"><a href="newsfeed.php">News Feed </a> </li>
			<li class="drop"><a href="editRequest.php">Request Edits </a> </li>
			<li class="drop"><a href="character-form.php">Request Certificates</a></i> </li>
			
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



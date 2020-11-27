
<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
     }else if(($_SESSION['userType'] == 'admin')){

		 $userID = $_SESSION['userID'];
		 include ('../../src/view_users.php');
?> 

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title> User List</title>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>
<link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/users.css">
<link type="text/css" rel="stylesheet" href="../css/tabs.css">
</head>
<body>

	<div id="nav2"></div>
		
		<div class="content">
		<h1> User List</h1>
		
		
		
		<form class="search" action="register_stu.html">
		<input type="text" placeholder="Search.." name="search">
		<button type="submit">Search</button>
		</form>
		<br>
		<br>
		<br>
		<hr>
		
		<div class="btn-box">

			
			<button id="button2" onclick="activated()">Added Users</button>
			<button id="button1" onclick="notActivated()">Activated Users</button>
		</div>
		<br>
		<div id="page1" class="page">
			
			
			  <div class="card">
			  <form>
					<button type="submit" formaction="register_user.php">Add User</button>
				</form>
				<div class="count">
					<b>
					<?php
					while($row = $user_res3->fetch_assoc()) {
						echo " User Count: " . $row["COUNT(isActivated)"]. "<br>";
					}?>
					</b>
				</div>
			  
                
                
                <hr>
                
                <table>
                <tr>
                    <th>User ID</th>
                    <th>UserName</th>
                    <th>User Type</th>
                    
                </tr>
                <?php
		while($row=mysqli_fetch_assoc($user_res1)){
			?>
                <tr>
                    <td><?php echo $row['userID'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['userType'] ?></td>
                
                </tr>
                <?php
			}
		?>
				</table>
				</div>
		</div>
		<div id="page2" class="page">
			
			  <div class="card">
			 	<div class="count">
					 <b>
					<?php
					while($row = $user_res4->fetch_assoc()) {
						echo "Activated User Count: " . $row["COUNT(isActivated)"]. "<br>";
					}?>
					</b>
				</div>
			
                
                <hr>
                
                <table>
                <tr>
                    <th>User ID</th>
                    <th>UserName</th>
                    <th>User Type</th>
                    
                </tr>
                <?php
		while($row=mysqli_fetch_assoc($user_res2)){
			?>
                <tr>
                    <td><?php echo $row['userID'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['userType'] ?></td>
                
                </tr>
                <?php
			}
		?>
				</table>
				</div>
		</div>
				
		</div>

		<script>
		var page1 = document.getElementById("page1");
		var page2 = document.getElementById("page2");
		var button1 = document.getElementById("button1");
		var button2 = document.getElementById("button2");
		
		let url = window.location.href;
		if(url == "http://localhost/CL-GEN/public/admin/userlist.php"){
			page1.style.display = "block";
			page2.style.display = "none";
			button1.style.color= "#008080";
			button2.style.color= "#000";
			
		}else if(url == "http://localhost/CL-GEN/public/admin/userlist.php?loggedin"){
			page1.style.display = "block";
			page2.style.display = "none";
			button1.style.color= "#008080";
			button2.style.color= "#000";
		}

		function activated(){
			page1.style.display = "block";
			page2.style.display = "none";
			button1.style.color= "#008080";
			button2.style.color= "#000";
			
		}

		function notActivated(){
			page1.style.display = "none";
			page2.style.display = "block";
			button1.style.color= "#000";
			button2.style.color= "#008080";
		}
	</script>
		
</body>
</html>

	<?php } ?>
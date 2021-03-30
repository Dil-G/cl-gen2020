<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

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
    <script src="../js/tabs.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <script src="../js/search.js"></script>
</head>

<body>

    <div id="nav2"></div>

    <div class="content" style="margin-top: -60px;">

        <div class="card">
            <h1>User List</h1>
            <form class="search">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <div class="btn-box" style="margin-left: 10px;">
                <button id="button2" onclick="return activated()">Added Users</button>
                <button id="button1" onclick="return notActivated()">Activated Users</button>
            </div>
        </div>


        <br>
        <div id="page1" class="page">


            <div class="card">
                <form>
                    <button type="submit" formaction="admin_registerUser.php">Add User</button>
                </form>
                <div class="count">
                    <b>
                        <?php
					while($row = $user_res3->fetch_assoc()) {
						echo "Non-Activated User Count: " . $row["COUNT(isActivated)"]. "<br>";
					}?>
                    </b>
                </div>



                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>UserName</th>
                            <th>User Type</th>

                        </tr>
                        <?php
		while($row=mysqli_fetch_assoc($user_res1)){
			?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['userType'] ?></td>

                            </tr>
                            <?php
			}
		?>
                        </tbody>
                    </table>
                </div>
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
             
                <div class="scroll">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>UserName</th>
                            <th>User Type</th>

                        </tr>
                        <?php
		while($row=mysqli_fetch_assoc($user_res2)){
			?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['userType'] ?></td>

                            </tr>
                            <?php
			}
		?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


</body>

</html>

<?php } ?>
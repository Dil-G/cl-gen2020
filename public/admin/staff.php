<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];
	include('../../src/view_users.php');
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Office staff User List</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/button.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
</head>

<body>
    <div id="nav2"></div>

    <div class="content">

        <h1>Officer List</h1>
        <form class="search" action="register_stu.html">
            <input type="text" id="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>


        <div class="btn-box">
            <button id="button2" onclick="return activated()">Added Users</button>
            <button id="button1" onclick="return notActivated()">Activated Users</button>
        </div>
        <br>
        <br>
        <div id="page1" class="page">
            <div class="card">
                <form>
                    <button class="viewbtn" type="submit" formaction="register_user.php">Add Officer</button>
                </form>
                <?php if (isset($_GET['error'])) { ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <div class="count">
                    <?php
				 while($row = $staff_result->fetch_assoc()) {
				 echo "Non-Activated Account Count: " . $row["COUNT(isActivated)"]. "<br>";
				 }?>
                </div>
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>UserName</th>
                        <th>Add Details</th>
                    </tr>
                    <?php
					while($row=mysqli_fetch_assoc($staff_result1)){
					?>
                    <tbody id="Table">
                        <tr>
                            <td><?php echo $row['userID'] ?></td>
                            <td><?php echo $row['username'] ?></td>

                            <?php echo "<td><a class='btn editbtn' href = o_addStudentDetails.php?userID=".$row['userID']." > Add </a> </td>"?>
                        </tr>
                        <?php
					}
					?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="page2" class="page">
            <div class="card">
                <div class="count">
                    <?php
				 while($row = $staff_result3->fetch_assoc()) {
				 echo "Activated Account Count: " . $row["COUNT(isActivated)"]. "<br>";
				 }?>
                </div>
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Edit Details</th>
                        <th>Deactivate Account</th>
                    </tr>
                    <?php
					while($row=mysqli_fetch_assoc($staff_result2)){
					?>
                    <tbody id="Table">
                        <tr>
                            <td><?php echo $row['officerID'] ?></td>
                            <td><?php $name = $row['fName'] ." ".  $row['lName'] ; echo $name; ?></td>
                            <?php echo "<td><a class='btn editbtn' href = SProfile.php?userID=".$row['officerID']." > update </a> </td>"?>
                            <?php echo "<td><a class='btn dltbtn' href = # > Deactivate </a> </td>";?>
                        </tr>
                        <?php
					}
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php }
 ?>
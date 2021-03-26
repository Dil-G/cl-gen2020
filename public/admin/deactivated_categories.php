<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];
	include('../../src/view_categories.php');
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deactivated Categories</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/confirm.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/button.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
</head>

<body>
    <div id="nav2"></div>

    <div class="content">

        <div class="card">
            <h1>Deactivated Category List</h1>
            <form class="search">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <div class="btn-box" style="margin-left: 10px;">
                <button id="button2" onclick="return activated()">Sports</button>
                <button id="button1" onclick="return notActivated()">Socieities </button>
            </div>
        </div>


        <br>
        <br>
        <div id="page1" class="page">
            <div class="card">
                <?php if (isset($_GET['error'])) { ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>Sport ID</th>
                            <th>Sport</th>
                            <th>Reactivate</th>
                        </tr>
                        <?php
					while($row=mysqli_fetch_assoc($result_sport)){
					?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['SportID'] ?></td>
                                <td><?php echo $row['SportName'] ?></td>

                                <td>
                                        <form action="../../src/reactivate.php" method="GET" onclick="return confirmation()">
                                            <input type="hidden" name="sportID" value="<?php echo $row['SportID'] ?>" />
                                            <button class='btn editbtn' input type="submit" name="reactivate">Reactivate</button>
                                        </form>
                                    </td>                            </tr>
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

                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>Society ID</th>
                            <th>Society Name</th>
                            <th>Reactivate </th>
                        </tr>
                        <?php
					while($row=mysqli_fetch_assoc($result_society)){
                    ?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['SocietyID'] ?></td>
                                <td><?php echo $row['SocietyName'] ?></td>

                                <td>
                                    <form action="../../src/reactivate.php" method="GET"
                                        onclick="return confirmation()">
                                        <input type="hidden" name="societyID" value="<?php echo $row['SocietyID'] ?>" />
                                        <button class='btn editbtn' input type="submit" name="reactivate">Reactivate</button>

                                    </form>
                                </td>

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

<?php }
 ?>
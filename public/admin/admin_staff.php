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
                <h1>Officer List</h1>
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
            <br>
            <div id="page1" class="page">
                <div class="card">
                    <form>
                        <button class="viewbtn" type="submit" formaction="admin_registerUser.php">Add Officer</button>
                    </form>
                    <?php if (isset($_GET['error'])) { ?>
                        <div id="error"><?php echo $_GET['error']; ?></div>
                    <?php } ?>
                    <div class="count">
                        <?php
                        while ($row = $staff_result->fetch_assoc()) {
                            echo "Non-Activated Account Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                    </div>
                    <hr>
                    <div class="scroll">
                        <table>
                            <tr>
                                <th>User ID</th>
                                <th>UserName</th>
                                <th>Add Details</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($staff_result1)) {
                            ?>
                                <tbody id="Table">
                                    <tr>
                                        <td><?php echo $row['userID'] ?></td>
                                        <td><?php echo $row['username'] ?></td>

                                        <?php echo "<td><a class='btn editbtn' href = admin_addOfficerDetails.php?userID=" . $row['userID'] . " > Add </a> </td>" ?>
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
                        <?php
                        while ($row = $staff_result3->fetch_assoc()) {
                            echo "Activated Account Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                    </div>
                    <hr>
                    <div class="scroll">
                        <table>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Edit Details</th>
                                <th>Deactivate Account</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($staff_result4)) {
                                $offiicerID = $row['userID'];
                                $staff_sql2 = "SELECT * FROM office where officerID= '$offiicerID'";
                                $staff_result2 = $conn->query($staff_sql2);
                                while ($rows = mysqli_fetch_assoc($staff_result2)) {
                            ?>
                                    <tbody id="Table">
                                        <tr>
                                            <td><?php echo $rows['officerID'] ?></td>
                                            <td><?php $name = $rows['fName'] . " " .  $rows['lName'];
                                                echo $name; ?></td>
                                            <?php echo "<td><a class='btn editbtn' href = admin_updateOfficer.php?userID=" . $rows['officerID'] . " > update </a> </td>" ?>
                                            <td>
                                                <form action="../../src/deactivate_account.php" method="GET" onclick="return confirmation()">
                                                    <input type="hidden" name="officerID" value="<?php echo $rows['officerID'] ?>" />
                                                    <button class='btn dltbtn' input type="submit" name="deactivate" value="Deactivate">Deactivate</button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                }
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
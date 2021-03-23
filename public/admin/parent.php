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
    <title>Parents User List</title>
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

        <div class="card">
            <h1>Parent List</h1>
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
                <?php if (isset($_GET['error'])) { ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <div class="count">
                    <?php
                        while ($row = $parent_result->fetch_assoc()) {
                            echo "Non-Activated Account Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                </div>
                <hr>
                <div class="scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>UserName</th>
                            </tr>
                        </thead>
                        <tbody id="Table">
                            <?php
                            while ($row = mysqli_fetch_assoc($parent_result1)) {
                            ?>
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php echo $row['username'] ?></td>
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
                        while ($row = $parent_result3->fetch_assoc()) {
                            echo "Activated Account Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                </div>
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Edit Details</th>
                    </tr>
                    <tbody id="Table">
                        <?php
                            while ($row = mysqli_fetch_assoc($parent_result4)) {
                                $parentID = $row ['userID'];
                                $parent_sql2 = "SELECT * FROM parent where parentID= '$parentID'";
                                $parent_result2 = $conn->query($parent_sql2);
                                while ($rows = mysqli_fetch_assoc($parent_result2)) {
                            ?>
                        <tr>
                            <td><?php echo $rows['parentID'] ?></td>
                            <td><?php echo $rows['name']  ?></td>
                            <?php
                                    echo "<td><a class='btn editbtn' href = updateParent.php?userID=" . $rows['parentID'] . " > update </a> </td>" ?>
                        <?php }?>   

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
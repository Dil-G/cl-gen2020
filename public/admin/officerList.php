<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
    header('Location: ../common/error.html');
} else {

    $userID = $_SESSION['userID'];
?>


    <!DOCTYPE html>

    <head>
        <?php
        include_once '../../config/conn.php';
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Grade Scholarship Results</title>
        <link rel="stylesheet" href="../css/view.css " type="text/css">
        <link type="text/css" rel="stylesheet" href="../css/main.css">
        <link type="text/css" rel="stylesheet" href="../css/tabs.css">
        <link type="text/css" rel="stylesheet" href="../css/users.css">
        <link type="text/css" rel="stylesheet" href="../css/messages.css">
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/pop.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/search.js"></script>

    </head>

    <body>
        <div id="nav2"></div>
        <div class="content">
            <h1>Officers List</h1>
            <form class="search" action="register_stu.html">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <?php
            //echo "test";


            $sql = "SELECT COUNT(isActivated) FROM user where userType='officer' AND isActivated=0";
            $sql3 = "SELECT COUNT(isActivated) FROM user where userType='officer' AND isActivated=1";
            $sql1 = "SELECT * FROM user where isActivated=0 and userType='officer' ";
            $sql2 = "SELECT * FROM user where isActivated=1 and userType='officer' ";

            $result = $conn->query($sql);
            $result3 = $conn->query($sql3);
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql2);


            ?>

            <div class="btn-box">
                <button id="button2" onclick="activated()">Added Users</button>
                <button id="button1" onclick="notActivated()">Activated Users</button>
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
                        while ($row = $result->fetch_assoc()) {
                            echo "Officer Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                    </div>
                    <hr>
                    <div class="scroll">
                        <table>
                            <tr>
                                <th>User ID</th>
                                <th>UserName</th>
                                <th>User Type</th>
                                <th>Add Details</th>
                            </tr>
                            <tbody id="Table">
                                <?php
                                while ($row = mysqli_fetch_assoc($result1)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['userID'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['userType'] ?></td>
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
                        while ($row = $result3->fetch_assoc()) {
                            echo "Activated Officer Count: " . $row["COUNT(isActivated)"] . "<br>";
                        } ?>
                    </div>
                    <hr>
                    <div class="scroll">
                        <table>
                            <tr>
                                <th>User ID</th>
                                <th>UserName</th>
                                <th>User Type</th>
                                <th>Edit Details</th>
                            </tr>
                            <tbody id="Table">
                                <?php
                                while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['userID'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['userType'] ?></td>
                                        <?php echo "<td><a class='btn editbtn' href = officerProfile.php?userID=" . $row['userID'] . " > update </a> </td>" ?>
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
        </div>
        <script>
            var page1 = document.getElementById("page1");
            var page2 = document.getElementById("page2");
            var button1 = document.getElementById("button1");
            var button2 = document.getElementById("button2");

            let url = window.location.href;
            if (url == window.location.href) {
                page1.style.display = "block";
                page2.style.display = "none";
                button1.style.color = "#008080";
                button2.style.color = "#000";

            }

            function activated() {
                page1.style.display = "block";
                page2.style.display = "none";
                button1.style.color = "#008080";
                button2.style.color = "#000";

            }

            function notActivated() {
                page1.style.display = "none";
                page2.style.display = "block";
                button1.style.color = "#000";
                button2.style.color = "#008080";
            }
        </script>
    </body>

    </html>
<?php } ?>
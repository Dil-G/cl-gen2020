<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d1", $dutyID)) {
        include('../../src/assign_teachers.php');
        include_once '../../config/conn.php';
?>

        <!DOCTYPE html>

        <head>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Teachers List</title>
            <link rel="stylesheet" href="../css/view.css " type="text/css">
            <link type="text/css" rel="stylesheet" href="../css/main.css">
            <link type="text/css" rel="stylesheet" href="../css/tabs.css">
            <link type="text/css" rel="stylesheet" href="../css/users.css">
            <link type="text/css" rel="stylesheet" href="../css/view.css">
            <link type="text/css" rel="stylesheet" href="../css/pop.css">
            <link type="text/css" rel="stylesheet" href="../css/register.css">
            <link type="text/css" rel="stylesheet" href="../css/messages.css">
            <script src="../js/confirm.js"></script>
            <script src="../js/jquery-1.9.1.min.js"></script>
            <script src="../js/pop.js"></script>
            <script src="../js/nav.js"></script>
            <script src="../js/search.js"></script>
            <script src="../js/tabs.js"></script>
        </head>

        <body>
            <div id="officeNav"></div>
            <div class="content">
                <div class="card">

                    <?php if (isset($_GET['error'])) { ?>
                        <div id="error"><?php echo $_GET['error']; ?></div>
                    <?php } ?>

                    <form class="search">
                        <input type="text" ID="Inputs" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>
                    <div class="btn-box" style="margin-left:5px;">
                        <button id="button2" onclick="activated()">Sports</button>
                        <button id="button1" onclick="notActivated()">Socieities</button>
                    </div>
                    <hr>

                </div>
                <br>
                <div id="page2" class="page">
                    <div class="card">
                        <h1>Societies</h1>

                        <div class="scroll">
                            <table>
                                <tr>
                                    <th>Society ID</th>
                                    <th>Society Name</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($societies__result)) {
                                ?>
                                    <tbody id="Table">
                                        <tr>
                                            <td><?php echo $row['SocietyID'] ?></td>
                                            <td><?php echo $row['SocietyName'] ?></td>

                                            <?php

                                                $sql = "SELECT * FROM teachertype WHERE entityAssigned='" . $row['SocietyID'] . "'";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    echo "<td style='background-color:#99ff99'>Teacher In-charge Allocated</td>";
                                                } else {
                                                    echo "<td style='background-color:#ffad99'>Teacher In-charge Not Allocated</td>";
                                                }
                                                ?>
                                            
                                             
                                        </tr>
                                    <?php
                                }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="page1" class="page">
                    <div class="card">
                        <h1>Sports</h1>
                        <div class="scroll">
                            <table>
                                <tr>
                                    <th>Sport ID</th>
                                    <th>Sport Name</th>
                                    <th>Status</th>
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_assoc($sports_result)) {
                                ?>
                                    <tbody id="Table">
                                        <tr>
                                            <td><?php echo $row['SportID'] ?></td>
                                            <td><?php echo $row['SportName'] ?></td>
                                            
                                            <?php

                                            $sql = "SELECT * FROM teachertype WHERE entityAssigned='" . $row['SportID'] . "'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<td style='background-color:#99ff99'>Teacher In-charge Allocated</td>";
                                            } else {
                                                echo "<td style='background-color:#ffad99'>Teacher In-charge Not Allocated</td>";
                                            }
                                            ?>
                                            
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <script>
                var form1 = document.getElementById("addExamForm");
                var addExam = document.getElementById("addExamBtn");

                addExam.onclick = function() {
                    form1.style.display = "block";
                }
            </script>
        </body>

        </html>

<?php }
} ?>
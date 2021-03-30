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
                    <?php if (isset($_GET['msg'])) { ?>
                        <div id="message"><?php echo $_GET['msg']; ?></div>
                    <?php } ?>
                    <h1 style="margin-top:20px;">Teachers List</h1>

                    <form class="search">
                        <input type="text" ID="Inputs" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>
                    <div class="btn-box" style="margin-left:5px;">
                        <button id="button2" onclick="activated()">Classes</button>
                        <button id="button1" onclick="notActivated()">Sports and Societies</button>
                    </div>
                    <hr>

                    <div>
                        <button style="float: left;margin-left:33%" id="addExamBtn" class="btn editbtn" type="submit" formaction="office_assignTeachers.php">Assign Teachers</button>
                        <form action='../../src/assign_teachers.php' method="GET" onclick="return confirmation()">
                            <input type="hidden" name="delete" value="delete" />
                            <button  style="float: right;margin-right:32%" class='btn dltbtn' input type="submit" name="generate" value="generate">De-allocate all Teacher Roles</button>
                        </form>
                        <div id="addExamForm" class="model">
                            <div class="modal-content container" style="margin-top:200px;margin-left:450px;border-radius:5px">
                                <form action="../../src/assign_teachers.php" enctype="multipart/form-data" method="POST">


                                    <label name="file"><b>Enter CSV File</b></label>
                                    <input type="file" id="file" name="file" class="nextpgbtn" required></br>

                                    <button type="submit" class="registerbtn" name="assign_teachers" value="Import">Save</button>
                                    <a href="office_assignTeachers.php" class="cancel-btn">Cancel</a>


                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <br>
                <div id="page2" class="page">
                    <div class="card">
                        <h2>Teachers in Charge</h2>
                        <div class="count">
                            <?php
                            while ($row = mysqli_fetch_assoc($iteacher_result)) {
                                echo "Teacher in Charge Count: " . $row["COUNT(teacherType)"] . "<br>";
                            } ?>
                        </div>
                        <div class="scroll">
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Sport/Society</th>
                                    <th>Assign Category</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($incharge_result)) {
                                ?>
                                    <tbody id="Table">
                                        <tr>
                                            <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>

                                            <td><?php if ($row['SportID']) {
                                                    echo $row['SportName'];
                                                } else {
                                                    echo $row['SocietyName'];
                                                } ?></td>
                                            <td>
                                                <form action='../../src/assign_teachers.php' method="GET" onclick="return confirmation()">
                                                <button class='btn dltbtn' input type="submit" name="deleteuser" value="<?php echo $row['teacherID'] ?>">De-allocate</button>
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
                <div id="page1" class="page">
                    <div class="card">
                        <h2>Class Teachers</h2>
                        <div class="count">
                            <?php
                            while ($row = mysqli_fetch_assoc($cteacher_result)) {
                                echo "Class Teacher Count: " . $row["COUNT(teacherType)"] . "<br>";
                            } ?>
                        </div>
                        <div class="scroll">
                            <table>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Assigned Class</th>
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_assoc($classTeacher_result)) {
                                ?>
                                    <tbody id="Table">
                                        <tr>
                                            <td><?php echo $row['teacherID'] ?></td>
                                            <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>
                                            <td><?php echo $row['entityAssigned'] ?></td>

                                            <td>
                                                <form action='../../src/assign_teachers.php' method="GET" onclick="return confirmation()">
                                                <button class='btn dltbtn' input type="submit" name="deleteuser" value="<?php echo $row['teacherID'] ?>">De-allocate</button>
                                            </form>
                                            </td>
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
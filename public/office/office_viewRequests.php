<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d4", $dutyID)) {
        include_once '../../src/office_View_requests.php';
?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>View Requests</title>
            <script src="../js/jquery-1.9.1.min.js"></script>
            <script src="../js/nav.js"></script>
            <script src="../js/search.js"></script>
            <script src="../js/tabs.js"></script>
            <script src="../js/confirm.js"></script>
            <link rel="stylesheet" href="../css/register.css " type="text/css">
            <link type="text/css" rel="stylesheet" href="../css/main.css">
            <link type="text/css" rel="stylesheet" href="../css/profile.css">
            <link type="text/css" rel="stylesheet" href="../css/tabs.css">
            <link type="text/css" rel="stylesheet" href="../css/view.css">
            <link type="text/css" rel="stylesheet" href="../css/pop.css">
        </head>

        <body>
            <div id="officeNav"></div>
            <div class="content">
                <br>
                <?php if (isset($_GET['message'])) { ?>
                    <div id="message"><?php echo $_GET['message']; ?></div>
                <?php } ?>

                <?php if (isset($_GET['error'])) { ?>
                    <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>

                <div class="card">
                    <h1 style="color: #6a7480;"> Request List </h1>
                    <br>
                    <form class="search">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>

                    <div class="btn-box" style="margin-left:5px;">
                        <button id="button2" onclick="activated()">Requests</button>
                        <button id="button1" onclick="notActivated()">Responded requests</button>
                    </div>
                </div>

                <br>

                <div id="page2" class="page">
                    <div class="card">
                        <br>
                        <hr>
                        <table>
                            <tr>
                                <th>Request ID</th>
                                <th>User ID</th>
                                <th>Request</th>
                                <th>Proof</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                                $task = 'delete';
                            ?>
                                <tr>
                                    <td><?php echo $row['requestID'] ?></td>
                                    <td><?php echo $row['userID'] ?></td>
                                    <td><?php echo $row['request'] ?></td>
                                    <td>
                                        <?php
                                        $requestID = $row['requestID'];
                                        $query = "SELECT * FROM proofs WHERE requestID='$requestID'";
                                        $result_q = mysqli_query($conn, $query);
                                        while ($row2 = mysqli_fetch_array($result_q)) {
                                        ?>
                                        <?php echo "<a class='btn editbtn' href = 'office_view_proof.php?proofID=" . $row2['proofID'] . "'>View </a>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $row['requestDate'] ?></td>
                                    <td><?php echo $row['requestTime'] ?></td>

                                    <td>
                                        <form action='../../src/office_manage_request.php' method="GET" onclick="return confirmation()">
                                            <input type="hidden" name="requestID" value="<?php echo $row['requestID'] ?>" />
                                            <input type="hidden" name="task" value="<?php echo $task ?>" />
                                            <button class='btn dltbtn' input type="submit">Delete</button>
                                        </form>
                                    </td>


                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <div id="page1" class="page">
                    <div class="card">
                        <br>
                        <hr>
                        <table>
                            <tr>
                                <th>Request ID</th>
                                <th>User ID</th>

                                <th>Request</th>
                                <th>Proof</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            <?php
                            while ($row1 = mysqli_fetch_assoc($res1)) {
                                $task = 'resolve';
                            ?>
                                <tr>
                                    <td><?php echo $row1['requestID'] ?></td>
                                    <td><?php echo $row1['userID'] ?></td>
                                    <td><?php echo $row1['request'] ?></td>
                                    <td>
                                        <?php

                                        $requestID = $row1['requestID'];
                                        $query = "SELECT * FROM proofs WHERE requestID='$requestID'";
                                        $result_q = mysqli_query($conn, $query);
                                        while ($row2 = mysqli_fetch_array($result_q)) {
                                        ?>
                                        <?php echo "<a class='btn editbtn' href = 'office_view_proof.php?proofID=" . $row2['proofID'] . "'>View </a> ";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $row1['requestDate'] ?></td>
                                    <td><?php echo $row1['requestTime'] ?></td>


                                    <td>
                                        <form action='../../src/office_manage_request.php' method="GET" onclick="return confirmation()">
                                            <input type="hidden" name="requestID" value="<?php echo $row1['requestID'] ?>" />
                                            <input type="hidden" name="task" value="<?php echo $task ?>" />
                                            <button class='btn viewbtn' input type="submit">Mark as resolved</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>
            <script>
                var form1 = document.getElementById("character-form");

                var characterbtn = document.getElementById("character-btn");

                var close1 = document.getElementsByClassName("close1")[0];
                var close2 = document.getElementsByClassName("close2")[0];

                characterbtn.onclick = function() {
                    form1.style.display = "block";
                }

                close1.onclick = function() {
                    form1.style.display = "none";
                }
                close2.onclick = function() {
                    form2.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>


        </body>

        </html>

<?php }
} ?>
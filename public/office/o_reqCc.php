<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d3", $dutyID)) {

        include_once('../../src/view_characterRequest.php');
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Character Certificates</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/profile.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
</head>

<body>
    <div id="officeNav"></div>
    <div class="content">
        <h1>Character Certificates</h1>

        <div class="btn-box" style="margin-top:10px!important;">
            <button id="button1" onclick="requests()">Requests</button>
            <button id="button4" onclick="sent()">Sent</button>
            <button id="button2" onclick="issues()">Issues</button>
            <button id="button3" onclick="accepted()">Accepted</button>
        </div>
        <div id="page1" class="page">
            <div class="card" style="margin-left:4%;width:95%;">
                <h2>Requests</h2>
                <br>
                <hr>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Requested Date and Time</th>
                        <th>Reason</th>
                        <th>Proof</th>
                        <th>Generate <br>Character Certificate</th>
                        <th>Reject Request</th>
                        <th>Send to Student</th>
                    </tr>
                    <tr>
                        <?php while ($row = mysqli_fetch_assoc($result_requests)) {
                                ?>
                        <td><?php echo $row['userID'] ?></td>
                        <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>
                        <td><?php echo $row['requestedDateTime'] ?></td>
                        <td><?php echo $row['reason'] ?></td>
                        <td>
                            <button id="character-btn" onclick="openCharacterForm()">Open Image</button>


                            <div id="character-form" class="model">


                                <div class="modal-content" style="margin-left: 120px;">
                                    <span class="close1 close_character" onclick="closeCharacterForm()">&times;</span>
                                    <h2>Proof File</h2>
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['proofImage']) . '"/>'; ?>
                                </div>

                            </div>

                        </td>

                        <td>
                            <?php $_SESSION['studentID'] = 'ST2000001';
                                        echo "<a class='btn editbtn' href = '../../src/notifications.php?character=" . $row['userID'] . "'>Generate </a> " ?>
                        </td>
                        <td><button class="btn dltbtn" type="button">Reject</button></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>

        <div id="page4" class="page">
            <div class="card" style="margin-left:4%;width:95%;">
                <h2>Requests</h2>
                <br>
                <hr>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Proof</th>
                        <th>Character Certificate</th>
                    </tr>
                    <tr>
                        <?php while ($row = mysqli_fetch_assoc($result_requestsSent)) {
                                ?>
                        <td><?php echo $row['userID'] ?></td>
                        <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>
                        <td><?php echo $row['proof'] ?></td>

                        <td>
                            <?php $_SESSION['studentID'] = 'ST2000001';
                                        echo "<a class='btn editbtn' href = '../common/character_certificate_view.php?userID=" . $row['userID'] . "' >View </a> " ?>
                        </td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
        <!--Page1 end-->
        <!--Page 2-->
        <div id="page2" class="page">
            <div class="card" style="margin-left:4%;width:95%;">
                <h2>Issues</h2>
                <br>
                <hr>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Issue</th>
                        <th>Proof</th>
                        <th>Character Certificate</th>
                        <th>Resolve and generate <br>new Character Certificate</th>
                    </tr>
                    <tr>
                        <?php while ($rows = mysqli_fetch_assoc($result_requestsIssue)) {
                                ?>
                        <td><?php echo $rows['userID'] ?></td>
                        <td><?php echo $rows['fName'] . " " . $rows['lName'] ?></td>
                        <td><?php echo $rows['issue'] ?></td>
                        <td> 
                            <button id="character-btn" onclick="openCharacterForm()">Open Image</button>

                            <div id="character-form" class="model">
                                <div class="modal-content" style="margin-left: 120px;">
                                    <span class="close1 close_character" onclick="closeCharacterForm()">&times;</span>
                                    <h2>Proof File</h2>
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows['proofImage']) . '"/>'; ?>
                                </div>

                            </div>
                        </td>

                        <td><?php echo $rows['filename'] ?></td>

                        <td>
                            <?php $_SESSION['studentID'] = 'ST2000001';
                                        echo "<a class='btn editbtn' href = '../../src/notifications.php?character=" . $rows['userID'] . "'>Regenerate </a> " ?>
                        </td>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
        <!--Page2 End-->
        <!--Page3-->
        <div id="page3" class="page">
            <div class="card" style="margin-left:4%;width:95%;">
                <h2>Accepted</h2>
                <br>
                <hr>
                 <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Download</th>                    </tr>
                    <tr>
                        <?php while ($rows = mysqli_fetch_assoc($result_requestsAccepted)) {
                                ?>
                        <td><?php echo $rows['userID'] ?></td>
                        <td><?php echo $rows['fName'] . " " . $rows['lName'] ?></td>
                       


                        <td>
                            <?php $_SESSION['studentID'] = 'ST2000001';
                                        echo "<a class='btn editbtn' href = '../../src/character.php?userID=" . $rows['userID'] . "'>Download </a> " ?>
                        </td>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
        <!--Page 3 end-->
    </div>

    <script>
    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var page4 = document.getElementById("page4");
    var button1 = document.getElementById("button1");
    var button2 = document.getElementById("button2");
    var button3 = document.getElementById("button3");
    var button4 = document.getElementById("button4");

    let url = window.location.href;
    if (url == window.location.href) {
        page1.style.display = "block";
        page2.style.display = "none";
        page3.style.display = "none";
        page4.style.display = "none";
        button1.style.color = "#008080";
        button2.style.color = "#000";
        button3.style.color = "#000";
        button4.style.color = "#000";
    }

    function requests() {
        page1.style.display = "block";
        page2.style.display = "none";
        page3.style.display = "none";
        page4.style.display = "none";
        button1.style.color = "#008080";
        button2.style.color = "#000";
        button3.style.color = "#000";
        button4.style.color = "#000";

    }

    function issues() {
        page1.style.display = "none";
        page2.style.display = "block";
        page3.style.display = "none";
        page4.style.display = "none";
        button1.style.color = "#000";
        button2.style.color = "#008080";
        button3.style.color = "#000";
        button4.style.color = "#000";
    }

    function accepted() {
        page1.style.display = "none";
        page2.style.display = "none";
        page3.style.display = "block";
        page4.style.display = "none";
        button1.style.color = "#000";
        button2.style.color = "#000";
        button3.style.color = "#008080";
        button4.style.color = "#000";
    }

    function sent() {
        page1.style.display = "none";
        page2.style.display = "none";
        page3.style.display = "none";
        page4.style.display = "block";
        button1.style.color = "#000";
        button2.style.color = "#000";
        button3.style.color = "#000";
        button4.style.color = "#008080";
    }
    </script>

    <script>
    var form1 = document.getElementById("requests-form");
    var form2 = document.getElementById("issues-form")
    var reqbtn = document.getElementById("requests-btn");
    var issuesbtn = document.getElementById("issues-btn");

    var close1 = document.getElementsByClassName("close1")[0];
    var close2 = document.getElementsByClassName("close2")[0];

    reqbtn.onclick = function() {
        form1.style.display = "block";
    }

    close1.onclick = function() {
        form1.style.display = "none";
    }
    issuesbtn.onclick = function() {
        form2.style.display = "block";
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
<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
    header('Location: ../common/error.html');
} else {

    $userID = $_SESSION['userID'];
    include '../../src/dashboard.php';
    include '../../config/conn.php';


?>

    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/nav.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/main.css">
        <link type="text/css" rel="stylesheet" href="../css/dashboard.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['User type', 'Numbers'],
                    <?php
                    $sql = "SELECT userType, COUNT(*) as numbers FROM user WHERE isActivated='1' GROUP BY userType";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc(($result))) {
                        $numbers = $row['numbers'];
                        $userType = $row['userType'];

                        echo "['$userType',$numbers],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Percentage of active users'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <title>Admin Dashboard</title>
    </head>

    <body>

        <div id="nav2"></div>
        <div class="content">
            <?php echo $row['numbers']; ?>

            <div class="welcome">
                <div class="dash-content">
                    <h1>Welcome to CL-GEN</h1>
                    <h2>ADMIN PORTAL</h2>
                    <?php echo "Date : " . date("Y/m/d"); ?>
                </div>
            </div>

            <table class="statis one">
                <tr>
                    <td>
                        <a href=admin_student.php>
                            <div class="box">
                                <i class="fa fa-users "></i>
                                <div class="info">
                                    <h3><?php
                                        while ($Srow = $student_result->fetch_assoc()) {
                                            echo  $Srow["COUNT(isActivated)"] . "<br>";
                                        } ?></h3> <span>Students</span>
                                    <p>Click here to view data</p>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href=admin_teachers.php>
                            <div class="box">
                                <i class="fa fa-users"></i>
                                <div class="info">
                                    <h3><?php
                                        while ($Trow = $teacher_result->fetch_assoc()) {
                                            echo $Trow["COUNT(isActivated)"] . "<br>";
                                        } ?></h3> <span>Teachers</span>
                                    <p>Click here to view data</p>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href=admin_staff.php>
                            <div class="box">
                                <i class="fa fa-users "></i>
                                <div class="info">
                                    <h3><?php
                                        while ($Strow = $staff_result->fetch_assoc()) {
                                            echo ". . .  " . $Strow["COUNT(isActivated)"] . "<br>";
                                        } ?></h3> <span>Office Staff</span>
                                    <p>Click here to view data</p>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
            <div class="box" style="width: 80%;margin-left:130px;">
                <div id="piechart" style="width: auto; height: 200px;margin-left:180px; border-radius:10px;"></div>
                
            </div>

            <table class="statis two">
                <tr>
                    <td>
                        <div class="box ">
                            <i class="fa fa-futbol-o"></i>
                            <h3><?php
                                while ($Sprow = $sport_result->fetch_assoc()) {
                                    echo $Sprow["COUNT(SportID)"] . "<br>";
                                } ?></h3>
                            <p class="lead">Sports</p>
                        </div>
                    </td>
                    <td>
                        <div class="box ">
                            <i class="fa fa-music"></i>
                            <h3><?php
                                while ($Sorow = $society_result->fetch_assoc()) {
                                    echo $Sorow["COUNT(SocietyID)"] . "<br>";
                                } ?></h3>
                            <p class="lead">Societies</p>
                        </div>
                    </td>
                    <td>
                        <div class="box ">
                            <i class="fa fa-user"></i>
                            <h3><?php
                                while ($Urow = $user_res4->fetch_assoc()) {
                                    echo $Urow["COUNT(isActivated)"] . "<br>";
                                } ?></h3>
                            <p class="lead">Users</p>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="pack">
                <table>
                    <tr>
                        <td>
                            <table class="statis three">
                                <tr>

                                    <th>
                                        <a href=admin_newsfeed.php>
                                            <div class="box ">
                                                <h2 style=" float:left;margin-left:20px;">NEWS</h2>
                                                <p style="float:right;line-height:35px;margin-right:8%;">View More<i class="fa fa-angle-right" style="float:right;margin-left:85%;line-height:115px;"></i></p>
                                            </div>
                                        </a>

                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="box ">
                                            <?php
                                            while ($Nrow = $news_result->fetch_assoc()) {
                                                echo "<h3>" . $Nrow["title"] . "<hr></h3>";

                                                echo substr($Nrow['news'], 0, 200) . "...<br>";
                                            ?>
                                                <hr>
                                            <?php
                                            } ?>

                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="statis four">
                                <tr>

                                    <th>
                                        <a href=o_viewReq.php>
                                            <div class="box ">
                                                <h2 style=" float:left;margin-left:20px;">Requests</h2>
                                                <p style="float:right;line-height:35px;margin-right:25px;">View More<i class="fa fa-angle-right" style="float:right;margin-left:79%;line-height:120px;"></i></p>
                                            </div>
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="box ">
                                            <?php
                                            while ($Rrow = $request_result->fetch_assoc()) {

                                                echo substr($Rrow['request'], 0, 200) . "...<br>";
                                            ?>
                                                <hr>
                                            <?php
                                            } ?>

                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

    </body>

    </html>

<?php } ?>
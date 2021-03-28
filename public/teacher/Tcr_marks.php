<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'teacher'){
        header('Location: ../common/error.html');
    }else{      
        $teacherType = array();
        $teacherType = $_SESSION['teacherType'];


        if (!in_array("classTeacher", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      

    $classID = $_SESSION['classID'];
    $userID = $_SESSION['userID'];
    $studentID = $_GET['studentID'];
    include('../../src/view_marks.php');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marks</title>
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/nav.js"></script>
        <link rel="stylesheet" href="../css/view.css " type="text/css">
        <link type="text/css" rel="stylesheet" href="../css/main.css">
        <link type="text/css" rel="stylesheet" href="../css/users.css">
        <link type="text/css" rel="stylesheet" href="../css/register.css">
        <link type="text/css" rel="stylesheet" href="../css/messages.css">
        <link type="text/css" rel="stylesheet" href="../css/class.css">
    </head>


    <body>

        <body>
            <div id="teacherNav"></div>
            <div class="content">
                <div class="card">
                <?php $rows = mysqli_fetch_assoc($student_result); ?>
                <h2 style="color: #6a7480;margin-top:0px;"><?php echo $rows['fName'] . " " . $rows['lName'] ?> Marks</h2>
                </div>
                <br>
                <div class="card">
                    <hr>
                    <!-- <form class="search" action="Tcr_marks.php">
                        <button type="submit" name="submit" method="POST">Calculate Total Marks</button> -->
                        <table  style="margin-left: -20px;">
                            <tr>

                                <th>Subject</th>
                                <th>Student Name</th>
                            </tr>
                            <?php
                            $total = 0;
                            $c=0;
                            while ($row = mysqli_fetch_assoc($passed_result)) {
                                $total = $total + $row['mark'];
                                $c=$c+1;
                            ?>
                            
                                <tr>
                                    <td><?php echo $row['subjectName'] ?></td>
                                    <td><?php echo $row['mark'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <td><b>Total Marks</b></td>
                                <td><?php echo $total ?></td>
                            </tr>
                            <tr>
                                <td><b>Average Mark from <?php echo $c ?> Subjects</b></td>
                                <td><?php if($c != 0){echo ($total/$c);}else{echo $c;} ?></td>
                            </tr>
                        </table>
                </div>
                <br>
                <br>


        </body>

    </html>

<?php
}}
?>
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
    $_SESSION['class']=$classID ;

    include_once '../../src/view_marks.php';
    include_once '../../src/addClass.php';
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Class</title>
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/pop.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/main.css">
        <link type="text/css" rel="stylesheet" href="../css/register2.css">
        <link type="text/css" rel="stylesheet" href="../css/class.css">
        <link rel="stylesheet" href="../css/view.css " type="text/css">
        <link type="text/css" rel="stylesheet" href="../css/pop.css">


        <script>
            $(document).ready(function() {
                $("#Inputs").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#Table tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </head>

    <body>
        <div id="teacherNav"></div>
        <div class="content">
            <div class="card">
                <?php
                $row = mysqli_fetch_assoc($class_result); ?>

                <h1 style="color:#6a7480;">Class <?php echo substr($row['classID'], 5) ?></h1>


                <?php echo "<td><a style='margin-left:-120px;'class='btn editbtn' href = Tcr_csv_marks.php?classID=" . $row['classID'] . " >Upload Marks </a> </td>" ?>


                <div class=l-part>
                    <label for="name"><b>Class Teacher ID</b></label>
                    <input type="text" placeholder="12-A" name="id" value="<?php if ($row['teacherID'] == TRUE) {
                                                                                echo $row['teacherID'];
                                                                            } ?>" required>
                </div>
                <div class=r-part>
                    <label for="name"><b>Class Teacher</b></label>
                    <input type="text" placeholder="W.H.M.Gunathilaka" name="name" value="<?php if ($row['fName'] == TRUE) {
                                                                                                                echo $row['fName']." ".$row['lName'];
                                                                                                            } ?>"  required>

                </div>
            </div>

            <br>



            <div class="card">
                <br>
                <br>
                <hr>
                <table>
                    <tr>
                        <th>Admission number</th>
                        <th>Student name</th>
                        <th>View Profile</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($students_result)) { ?>
                        <tr>
                            <td><?php $studentID = $row['studentID'];
                                echo $studentID; ?>
                            <td><?php
                                $sql1 = "SELECT * FROM student WHERE admissionNo ='$studentID'";
                                $result1 = mysqli_query($conn, $sql1);
                                while ($rows = mysqli_fetch_assoc($result1)) {
                                    echo $rows['fName'] . " " .  $rows['lName'];
                                }
                                ?></td>

                            <?php echo "<td><a class='btn editbtn' href = Tcr_marks.php?studentID=" . $row['studentID'] . " >View Marks </a> </td>" ?>

                        </tr>
                    <?php } ?>

                </table>
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
<?php
}}
?>
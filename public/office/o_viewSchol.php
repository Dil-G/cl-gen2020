<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d2", $dutyID)) {
	?>

<!DOCTYPE html>

<head>
    <?php
include_once '../../config/conn.php';
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade Scholarship Results</title>
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    
    <div class="content">
        <br>
        <h1 style="color: #6a7480;">Grade 5 Scholarship Examination Results</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>

        <div class="card">
            <div>
                <button id="addExamBtn" class="btn editbtn" type="submit" formaction="o_addSchol.php">Add
                    Exam</button>
                <div id="addExamForm" class="model">
                    <div class="modal-content container">
                        <form action="../../src/o_addschol.php" method="POST">
                            <br>
                            <h1 style="color: #6a7480;">Add Grade 5 Scholarship Exam Results</h1>
                            <br>
                            <hr style="margin-left: 2%;">
                            <label for="scholExamYear"><b>Enter Exam Year</b></label>
                            <input type="text" placeholder="Enter Exam Year" name="scholExamYear" required>
                            <button type="submit" class="registerbtn" name="savebtn">Save</button>
                            <a href="o_viewSchol.php" class="cancel-btn">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <?php
                    $sql = "SELECT * FROM addScholExam" ;
                    $result = mysqli_query($conn,$sql);
                    ?>
            <hr>
            <table>
                <tr>
                    <th>Exam ID</th>
                    <th>Year</th>
                    <th>Name of the Examination</th>
                    <th>Edit Details</th>
                    <th>View Details</th>


                </tr>
                <tr>
                    <?php
                    
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['examID']?></td>
                    <td><?php echo $row['examYear']?></td>
                    <td><?php echo $row['examName']?></td>
                    <?php echo "<td><a id='addExamBtn' class='btn editbtn' href = o_scholCsv.php?examID=".$row['examID']." > Add Results </a></td>"
                    ?>
                   
                    <?php echo "<td><a id='viewExamBtn' class='btn viewbtn' href = o_schol.php?examID=".$row['examID'].">View Results</td>" ?>
                     

                </tr>
                <?php
                    }
                    ?>
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

<?php }} ?>

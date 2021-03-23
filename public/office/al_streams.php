<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d2", $dutyID)) {

        include('../../src/view_subjects.php');
	?>

<!DOCTYPE html>

<head>
    <?php
include_once '../../config/conn.php';
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Advanced Level Subject Streams</title>
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
        <h1 style="color: #6a7480;">Advanced Level Subject Streams</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>

        <div class="card">
            <div>
                <button id="addExamBtn" class="btn editbtn" type="submit" formaction="o_addSchol.php">Add New Stream</button>
                <div id="addExamForm" class="model">
                    <div class="modal-content container">
                        <form action="../../src/o_addAl.php" method="POST">
                            <br>
                            <h1 style="color: #6a7480;">Advanced Level Subject Streams</h1>
                            <br>
                            <hr style="margin-left: 2%;">
                            <label for="scholExamYear"><b> Stream Name</b></label>
                            <input type="text" placeholder="Enter Stream Name" name="alStreamName" required>
                            <button type="submit" class="registerbtn" name="alstreams">Save</button>
                            <a href="al_streams.php" class="cancel-btn">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <hr>
            <table>
                <tr>
                    <th>Stream ID</th>
                    <th>Stream Name</th>
                    <th>Add Subjects</th>
                    <th>View Subjects</th>

                </tr>
                <tr>
                    <?php
                    
                    while($row=mysqli_fetch_assoc($result_alstream)){
                    ?>
                <tr>
                    <td><?php echo $row['streamID']?></td>
                    <td><?php echo $row['streamName']?></td>
                    <?php echo "<td><a id='addcsv' class='btn editbtn' href = al_subjects.php?streamID=".$row['streamID']." > Add Subjects </a></td>"
                    ?>
                   
                    <?php echo "<td><a class='btn viewbtn' href = streamDetails.php?streamID=".$row['streamID'].">View Subjects</td>" ?>
                     

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

    var form2 = document.getElementById("csv-form");
    var addCsv = document.getElementById("addcsv");

    addExam.onclick = function() {
        form1.style.display = "block";
    }
    addCsv.onclick = function(){
        form2.style.display = "block";
    }
    </script>
</body>

</html>

<?php }} ?>
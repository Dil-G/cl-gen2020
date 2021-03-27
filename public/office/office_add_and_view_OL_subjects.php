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
    <title>Ordinary Level Subjects</title>
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
        <h1 style="color: #6a7480;">Ordinary Level Subjects</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>

        <div class="card">
            <div>
                <button id="addExamBtn" class="btn editbtn" type="submit" formaction="../../src/office_add_and_view_OL_subjects.php">Add Subjects</button>
                <div id="addExamForm" class="model">
                    <div class="modal-content container">
                        <form action="../../src/office_add_and_view_OL_subjects.php" method="POST">
                            <br>
                            <h1 style="color: #6a7480;">Add Ordinary Level Subjects</h1>
                            <br>
                            <hr style="margin-left: 2%;">

                            <label for="subject-cat"><b>Category</b></label>
                            <select name="subject-cat" id="">
                                <option disabled selected value> -- Select an option -- </option>
                                <option value="Main">Main Subjects Category</option>
                                <option value="Cat1">Category 1</option>
                                <option value="Cat2">Category 2</option>
                                <option value="Cat3">Category 3</option>
                            </select>
                            

                            <label for="subject-name" ><b>Subject Name</b></label>
                            <input type="text" name="subject-name" placeholder="Enter Subject Name" required> 

                            <button type="submit" class="registerbtn" name="savebtn">Save</button>
                            <a href="office_add_and_view_OL_subjects.php" class="cancel-btn">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <?php
                    $sql = "SELECT * FROM ol_subjects" ;
                    $result = mysqli_query($conn,$sql);
                    ?>
            <hr>
            <table>
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Category</th>


                </tr>
                <tr>
                    <?php
                    
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['SubjectID']?></td>
                    <td><?php echo $row['SubName']?></td>
                    <td><?php echo $row['CatName']?></td>
                    
                     

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

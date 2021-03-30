<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d2", $dutyID)) {

        $teacherID = $_GET['userID'];

	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Scholarship Results</title>
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    <?php

				require_once '../../config/conn.php';             
?>
    <div class="content">
        <div class="container" style="margin-left:250px;">
            <form method="POST" enctype="multipart/form-data" action="../../src/assign_teachers.php">
                
                <hr>
                <?php if($_GET['entity'] == 'Class'){
                ?>
                <label ><b>Enter the Class ID</b></label>
                
                <input type="text" name="classID" placeholder='Enter the Class ID'  required>
                <?php }else{
                    echo "<label ><b>Enter the ".  $_GET['entity'] ." Name</b></label>";
                    echo" <input type='text' name='categoryID' placeholder='Enter the Category ID' required>";
                } ?>
                <input type="hidden" id="teacherID" name="teacherID" value="<?php echo $_GET['userID']?>" required></br>
<!-- 
                <label name="file"><b>Enter CSV File</b></label>
                <input type="file" id="myFile" name="file" class="nextpgbtn" required></br> --> 

                <button type="submit" class="registerbtn" name="assign_teacher"  >Save</button>
                <a href="office_assignNewTeachers.php" class="cancel-btn">Cancel</a>

                </form>

        </div>

</div>

</body>

</html>

<?php }} ?>

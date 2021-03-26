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
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Subjects</title>
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officdeNav"></div>
    <?php

        
				require_once '../../config/conn.php';

				$sql = "SELECT * FROM alstreams where streamID ='".$_GET['streamID']."'";

                $res= mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($res);

				if($res){

				}
				else{
				echo"failed";	
                }
                    
                
?>
    <div class="content">
        <div class="container" style="margin-left:250px;">
            <form method="POST" enctype="multipart/form-data" action="../../src/o_addAl.php">
                
                <h1><?php echo $row['streamName']?></h1>
                <hr>

                <label for="examID" ><b>Stream ID</b></label>
                <input type="text" name="streamID" value= "<?php echo $row['streamID']?>" required>
                
                <label><b>Subjects :</b></label>
                <br>
                <br>
                <br>
                <?php
                    while($row_list=mysqli_fetch_assoc($result_subjects)){?>
                        <option value="<? echo $row_list['subjectID']; ?>"<? if($row_list['subjectID']==$select){ echo "selected"; } ?>>  
                                         <?echo $row_list['subjectName'];?>  
                    </option>

            <?php } ?>

                <button type="submit" class="registerbtn" name="streamSubjects"  >Save</button>
                <a href="al_streams.php" class="cancel-btn">Cancel</a>



                </form>

        </div>

</div>

</body>

</html>

<?php }} ?>
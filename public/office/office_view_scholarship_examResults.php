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

<?php
include_once '../../config/conn.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade 5 Scholarship Examination Results</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    
    <div class="content">

    <?php
             
             $sql = "SELECT * FROM addscholexam WHERE examID = '".$_GET['examID']."'";
             $result = mysqli_query($conn,$sql);
             $row=mysqli_fetch_assoc($result);

         ?>

        <?php $postfix = explode("/", $row['examID'])  ?>
    <h1 style="color: #6a7480;">Grade 5 Scholarship Examination Results - <?php print_r($postfix[1]) ?></h1>
        
        <br>
        <form class="search">
                <input type="text" ID="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>


        <br>
        <br>
        <br>



        <div class="card">

            <br>
            <br>

            <hr>
            <?php
             
             $sql2 = "SELECT * FROM scholarship_results WHERE examID = '".$_GET['examID']."'";
             $result2 = mysqli_query($conn,$sql2);
             $row=mysqli_fetch_assoc($result2);

             $sql3 = "SELECT pass_mark FROM addscholexam WHERE examID = '".$_GET['examID']."'";
             $results3 = mysqli_query($conn,$sql3);
             $marks_row =mysqli_fetch_assoc($results3);

         ?>
            <table>
                <tr>
                    <th>Admission Number</th>
                    <th>Index Number</th>
                    <th>Student Name</th>
                    <th>Results</th>
                    <th>Pass/Fail</th>


                </tr>

                <?php
                    while($row=mysqli_fetch_array($result2)){
                     
                   
                ?>
                    <tr>
                        
                        <td><?php echo $row["studentID"]; ?></td>
                        <td><?php echo $row["studentIndex"]; ?></td>
                        <?php
                        $sql4 = "SELECT fName,lName FROM student WHERE admissionNo  = '".$row['studentID']."'";
                        $results4 = mysqli_query($conn,$sql4);
                        $name =mysqli_fetch_assoc($results4);
                        ?>
                        <td><?php echo $name["fName"]." ".$name["lName"]; ?></td>
                        <td><?php echo $row["marks"]; ?></td>
                        <td><?php echo ($row["marks"] >= $marks_row["pass_mark"] ? "Pass" : "Fail"); ?></td>
                        <?php
                   }
               ?>
                    </tr>
                    
                    </table>
                
        </div>


    </div>

</body>

</html>

<?php }} ?>
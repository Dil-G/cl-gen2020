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
<html>
<?php
include_once '../../config/conn.php';
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.C.E. O/L Examination Results</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
</head>

<body>
    <?php
             
             $sql = "SELECT * FROM addolexam WHERE examID = '".$_GET['examID']."'";
             $result = mysqli_query($conn,$sql);
             $row=mysqli_fetch_assoc($result);

         ?>

    <div id="officeNav"></div>
    <div class="content">
        <br>
        <?php $postfix = explode("/", $row['examID'])  ?>
        <h1 style="color:#6a7480;">G.C.E. O/L Examination Results - <?php print_r($postfix[1]) ?></h1>
        <form class="search">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
        </form>


        <br>
        <br>
        <br>



        <div class="card">

            <br>
            <br>
            <?php

            $sql_requests="SELECT student.fName,student.lName, ol_results.*, ol_subjects.*  FROM ol_results
            LEFT JOIN student ON student.admissionNo=ol_results.studentID 
            LEFT JOIN ol_subjects ON ol_subjects.SubjectID=ol_results.subjectID ";
            $result_requests = mysqli_query($conn,$sql_requests);
             
    

         ?>
            <div class="scroll" style="height: 390px;">
                <table>
                <thead>
                <hr>
                    <tr>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Subject ID</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                    
                    <tbody id="Table">
                    <tr>
                        <?php
                    while($row=mysqli_fetch_array($result_requests)){
      
                ?>
                    <tr>
                        <td><?php echo $row["fName"]." ".$row["lName"] ?></td>
                        <td><?php echo $row["SubName"]; ?></td>
                        <td><?php echo $row["subjectID"]; ?></td>
                        <td><?php echo $row["grade"]; ?></td>

                        <?php
                        
                   }
               ?>
                    </tr>
                    </tbody>
                    

                </table>
                </tr>


                </table>
            </div>
        </div>


    </div>

</body>

</html>

<?php }} ?>
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
    <title>Grade 5 Scholarship Examination Results - 2016</title>
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
    <h1 style="color: gray;">Grade 5 Scholarship Examination Results - <?php print_r($postfix[1]) ?></h1>
        
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
             
             $sql2 = "SELECT * FROM schol_rsheet WHERE examID = '".$_GET['examID']."'";
             $result2 = mysqli_query($conn,$sql2);
             $row=mysqli_fetch_assoc($result2);

         ?>
            <table>
                <tr>
                    <th>Admission Number</th>
                    <th>Index Number</th>
                    <th>Student Name</th>
                    <th>Results</th>


                </tr>
                <?php
                    while($row=mysqli_fetch_array($result2)){
                ?>
                    <tr>
                        <td><?php echo $row["admissionNo"]; ?></td>
                        <td><?php echo $row["studentIndex"]; ?></td>
                        <td><?php echo $row["studentName"]; ?></td>
                        <td><?php echo $row["examMarks"]; ?></td>
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
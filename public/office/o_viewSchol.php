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
            <form>
                <button class="editbtn left" type="submit" formaction="o_addSchol.php">Add Exam</button>
            </form>
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
                    <?php echo "<td><a class='btn editbtn' href = o_scholCsv.php?examID=".$row['examID']." > Add  Results </a> </td>"?>
                    <td>
                        <form><button class="btn viewbtn" type="submit" formaction="o_schol.php">View Results</button>
                        </form>
                    </td>

                </tr>
                <?php
                    }
                    ?>
            </table>
        </div>

    </div>

</body>

</html>

<?php }} ?>
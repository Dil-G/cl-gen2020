<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d6", $dutyID)) {
	?>

<!DOCTYPE html>
<html>

<head>

    <?php
include_once '../../config/conn.php';
?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Classes</title>
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
        <h1 style="color:#6a7480;">Grade 1 - Classes</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>

        <div class="card">
            <form>
                <p><b>Upload student list</b></p>
                <input type="file" id="myFile" name="filename" required>
                </br>
                <button type="submit" formaction="">Upload</button>
            </form>
            <br>
            <br>

            <hr>
            <table>
                <tr>
                    <th>Class ID </th>
                    <th>Class</th>
                    <th>View classes</th>

                </tr>

                <tr>
                    <td>20G1CA</td>
                    <td>Class 1A</td>
                    <td>
                        <form><button class="btn editbtn" type="submit" formaction="o_class.php">View Class</button>
                        </form>
                    </td>

                </tr>

                <?php
                while($row=mysqli_fetch_assoc($grade_result)) {
                    ?>
                <tr>
               
                    <td><?php echo $row['GradeID'] ?></td>
                    <td><?php echo $row['Grade'] ?></td>
                  
                        <?php echo "<td><a class='btn editbtn' href = o_addClasses.php?grade=".$row['GradeID']." >Add Classes </a> </td>"?>
                       
                  
                        <?php echo "<td><a class='btn editbtn' href = o_classes.php?grade=".$row['GradeID']." >View Classes </a> </td>"?>
                 
                    
                </tr>
                <?php }?>

            </table>
        </div>

    </div>

</body>

</html>

<?php }} ?>
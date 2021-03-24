<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'teacher') {


    $teacherType = $_SESSION['teacherType'];
    $userID = $_SESSION['userID'];
    include_once '../../config/conn.php';
    //include "function.php";
    include_once '../../src/addClass.php';
    include_once '../../src/uploadClasses.php';
    include_once '../../src/view_class.php';

?>


      <!DOCTYPE html>
      <html>

      <head>


          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title> Classes</title>
          <link rel="stylesheet" href="../css/view.css " type="text/css">
          <link type="text/css" rel="stylesheet" href="../css/main.css">
          <link type="text/css" rel="stylesheet" href="../css/users.css">
          <link type="text/css" rel="stylesheet" href="../css/register.css">
          <link type="text/css" rel="stylesheet" href="../css/messages.css">
          <link type="text/css" rel="stylesheet" href="../css/class.css">
          <script src="../js/jquery-1.9.1.min.js"></script>
          <script src="../js/pop.js"></script>
          <script src="../js/nav.js"></script>
          <script src="../js/search.js"></script>
      </head>

      <body>
          <div id="teacherNav"></div>

          <div class="content">

          <div class="card">
                <?php if (isset($_GET['error'])) { ?>
                    <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>


                <?php
                while ($row = mysqli_fetch_assoc($class_result)) {
                    $_SESSION['classID'] =$row['classID'];
                ?>
                    <h1 style="color:#6a7480;">Class <?php echo substr($row['classID'], 5) ?></h1>
                    <hr>
                    <form action="../../src/uploadClasses.php" method="POST">

                        <div class="l-part">
                            <label for="teacherID"><b>Class Teacher ID</b></label>
                            <input type="text" placeholder="Add the class teacher" name="teacherID" value="<?php if ($row['teacherID'] == TRUE) {
                                                                                                                echo $row['teacherID'];
                                                                                                            } ?>" required>
                            <input type="hidden" name="classID" value="<?php echo $_GET['class'] ?>" required>
                        </div>
                        <div class="l-part">
                            <label for="name"><b>Class Teacher</b></label>

                            <input type="text" placeholder="Add the class teacher" name="name" value="<?php if ($row['teacherIncharge'] == TRUE) {
                                                                                                            echo $row['teacherIncharge'];
                                                                                                        } ?>" readonly>
                        </div>

                        <div class="r-part">
                            <label for="medium"><b>Medium</b></label>
                            <select name="medium" id="medium" required>
                                <option value="<?php if ($row['name'] == TRUE) {
                                                    echo $row['medium'];
                                                } ?>"><?php if ($row['name'] == TRUE) {
                                                                                                                echo $row['medium'];
                                                                                                            } ?></option>
                                <option value="English">English</option>
                                <option value="Sinhala">Sinhala</option>
                                <option value="Tamil">Tamil</option>
                            </select>
                            <br><br>
                            <!-- <input type="text" placeholder="Add the medium" name="medium" value="<?php if ($row['name'] == TRUE) {
                                                                                                            echo $row['medium'];
                                                                                                        } ?>" required> -->
                        </div>
                      
                    <?php } ?>

                    </form>
                   
            </div>
<br>
          
            <br>
            <div class="card">
            <form class="search" action="Tcr_classDetails.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
                <hr>
                <table>
                    <tr>
                        <th>Admission number</th>
                        <th>Student name</th>
                        <th>View Profile</th>
                        <th>Decipline</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($students_result)) {
                    ?>
                    <tbody id="Table"> 
                        <tr>

                            <td><?php $studentID = $row['studentID'];
                                echo $studentID; ?>
                            <td><?php
                                $sql = "SELECT * FROM student WHERE admissionNo ='$studentID'";
                                $result = $conn->query($sql);
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo $rows['fName'] . " " .  $rows['lName'];
                                }
                                ?></td>


                            <?php echo "<td><a class='btn editbtn' href = SProfile.php?userID=" . $row['studentID'] . " >View Profile </a> </td>" ?>
                            <?php echo "<td><a class='btn editbtn' href =Tcr_decipline.php?userID=" . $row['studentID'] . " >Add</a> </td>" ?>

                        </tr>
                        </tbody> 
                    <?php } ?>


                </table>
            </div>
        </div>
    </body>

    </html>

<?php }
?>
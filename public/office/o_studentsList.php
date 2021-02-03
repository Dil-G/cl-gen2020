<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d1", $dutyID)) {
        include ('../../src/view_users.php');
        include_once '../../config/conn.php';
    ?>

<!DOCTYPE html>

<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students User List</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    <div class="content">
    
        <h1>Students List</h1>


        <div class="btn-box">
            <button id="button2" onclick="activated()">Added Users</button>
            <button id="button1" onclick="notActivated()">Activated Users</button>
        </div>

        <br>
        <br>
        <div id="page1" class="page">
            <div class="card">
            <?php if (isset($_GET['error'])) { ?>
        <div id="error"><?php echo $_GET['error']; ?></div>
    <?php } ?>
                <div class="count">
                    <?php
                     while($row = $student_result->fetch_assoc()) {
                     echo "Student Count: " . $row["COUNT(isActivated)"]. "<br>";
                     }?>
                </div>

           
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Student Name</th>
                        <th>Add Details</th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($student_result2)){
                        ?>
                    <tr>
                        <td><?php echo $row['userID'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <?php echo "<td><a class='btn editbtn' href = o_addStudentDetails.php?userID=".$row['userID']." > Add </a> </td>"?>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
        <div id="page2" class="page">
            <div class="card">
                <div class="count">
                    <?php
                     while($row = $student_result1->fetch_assoc()) {
                     echo "Activated Student Count: " . $row["COUNT(isActivated)"]. "<br>";
                     }?>
                </div>
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>UserName</th>
                        <th>User Type</th>
                        <th>Edit Details</th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($student_result4)){
                        ?>
                    <tr>
                        <td><?php echo $row['userID'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['userType'] ?></td>
                        <?php echo "<td><a class='btn editbtn' href = SProfile.php?userID=".$row['userID']." > update </a> </td>"?>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var button1 = document.getElementById("button1");
    var button2 = document.getElementById("button2");

    let url = window.location.href;
    if (url == window.location.href) {
        page1.style.display = "block";
        page2.style.display = "none";
        button1.style.color = "#008080";
        button2.style.color = "#000";

    }

    function activated() {
        page1.style.display = "block";
        page2.style.display = "none";
        button1.style.color = "#008080";
        button2.style.color = "#000";

    }

    function notActivated() {
        page1.style.display = "none";
        page2.style.display = "block";
        button1.style.color = "#000";
        button2.style.color = "#008080";
    }
    </script>
</body>

</html>

<?php }
   } ?>
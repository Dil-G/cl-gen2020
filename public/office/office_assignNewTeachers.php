<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d1", $dutyID)) {
        include('../../src/assign_teachers.php');
        include_once '../../config/conn.php';
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teachers List</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <script src="../js/confirm.js"></script>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    <div class="content">
        <div class="card">

            <?php if (isset($_GET['error'])) { ?>
            <div id="error"><?php echo $_GET['error']; ?></div>
            <?php } ?>
            <h1 style="margin-top:20px;">Teachers List</h1>

            <form class="search">
                <input type="text" ID="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <hr>
        </div>
        <br>
        <div class="card">
            <hr>
            <div class="scroll">
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Assign a Class</th>
                        <th>Assign a Sport / Society</th>
                    </tr>

                    <?php
                                while ($row = mysqli_fetch_assoc($teachers_result)) {
                                ?>
                    <tbody id="Table">
                        <tr>
                            <td><?php echo $row['teacherID'] ?></td>
                            <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>

                            <?php echo "<td><a class='btn editbtn' href = office_assignClass.php?userID=" . $row['teacherID'] ."&entity=Class". "> Assign  </a> </td>" ?>
                            <?php echo "<td><a class='btn editbtn' href = office_assignClass.php?userID=" . $row['teacherID'] ."&entity=Category". "> Assign  </a> </td>" ?>
                          
                        </tr>
                    </tbody>
                    <?php
                                }
                                ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php }
} ?>
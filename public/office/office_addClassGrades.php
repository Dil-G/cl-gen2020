<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d6", $dutyID)) {

        include_once '../../config/conn.php';
        include_once '../../src/addClass.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assign Classes</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>

    <div class="content">
        <br>
        <div class="card">
            <h1 style="color:#6a7480;"><?php echo $_GET['Gyear'] ?> Grades</h1>
            <hr>
            <form class="search" action="register_stu.html">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <br>

        <div class="card">
            <hr>

            <table>
                <tr>
                    <th>Grade ID </th>
                    <th>Grade</th>
                    <th>Classes</th>

                </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($grade_result)) {
                        $gradeID = $row['GradeID'];
                ?>
                <tr>

                    <td><?php echo $gradeID ?></td>
                    <td><?php echo $row['Grade'] ?></td>

                    <?php if ($row['gradeActive'] == 0) {
                            echo "<td><a class='btn viewbtn' href = office_addClasses.php?grade=" . $gradeID . " >Add Classes </a> </td>";
                        } else {
                            echo "<td><a class='btn editbtn' href = office_classes.php?Ggrades=" . $gradeID . " >View Grade </a> </td>";
                        } ?>
                </tr>
                <?php } ?>
            </table>

        </div>

    </div>

</body>

</html>

<?php }
} ?>
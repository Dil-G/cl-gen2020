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
            <title> Classes</title>
            <link rel="stylesheet" href="../css/view.css " type="text/css">
            <link type="text/css" rel="stylesheet" href="../css/main.css">
            <link type="text/css" rel="stylesheet" href="../css/users.css">
            <link type="text/css" rel="stylesheet" href="../css/messages.css">
            <link type="text/css" rel="stylesheet" href="../css/class.css">
            <link type="text/css" rel="stylesheet" href="../css/register.css">
            <script src="../js/jquery-1.9.1.min.js"></script>
            <script src="../js/pop.js"></script>
            <script src="../js/nav.js"></script>
        </head>

        <body>
            <div id="officeNav"></div>

            <div class="content">
                <br>
                <div class="card">
                    <h1 style="color:#6a7480;">Grade <?php echo substr($_GET['Ggrades'], 5) ?> Classes</h1>
                    <hr>
                    <form action="../../src/addClass.php" method="POST" style="float:left;margin-right:50px;">
                        <input type="hidden" name="thisGrade" value="<?php echo $_GET['Ggrades'] ?>" required>
                        <button type="submit" class='btn viewbtn' name="addNewClass">Add a class</button>
                    </form>
                    <form class="search" action="register_stu.html">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <br>

                <div class="card">

                    <?php if (isset($_GET['error'])) { ?>
                        <div id="error"><?php echo $_GET['error']; ?></div>
                    <?php } ?>

                    <form action="../../src/uploadClasses.php" method="post" name="upload_excel" enctype="multipart/form-data">



                        <h3>Upload student list</h3>
                        <hr>
                        <div class="le-part">
                            <label>Enter Number of Students</label>
                            <input type="text" name="NoOfStudents" id="NoOfStudents" required>

                        </div>
                        <div class="ri-part">
                            <label for="Import">Import data</label>
                            <input type="file" name="file" id="file" required>
                            <input type="hidden" name="grade" id="grade" value="<?php echo $_GET['Ggrades'] ?>">
                        </div>
                        <br>
                        <br>
                        <br>
                        <br> <br>

                        <button type="submit" id="submit" name="Import" class="editbtn" data-loading-text="Loading...">Import</button>

                    </form>
                    <hr>
                    <div class="scroll">
                        <table>
                            <tr>
                                <th>Class ID </th>
                                <th>Class</th>
                                <th>View classes</th>

                            </tr>

                            <?php
                            while ($row = mysqli_fetch_assoc($class_result)) {
                            ?>
                                <tr>

                                    <td><?php echo $row['classID'] ?></td>
                                    <td><?php echo $row['name'] ?></td>

                                    <?php echo "<td><a class='btn editbtn' href = o_class.php?class=" . $row['classID'] . " >View Class </a> </td>" ?>

                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>

        </body>

        </html>

<?php }
} ?>
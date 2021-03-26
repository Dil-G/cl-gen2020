<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d2", $dutyID)) {

        include('../../src/view_subjects.php');

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Add Subjects</title>
            <link type="text/css" rel="stylesheet" href="../css/pop.css">
            <link type="text/css" rel="stylesheet" href="../css/register.css">
            <link type="text/css" rel="stylesheet" href="../css/main.css">
            <link type="text/css" rel="stylesheet" href="../css/messages.css">
            <script src="../js/jquery-1.9.1.min.js"></script>
            <script src="../js/pop.js"></script>
            <script src="../js/nav.js"></script>
            <script src="../js/errors.js"></script>

        </head>

        <body>
            <div id="officeNav"></div>
            <?php


            require_once '../../config/conn.php';

            $streamID = $_GET['streamID'];

            $sql = "SELECT * FROM alstreams where streamID = '$streamID'";

            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);

            if ($res) {
            } else {
                echo "failed";
            }


            ?>
            <div class="content">
                <div class="container" style="margin-left:250px;">
                    <form method="POST" enctype="multipart/form-data" action="../../src/o_addAl.php" onsubmit="return validateStreamSubject(subject1.value,subject2.value,subject3.value)">

                        <h1><?php echo $row['streamName'] ?></h1>
                        <hr>

                        <label for="examID"><b>Stream ID</b></label>
                        <input type="text" name="streamID" value="<?php echo $row['streamID'] ?>" required>

                        Subjects :
                        <select name='subject1'>
                            <option value="">--- Select ---</option>
                            <?php
                            $select = "subject";
                            if (isset($select) && $select != "") {
                                $select = $_POST['subject'];
                            }
                            ?>
                            <?php
                            $sql = "SELECT * from subjects";
                            $list = mysqli_query($conn, $sql);
                            while ($row_list = mysqli_fetch_assoc($list)) {
                            ?>
                                <option value="<?php echo $row_list['subjectID']; ?>" <?php if ($row_list['subjectID'] == $select) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                    <?php echo $row_list['subjectName']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <select name='subject2'>
                            <option value="">--- Select ---</option>
                            <?php
                            $select = "subject";
                            if (isset($select) && $select != "") {
                                $select = $_POST['subject'];
                            }
                            ?>
                            <?php
                            $sql = "SELECT * from subjects";
                            $list = mysqli_query($conn, $sql);
                            while ($row_list = mysqli_fetch_assoc($list)) {
                            ?>
                                <option value="<?php echo $row_list['subjectID']; ?>" <?php if ($row_list['subjectID'] == $select) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                    <?php echo $row_list['subjectName']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <select name='subject3'>
                            <option value="">--- Select ---</option>
                            <?php
                            $select = "subject";
                            if (isset($select) && $select != "") {
                                $select = $_POST['subject'];
                            }
                            ?>
                            <?php
                            $sql = "SELECT * from subjects";
                            $list = mysqli_query($conn, $sql);
                            while ($row_list = mysqli_fetch_assoc($list)) {
                            ?>
                                <option value="<?php echo $row_list['subjectID']; ?>" <?php if ($row_list['subjectID'] == $select) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                    <?php echo $row_list['subjectName']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <?php if (isset($_GET['error'])) { ?>
                            <div id="error"><?php echo $_GET['error']; ?></div>
                        <?php } ?>

                        <?php if (isset($_GET['message'])) { ?>
                            <div id="message"><?php echo $_GET['message']; ?></div>
                        <?php } ?>
                        <button type="submit" class="registerbtn" name="streamSubjects">Save</button>
                        <a href="al_streams.php" class="cancel-btn">Cancel</a>



                    </form>

                </div>

            </div>

        </body>

        </html>

<?php }
} ?>
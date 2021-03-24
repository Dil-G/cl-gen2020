    <?php
    include_once '../config/conn.php';

    if (isset($_POST['alstreams'])) {


        $alStreamName = $_POST['alStreamName'];

        $sql = "SELECT * from alstreams";
        $result = mysqli_query($conn, $sql);
        $maxID = 0;

        while ($row = mysqli_fetch_array($result)) {

            $lastId = $row['streamID'];
            $charID = substr($lastId, 2);
            $intID = intval($charID);

            if ($intID > $maxID) {
                $maxID = $intID;
            }
        }


        if (mysqli_num_rows($result) == 0) {
            $prefix = "ST";
            $streamID = $prefix .  "1";
        } else {
            $prefix = "ST";
            $streamID = $prefix . ($maxID + 1);
        }



        $sql = "INSERT INTO alstreams (streamID, streamName) VALUES ('$streamID','$alStreamName');";

        if ($conn->query($sql) === TRUE) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/al_streams.php');
        } else {

            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }



    if (isset($_POST['alsubjects'])) {


        $subjectName = $_POST['alSubjectName'];

        $sql = "SELECT * from subjects WHERE subjectType='advanced'";
        $result = mysqli_query($conn, $sql);
        $maxID = 0;

        if (mysqli_num_rows($result) == 0) {
            $prefix = "SAL";
            $subjectID = $prefix .  "1";
        } else {

            while ($row = mysqli_fetch_array($result)) {

                $lastId = $row['subjectID'];
                $charID = substr($lastId, 3);
                $intID = intval($charID);

                if ($intID > $maxID) {
                    $maxID = $intID;
                }
            }
            $prefix = "SAL";
            $subjectID = $prefix . ($maxID + 1);
        }


        $subjectType = 'advanced';
        $sql = "INSERT INTO subjects (subjectID, subjectName,subjectType) VALUES ('$subjectID','$subjectName','$subjectType');";

        if ($conn->query($sql) === TRUE) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/subjects.php');
        } else {

            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }


    if (isset($_POST['streamSubjects'])) {



        $streamID = $_POST['streamID'];

        $subjects = $_POST['checkbox'];
        $subject = "";

        foreach ($subjects as $sub) {
            $subject = $sub;
            $sql2 = "INSERT INTO streamsubject (streamID, subjectID) VALUES('$streamID', '$subject')";
            echo $duty;
            echo $userID;

            $result = $conn->query($sql2);
            if ($result == False) {
                $error = "Subject already Assigned";
                header('Location: ../public/office/al_streams.php?error=' . $error . '?userID=' . $userID);
                exit();
            }else{
                header('Location: ../public/office/al_streams.php');
            }
        }
    }

    $conn->close();
    ?>

    <?php
    include_once '../config/conn.php';

    if (isset($_POST['alstreams'])) {


        $alStreamName = $_POST['alStreamName'];

        $read = "SELECT * from alstreams where streamName='$alStreamName'";
        $results = mysqli_query($conn, $read);

        if(mysqli_num_rows($results)>0){
            $error = "Stream already exists";
            header('Location: ../public/office/office_al_streams.php?error=' . $error);
            exit();
        }

        $sql2 = "SELECT * from alstreams";
        $result2 = mysqli_query($conn, $sql2);

        
        $maxID = 0;

        while ($row = mysqli_fetch_array($result2)) {

            $lastId = $row['streamID'];
            $charID = substr($lastId, 2);
            $intID = intval($charID);

            if ($intID > $maxID) {
                $maxID = $intID;
            }
        }

        if (mysqli_num_rows($result2) == 0) {
            $prefix = "ST";
            $streamID = $prefix .  "1";
        } else {
            $prefix = "ST";
            $streamID = $prefix . ($maxID + 1);
        }



        $sql = "INSERT INTO alstreams (streamID, streamName) VALUES ('$streamID','$alStreamName');";
$result = mysqli_query($conn,$sql);

        if ($result) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/office_al_streams.php');
        } else {

            $error = "Error in adding";
            header('Location: ../public/office/office_al_streams.php?error=' . $error);
            exit();
        }
    }


    if (isset($_POST['alsubjects'])) {


        $subjectName = $_POST['alSubjectName'];

        $read = "SELECT * from subjects where subjectsName='$subjectName'";
        $results = mysqli_query($conn, $read);

        if(mysqli_num_rows($results)>0){
            $error = "Subject already exists";
            header('Location: ../public/office/office_al_streams.php?error=' . $error);
            exit();
        }

        $sql2 = "SELECT * from subjects WHERE subjectType='advanced'";
        $result2 = mysqli_query($conn, $sql2);
        $maxID = 0;

        if (mysqli_num_rows($result2) == 0) {
            $prefix = "SAL";
            $subjectID = $prefix .  "1";
        } else {

            while ($row = mysqli_fetch_array($result2)) {

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
        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/office_al_subjects.php');
        } else {

            $error = "Error in adding";
            header('Location: ../public/office/office_al_subjects.php?error=' . $error);
            exit();
        }

    }



    if (isset($_POST['streamSubjects'])) {



        $streamID = $_POST['streamID'];

        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $subject3 = $_POST['subject3'];
        echo $subject1;
        echo $subject2;
        echo $subject3;

        if ($subject1 == $subject2) {
            $error = "Cannot select the same subjects";
            echo $error;
            header('Location: ../public/office/office_al_subjects.php?streamID=' . $streamID . '&error=' . $error);
            exit();
        } else if ($subject3 == $subject2) {
            $error = "Cannot select the same subjects";
            echo $error;
            header('Location: ../public/office/office_al_subjects.php?streamID=' . $streamID . '&error=' . $error);
            exit();
        } else if ($subject1 == $subject3) {
            $error = "Cannot select the same subjects";
            echo $error;
            header('Location: ../public/office/office_al_subjects.php?streamID=' . $streamID . '&error=' . $error);
            exit();
        }
        $subjects = array();
        array_push($subjects, $subject1, $subject2, $subject3);


        foreach ($subjects as $sub) {
            $subject = $sub;
            $sql2 = "INSERT INTO streamsubject (streamID, subjectID) VALUES('$streamID', '$subject')";


            $result = $conn->query($sql2);
            if ($result == False) {
                $error = "Stream already Assigned";
                header('Location: ../public/office/office_al_streams.php?error=' . $error);
                exit();
            } else {
                header('Location: ../public/office/office_al_streams.php');
            }
        }
    }

    $conn->close();
    ?>

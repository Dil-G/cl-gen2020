<?php
include_once '../config/conn.php';

//request status
// 0 = requested 
// 1 = generate and sent 
// 2 = character issues
// 3 = accepted

if (isset($_POST['requestCharacter'])) {


    $userID = $_POST['userID'];
    $reason = $_POST['reason'];
    $imageName = $_FILES['image']['name'];
    $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $imageType = $_FILES['image']['type'];

    $check_table = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $check_result = mysqli_query($conn, $check_table);
    $date = date('Y-m-d H:i:s');

    if (mysqli_num_rows($check_result) > 0) {
        
        $retreive_data = "SELECT * FROM characterrequests WHERE userID='$userID'";
        $result_data = mysqli_query($conn, $retreive_data);
        $row = mysqli_fetch_assoc($result_data);

        $oldrequestID = $row['requestID'];

        $retreive_data2 = "SELECT * FROM charactercertificate WHERE studentID='$userID'";
        $result_data2 = mysqli_query($conn, $retreive_data2);
        $row1 = mysqli_fetch_assoc($result_data2);

        $oldcharacterID = $row1['characterID'];

        $requestStatus = '4';
        $update = "UPDATE characterrequests SET requestStatus=$requestStatus ";
        $update_result = mysqli_query($conn, $update);

        $sql1 = "INSERT INTO characterregenerate (requestID,characterID,userID, reason,reqDate) VALUES ('$oldrequestID','$oldcharacterID','$userID','$reason','$date');";
        $update = "UPDATE characterrequests SET requestStatus=$requestStatus ";

        
        if ($conn->query($sql1) === TRUE && $conn->query($update) === TRUE) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/student/character-form.php');
        } else {
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
        exit();
    
    }

    $prefix = "CR";
    $retreive = "SELECT * FROM characterrequests";
    $result = mysqli_query($conn, $retreive);

    $maxID = 0;

    while ($row = mysqli_fetch_array($result)) {

        $lastId = $row['requestID'];
        $charID = substr($lastId, 2);
        $intID = intval($charID);

        if ($intID > $maxID) {
            $maxID = $intID;
        }
    }
    if (mysqli_num_rows($result) == 0) {
        $requestID = $prefix .  "1";
    } else {
        $requestID = $prefix . ($maxID + 1);
    }

    $requestStatus = 0;
    $sql = "INSERT INTO characterrequests (requestID,userID,reason,proof,proofImage,requestStatus,requestedDateTime) VALUES ('$requestID','$userID','$reason','$imageName','$imageData','$requestStatus','$date');";

    if ($conn->query($sql) === TRUE) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/student/character-form.php');
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }
}



//issues in Character certificate
if (isset($_POST['issueCharacter'])) {


    $userID = $_POST['userID'];
    $issue = $_POST['issue'];
    $date = date('Y-m-d H:i:s');
    $imageName = $_FILES['image']['name'];
    $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $imageType = $_FILES['image']['type'];

    $retreive = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    $requestID = $row['requestID'];
    $requestStatus = 2;

    $sql = "INSERT INTO characterissues (issue,proof,proofImage,userID,requestID,dateTime) VALUES ('$issue','$imageName','$imageData','$userID','$requestID','$date');";
    $update = "UPDATE characterrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";

    if ($conn->query($sql) === TRUE && $conn->query($update) === TRUE) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/student/newsfeed.php');
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['resolve'])) {


    $userID = $_GET['resolve'];


    $_SESSION['studentID']=$userID;

    $requestStatus = 1;

    $sql = "DELETE FROM charactercertificate WHERE studentID ='$userID' ";

    if ($conn->query($sql) === TRUE ) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/office/character.php?userID='.$userID);
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['accepted'])) {


    $userID = $_GET['accepted'];
    echo $userID;
    $retreive = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    if($row['requestStatus'] == '3'){
        
        $error = "Character Certificate Already accepted";
        header('Location: ../public/student/newsfeed.php?error='.$error);
        exit();
    }
    else{
        $requestID = $row['requestID'];

        $_SESSION['studentID']=$userID;

        $requestStatus = 3;

        $update = "UPDATE characterrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";

        if ($conn->query($update) === TRUE ) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/student/newsfeed.php?userID='.$userID);
        } else {
            $error = "Cannot be accepted";
        header('Location: ../public/student/newsfeed.php?userID='.$error);
        }
    }
}


$conn->close();

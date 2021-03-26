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
    $countfiles = count($_FILES['image']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        echo $ext;
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' && $ext !== 'gif' && $ext !== 'pdf' ){
            $error = "Invalid File type ";
            echo $error;
            header('Location: ../public/student/character-form.php?error='.$error);
            exit();

        }
    }


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
    $sql = "INSERT INTO characterrequests (requestID,userID,reason,requestStatus,requestedDateTime) VALUES ('$requestID','$userID','$reason','$requestStatus','$date');";
    $result =mysqli_query($conn,$sql);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageType = $_FILES['image']['type'][$i];
        $tmp=$_FILES['image']['tmp_name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);


            $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));
        

        $sql1 = "INSERT INTO proofs (requestID,fileNames,fileType,fileData) VALUES ('$requestID','$imageName','$imageType','$imageData');";
        $result1 =mysqli_query($conn,$sql1);
    }
    if ($result == false|| $result1 == false){
        $error = "Error in Requesting";
            header('Location: ../public/student/character-form.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/student/character-form.php');
    
    }

  
}






//issues in Character certificate
if (isset($_POST['issueCharacter'])) {

    $userID = $_POST['userID'];
    $issue = $_POST['issue'];
    $date = date('Y-m-d H:i:s');
   
    $countfiles = count($_FILES['image']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        echo $ext;
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' && $ext !== 'gif' && $ext !== 'pdf' ){
            $error = "Invalid File type ";
            echo $error;
            header('Location: ../public/student/newsfeed.php?error='.$error);
            exit();

        }
    }

    $retreive = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    $requestID = $row['requestID'];
    $requestStatus = 2;

    $sql = "INSERT INTO characterissues (issue,proof,proofImage,userID,requestID,dateTime) VALUES ('$issue','$imageName','$imageData','$userID','$requestID','$date');";
    $update = "UPDATE characterrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";
    $result =mysqli_query($conn,$sql);
    $result_update =mysqli_query($conn,$update);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageType = $_FILES['image']['type'][$i];
        $tmp=$_FILES['image']['tmp_name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));

        $sql1 = "INSERT INTO proofs (requestID,fileNames,fileType,fileData) VALUES ('$requestID','$imageName','$imageType','$imageData');";
        $result1 =mysqli_query($conn,$sql1);
    }
    
    if ($result == false|| $result1 == false||$result_update == false){
        $error = "Error in Requesting";
        header('Location: ../public/student/newsfeed.php?error='.$error);
        exit();
    } else{
            header('Location: ../public/student/newsfeed.php');
    }
}

// if (isset($_GET['resolve'])) {


//     $userID = $_GET['resolve'];


//     $_SESSION['studentID']=$userID;

//     $requestStatus = 1;

//     $sql = "DELETE FROM charactercertificate WHERE studentID ='$userID' ";

//     if ($conn->query($sql) === TRUE ) {
//         echo '<script language = "javascript">';
//         echo 'alert("Details Added");';
//         header('Location: ../public/office/character.php?userID='.$userID);
//     } else {
//         echo "Error : " . $sql . "<br>" . $conn->error;
//     }
// }

if (isset($_GET['accepted'])) {


    $userID = $_GET['accepted'];
    echo $userID;
    $retreive = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    if ($row['requestStatus'] == '3') {

        $error = "Character Certificate Already accepted";
        header('Location: ../public/student/newsfeed.php?error=' . $error);
        exit();
    } else {
        $requestID = $row['requestID'];

        $_SESSION['studentID'] = $userID;

        $requestStatus = 3;

        $update = "UPDATE characterrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";
        $result1 =mysqli_query($conn,$update);

        if ($result1 == false){
            $error = "Error in Accepting";
                header('Location: ../public/student/character-form.php?error='.$error);
                exit();
        } else{
                header('Location: ../public/student/character-form.php');
        
        }
    }
}


//Leaving Document

if (isset($_POST['requestLeaving'])) {

    
    $userID = $_POST['userID'];
    $reason = $_POST['reason'];
    $countfiles = count($_FILES['image']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        echo $ext;
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' && $ext !== 'gif' && $ext !== 'pdf' ){
            $error = "Invalid File type ";
            echo $error;
            header('Location: ../public/student/character-form.php?error='.$error);
            exit();
        }
    }

    $check_table = "SELECT * FROM leavingrequests WHERE userID='$userID'";
    $check_result = mysqli_query($conn, $check_table);
    $date = date('Y-m-d H:i:s');


    if (mysqli_num_rows($check_result) > 0) {

        $retreive_data = "SELECT * FROM leavingrequests WHERE userID='$userID'";
        $result_data = mysqli_query($conn, $retreive_data);
        $row = mysqli_fetch_assoc($result_data);

        $oldrequestID = $row['requestID'];

        $retreive_data2 = "SELECT * FROM leavingdocument WHERE studentID='$userID'";
        $result_data2 = mysqli_query($conn, $retreive_data2);
        $row1 = mysqli_fetch_assoc($result_data2);

        $oldleavingID = $row1['leavingID'];

        $requestStatus = '4';
        $update = "UPDATE leavingrequests SET requestStatus=$requestStatus ";
        $update_result = mysqli_query($conn, $update);

        $sql1 = "INSERT INTO characterregenerate (requestID,leavingID,userID, reason,reqDate) VALUES ('$oldrequestID','$oldleavingID','$userID','$reason','$date');";
        $update = "UPDATE leavingrequests SET requestStatus=$requestStatus ";


        if ($conn->query($sql1) === TRUE && $conn->query($update) === TRUE) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/student/character-form.php');
        } else {
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
        exit();
    }

    $prefix = "LV";
    $retreive = "SELECT * FROM leavingrequests";
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
    $sql = "INSERT INTO leavingrequests (requestID,userID,reason,requestStatus,requestedDateTime) VALUES ('$requestID','$userID','$reason','$requestStatus','$date');";
    $result =mysqli_query($conn,$sql);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageType = $_FILES['image']['type'][$i];
        $tmp=$_FILES['image']['tmp_name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);


            $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));
        

        $sql1 = "INSERT INTO proofs (requestID,fileNames,fileType,fileData) VALUES ('$requestID','$imageName','$imageType','$imageData');";
        $result1 =mysqli_query($conn,$sql1);
    }
    if ($result == false|| $result1 == false){
        $error = "Error in Requesting";
            header('Location: ../public/student/character-form.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/student/character-form.php');
    
    }

  
}




//     $userID = $_POST['userID'];
//     $reason = $_POST['reason'];
//     $imageName = $_FILES['image']['name'];
//     $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

//     $imageType = $_FILES['image']['type'];

//     $check_table = "SELECT * FROM leavingrequests WHERE userID='$userID'";
//     $check_result = mysqli_query($conn, $check_table);
//     $date = date('Y-m-d H:i:s');

//     if (mysqli_num_rows($check_result) > 0) {

//         $retreive_data = "SELECT * FROM leavingrequests WHERE userID='$userID'";
//         $result_data = mysqli_query($conn, $retreive_data);
//         $row = mysqli_fetch_assoc($result_data);

//         $oldrequestID = $row['requestID'];

//         $retreive_data2 = "SELECT * FROM leavingdocument WHERE studentID='$userID'";
//         $result_data2 = mysqli_query($conn, $retreive_data2);
//         $row1 = mysqli_fetch_assoc($result_data2);

//         $oldleavingID = $row1['leavingID'];

//         $requestStatus = '4';
//         $update = "UPDATE leavingrequests SET requestStatus=$requestStatus ";
//         $update_result = mysqli_query($conn, $update);

//         $sql1 = "INSERT INTO leavingregenerate (requestID,leavingID,userID, reason,reqDate) VALUES ('$oldrequestID','$oldleavingID','$userID','$reason','$date');";
//         $update = "UPDATE leavingrequests SET requestStatus=$requestStatus ";


//         if ($conn->query($sql1) === TRUE && $conn->query($update) === TRUE) {
//             echo '<script language = "javascript">';
//             echo 'alert("Details Added");';
//             header('Location: ../public/student/character-form.php');
//         } else {
//             echo "Error : " . $sql . "<br>" . $conn->error;
//         }
//         exit();
//     }

//     $prefix = "LV";
//     $retreive = "SELECT * FROM leavingrequests";
//     $result = mysqli_query($conn, $retreive);

//     $maxID = 0;

//     while ($row = mysqli_fetch_array($result)) {

//         $lastId = $row['requestID'];
//         $charID = substr($lastId, 2);
//         $intID = intval($charID);

//         if ($intID > $maxID) {
//             $maxID = $intID;
//         }
//     }
//     if (mysqli_num_rows($result) == 0) {
//         $requestID = $prefix .  "1";
//     } else {
//         $requestID = $prefix . ($maxID + 1);
//     }

//     $requestStatus = 0;
//     $sql = "INSERT INTO leavingrequests (requestID,userID,reason,proof,proofImage,requestStatus,date_time) VALUES ('$requestID','$userID','$reason','$imageName','$imageData','$requestStatus','$date');";

//     if ($conn->query($sql) === TRUE) {
//         echo '<script language = "javascript">';
//         echo 'alert("Details Added");';
//         header('Location: ../public/student/character-form.php');
//     } else {
//         echo "Error : " . $sql . "<br>" . $conn->error;
//     }
// }



//issues in leaving certificate
if (isset($_POST['issueLeaving'])) {

    $userID = $_POST['userID'];
    $issue = $_POST['issue'];
    $date = date('Y-m-d H:i:s');

    $countfiles = count($_FILES['image']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        echo $ext;
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' && $ext !== 'gif' && $ext !== 'pdf' ){
            $error = "Invalid File type ";
            echo $error;
            header('Location: ../public/student/newsfeed.php?error='.$error);
            exit();
        }
    }

    $retreive = "SELECT * FROM leavingrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    $requestID = $row['requestID'];
    $requestStatus = 2;

    $sql = "INSERT INTO leavingissues (issue,proof,proofImage,userID,requestID,date_time) VALUES ('$issue','$imageName','$imageData','$userID','$requestID','$date');";
    $update = "UPDATE leavingrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";
    $result =mysqli_query($conn,$sql);
    $result_update =mysqli_query($conn,$update);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageType = $_FILES['image']['type'][$i];
        $tmp=$_FILES['image']['tmp_name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));

        $sql1 = "INSERT INTO proofs (requestID,fileNames,fileType,fileData) VALUES ('$requestID','$imageName','$imageType','$imageData');";
        $result1 =mysqli_query($conn,$sql1);
    }
    if ($result == false|| $result1 == false||$result_update == false){
        $error = "Error in Requesting";
        header('Location: ../public/student/newsfeed.php?error='.$error);
        exit();
    } else{
            header('Location: ../public/student/newsfeed.php');
    }
}

// if (isset($_GET['resolve_leaving'])) {


//     $userID = $_GET['resolve_leaving'];


//     $_SESSION['studentID']=$userID;

//     $requestStatus = 1;

//     $sql = "DELETE FROM leavingDocument WHERE studentID ='$userID' ";

//     if ($conn->query($sql) === TRUE ) {
//         echo '<script language = "javascript">';
//         echo 'alert("Details Added");';
//         header('Location: ../public/office/leaving.php?userID='.$userID);
//     } else {
//         echo "Error : " . $sql . "<br>" . $conn->error;
//     }
// }

if (isset($_GET['acceptedLeaving'])) {


    $userID = $_GET['acceptedLeaving'];
    echo $userID;
    $retreive = "SELECT * FROM leavingrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $retreive);
    $row = mysqli_fetch_assoc($result);

    if ($row['requestStatus'] == '3') {

        $error = "Leaving Document Already acceptedLeaving";
        header('Location: ../public/student/newsfeed.php?error=' . $error);
        exit();
    } else {
        $requestID = $row['requestID'];

        $_SESSION['studentID'] = $userID;

        $requestStatus = 3;

        $update = "UPDATE leavingrequests SET requestStatus=$requestStatus WHERE requestID='$requestID'";

        $result1 =mysqli_query($conn,$update);

        if ($result1 == false){
            $error = "Error in Accepting";
                header('Location: ../public/student/character-form.php?error='.$error);
                exit();
        } else{
                header('Location: ../public/student/character-form.php');
        
        }
    }
}

$conn->close();

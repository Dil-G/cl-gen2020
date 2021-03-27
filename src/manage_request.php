<?php

require_once '../config/conn.php';

$task=$_GET['task'];

if (isset($_GET['requestID']) && $task == 'delete') {

    
    $requestID = $_GET['requestID'];
    echo $_GET['requestID'];
    $sql = "DELETE FROM request WHERE requestID = '$requestID'";
    $sql1 = "DELETE FROM proofs WHERE requestID = '$requestID'";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);


    if ($result && $result1) {
        header('Location: ../public/office/office_view_characher_certificate_requests.php');
    } else {
        $error = "Cannot delete the request";
        header('Location: ../public/office/office_view_characher_certificate_requests.php?error');
    }

} else if (isset($_GET['requestID']) && $task  == 'resolve') {
    echo $task;
    $requestID = $_GET['requestID'];
    echo $_GET['requestID'];
    $sql1 = "UPDATE request SET RequestStatus = '1' WHERE requestID ='$requestID'";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
       header('Location: ../public/office/o_viewReq.php');
    } else {
        $error = "Cannot resolve the request";
       header('Location: ../public/office/office_view_characher_certificate_requests.php?error');
    }
} else {
    $error = "Cannot Connect";
    header('Location: ../public/office/office_view_characher_certificate_requests.php?error');
}

$conn->close();


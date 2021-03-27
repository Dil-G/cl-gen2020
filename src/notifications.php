

<?php
include_once '../config/conn.php';

//request status
// 0 = requested 
// 1 = generate and sent 
// 2 = character issues
// 3 = accepted

if (isset($_GET['leaving'])) {

    $userID = $_GET['leaving'];
    $date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM leavingrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $requestID =$row['requestID'];

    $title = "Leaving Document";
    $message = "Your Leaving Document has been generated. Check for accuracy and accept or report error";

    $sql_noti = "INSERT into notifications(sendID,title,messages,reciever,dateTime) VALUES ('" . $requestID . "','" . $title . "','" . $message . "','" . $userID . "','" . $date . "')";
    $result_noti = mysqli_query($conn, $sql_noti);

    
    $update = "UPDATE leavingrequests SET requestStatus='1' WHERE userID='$userID'";
    $result_update = mysqli_query($conn, $update);

    if ($result_noti == TRUE && $result_update == TRUE ) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/office/office_view_characher_certificate_requests.php');
    } else {
        echo "Error : " . $sql_noti . "<br>" . $conn->error;
    }
}

if (isset($_GET['character'])) {

    $userID = $_GET['character'];
    $date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM characterrequests WHERE userID='$userID'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $requestID =$row['requestID'];

    $title = "Character Certificate";
    $message = "Your character certificate has been generated. Check for accuracy and accept or report error";

    $sql_noti = "INSERT into notifications(sendID,title,messages,reciever,dateTime) VALUES ('" . $requestID . "','" . $title . "','" . $message . "','" . $userID . "','" . $date . "')";
    $result_noti = mysqli_query($conn, $sql_noti);

    $update = "UPDATE characterrequests SET requestStatus='1' WHERE userID='$userID'";
    $result_update = mysqli_query($conn, $update);

    if ($result_noti == TRUE && $result_update == TRUE ) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/office/office_view_characher_certificate_requests.php');
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }
}


?>
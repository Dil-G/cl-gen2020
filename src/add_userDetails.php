<?php

require_once '../../config/conn.php';

if (isset($_GET['studentID'])) {

    $sql = "SELECT * FROM user where userID='" . $_GET['studentID'] . "'";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $stuID = $row['userID'];
    $charID = substr($stuID, 2);
    $pID = "PR" . $charID;

    if ($res) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}
if (isset($_GET['parentID'])) {

    $sql = "SELECT * FROM user where userID='" . $_GET['parentID'] . "'";

    $Parentres = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($Parentres);


    if ($res) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}

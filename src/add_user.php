<?php

require_once '../config/conn.php';
include '../utils/helpers.php';


if (isset($_GET['user_type'])) {


    $userType = $_GET['user_type'];

    $sql = "SELECT * from user WHERE userType = '$userType' ";
    $result = mysqli_query($conn, $sql);
    $maxID = 0;

    while ($row = mysqli_fetch_array($result)) {

        $lastId = $row['userID'];
        $charID = substr($lastId, 2);
        $intID = intval($charID);

        if ($intID > $maxID) {
            $maxID = $intID;
        }
    }
    if (mysqli_num_rows($result) == 0) {
        if ($userType == "student") {
            $date = date("y");
            $prefix = "ST";
            $userID = $prefix . $date . "00001";
        } else if ($userType == "teacher") {
            $date = date("y");
            $prefix = "TC";
            $userID = $prefix . $date . "00001";
        } else if ($userType == "officer") {
            $date = date("y");
            $prefix = "OF";
            $userID = $prefix . $date . "00001";
        } else if ($userType == "admin") {
            $date = date("y");
            $prefix = "AD";
            $userID = $prefix . $date . "00001";
        }
    } else {

        if ($userType == "student") {
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "ST";
                $userID = $prefix . $date . "00001";
            } else {
                $prefix = "ST";
                $userID = $prefix . ($maxID + 1);
            }
        } else if ($userType == "teacher") {
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "TC";
                $userID = $prefix . $date . "00001";
            } else {
                $prefix = "TC";
                $userID = $prefix . ($maxID + 1);
            }
        } else if ($userType == "officer") {
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "OF";
                $userID = $prefix . $date . "00001";
            } else {
                $prefix = "OF";
                $userID = $prefix . ($maxID + 1);
            }
        } else if ($userType == "admin") {
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "AD";
                $userID = $prefix . $date . "00001";
            } else {
                $prefix = "AD";
                $userID = $prefix . ($maxID + 1);
            }
        }
    }


    echo $userID;
}

if (isset($_POST['userid'])) {

    $username = $_POST['username'];
    $pwd = $_POST["pwd"];
    $userid = $_POST['userid'];
    $userType = $_POST['userType'];

    $read = "SELECT * from user WHERE userID = '$userid' OR username = '$username'";
    $result1 = mysqli_query($conn, $read);
    $rows = mysqli_fetch_array($result1);


    if ($rows > 0) {
        $error = "User ID already existing";
        header('Location: ../public/admin/users.php?error=' . $error);
        exit();
    } else {

        if ($userType == 'admin') {
            $pwd = md5($userid);
            $sql = "INSERT INTO user(username,password,userID,userType,isActivated)VALUES ('" . $username . "','" . $pwd . "','" . $userid . "','" . $userType . "','1')";
            $sql1 = "INSERT INTO admin(userID,email) VALUES ('" . $userid . "','" . $email . "')";

            if ($conn->query($sql) == TRUE && $conn->query($sql1) == TRUE) {

                header('Location: ../public/admin/users.php');
            } else {
                header('Location: ../public/admin/add_admin.php?error');
            }

            exit();
        } else {

            $pwd = md5($userid);
            $sql = "INSERT INTO user(username,password,userID,userType)VALUES ('" . $username . "','" . $pwd . "','" . $userid . "','" . $userType . "')";

            if ($userType == "student") {
                $intID = substr($userid, 2);
                $userid = "PR" . $intID;
                $username = "PR" . substr($intID, 0, 2) . "/" . substr($intID, 2);
                $pwd = md5($userid);
                $userType = "parent";

                $sql1 = "INSERT INTO user(username,password,userID,userType)VALUES ('" . $username . "','" . $pwd . "','" . $userid . "','" . $userType . "')";




                if ($conn->query($sql) == TRUE && $conn->query($sql1) == TRUE) {


                    header('Location: ../public/admin/users.php');
                    exit();
                } else {
                    header('Location: ../public/admin/users.php?error');
                    exit();
                }
            }
        }

        if ($conn->query($sql) == TRUE) {
            $logString = "Admin Added a user";
            echo $logString;
            writeApplicationLog($logString, '../logs');
            header('Location: ../public/admin/users.php');
        } else {
            header('Location: ../public/admin/register_user.php?error');
        }
    }

    $conn->close();
}

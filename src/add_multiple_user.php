<?php

require_once '../config/conn.php';

if (isset($_POST['userType']) && isset($_POST['number'])) {



    $userType = $_POST['userType'];
    $number = $_POST['number'];

    for ($n = 1; $n <= $number; $n++) {
        $maxID = 0;
        $sql = "SELECT * from user WHERE userType = '$userType'";
        $result = mysqli_query($conn, $sql);

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
            while ($row = mysqli_fetch_array($result)) {

                $lastId = $row['userID'];
                $charID = substr($lastId, 2);
                $intID = intval($charID);

                if ($intID > $maxID) {
                    $maxID = $intID;
                }
            }

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


        $username = substr($userID, 0, 4) . "/" . substr($userID, 4);
        $password = md5($userID);

        $read = $sql = "SELECT * from user WHERE userID = '$useID' OR username = '$username'";
        $result1 = mysqli_query($conn, $read);
        $rows = mysqli_fetch_array($result1);

        if ($rows > 0) {
            $error = "User ID already existing";
            header('Location: ../public/admin/admin_createMultipleUser.php?error=' . $error);
            exit();
        } else {

            $sql2 = "INSERT INTO user(username,password,userID,userType)VALUES ('" . $username . "','" . $password . "','" . $userID . "','" . $userType . "')";
            $result2 = mysqli_query($conn, $sql2);
            if ($userType == "student") {
                $intID = substr($userID, 2);
                $useridP = "PR" . $intID;
                $userName = "PR" . substr($intID, 0, 2) . "/" . substr($intID, 2);
                $password = md5($useridP);
                $usertype = "parent";

                $sql1 = "INSERT INTO user(username,password,userID,userType)VALUES ('" . $userName . "','" . $password . "','" . $useridP . "','" . $usertype . "')";
                $result3 = mysqli_query($conn, $sql1);

                if (!$result2||!$result3) {
                    $error = "User ID already existing";
                    header('Location: ../public/admin/admin_createMultipleUser.php?error=' . $error);
                    exit();
                } 
            }


            if (!$result2) {
                $error = "User ID already existing";
                header('Location: ../public/admin/admin_createMultipleUser.php?error=' . $error);
                exit();
            } 
        }
    }
    $conn->close();
    header('Location: ../public/admin/admin_users.php');
}

<?php

if (isset($_POST['change_password'])) {
    if (!isset($_POST['token'])) {
        $error = "Invalid Entry";
        header('Location: ../public/common/resetPass.php?error=' . $error);
        exit();
    } else {

        require_once '../config/conn.php';

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $token = $_POST['token'];

        $sql = "SELECT * FROM tokens WHERE token ='$token'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $userID = $row['userID'];
        $email = $row['email'];

        if (mysqli_fetch_array($result) === false) {
            $error = "Invalid change of password, Re-enter details to send another email";
            header('Location: ../public/common/resetPass.php?error=' . $error);
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE userID ='$userID'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result1);

            $userid = $row1['userID'];

            if ($userID != $userid) {
                $error = "Password Change Failed";
                header('Location: ../public/common/password_change.php?error=' . $error);
                exit();
            } else {

                $pass = md5($password);
                $confirmPass = md5($confirmPassword);

                $query = "UPDATE user SET password = '$pass' WHERE userID = '$userid'";
                $resultInsert = mysqli_query($conn, $query);

                $query1 = "DELETE FROM tokens WHERE userID = '$userid'";
                $resultInsert = mysqli_query($conn, $query1);

                if ($resultInsert == TRUE) {

                    $body = "
                    Your Password for CL-GEN was Updated.
                    
                    Thank You.";


                    $to = $email;
                    $from = "clgen2020@gmail.com";
                    $subject = "CL-GEN : Password Updated";
                    $message = $body;
                    $header = "From: {$from}";

                    $sendResult = mail($to, $subject, $message, $header);

                    if ($sendResult) {
                        $message = "Password Updated. Login to Continue";
                        header('Location: ../public/common/loginFile.php?message=' . $message);
                        exit();
                    } else {
                        $error = "Password Updated Couldn't Send the email";
                        header('Location: ../public/common/resetPass.php?error=' . $error);
                    }
                } else {
                    $error = "Invalid change of password";
                   header('Location: ../public/common/password_change.php?error=' . $error);
                    exit();
                }
            }
        }
    }
}

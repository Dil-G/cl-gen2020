<?php
if ( isset( $_POST['logout'] ) ){
    session_start();
    session_destroy();
    unset($_SESSION["userID"]);
    unset($_SESSION["userType"]);
    unset($_SESSION["username"]);

    header('Location: ../public/common/loginFile.php');
}
?>
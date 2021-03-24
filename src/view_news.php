<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

    require_once '../../config/conn.php';
    $newsID = $_POST['newsID'];
    $sql = "SELECT * FROM newsfeed WHERE newsID='$newsID'";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }

?>
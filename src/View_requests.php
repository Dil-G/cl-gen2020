<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT * FROM Request  WHERE RequestStatus='1' ORDER BY requestID DESC";
$sql1 = "SELECT * FROM Request WHERE RequestStatus='0' ORDER BY requestID DESC ";

$res = mysqli_query($conn, $sql);
$res1 = mysqli_query($conn, $sql1);

if ($res1) {
    //echo "Sucessfull";
} else {
    echo "failed";
}

?>
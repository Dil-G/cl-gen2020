<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT inquiryID,title,message,sender from inquiry where reciever = '$userID'";
$result = mysqli_query($conn, $sql);

if ($result) {
  //echo "Sucessfull";
} else {
  echo "failed";
}

$count = "SELECT COUNT(*) FROM inquiry WHERE sender= '$username'";
$sql1 = "SELECT * FROM inquiry WHERE sender='$username' ORDER BY inquiryID DESC";


$res = mysqli_query($conn, $sql1);
$res1 = mysqli_query($conn, $count);

if ($res) {
  //echo "Sucessfull";
} else {
  echo "failed";
}

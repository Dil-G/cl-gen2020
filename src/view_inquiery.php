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



$recieved_sql = "SELECT * FROM inquiry WHERE reciever='$username' ORDER BY inquiryID DESC";
$recieved_count = "SELECT COUNT(*) FROM inquiry WHERE reciever= '$username'";

$recieved_res = mysqli_query($conn, $recieved_sql);
$count_res = mysqli_query($conn, $recieved_count);

if ($recieved_res) {
  //echo "Sucessfull";
} else {
  echo "failed";
}
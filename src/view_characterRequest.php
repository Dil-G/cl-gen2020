<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
?>
<?php
$sql = "SELECT * FROM characterrequests WHERE requestStatus=0" ;
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    // echo $row['examID'];
    // echo $row['examYear'];
    // echo $row['examName'];

    // echo "<td><a href = alCsv.html?userID=".$row['examID']." > Add Results </a> </td>";
    
}

// $sql_alresults = "SELECT * FROM `alresults`" ;
// $result_alresults = mysqli_query($conn,$sql_alresults);

$sql_requests="SELECT student.fName,student.lName, characterrequests.*  FROM characterrequests
LEFT JOIN student ON student.admissionNo=characterrequests.userID WHERE characterrequests.requestStatus = '0' ";
$result_requests = mysqli_query($conn,$sql_requests);

$sql_requestsSent="SELECT student.fName,student.lName, characterrequests.*  FROM characterrequests
LEFT JOIN student ON student.admissionNo=characterrequests.userID WHERE characterrequests.requestStatus = '1' ";
$result_requestsSent = mysqli_query($conn,$sql_requestsSent);

$sql_requestsIssue="SELECT student.fName,student.lName, characterrequests.*,characterissues.*,charactercertificate.*  FROM characterrequests
LEFT JOIN characterissues ON characterissues.userID=characterrequests.userID
LEFT JOIN charactercertificate ON charactercertificate.studentID=characterrequests.userID
LEFT JOIN student ON student.admissionNo=characterrequests.userID WHERE characterrequests.requestStatus = '2' ";
$result_requestsIssue = mysqli_query($conn,$sql_requestsIssue);


$sql_requestsAccepted="SELECT student.fName,student.lName, characterrequests.*,charactercertificate.*  FROM characterrequests
LEFT JOIN charactercertificate ON charactercertificate.studentID=characterrequests.userID
LEFT JOIN student ON student.admissionNo=characterrequests.userID WHERE characterrequests.requestStatus = '3' ";
$result_requestsAccepted = mysqli_query($conn,$sql_requestsAccepted);




?>

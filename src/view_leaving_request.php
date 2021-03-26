<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
?>
<?php
$sql = "SELECT * FROM leavingrequests WHERE requestStatus=0" ;
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    // echo $row['examID'];
    // echo $row['examYear'];
    // echo $row['examName'];

    // echo "<td><a href = alCsv.html?userID=".$row['examID']." > Add Results </a> </td>";
    
}

// $sql_alresults = "SELECT * FROM `alresults`" ;
// $result_alresults = mysqli_query($conn,$sql_alresults);

$sql_requests="SELECT student.fName,student.lName, leavingrequests.*,parent.admissionNo  FROM leavingrequests
LEFT JOIN parent ON parent.admissionNo=leavingrequests.studentID 
LEFT JOIN student ON student.admissionNo=leavingrequests.studentID WHERE leavingrequests.requestStatus = '0' ";
$result_requests = mysqli_query($conn,$sql_requests);

$sql_requestsSent="SELECT student.fName,student.lName,student.admissionNo, leavingrequests.*,parent.admissionNo  FROM leavingrequests
LEFT JOIN parent ON parent.admissionNo=leavingrequests.studentID 
LEFT JOIN student ON student.admissionNo=leavingrequests.studentID WHERE leavingrequests.requestStatus = '1' ";
$result_requestsSent = mysqli_query($conn,$sql_requestsSent);

$sql_requestsIssue="SELECT student.fName,student.lName,student.admissionNo, leavingrequests.*,leavingissues.*,leavingdocument.*,parent.admissionNo  FROM leavingrequests
LEFT JOIN parent ON parent.admissionNo=leavingrequests.studentID 
LEFT JOIN leavingissues ON leavingissues.userID=leavingrequests.userID
LEFT JOIN leavingdocument ON leavingdocument.studentID=leavingrequests.userID
LEFT JOIN student ON student.admissionNo=leavingrequests.studentID WHERE leavingrequests.requestStatus = '2' ";
$result_requestsIssue = mysqli_query($conn,$sql_requestsIssue);


$sql_requestsAccepted="SELECT student.fName,student.lName,student.admissionNo, leavingrequests.*,leavingdocument.*,parent.admissionNo  FROM leavingrequests
LEFT JOIN parent ON parent.admissionNo=leavingrequests.studentID 
LEFT JOIN leavingdocument ON leavingdocument.studentID=leavingrequests.userID
LEFT JOIN student ON student.admissionNo=leavingrequests.studentID WHERE leavingrequests.requestStatus = '3' ";
$result_requestsAccepted = mysqli_query($conn,$sql_requestsAccepted);




?>

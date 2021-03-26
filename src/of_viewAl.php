<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
?>
<?php
$sql = "SELECT * FROM addAlExam" ;
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    // echo $row['examID'];
    // echo $row['examYear'];
    // echo $row['examName'];

    // echo "<td><a href = alCsv.html?userID=".$row['examID']." > Add Results </a> </td>";
    
}

// $sql_alresults = "SELECT * FROM `alresults`" ;
// $result_alresults = mysqli_query($conn,$sql_alresults);

if (isset($_GET['examID'])){

    $examID=$_GET['examID'];

    $sql_alresults="SELECT student.fName,student.lName, subjects.subjectName,alstreams.streamName, addalexam.examName, alresults.grade FROM alresults
    LEFT JOIN subjects ON alresults.subjectID=subjects.subjectID
    LEFT JOIN student ON student.admissionNo=alresults.studentID
    LEFT JOIN alstreams ON alstreams.streamID=alresults.streamID
    LEFT JOIN addalexam ON addalexam.examID=alresults.examID WHERE alresults.examID='$examID' ";
    $result_alresults = mysqli_query($conn,$sql_alresults);

    $sql = "SELECT * FROM addalexam WHERE examID='$examID'";
    $result = mysqli_query($conn,$sql);
}


?>

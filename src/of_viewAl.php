<?php
include_once '../../php/includes/conn.php';
?>
<?php
$sql = "SELECT * FROM addAlExam" ;
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo $row['examID'];
    echo $row['examYear'];
    echo $row['examName'];

    echo "<td><a href = alCsv.html?userID=".$row['examID']." > Add Results </a> </td>";
    
}

?>

<?php
include_once '../../php/includes/conn.php'
?>
        
<?php               
                
$sql = "SELECT COUNT(isActivated) FROM user where isActivated=0"; 
$sql_student = "SELECT COUNT(isActivated) FROM user where isActivated=0 and userType='student' ";
$sql_teacher = "SELECT COUNT(isActivated) FROM user where isActivated=0 and userType='teacher' ";
$sql_parent = "SELECT COUNT(isActivated) FROM user where isActivated=0 and userType='parent' ";

$result = $conn->query($sql);
$result_student = $conn->query($sql_student);
$result_teacher = $conn->query($sql_teacher);
$result_parent = $conn->query($sql_parent);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "All Users Count: " . $row["COUNT(isActivated)"]. "<br>";
	
  }

while($row = $result_student->fetch_assoc()) {
    echo "Student Count: " . $row["COUNT(isActivated)"]. "<br>";
     
  }

}else {
    echo "0 results";
  }

  $sql1 = "SELECT * FROM user WHERE isActivated = 0  AND userType='student'";
  $res1= mysqli_query($conn,$sql1);

  ?>
  <table>
  <tr>
      <th>User ID</th>
      <th>UserName</th>
      <th>User Type</th>
      <th>Edit Details</th>
      
  </tr>
  <?php
while($row=mysqli_fetch_assoc($res1)){
?>
  <tr>
      <td><?php echo $row['userID'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['userType'] ?></td>
    <?php echo "<td><a href = office_addStudentDetails.php?userID=".$row['userID']." > Update </a> </td>"?>
  </tr>
  <?php
}
?>
  </table>


  <br>
        
  
<html>
    <head>

    <?php
include_once '../../php/includes/conn.php'
?>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../../css/main.css" type="text/css">
        <link rel="stylesheet" href="../../css/dashboard.css" type="text/css">
        <link rel="stylesheet" href="../../css/register.css" type="text/css">
        <link rel="stylesheet" href="../../css/view.css " type="text/css">
        <link type="text/css" rel="stylesheet" href="../../css/users.css">
        <link type="text/css" rel="stylesheet" href="../../css/tabs.css">
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li>
                    <form action="login.html" method="POST" name="logout">
                        <input type="submit" value="Logout" id="submit" name="submit">
                    </form>
                </li>
            </ul>
        </div>

        <div class="wrap">
           <ul>
            <li><a href="">Dashboard</a></li>

            <li><a href="">Manage User Information </a>
            
                <ul>
                    <li><a href="studentsList.html">Student</a></li>
                    <li><a href="teachersList.html">Teacher</a></li>
                    <li><a href="ofstaffList.html">Office Staff</a></li>
                </ul>
            </li>
                
            <li><a href="">Add Exam results</a>
                <ul>
                    <li><a href="viewSchol.html">Grade 5 Scholarship</a></li>
                    <li><a href="viewOl.html">G.C.E. O/L</a></li>
                    <li><a href="viewAl.html">G.C.E. A/L</a></li>
                </ul>
            </li>

            <li><a href="">Requests </a>
                <ul>
                    <li><a href="">Certificates</a>
                        
                        <ul>
                            <li><a href="">Character Certificate</a></li>
                            <li><a href="">Leaving Certificate</a></li>
                        </ul>
                        
                    </li>
                    <li><a href="">Edit Requests</a></li>
                </ul>
            </li>
            <li><a href="">Edit Newsfeed</a></li>
          
        
        </div>

        <div class="content">
            

                <?php
                //echo "test";
               
                
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
  while($row = $result_teacher->fetch_assoc()) {
    echo "Teacher Count: " . $row["COUNT(isActivated)"]. "<br>";
    
  }

}else {
    echo "0 results";
  }

  $sql1 = "SELECT * FROM user WHERE isActivated = 0  AND userType='teacher'";
  $res1= mysqli_query($conn,$sql1);

  ?>
  


  <br>
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
      <td><button type="submit" align="center">Edit</button></td>
  </tr>
  <?php
}
?>
  </table>

                
     
        </div>
    </body>
</html>
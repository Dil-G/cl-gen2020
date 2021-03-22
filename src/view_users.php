
<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$staff_sql = "SELECT COUNT(isActivated) FROM user where userType='officer' AND isActivated=0"; 
$staff_sql3 = "SELECT COUNT(isActivated) FROM user where userType='officer' AND isActivated=1";
$staff_sql1 = "SELECT * FROM user where isActivated=0 and userType='officer' ";
// $staff_sql2 = "SELECT * FROM office  ";
$staff_sql4 = "SELECT * FROM user where isActivated=1 and userType='officer' ";


$staff_result = $conn->query($staff_sql);
// $staff_result2 = $conn->query($staff_sql2);
$staff_result1 = $conn->query($staff_sql1);
$staff_result3 = $conn->query($staff_sql3);
$staff_result4 = $conn->query($staff_sql4);

if(!$staff_result || !$staff_result3){
    $error = "Cannot Retrieve Data";
}
else{
    	
}



$teacher_sql = "SELECT COUNT(isActivated) FROM user where userType='teacher' AND isActivated=0"; 
$teacher_sql3 = "SELECT COUNT(isActivated) FROM user where userType='teacher' AND isActivated=1";
$teacher_sql1 = "SELECT * FROM user where isActivated=0 and userType='teacher' ";
$teacher_sql2 = "SELECT * FROM teacher  ";
$teacher_sql4 = "SELECT * FROM user where isActivated=1 and userType='teacher' ";
		
$teacher_result = $conn->query($teacher_sql);
$teacher_result3 = $conn->query($teacher_sql3);
$teacher_result1 = $conn->query($teacher_sql1);
$teacher_result2 = $conn->query($teacher_sql2);
$teacher_result4 = $conn->query($teacher_sql4);
            

if(!$teacher_result || !$teacher_result3){
    $error = "Cannot Retrieve Data";
}
else{
    	
}

$student_sql = "SELECT COUNT(isActivated) FROM user where userType='student' AND isActivated=0"; 
$student_sql1 = "SELECT COUNT(isActivated) FROM user where userType='student' AND isActivated=1"; 
$student_sql2 = "SELECT * FROM user where userType='student' AND isActivated=0 ";
// $student_sql3 = "SELECT * FROM student  ";
$student_sql4 = "SELECT * FROM user where isActivated=1 and userType='student' ";

$student_result = $conn->query($student_sql);
$student_result1 = $conn->query($student_sql1);
$student_result2 = $conn->query($student_sql2);
// $student_result3 = $conn->query($student_sql3);
$student_result4 = $conn->query($student_sql4);

if(!$student_result || !$student_result2  ){
    $error="Invalid UserID";
}

else{
    	
}




$parent_sql = "SELECT COUNT(isActivated) FROM user where userType='parent' AND isActivated=0"; 
$parent_sql3 = "SELECT COUNT(isActivated) FROM user where userType='parent' AND isActivated=1";
$parent_sql1 = "SELECT * FROM user where isActivated=0 and userType='parent' ";

$parent_sql4 = "SELECT * FROM user where isActivated=1 and userType='parent' ";
		
$parent_result = $conn->query($parent_sql);
$parent_result3 = $conn->query($parent_sql3);
$parent_result1 = $conn->query($parent_sql1);
// $parent_result2 = $conn->query($parent_sql2);
$parent_result4 = $conn->query($parent_sql4);


if(!$parent_result || !$parent_result1){
    $error = "Cannot Retrieve Data";
}
else{
    	
}


$user_sql1 = "SELECT * FROM user WHERE isActivated = 0  AND userType != 'superadmin'";
$user_sql2 = "SELECT * FROM user WHERE (isActivated = 1 AND userType != 'superadmin')";

$user_sql3 = "SELECT COUNT(isActivated) FROM user where userType != 'superadmin' AND isActivated = 0 "; 
$user_sql4 = "SELECT COUNT(isActivated) FROM user where userType != 'superadmin' AND isActivated = 1"; 
            
            	
$user_res1= mysqli_query($conn,$user_sql1);
$user_res2= mysqli_query($conn,$user_sql2);
$user_res3= mysqli_query($conn,$user_sql3);
$user_res4= mysqli_query($conn,$user_sql4);

if(!$user_res1 || !$user_res2 || !$user_res3 || !$user_res4){
    $error = "Error in Retrieving aaaa";
}
else{
    	
}
?>


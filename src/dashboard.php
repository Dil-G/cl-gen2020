
<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$staff_sql = "SELECT COUNT(isActivated) FROM user where userType='officer' AND isActivated=1";

$staff_result = $conn->query($staff_sql);

if(!$staff_result){
    $error = "Cannot Retrieve Data";
}
else{
    	
}



$teacher_sql = "SELECT COUNT(isActivated) FROM user where userType='teacher' AND isActivated=1"; 
$teacher_result = $conn->query($teacher_sql);
            

if(!$staff_result){
    $error = "Cannot Retrieve Data";
}
else{
    	
}

$student_sql = "SELECT COUNT(isActivated) FROM user where userType='student' AND isActivated=1"; 
$student_result = $conn->query($student_sql);

if(!$student_result  ){
    $error="Invalid UserID";
}

else{
    	
}

$parent_sql = "SELECT COUNT(isActivated) FROM user where userType='parent' AND isActivated=0"; 
$parent_sql3 = "SELECT COUNT(isActivated) FROM user where userType='parent' AND isActivated=1";
$parent_sql1 = "SELECT * FROM user where isActivated=0 and userType='parent' ";
$parent_sql2 = "SELECT * FROM parent  ";
		
$parent_result = $conn->query($parent_sql);
$parent_result3 = $conn->query($parent_sql3);
$parent_result1 = $conn->query($parent_sql1);
$parent_result2 = $conn->query($parent_sql2);

if(!$parent_result ){
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

$sport_sql = "SELECT COUNT(SportID) FROM csports"; 
$sport_result = $conn->query($sport_sql);

if(!$sport_result  ){
    $error="Invalid UserID";
}

else{
    	
}

$society_sql = "SELECT COUNT(SocietyID) FROM csocieties"; 
$society_result = $conn->query($society_sql);

if(!$society_result  ){
    $error="Invalid UserID";
}

else{
    	
}

$achievement_sql = "SELECT COUNT(achievementID) FROM achievement"; 
$achievement_result = $conn->query($achievement_sql);

if(!$achievement_result  ){
    $error="Invalid UserID";
}

else{
    	
}

$news_sql = "SELECT * FROM newsfeed ORDER BY newsID DESC LIMIT 3;"; 
$news_result = $conn->query($news_sql);

if(!$news_result  ){
    $error="ERROR";
}

else{
    	
}

// $totUser = "SELECT COUNT(isActivated) FROM user where userType != 'superadmin' AND isActivated = 1"; 
            
            	
// $totalUser= mysqli_query($conn,$totUser);

// $totalUsers =$totalUser->fetch_assoc();
// $totalStudents = $student_result->fetch_assoc();
// $totalOfficers = $staff_result->fetch_assoc();
// $totalTeacher = $teacher_result->fetch_assoc();
// $totalParents = $parent_result3->fetch_assoc();
// /*$total = $totalOfficers + $totalParents + $totalStudents + $totalTeacher;
// $stuPer = $totalStudents / $total ;
// $teaPer = $totalTeacher / $total ;
// $offPer = $totalOfficers / $total ;
// $parPer = $totalParents / $total ;*/
// $userData = array( 
//     array("label"=>"Industrial", "y"=>$totalStudents),
//     array("label"=>"Transportation", "y"=>$totalOfficers),
//     array("label"=>"Residential", "y"=>$totalTeacher),
//     array("label"=>"Commercial", "y"=>$totalParents )
//   )

?>



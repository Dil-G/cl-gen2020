<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));



$teacher_sql = "SELECT COUNT(isActivated) FROM user where userType='teacher' AND isActivated=1"; 
$teacher_result = $conn->query($teacher_sql);
            


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



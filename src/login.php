<?php 
if (isset($_POST['login'])){
    
    require_once '../config/conn.php';
    include '../utils/helpers.php';

    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $password = md5($pwd);

    if(empty($username) == true || empty($pwd)== true){
        
         $error = "Fill all the fields";
         header('Location: ../public/common/loginFile.php?error='.$error);

    }else{
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password '";
        $result = mysqli_query($conn,$sql);

         if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);

            $logString = "user ".$row['userID']." logged in";
            writeLog($logString);
            
            if($pwd == $row['userID'] ){
                $message = "<a href='resetPass.php'>First time login in? Click here to Change your Password to Login</a> "  ;

                header('Location: ../public/common/loginFile.php?message='.$message);
            }else{

                session_start();
                if($row['userType'] == "student"){
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userType'] = $row['userType'];
                    header('Location: ../public/student/newsfeed.php');

                }else if($row['userType'] == "parent"){
                    $_SESSION['userID'] = $row['userID'];
                    $userID = $row['userID'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userType'] = $row['userType'];
                    $parentsql = "SELECT * from parent where parentID='$userID'";
                    $parent_result = mysqli_query($conn,$parentsql);
                    while($parent_row = mysqli_fetch_assoc($parent_result)) {
                        $_SESSION['studentID'] = $parent_row['admissionNo'];
                    }
                    header('Location: ../public/parent/newsfeed.php');

                }else if($row['userType'] == "teacher"){

                    $userID=$row['userID'];
                    $_SESSION['userID'] = $userID;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userType'] = $row['userType'];


                    $sql = "SELECT * FROM teacher WHERE teacherID = '$userID'";
                    $result = mysqli_query($conn,$sql);
                    
                    // $duty = array();
                    while($row=mysqli_fetch_assoc($result)){
                        $teacherType=$row['teacherType'];
                    }
                    
                    // $_SESSION['teacherType'] = $teacherType;
                    // header('Location: ../public/teacher/Tcr_dashboard.php');

                   
                    
                    if($teacherType == "classTcr" || $teacherType == "both"){
                        $_SESSION['teacherType'] = $teacherType;
                        $teacher_sql = "SELECT classID from classes where teacherID='$userID'";
                        $teacher_result = mysqli_query($conn,$teacher_sql);
                        while($teacher_row = mysqli_fetch_assoc($teacher_result)) {
                            $_SESSION['classID'] = $teacher_row['classID'];
                        }
                        header('Location: ../public/teacher/Tcr_dashboard.php');
                    }else if($row['teacherType'] == "TcrinCharge"){
                        $_SESSION['teacherType'] = $row['teacherType'];
                        header('Location: ../public/teacher/Tcr_dashboard.php');
                    }
                                

                }else if($row['userType'] == "officer"){
                    
                    $userID = $row['userID'];
                    $sql = "SELECT * FROM officerduties WHERE officerID = '$userID'";
                    $result = mysqli_query($conn,$sql);
                    
                    $duty = array();
                    while($row=mysqli_fetch_assoc($result)){
                        $duty[]=$row['dutyID'];
                    }
                    
                    $_SESSION['dutyID'] = $duty;
                    $_SESSION['userID'] =  $userID;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userType'] = "officer";
                    header('Location: ../public/office/o_dashboard.php');

                }else if($row['userType'] == "admin"){
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userType'] = $row['userType'];
                    header('Location: ../public/admin/dashboard.php');
                }

            }

    }else{
        $error="Invalid Username or Password";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }


}
}
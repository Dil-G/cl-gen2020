<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));


if (isset($_GET['addYear'])) {

    $date = date('Y');

    $prefix = "G";

    $i;
    for ($i = 1; $i < 14;) {

       if($i==12){
            $c=1;
            while($c<3){
                $classID = $date . $prefix . $i."/".$c;
                $Name = $i."/ ".$c;
                $sql = "INSERT INTO grades (Year, GradeID, Grade) VALUES ('$date','$classID','$Name');";
                $result = mysqli_query($conn,$sql);
                $c = $c + 1;
            }
            $i = $i + 1;
        }else{

            $classID = $date . $prefix . $i;
            $Name = $i;
            $sql = "INSERT INTO grades (Year, GradeID, Grade) VALUES ('$date','$classID','$Name');";
            $result = mysqli_query($conn,$sql);
            $i = $i + 1;

        }

        if ($result === TRUE) {
        } else {
            $error = "Cannot add record";
            header('Location: ../public/office/office_addClassYear.php?error=' . $error);
        }
    }
    header('Location: ../public/office/office_addClassYear.php');

}

$year_sql = "SELECT Year FROM grades order by Year";
$year_result = $conn->query($year_sql);

if (!$year_result) {
    $error = "Invalid year";
} else {
}

if (isset($_GET['Ggrades'])) {

    $grades = $_GET['Ggrades'];
    $class_sql = "SELECT * FROM classes WHERE gradeID = '$grades'";

    $class_result = $conn->query($class_sql);

    if (!$class_result) {
        $error = "Invalid year";
    } else {
    }
} else {
}

if (isset($_GET['Gyear'])) {

    $thisYear = $_GET['Gyear'];
    $grade_sql = "SELECT * FROM grades where Year = $thisYear order by  Grade";
    $grade_result = $conn->query($grade_sql);

    if (!$grade_result) {
        $error = "Invalid year";
    } else {
    }
} else {
}


if (isset($_POST['addclasses'])) {


    $number = $_POST['noOfClasses'];
    $grades = $_POST['grade'];
    echo $grades;
    $date = date('Y');

    $prefix = "C";
    $ascii = 65;
    $i;
    for ($i = 1; $i <= $number;) {


        if ($i == 1) {
            $name = 'T';
            $classID = $grades . $name;
            $medium = 'Tamil';
        } else if ($ascii == 65) {
            $name = chr($ascii);
            $classID = $grades . $name;
            $ascii = $ascii + 1;
            $medium = 'English';
        } else {
            $name = chr($ascii);
            $classID = $grades . $name;
            $ascii = $ascii + 1;
            $medium = 'Sinhala';
        }
        $sql = "INSERT INTO classes (gradeID, classID, name, medium) VALUES ('$grades','$classID','$name','$medium');";
        $sql2 = "UPDATE grades SET gradeActive = 1 WHERE gradeID = '$grades';";

        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/office_addClassGrades.php?Gyear=' . $date);
        } else {
            $error = "Cannot add Classes";
            header('Location: ../public/office/office_addClassGrades.php?Gyear=' . $date . '&error=' . $error);
        }
        $i = $i + 1;
    }
} else {
}

if (isset($_POST['addNewClass'])) {

    $thisGrade = $_POST['thisGrade'];
    echo $thisGrade;
    $class_sql = "SELECT classID FROM classes where gradeID = '$thisGrade'";
    $class_result = mysqli_query($conn, $class_sql);
    $Number = mysqli_num_rows($class_result);


    $noOfClasses =  $Number - 1;
    echo $noOfClasses;
    $asciiVal = 65 + $noOfClasses;
    $nameNew = chr($asciiVal);
    $classIDNew = $thisGrade . $nameNew;

    $sql = "INSERT INTO classes (gradeID, classID, name) VALUES ('$thisGrade','$classIDNew','$nameNew');";

    if ($conn->query($sql) === TRUE) {
        echo '<script language = "javascript">';
        echo 'alert("Details Added");';
        header('Location: ../public/office/office_classes.php?Ggrades=' . $thisGrade);
    } else {
        $error = "Cannot add Classes";
        header('Location: ../public/office/office_classes.php?error=' . $error);
    }
} else {
}

if(isset($_GET['class']) || isset($_SESSION['class'])) {
    if(isset($_GET['class'])){
        $thisClass = $_GET['class'];
    }
    if(isset($_SESSION['class'])){
        $thisClass = $_SESSION['class'];
    }
    $classOne_sql = "SELECT * FROM classstudent WHERE classID='$thisClass'";

    
    $class_sql = "SELECT classes.*,teacher.* FROM classes
    LEFT JOIN teacher ON classes.teacherID=teacher.teacherID  where classID = '$thisClass'";

    $classOne_result = mysqli_query($conn,$classOne_sql);
    $class_result = mysqli_query($conn,$class_sql);
    // echo "Error: " . $classOne_sql . "<br>" . $conn->error;

    if (!$class_result  ) {
        $error = "Invalid year";
    } else {
    }
}

if (isset($_SESSION['classID'])) {
    $thisClass = $_SESSION['classID'];

    $classOne_sql = "SELECT * FROM classstudent where classID = '$thisClass'";

    $classOne_result = $conn->query($classOne_sql);

    if (!$classOne_result) {
        $error = "Invalid year";
    } else {
    }
}



    //$conn->close();

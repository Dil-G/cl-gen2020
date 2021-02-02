<?php
    require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
    

    if(isset($_GET['addYear'])){

    
        $date = date('Y');
        
        $prefix = "G";
        
        $i;
        for($i=1;$i<14;){
            $classID = $date . $prefix . $i ;

            $Name = $i;

            $sql = "INSERT INTO grades (Year, GradeID, Grade) VALUES ('$date','$classID','$Name');";
            
            if($conn->query($sql)===TRUE){
                echo '<script language = "javascript">';
                echo 'alert("Details Added");';
                header('Location: ../public/office/o_addClassYear.php');
            }else{
                $error = "Cannot add record";
               header('Location: ../public/office/o_addClassYear.php?error='.$error);
            }
            $i=$i+1;
        }
        
    }
  

    $year_sql = "SELECT Year FROM grades order by Year"; 
    $year_result = $conn->query($year_sql);
    
    if(!$year_result  ){
        $error="Invalid year";
    }
    
    else{
            
    }

    if(isset($_GET['Ggrades'])){

        $grades = $_GET['Ggrades'];
        $class_sql = "SELECT * FROM classes WHERE gradeID = '$grades'";
        
        $class_result = $conn->query($class_sql);
        
        if(!$class_result  ){
            $error="Invalid year";
        }
        
        else{
                
        }
    }
    else{}

    if(isset($_GET['Gyear'])){

        $thisYear = $_GET['Gyear'];
        $grade_sql = "SELECT * FROM grades where Year = $thisYear order by  Grade"; 
        $grade_result = $conn->query($grade_sql);
        
        if(!$grade_result  ){
            $error="Invalid year";
        }
        
        else{
                
        }
    }
    else{}

 
    if(isset($_POST['addclasses'])){

    
        $number = $_POST['noOfClasses'];
        $grades = $_POST['grade'];
        echo $grades;
        $date = date('Y');
        
        $prefix = "C";
        $ascii = 65;
        $i;
        for($i=1;$i<=$number;){
            

            if($i == 1){
                $name = 'T';
                $classID =$grades . $name ;
            }else{
                $name = chr($ascii);
                $classID =$grades . $name ;
                $ascii = $ascii + 1;
            }

            $sql = "INSERT INTO classes (gradeID, classID, name) VALUES ('$grades','$classID','$name');";
            
            if($conn->query($sql)===TRUE){
                echo '<script language = "javascript">';
                echo 'alert("Details Added");';
                header('Location: ../public/office/o_addClassYear.php');
            }else{
                $error = "Cannot add Classes";
                header('Location: ../public/office/o_addClassYear.php?error='.$error);
            }
            $i=$i+1;
        }
           
       
        
    }






    $conn->close();
?>

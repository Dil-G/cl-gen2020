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
    $conn->close();
?>

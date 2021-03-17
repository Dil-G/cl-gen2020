<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }
    else if($_SESSION['userType'] != 'officer'){
        header('Location: ../common/error.html');
    }
    else{      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (!in_array("d2", $dutyID)) {
         header('Location: o_dashboard.php');
        }

        $connect = mysqli_connect("localhost", "root", "", "cl_gen");
        if(isset($_POST['submit'])){
            if($_FILES['file']['name']){
                $filename = explode(".", $_FILES['file']['name']);
                if($filename[1] == 'csv'){

                    $handle = fopen($_FILES['file']['name'], "r");
                    while($data = fgetcsv($handle)){
                        $item1 = mysqli_real_escape_string($connect, $data[0]);
                        $item2 = mysqli_real_escape_string($connect, $data[1]);
                        $item3 = mysqli_real_escape_string($connect, $data[2]);
                        $item4 = mysqli_real_escape_string($connect, $data[3]);
                        $item5 = mysqli_real_escape_string($connect, $data[4]);

                        $sqlNew = "INSERT into schol_RSheet(examID,admissionNo,studentIndex,studentName,examMarks) values ('$item1','$item2','$item3','$item4','$item5') "; 
                        mysqli_query($connect, $sqlNew);                        
                    }
                    fclose($handle);
                    print "Done";
                }
            }
        }

	?> 

    

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add G.C.E. A/L Examination Results</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    
    <form action="" method='POST' enctype="multipart/form-data">
    <p>Upload CSV : <input type="file" name="file"></p>
    <p><input type="submit" name="submit" value="Import"></p>
    </form>

</body>

</html>

<?php } ?>




$connect = mysqli_connect("localhost", "root", "", "cl_gen");
                if(isset($_POST["submit"]))
                {
                    if($_FILES['file']['name'])
                    {
                    $filename = explode('.', $_FILES['file']['name']);
                        if($filename[1] == 'csv')
                        {
                            $handle = fopen($_FILES['file']['tmp_name'], "r");
                                while($data = fgetcsv($handle))
                                {
                                    $item0 = mysqli_real_escape_string($connect, $data[0]);  
                                    $item1 = mysqli_real_escape_string($connect, $data[1]);
                                    $item2 = mysqli_real_escape_string($connect, $data[2]);
                                    $item3 = mysqli_real_escape_string($connect, $data[3]);
                                    $item5 = mysqli_real_escape_string($connect, $data[4]);
                                    
                                    $query = "INSERT INTO schol_RSheet(examID,admissionNo,studentIndex,studentName,examMarks) 
                                    values('$item0','$item1','$item2','$item3','$item4','$item5')";

                                mysqli_query($conn, $query);
                                
                                }
                            fclose($handle);
                            echo "<script>alert('Import done');</script>";
                        }
                    }
                }
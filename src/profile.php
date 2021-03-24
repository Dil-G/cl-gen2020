<?php

//require_once('cl_gen.php');

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
$query1 = "SELECT * FROM teacher WHERE teacherID = '$userID' ";
        
        $result1 = mysqli_query($conn, $query1);  
        $row1 = mysqli_fetch_assoc($result1);

        $name = $row1["fName"];
        $lastname = $row1["lName"];
        $gender = $row1["gender"];
        $nic = $row1["nic"];
        $id = $row1["teacherID"];
        $dob = $row1["dob"];
        $address = $row1["address"];
        $type = $row1["teacherType"];
        $contact_number = $row1["contactNo"];
        $email = $row1["email"];

        if ($result1) {
            /*  echo '<script language="javascript">';
              echo 'alert("Details Added");';
              //echo 'window.location.href="../driver.php";';
              echo '</script>';
              echo "Succesfully Added Record";
            */
          
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
    
          $conn->close();
          
          ?>
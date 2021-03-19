<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];
         include('../../src/view_marks.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marks</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register2.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/class.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
</head>

<body name=top>

    <body>
        <div id="teacherNav"></div>
        <div class="content">
        <h2 style="color: #6a7480;">CLASS A-MARKS</h2>
         
            <div class="card">
                <hr>
                <form class="search" action="Tcr_marks.php">
                    <button type="submit" name= "submit" method="POST">Calculate Total Marks</button>
                    <br>
                    <table>
                        <tr>

                            <th>Admission Number</th>
                            <th>Student Name</th>
                            <th>Sinhala</th>
                            <th>English</th>
                            <th>Buddhism</th>
                            <th>Maths</th>
                            <th>Science</th>
                            <th>History</th>
                            <th>Group 01</th>
                            <th>Group 02</th>
                            <th>Group 03</th>
                            <th>Total</th>
                        </tr>
                        
                  
                    <?php
				while($row=mysqli_fetch_assoc($result)){

                    $sinhala = $row['sinhala'];
                    $english = $row['english'];
                    $english = $row['english'];
                    $buddhism = $row['buddhism'];
                    $maths = $row['maths'];
                    $science = $row['science'];
                    $history = $row['history'];
                    $group01 = $row['group01'];
                    $group02 = $row['group02'];
                    $group03 = $row['group03'];

                    $total = ($sinhala + $english + $buddhism + $maths + $science + $history + $group01 + $group02 + $group03);

                    ?>
      
      <tr>
        <td><?php echo $row['admissionNumber'] ?></td>
				<td><?php echo $row['studentName'] ?></td>
                <td><?php echo $row['sinhala'] ?></td>
                <td><?php echo $row['english'] ?></td>
                <td><?php echo $row['buddhism'] ?></td>
                <td><?php echo $row['maths'] ?></td>
                <td><?php echo $row['science'] ?></td>
                <td><?php echo $row['history'] ?></td>
                <td><?php echo $row['group01'] ?></td>
                <td><?php echo $row['group02'] ?></td>
                <td><?php echo $row['group03'] ?></td>
                <?php echo "<td>$total </td>"?>
               
               
				
				
        </tr>
               
        <?php
    }
    
  
    ?>
     </table>
            </div>
            <br>
            <br>

            <form class="search" action="Tcr_position.php">
                <button type="submit" formaction="Tcr_position.php">Calculate the position and average</button>
                <br>
                <button type="submit" formaction="Tcr_class.php">Cancel</button>
            </form>

    </body>

</html>

<?php 
     }
?>
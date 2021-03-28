<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'teacher'){
        header('Location: ../common/error.html');
    }else{      
        $teacherType = array();
        $teacherType = $_SESSION['teacherType'];


        if (!in_array("classTeacher", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      

    $classID = $_SESSION['classID'];
      $userID = $_SESSION['userID'];
      include('../../src/view_fees.php');
     
	?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fees and Fines 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">

</head>

<body name=top>

    <body>
        <div id="teacherNav"></div>


        <div class="content">
        
		
        <h1 style="color: #6a7480;">Fees and Fines</h1>
        <form class="search" action="Tcr_fees1.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        <br>
        <br>
        <br>
        <hr>
        
    
        <div class="card">
            <form>
                <button type="submit" formaction="Tcr_fees2.php">Add Fees</button>
            </form>
         
            <hr>

            <table>
    

  
    <tr>
                    <th>Fees ID</th>
                    <th>Teacher ID </th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Fee Type </th>
                    <th>Amount</th>
                    <th>Status </th>
                    <th>Date</th>
                    <th>Time</th>
                    
        
    </tr>

    <?php
            while($row=mysqli_fetch_assoc($result)){

        ?>
 <tbody id="Table"> 
  <tr>
    <td><?php echo $row['FeesID'] ?></td>
            <td><?php echo $row['TeacherID'] ?></td>
            <td><?php echo $row['StudentID'] ?></td>
            <td><?php echo $row['StudentName'] ?></td>
            <td><?php echo $row['FeeType'] ?></td>
            <td><?php echo $row['Amount'] ?></td>
            <td><?php echo $row['Status'] ?></td>
            <td><?php echo $row['Date'] ?></td>
            <td><?php echo $row['Time'] ?></td>
           
            
    </tr>
            </tbody>  
   
   
   
    <?php
}


?>


</body>
</html>

<?php }} ?>


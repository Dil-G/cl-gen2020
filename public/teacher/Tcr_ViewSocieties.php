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


        if (!in_array("teacherIncharge", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      

    $classID = $_SESSION['classID'];
      $userID = $_SESSION['userID'];
      include('../../src/view_society_achievement.php');
     
	?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Society Achievement</title>
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
        
		
        <h1 style="color: #6a7480;">Society Achievements</h1>
        <form class="search" action="Tcr_ViewSocieties.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        <br>
        <br>
        <br>
        <hr>
        
    
        <div class="card">
           
            <hr>
        <div class="scroll">
            <table>
    

  
    <tr>
                    <th>Achievement ID</th>
                    <th>Category ID</th>
                    <th>Student ID</th>
                    <th>Achievement Date </th>
                    <th>Achievement Name</th>
                  
                    <th>Position</th>
                    <th>Important value</th>
                    
                    <th>Description</th>
                    <th>Date and Time</th>
                    
                    
        
    </tr>

    <?php
            while($row=mysqli_fetch_assoc($result)){

        ?>
 <tbody id="Table"> 
  <tr>
  
           
            <td><?php echo $row['achievementID'] ?></td>
            <td><?php echo $row['categoryID'] ?></td>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['achievementDate'] ?></td>
            <td><?php echo $row['achievementName'] ?></td>
           
            <td><?php echo $row['position'] ?></td>
            <td><?php echo $row['impValue'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['date_Time'] ?></td>
           
            
    </tr>
            </tbody>  
   
   
   
    <?php
}


?>


</body>
</html>

<?php }} ?>


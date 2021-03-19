<?php
    session_start();
    
 
    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
        $userID = $_SESSION['userID'];
      include('../../src/view_sportcategory.php');
     
	?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select the Category</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">
<link type="text/css" rel="stylesheet" href="../css/register2.css">
<script>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script>
    $(document).ready(function() {
        $("#Inputs").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</head>

<body>
<!-- Start Add achievements -->
    <div id="teacherNav"></div>
    <div class="content">
    <h1 style="color: #6a7480;">Select the category</h1>
    <form class="search" action="Tcr_ach.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
	<div class="card">
		
			<hr>
			<?php

while($row1=mysqli_fetch_assoc($result1)){
    if($row1["COUNT(SportID)"]){
          
  

    ?>

             <table>
    

 
    <tr>
        <th>Sport ID</th>
        <th>Sport Name </th>
        <th>Add</th> 
    </tr>
    <?php
            while($row=mysqli_fetch_assoc($result)){

    ?>
  <tbody id="Table">
  <tr>
    <td><?php echo $row['SportID'] ?></td>
    <td><?php echo $row['SportName'] ?></td>
    <?php echo "<td><a class='btn editbtn' href = Tcr_achievement.php?SportID=".$row['SportID']." > Add </a> </td>"?>
  </tr>
  </tbody>
              
   
    <?php
            }
        }
}


?>
<!-- End Add achievements -->

<?php
while($row2=mysqli_fetch_assoc($result2)){
    
          

    ?>


<table>
    <!-- Start Csocouey -->
<br>
<hr>
  
    <tr>
        <th>Society ID</th>
        <th>Societyt Name </th>
        <th>Add</th> 
    </tr>

    <?php
            while($row2=mysqli_fetch_assoc($result2)){

    ?>
 <tbody id="Table">
<tr>
    <td><?php echo $row2['SocietyID'] ?></td>
    <td><?php echo $row2['SocietyName'] ?></td>
    <?php echo "<td><a class='btn editbtn' href = Tcr_achievement.php?SocietyID=".$row2['SocietyID']." > Add </a> </td>"?>
</tr>
</tbody>


<?php
}
}

?>   
    </div>


</body>
</html>

<?php } ?>







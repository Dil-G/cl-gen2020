<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];
      include('../../src/view_inquiery.php');
     
	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquieries 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">

    <script src="../js/search.js"></script>
</head>

<body>
    <div id="teacherNav"></div>
    <div class="content">
        <h1 style="color: #6a7480;">Reply Inquieries</h1>
       

        <form class="search" action="Tcr_ReplyInquiery.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search"> <button type="submit">Search</button>
        </form>
        <div class="card">
            <hr>
            <table>
          
                <tr>
                    <th>Inquiry ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Sender</th>
                    <th>Reply</th>
                    

                </tr>
              
                <?php
            while($row=mysqli_fetch_assoc($result)){

        ?>
  <tbody id="Table"> 
  <tr>
 
    <td><?php echo $row['inquiryID'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['sender'] ?></td>
         <?php echo "<td><a class='btn editbtn' href =Tcr_Reply.php?inquiryID='".$row['inquiryID']."' > Reply </a> </td>"?>
        
         
           
         
    </tr>
    
    </tbody> 
   
   
    <?php
}


?>


</body>
</html>


<?php } ?>

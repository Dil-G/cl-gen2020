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
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/inquiry.css">

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
    <div id="teacherNav"></div>
    <div class="content">
        <h1 style="color: #6a7480;">Reply Inquieries</h1>
        <form class="search" action="Tcr_ach.php">
           
            
        </form>
        <div class="card">
            <form>
                <button type="submit" formaction="Tcr_AddInquiery.php">Add Inquiery</button>
            </form>
            <br>
            <br>
        </div>
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
  
  <tr>
    <td><?php echo $row['inquiryID'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['sender'] ?></td>
           
            <td>
                            <form class="search" action="Tcr_Reply.php">
                                <button type="submit">Reply</button>
                            </form>
                        </td>
    </tr>
    
   
   
   
    <?php
}


?>


</body>
</html>

<?php } ?>


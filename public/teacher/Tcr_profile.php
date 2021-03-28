<?php
    session_start();
    require_once '../../config/conn.php';

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
//  $teacherType = $_SESSION['teacherType'];
    $userID = $_SESSION['userID'];

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
        //  $type = $row1["teacherType"];
         $contact_number = $row1["contactNo"];
         $email = $row1["email"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Profile 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register2.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/profile4.css">
</head>

<body name=top>

    <body>


        <div id="teacherNav"></div>


        <div class="content">
            <div class="feed">

                <div class="container">

                <h2><b>User Information</b></h2>
                    <hr>
                    <div class="card">
                        <form>
                            <div class="photo">
                                <img src="../../images/5.jpg" width="160px" height="160px">
                            </div>
                            <div class="first">
                                <div class="first">
                                    <div class="first">
                                        <div class="row">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="adNo">Name</label>
                                                    <input type="text" id="adNo" class="inputs"
                                                         value="<?php echo  $name; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="input-username">Last Name</label>
                                                    <input type="text" id="Edate" class="inputs"
                                                    value = <?php  echo  $lastname; ?> readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="label" for="input-username">Gender</label>
                                                    <input type="text" id="Egrade" class="inputs"
                                                        value="<?php echo  $gender; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="adNo">NIC</label>
                                                    <input type="text" id="adNo" class="inputs"
                                                    value="<?php echo  $nic; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="input-username">ID</label>
                                                    <input type="text" id="Edate" class="inputs"
                                                    value = <?php  echo  $id; ?> readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="label" for="input-username">Date of Birth</label>
                                                    <input type="text" id="Egrade" class="inputs"
                                                    value="<?php echo  $dob; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><b>Contact Information</b></h3>
                                    <div class="first">
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">

                                                <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="ContactNumber">Residential Address</label>
                                                    <input type="text" id="ContactNumber" class="inputs"
                                                    value="<?php echo  $address; ?>" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="ContactNumber">Contact Number</label>
                                                    <input type="text" id="ContactNumber" class="inputs"
                                                    value="<?php echo  $contact_number; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="adNo">Email</label>
                                                    <input type="text" id="email" class="inputs"   value="<?php echo  $email; ?>" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
<?php 
	 }
?>
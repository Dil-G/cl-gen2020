<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){

        $userID = $_SESSION['userID'];
    ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile</title>
<link rel="stylesheet" href="../css/register2.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/tabs.css">
<link type="text/css" rel="stylesheet" href="../css/profile4.css">
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>
</head>

<body>
            <?php
            require_once '../../config/conn.php';
            $userID = $_GET['userID'];
            $sql = "SELECT * FROM office where officerID='$userID' ";
            $result = $conn->query($sql);


            ?>


            <div id="officeNav"></div>


            <div class="content">
                <div class="feed">

                    <div class="container">


                        <h2><b>User Information</b></h2>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <hr>
                            <div class="card">
                                <form>
                                    <div class="photo">
                                        <img src="../../images/student.png" width="160px" height="160px">

                                    </div>
                                    <div class="first">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="input-username">First name</label>
                                                    <input type="text" id="fname" class="inputs" value="<?php echo $row['fName'] ?>">
                                                </div>
                                            </div>
                                       
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="input-username">Last name</label>
                                                    <input type="text" id="lname" class="inputs" value="<?php echo $row['lName'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="dob">Date of Birth</label>
                                                    <input type="text" id="dob" class="inputs" placeholder="Date of Birth" value="<?php echo $row['dob'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="label" for="stunic">NIC</label>
                                                    <input id="stunic" class="inputs" placeholder="NIC" value="<?php echo $row['nic'] ?>" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="gender">Gender</label>
                                                    <input type="text" id="gender" class="inputs" placeholder="Gender" value="<?php echo $row['gender'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                     



                                    </div>
                                    <h3><b>Contact Information</b></h3>
                                    <div class="first">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">

                                                    <label class="label" for="street">Address</label>
                                                    <input id="address" class="inputs" placeholder="Home Address" value="<?php echo $row['address'] ?>" type="text">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="ContactNumber">Contact Number</label>
                                                    <input type="text" id="ContactNumber" class="inputs" placeholder="Contact Number" value="<?php echo $row['contactNo'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="label" for="adNo">Email</label>
                                                    <input type="text" id="email" class="inputs" placeholder="Email" value="<?php echo $row['email'] ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </form>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
    
    <?php } ?>
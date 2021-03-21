<?php
session_start();

require_once ('../../config/conn.php');

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'teacher') {

 
    $userID= $_SESSION['userID'];
    $teacherType= $_SESSION['teacherType'];

    //   foreach($teacherType as $result) {
    //     echo $result;
    // }

?>
    <link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    
    <div>
        <button onclick="goBack()" class="backbtn" style="background-color: #1e8dd6;padding:1px;">Back</button>
    </div>

    <div class="navbar">

        <ul>
            <li>
                <form name="logout" action="../../src/logout.php" method="POST">
                <input type="submit" value="LOGOUT" name="logout" style="font-family: 'Playfair Display', serif;">
                </form>
            </li>
        </ul>
    </div>

    <div class="wrap">

        <img src="../../images/logo.png" width="100" height="100">

        <div class="menu">
            <h2 class="portal">TEACHER PORTAL</h2>
            <br>
            <ul>
                <li><a href="../teacher/Tcr_dashboard.php">Dashboard</a></li>
                <li><a href="../teacher/newsfeed.php">Newsfeed</a></li>
                <li><a href="../teacher/Tcr_profile.php">Profile</a></li>
                <li><a href="../teacher/Tcr_RequestEdits.php">Request Edits</a></li>
                <li class="drop">
                        <div class="drop" id="drop">Inquiries and Replies<i class="fa fa-angle-down" aria-hidden="true"></i></div>
                    </li>
                    <div class="submenu" id="submenu">
                        <ul>
                            <li><a href="../teacher/inquiries.php"> View Inquiery</a>
                            <li><a href="../teacher/Tcr_AddInquiery.php">Add Inquiery</a></li>
                            <li><a href="../teacher/Tcr_ReplyInquiery.php">Reply Inquiery</a></li>
    </ul>
                    </div>

      
 
      
                    <?php



                            $sql = "SELECT * from teacher where teacherID='$userID'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                    
                if ($row['teacherType'] == 'classTcr' || $row['teacherType'] == 'both' ) {?>
                        <div>
                      

                            <li><a href="../teacher/Tcr_classDetails.php">Class Deatails</a></li>
                           
                      
                </div>

                <?php }
                 if ($row['teacherType'] == 'classTcr' || $row['teacherType'] == 'both')  { ?>

                    <li class="drop">
                        <div class="drop" id="drop2">Marks<i class="fa fa-angle-down" aria-hidden="true"></i> </div>
                    </li>
                    <div class="submenu2" id="submenu2">
                        <ul>
                            <li><a href="../teacher/Tcr_class.php">Upload Marks</a></li>
                            <li><a href="../teacher/Tcr_position.php">Generate Positions</a></li>
                            
                        </ul>
                    </div>
                
                <?php }
                if ($row['teacherType'] == 'classTcr' || $row['teacherType'] == 'both' )  { ?>
                

                    <li><a href="Tcr_fees1.php">Fees and Fines</a></li>

                      


                    
                <?php }
              if ($row['teacherType'] == 'TcrinCharge' || $row['teacherType'] == 'both') { ?>

                    <li><a href="../teacher/Tcr_ach.php">Achievements</a></li>


               
                <?php } ?>
        
        </div>

        </ul>

    </div>
    </div>
 
    
    <script>
        <?php if($_SESSION['teacherType'] == 'TcrinCharge' || $_SESSION['teacherType'] == 'both' || $_SESSION['teacherType'] == 'classTcr'  ){?>
            var menu = document.getElementById("drop");
            var submenu = document.getElementById("submenu");
            document.getElementById("submenu").style.display = "none";
            menu.onclick = function(event) {
                if (submenu.style.display === "none") {
                    submenu.style.display = "block";
                } else {
                    submenu.style.display = "none";
                }
            }

            <?php
        }?>

<?php if( $_SESSION['teacherType'] == 'both' || $_SESSION['teacherType'] == 'classTcr'  ){?>
            var menu2 = document.getElementById("drop2");
            var submenu2 = document.getElementById("submenu2");
            document.getElementById("submenu2").style.display = "none";
            menu2.onclick = function(event) {
                if (submenu2.style.display === "none") {
                    submenu2.style.display = "block";
                } else {
                    submenu2.style.display = "none";
                }
            }

            <?php
        }?>
        
       
    </script>



          
       
        
        <?php } ?>
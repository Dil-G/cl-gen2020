<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d4", $dutyID)) {
	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Requests</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/profile.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
</head>
<body>
    <div id="officeNav"></div>

    </div>
    <div class="content">

        <h1 style="color:#6a7480;">Requests List</h1>
        <form class="search" action="of_addStudentDetails.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>
        <div class="card">

            <br>
            <br>

            <hr>
            <table>
                <tr>
                    <th>Request ID</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Request</th>
                    <th>Image</th>
                    <th>Request Date</th>
                    <th>Request Time</th>


                </tr>
                <tr>
                    <td>1</td>
                    <td>TC2000001</td>
                    <td>A.B.C. Student</td>
                    <td>vgbghghgh</td>
                    <td>1.jpg</td>
                    <td>12</td>
                    <td>1</td>
                    <td> 
                    <td><button class="btn dltbtn" type="submit">Delete</button></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
    var form1 = document.getElementById("character-form");

    var characterbtn = document.getElementById("character-btn");

    var close1 = document.getElementsByClassName("close1")[0];
    var close2 = document.getElementsByClassName("close2")[0];

    characterbtn.onclick = function() {
        form1.style.display = "block";
    }

    close1.onclick = function() {
        form1.style.display = "none";
    }
    close2.onclick = function() {
        form2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

</html>

<?php }} ?>
<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
      $teacherType = $_SESSION['teacherType'];

     
	?>

<!DOCTYPE html>
<html>

<head>
    <title>Class</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register2.css">
    <link type="text/css" rel="stylesheet" href="../css/class.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    
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
   
        <h1 style="color: #6a7480;">Class A</h1>
        <form class="search" action="Tcr_marks.php">
        
            <button type="submit">View Marks</button>
        </form>
        <form class="search" action="Tcr_csv_marks.php">
            <button type="submit">Upload Marks</button>
        </form>
        
        <div class=l-part>
            <label for="name"><b>Class Name</b></label>
            <input type="text" placeholder="12-A" name="id" required>
        </div>
        <div class=r-part>
            <label for="name"><b>Class Teacher</b></label>
            <input type="text" placeholder="W.H.M.Gunathilaka" name="name" required>

          

            
        </div>
      
        

        

        <div class="card">
            <br>
            <br>
            <hr>
            <table>
                <tr>
                    <th>Admission number</th>
                    <th>Student name</th>
                    <th>View Profile</th>
                </tr>
                <tr>
                <td>ST2000001</td>
                    <td>Sandali Perera</td>
                    <td>
                        <form class="search" action="Sprofile.php">
                            <button type="submit">View</button>
                        </form>
                    </td>
                </tr>

                <tr>
                <td>ST2000001</td>
                    <td>Sandali Perera</td>
                    <td>
                        <form class="search" action="SProfile.php">
                            <button type="submit">View</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
<?php 
     }
?>
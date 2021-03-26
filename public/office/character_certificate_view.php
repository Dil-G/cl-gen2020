<?php
require_once '../../config/conn.php';

if(isset($_GET['userID'])){
$userID = $_GET['userID'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Character Certificate $userID</title>
    <style>
    * {
        box-sizing: border-box;
    }

    html {
        font-family: sans-serif;
    }

    body {
        margin: 0;
        padding: 30px;
        border: solid 1px #ddd;
        width: 793.7px;
        height: 1096.0629px;
        margin: 113.38px 151.18px 113.38px 151.18px;
    }



    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 98%;
    }

    td,
    th {
        border: none;
        text-align: left;
        padding: 4px;
    }


    #first {
        width: 5%;
        float: left;
        margin-left: 10px;
    }

    #second {
        width: 38%;
        float: right;
        margin-left: 60%;
        margin-right: 0%;
        margin-top: -21%;

    }

    #image {
        width: 20%;
        float: left;
        margin-left: 9%;

    }

    #image img {
        height: 150px;
    }

    #header {
        width: 100%;
        height: 150px;
    }

    #letterBody {
        margin: 5px;

    }

    #space {
        height: 50px;
    }

    hr {
        border: solid 3px #083b66
    }

    #letterBody h1,
    h2,
    h3 {
        color: #083b50;
        margin: 0;
        text-align: center;
    }

    #letterBody table {
        margin: 30px 50px 30px 80px;
    }
    </style>

</head>

<body>

    <div id='header'>
        <table id='first'>
            <tr>
                <td>General </td>
                <td>0112358647</td>
            </tr>
            <tr>
                <td>Fax </td>
                <td>011254785</td>
            </tr>
            <tr>
                <td>Principal </td>
                <td>0115858555</td>
            </tr>
            <tr>
                <td>Email </td>
                <td>clgen@gmail.com</td>
            </tr>
            <tr>
                <td>Web </td>
                <td>clgen.com</td>
            </tr>
        </table>
        <div id='image'>
            <img
                src='data:image/png;base64,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' />
        </div>
        <table id='second' >
            <tr>
                <td>Principal </td>
            </tr>
            <tr>
                <td>Anonymus College </td>
            </tr>
            <tr>
                <td>Colombo </td>
            </tr>
            <tr>
                <td>Reference No: CH/ST20/00002</td>

            </tr>
            <tr>
                <td>Date : 2020/10/20</td>

            </tr>
        </table>
    </div>
    <hr>
    <div id='letterBody'>
        <br>
        <br>
        <h2><b>ABC SCHOOL</b></h2>
        <h3>COLOMBO, SRI LANKA</h3>
        <h1> CHARACTER CERTIFICATE</h1>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "cl_gen");

        $query = "SELECT st.*, ar.examID
        FROM
             student st
             LEFT JOIN
             alresults ar on st.admissionNo = ar.studentID
        WHERE 
        st.admissionNo = '$userID'";
        
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <br>
        <p> This is to certify that Ms.<?php echo $row["fName"] . " " . $row["mName"] . " " . $row["lName"] ?>
            attended Anonymous College Colombo from
            <?php echo substr($row["enteredDate"], 0, 4.) . ' to ' . date('Y') ?>


        <table>
            <tr>
                <td>Full Name</td>
                <td><?php echo $row["fName"] . " " . $row["mName"] . " " . $row["lName"] ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo$row["adStreet"] . " " . $row["adCity"] . " " . $row["adDistrict"] ?></td>
            </tr>
            <tr>
                <td>NIC</td>
                <td><?php echo $row["stuNic"] ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $row["dob"] ?></td>
            </tr>
            <tr>
                <td>Date admitted to the school</td>
                <td><?php echo $row["enteredDate"]?></td>
            </tr>
            <tr>
                <td>Period in school</td>
                <td><?php echo substr($row["enteredDate"], 0, 4.) . ' - ' . date('Y') ?> </td>
            </tr>
            <tr>
                <td>NIC</td>
                <td><?php echo $row["stuNic"] ?></td>
            </tr>
            <tr>
                <td rowspan="2">Public Examinations Passed</td>
            </tr>

            <tr>
                <td colspan="2">G.C.E. (Advanced Level) Examination
                    <?php if($row["examID"] == TRUE){
                    echo " ".substr($row["examID"],6);
                }else{
                    echo "-not passed";
                } ?></td>
            </tr>
            <tr>
                <td rowspan="2"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: 50%;">G.C.E. (Advanced Level) Examination
                    <?php if($row["examID"] == TRUE){
                    echo " ".substr($row["examID"],6);
                }else{
                    echo "-not passed";
                } ?></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <hr>


        <p>I recomend Ms <?php echo $row["fName"] . " " . $row["mName"] . " " . $row["lName"] ?> as a student with good
            discipline, courage and strategies to shoulder any responsibility vested upon her. I wish Ms.
            <?php echo  $row["fName"] . " " . $row["mName"] . " " . $row["lName"] ?> good luck in her future
            endeavours.</p>
        <br>
        <br>
        <p><b>Principal</b><br>
            Anonymous College</p>

    </div>
    <?php } ?>


</body>

</html>
<?php } ?>
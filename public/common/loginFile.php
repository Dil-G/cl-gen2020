
<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
 	
?>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="../css/login.css " type="text/css">
    <link rel="stylesheet" href="../css/messages.css " type="text/css">
    <script src="../js/errors.js"></script>


</head>

<body>
    <?php if (isset($_GET['error'])) { ?>
        <div id="error"><?php echo $_GET['error']; ?></div>
    <?php } ?>

    <?php if (isset($_GET['message'])) { ?>
        <div id="message"><?php echo $_GET['message']; ?></div>
    <?php } ?>

    <div id="msg"></div>

    <div class="login logiin">
        <div class="logo "></div>
        <div class="login-box">

            <form id="login" action="../../src/login.php" method="post" onsubmit="return validate(username.value,password.value)">
                <p>Username</p>
                <input type="text" id="username" name="username" placeholder="Enter Username" onblur="validateUsername(username.value)" required>
                <div class="text" id="uName"></div>
                <p>Password</p>
                <input type="password" id="password" name="password" placeholder="Enter Password"  onblur="validatePassword(password.value)" required>
                <div class="text" id="pwd"></div>
                <br><br><br>
                <input type="submit" value="LOGIN" name="login">

            </form>

        
            <div>
                <h2><a href="../../index.html" class="cancelbtn">Cancel</a></h2>
            </div>
            <a href="resetPass.php">
                <h3>Forgot password?</h3>
            </a>

        </div>
    </div>
</body>



</html>

    <?php
}else{	
        header('Location: ../common/loginAgain.php');

} ?>
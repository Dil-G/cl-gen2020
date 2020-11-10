
    <html>
        <head>
        <title>Reset Password</title>
        
        <link rel="stylesheet" href="../css/login.css " type="text/css">
        <link rel="stylesheet" href="../css/messages.css " type="text/css">
        <script defer src="../js/errors.js"></script>
        
        </head>
        
        <body>
        <?php if (isset($_GET['error'])){?>
        <div id="error"><?php echo $_GET['error']; ?></div>
        <?php } ?>

        <?php if (isset($_GET['message'])){?>
        <div id="message"><?php echo $_GET['message']; ?></div>
        <?php } ?>
        <div id="msg"></div>
   
        <div class="login">
            <br>
            <br>
        
                <h2>Please enter your Username and Email </h2>
                
                
                <form id="login" action="../../src/reset_pass.php" method="post" onsubmit="return validateReset(username.value,email.value)">
                    <p>Username</p>
                    <input type="text" id="username" name="username" placeholder="Enter Username" required  >
                    <p>Email</p>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required  >
                    <br><br><br>
                    <input type="submit" value="Send Reset Link" name="reset_pass" >
                
                </form>
        
            </div>
        </body>
        </html>
        
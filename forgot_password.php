<html>

<head>
    <meta charset="utf8">
    <link href="stylesheets/sign_in.css" rel="stylesheet">
    <link href="stylesheets/reset_password.css" rel="stylesheet">
    <link href="stylesheets/menu.css" rel="stylesheet">
    
    <title>Reset Password</title>
</head>

<body>

    <div class="site-content">
        <div class="site-cache" id="site-cache" onClick="hide()">
            <div class="container" align="center" onClick="hide()">
                <h1>Reset your Password</h1>
                <div class="form-content" onClick="hide()">
                    <img text-align="center" src="img/locked.png" alt="user_logo" class="img_form">
                    <form class="form" method="get" action="">
                        <div class="item">Login</div>
                        <input type="text" name="login">                      
                        <div class="item">Email</div>
                        <input type="text" name="confirmnewpassword">
                        <br>
                        <div align="center">
                            <div>
                                <input type="submit" name="button" value="reset password" class="button">
                            </div>


                            <a href="reset_password.php" class="fdp">Finally Remember it?</a>
                        </div>
                    </form>
                   
                </div>
                <div class="separator"></div>
                 <a href="feed.php" class="back">Back</a>
                <div class="separator"></div>
            </div>
        </div>

    </div>

</body>

</html>
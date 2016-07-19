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
                <h1>Change your password</h1>
                <div class="form-content" onClick="hide()">
                    <img text-align="center" src="img/locked.png" alt="user_logo" class="img_form">
                    <form class="form" method="get" action="">
                        <div class="item">Login</div>
                        <input type="text" name="login">
                        <br>
                        <div class="item">Old password</div>
                        <input type="password" name="oldpassword">
                        <br>
                        <div class="item">New passord</div>
                        <input type="password" name="newpassword">
                        <br>
                        <div class="item">Confimation</div>
                        <input type="password" name="confirmnewpassword">
                        <br>
                        <div align="center">
                            <div>
                                <input type="submit" name="button" value="Change password" class="button">
                            </div>


                            <a href="forgot_password.php" class="fdp">Forgot your password ?</a>
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
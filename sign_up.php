<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <title>Camagru</title>
    <link href="stylesheets/sign_in.css" rel="stylesheet">
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/index.css" rel="stylesheet">
    <link href="stylesheets/reset_password.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="site-content" id="site-content">
        <div class="site-cache" id="site-cache" onClick="hide()">
            <div class="container" align="center" onClick="hide()">
                <div class="separator"></div>
                <div class="welcome">
                    <img src="img/homelogo.png" alt="homelogo">
                    <a href="feed.php" class="continue">Continue</a>
                </div>
                <div class="form-content" onClick="hide()">
                    <img text-align="center" src="img/user.png" alt="user_logo" class="img_form">
                    <form method="get" action="" class="form" onClick="hide()">
                        <div class="item">Login</div>
                        <input type="text" name="login">
                        <div class="item">Email</div>
                        <input type="text" name="email">
                        <div class="item">Password</div>
                        <input type="password" name="password">
                        <div class="item">Confirm password</div>
                        <input type="password" name="confirmpassword">
                        <div align="center">
                            <div>
                                <input type="submit" name="button" value="sign in" class="button">
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="separator"></div>
            </div>
        </div>

    </div>
    <script language="javascript" src="js/style.js"></script>
</body>

</html>
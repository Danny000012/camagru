<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Camagru</title>
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/sign_in.css" rel="stylesheet">
    <link href="stylesheets/footer.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="site-container">
        <div class="site-pusher">
            <header class="header">
                <a href="#" class="header__icon" id="header__icon" onClick="hide()"></a>
                <a href="#" class="header__logo">
                <img src="img/logo.png" alt="logo">
                </a>
                <nav class="menu">
                    <div class="a1" class="fix"></div>
                    <a href="feed.php" class="a2">Feed</a>
                    <a href="#" class="a1">My gallery</a>
                    <a href="post.php" class="a2">Post</a>
                    <a href="account.php" class="a1">Account</a>
                    <a href="sign_in.php" class="a2">Sign in</a>
                </nav>
            </header>
            <div class="site-content">
                <div class="site-cache" id="site-cache" onClick="hide()">
                    <div class="container" align="center" onClick="hide()">
                        <div class="form-content" onClick="hide()">
                            <img text-align="center" src="img/user.png" alt="user_logo" class="img_form">
                            <form align="center" method="get" action="" class="form" onClick="hide()">
                                <div class="item">Login</div>
                                <input style="text-align:center;" class="input" type="text" name="login">
                                <div class="item">Password</div>

                                <input style="text-align:center;" class="input" type="password" name="password">


                                <div align="center">
                                    <div>
                                        <input type="submit" name="button" value="sign in" class="button">
                                    </div>


                                    <a href="forgot_password.php" class="fdp">Forgot your password ?</a>
                                </div>
                            </form>
                        </div>
                        <div class="new-account">
                            <a href="sign_up.php" class="fdp">New to camagru ? Create an account here</a>
                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript" src="js/tools.js"></script>
</body>

</html>

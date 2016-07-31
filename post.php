<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <title>Camagru</title>
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/account.css" rel="stylesheet">
    <link href="stylesheets/post.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="site-container">
        <div class="site-pusher">
            <header class="header">
                <a href="#" class="header__icon" id="header__icon" onClick="hide()"></a>
                <a href="feed.php" class="header__logo">
                    <img src="img/logo.png" alt="logo">
                </a>
                <nav class="menu">
                    <div class="a1" class="fix"></div>
                    <a href="feed.php" class="a2">Feed</a>
                    <a href="#" class="a1">My gallery</a>
                    <a href="#" class="a2">Post</a>
                    <a href="account.php" class="a1">Account</a>
                    <a href="index.html" class="a2">Sign out</a>
                </nav>
            </header>
            <div class="site-content">
                <div class="site-cache" id="site-cache" onClick="hide()">
                    <div class="container" align="center" onClick="hide()">
                        <div class="separator"></div>


                        <div class="hud">
                                <video autoplay="true" id="videoElement">

                                </video>
                            <div class="menu-cam">
                                <a href="#" type="button"><img src="img/cam.png" alt="camera>" class="img-logo"</a>
                            </div>

                            <form action="" method="get" class="tape">
                                <input type="file" name="file" class="custom-file-input" title=" ">
                                <input type="submit" name="file" value="upload" class="uploader">
                            </form>


                        </div>

                        <div class="separator"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript" src="js/camera.js"></script>
            <script language="javascript" src="js/tools.js"></script>

</body>

</html>

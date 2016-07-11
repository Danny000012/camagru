<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <title>Camagru</title>
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/sign_in.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="site-container">
        <div class="site-pusher">
            <header class="header">
                <a href="#" class="header__icon" id="header__icon" onClick="hide()"></a>
                <a href="#" class="header__logo">
                    <object type="image/svg+xml" data="logo.svg" width="80px"></object>
                </a>
                <nav class="menu">
                    <div class="a1" class="fix"></div>
                    <a href="#" class="a2">Feed</a>
                    <a href="#" class="a1">My gallery</a>
                    <a href="#" class="a2">Post</a>
                    <a href="#" class="a1">Account</a>
                    <a href="sign_in.php" class="a2">Sign in</a>
                </nav>
            </header>
            <div class="site-content">
                <div class="site-cache" id="site-cache" onClick="hide()">
                    <div class="container" align="center" onClick="hide()">
                        <video id="video"></video>
                        <button id="startbutton">Prendre une photo</button>
                        <canvas id="canvas"></canvas>
                        <img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript" src="js/tools.js"></script>
</body>

</html>
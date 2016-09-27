<?php
    include 'script/security.php';
?>

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
                        <div class="a0" class="fix"></div>
                        <a href="feed.php" class="a2"><img class="logo-menu" src="img/feed.png" alt="feed" </a>
                            <a href="my_gallery.php" class="a1"><img class="logo-menu" src="img/mygallery.png" alt="man"></a>
                            <a href="post.php" class="a2"><img class="logo-menu" src="img/post.png" alt="eye"></a>
                            <a href="account.php" class="a1"><img class="logo-menu" src="img/account.png"></a>
                            <a href="logout.php" class="a2"><img class="logo-menu" src="img/logout.png"></a>
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
                                    <a href="#" type="button"><img src="img/cam.png" alt="camera>" class="img-logo"></a>
                                </div>
								<div class="upload">
                                    <h2>Upload an image</h2>
                                    <form method="post" enctype="multipart/form-data" action="#" class="upload-form">
										<input type="hidden" name="MAX_SIZE" value="250000" />
										<input type="file" name="image" />
                                        <br>
                                        <br>
										<input type="submit" name="file" value="upload" class="upload-boutton" />
									 </form>
								<?php
									include 'script/upload.php';
								?>
                                </div>
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

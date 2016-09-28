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

                            <div class="selector">
                                <form method="get">
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/1.png"></div>
                                        <input type="submit" name="plane" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/2.png"></div>
                                        <input type="submit" name="maillot" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/3.png"></div>
                                        <input type="submit" name="bird" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/4.png"></div>
                                        <input type="submit" name="medal" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/5.png"></div>
                                        <input type="submit" name="cup" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/6.png"></div>
                                        <input type="submit" name="diamond" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/7.png"></div>
                                        <input type="submit" name="donut" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/8.png"></div>
                                        <input type="submit" name="eye" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/9.png"></div>
                                        <input type="submit" name="egg" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/10.png"></div>
                                        <input type="submit" name="game" value="select"/>
                                    </div>
                                    <div class="pkg">
                                        <div class="collage-item"><img src="contents/11.png"></div>
                                        <input type="submit" name="gift" value="select"/>
                                    </div>
                                </form>
                            </div>
                            <div class="hud">
<<<<<<< HEAD
                                <video autoplay="true" id="videoElement">

                                </video>
                                <div class="menu-cam">
                                    <a href="#" type="button"><img src="img/cam.png" alt="camera>" class="img-logo"></a>
                                </div>
                                <div class="upload">
=======
								<video id="video"></video>
								<canvas id="canvas"></canvas>
								<div class="menu-cam">
									<a id="startbutton" type="button"><img src="img/cam.png" alt="camera" class="img-logo"></a>
									<a href="post.php" type="button"><img src="img/garbage.png" alt="camera" class="img-logo"></a>
									<a id="cancel montage" type="button"><img src="img/flag.jpg" alt="camera" class="img-logo"></a>
								</div>
							</div>
								<div class="upload">
>>>>>>> 17141269ac4ce7861a452bde5d62e0cb105b392e
                                    <h2>Upload an image</h2>
                                    <form method="post" enctype="multipart/form-data" action="#" class="upload-form">
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
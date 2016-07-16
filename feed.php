<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Camagru</title>
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/footer.css" rel="stylesheet">
    <link href="stylesheets/feed.css" rel="stylesheet">
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
                    <a href="account.php" class="a1">Account</a>
                    <a href="sign_in.php" class="a2">Sign in</a>
                </nav>
            </header>
            <div class="site-content">
                <div class="site-cache" id="site-cache" onClick="hide()">
                    <div class="container" align="center" onClick="hide()">
                        <div class="feed">
                        <div class="separator"></div>
                        <div class="post">
                            <img src="img/test.jpg">
                            <div class="post-container">
                                <div class="marks">
                                    <div class="num">0</div><img src="img/like.png">
                                    <div class="num">0</div><img src="img/flag.png">
                                    <div class="info">Posted by : kiefer 22/12/1992</div>
                                </div>
                                <form method="get" action="" class="comment">
                                    <textarea type="text" name="comment"></textarea>
                                    <br/>
                                    <input type="submit" name="envoyer" value="envoyer" class="envoyer">
                                    <br/>
                                    <br/>
                                </form>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="post">
                            <img src="img/test.jpg">
                            <div class="post-container">
                                <div class="marks">
                                    <div class="num">0</div><img src="img/like.png">
                                    <div class="num">0</div><img src="img/flag.png">
                                    <div>Posted by : kiefer 22/12/1992</div>
                                </div>
                                <form method="get" action="" class="comment">
                                    <textarea type="text" name="comment"></textarea>
                                    <br/>
                                    <input type="submit" name="envoyer" value="envoyer" class="envoyer">
                                    <br/>
                                    <br/>
                                </form>
                            </div>
                        </div>
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
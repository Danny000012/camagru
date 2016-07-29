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
                    <img src="img/logo.png" alt="logo">
                </a>
                <nav class="menu">
                    <div class="a0" class="fix"></div>
                    <a href="#" class="a2">Feed</a>
                    <a href="#" class="a1">My gallery</a>
                    <a href="post.php" class="a2">Post</a>
                    <a href="account.php" class="a1">Account</a>
                    <a href="sign_in.php" class="a2">Sign in</a>
                </nav>
            </header>
            <div class="site-content">
                <div class="site-cache" id="site-cache" onClick="hide()">
                    <div class="container" align="center" onClick="hide()">
                        <div class="feed">






                            <div class="post">
                                <img src="img/test.jpg">
                                <div class="post-container">
                                    <div class="marks">
                                        <div class="num">0</div><img src="img/like.png">
                                        <div class="num">0</div><img src="img/flag.png">
                                        <div class="info">Posted by : kiefer 22/12/1992</div>
                                    </div>
                                    <div class="commentaire" id="b1" onClick="deleteCom()">
                                        <div class="login">kiefer</div>
                                        <p>alazob ca commente !</p>

                                    </div>
                                    <div class="commentaire" id="b2" onClick="deleteCom()">
                                        <div class="login">FDP</div>
                                        <p>pue sam !</p>
                                    </div>
                                    <div class="commentaire" id="b1" onClick="deleteCom()">
                                        <div class="login">mangeCUL</div>
                                        <p>oui oui oui oui!</p>
                                    </div>
                                    <div class="commentaire" id="b2" onClick="deleteCom()">
                                        <div class="login">leFANNEUR</div>
                                        <p>un bon gros commentaire un bon gros commentaireun bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire</p>
                                    </div>

                                    <form method="get" action="" class="comment">
                                        <textarea type="text" name="comment"></textarea>
                                        <br/>
                                        <input type="submit" name="envoyer" value="Envoyer" class="envoyer">
                                        <br/>
                                        <br/>
                                    </form>
                                </div>
                            </div>



                            <div class="separator"></div>
                            <div class="separator"></div>



                            <div class="post">
                                <img src="img/test.jpg">
                                <div class="post-container">
                                    <div class="marks">
                                        <div class="num">0</div><img src="img/like.png">
                                        <div class="num">0</div><img src="img/flag.png">
                                        <div class="info">Posted by : kiefer 22/12/1992</div>
                                    </div>
                                    <div class="commentaire" id="b1" onClick="deleteCom()">
                                        <div class="login">kiefer</div> : alazob ca commente !

                                    </div>
                                    <div class="commentaire" id="b2" onClick="deleteCom()">
                                        <div class="login">FDP</div> : pue sam !
                                    </div>
                                    <div class="commentaire" id="b1" onClick="deleteCom()">
                                        <div class="login">mangeCUL</div> : oui oui oui oui!
                                    </div>
                                    <div class="commentaire" id="b2" onClick="deleteCom()">
                                        <div class="login">leFANNEUR</div> : un bon gros commentaire un bon gros commentaireun bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire
                                    </div>

                                    <form method="get" action="" class="comment">
                                        <textarea type="text" name="comment"></textarea>
                                        <br/>
                                        <input type="submit" name="envoyer" value="Envoyer" class="envoyer">
                                        <br/>
                                        <br/>
                                    </form>
                                </div>
                            </div>




                            <div class="separator"></div>
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
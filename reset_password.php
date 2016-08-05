<?php
    session_start();
    if ($_POST['button'] == "Change password")
    {
        $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
        if (!empty($_POST['login']) AND !empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['confirmnewpassword']))
        {
            $login = $_POST['login'];
            $oldpassword = sha1($_POST['oldpassword']);
            $newpassword = sha1($_POST['newpassword']);
            $conf = sha1($_POST['confirmnewpassword']);
            $req_user = $bdd->prepare("SELECT * FROM users WHERE id= ?");
            $req_user->execute(array($_SESSION['id']));
            $user_info = $req_user->fetch();
            if ($login == $_SESSION['login'])
            {
                if ($oldpassword == $user_info['password'])
                {
                    if ($newpassword == $conf)
                    {
                        $insert_new_passwwd = $bdd->prepare("UPDATE users SET password = ? WHERE id = ?");
                        $insert_new_passwwd->execute(array($conf, $_SESSION['id']));
                        $ret = "Password updated";
                    } else {$ret = "Your new password doesn 't match with the confirm one";}
                } else {$ret = "Please verify your old password";}
            } else {$ret = "This login doesn't exist";}
        } else {$ret = "Please Type all the areas";}
    }
    
?>
    <html>

    <head>
        <meta charset="utf8">
        <link href="stylesheets/sign_in.css" rel="stylesheet">
        <link href="stylesheets/menu.css" rel="stylesheet">

        <link href="stylesheets/reset_password.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Reset Password</title>
    </head>

    <body>

        <div class="site-content">
            <div class="site-cache" id="site-cache" onClick="hide()">
                <div class="container" align="center" onClick="hide()">

                    <div class="form-content" onClick="hide()">
                        <img text-align="center" src="img/locked.png" alt="user_logo" class="img_form">
                        <div class="title" align="center">Modify password</div>
                        <form align="center" class="form" method="post" action="">
                            <div class="item">Login</div>
                            <input style="text-align:center;" class="input" type="text" name="login" />
                            <br>
                            <div class="item">Old password</div>
                            <input style="text-align:center;" class="input" type="password" name="oldpassword" />
                            <br>
                            <div class="item">New passord</div>
                            <input style="text-align:center;" class="input" type="password" name="newpassword" />
                            <br>
                            <div class="item">Confimation</div>
                            <input style="text-align:center;" class="input" type="password" name="confirmnewpassword" />
                            <br>
                            <div align="center">
                                <div>
                                    <input type="submit" name="button" value="Change password" class="button" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="separator"></div>
                    <a class="back" href="account.php" class="back">Back</a>
                    <div class="separator"></div>
                    <?php
                        if (isset($ret))
                        {
                            echo $ret;
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
        include 'security.php';
        if ($_GET['confirmed'] == "confirmation")
        {
            if ($_GET['confirm-email'] == $_SESSION['email'])
            {
                $email = $_GET['confirm-email'];
                $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
               
                
                $req_delete_account = $bdd->prepare("DELETE FROM users WHERE login = ?");
                $req_delete_account->execute(array($_SESSION['login']));
                
                $req_delete_post = $bdd->prepare("DELETE FROM post WHERE login = ?");
                $req_delete_post->execute(array($_SESSION['login']));
                
                $req_delete_like = $bdd->prepare("DELETE FROM like_dislike  WHERE login = ?");
                $req_delete_like->execute(array($_SESSION['login']));
               
                $req_delete_com = $bdd->prepare("DELETE FROM commentaires WHERE login = ?");
                $req_delete_com->execute(array($_SESSION['login']));
                
                $ret =  '<div class="deleted">Account deleted</div>';
                $salam =  '<br><br><a href="../logout.php">Finish</a>';
            } else {$ret = '<div class="not-deleted">The email you enter is not matching with the one registred to your account.<br>
            If you don\'t remeber it you can find it on your account\'s page, just by clicking on change email';} 
        }
   
?>

    <html>
    <head>
        <link href="../stylesheets/menu.css" rel="stylesheet">
        <link href="../stylesheets/delete.css" rel="stylesheet">
    </hea>
    <body>
        <div class="separator"></div>
        <center>
            <img src="../img/homelogo.png" alt="camagru's-logo" width="300px">
            <h6>Please type your mail to confirm your request :</h6>
        <form method="get" action="">
            <input type="email" name="confirm-email" class="conf-email" />
            <input type="submit" name="confirmed" value="confirmation" class="confirm"/>
        </form>
            <?php
                echo $ret;
                if ($ret[21] == 'A')
                {
                    echo $salam."<br><br><br>";
                    echo '<div class="come-back">It was a pleasure to have you aside us, come back when you wanted to. <br>Best regards, Camagru\'s team.</div>';
                }
            ?>
        <div class="separator"></div>
		<a class="back" href="../account.php" class="back">Back</a>
            <div class="separator"></div>
        </center>
    </body>

    </html>

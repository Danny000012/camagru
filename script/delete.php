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
                
                echo "acount deleted";
                echo '<a href="../logout.php">Salamnhv,b</a>';
            } else {echo "l'eamil ne correxpond pas";} 
        }
   
?>

    <html>

    <body>
        <form method="get" action="">
            <input type="email" name="confirm-email" />
            <input type="submit" name="confirmed" value="confirmation" />
        </form>
    </body>

    </html>
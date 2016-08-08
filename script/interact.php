<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
    
    if ($_GET['id_post'])
    {
        $_SESSION['id_post'] = $_GET['id_post'];
    }




    if ($_GET['envoyer']  == 'Envoyer')
    {
        if (!empty($_GET['comment']))
        {
            $id_post = $_SESSION['id_post'];
            $login = $_SESSION['login'];
            $comment = $_GET['comment'];
            $req_com = $bdd->prepare("INSERT INTO commentaires(id_post, login, value) VALUES(?, ?, ?)");
            $req_com->execute(array($id_post, $login, $comment));
        } else {$ret = "Please enter a comment";}
    }



    if ($_GET['like'] == "Like")
    {
        $id_post = $_SESSION['id_post'];
        $login = $_SESSION['login'];
        $req_like = $bdd->prepare("SELECT * FROM like_dislike WHERE id_post = ? AND login = ?");
        $req_like->execute(array($id_post, $login));
        $verif = $req_like->rowCount();
        if ($verif == 0)
        {
            $confirm = 1;
            $like = $bdd->prepare("INSERT INTO like_dislike(id_post, login, confirm) VALUES(?, ?, ?)");
            $like->execute(array($id_post, $login, $confirm));
        }
        $req_nb_like = $bdd->prepare("SELECT * FROM like_dislike WHERE id_post = ?");
        $req_nb_like->execute(array($id_post));
        $like_set = $req_nb_like->fetchAll();
        $j = 0;
        while ($like_set[$j])
        {
            $j++;
        }
        $update_nb_like = $bdd->prepare("UPDATE post SET nb_likes = ? WHERE id = ?");
        $update_nb_like->execute(array($j, $id_post));
    }
    

    
    if ($_GET['like'] == "Dislike")
    {
        $id_post = $_SESSION['id_post'];
        $login = $_SESSION['login'];
        $req_del_like = $bdd->prepare("DELETE FROM like_dislike WHERE id_post = ? AND login = ?");
        $req_del_like->execute(array($id_post, $login));
        $req_nb_like = $bdd->prepare("SELECT * FROM like_dislike WHERE id_post = ?");
        $req_nb_like->execute(array($id_post));
        $like_set = $req_nb_like->fetchAll();
        $j = 0;
        while ($like_set[$j])
        {
            $j++;
        }
        $update_nb_like = $bdd->prepare("UPDATE post SET nb_likes = ? WHERE id = ?");
        $update_nb_like->execute(array($j, $id_post));
    }

    if ($_SESSION['id_post'])
    {
        $id_post = $_SESSION['id_post'];
        $req_image = $bdd->prepare("SELECT * FROM post WHERE id = ?");
        $req_com_set = $bdd->prepare("SELECT * FROM commentaires WHERE id_post = ?");
        $req_com_set->execute(array($id_post));
        $com_set = $req_com_set->fetchAll();
        $i = 0;
        while ($com_set[$i])
        {
            $i++;
        }
        $update_nb_com = $bdd->prepare("UPDATE post SET nb_com  = ? WHERE id = ?");
        $update_nb_com->execute(array($i, $id_post));
        $req_image->execute(array($id_post));
        $style = "b1";
        $verif = $req_image->rowCount();
        if ($verif == 1)
        {
            $post = $req_image->fetch();
            $src = 'data: '.mime_content_type($post['image']).';base64,'.$post['image'];
            echo '<div class="post">';   
            echo '<img src="'.$src.'">';   
            echo '<div class="post-container">';
            echo '<div class="marks">';
            echo '<div class="num">'.$post['nb_likes'].'</div><img src="img/like.png">';
            echo '<div class="num">'.$post['nb_com'].'</div><img src="img/flag.png">';
            echo '<div class="info">Posted by : '.$post['login'].' '.$post['date_post'].' </div>';
            echo '</div>';
            
            $i = 0;
            while ($com_set[$i])
            {
                if ($i % 2 == 1)
                $style = "b2";
                else {$style = "b1";}
                echo '<div class="commentaire" id="'.$style.'" onClick="deleteCom()">';
                echo '<div class="login">'.$com_set[$i][login].'</div>';
                echo '<p>'.$com_set[$i]['value'].'</p>';
                echo '</div>';
                $i++;
            }
            
            
            
            echo '<form method="get" action="" class="comment">';
            echo '<textarea type="text" name="comment"></textarea>';
            echo '<br/>';
            echo '<input type="submit" name="envoyer" value="Envoyer" class="envoyer">';
            $req_liked = $bdd->prepare("SELECT * FROM like_dislike WHERE id_post = ? AND login = ?");
            $req_liked->execute(array($id_post, $_SESSION['login']));
            $already_liked = $req_liked->rowCount();
            if ($already_liked == 0)
            {
                $value = "Like";
            } else {$value = "Dislike";}
            echo '<input type="submit" name="like" value="'.$value.'" class="envoyer">';
            echo '<br/><br/>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            
            
            echo '<div class="separator"></div>';
                 echo '<a href="feed.php">Back</a>';
            echo '<div class="separator"></div>';
       
        } else {$ret = "This post doesn't exist";}
    } else {$ret = "Error when trying to find this post";}
    echo $ret;
?>
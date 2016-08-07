<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
    $login = $_SESSION['login'];
     
    $req = $bdd->prepare("SELECT * FROM post WHERE login= ?");

    $req->execute(array($login));
      
    $image_set = $req->fetchAll();
    $i = 0;
    if ($image_set)
    while ($image_set[$i]['image'])
    {
        {
            $encode_image = $image_set[$i]['image'];
            $src = 'data: '.mime_content_type($encode_image).';base64,'.$encode_image;
            echo '<div class="post">';   
            echo '<img src="'.$src.'">';   
            echo '<div class="post-container">';
            echo '<div class="marks">';
            echo '<div class="num">0</div><img src="img/like.png">';
            echo '<div class="num">0</div><img src="img/flag.png">';
            echo '<div class="info">Posted by : '.$_SESSION['login'].' '.$image_set[$i]['date_post'].' </div>';
            echo '</div>';
            echo '<div class="commentaire" id="b1" onClick="deleteCom()">';
            echo '<div class="login">kiefer</div>';
            echo '<p>alazob ca commente !</p>';
            echo '</div>';
            echo '<div class="commentaire" id="b2" onClick="deleteCom()">';
            echo '<div class="login">FDP</div>';
            echo '<p>pue sam !</p>';
            echo '</div>';
            echo '<div class="commentaire" id="b1" onClick="deleteCom()">';
            echo '<div class="login">mangeCUL</div>';
            echo '<p>oui oui oui oui!</p>';
            echo '</div>';
            echo '<div class="commentaire" id="b2" onClick="deleteCom()">';
            echo '<div class="login">leFANNEUR</div>';
            echo '<p>un bon gros commentaire un bon gros commentaireun bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire un bon gros commentaire</p>';
            echo '</div>';
            echo '<form method="get" action="" class="comment">';
            echo '<textarea type="text" name="comment"></textarea>';
            echo '<br/>';
            echo '<input type="submit" name="envoyer" value="Envoyer" class="envoyer">';
            echo '<br/><br/>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '<div class="separator"></div>';
            echo '<div class="separator"></div>';
            $i++;
        }
    } else {echo "Youn don't post anything yet";}
?>
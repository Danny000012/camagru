<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
    $login = $_SESSION['login'];
     
    $req = $bdd->prepare("SELECT * FROM post WHERE login = ?");

    $req->execute(array($login));
      
    $image_set = $req->fetchAll();
    $i = 0;
    if (!$image_set)
    {
        echo '<br>';
        echo '<center><h4>Your gallery is empty</h4></center>';
        echo '<br><br>';
        echo '<center><img src="img/sad.png" alt="sad face" class="sad-face"></center>';
        echo '<br><br>';
        echo '<style> .feed {background-color: transparent;} .sad-face { filter: invert(); -webkit-filter: invert(); -moz-filter: invert(); -ms-filter: invert(); -o-filter: invert();} </style>';
    }
    while ($image_set[$i])
    {
        $encode_image = $image_set[$i]['image'];
        $src = 'data: '.mime_content_type($encode_image).';base64,'.$encode_image;
      echo '<div class="post">';   
        echo '<img src="'.$src.'">';   
        echo '<div class="post-container">';
        echo '<div class="marks">';
        echo '<div class="num">'.$image_set[$i]['nb_likes'].'</div><img src="img/like.png">';
        echo '<div class="num">'.$image_set[$i]['nb_com'].'</div><img src="img/flag.png">';        
        echo '</div>';
        echo '<a class="interact" href="comment_like.php?id_post='.$image_set[$i]['id'].'">interact</a>';
        echo '<div class="date">'.$image_set[$i]['date_post'].' </div>';
        echo '<br>';
        echo '<center><div class="info">Posted by : '.$image_set[$i]['login'].' </div></center>';        
        echo '</div>';
        echo '</div>';
        $i++;
    }
    ?>
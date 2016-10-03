<?php
    $_SESSION['layer'] = "";
    $photo = "../photos/tmp/".$_SESSION['img_name'];
    $layer_set = array('plane', 'maillot', 'bird', 'medal', 'cup', 'diamond', 'donut', 'eye', 'egg', 'game', 'gift', 'heart', 'flotter', 'champion', 'speaker', 'hat', 'spaceship', 'aces', 'flag-zdp', 'zdp', 'd6av');
    $i = 0;
    $layer = "none";
    while ($layer_set[$i])
    {
        if ($_GET[$layer_set[$i]] == "Select")
        {
            $i++;
            $layer = "../contents/".$i.".png";
            $_SESSION['layer'] = $layer;
            break;
        }
        $i++;
    }
?>
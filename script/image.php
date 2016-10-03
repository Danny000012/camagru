<?php
    session_start();
    //var_dump($_SESSION);
    header("Content-type: image/png");
    $destination = imagecreatefrompng($_SESSION['img_name']);
    $source = imagecreatefrompng($_SESSION['layer']);
    $largeur_source = imagesx($destination);
    $hauteur_source = imagesy($destination);
    $rendu = imagecreatetruecolor($largeur_source, $hauteur_source);
    $fond = imagecolorallocatealpha($rendu,  0, 128, 255, 0);
    imagefill($rendu, 0, 0, $fond);
    imagecopy($rendu, $destination, 0, 0, 0,0, $largeur_source, $hauteur_source);
    imagecopy($rendu, $source, 100, 100, 0,0, 200, 200);
    imagesavealpha($rendu, true);

    imagepng($rendu);
?>
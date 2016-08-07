<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
    $ret = "Max file size : 4Mo";
    $date = date('d/m/Y');
    if ($_POST['file'] == "upload")
    {
        if (getimagesize($_FILES['image']['tmp_name']) == FALSE)
        {
            $ret= "Please select an image";
        }
        else
        {
            $login = $_SESSION['login'];
            $image = addslashes($_FILES['image']['tmp_name']);
            $name = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);            
            $req = $bdd->prepare("INSERT INTO post(login, image, date_post) VALUES(?, ?, ?)");
            $req->execute(array($login, $image, $date));
            $ret = "Upload succeed";
        }
    }
    echo $ret;
?>
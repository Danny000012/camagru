<?php
    $db_name = "Camagru";
    $bdd = new PDO("mysql:host=localhost", 'root', 'root');
    $create_bdd = "CREATE DATABASE IF NOT EXISTS ".$db_name." CHARACTER SET utf8";
    $bdd->prepare($create_bdd)->execute();
    
    $connexion = new PDO("mysql:host=localhost;dbname=".$db_name, "root", "root");
    if ($connexion)
    {
        $req = 'CREATE TABLE users (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
                login CHAR(8) NOT NULL DEFAULT "toto",
                groupe ENUM("staff", "student", "other") NOT NULL,
                date_de_creation date NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf-8';
    }
    echo "zdp";

?>

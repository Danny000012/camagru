<?PHP
$bdd = new PDO('mysql:host=localhost', 'root', 'root');
$req =$bdd->prepare("CREATE DATABASE IF NOT EXISTS camagru;");
$req->execute();
$req = $bdd->prepare("use camagru;");
$req->execute();
$users_table = $bdd->prepare("CREATE TABLE `users` (id INT NOT NULL AUTO_INCREMENT, login VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;");
$users_table->execute();
$post_table = $bdd->prepare("CREATE TABLE `post` (id INT NOT NULL AUTO_INCREMENT, login VARCHAR(255) NOT NULL, image LONGBLOB, nb_likes INT, PRIMARY KEY (`id`)) ENGINE = InnoDB);");
$post_table->execute();
?>

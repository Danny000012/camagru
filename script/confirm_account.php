<?php
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
$login = (isset($_GET["login"])) ? htmlentities($_GET["login"]) : NULL;
$key = (isset($_GET["key"])) ? htmlentities($_GET["key"]) : NULL;
$req_user = $bdd->prepare('UPDATE users SET confirmation = 1 WHERE login = :login AND password = :key');
$req_user->execute(array('login' => $login, 'key' => $key));
$req_user = $bdd->prepare('SELECT 1 FROM users WHERE login = :login AND password = :key');
$req_user->execute(array('login' => $login, 'key' => $key));
if ($user_info = $req_user->fetch()) {
	echo "Your account has been validate!";
}
else
{
	echo "<p style='color:red'>A mistake occure please try again, your account hasn't been validate</p>";
}

?>
<script>
setTimeout(function(){
		document.location.href="index.php";
		},2000);
</script>

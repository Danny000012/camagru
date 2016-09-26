<?php
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
if ($_POST['connect'] == "sign in")
{
	if (!empty($_POST['login2']) AND !empty($_POST['password2']))
	{
		$login2 = htmlentities($_POST['login2']);
		$mdp3 = sha1(htmlentities($_POST['password2']));
		$req_user = $bdd->prepare("SELECT * FROM users WHERE login= ? AND password = ? AND confirmation= 1");
		$req_user->execute(array($login2, $mdp3));
		$user_exist = $req_user->rowCount();
		if ($user_exist == 1)
		{
			$user_info = $req_user->fetch();
			$_SESSION['id'] = $user_info['id'];
			$_SESSION['login'] = $user_info['login'];
			$_SESSION['email'] = $user_info['email'];
			header("Location: account.php?id=".$_SESSION['id']);
		} else {$ret = "User not registred or wrong password <br/> Don't forget to check your email in order to confirm your account!";}
	} else {$ret = "Please complete all the areas";}
}
if (($_POST['inscription'] == "signup"))
{
	if (!empty($_POST['login']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirmpassword']))
	{
		$login = htmlentities($_POST['login']);
		$email = htmlentities($_POST['email']);
		$check_email = $bdd->prepare("SELECT * FROM users WHERE email= ?");
		$check_email->execute(array($email));
		$email_exist =$check_email->rowCount();
		$check_login = $bdd->prepare("SELECT * FROM users WHERE login= ?");
		$check_login->execute(array($login));
		$login_exist =$check_login->rowCount();
		if ($login_exist == 0)
		{    
			if ($email_exist == 0)
			{
				$mdp = sha1(htmlentities($_POST['password']));
				$mdp2 = sha1(htmlentities($_POST['confirmpassword']));
				if ($mdp == $mdp2)
				{
					$insert_user = $bdd->prepare("INSERT INTO users(login, confirmation, email, password) VALUES(?, 0, ?, ?)");
					$insert_user->execute(array($login, $email, $mdp));
					send_email($email, $login, $mdp2);
					$ret = "Account create, check your email to confirm your account !";          
				} else {$ret = "Passwords doesn't match !";}
			} else {$ret = "This email is already registred";}
		} else {$ret = "This login is already used, please try another one";}
	} else {$ret = "Please complete all the areas";}
}

function send_email($mail, $login, $mdp)
{
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
		$passage_ligne = "\r\n";
	else
		$passage_ligne = "\n";
	$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
	$message_html = "<html><head></head><body><b>Bonjour</b><br/>Vous venez de vous inscrire sur le site web Camagru ! <br/>Pour valider votre compte cliquez sur le lien suivant: <br/> <a href='http://localhost:8080/branche_web/Camagru/script/confirm_account.php?login=".$login."&key=".$mdp."'>Validation de votre compte</a></body></html>";
	$boundary = "-----=".md5(rand());
	$sujet = "Validation du compte Camagru";
	$header = "From: \"Camagru\"<camagru@42.fr>".$passage_ligne;
	$header.= "Reply-to: \"Camagru\" <camagru@42.fr>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	mail($mail,$sujet,$message,$header);
}
?>

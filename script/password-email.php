<?php
session_start();
if ($_POST['button'] == "Send mail")
{
	$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
	if (!empty($_POST['login']) AND !empty($_POST['email']))
	{
		$login = htmlentities($_POST['login']);
		$email = htmlentities($_POST['email']);
		$req_user = $bdd->prepare("SELECT * FROM users WHERE id= ?");
		$req_user->execute(array($_SESSION['id']));
		$user_info = $req_user->fetch();
		if ($login == $_SESSION['login'])
		{
			if ($email == $user_info['email'])
			{
				send_email($email, $login);
				$ret = "An email has been send to reset your password";
			} else {$ret = "This email doesn't match your email";}
		} else {$ret = "This login doesn't exist";}
	} else {$ret = "Please Type all the areas";}
}

if ($_POST['button'] == "Change password")
{
	$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
	if (!empty($_POST['login']) AND !empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['confirmnewpassword']))
	{
		$login = htmlentities($_POST['login']);
		$oldpassword = sha1(htmlentities($_POST['oldpassword']));
		$newpassword = sha1(htmlentities($_POST['newpassword']));
		$conf = sha1(htmlentities($_POST['confirmnewpassword']));
		$req_user = $bdd->prepare("SELECT * FROM users WHERE id= ?");
		$req_user->execute(array($_SESSION['id']));
		$user_info = $req_user->fetch();
		if ($login == $_SESSION['login'])
		{
			if ($oldpassword == $user_info['password'])
			{
				if ($newpassword == $conf)
				{
					$insert_new_passwwd = $bdd->prepare("UPDATE users SET password = ? WHERE id = ?");
					$insert_new_passwwd->execute(array($conf, $_SESSION['id']));
					$ret = "Password updated";
				} else {$ret = "Your new password doesn 't match with the confirm one";}
			} else {$ret = "Please verify your old password";}
		} else {$ret = "This login doesn't exist";}
	} else {$ret = "Please type all the areas";}
}

if ($_POST['reset'] == "Change email")
{
	$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
	if (!empty($_POST['newemail']) AND !empty($_POST['confirmnewemail']))
	{
		$newemail = htmlentities($_POST['newemail']);
		$conf = htmlentities($_POST['confirmnewemail']);
		$req_user = $bdd->prepare("SELECT * FROM users WHERE id= ?");
		$req_user->execute(array($_SESSION['id']));
		$user_info = $req_user->fetch();
		if ($newemail == $conf)
		{
			$check_emails = $bdd->prepare("SELECT * FROM users WHERE email = ?");
			$check_emails->execute(array($conf));
			$valid = $check_emails->rowCount();
			if (!$valid) 
			{
				$insert_new_email = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
				$insert_new_email->execute(array($conf, $_SESSION['id']));
				$_SESSION['email'] = $conf;
				header("Location: reset_email.php");
			} else {$ret = "Email already used by another account";}
		} else {$ret = "Emails dosen't match<br>";}
	} else {$ret = "Please type all the areas";}
}

function send_email($mail, $login)
{
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
		$passage_ligne = "\r\n";
	else
		$passage_ligne = "\n";
	$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
	$message_html = "<html><head></head><body><b>Bonjour ".$login.",</b><br/>Vous venez de demander la reinitialisation de vorte mot de passe. <br/>Pour changer votre mot de passe cliquez sur lien suivant: <br/> <a href='http:/".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."confirm_newpassword.php'>Modification du mot de passe</a></body></html>";
	$boundary = "-----=".md5(rand());
	$sujet = "Modification du mot de passe de votre compte Camagru";
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

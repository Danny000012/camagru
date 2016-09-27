<?php
    session_start();
    if ($_POST['button'] == "Change password")
    {
        $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
        if (!empty($_POST['login']) AND !empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['confirmnewpassword']))
        {
            $login = $_POST['login'];
            $oldpassword = sha1($_POST['oldpassword']);
            $newpassword = sha1($_POST['newpassword']);
            $conf = sha1($_POST['confirmnewpassword']);
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
        } else {$ret = "Please Type all the areas";}
    }
if ($_POST['reset'] == "Change email")
{
    $bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
    if (!empty($_POST['newemail']) AND !empty($_POST['confirmnewemail']))
    {
        $newemail = $_POST['newemail'];
        $conf = $_POST['confirmnewemail'];
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
			} else {$ret = "Email already use by another account";}
        } else {$ret = "Emails dosen't match<br>";}
    } else {$ret = "Please type all the areas";}
}
?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
$ret = "a 42 school project 'instagram-like'";
if ($_POST['connect'] == "sign in")
{
    if (!empty($_POST['login2']) AND !empty($_POST['password2']))
    {
        $login2 = htmlspecialchars($_POST['login2']);
        $mdp3 = sha1(htmlspecialchars($_POST['password2']));
        $req_user = $bdd->prepare("SELECT * FROM users WHERE login= ? AND password = ?");
        $req_user->execute(array($login2, $mdp3));
        $user_exist = $req_user->rowCount();
        if ($user_exist == 1)
        {
            $user_info = $req_user->fetch();
            $_SESSION['id'] = $user_info['id'];
            $_SESSION['login'] = $user_info['login'];
            $_SESSION['email'] = $user_info['email'];
            header("Location: account.php?id=".$_SESSION['id']);
        } else {$ret = "User not registred";}
    } else {$ret = "Please complete all the areas";}
}
if (($_POST['inscription'] == "signup"))
{
    if (!empty($_POST['login']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirmpassword']))
    {
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1(htmlspecialchars($_POST['password']));
        $mdp2 = sha1(htmlspecialchars($_POST['confirmpassword']));
        if ($mdp == $mdp2)
        {
            $insert_user = $bdd->prepare("INSERT INTO users(login, email, password) VALUES(?, ?, ?)");
            $insert_user->execute(array($login, $email, $mdp));
            $ret = "Account create, you can now log in";                                    
        } else {$ret = "Passwords doesn't match !";}
    } else {$ret = "Please complete all the areas";}
}    
?>
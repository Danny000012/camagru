<?PHP
echo "hello ";


if (isset($_POST['signin']))
{
    echo "submit";
    $login = htmlspecialchars(trim($_POST['login']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));
    if ($login && $email && $password && $confirmpassword)
    {
        if (strlen($login) >= 4)
        {
            if (strlen($password) >= 6)
            {
                if ($password == $confirmpassword)
                {   
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('camagru');
                    $query = mysql_query("INSERT INTO users VALUES('', '$logn', '$password', '$email')");
                    echo "Inscription succeed ";    
                }
                else
                    echo "Your confirmation password doesn't match with the first one ";
            } else
                echo "Your password is too short (less than 6 characters) ";
        } else
            echo "Your login is too short (less than 4 characters) ";
    } else
        echo "Please complete All the areas before submiting ";
}
echo "fin ";

?>


    <meta charset="utf8">
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <title>Camagru</title>
    <link href="stylesheets/sign_in.css" rel="stylesheet">
    <link href="stylesheets/menu.css" rel="stylesheet">
    <link href="stylesheets/index.css" rel="stylesheet">
    <link href="stylesheets/reset_password.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

    <div class="form-content" onClick="hide()">
        <img text-align="center" src="img/user.png" alt="user_logo" class="img_form">
        <form method="POST" action="" class="form" onClick="hide()">
            <div class="item">Login</div>
            <input type="text" name="login">
            <div class="item">Email</div>
            <input type="text" name="email">
            <div class="item">Password</div>
            <input type="password" name="password">
            <div class="item">Confirm password</div>
            <input type="password" name="confirmpassword">
            <div align="center">
                <div>
                    <input type="submit" name="button" value="signin" class="button">
                </div>
            </div>
        </form>
    </div>
    <div class="separator"></div>
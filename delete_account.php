<?php
    session_start();
    echo "Hello".$_SESSION['login'];
    echo "This action will be permanent, are you sure you want to delete your account ? If yes please click under the link below;";
    echo "<br>";
    echo '<a href="script/delete.php?login='.$_SESSION['login'].'"> Delete account</a>';       
?>
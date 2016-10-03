<?php
session_start();
$extension = pathinfo($_SESSION['img_name'], PATHINFO_EXTENSION);
if(!empty($_SESSION['layer']))
{
	imagepng($rendu, $_SESSION['img_name']);
}
else
{
		if ($extension == "png")
	{
		$nolayer = imagecreatefrompng($_SESSION['img_name']);
		imagepng($nolayer, $_SESSION['img_name']);
	}
	else
	{
		$nolayer = imagecreatefromjpeg($_SESSION['img_name']);
		imagejpeg($nolayer, $_SESSION['img_name']);
	}
}


?>

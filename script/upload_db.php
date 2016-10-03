<?PHP
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
$login = $_SESSION['login'];
$message = "Please select a file";
$img_name = basename($_SESSION['img_name']);
$date = date ('d/m/Y');
$posix = date ('d/m/Y H:i:s');
$extension = pathinfo($_SESSION['img_name'], PATHINFO_EXTENSION);
if ($extension == "png") {
	$destination = imagecreatefrompng($_SESSION['img_name']);
}
else 
	$destination = imagecreatefromjpeg($_SESSION['img_name']);
if(!empty($_SESSION['layer']))
{	
	$source = imagecreatefrompng($_SESSION['layer']);
	$largeur_source = imagesx($destination);
	$hauteur_source = imagesy($destination);
	$rendu = imagecreatetruecolor($largeur_source, $hauteur_source);
	$fond = imagecolorallocatealpha($rendu,  0, 128, 255, 0);
	imagefill($rendu, 0, 0, $fond);
	imagecopy($rendu, $destination, 0, 0, 0,0, $largeur_source, $hauteur_source);
	imagecopy($rendu, $source, 100, 100, 0,0, 200, 200);
	imagesavealpha($rendu, true);
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
if (!empty($_SESSION['img_name']))
{
	if (rename($_SESSION['img_name'], "../photos/".$img_name))
	{
		$req = $bdd->prepare("INSERT INTO post(login, image, date_post, posix) VALUES(?, ?, ?, ?)");
		$req->execute(array($login, $img_name, $date, $posix));
		$message = "Upload suceed";
		$_SESSION['img_name'] = "";
		$_SESSION['layer'] = "";
	}
	else {
		$message = "Upload failed";
	}
}
?>
<script language="JavaScript">
setTimeout(function(){
document.location.href="../my_gallery.php";
}, 40);
</script>



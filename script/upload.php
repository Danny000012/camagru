<?PHP
session_start();
define('TARGET', './photos');
define('MAX_SIZE', 50000000);
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'root');
$valid_ext =array('jpg', 'gif', 'png', 'jpeg');
$img_info = array();
$login = $_SESSION['login'];
$extension = '';
$message = '';
$img_name = '';
$date = date ('d/m/Y');
$posix = date ('d/m/Y H:i:s');
if (!is_dir(TARGET)) {
	if ( !mkdir(TARGET, 0755)){
		exit("Problem with the repertory");
	}
}

if (!empty($_FILES['image']['name']))
{
	$extension= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	if (in_array(strtolower($extension), $valid_ext)) {
		$img_info = getimagesize($_FILES['image']['tmp_name']);
		if ($img_info[2] >= 1 && $img_info[2] <= 14) {
			if ($_FILES['image']['size'] <= MAX_SIZE) {
				if(isset($_FILES['image']['error']) && UPLOAD_ERR_OK === $_FILES['image']['error']) {
					$img_name = md5(uniqid()).'.'.$extension;
					if (move_uploaded_file($_FILES['image']['tmp_name'], './photos/'.$img_name)) {
						$message = "Upload suceed";
						$req = $bdd->prepare("INSERT INTO post(login, image, date_post, posix) VALUES(?, ?, ?, ?)");
						$req->execute(array($login, $img_name, $date, $posix));
					}
					else {
						$message = "Upload failed";
					}
				}
				else {
					$message = "Mistake happenned when uploading the file";
				}
			}
			else {
				$message = "File is too big for us sorry";
			}
		}
		else {
			$message = " File isn't an image";
		}
	}
	else {
		$message = "Wrong extension";
	}
}
else if (isset($_POST['test']) && $_POST['test'] != "") {
	list($type, $data) = explode(';', $_POST['test']);
	list(, $data) = explode(',', $data);
	$data = base64_decode($data);
	$image_name = md5(uniqid()).'.png';
	file_put_contents( './photos/' .$image_name, $data);
	$req = $bdd->prepare("INSERT INTO post(login, image, date_post, posix) VALUES(?, ?, ?, ?)");
	$req->execute(array($login, $image_name, $date, $posix));
	$message= "Upload suceed";
}
else {
	$message = "Please select a file";
}
echo $message;
?>

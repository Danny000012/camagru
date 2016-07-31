<?php
$destinataire = 'totohotmmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'proutprout@gmail.com';
$copie = 'adresse@fai.com';
$copie_cachee = 'adresse@fai.com';
$objet = 'Test'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = 'Un Bonjour de Developpez.com!';
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
	echo 'Votre message a bien été envoyé ';
}
else // Non envoyé
{
	echo "Votre message n'a pas pu être envoyé";
}
?>

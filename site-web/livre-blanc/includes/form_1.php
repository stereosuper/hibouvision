<?php
	if(empty($_POST['nom']) || empty($_POST['email'])){
		return false;
	}

	$nom = $_POST['nom'];
	$email = $_POST['email'];

	$to = 'shwarp@live.fr'; // Email submissions are sent to this email

	// Create email
	$subject = "Download from SensorFactory - Livre Blanc";
	$content = "Une personne a téléchargé le livre blanc. \n\n".
				  "Nom, prénom: $nom \nEmail: $email \n";
	$headers = "From: $email \n";
	$headers .= "Reply-To: $email";

	$subject2 = "SensorFactory - Votre Livre Blanc";
	$content2 = "Voici le lien pour télécharger votre livre blanc! \n\n";
	$headers2 = "From: $to \n";
	$headers2 .= "Reply-To: $to";

	if(mail($to, $subject, $content, $headers) && mail($mail, $subject2, $content2, $headers2)){
		return true;
	}
?>

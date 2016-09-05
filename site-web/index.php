<?php

$questions = array(
    1 => array(
        'question' => "Combien font deux + quatre ?",
        'reponses' => array('6', 'six')
    ),
    2 => array(
        'question' => "Combien font trois + quatre ?",
        'reponses' => array('7', 'sept')
    ),
    3 => array(
        'question' => "Combien font deux + deux ?",
        'reponses' => array('4', 'quatre')
    ),
    4 => array(
        'question' => "Combien font cinq + deux ?",
        'reponses' => array('7', 'sept')
    ),
    5 => array(
        'question' => "Combien font un + six ?",
        'reponses' => array('7', 'sept')
    )
);

session_start();

if(isset($_SESSION['captcha']['id_question'])){
	$idQuestion = $_SESSION['captcha']['id_question'];
}else{
	$idQuestion = array_rand($questions);
	$_SESSION['captcha']['id_question'] = $idQuestion;
}

$status = '';
$erreurNom = '';
$erreurEnt = '';
$erreurMail = '';
$erreurMsg = '';
$erreurEnvoi = '';

$nom = isset($_POST['nom']) ? strip_tags(stripslashes($_POST['nom'])) : '';
$ent = isset($_POST['societe']) ? strip_tags(stripslashes($_POST['societe'])) : '';
$mail = isset($_POST['email']) ? strip_tags(stripslashes($_POST['email'])) : '';
$tel = isset($_POST['tel']) ? strip_tags($_POST['tel']) : '';
$usage = isset($_POST['usage']) ? strip_tags(stripslashes($_POST['usage'])) : '';
$message = isset($_POST['message']) ? strip_tags(stripslashes($_POST['message'])) : '';
$captcha = isset($_POST['captcha']) ? strip_tags(stripslashes($_POST['captcha'])) : '';

$mailto = 'contact@hibouvision.com';

if(isset($_POST['submit'])){
 	if(empty($nom)){
 		$erreurNom = 'Le champ Nom est obligatoire';
 		$status = 'erreur';
 	}
 	if(empty($ent)){
 		$erreurEnt = 'Le champ Société est obligatoire';
 		$status = 'erreur';
 	}
 	if(empty($mail)){
 		$erreurMail = 'Le champ Email est obligatoire';
 		$status = 'erreur';
 	}else{
 		if(!preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $mail)){
 			$erreurMail = "L'adresse email est invalide";
 			$status = 'erreur';
 		}
 	}
 	if(empty($message)){
 		$erreurMsg = 'Le champ Message est obligatoire';
 		$status = 'erreur';
 	}
 	if(empty($captcha)){
 		$erreurCaptcha = 'Le champ Captcha est obligatoire';
 		$status = 'erreur';
 	}else{
 		if(!in_array($captcha, $questions[$idQuestion]['reponses']) ){
 			$idQuestion = array_rand($questions);
 			$_SESSION['captcha']['id_question'] = $idQuestion;
 		    $erreurCaptcha = 'Le captcha est incorrect!';
 		    $status = 'erreur';
 		}
 	}

 	if(empty($status)){
        $subject = "Nouveau message provenant de Hibouvision.com";

 		$content = 'De: ' . $nom . "\r\n" .
 				   'E-mail: ' . $mail . "\r\n" .
 				   'Téléphone: ' . $tel . "\r\n" .
 				   'Société: ' . $ent . "\r\n" .
 				   'Usage: ' . $usage . "\r\n\r\n" .
 				   'Message: ' . "\r\n" . $message;

 		$headers = 'From: ' . $mailto . "\r\n" .
     	'Reply-To:' . $mailto ;

        $sent = mail($mailto, $subject, $content, $headers);

 		if($sent){
 			$status = 'succes';
 		}else{
 			$status = 'erreur';
 			$erreurEnvoi = "Nous sommes désolés, une erreur est survenue. Veuillez réessayer!";
 		}
 	}
}

?>

<!DOCTYPE html>
<html class="no-js" lang='fr-FR'>
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width,initial-scale=1">
	  	<title>Hibouvision — La supervision de SI en mode Saas 100% chouette</title>
	  	<meta name="description" content="Hibouvision est un outil de supervision de SI en Saas 100% tout compris, 100% simple... 100% chouette !">
	  	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/manifest.json">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
	  	<meta property="og:title" content="Hibouvision">
	  	<meta property="og:url" content="http://www.hibouvision.com">
	  	<meta property="og:image" content="http://www.hibouvision.com/layoutImg/hibou.png">
	  	<meta name="msvalidate.01" content="4F2DD58AE4374E8E8765489651556703" />
	  	<link rel="stylesheet" href="css/themes/tooltipster-shadow.css">
	  	<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
	  	<link rel="stylesheet" href="css/style.css">
	  	<script src="js/libs/modernizr-2.6.1.min.js" type="text/javascript"></script>
	  	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-75857593-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>

	<body class="home">
		<header>
			<div class="container clearfix">
				<h1 id="logo"><a href='./'>Hibouvision</a></h1>
				<ul class="nav" id='mainMenu'>
					<li><a href="#simple" title="Simple">100% Simple</a></li>
					<li><a href="#efficace" title="Efficace">100% Efficace</a></li>
					<li><a href="#specifications" title="Spécifications">Spécifications</a></li>
					<li><a href="#formules" title="Formules">Formules</a></li>
					<li class="btn"><a href="#contact" title="Contact" class="ga-tracking" title="Menu Contact">Contact</a></li>
					<li id="flag"><a href="en" title="english version" class="lang">&nbsp;</a></li>
					<li id="connect"><a href="http://support.hibouvision.com" title="connexion" class="connect">&nbsp;</a></li>
				</ul>
			</div>
		</header>
		<div id="main">
			<div class="container">
				<div id="part1">
					<h2>La supervision de SI en mode Saas <span id="chouette"> 100% chouette&nbsp;&nbsp;!</span></h2>
					 <video id="hibou" autoplay loop muted poster="layoutImg/hibouvision.jpg">
						<source src="video/hibou2.webm" type="video/webm">
						<source src="video/hibou2.mp4" type="video/mp4">
						<img src='layoutImg/hibou.png' alt='' class='hibou-bg'>
					</video>
					<img src='layoutImg/hibou.png' alt='' class='hibou-bg'>
				 	<a href="#simple" id='scrollDown' class='btnScroll'>
				 		<img src="layoutImg/arrow.gif" alt="">
				 	</a>
				</div>
				<p>Hibouvision est un outil de supervision de SI en Saas 100% tout compris, 100% simple... 100% chouette&nbsp;&nbsp;!</p>
			</div>
			<div id="simple">
				<div class="infos">
					<div class="container-small clearfix">
						<div class="left">
							<div id="hibou1" class="hg">
								<img src="layoutImg/hibou-nuage.png" srcset="layoutImg/hibou-nuage.png 1x, layoutImg/hibou-nuage2x.png 2x" alt="">
							</div>
							<h4>Saas &amp; sécurisé</h4>
							<p>Tous les avantages d’une solution  Saas, avec une sécurité optimale garantie.</p>
						</div>
						<div class="right">
							<div id="hibou2" class="hd">
								<img src="layoutImg/prtg.png" srcset="layoutImg/prtg.png 1x, layoutImg/prtg2x.png 2x" alt="">
							</div>
							<h4>Basé sur PRTG</h4>
							<p>Profitez de l'experience de 150 000 administrateurs.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-grey">
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Simple</div>
						<h3>L'interface<br> dont vous rêviez</h3>
						<p>Hibouvision est un outil facile à utiliser, rapide, élégant et personnalisable : cartographie intégrée, arborescence, graphique… Disponible aussi sur mobile !</p>
						<a href="#contact" class="bouton btnScroll ga-tracking" title="Demander une demo">Demander une démo</a>
					</div><div class="img ">
						<!--<img src="layoutImg/tel.png" alt="" id="img-tel" class="foo">-->
						<img src="layoutImg/tel.png" srcset="layoutImg/tel.png 1x, layoutImg/tel@2x.png 2x" alt="" id="img-tel" class="foo">
						<!-- <img src="layoutImg/screenshot.png" alt="" id="screen" class="foo"> -->
						<img src="layoutImg/screenshot.png" srcset="layoutImg/screenshot.png 1x, layoutImg/screenshot@2x.png 2x" alt="" id="screen" class="foo">
					</div>
				</div>
			</div>
			<div id="efficace">
				<div class="infos">
					<div class="container-small clearfix">
						<div class="left">
							<div id="hibou3" class="hg">
								<img src="layoutImg/hibou-heart.png" srcset="layoutImg/hibou-heart.png 1x, layoutImg/hibou-heart2x.png 2x" alt="">
							</div>
							<h4>Sans agent</h4>
							<p>Pas d'overhead sur vos équipements !</p>
						</div>
						<div class="right">
							<div id="hibou4" class="hd">
								<img src="layoutImg/hibou-babies.png" srcset="layoutImg/hibou-babies.png 1x, layoutImg/hibou-babies2x.png 2x" alt="">
							</div>
							<h4>Scalabilité &amp; Résilience</h4>
							<p>Hibouvision s'adapte à votre croissance sans perdre de plume !</p>
						</div>
					</div>
				</div>
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Efficace</div >
						<h3>Une vision claire et globale</h3>
						<p>Visualisez en un coup d’œil l’ensemble des états  et alertes de vos équipements.</p>
						<p>Identifiez en un clic la source de vos incidents.</p>
						<a href="#contact" class="bouton btnScroll ga-tracking" title="Demander une demo 2">Demander une démo</a>
					</div>
					<div class="img">
						<!-- <img class="bar" src="layoutImg/screenshot2.png" alt="" id="screen2" > -->
						<img src="layoutImg/screenshot2.png" srcset="layoutImg/screenshot2.png 1x, layoutImg/screenshot2@2x.png 2x" alt="" id="screen2" class="bar">
					</div>
				</div>
			</div>
			<div id="specifications">
				<div class="infos clearfix">
					<div class="container-small">
						<div class="left">
							<div id="hibou5" class="hg">
								<img src="layoutImg/hibou-jumettes.png" srcset="layoutImg/hibou-jumelles.png 1x, layoutImg/hibou-jumelles2x.png 2x" alt="">
							</div>
							<h4>Anticipez</h4>
							<p>Profitez de dashboards pertinents pour piloter votre SI</p>
						</div>
						<div class="right">
							<div id="hibou6" class="hd">
								<img src="layoutImg/hibou-vieux.png" srcset="layoutImg/hibou-vieuxdegeu.png 1x, layoutImg/hibou-vieuxdegeu2x.png 2x" alt="">
							</div>
							<h4>Partenaire hibouvision</h4>
							<p><a href="#contact" class="btnScroll underline ga-tracking" title="Devenez partenaire">Devenez partenaire</a> Hibouvision ou <span class="underline"><a href="#contact" class="btnScroll ga-tracking" title="Trouvez un partenaire">trouvez<br> celui qui vous convient.</a></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-yellow">
				<div class="container-small">
					<div id="gauche" class='col'>
						<div class="chapeau">Spécifications</div >
						<h3>Pas de service<br> à tiroirs !</h3>
						<p>Tout est inclus par défaut dans l’unique version de Hibouvision : aucun add-on, aucun frais supplémentaire.</p>
						<p>Pour votre sécurité, le monitoring est réalisé à partir de sondes installées au cœur de votre SI.</p>
						<a href="#contact" class="bouton btnScroll ga-tracking" title="Demander la liste">Demander la liste complète</a>
					</div><ul id="centre" class='col'>
						<li>Supervision sans agent de la bande passante, de l’utilisation des ressources, de l’activité et des SLA</li>
						<li>Compatible avec les réseaux de toutes tailles</li>
						<li>Découverte et configuration automatique des équipements (IPv4 et IPv6)</li>
						<li>Supervision de plusieurs réseaux et/ou de plusieurs sites sans coût supplémentaire</li>
						<li>plate-forme centrale sécurisée pour tous vos déploiements</li>
						<li>API HTTP pour interfacer Hibouvision avec d’autres applications </li>
					</ul><ul id="droite" class='col'>
						<li>Canaux multiples de notifications (email, SMS, WS HTTP, Scripts, Syslog,...) </li>
						<li>Fichiers de logs détaillés sur toute l’activité de la plate-forme</li>
						<li>+200 types de capteurs (Ping, HTTP, WMI, Perfcounters, WEBM...)</li>
						<li>Surveillance du trafic réseau et analyse du comportement avec SNMP, Netflow v5/9, sFlow v5, jFlow v5, packet sniffing</li>
						<li>Templates préconfigurés pour les équipements les plus courants (routeurs Cisco, Windows server, Serveurs SQL, hyperviseurs, etc...)</li>
						<li>Cette liste est loin d’être exhaustive, <a href="#contact" class="btnScroll ga-tracking" title="Contactez nous">contactez-nous</a> pour en savoir plus !</li>
					</ul>
				</div>
			</div>
			<div id="formules">
				<div class="infos clearfix">
					<div class="container-small">
						<div class="left">
							<div id="hibou7" class="hg">
								<img src="layoutImg/hibou-simple.png" srcset="layoutImg/hibou-simple.png 1x, layoutImg/hibou-simple2x.png 2x" alt="">
							</div>
							<h4>Installation simple</h4>
							<p>En un click, une supervision de haut niveau clé en main !</p>
						</div>
						<div class="right">
							<div id="hibou8" class="hd">
								<img src="layoutImg/sensor-factory.png" srcset="layoutImg/sensor-factory.png 1x, layoutImg/sensor-factory2x.png 2x" alt="">
							</div>
							<h4>Avec SensorFactory</h4>
							<p>Hibouvision est supporté 24/7/365 par des spécialistes de la supervision.</p>
						</div>
					</div>
				</div>
				<div class="container-small">
					<div class="chapeau">Formules</div>
					<h3>À chacun son Hibouvision</h3>
					<ul id="offre">
						<li id="scop">
							<div class="container-img">
								<img src="layoutImg/scop.jpg" alt="">
							</div>
							<ul>
								<li><h4>Scops</h4></li>
								<li class="gris">1 sonde</li>
								<li>200 capteurs</li>
								<li class="gris">Aide à la configuration initiale</li>
								<li>plate-forme disponible 24/7/365</li>
							</ul>
						</li><!--
						--><li id="asio">
							<div class="container-img">
								<img src="layoutImg/asio.jpg" alt="">
							</div>
							<ul>
								<li><h4>Asio</h4></li>
								<li class="gris">2 sondes</li>
								<li>450 capteurs</li>
								<li class="gris">Aide à la configuration initiale</li>
								<li>plate-forme disponible 24/7/365</li>
							</ul>
						</li><!--
						--><li id="bubo">
						<div class="container-img">
								<img src="layoutImg/bubo.jpg" alt="">
							</div>
							<ul>
								<li><h4>Bubo</h4></li>
								<li class="gris">3 sondes</li>
								<li>1000 capteurs</li>
								<li class="gris">Aide à la configuration initiale</li>
								<li>plate-forme disponible 24/7/365</li>
							</ul>
						</li>
					</ul>
					<div id="option">
						<h4>Options</h4>
						<ul id="option-2">
							<li>Heures de travaux
								<span class="tooltip" title="
											Faites appel à nous quand vous le souhaitez pour faire évoluer votre supervision :
											<ul>
											<br>
											<li>Déploiement de probe (applicatif PRTG)</li>
											<li>Ajout d'équipement</li>
											<li>Ajout de capteur</li>
											<li>Optimisation des capteurs existants</li>
											<li>Construction de carte</li>
											<li>Construction de rapport</li>
											<li>Gestion des notifications</li>
											<li>etc.</li>
										</ul>">?</span>
							</li>
							<li class="gris">Marque blanche : Hibouvision à vos couleurs&nbsp;&nbsp;!</li>
						</ul>
					</div>
					<div id="btn"><a href="#contact" class="bouton btnScroll ga-tracking" title="Demander tarifs">Demander les tarifs des formules</a></div>
				</div>
			</div>
			<div id="contact">
				<div class="infos clearfix">
					<div class="container-small">
						<div class="left">
							<div id="hibou9" class="hg">
								<img src="layoutImg/hibou-euros.png" srcset="layoutImg/hibou-cheap.png 1x, layoutImg/hibou-cheap2x.png 2x" alt="">
							</div>
							<h4>Économique</h4>
							<p>Ne payez pas des licences dont vous n'avez pas besoin.</p>
						</div>
						<div class="right">
							<div id="hibou10" class="hd">
								<img src="layoutImg/hibou-clock.png" srcset="layoutImg/hibou-clock.png 1x, layoutImg/hibou-clock2x.png 2x" alt="">
							</div>
							<h4>Heures de travaux</h4>
							<p>Nous sommes là pour vous aider à configurer et administrer votre plate-forme.</p>
						</div>
					</div>
				</div>
				<div class="bg-grey">
					<div class="container-small clearfix">
						<div class="text">
							<div class="chapeau">Contact</div>
							<h3>Nous vous répondons avec plaisir !</h3>
							<p>Envie d’en savoir plus, d’avoir une démo ou de connaître l’ensemble des fonctionnalités ? Nous sommes là pour vous aider&nbsp;!
						</div>
						<div id="formulaire">
							<?php if($status == 'succes'){ ?>
								<p class='succes'>Merci, votre message a bien été envoyé.<br>Nous vous répondrons dans les plus bref délais&nbsp;! <br/><br/><a href="/#contact" onclick="location.reload();">Cliquez ici</a> pour renvoyer un autre message.</p>
								<div class="ga-tracking-load" data-cat="Formulaire" data-action="Validation" data-label="Succes"></div>

							<?php }else{ ?>
								<?php
								if($status == 'erreur'){
									echo "<p class='error'><b>Oups! Nous n'avons pas pu envoyer votre demande:</b><br/>";
									if($erreurNom != '') echo $erreurNom .'<br/>';
									if($erreurEnt != '') echo $erreurEnt .'<br/>';
									if($erreurMail != '') echo $erreurMail .'<br/>';
									if($erreurMsg != '') echo $erreurMsg .'<br/>';
									if($erreurCaptcha != '') echo $erreurCaptcha .'<br/>';
									if($erreurEnvoi != '') echo $erreurEnvoi;
									echo '</p><div class="ga-tracking-load" data-cat="Formulaire" data-action="Validation" data-label="Erreur"></div>';
								}
								?>
								<form method="post" action="#contact" method='POST' >
								    <fieldset class='<?php if($erreurNom != '') echo 'error'; ?>'>
								        <label for="nom">Nom</label>
								        <input type="text" id="nom" name="nom" value='<?php echo $nom; ?>'>
								    </fieldset>
								    <fieldset class='<?php if($erreurEnt != '') echo 'error'; ?>'>
								        <label for="societe">Société</label>
								        <input type="text" id="societe" name='societe' value='<?php echo $ent; ?>'>
								    </fieldset>
								    <fieldset class='<?php if($erreurMail != '') echo 'error'; ?>'>
								        <label for="courriel">Email</label>
								        <input type="email" id="courriel" name='email' pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" value='<?php echo $mail; ?>'>
								    </fieldset>
								    <fieldset>
								        <label for="tel">Téléphone</label>
								        <input type="tel" id="tel" name='tel' value='<?php echo $tel; ?>'>
								    </fieldset>
								    <fieldset class='big-margin'>
								        <legend class="usage">Usage</legend><fieldset>
								        	<input type="radio" name="usage" id='clients' value='pour vos clients' checked='checked'><label class="label-radio" for='clients'>Pour vos clients</label><input type="radio" name="usage" id='vous' value='pour vous'> <label class="label-radio" for='vous'>Pour vous</label>
								        </fieldset>
								    </fieldset>
								    <fieldset class='<?php if($erreurMsg != '') echo 'error'; ?>'>
								        <label for="message">Message</label><textarea id="message" placeholder="Bonjour, j'aurais souhaité une démo..." name="message"><?php echo $message; ?></textarea>
								    </fieldset>
								    <fieldset class='captcha <?php if($erreurCaptcha != '') echo 'error'; ?>'>
								    	<label for='captcha'>
								    		<?php echo $questions[$idQuestion]['question']; ?>
								    	</label><input type="text" name="captcha" value="">
								    </fieldset>
								    <button type='submit' name='submit' class="bouton">Envoyer</button>
								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<div class="container-small">
					<ul>
						<li>©2016</li>
						<li><a href="http://www.hibouvision.com/mentions-legales">Mentions Légales</a></li>
						<li><a href="http://stereosuper.fr" target='_blank'>Crédit</a></li>
					</ul>
					<ul id="sensor">
						<li>Hibouvision est un service proposé par </li>
						<li class="sf"><img src="layoutImg/sensor-factory1.png" alt="Sensor Factory"></li>
						<li class="sf"><a href="http://www.sensorfactory.eu/" target='_blank'><img src="layoutImg/SF.png" alt=""></a></li>
					</ul>
				</div>
			</footer>
		</div>

		<script src="js/isMobile.min.js" type="text/javascript"></script>
		<script src="js/libs/jquery-1.8.0.min.js" type="text/javascript"></script>
	  	<script src="js/libs/jquery.easing.1.3.js" type="text/javascript"></script>
  	    <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
  	    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.2/scrollreveal.min.js"></script>
	  	<!--<script type="text/javascript" src="js/seeThru.js"></script>-->
	  	<script src="js/script.js" type="text/javascript"></script>
	  	<script src="js/ga-tracking.js" type="text/javascript"></script>
	</body>
</html>

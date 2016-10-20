<?php

	$status = '';
	$erreurNom = '';
	$erreurMail = '';

	$nom = isset($_POST['nom']) ? strip_tags(stripslashes($_POST['nom'])) : '';
	$mail = isset($_POST['email']) ? strip_tags(stripslashes($_POST['email'])) : '';
    $societe = isset($_POST['societe']) ? strip_tags(stripslashes($_POST['societe'])) : '';
    $tel = isset($_POST['tel']) ? strip_tags(stripslashes($_POST['tel'])) : '';

	$from = 'contact@hibouvision.eu'; // Email submissions are sent to this email
	$to = 'contact@sensorfactory.eu';

	if(isset($_POST['submit'])){
		if(empty($nom)){
			$erreurNom = 'Le champ Nom est obligatoire';
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

        if(empty($societe)){
            $erreurSociete = 'Le champ Societe est obligatoire';
            $status = 'erreur';
        }

        if(empty($tel)){
            $erreurTel = 'Le champ Téléphone est obligatoire';
            $status = 'erreur';
        }

		if(empty($status)){
			// Create email
			$subject = utf8_decode("Téléchargement de Hibouvision - Livre Blanc");
			$content = "Une personne a téléchargé le livre blanc. \n\n".
					   'Nom: ' . $nom . "\r\n" .
					   'Adresse e-mail: ' . $mail . "\r\n" .
                       'Societe: ' . $societe . "\r\n" .
                       'Téléphone: ' . $tel . "\r\n";
			$headers = 'From: "' . $nom . '" <' . $mail . '>' . "\r\n" .
					   'Reply-To: ' . $mail . "\r\n";


			$subject2 = utf8_decode("Hibouvision - Votre Livre Blanc");
			$content2 = "Merci <strong>".$nom."</strong> !<br><br>Peu de domaine dans l'informatique sont aussi complexes à maîtriser que la supervision d’un système d’information.<br>Transversalité des compétences, temps à y consacrer, budgets à défendre sont autant de challenges qu’il faut remporter pour arriver à mettre en œuvre et surtout maintenir dans le temps une plate-forme de supervision.<br><br>Les solutions techniques sont multiples, ne permettent jamais de couvrir toutes les facettes du système d’information ce qui vient ajouter à la difficulté de construire et maintenir une supervision efficace.<br><br>" . "\r\n" .
				"Comment conduire sa voiture avec un pare-brise opaque ? Cette image est pourtant celle qui s’impose à bon nombre de professionnels de l’IT. Parce que les projets métiers ont toujours la priorité, parce que le maintien en condition opérationnelle de votre infrastructure accapare toutes vos ressources, vous ne parvenez pas à tirer la quintessence de vos outils de monitoring.<br><br>C'est pourquoi nous vous mettons à disposition ce livre blanc pour vous permettre de démarrer votre projet de déploiement de supervision en vous posant les bonnes questions. Cette démarche est nécessaire pour obtenir au final une plate-forme de supervision qui soutienne efficacement vos processus et services IT." . "\r\n" .
				"Toute l’équipe Sensor Factory s’associe à moi pour vous remercier de l'attention que vous portez à ce livre blanc. Nous sommes à votre entière disposition pour répondre à vos questions et vous accompagner dans cette démarche.<br><br><a href='http://www.sensorfactory.eu/livreblanc/livreblanc.pdf'>Télécharger le livre blanc</a><br><br>" . "\r\n" .
				"En téléchargeant ce document, vous acceptez que vos noms et coordonnées soient utilisées par Sensor Factory pour vous contacter au sujet des produits et prestations présentés dans ce document. Sensor Factory ne partage pas ces informations avec des tiers.<br><br><br>Bien à vous,<br><br>Matthieu Noirbusson<br>Co-fondateur et Associé<br><br>3, chemin du Pressoir Chênaie<br>44100 Nantes<br>Tel: + 33 2 57 48 00 13<br><a href='http://www.sensorfactory.eu'>www.sensorfactory.eu</a><br><a href='http://www.hibouvision.com'>www.hibouvision.com</a><br><a href='https://twitter.com/sensorfactory'>https://twitter.com/sensorfactory</a>";
			$headers2 = 'From: "Matthieu Noirbusson" <' . $from . '>' . "\r\n" .
					    'Reply-To: ' . $from . "\r\n" .
					    "Content-type: text/html; charset= utf8\n";

			$sent = mail($to, $subject, $content, $headers);
			$sent2 =  mail($mail, $subject2, $content2, $headers2);

			if($sent2){
				$status = 'succes';
			}else{
				$status = 'erreur';
				$erreurEnvoi = "Nous sommes désolés, une erreur est survenue. Veuillez réessayer plus tard!";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang='fr-FR' class='no-js'>
<head>
    <meta charset="utf-8">
    <meta name="description" content="La gestion des notifications en supervision IT - Livre blanc, septembre 2016, par Hibouvision">
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <title>Hibouvision</title>

    <link rel="shortcut icon" type="image/png" href="favicon.png" />

	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="./css/animate.min.css" />
	<link rel='stylesheet' href='./css/font-awesome.min.css'/>
	<link rel='stylesheet' href='./css/font-lato.css'/>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-68140946-1', 'auto');
		ga('send', 'pageview');
	</script>

</head>
<body>
<!-- Main container -->
<div class="page-container">

<!-- bloc-0 -->
<div class="bloc b-divider sticky-nav bgc-white l-bloc" id="bloc-0">
	<div class="container">
		<nav class="navbar row">
			<div class="navbar-header">
				<a class="navbar-brand" href="http://www.sensorfactory.eu/" target="_blank"><img src='img/logo.png' srcset="img/logo.png 1x, img/logo@2x.png 2x" width="200"/></a>
				<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1">
				<ul class="site-navigation nav navbar-nav">
					<li>
						<a href="http://www.hibouvision.com" target="_blank">› hibouvision.com</a>
					</li>
					<li>
						<a href="http://www.sensorfactory.eu/" target="_blank">› sensorfactory.eu</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- bloc-0 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<!-- Footer - bloc-1 -->
<div class="bloc tc-paynes-grey bg-bg-desk bgc-platinum" id="bloc-1">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-6">
				<img src="img/image-front.png" class="img-responsive fadeInLeft animated" />
			</div>
			<div class="col-sm-6 marginT-neg">
				<h1 class="mg-lg tc-paynes-grey">
					Supervision en mode Saas ou Hébergée maison ?
				</h1>
				<h2 class="mg-lg tc-paynes-grey">
					Livre blanc - mai 2016
				</h2>
				<?php if($status != 'succes'){ ?>
					<p class="mg-lg ">
						Nous vous invitons a remplir tous les champs du formulaire ci-dessous
					</p>
					<form id="form_1" action='' method='post' class="animDelay02 animated">
						<p class='p-error'><?php if($erreurEnvoi){ echo $erreurEnvoi; } ?></p>
						<div class="form-group <?php if($erreurNom){ echo 'error'; } ?>">
							<label for='nom'>
								Votre prénom, votre nom
							</label>
							<input id="nom" type='text' class="form-control" name='nom' required value='<?php echo $nom; ?>' />
						</div>
						<div class="form-group <?php if($erreurMail){ echo 'error'; } ?>">
							<label for='email'>
								Votre adresse email
							</label>
							<input id="email" class="form-control" type="email" name='email' required value='<?php echo $mail; ?>' />
						</div>
                        <div class="form-group <?php if($erreurSociete){ echo 'error'; } ?>">
                            <label for='societe'>
                                Votre société
                            </label>
                            <input id="societe" class="form-control" type="text" name='societe' required value='<?php echo $societe; ?>' />
                        </div>
                         <div class="form-group <?php if($erreurTel){ echo 'error'; } ?>">
                            <label for='tel'>
                                Votre téléphone
                            </label>
                            <input id="tel" class="form-control" type="tel" name='tel' style="width:180px" required value='<?php echo $tel; ?>' />
                        </div>
						<button class="bloc-button btn pull-left btn-lg wire-btn-paynes-grey " name='submit' type="submit" id="cta">
							Téléchargez le livre
						</button>
					</form>
				<?php } else{ ?>
					<p class='success'>Merci!<br>Vous allez recevoir un email vous permettant de télécharger le livre blanc.</p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Footer - bloc-1 END -->

<!-- Footer - bloc-2 -->
<div class="bloc bgc-white l-bloc" id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-6">
				<h3 class="mg-md">
					À propos de Hibouvision
				</h3>
				<p>
					Hibouvision est une plateforme SaaS de supervision basée sur PRTG et opérée par Sensor Factory.
				</p>
				<p>
					Grâce à la richesse de sa bibliothèque de capteurs prédéfinis et son architecture respectueuse des normes actuelles de sécurité, Hibouvision est la solution adaptée à tous les réseaux petits et grands.
				</p> <a href="http://hibouvision.com" class="btn   btn-wire wire-btn-paynes-grey">Visitez Hibouvision.com</a>
			</div>
			<div class="col-sm-6">
				<img class="img-responsive center-block vertical-align-middle" src="img/logo-transparent-2.png" />
			</div>
		</div>
	</div>
</div>
<!-- Footer - bloc-2 END -->

<!-- Footer - bloc-4 -->
<div class="bloc l-bloc bgc-platinum" id="bloc-4">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-center paddingBot">
					<b>HIBOUVISION</b><br />3, chemin du Pressoir Chênaie, 44100 Nantes - <span class="fa fa-mobile-phone"></span>&nbsp; 02&nbsp;57&nbsp;48&nbsp;00&nbsp;13
				</p>
			</div>
		</div>
	</div>
</div>
<!-- Footer - bloc-4 END -->
</div>
<!-- Main container END -->

<script src="./js/jquery-2.1.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/blocs.min.js"></script>
<!--<script src="./js/jqBootstrapValidation.js"></script>
<script src="./js/formHandler.js"></script>-->

</body>

<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

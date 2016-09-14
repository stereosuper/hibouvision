<!DOCTYPE html>
<html class="no-js" lang='fr-FR'>
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width,initial-scale=1">
	  	<title>Hibou Vision - FAQ</title>
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
	  	<link rel="stylesheet" href="css/style.css">

	  	<script src="js/libs/modernizr-2.6.1.min.js" type="text/javascript"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

	  	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-75857593-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.js-scrollTo').on('click', function() { // Au clic sur un élément
					var page = $(this).attr('href'); // Page cible
					var speed = 750; // Durée de l'animation (en ms)
					$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
					return false;
				});
			});
		</script>
	</head>

	<body class="has-sidebar">
		<header id="header">
			<div class="container clearfix">
				<h1 id="logo"><a href='./'>Hibouvision</a></h1>
				<ul class="nav" id='mainMenu'>
					<li id="flag"><a href="disclaimer" title="english version" class="lang">&nbsp;</a></li>
				</ul>
			</div>
		</header>
		<div id="main">
			<div class="container">
				<div class="bloc-content">
					<div class="wrapper-alignment">
						<div class="content-align-top wrapper-nav-left">
							<div id="nav-left-fixed">
								<ul>
									<li><a href="#formule" class="js-scrollTo">Formules</a></li>
									<li><a href="#paiement" class="js-scrollTo">Moyens de paiements</a></li>
									<li><a href="#remise" class="js-scrollTo">Remise</a></li>
									<li><a href="#upgrade" class="js-scrollTo">Augmenter mon abonnement</a></li>
									<li><a href="#cancel" class="js-scrollTo">Annuler mon abonnement</a></li>
									<li><a href="#historique" class="js-scrollTo">Historique</a></li>
									<li><a href="#aide" class="js-scrollTo">Besoin d'aide ?</a></li>
								</ul>
							</div>
						</div>
						<div class="content-align-top content-with-navbar">
							<h3>Questions fréquentes</h3>

							<h4 id="formule">Comment fonctionnent les formules ?</h4>

							<p>Il s'agit d’un abonnement mensuel pour les formules Scops, Asio et Bubo; annuel pour la formule Mighty Owl. Nous établissons une facture mensuelle, quelque soit la formule, correspondant au prix de l’abonnement que vous avez choisi.</p>

							<h4 id="paiement">Quels sont les moyens de paiements acceptés ?</h4>

							<p>Pour le moment nous n’acceptons que les règlements par prélèvements ou virements bancaires. Vous pouvez nous consulter pour tous moyens de paiements alternatifs.</p>

							<h4 id="remise">Comment obtenir une remise ?</h4>

							<p>Des remises sur le prix du service sont consenties dans les cas suivants :</p>
								<ul>
									<li>Choisir l’offre Mighty Owl,</li>
									<li>Vous êtes un  revendeur/partenaire</li>
									<li>Vous faîtes le choix de vous engager annuellement</li>
								</ul>

							<h4 id="upgrade">Comment augmenter mon abonnement ?</h4>

							<p>Vous pouvez à tout moment monter en gamme via notre portail client. Ces changements sont effectifs immédiatement après la validation par notre équipe.
							Si vous faîtes cette augmentation en cours de mois d’abonnement, un prorata est calculé pour que vous ne payiez que la différence.</p>

							<h4 id="cancel">Comment annuler mon abonnement ?</h4>

							<p>Si vous décidez qu’Hibouvision n’est pas fait pour vous, annulez simplement sans pénalité votre abonnement via notre portail client. Le service sera arrêté à la fin de la période d’abonnement en cours.</p>
							
							<h4 id="historique">Combien de temps est conservé mon historique ?</h4>

							<p>La durée d’archivage de l’historique de votre supervision varie en fonction du type d’abonnement souscrit. Tous les détails par gamme sont donnés dans la tableau de prix.</p>

							<h4 id="aide">J’ai besoin d’aide ?</h4>

							<p>Faites un tour sur la documentation en ligne que vous trouverez dans notre portail client ou contactez-nous pour toute demande de support ou pour toute autre question. Selon la formule vous pouvez nous appeler au numéro qui vous sera communiqué.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<ul>
					<li>©2016</li>
					<li><a href="http://www.hibouvision.com/mentions-legales">Mentions Légales</a></li>
					<li><a href="http://stereosuper.fr" target='_blank'>Crédit</a></li>
					<li><a href="#">Notions importantes</a></li>
					<li><a href="#">Questions fréquentes</a></li>
					<li><a href="#">Données personnelles</a></li>
				</ul>
				<ul id="sensor">
					<li>Service proposé par </li>
					<li class="sf"><img src="layoutImg/sensor-factory1.png" alt="Sensor Factory"></li>
					<li class="sf"><a href="http://www.sensorfactory.eu/" target='_blank'><img src="layoutImg/SF.png" alt=""></a></li>
				</ul>
			</div>
		</footer>
		<script src="js/isMobile.min.js" type="text/javascript"></script>
		<script src="js/libs/jquery-1.8.0.min.js" type="text/javascript"></script>
	  	<script src="js/libs/jquery.easing.1.3.js" type="text/javascript"></script>
	  	<!--<script type="text/javascript" src="js/seeThru.js"></script>-->
	  	<script src="js/script.js" type="text/javascript"></script>
	</body>
</html>

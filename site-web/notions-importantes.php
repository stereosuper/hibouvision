<!DOCTYPE html>
<html class="no-js" lang='fr-FR'>
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width,initial-scale=1">
	  	<title>Hibou Vision - Notions importantes</title>
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
	  	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-75857593-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>

	<body>
		<header> 
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
					<h3>
						Notions importantes
					</h3>

					<h4>
						Qu’est ce qu’un capteur ?
					</h4>

					<p>
						Dans Hibouvision, on crée des “devices” qui représentent les équipements de votre réseau. Sur ces devices, on crée des capteurs (sensors).<br/>
						Prenons l’exemple suivant:
					</p>

					<p>
						Créons un device “Firewall” et un device “Mail server”. Sur chaque device, créons un ou plusieurs capteurs. Chaque capteur supervise un aspect unique de votre équipement. Cela peut être un temps de réponse au ping, une charge CPU sur un serveur, le trafic sur une interface réseau ou l’ouverture d’un port réseau.
					</p>

					<a href="layoutImg/table-capteur.jpg"><img class="align-center" src="layoutImg/table-capteur.jpg"></a>

					<div class="img-txt">
						<img src="layoutImg/check.jpg">
						<p class="bold">
							Là où la plupart des solutions de supervisions vous contraignent à des “monitoring-type”, Hibouvision vous offre la possibilité, tout en étant guidé grâce aux modèles-types de supervision, d’adapter à vos besoins spécifiques la surveillance de vos équipements.
						</p>
					</div>

					<p>
						Hibouvision propose une liste très importante de capteurs  auxquels vous avez accès au travers de nos différentes formules.
					</p>

					<p>
						Il faut compter en moyenne entre 5 et 10 capteurs par équipement, mais cela dépend bien sûr de ce que vous voulez exactement superviser. Si vous deviez avoir besoin ultérieurement d'un plus grand nombre de capteurs, vous pourrez passer à un pack plus élevé en ne payant que la différence de prix, tout en préservant vos configurations, votre historique et sans rupture de service.
					</p>
					<h4>
						Qu’est ce qu’une sonde ?
					</h4>
					<p>	
						Une sonde (probe) est l’agent relais qui doit être déployé sur votre réseau pour réaliser le monitoring de votre infrastructure. Il s’agit d’un exécutable qui s’installe sur un PC ou un serveur Windows et qui remonte de manière cryptée vers Hibouvision les informations consolidées de votre supervision. C’est ce PC ou ce serveur sur votre réseau qui se connecte sur vos équipements.
					</p>
					<p>
						Les versions de Windows suivantes sont officiellement supportées. Nous recommandons des systèmes d’exploitation (Operating Systems) en 64-bit (x64).  
					</p>
					<ul>
						<li>Microsoft Windows Server 2012 R2* (recommandé)</li>
						<li>Microsoft Windows Server 2012*</li>
						<li>Microsoft Windows 8.1</li>
						<li>Microsoft Windows 8</li>
						<li>Microsoft Windows 7</li>
						<li>Windows Server 2008 R2</li>
						<li class="mention-speciale">* Windows Server 2012 en mode « core » ou « minimal » ne sont pas officiellement supportés.</li>
					</ul>
					<p>
						Aucun accès à votre réseau depuis l’extérieur n’est nécessaire. C’est la sonde qui se connecte vers Hibouvision et non l’inverse. Un simple accès sortant vers Internet est donc suffisant pour déployer Hibouvision chez vous.
					</p>
					<a href="layoutImg/schema.jpg"><img class="img-3quarter-width align-center" src="layoutImg/schema.jpg"></a>
					<p class="bold align-center">
						Schéma de principe
					</p>
					<h4>
					Qu’est ce qu’un template ?
					</h4>
					<p>
						Pour vous guider, Hibouvision intègre des templates de supervision éprouvés qui conviendront à la plupart des cas de figures.
					</p>
					<a href="layoutImg/table-template.jpg"><img class="img-quarter3-width align-center" src="layoutImg/table-template.jpg"></a>
					<p class="bold align-center">
						Liste des templates par défaut
					</p>
					<h4>
						Que contient la bibliothèque de capteurs ?
					</h4>
					<p>
						En plus des templates fournis, Hibouvision propose une bibliothèque de plus de 200 capteurs-type que vous pouvez intégrer à la supervision de vos équipements. Cette liste est continuellement mise à jour. Vous pouvez la retrouvez à l’adresse suivante: 
						<a href="https://dash01.hibouvision.com/help/available_sensor_types.htm" class="underline">Bibliothèque de capteurs-type</a>
					</p>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<ul>
					<li>©2016</li>
					<li><a href="mentions-legales.php">Mentions Légales</a></li>
					<li><a href="http://stereosuper.fr" target='_blank'>Crédit</a></li>
					<li><a href="notions-importantes.php">Notions importantes</a></li>
					<li><a href="faq.php">Questions fréquentes</a></li>
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

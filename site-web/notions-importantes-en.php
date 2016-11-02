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
						Concepts
					</h3>

					<h4>
						What is a sensor?
					</h4>

					<p>
						"With Hibouvision, we create devices that represent equipments on your network. On these devices, we create sensors.
						Let's take an example:"
					</p>

					<p>
						Let's create a device "Firewall" and another one "Mail server". On each device, we create one or more sensors. Each sensor monitores a single aspect of your device. This can be a ping, a CPU load on a server, network card trafic or a test of a specific network port.
					</p>

					<a href="layoutImg/table-capteur.jpg"><img class="align-center" src="layoutImg/table-capteur.jpg"></a>

					<div class="img-txt">
						<img src="layoutImg/check.jpg">
						<p class="bold">
							When most monitoring solutions are only working with fixed templates, Hibouvision is giving you the chance to adapt your own templates to your specific monitoring needs.
						</p>
					</div>

					<p>
						Hibouvision provides a huge list of sensors directly available in our plans.
					</p>

					<p>
						From our experience, we count around 5 to 10 sensors per equipment. Of course that depends on your real needs. But keep in mind that if you need more sensors, you can easily upgrade to a bigger plan, while only paying for the cost difference without extra fee, keeping your configurations, your history and also without any downtime. 
					</p>
					<h4>
						What is a probe?
					</h4>
					<p>	
						A probe is an agent that has to be deployed in your own network in order to monitore your infrastucture. It is a simple .exe that must be installed on a Windows system (PC or server depending on your load requirements) and which sends your consolidated monitoring data to Hibouvision through a secure encrypted channel. It is this machine that connects to your equipments.
					</p>
					<p>
						The 32-bit and 64-bit versions of the following operating systems are officially supported. We strongly recommend 64-bit ones.
					</p>
					<ul>
						<li>Microsoft Windows Server 2012 R2* (recommended)</li>
						<li>Microsoft Windows Server 2012*</li>
						<li>Microsoft Windows 8.1</li>
						<li>Microsoft Windows 8</li>
						<li>Microsoft Windows 7</li>
						<li>Windows Server 2008 R2</li>
						<li class="mention-speciale">* Windows Server 2012 in Core mode and the Minimal Server Interface are not officially supported.</li>
					</ul>
					<p>
						No external access to your network is required. It is a one way connection from the probe system to Hibouvision. A simple upload Internet access from your probe machine is sufficient.
					</p>
					<a href="layoutImg/schema.jpg"><img class="img-3quarter-width align-center" src="layoutImg/schema.jpg"></a>
					<p class="bold align-center">
						Schematic diagram
					</p>
					<h4>
					What is a template?
					</h4>
					<p>
						To help you, Hibouvision provides proven monitoring templates that suit most cases.
					</p>
					<a href="layoutImg/table-template.jpg"><img class="img-quarter3-width align-center" src="layoutImg/table-template.jpg"></a>
					<p class="bold align-center">
						Default templates list
					</p>
					<h4>
						What's in the sensors library?
					</h4>
					<p>
						In addition to the given templates, Hibouvision provides a large library of more than 200 different model sensors that you can use to monitor your own equipments. This list is continually updated. You can find it here : 
						<a href="https://dash01.hibouvision.com/help/available_sensor_types.htm" class="underline">model sensors list</a>
					</p>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<ul>
					<li>©2016</li>
					<li><a href="disclaimer.php">Legal Notice</a></li>
					<li><a href="http://stereosuper.fr" target='_blank'>Credit</a></li>
					<li><a href="notions-importantes-en.php">Concepts</a></li>
					<li><a href="faq-en.php">FAQ</a></li>
				</ul>
				<ul id="sensor">
					<li>Operated by</li>
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

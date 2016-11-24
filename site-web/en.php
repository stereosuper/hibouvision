<?php

$questions = array(
    1 => array(
        'question' => "Resolve the captcha : two + four = ?",
        'reponses' => array('6', 'six')
    ),
    2 => array(
        'question' => "Resolve the captcha : three + four = ?",
        'reponses' => array('7', 'seven')
    ),
    3 => array(
        'question' => "Resolve the captcha : two + two = ?",
        'reponses' => array('4', 'four')
    ),
    4 => array(
        'question' => "Resolve the captcha : five + two = ?",
        'reponses' => array('7', 'seven')
    ),
    5 => array(
        'question' => "Resolve the captcha : one + six = ?",
        'reponses' => array('7', 'seven')
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
 		$erreurNom = 'Name field is required';
 		$status = 'erreur';
 	}
 	if(empty($ent)){
 		$erreurEnt = 'Company field is required';
 		$status = 'erreur';
 	}
 	if(empty($mail)){
 		$erreurMail = 'Email field is required';
 		$status = 'erreur';
 	}else{
 		if(!preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $mail)){
 			$erreurMail = "L'adresse email est invalide";
 			$status = 'erreur';
 		}
 	}
 	if(empty($message)){
 		$erreurMsg = 'Message field is required';
 		$status = 'erreur';
 	}
 	if(empty($captcha)){
 		$erreurCaptcha = 'Captcha field is required';
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
	  	<title>Hibouvision — Saas solution for iT systems monitoring 100% owl inclusive !</title>
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
	  	<script src="js/isMobile.min.js" type="text/javascript"></script>
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
		<div id="clone-container">
			<div class="container-small">
				<div id="clone-offre"></div>
			</div>
		</div>
		<header>
			<div class="container clearfix">
				<h1 id="logo"><a href='en.php'>Hibouvision</a></h1>
				<ul class="nav" id='mainMenu'>
					<li><a href="#simple" title="Simple">100% Easy</a></li>
					<li><a href="#efficace" title="Efficace">100% Efficient</a></li>
					<li><a href="#specifications" title="Spécifications">Specifications</a></li>
					<li><a href="#formules" title="Formules">Offers</a></li>
					<li class="btn"><a href="#contact" title="Contact" class="ga-tracking" title="Menu Contact">Contact</a></li>
					<li id="flag" class='en'><a href="index.php" title="version française" class="lang">&nbsp;</a></li>
					<li id="connect"><a href="http://support.hibouvision.com" title="connexion" class="connect">&nbsp;</a></li>
				</ul>
			</div>
		</header>
		<div id="main">
			<div class="container">
				<div id="part1">
					<h2>Saas solution for iT systems monitoring<span id="chouette"> 100% owl inclusive&nbsp;&nbsp;!</span></h2>
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
				<p>Hibouvision is fully saas monitoring solution, 100% easy, 100% efficient... 100% owl inclusive&nbsp;&nbsp;!</p>
			</div>
			<div id="simple">
				<div class="infos">
					<div class="container-small clearfix">
						<div class="left">
							<div id="hibou1" class="hg">
								<img src="layoutImg/hibou-nuage.png" srcset="layoutImg/hibou-nuage.png 1x, layoutImg/hibou-nuage2x.png 2x" alt="">
							</div>
							<h4>Saas &amp; Secure</h4>
							<p>All the benefits of Saas with guaranteed optimal security.<br />
							<a href="livre-blanc" class="underline" title="En savoir plus">More</a></p>
						</div>
						<div class="right">
							<div id="hibou2" class="hd">
								<img src="layoutImg/prtg.png" srcset="layoutImg/prtg.png 1x, layoutImg/prtg2x.png 2x" alt="">
							</div>
							<h4>PRTG based</h4>
							<p>Trusted every day by 150,000 Admins around the globe.<br/>
							<a href="http://www.paessler.com" class="underline">www.paessler.com</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-grey">
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Easy</div>
						<h3>The interface<br /> of your dreams</h3>
						<p>Hibouvision is easy to use, fast, stylish and customizable: integrated mapping, tree views, graphics... Also available on mobile devices!</p>
						<a href="#contact" class="bouton btnScroll ga-tracking" title="Demander une demo">Try it for free</a>
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
							<h4>Agentless</h4>
							<p>No overhead on devices!</p>
						</div>
						<div class="right">
							<div id="hibou4" class="hd">
								<img src="layoutImg/hibou-babies.png" srcset="layoutImg/hibou-babies.png 1x, layoutImg/hibou-babies2x.png 2x" alt="">
							</div>
							<h4> Scalability &amp; Resilience</h4>
							<p>Hibouvision naturally grows according to your needs</p>
						</div>
					</div>
				</div>
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Efficient</div >
						<h3>A clear an comprehensive view</h3>
						<p>See at a glance the status and alerts of your devices.</p>
						<p>Single clic identification of incidents</p>
						<a href="#contact" class="bouton btnScroll ga-tracking" title="Demander une demo 2">Try it for free</a>
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
							<h4>Anticipate</h4>
							<p>Enjoy relevant dashboards to drive your iT systems</p>
						</div>
						<div class="right">
							<div id="hibou6" class="hd">
								<img src="layoutImg/hibou-vieux.png" srcset="layoutImg/hibou-vieuxdegeu.png 1x, layoutImg/hibou-vieuxdegeu2x.png 2x" alt="">
							</div>
							<h4>Hibouvision's partner</h4>
							<p><a href="#contact" class="btnScroll underline ga-tracking" title="Devenez partenaire">Become an Hibouvision's partner</a> or<br><span class="underline"><a href="#contact" class="btnScroll ga-tracking" title="Trouvez un partenaire">find the plan that suits you.</a></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-yellow">
				<div class="container-small">
					<div id="gauche" class='col'>
						<div class="chapeau">SPECIFICATIONS</div >
						<h3>An all-road solution !</h3>
						<p>Enjoy a sensors library of the most comprehensive and ever-growing market.</p>
						<p>For your network security, monitoring requests are initialized from a local probe deployed on your IT infrastructure</p>
						<a href="https://dash01.hibouvision.com/help/available_sensor_types.htm" class="bouton ga-tracking" title="Voir la liste complete">See the complete list</a>
					</div><ul id="centre" class='col'>
						<li>Agentless monitoring of bandwidth, usage, activity, uptime, and SLA monitoring</li>
						<li>Suitable for networks of all sizes</li>
						<li>Automatic network discovery and sensor configuration (IPv4 and IPv6)</li>
						<li>Monitoring of multiple networks/locations with no additionnal costs</li>
						<li>High level cloud architecture for each deployment</li>
						<li>HTTP-based API for interfacing with other applications</li>
					</ul><ul id="droite" class='col'>
						<li>Various means of notifications (email, SMS, pager message, HTTP request, exe, script, syslog, etc.)</li>
						<li>Detailed log files about all activity and results</li>
						<li>200+ sensor types (Ping, HTTP, WMI, Perccounters, WEBM, and many others)</li>
						<li>Network traffic and behavior analysis using SNMP, NetFlow v5/v9, sFlow v5, jFlow v5, packet sniffing</li>
						<li>Preconfigured device templates for Cisco routers, SQL servers, virtual systems, etc.</li>
						<li>This is a No-exhaustive list,<a href="#contact" class="btnScroll ga-tracking" title="Contactez nous"> contact us</a>  to learn more!</li>
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
							<h4>Easy setup</h4>
							<p>A high level monitoring turnkey product</p>
						</div>
						<div class="right">
							<div id="hibou8" class="hd">
								<img src="layoutImg/sensor-factory.png" srcset="layoutImg/sensor-factory.png 1x, layoutImg/sensor-factory2x.png 2x" alt="">
							</div>
							<h4>Sensor Factory team</h4>
							<p>Hibouvision is supported 24/7 by monitoring experts.<br />
							<a href="http://www.sensorfactory.eu/" class="underline">Sensor Factory</a></p>
						</div>
					</div>
				</div>
				<div class="container-small">
					<div class="chapeau">Plans</div>
					<h3>To each his own Hibouvision</h3>
					<div id="pricer-mobile">
						<div class="offre offre-scops">
							<button class="offre-btn">
								<div class="offre-mobile offre-scops">
									<ul>
										<li class="masquotte-scops"></li>
										<li class="title-offre"><p>Scops</p>
										<p class="title-price">€40/month</p></li>
										<li><p class="arrow-offre">›</p></li>
									</ul>
								</div>
							</button>
							<div class="mobile-toggle ">
								<div class="categorie">
									<button>
										<p class="title-categorie">Basics</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="scops-td">Number of sensors</td>
												<td class="scops-td">100*</td>
											</tr>	
											<tr>
												<td class="scops-td">Frequency</td>
												<td class="scops-td">5 minutes</td>
											</tr>
											<tr>
												<td class="scops-td">Concurrent users</td>
												<td class="scops-td">1</td>
											</tr>
											<tr>
												<td class="scops-td">Auto discovering</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">24/7/365</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Retention</td>
												<td class="scops-td">12 months</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Sensors</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="scops-td">SNMP & WMI</td>
												<td class="scops-td">Yes</td>
											</tr>	
											<tr>
												<td class="scops-td">Websites</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Cloud</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">AD & Microsoft productivity</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Databases</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Virtualisation</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Storage</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Advanced network</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Business Process</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Custom scripts</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Beta sensors</td>
												<td class="scops-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Notifications</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="scops-td">Email</td>
												<td class="scops-td">Unlimited</td>
											</tr>	
											<tr>
												<td class="scops-td">SMS</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Voice SMS</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">SMS price/td>
												<td class="scops-td">€ 0,20</td>
											</tr>
											<tr>
												<td class="scops-td">Voice SMS price</td>
												<td class="scops-td">€ 0,20</td>
											</tr>
											<tr>
												<td class="scops-td">Custom notification</td>
												<td class="scops-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Advanced</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="scops-td">Unusual detection</td>
												<td class="scops-td">No</td>
											</tr>	
											<tr>
												<td class="scops-td">Interface customization</td>
												<td class="scops-td">No</td>
											</tr>
											<tr>
												<td class="scops-td">Multitenancy</td>
												<td class="scops-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Support</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="scops-td">Email</td>
												<td class="scops-td">Yes</td>
											</tr>	
											<tr>
												<td class="scops-td">Portal</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Chat</td>
												<td class="scops-td">Yes</td>
											</tr>
											<tr>
												<td class="scops-td">Phone</td>
												<td class="scops-td">No</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="offre offre-asio">
							<button class="offre-btn">
								<div class="offre-mobile offre-asio">
									<ul>
										<li class="masquotte-asio"></li>
										<li class="title-offre"><p>Asio</p>
										<p class="title-price">€180/month</p></li>
										<li><p class="arrow-offre">›</p></li>
									</ul>
								</div>
							</button>
							<div class="mobile-toggle
							">
								<div class="categorie">
									<button>
										<p class="title-categorie">Basics</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="asio-td">Number of sensors</td>
												<td class="asio-td">500**</td>
											</tr>	
											<tr>
												<td class="asio-td">Frequency</td>
												<td class="asio-td">5 minutes</td>
											</tr>
											<tr>
												<td class="asio-td">Concurrent users</td>
												<td class="asio-td">3</td>
											</tr>
											<tr>
												<td class="asio-td">Auto discovering</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">24/7/365</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Retention</td>
												<td class="asio-td">12 months</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Sensors</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="asio-td">SNMP & WMI</td>
												<td class="asio-td">Yes</td>
											</tr>	
											<tr>
												<td class="asio-td">Websites</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Cloud</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">AD & Microsoft productivity</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Databases</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Virtualisation</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Storage</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Advanced network</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Business Process</td>
												<td class="asio-td">No</td>
											</tr>
											<tr>
												<td class="asio-td">Virtualisation</td>
												<td class="asio-td">No</td>
											</tr>
											<tr>
												<td class="asio-td">Custom scripts</td>
												<td class="asio-td">No</td>
											</tr>
											<tr>
												<td class="asio-td">Beta sensors</td>
												<td class="asio-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Notifications</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="asio-td">Email</td>
												<td class="asio-td">Unlimited</td>
											</tr>	
											<tr>
												<td class="asio-td">SMS</td>
												<td class="asio-td">10 included/month</td>
											</tr>
											<tr>
												<td class="asio-td">Voice SMS</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">SMS price</td>
												<td class="asio-td">€ 0,20</td>
											</tr>
											<tr>
												<td class="asio-td">Voice SMS price</td>
												<td class="asio-td">€ 0,20</td>
											</tr>
											<tr>
												<td class="asio-td">Custom notification</td>
												<td class="asio-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Advanced</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="asio-td">Unusual detection</td>
												<td class="asio-td">No</td>
											</tr>	
											<tr>
												<td class="asio-td">Interface customization</td>
												<td class="asio-td">No</td>
											</tr>
											<tr>
												<td class="asio-td">Multitenancy</td>
												<td class="asio-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Support</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="asio-td">Email</td>
												<td class="asio-td">Yes</td>
											</tr>	
											<tr>
												<td class="asio-td">Portal</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Chat</td>
												<td class="asio-td">Yes</td>
											</tr>
											<tr>
												<td class="asio-td">Phone</td>
												<td class="asio-td">No</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="offre offre-bubo">
							<button class="offre-btn">
								<div class="offre-mobile offre-bubo">
									<ul>
										<li class="masquotte-bubo"></li>
										<li class="title-offre"><p>Bubo</p>
										<p class="title-price">€290/month</p></li>
										<li><p class="arrow-offre">›</p></li>
									</ul>
								</div>
							</button>
							<div class="mobile-toggle">
								<div class="categorie ">
									<button>
										<p class="title-categorie">Basics</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="bubo-td">Number of sensors</td>
												<td class="bubo-td">1000***</td>
											</tr>	
											<tr>
												<td class="bubo-td">Frequency</td>
												<td class="bubo-td">5 minutes</td>
											</tr>
											<tr>
												<td class="bubo-td">Concurrent users</td>
												<td class="bubo-td">5</td>
											</tr>
											<tr>
												<td class="bubo-td">Auto discovering</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">24/7/365</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Retention</td>
												<td class="bubo-td">Up to 24 months</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Sensors</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="bubo-td">SNMP & WMI</td>
												<td class="bubo-td">Yes</td>
											</tr>	
											<tr>
												<td class="bubo-td">Websites</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Cloud</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">AD & Microsoft productivity</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Databases</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Virtualisation</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Storage</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Advanced network</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Business Process</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Custom scripts</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Beta sensors</td>
												<td class="bubo-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Notifications</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="bubo-td">Email</td>
												<td class="bubo-td">Unlimited</td>
											</tr>	
											<tr>
												<td class="bubo-td">SMS</td>
												<td class="bubo-td">15 included/month</td>
											</tr>
											<tr>
												<td class="bubo-td">Voice SMS</td>
												<td class="bubo-td">15 included/month</td>
											</tr>
											<tr>
												<td class="bubo-td">SMS Price</td>
												<td class="bubo-td">0,15€</td>
											</tr>
											<tr>
												<td class="bubo-td">Voice SMS price</td>
												<td class="bubo-td">0,15€</td>
											</tr>
											<tr>
												<td class="bubo-td">Custom notification</td>
												<td class="bubo-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Advanced</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="bubo-td">Unusual detection</td>
												<td class="bubo-td">No</td>
											</tr>	
											<tr>
												<td class="bubo-td">Interface customization</td>
												<td class="bubo-td">No</td>
											</tr>
											<tr>
												<td class="bubo-td">Multitenancy</td>
												<td class="bubo-td">No</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Support</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="bubo-td">Email</td>
												<td class="bubo-td">Yes</td>
											</tr>	
											<tr>
												<td class="bubo-td">Portal</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Chat</td>
												<td class="bubo-td">Yes</td>
											</tr>
											<tr>
												<td class="bubo-td">Phone</td>
												<td class="bubo-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="offre offre-mighty">
							<button class="offre-btn">
								<div class="offre-mobile offre-mighty">
									<ul>
										<li class="masquotte-mighty"></li>
										<li class="title-offre"><p>Mighty Owl</p>
										<p class="title-price">Start from €340/month</p></li>
										<li><p class="arrow-offre">›</p></li>
									</ul>
								</div>
							</button>
							<div class="mobile-toggle">
								<div class="categorie ">
									<button>
										<p class="title-categorie">Basics</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="mighty-td">Number of sensors</td>
												<td class="mighty-td">Jusqu'à 5000****</td>
											</tr>	
											<tr>
												<td class="mighty-td">Frequency</td>
												<td class="mighty-td">1 minute</td>
											</tr>
											<tr>
												<td class="mighty-td">Concurrent users</td>
												<td class="mighty-td">Jusqu'à 30</td>
											</tr>
											<tr>
												<td class="mighty-td">Auto discovering</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">24/7/365</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Retention</td>
												<td class="mighty-td">Up to 24 months</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Sensors</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="mighty-td">SNMP & WMI</td>
												<td class="mighty-td">Yes</td>
											</tr>	
											<tr>
												<td class="mighty-td">Websites</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Cloud</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">AD & Microsoft productivity</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Databases</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Virtualisation</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Stockage</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Advanced network</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Business Process</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Custom scripts</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Beta sensors</td>
												<td class="mighty-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Notifications</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="mighty-td">Email</td>
												<td class="mighty-td">Unlimited</td>
											</tr>	
											<tr>
												<td class="mighty-td">SMS</td>
												<td class="mighty-td">20 included/month</td>
											</tr>
											<tr>
												<td class="mighty-td">Voice SMS</td>
												<td class="mighty-td">20 included/month</td>
											</tr>
											<tr>
												<td class="mighty-td">SMS Price</td>
												<td class="mighty-td">0,10€</td>
											</tr>
											<tr>
												<td class="mighty-td">Voice SMS price</td>
												<td class="mighty-td">0,10€</td>
											</tr>
											<tr>
												<td class="mighty-td">Custom notification</td>
												<td class="mighty-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Advanced</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="mighty-td">Unusual detection</td>
												<td class="mighty-td">Yes</td>
											</tr>	
											<tr>
												<td class="mighty-td">Interface customization</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Multitenancy</td>
												<td class="mighty-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="categorie">
									<button>
										<p class="title-categorie">Support</p>
									</button>
									<div class="table-slide-toggle">
										<table>
											<tr>
												<td class="mighty-td">Mail</td>
												<td class="mighty-td">Yes</td>
											</tr>	
											<tr>
												<td class="mighty-td">Portal</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Chat</td>
												<td class="mighty-td">Yes</td>
											</tr>
											<tr>
												<td class="mighty-td">Phone</td>
												<td class="mighty-td">Yes</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="pricer" class="visible">
						<table class="title-table-pricing">
							<tr>
								<td class="title-line">
									<div class="title-empty"></div>
								</td>
								<td class="title-scops">
									<p class="surmesure"> </p>
									<p class="title-offre">Scops</p>
									<p class="title-price">€40/month</p>
									<div class="masquotte-scops"></div>
								</td>
								<td class="title-asio">
								<p class="surmesure"> </p>
									<p class="title-offre">Asio</p>
									<p class="title-price">€180/month</p>
									<div class="masquotte-asio"></div>
								</td>
								<td class="title-bubo">
									<p class="surmesure"> </p>
									<p class="title-offre">Bubo</p>
									<p class="title-price">€290/month</p>
									<div class="masquotte-bubo"></div>
								</td>
								<td class="title-mighty">
									<p class="surmesure">tailored</p>
									<p class="title-offre">Mighty Owl</p>
									<p class="title-price">Start from €340/month</p>
									<div class="masquotte-mighty"></div>
								</td>
							</tr>
						</table>
						<div id="basics" class="categorie">
							<button type="button"><p>Basics</p><span class="btn-categorie"></button>
							<div class="table-slide-toggle">
								<table class="table-pricing">
									<tr>
										<td class="title-line">
											Number of sensors
										</td>
										<td class="scops-td">
											100*
										</td>
										<td class="asio-td">
											500**
										</td>
										<td class="bubo-td">
											1000***
										</td>
										<td class="mighty-td">
											Up to 5000****
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Frequency
										</td>
										<td class="scops-td">
											5 minutes
										</td>
										<td class="asio-td">
											5 minutes
										</td>
										<td class="bubo-td">
											5 minutes
										</td>
										<td class="mighty-td">
											1 minute
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Concurrent users
										</td>
										<td class="scops-td">
											1
										</td>
										<td class="asio-td">
											3
										</td>
										<td class="bubo-td">
											5
										</td>
										<td class="mighty-td">
											Up to 30
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Auto discovering
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											24/7/365
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes

										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Retention
										</td>
										<td class="scops-td">
											12 mois
										</td>
										<td class="asio-td">
											12 mois
										</td>
										<td class="bubo-td">
											12 mois
										</td>
										<td class="mighty-td">
											Up to 24 months
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div id="capteurs" class="categorie">
							<button type="button"><p>Sensors</p><span class="btn-categorie"></button>
							<div class="table-slide-toggle">
								<table class="table-pricing">
									<tr>
										<td class="title-line">
											SNMP & WMI
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Websites
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Cloud
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											AD & Microsoft productivity
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Databases
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Virtualisation
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Stockage
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Advanced network
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Business Process
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Custom scripts
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Beta sensors
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="categorie">
							<button type="button"><p>Notifications</p><span class="btn-categorie"></button>
							<div class="table-slide-toggle">
								<table class="table-pricing">
									<tr>
										<td class="title-line">
											Email
										</td>
										<td class="scops-td">
											Unlimited
										</td>
										<td class="asio-td">
											Unlimited
										</td>
										<td class="bubo-td">
											Unlimited
										</td>
										<td class="mighty-td">
											Unlimited
										</td>
									</tr>
									<tr>
										<td class="title-line">
											SMS
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											10 included/month
										</td>
										<td class="bubo-td">
											15 included/month
										</td>
										<td class="mighty-td">
											20 included/month
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Voice SMS
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											15 included/month
										</td>
										<td class="mighty-td">
											20 included/month
										</td>
									</tr>
									<tr>
										<td class="title-line">
											SMS Price
										</td>
										<td class="scops-td">
											0,20€								
										</td>
										<td class="asio-td">
											0,20€
										</td>
										<td class="bubo-td">
											0,15€
										</td>
										<td class="mighty-td">
											0,10€
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Voice SMS price
										</td>
										<td class="scops-td">
											0,20€
										</td>
										<td class="asio-td">
											0,20€
										</td>
										<td class="bubo-td">
											0,15€
										</td>
										<td class="mighty-td">
											0,10€
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Notification spécifique
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											No
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="categorie">
							<button type="button"><p>Advanced</p><span class="btn-categorie"></button>
							<div class="table-slide-toggle">
								<table class="table-pricing">
									<tr>
										<td class="title-line">
											Unusual detection
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											No
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Interface customization
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											No
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Multitenancy
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											No
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="categorie">
							<button type="button"><p>Support</p><span class="btn-categorie"></button>
							<div class="table-slide-toggle">
								<table class="table-pricing">
									<tr>
										<td class="title-line">
											Mail
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Portail
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Chat
										</td>
										<td class="scops-td">
											Yes
										</td>
										<td class="asio-td">
											Yes
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
									<tr>
										<td class="title-line">
											Tel
										</td>
										<td class="scops-td">
											No
										</td>
										<td class="asio-td">
											No
										</td>
										<td class="bubo-td">
											Yes
										</td>
										<td class="mighty-td">
											Yes
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="contact">
				<div class="infos clearfix">
					<div class="container-small">
						<div class="left">
							<div id="hibou9" class="hg">
								<img src="layoutImg/hibou-euros.png" srcset="layoutImg/hibou-cheap.png 1x, layoutImg/hibou-cheap2x.png 2x" alt="">
							</div>
							<h4>Economic</h4>
							<p>Don't pay for licenses you don't need !</p>
						</div>
						<div class="right">
							<div id="hibou10" class="hd">
								<img src="layoutImg/hibou-clock.png" srcset="layoutImg/hibou-clock.png 1x, layoutImg/hibou-clock2x.png 2x" alt="">
							</div>
							<h4>Work time</h4>
							<p>We can help you setup up and configure your monitoring platform.</p>
						</div>
					</div>
				</div>
				<div class="bg-grey">
					<div class="container-small clearfix">
						<div class="text">
							<div class="chapeau">Contact</div>
							<h3>Try Hibouvision for free</h3>
							<p>Try Hibouvision with Bubo plan features for 15 days for free. For any questions, <a href="mailto:contact@hibouvision.com">feel free to contact us</a>.
						</div>
						<div id="formulaire">
							<?php if($status == 'succes'){ ?>
								<p class='succes'>Thanks for your message, <br>We will call you back as soon as possible&nbsp;! <br/><br/><a href="/#contact" onclick="location.reload();">Click here</a> to renvoyer send an other message.</p>
								<div class="ga-tracking-load" data-cat="Formulaire" data-action="Validation" data-label="Succes"></div>

							<?php }else{ ?>
								<?php
								if($status == 'erreur'){
									echo "<p class='error'><b>Oops! We do not send your request:</b><br/>";
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
								        <label for="nom">Name</label>
								        <input type="text" id="nom" name="nom" value='<?php echo $nom; ?>'>
								    </fieldset>
								    <fieldset class='<?php if($erreurEnt != '') echo 'error'; ?>'>
								        <label for="societe">Company</label>
								        <input type="text" id="societe" name='societe' value='<?php echo $ent; ?>'>
								    </fieldset>
								    <fieldset class='<?php if($erreurMail != '') echo 'error'; ?>'>
								        <label for="courriel">Email</label>
								        <input type="email" id="courriel" name='email' pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" value='<?php echo $mail; ?>'>
								    </fieldset>
								    <fieldset>
								        <label for="tel">Phone</label>
								        <input type="tel" id="tel" name='tel' value='<?php echo $tel; ?>'>
								    </fieldset>
								    <fieldset class='big-margin'>
								        <legend class="usage">Usage</legend><fieldset>
								        	<input type="radio" name="usage" id='clients' value='pour vos clients' checked='checked'><label class="label-radio" for='clients'>For your customers</label><input type="radio" name="usage" id='vous' value='pour vous'> <label class="label-radio" for='vous'>For your needs</label>
								        </fieldset>
								    </fieldset>
								    <fieldset class='<?php if($erreurMsg != '') echo 'error'; ?>'>
								        <label for="message">Message</label><textarea id="message" placeholder="Hi, I'd like to know more..." name="message"><?php echo $message; ?></textarea>
								    </fieldset>
								    <fieldset class='captcha <?php if($erreurCaptcha != '') echo 'error'; ?>'>
								    	<label for='captcha'>
								    		<?php echo $questions[$idQuestion]['question']; ?>
								    	</label><input type="text" name="captcha" value="">
								    </fieldset>
								    <button type='submit' name='submit' class="bouton">Send it !</button>
								</form>
							<?php } ?>
						</div>
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
						<li>Operated by </li>
						<li class="sf"><img src="layoutImg/sensor-factory1.png" alt="Sensor Factory"></li>
						<li class="sf"><a href="http://www.sensorfactory.eu/" target='_blank'><img src="layoutImg/SF.png" alt=""></a></li>
					</ul>
				</div>
			</footer>
		</div>

		<script src="js/libs/jquery-1.8.0.min.js" type="text/javascript"></script>
	  	<script src="js/libs/jquery.easing.1.3.js" type="text/javascript"></script>
  	    <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
  	    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.2/scrollreveal.min.js"></script>
	  	<!--<script type="text/javascript" src="js/seeThru.js"></script>-->
	  	<script src="js/script.js" type="text/javascript"></script>
	  	<script src="js/ga-tracking.js" type="text/javascript"></script>
	</body>
</html>

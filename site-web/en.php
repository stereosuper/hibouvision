<?php

$questions = array(
    1 => array(
        'question' => "Resolve the captcha : two + four = ?",
        'reponses' => array('6', 'six')
    ),
    2 => array(
        'question' => "Resolve the captcha : three + four = ?",
        'reponses' => array('7', 'sept')
    ),
    3 => array(
        'question' => "Resolve the captcha : two + two = ?",
        'reponses' => array('4', 'quatre')
    ),
    4 => array(
        'question' => "Resolve the captcha : five + two = ?",
        'reponses' => array('7', 'sept')
    ),
    5 => array(
        'question' => "Resolve the captcha : one + six = ?",
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
 		$erreurNom = 'Name is mandatory';
 		$status = 'erreur';
 	}
 	if(empty($ent)){
 		$erreurEnt = 'Company is mandatory';
 		$status = 'erreur';
 	}
 	if(empty($mail)){
 		$erreurMail = 'Email is mandatory';
 		$status = 'erreur';
 	}else{
 		if(!preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $mail)){
 			$erreurMail = "Email is invalid";
 			$status = 'erreur';
 		}
 	}
 	if(empty($message)){
 		$erreurMsg = 'Message is mandatory';
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
        $subject = "Nouveau message provenant de Hibouvision.com (english)";

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
 			$erreurEnvoi = "Sorry, server error. Please try again later";
 		}
 	}
}

?>

<!DOCTYPE html>
<html class="no-js" lang='en-EN'>
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width,initial-scale=1">
	  	<title>Hibouvision — Saas solution for iT systems monitoring 100% owl inclusive !</title>
	  	<meta name="description" content="Hibouvision is fully saas monitoring solution, 100% easy, 100% efficient... 100% owl inclusive!">
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

	<body class="home english">
		<header>
			<div class="container clearfix">
				<h1 id="logo"><a href='./'>Hibouvision</a></h1>
				<ul class="nav" id='mainMenu'>
					<li><a href="#simple" title="100% Easy">100% Easy</a></li>
					<li><a href="#efficace" title="100% Efficient">100% Efficient</a></li>
					<li><a href="#specifications" title="Specifications">Specifications</a></li>
					<li><a href="#formules" title="Offers">Offers</a></li>
					<li class="btn"><a href="#contact" title="Contact">Contact</a></li>
					<li id="flag" class="en"><a href="./" title="french version" class="lang">&nbsp;</a></li>
					<li id="connect"><a href="http://support.hibouvision.com" title="connexion" class="connect">&nbsp;</a></li>
				</ul>
			</div>
		</header>
		<div id="main">
			<div class="container">
				<div id="part1">
					<h2>Saas solution for iT systems monitoring<span id="chouette">100% owl inclusive!</span></h2>
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
				<p>Hibouvision is fully saas monitoring solution, 100% easy, 100% efficient... 100% owl inclusive!</p>
			</div>
			<div id="simple">
				<div class="infos">
					<div class="container-small clearfix">
						<div class="left">
							<div id="hibou1" class="hg">
								<img src="layoutImg/hibou-nuage.png" srcset="layoutImg/hibou-nuage.png 1x, layoutImg/hibou-nuage2x.png 2x" alt="">
							</div>
							<h4>Saas &amp; Secure</h4>
							<p>All the benefits of Saas with guaranteed optimal security.</p>
						</div>
						<div class="right">
							<div id="hibou2" class="hd">
								<img src="layoutImg/prtg.png" srcset="layoutImg/prtg.png 1x, layoutImg/prtg2x.png 2x" alt="">
							</div>
							<h4>PRTG based</h4>
							<p>Trusted every day by 150,000 Admins around the globe.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-grey">
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Easy</div>
						<h3>The interface of your dreams</h3>
						<p>Hibouvision is easy to use, fast, stylish and customizable: integrated mapping, tree views, graphics... Also available on mobile devices!</p>
						<a href="#contact" class="bouton btnScroll">Request a demo</a>
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
							<h4>Scalability &amp; Resilience</h4>
							<p>Hibouvision naturally grows according to your needs</p>
						</div>
					</div>
				</div>
				<div class="container-small padTopBot">
					<div class="text">
						<div class="chapeau">100% Efficient</div >
						<h3>A clear an comprehensive view</h3>
						<p>See at a glance the status and alerts of your devices.</p>
						<p>Single clic identification of incidents.</p>
						<a href="#contact" class="bouton btnScroll">Request a demo</a>
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
							<p>Become an <a href="#contact" class="btnScroll underline">Hibouvision's partner</a> or <a href="#contact" class="btnScroll underline">find the plan</a> that suits you.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-yellow">
				<div class="container-small">
					<div id="gauche" class='col'>
						<div class="chapeau">Specifications</div >
						<h3>No hidden costs!</h3>
						<p>All is included in a single Hibouvision release: no add-on, no hidden costs</p>
						<a href="#contact" class="bouton btnScroll">Request complete list</a>
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
						<li>This is a non-exhaustive list, <a href="#contact" class="btnScroll">contact us</a> to learn more!</li>
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
							<p>Hibouvision is supported 24/7 by monitoring experts.</p>
						</div>
					</div>
				</div>
				<div class="container-small">
					<div class="chapeau">Plans</div>
					<h3>To each his own Hibouvision</h3>
					<ul id="offre">
						<li id="scop">
							<div class="container-img">
								<img src="layoutImg/scop.jpg" alt="">
							</div>
							<ul>
								<li><h4>Scops</h4></li>
								<li class="gris">1 probe</li>
								<li>200 sensors</li>
								<li class="gris">Initial setup assistance</li>
								<li>Year round 24/7 monitoring</li>
							</ul>
						</li><!--
						--><li id="asio">
							<div class="container-img">
								<img src="layoutImg/asio.jpg" alt="">
							</div>
							<ul>
								<li><h4>Asio</h4></li>
								<li class="gris">2 probes</li>
								<li>450 sensors</li>
								<li class="gris">Initial setup assistance</li>
								<li>Year round 24/7 monitoring</li>
							</ul>
						</li><!--
						--><li id="bubo">
						<div class="container-img">
								<img src="layoutImg/bubo.jpg" alt="">
							</div>
							<ul>
								<li><h4>Bubo</h4></li>
								<li class="gris">3 probes</li>
								<li>1000 sensors</li>
								<li class="gris">Initial setup assistance</li>
								<li>Year round 24/7 monitoring</li>
							</ul>
						</li>
					</ul>
					<div id="option">
						<h4>Options</h4>
						<ul id="option-2">
							<li>Work time
								<span class="tooltip" title="
											Contact us anytime to adjust your monitoring :
											<ul>
											<br>
											<li>Probe setup and deployement</li>
											<li>Adding a device</li>
											<li>Adding a sensor</li>
											<li>Existing sensor optimization</li>
											<li>Map building</li>
											<li>Report building</li>
											<li>Notifications management</li>
											<li>etc.</li>
										</ul>">?</span>
							</li>
							<li class="gris">White brand: Hibouvision with your logo!</li>
						</ul>
					</div>
					<div id="btn"><a href="#contact" class="bouton btnScroll">Ask for our pricing</a></div>
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
							<p>Don't pay for licenses you don't need!</p>
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
							<h3>We are glad to answer you!</h3>
							<p>Want to know more? Need a demo or a test drive of all the functionnalities? We're here to help!</p>
						</div>
						<div id="formulaire">
							<?php if($status == 'succes'){ ?>
								<p class='succes'>Thanks for your message, We will call you back as soon as possible. <br/><br/><a href="en#contact" onclick="location.reload();">Click here</a> to send another message.</p>
							<?php }else{ ?>
								<?php
								if($status == 'erreur'){
									echo "<p class='error'><b>Oops! We could not send your message:</b><br/>";
									if($erreurNom != '') echo $erreurNom .'<br/>';
									if($erreurEnt != '') echo $erreurEnt .'<br/>';
									if($erreurMail != '') echo $erreurMail .'<br/>';
									if($erreurMsg != '') echo $erreurMsg .'<br/>';
									if($erreurCaptcha != '') echo $erreurCaptcha .'<br/>';
									if($erreurEnvoi != '') echo $erreurEnvoi;
									echo '</p><div class="ga-tracking-load" data-cat="Formulaire" data-action="Validation" data-label="Erreur"></div>';
								}
								?>
								<form method="post" action="#contact" method='POST'>
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
								        <label for="message">Message</label><textarea id="message" placeholder="Hi, I'd like to request a demo" name="message"><?php echo $message; ?></textarea>
								    </fieldset>
								     <fieldset class='captcha <?php if($erreurCaptcha != '') echo 'error'; ?>'>
								    	<label for='captcha'>
								    		<?php echo $questions[$idQuestion]['question']; ?>
								    	</label><input type="text" name="captcha" value="">
								    </fieldset>
								    <button type='submit' name='submit' class="bouton">Send it!</button>
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
						<li><a href="http://www.hibouvision.com/disclaimer">Disclaimer</a></li>
						<li><a href="http://stereosuper.fr" target='_blank'>Credit</a></li>
					</ul>
					<ul id="sensor">
						<li>Operated by </li>
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
	</body>
</html>

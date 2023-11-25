<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;

	
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Transform for Equity | An Antiracist Repair Group | Maryland</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="./assets/main.css" />
		<link rel="shortcut icon" href="./assets/butterfly.png">

		<script  type="text/javascript">
			function changePDF(linkref) {
				document.getElementById('pdf').data = linkref; 

			}

		</script>
	

	</head>
	<body class="is-preload">
	
		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


		<!-- Header -->
			<header id="header">
				<a class="logo" href="../index.shtml">Transform <span>For Equity</span> <img src="./assets/butterfly.png" style="vertical-align: text-bottom; float: left;" height="30px"/></a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="./home.php">Home</a></li>
				<li><a href="./redirect_res.php">Resources</a></li>
				<li><a href="./redirect_prof.php" style="font-weight: 300;"><i class="fas fa-user" style="color: white; padding-right: 1px;"></i>&nbsp;Profile</a></li>
				<li><a href="./logout.php" style="font-weight: 300;"><i class="fas fa-sign-out-alt" style="color: white; padding-right: 1px;"></i>&nbsp;Logout</a></li>

			</ul>
		</nav>

		<!-- Banner -->
		<section>
			<div id="bannerMini" style="text-align: center;">
				<div class="svgMini">
						 <object style="width: 100%;" data="../images/T4E_banner_v2.svg"></object> 
				</div>
						<div class="inner">
							<header class="heading major">
								<h1>Course Material</h1>
							</header>
						</div>
		
			</div>
		</section>
		

			<!-- One -->
			<section id="two" class="wrapper" style="z-index: 100; background-color: rgba(255,255,255,1); padding-bottom: 0%;">
				<div id="main" class="wrapper" style="padding: 2.5% 0% 5% 0%;">
					<div class="inner">
						<header class="heading major">
							<h2>Documents </h2>
						</header>

						<div style="height: 750px;">
							<div class="pdfDivLeft">
								<h5><b>Session One</b></h5>
									<ul>
										<li> 1.1 <a href="" onclick="return changePDF('./assets/Norms and Agreements 1.1 .pdf')"> Group Norms </a> </li>
										<li> 1.2 <a href="#" onclick="return changePDF('./assets/Social Identities A_D 1.2_BRS.pdf')"> Social Positions: Advantaged Disadvantaged (BRS) </a> </li>
										<li> 1.2 <a href="#" onclick="return changePDF('./assets/Social Positions A_D  1.2_BRSiJC.pdf')">  Social Positions: Advantaged Disadvantaged (BRSiJC) </a> </li>
										<li> 1.3 <a href="#" onclick="return changePDF('./assets/Intersecting Identities 1.3.pdf')"> Intersecting Identities  </a> </li>
									</ul> 

								<h5><b>Session Two </b></h5>
									<ul>
										<li> 2.1 <a href="#" onclick="return changePDF('./assets/Timeline 2.1.pdf')"> Timeline</a></li>
										<li> 2.2 <a href="#" onclick="return changePDF('./assets/Racial Segregation 2.1.pdf')"> Racial Segregation in My Life</a></li>
									</ul>

								<h5><b>Session Three </b></h5>
									<ul>
										<li> 3.1 <a href="#" onclick="return changePDF('./assets/Microaggression and Racist Abuse Handout 3.1.pdf')"> Understanding Microaggression and Racial Abuse </a></li>
									</ul>

								<h5><b>Session Four</b></h5>
									<ul>
										<li> 4.1 <a href="#" onclick="return changePDF('./assets/Racial Identity Narrative 4.1.pdf')"> Racial Identity Narrative</a></li>
									</ul>
									
								<h5><b>Session Six </b></h5>
									<ul>
										<li> 6.1 <a href="#" onclick="return changePDF('./assets/White Fragility and Racial Stamina 6.1 .pdf')"> White Fragility and Racial Stamina  </a></li>
									</ul>

								<!-- 
								<h5><b>Racial Identity</b></h5>
									<ul>
										<li>Worksheet: <a href="#" onclick="return changePDF('./gallery/docs/worksheet/RacialIdentityNarrative4.1.pdf')">4.1 Racial Identity Narrative</a></li>
									</ul>

								<h5><b>BRS Timeline</b></h5>
									<ul>
										<li>Handout: <a href="#" onclick="return changePDF('./gallery/docs/handouts/BRSTimeline.pdf')"> BRS Timeline</a></li>
									</ul> -->

							</div>

							<div class="pdfViewer">
								<object id="pdf" data="./assets/Norms and Agreements 1.1 .pdf" type="application/pdf">
								</object>
							</div>
					</div>


						</div>
				</div>
			</section>

		<!-- BWB Banner Message -->
		<section id ="build" style="z-index: 100; background-color: rgba(255,255,255,1);">
			<div class="wrapper style1"  style="padding-bottom: 1.5%">
				<div class="inner";>
					<div class="features">
						<div class="feature">
							<header class="heading">
								<h2>Believe</h2>
							</header>
							<p>While growth requires discomfort, it also requires care and dignity.</p><br>
						</div>
						<div class="feature">
							<header class="heading">
								<h2>Work</h2>
							</header>
							<p>The work of being antiracist has a beginning, it does not have an end.</p><br>

						</div>
						<div class="feature">
							<header class="heading">
								<h2>Build</h2>
							</header>
							<p>The ripples of antiracist change can positively impact entire communities.</p>
						</div>
					</div>
				</div>
			</div>
		</section>	

		<!-- Footer -->
		<section id="footer">
			<div class="inner">
				<ul class="icons">
					<li><a href="https://www.linkedin.com/in/deitra-reiser-1aa71117" class="icon brands fa-linkedin"><span class="label">LinkedIn</span></a></li>
					<li><a href="https://www.instagram.com/transformforequity/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://goo.gl/maps/wJLPuEocsqHvUBvR9" class="icon solid fa-map-marker-alt"><span class="label">Location</span></a></li>
					<li><a href="tel:+16672021586" class="icon solid fa-phone"><span class="label">Phone</span></a></li>
					<li><a href="mailto:info@transformforequity.com" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
				</ul>
			</div>
			<div class="copyright">
				&copy; Transform For Equity - All rights reserved. 
			</div>
			<div>
				<img src="./assets/butterfly.png" style="vertical-align: text-bottom; float: center;" height="30px"/>
			</div>
		</section>

		<!-- PDF Viewer Clicker-->



		<!-- Scripts -->
			<script src="./js/browser.min.js"></script>
			<script src="./js/breakpoints.min.js"></script>
			<script src="./js/util.js"></script>
			<script src="./js/main.js"></script>
			<script src="./js/script.js"></script>
	</body>
</html>
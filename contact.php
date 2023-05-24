<?php
include "classes/Database.php";

$database = new Database();
$database = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Blogry - <?php
					?></title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/A.bootstrap.min.css%2bfont-awesome.min.css%2bstyle.css%2cMcc.eUDfyxWezC.css.pagespeed.cf.nOx53OB50v.css" />

</head>

<body>

	<header id="header">

		<?php include "common/header.php"; ?>

		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">Contacts</h1>
						<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>
		</div>

	</header>


	<div class="section">

		<div class="container">

			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Contact Information</h2>
						</div>
						<p>Malis debet quo et, eam an lorem quaestio. Mea ex quod facer decore, eu nam mazim postea. Eu
							deleniti pertinacia ius. Ad elitr latine eam, ius sanctus eleifend no, cu primis graecis
							comprehensam eum. Ne vim prompta consectetuer, etiam signiferumque ea eum.</p>
						<ul class="contact">
							<li><i class="fa fa-phone"></i> 202-555-0194</li>
							<li><i class="fa fa-envelope"></i> <a href="#"><span class="__cf_email__" data-cfemail="3251535e5e5b5772575f535b5e1c515d5f">[email&#160;protected]</span></a>
							</li>
							<li><i class="fa fa-map-marker"></i> 123 6th St.Melbourne, FL 32904</li>
						</ul>
					</div>
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Mail us</h2>
						</div>
						<form>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="subject" placeholder="Subject">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Message"></textarea>
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-4">

				<?php include "common/social_media.php"; ?>
				<?php include "common/newsletter.php"; ?>

				</div>
			</div>

		</div>

	</div>


	<?php include "common/footer.php"; ?>


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js%2bjquery.stellar.min.js%2bmain.js.pagespeed.jc.3rOnXB4bzT.js"></script>
	<script>
		eval(mod_pagespeed_cH5hWjWfkw);
	</script>
	<script>
		eval(mod_pagespeed_9ILxvfFQhZ);
	</script>
	<script>
		eval(mod_pagespeed_p$qlVBRQrg);
	</script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
</body>
</html>
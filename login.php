<?php
session_start();
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
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</head>

<body>

	<header id="header">

		<?php include "common/header.php"; ?>

		<div class="page-header">
			<div class="page-header-bg" style="background-image:url(img/xheader-2.jpg.pagespeed.ic.-moKuxnJQO.jpg)" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">Register / Login</h1>
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
							<h2 class="title">Register</h2>
						</div>
						<form action="" method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" id="name" placeholder="Name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="email" id="email" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" id="username" placeholder="Username">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="password" id="password" placeholder="Password">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="password" id="confirm_password" placeholder="Confirm Password">
									</div>
								</div>
								<div class="col-md-12">
									<button class="primary-button" type="submit" id="register_user">Register</button>
								</div>
							</div>
						</form>
					</div>
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Login</h2>
						</div>
						<form action="" method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" id="usernames" placeholder="Username">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="password" id="passwords" placeholder="Password">
									</div>
								</div>
								<div class="col-md-12">
									<button class="primary-button" type="submit" id="login_user">Login</button>
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
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script src="admin/action.js"></script>

</body>


</html>
<?php  ?>
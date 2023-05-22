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

		<div id="nav">

			<div id="nav-top">
				<div class="container">

					<ul class="nav-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>


					<div class="nav-logo">
						<a href="index.php" class="logo"><img src="img/xlogo.png.pagespeed.ic.h7IGomVBXp.png" alt=""></a>
					</div>


					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form>
								<input class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>

				</div>
			</div>


			<div id="nav-bottom">
				<div class="container">

					<ul class="nav-menu">
						<li><a href="index.php">Home</a></li>
						<?php
						$sql = "SELECT * FROM category";
						$query = $database->prepare($sql);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						if ($query->rowCount() > 0) {
							foreach ($results as $category) {
						?>
								<li><a href="category.php?cat_id=<?php echo $category->id ?>"><?php echo $category->category_name; ?></a></li>
						<?php }
						} ?>
					</ul>

				</div>
			</div>


			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="index.php">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
							<?php
							$sql = "SELECT * FROM category";
							$query = $database->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $category) {
							?>
									<li><a href="category.php?cat_id=<?php echo $category->id ?>"><?php echo $category->category_name ?></a></li>
							<?php }
							} ?>
						</ul>
					</li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contacts</a></li>
					<li><a href="advertise.php">Advertise</a></li>
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>

		</div>


		<div class="page-header">
			<div class="page-header-bg" style="background-image:url(img/xheader-2.jpg.pagespeed.ic.-moKuxnJQO.jpg)" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<?php
						$cat_id = intval($_GET['cat_id']);
						$sql = "SELECT category_name FROM category WHERE id = :cat_id";
						$query = $database->prepare($sql);
						$query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						if ($query->rowCount() > 0) {
							foreach ($results as $category) {
						?>
								<h1 class="text-uppercase"><?php echo $category->category_name; ?></h1>
						<?php }
						} ?>
					</div>
				</div>
			</div>
		</div>

	</header>


	<div class="section">

		<div class="container">

			<div class="row">
				<div class="col-md-8">
					<?php
					$cat_id = intval($_GET['cat_id']);
					$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.cat_id, a.main_image, a.long_desc, a.views, 
							a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
							FROM posts a 
							INNER JOIN category b ON a.cat_id = b.id 
							WHERE b.id = :cat_id ORDER BY a_id DESC LIMIT 1";
					$query = $database->prepare($sql);
					$query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					if ($query->rowCount() > 0) {
						foreach ($results as $first_post) {

					?>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php?post_id=<?php echo $first_post->a_id; ?>"><img src="admin/assets/images/post_images/<?php echo $first_post->main_image; ?>" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.php?cat_id=<?php echo $first_post->cat_id; ?>"><?php echo $first_post->category_name; ?></a>
									</div>
									<h3 class="post-title title-lg"><a href="blog-post.php?post_id=<?php echo $first_post->a_id; ?>"><?php echo $first_post->title; ?></a></h3>
									<ul class="post-meta">
										<li><a href="author.php"><?php echo $first_post->author; ?></a></li>
										<li><?php echo $first_post->created_at; ?></li>
									</ul>
								</div>
							</div>
					<?php }
					} ?>
					<div class="row">
						<?php
						$cat_id = intval($_GET['cat_id']);
						$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.cat_id, a.main_image, a.long_desc, a.views, 
							a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
							FROM posts a 
							INNER JOIN category b ON a.cat_id = b.id 
							WHERE b.id = :cat_id ORDER BY a_id DESC LIMIT 1, 2";
						$query = $database->prepare($sql);
						$query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);

						if ($query->rowCount() > 0) {
							foreach ($results as $second_post) {

						?>

								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="blog-post.php?post_id=<?php echo $second_post->a_id; ?>"><img src="admin/assets/images/post_images/<?php echo $second_post->main_image; ?>" alt=""></a>
										<div class="post-body">
											<div class="post-category">
												<a href="category.php?cat_id=<?php echo $second_post->cat_id; ?>"><?php echo $second_post->category_name; ?></a>
											</div>
											<h3 class="post-title title-lg"><a href="blog-post.php?post_id=<?php echo $second_post->a_id; ?>"><?php echo $second_post->title; ?></a></h3>
											<ul class="post-meta">
												<li><a href="author.php"><?php echo $second_post->author; ?></a></li>
												<li><?php echo $second_post->created_at; ?></li>
											</ul>
										</div>
									</div>
								</div>
						<?php }
						} ?>

						<div class="clearfix visible-md visible-lg"></div>

						<?php
						$cat_id = intval($_GET['cat_id']);
						$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.cat_id, a.main_image, a.long_desc, a.views, 
							a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
							FROM posts a 
							INNER JOIN category b ON a.cat_id = b.id 
							WHERE b.id = :cat_id ORDER BY a_id DESC LIMIT 3, 2";
						$query = $database->prepare($sql);
						$query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);

						if ($query->rowCount() > 0) {
							foreach ($results as $third_post) {

						?>

								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="blog-post.php?post_id=<?php echo $third_post->a_id; ?>"><img src="admin/assets/images/post_images/<?php echo $third_post->main_image; ?>" alt=""></a>
										<div class="post-body">
											<div class="post-category">
												<a href="category.php?cat_id=<?php echo $third_post->cat_id; ?>"><?php echo $third_post->category_name; ?></a>
											</div>
											<h3 class="post-title title-lg"><a href="blog-post.php?post_id=<?php echo $third_post->a_id; ?>"><?php echo $third_post->title; ?></a></h3>
											<ul class="post-meta">
												<li><a href="author.php"><?php echo $third_post->author; ?></a></li>
												<li><?php echo $third_post->created_at; ?></li>
											</ul>
										</div>
									</div>
								</div>
						<?php }
						} ?>
					</div>

					<?php
					$cat_id = intval($_GET['cat_id']);
					$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.cat_id, a.main_image, a.short_desc, a.views, 
							a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
							FROM posts a 
							INNER JOIN category b ON a.cat_id = b.id 
							WHERE b.id = :cat_id ORDER BY a_id DESC LIMIT 5, 5";
					$query = $database->prepare($sql);
					$query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					if ($query->rowCount() > 0) {
						foreach ($results as $remain_post) {

					?>
							<div class="post post-row">
								<a class="post-img" href="blog-post.php?post_id=<?php echo $remain_post->a_id; ?>"><img src="admin/assets/images/post_images/<?php echo $remain_post->main_image; ?>" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.php?cat_id=<?php echo $remain_post->cat_id; ?>"><?php echo $remain_post->category_name; ?></a>

									</div>
									<h3 class="post-title"><a href="blog-post.php?post_id=<?php echo $remain_post->a_id; ?>"><?php echo $remain_post->title; ?></a></h3>
									<ul class="post-meta">
										<li><a href="author.php"><?php echo $remain_post->author; ?></a></li>
										<li><?php echo $remain_post->created_at; ?></li>
									</ul>
									<p><?php echo $remain_post->short_desc; ?></p>
								</div>
							</div>
					<?php }
					} ?>

					<!-- <div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="img/xpost-6.jpg.pagespeed.ic.5ZR6CmnNct.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Fashion</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
									error sit</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
						</div>
					</div>


					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="img/xpost-8.jpg.pagespeed.ic.DsYykWjqaS.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Fashion</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei
									qui</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
						</div>
					</div>


					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="img/xpost-12.jpg.pagespeed.ic.1W1TIdVgRO.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
									error sit</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
						</div>
					</div>


					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="img/xpost-7.jpg.pagespeed.ic.Q8au6gIx2I.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Health</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris
									definitionem quo cu?</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
						</div>
					</div> -->

					<div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>
				</div>
				<div class="col-md-4">

					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="img/xad-3.jpg.pagespeed.ic.u-1xzHBGY2.jpg" alt="">
						</a>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								<?php
								$sql_cat = "SELECT a.category_name, count(*) as count_post, a.id as cat_id FROM category a
									INNER JOIN posts b ON b.cat_id = a.id GROUP BY a.category_name";
								$cat_query = $database->prepare($sql_cat);
								$cat_query->execute();

								$count_posts = $cat_query->fetchAll(PDO::FETCH_OBJ);
								// print_r($prev_post);
								if ($cat_query->rowCount() > 0) {
									foreach ($count_posts as $count_all) {
								?>
										<li><a href="category.php?cat_id=<?php echo $count_all->cat_id; ?>"><?php echo $count_all->category_name ?> <span><?php echo $count_all->count_post ?></span></a></li>
								<?php }
								} ?>
							</ul>
						</div>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>You can subscribe to our newsletter and get lastest updates...</p>
								<input class="input" placeholder="Enter Your Email" id="email">
								<button class="primary-button" id="newsletter">Subscribe</button>
							</form>
						</div>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						<?php
						$views = 20;
						$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.main_image, a.long_desc, a.views, 
										a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
										FROM posts a 
										INNER JOIN category b ON a.cat_id = b.id WHERE a.views > :views";
						$query_4 = $database->prepare($sql);
						$query_4->bindParam(':views', $views, PDO::PARAM_INT);
						$query_4->execute();
						$views = $query_4->fetchAll(PDO::FETCH_OBJ);

						if ($query_4->rowCount() > 0) {
							foreach ($views as $view) {
						?>

								<div class="post post-widget">
									<a class="post-img" href="blog-post.php?post_id=<?php echo $view->a_id ?>"><img src="admin/assets/images/post_images/<?php echo $view->main_image; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="category.php?cat_id=<?php echo $view->cat_id ?>"><?php echo $view->category_name; ?></a>
										</div>
										<h3 class="post-title"><a href="blog-post.php?post_id=<?php echo $view->a_id ?>"><?php echo $view->title; ?></a></h3>
									</div>
								</div>

						<?php }
						} ?>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Instagram</h2>
						</div>
						<div class="galery-widget">
							<ul>
								<li><a href="#"><img src="img/xgalery-1.jpg.pagespeed.ic.f5TghSTZd2.jpg" alt=""></a>
								</li>
								<li><a href="#"><img src="img/xgalery-2.jpg.pagespeed.ic.IASz6wUrfh.jpg" alt=""></a>
								</li>
								<li><a href="#"><img src="img/xgalery-3.jpg.pagespeed.ic.UrbsuynhXi.jpg" alt=""></a>
								</li>
								<li><a href="#"><img src="img/xgalery-4.jpg.pagespeed.ic.Vlmjb8Qaia.jpg" alt=""></a>
								</li>
								<li><a href="#"><img src="img/xgalery-5.jpg.pagespeed.ic.k5tPdQYweI.jpg" alt=""></a>
								</li>
								<li><a href="#"><img src="img/xgalery-6.jpg.pagespeed.ic.c4g0-99fKR.jpg" alt=""></a>
								</li>
							</ul>
						</div>
					</div>


					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.dyq7D2snSZ.jpg" alt="">
						</a>
					</div>

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
<?php  ?>
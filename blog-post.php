<?php
include "classes/Database.php";

$database = new Database();
$database = $database->getConnection();


$post_id = intval($_GET['post_id']);
$sql = "SELECT a.title, b.category_name, b.id as cat_id, a.cat_id, a.main_image, a.long_desc, a.views, 
		a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
		FROM posts a 
		INNER JOIN category b ON a.cat_id = b.id 
		WHERE a.id = :post_id";
$query = $database->prepare($sql);
$query->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
	foreach ($results as $main_post) {

?>
		<!DOCTYPE html>
		<html lang="en">


		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>Blogry - <?php ?></title>

			<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

			<link type="text/css" rel="stylesheet" href="css/A.bootstrap.min.css%2bfont-awesome.min.css%2bstyle.css%2cMcc.eUDfyxWezC.css.pagespeed.cf.nOx53OB50v.css" />
		</head>

		<body>

			<header id="header">

				<?php include "common/header.php"; ?>
				<div id="post-header" class="page-header">
					<div class="page-header-bg" style="background-image: url('admin/assets/images/post_images/<?php echo $main_post->main_image; ?>');" data-stellar-background-ratio="0.5"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-10">
								<div class="post-category">
									<a href="category.php?cat_id=<?php echo $main_post->cat_id; ?>"><?php echo $main_post->category_name; ?></a>
								</div>
								<h1><?php echo ucfirst($main_post->title); ?></h1>
								<ul class="post-meta">
									<li><a href="author.html"><?php echo $main_post->author; ?></a></li>
									<li></i> <?php echo $main_post->created_at; ?></li>
									<!-- <li><i class="fa fa-comments"></i> 3</li> -->
									<li><i class="fa fa-eye"></i> <?php echo $main_post->views; ?></li>
								</ul>
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
								<div class="post-share">
									<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
									<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
									<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
									<a href="#"><i class="fa fa-envelope"></i><span>Email</span></a>
								</div>
							</div>


							<div class="section-row">
								<p><?php echo $main_post->long_desc ?></p>

								<!-- <h3>Ea vix periculis sententiae, ea blandit pericula abhorreant pri.</h3>
						<p>Lorem ipsum dolor sit amet, mea ad idque detraxit, cu soleat graecis invenire eam. Vidisse
							suscipit liberavisse has ex, vocibus patrioque vim et, sed ex tation reprehendunt. Mollis
							volumus no vix, ut qui clita habemus, ipsum senserit est et. Ut has soluta epicurei
							mediocrem, nibh nostrum his cu, sea clita electram reformidans an.</p>
						<p>Est in saepe accusam luptatum. Purto deleniti philosophia eum ea, impetus copiosae id mel.
							Vis at ignota delenit democritum, te summo tamquam delicata pro. Utinam concludaturque et
							vim, mei ullum intellegam ei. Eam te illum nostrud, suas sonet corrumpit ea per. Ut sea
							regione posidonium. Pertinax gubergren ne qui, eos an harum mundi quaestio.</p>
						<figure class="pull-right">
							<img src="img/xmedia-1.jpg.pagespeed.ic.p8pxFeqT-_.jpg" alt="">
							<figcaption>Lorem ipsum dolor sit amet, mea ad idque detraxit,</figcaption>
						</figure>
						<p>Nihil persius id est, iisque tincidunt abhorreant no duo. Eripuit placerat mnesarchum ius at,
							ei pro laoreet invenire persecuti, per magna tibique scriptorem an. Aeque oportere
							incorrupte ius ea, utroque erroribus mel in, posse dolore nam in. Per veniam vulputate
							intellegam et, id usu case reprimique, ne aperiam scaevola sed. Veritus omnesque qui ad. In
							mei admodum maiorum iracundia, no omnis melius eum, ei erat vivendo his. In pri nonumes
							suscipit.</p>
						<p>Sit nulla quidam et, eam ea legimus deserunt neglegentur. Et veri nostrud vix, meis minimum
							atomorum ex sea, stet case habemus mea no. Ut dignissim dissentiet his, mei ea delectus
							delicatissimi, debet dissentiunt te duo. Sonet partiendo et qui, pro et veri solet singulis.
							Vidit viderer eleifend ad nam. Minimum eligendi suscipit ius et, vis ex laoreet detracto
							scripserit, at sumo sale solum pro.</p>
						<blockquote class="blockquote">
							<p>Ei prima graecis consulatu vix, per cu corpora qualisque voluptaria. Bonorum moderatius
								in per, ius cu albucius voluptatum. Ne ius torquatos dissentiunt. Brute illum utroque eu
								quo. Cu tota mediocritatem vis, aliquip cotidieque eu ius, cu lorem suscipit eleifend
								sit.</p>
							<footer class="blockquote-footer">John Doe</footer>
						</blockquote>
						<p>Mei cu diam sonet audiam, his ad impetus fuisset indoctum. Te sit altera qualisque, stet
							suavitate ne vel. Euismod suavitate duo eu, habemus rationibus neglegentur ei qui. Debet
							omittam ad usu, ex vero feugait oporteat eos, id usu sint numquam sententiae.</p>
						<figure>
							<img src="img/xmedia-2.jpg.pagespeed.ic.mTffUzoO2T.jpg" alt="">
						</figure>
						<h3>Sit nulla quidam et, eam ea legimus deserunt neglegentur.</h3>
						<p>No possim singulis sea, dolores salutatus interpretaris eam ad. An singulis postulant his, an
							inermis urbanitas mel. Wisi veri noster eu est, diam ridens eum in. Omnium imperdiet
							patrioque quo in, est sumo persecuti abhorreant ei. Sed feugiat iracundia id, inermis
							percipit eu has.</p>
						<p>In vidit homero ullamcorper his, ea mea senserit constituto, et alia idque congue sit. Postea
							percipit his ne. Probo movet noluisse in nam, sed ex utroque inermis corrumpit, oratio
							tation vix at. Usu aperiri assentior at, eam et melius iudicabit pertinacia.</p> -->

							</div>

							<div class="section-row">
								<div class="post-nav">
									<?php
									$post_id = intval($_GET['post_id']);
									$cat_id = $main_post->cat_id;
									$sql_2 = "SELECT id,title,main_image FROM posts WHERE id < :post_id 
										AND cat_id=:cat_id ORDER BY id DESC LIMIT 1";
									$query_2 = $database->prepare($sql_2);
									$query_2->bindParam(':post_id', $post_id, PDO::PARAM_INT);
									$query_2->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
									$query_2->execute();

									$prev_post = $query_2->fetchAll(PDO::FETCH_OBJ);
									// print_r($prev_post);
									if ($query_2->rowCount() > 0) {
										foreach ($prev_post as $prev) {
									?>
											<div class="prev-post">
												<a class="post-img" href="blog-post.php?post_id=<?php echo $prev->id ?>"><img src="admin/assets/images/post_images/<?php echo $prev->main_image; ?>" alt=""></a>
												<h3 class="post-title"><a href="blog-post.php?post_id=<?php echo $prev->id ?>"><?php echo $prev->title; ?></a></h3>
												<span>Previous post</span>
											</div>
									<?php }
									} ?>

									<?php
									$post_id = intval($_GET['post_id']);
									$cat_id = $main_post->cat_id;
									$sql_3 = "SELECT id,title,main_image FROM posts WHERE id > :post_id 
									AND cat_id=:cat_id ORDER BY id ASC LIMIT 1";
									$query_3 = $database->prepare($sql_3);
									$query_3->bindParam(':post_id', $post_id, PDO::PARAM_INT);
									$query_3->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
									$query_3->execute();

									$next_post = $query_3->fetchAll(PDO::FETCH_OBJ);
									// print_r($next_post);
									if ($query_3->rowCount() > 0) {
										foreach ($next_post as $next) {
									?>
											<div class="next-post">
												<a class="post-img" href="blog-post.php?post_id=<?php echo $next->id ?>"><img src="admin/assets/images/post_images/<?php echo $next->main_image; ?>" alt=""></a>
												<h3 class="post-title"><a href="blog-post.php?post_id=<?php echo $next->id ?>"><?php echo $next->title; ?></a>
												</h3>
												<span>Next post</span>
											</div>
									<?php }
									} ?>

								</div>

							</div>


							<div class="section-row">
								<div class="section-title">
									<h3 class="title">About <a href="author.html">John Doe</a></h3>
								</div>
								<div class="author media">
									<div class="media-left">
										<a href="author.html">
											<img class="author-img media-object" src="img/xavatar-1.jpg.pagespeed.ic.cijs_I3ysR.jpg" alt="">
										</a>
									</div>
									<div class="media-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
											incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
											exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>


							<div>
								<div class="section-title">
									<h3 class="title">Related Posts</h3>
								</div>
								<div class="row">

									<div class="col-md-4">
										<div class="post post-sm">
											<a class="post-img" href="blog-post.html"><img src="img/xpost-4.jpg.pagespeed.ic.Md-c_N8v5Z.jpg" alt=""></a>
											<div class="post-body">
												<div class="post-category">
													<a href="category.html">Health</a>
												</div>
												<h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos,
														vivendo periculis ei qui</a></h3>
												<ul class="post-meta">
													<li><a href="author.html">John Doe</a></li>
													<li>20 April 2018</li>
												</ul>
											</div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="post post-sm">
											<a class="post-img" href="blog-post.html"><img src="img/xpost-6.jpg.pagespeed.ic.5ZR6CmnNct.jpg" alt=""></a>
											<div class="post-body">
												<div class="post-category">
													<a href="category.html">Fashion</a>
													<a href="category.html">Lifestyle</a>
												</div>
												<h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit
														tincidunt. Cum id ullum laboramus persequeris.</a></h3>
												<ul class="post-meta">
													<li><a href="author.html">John Doe</a></li>
													<li>20 April 2018</li>
												</ul>
											</div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="post post-sm">
											<a class="post-img" href="blog-post.html"><img src="img/xpost-7.jpg.pagespeed.ic.Q8au6gIx2I.jpg" alt=""></a>
											<div class="post-body">
												<div class="post-category">
													<a href="category.html">Health</a>
													<a href="category.html">Lifestyle</a>
												</div>
												<h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent
														cum, labitur persequeris definitionem quo cu?</a></h3>
												<ul class="post-meta">
													<li><a href="author.html">John Doe</a></li>
													<li>20 April 2018</li>
												</ul>
											</div>
										</div>
									</div>

								</div>
							</div>


							<div class="section-row">
								<div class="section-title">
									<h3 class="title">3 Comments</h3>
								</div>
								<div class="post-comments">

									<div class="media">
										<div class="media-left">
											<img class="media-object" src="img/avatar-2.jpg" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h4>John Doe</h4>
												<span class="time">5 min ago</span>
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
												incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
												nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
											<a href="#" class="reply">Reply</a>

											<div class="media media-author">
												<div class="media-left">
													<img class="media-object" src="img/xavatar-1.jpg.pagespeed.ic.cijs_I3ysR.jpg" alt="">
												</div>
												<div class="media-body">
													<div class="media-heading">
														<h4>John Doe</h4>
														<span class="time">5 min ago</span>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
														tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
														veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
														commodo consequat.</p>
													<a href="#" class="reply">Reply</a>
												</div>


												<div class="media media-author">
													<div class="media-left">
														<img class="media-object" src="img/xavatar-1.jpg.pagespeed.ic.cijs_I3ysR.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="media-heading">
															<h4>John Doe</h4>
															<span class="time">5 min ago</span>
														</div>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
															tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
															veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
															commodo consequat.</p>
														<a href="#" class="reply">Reply</a>
													</div>

												</div>


											</div>

										</div>
									</div>


									<div class="media">
										<div class="media-left">
											<img class="media-object" src="img/xavatar-3.jpg.pagespeed.ic.lcbbvlzFc4.jpg" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h4>John Doe</h4>
												<span class="time">5 min ago</span>
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
												incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
												nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
											<a href="#" class="reply">Reply</a>
										</div>
									</div>

								</div>
							</div>


							<div class="section-row">
								<div class="section-title">
									<h3 class="title">Leave a reply</h3>
								</div>
								<form class="post-reply">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="input" name="message" placeholder="Message" id="comment"></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input class="input" type="text" name="name" placeholder="Name" id="name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input class="input" type="email" name="email" placeholder="Email" id="email">
											</div>
										</div>
										<div class="col-md-12">
											<button class="primary-button">Submit</button>
										</div>
									</div>
								</form>
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
			<script src="/admin/action.js"></script>
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
<?php }
} ?>
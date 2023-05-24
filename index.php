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

    <title>Blogry - <?php ?></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/A.bootstrap.min.css%2bfont-awesome.min.css%2bstyle.css%2cMcc.eUDfyxWezC.css.pagespeed.cf.nOx53OB50v.css" />

</head>

<body>
    <header id="header">

        <?php include "common/header.php"; ?>

    </header>

    <div class="section">

        <div class="container">

            <div id="hot-post" class="row hot-post">
                <div class="col-md-8 hot-post-left">

                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="img/xhot-post-1.jpg.pagespeed.ic.FvhRkvGSyA.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo
                                    periculis ei qui</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 hot-post-right">

                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="img/hot-post-2.jpg" alt=""></a>
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
                        </div>
                    </div>


                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="img/xhot-post-3.jpg.pagespeed.ic.IUSrD64f4i.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Fashion</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Recent posts</h2>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-1.jpg.pagespeed.ic.k7QUj7kL3E.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Travel</a>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste
                                            natus error sit</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="blog-post.html"><img src="img/post-2.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Technology</a>
                                        <a href="category.html">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur
                                            persequeris definitionem quo cu?</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-md visible-lg"></div>

                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="blog-post.html"><img src="img/post-4.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Health</a>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo
                                            periculis ei qui</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="blog-post.html"><img src="img/post-7.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Health</a>
                                        <a href="category.html">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste
                                            natus error sit</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Lifestyle</h2>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-9.jpg.pagespeed.ic.msLv82-_nb.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
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
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-8.jpg.pagespeed.ic.DsYykWjqaS.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Fashion</a>
                                        <a href="category.html">Lifestyle</a>
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
                                <a class="post-img" href="blog-post.html"><img src="img/post-11.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Technology</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="blog-post.html">Sed ut perspiciatis, unde
                                            omnis iste natus error sit</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Fashion & Travel</h2>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-10.jpg.pagespeed.ic.QQ_5XVcin0.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Travel</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum,
                                            labitur persequeris definitionem quo cu?</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-12.jpg.pagespeed.ic.1W1TIdVgRO.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="blog-post.html">Sed ut perspiciatis, unde
                                            omnis iste natus error sit</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-13.jpg.pagespeed.ic.3HWI31UtTH.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Travel</a>
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

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Technology & Health</h2>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/post-4.jpg" alt=""></a>
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
                                <a class="post-img" href="blog-post.html"><img src="img/xpost-1.jpg.pagespeed.ic.k7QUj7kL3E.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Travel</a>
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
                                <a class="post-img" href="blog-post.html"><img src="img/post-3.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum,
                                            labitur persequeris definitionem quo cu?</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">

                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="img/ad-3.jpg" alt="">
                        </a>
                    </div>


                    <?php include "common/social_media.php"; ?>


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


                    <?php include "common/newsletter.php"; ?>


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

                </div>
            </div>

        </div>

    </div>


    <div class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-12 section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="img/xad-2.jpg.pagespeed.ic.cTWeR88ZmO.jpg" alt="">
                    </a>
                </div>

            </div>

        </div>

    </div>


    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Lifestyle</h2>
                    </div>

                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-6.jpg.pagespeed.ic.5ZR6CmnNct.jpg" alt=""></a>
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
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Fashion</h2>
                    </div>

                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-5.jpg.pagespeed.ic.kzmhhTr_u4.jpg" alt=""></a>
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
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Health</h2>
                    </div>

                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-9.jpg.pagespeed.ic.msLv82-_nb.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-md-4">

                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/widget-1.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei
                                    qui</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-2.jpg.pagespeed.ic.T-nm9p9-ZV.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Technology</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-3.jpg.pagespeed.ic.ALmuwkx9kZ.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
                                    error sit</a></h3>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-4.jpg.pagespeed.ic.4be-iEbdqI.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Health</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris
                                    definitionem quo cu?</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-5.jpg.pagespeed.ic.KZmCL3-b0T.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Health</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
                                    error sit</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-6.jpg.pagespeed.ic.VPwwyTc1AA.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Fashion</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei
                                    qui</a></h3>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-8.jpg.pagespeed.ic.TyJjr8XSGg.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/widget-9.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Technology</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei
                                    qui</a></h3>
                        </div>
                    </div>


                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/widget-10.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
                                    error sit</a></h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-13.jpg.pagespeed.ic.3HWI31UtTH.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                        </div>
                    </div>


                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-1.jpg.pagespeed.ic.k7QUj7kL3E.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
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
                        <a class="post-img" href="blog-post.html"><img src="img/xpost-5.jpg.pagespeed.ic.kzmhhTr_u4.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
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
                        <a class="post-img" href="blog-post.html"><img src="img/post-7.jpg" alt=""></a>
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
                    </div>

                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Instagram</h2>
                        </div>
                        <div class="galery-widget">
                            <ul>
                                <li><a href="#"><img src="img/galery-1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/galery-2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/xgalery-3.jpg.pagespeed.ic.UrbsuynhXi.jpg" alt=""></a>
                                </li>
                                <li><a href="#"><img src="img/galery-4.jpg" alt=""></a></li>
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
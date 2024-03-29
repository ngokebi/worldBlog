<div id="nav">

    <div id="nav-top">
        <div class="container">

            <ul class="nav-social">
                <li><a href="https://www.faebook.com/blogry" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.twitter.com/blogry" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.google.com/blogry" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://www.instagram.com/blogry" target="_blank"><i class="fa fa-instagram"></i></a></li>
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

                <li class="has-dropdown">
                    <a href="index.php">Home</a>
                    <div class="dropdown">
                        <div class="dropdown-body">
                            <ul class="dropdown-list">
                                <li><a href="author.php">Author page</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="contact.php">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="has-dropdown megamenu">
                    <a href="">Category</a>
                    <div class="dropdown tab-dropdown">
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="tab-nav">
                                    <?php
                                    $sql = "SELECT * FROM category";
                                    $query = $database->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $category) {
                                    ?>
                                            <li <?php if ($category->id == 1) { ?> class="active" <?php } else { ?> <?php } ?>><a data-toggle="tab" href="#<?php echo $category->id ?>"><?php echo $category->category_name ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <div class="dropdown-body tab-content">
                                    <?php
                                    $sql = "SELECT * FROM category";
                                    $query = $database->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $category) {
                                    ?>
                                            <div id="<?php echo $category->id ?>" <?php if ($category->id == 1) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade in" <?php } ?>>
                                                <div class="row">

                                                    <?php
                                                    $cat_id = $category->id;
                                                    $sql = "SELECT a.title, a.slug, b.category_name, b.id as cat_id, a.short_desc, a.long_desc, a.cat_id, a.main_image,
                                                                a.id as a_id, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
                                                                FROM posts a 
                                                                INNER JOIN category b ON a.cat_id = b.id 
                                                                WHERE a.cat_id = :cat_id ORDER BY a.id DESC LIMIT 3";
                                                    $query = $database->prepare($sql);
                                                    $query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $posts) {
                                                    ?>
                                                            <div class="col-md-4">
                                                                <div class="post post-sm">
                                                                    <a class="post-img" href="blog-post.php?post_id=<?php echo $posts->a_id; ?>"><img src="admin/assets/images/post_images/<?php echo $posts->main_image; ?>" alt=""></a>
                                                                    <div class="post-body">
                                                                        <div class="post-category">
                                                                            <a href="category.php?cat_id=<?php echo $posts->cat_id; ?>"><?php echo $posts->category_name ?></a>
                                                                        </div>
                                                                        <h3 class="post-title title-sm"><a href="blog-post.php?post_id=<?php echo $posts->a_id; ?>"><?php echo $posts->title ?></a></h3>
                                                                        <ul class="post-meta">
                                                                            <li><a href="author.php"><?php echo $posts->author ?></a></li>
                                                                            <li><?php echo $posts->created_at ?></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php }
                                                    } ?>

                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['name'])) {
                ?>
                    <li class="has-dropdown">
                        <a href=""><?php echo $_SESSION['name'];?></a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                <?php
                } else {
                ?>
                    <li><a href="login.php">Register / Login</a></li>
                <?php
                }
                ?>

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
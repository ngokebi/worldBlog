<footer id="footer">

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.php" class="logo"><img src="img/xlogo-alt.png.pagespeed.ic.H0wmeO3OfX.png" alt=""></a>
                    </div>
                    <p>Follow us on our Social Handles and get access to more News and Latest Updates.</p>
                    <ul class="contact-social">
                        <li><a href="https://www.faebook.com/blogry" target="_blank" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/blogry" target="_blank" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.google.com/blogry" target="_blank" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.instagram.com/blogry" target="_blank" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Categories</h3>
                    <div class="category-widget">
                        <ul>
                            <?php
                            $sql_cat = "SELECT a.category_name, count(*) as count_post FROM category a
									INNER JOIN posts b ON b.cat_id = a.id GROUP BY a.category_name";
                            $cat_query = $database->prepare($sql_cat);
                            $cat_query->execute();

                            $count_posts = $cat_query->fetchAll(PDO::FETCH_OBJ);
                            // print_r($prev_post);
                            if ($cat_query->rowCount() > 0) {
                                foreach ($count_posts as $count_all) {
                            ?>
                                    <li><a href="#"><?php echo $count_all->category_name ?> <span><?php echo $count_all->count_post ?></span></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Tags</h3>
                    <div class="tags-widget">
                        <ul>
                            <li><a href="#">Social</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Life</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Magazine</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Health</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Newsletter</h3>
                    <div class="newsletter-widget">
                        <form>
                            <p>You can subscribe to our newsletter and get lastest updates..</p>
                            <input class="input" name="newsletter" placeholder="Enter Your Email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom row">
            <div class="col-md-6 col-md-push-6">
                <ul class="footer-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                    <li><a href="advertise.php">Advertise</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-md-pull-6">
                <div class="footer-copyright">

                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | <a href="" target="_blank">Blogry</a>

                </div>
            </div>
        </div>

    </div>

</footer>
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="ri-dashboard-line me-2"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="category.php" id="topnav-uielement" role="button">
                            <i class="ri-pencil-ruler-2-line me-2"></i>Category
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button">
                            <i class="ri-apps-2-line me-2"></i>Comments <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                            <a href="comments.php" class="dropdown-item">Approved Comments</a>
                            <a href="dis_comments.php" class="dropdown-item">DisApproved Comments</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="newsletter.php" id="topnav-components" role="button">
                            <i class="ri-stack-line me-2"></i>NewsLetter
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                            <i class="ri-file-copy-2-line me-2"></i>Posts <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                            <a href="posts.php" class="dropdown-item">All Posts</a>
                            <a href="create_posts.php" class="dropdown-item">Create Posts</a>
                        </div>
                    </li>
                    <?php
                    $admin_id = intval($_SESSION['id']);
                    $sql = "SELECT * from users WHERE id = :admin_id";
                    $query = $database->prepare($sql);
                    $query->bindParam(':admin_id', $admin_id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $admin_role = $result->role;
                            if ($admin_role === 'admin') {
                    ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="notifications.php" id="topnav-layout" role="button">
                                        <i class="ri-layout-3-line me-2"></i><span key="t-layouts">Notifications</span>
                                    </a>
                                </li>
                    <?php
                                break;
                            }
                        }
                    } ?>




                </ul>
            </div>
        </nav>
    </div>
</div>
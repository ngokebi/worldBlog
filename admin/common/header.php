<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <!-- <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button> -->

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <!-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form> -->
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>
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
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-notification-3-line"></i>
                                <span class="noti-dot"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <!-- 
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="ri-checkbox-circle-line"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-1">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a> -->
                                    <?php
                                            $sql = "SELECT *,DATE_FORMAT(logdate, '%M %d, %Y') as logdate FROM logs ORDER BY id DESC LIMIT 4";
                                            $query = $database->prepare($sql);
                                            $query->execute();
                                            $result = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
foreach ($result as $log) {
    ?>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="assets/images/users/default-image.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <h6 class="mb-1"><?php echo $log->username; ?></h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1"><?php echo $log->activity; ?></p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i><?php echo $log->logdate; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }} ?>
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="notifications.php">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                        break;
                    }
                }
            } ?>


            <div class="dropdown d-inline-block user-dropdown">
                <?php
                $admin_id = intval($_SESSION['id']);
                $sql = "SELECT * FROM users WHERE id = :admin_id";
                $query = $database->prepare($sql);
                $query->bindParam(':admin_id', $admin_id, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                ?>
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/<?php echo $result->profile_image; ?>" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?php echo $result->name; ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                <?php }
                } ?>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="profile.php"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="socials.php"><i class="ri-whatsapp-fill align-middle me-1"></i> Social Links</a>
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
                                <a class="dropdown-item d-block" href="settings.php"><i class="ri-settings-2-line align-middle me-1"></i> Settings </a>
                    <?php
                                break;
                            }
                        }
                    } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout </a>
                </div>
            </div>
        </div>
    </div>
</header>
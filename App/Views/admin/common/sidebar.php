
    <!-- start content and side bar -->
    <div class="wraper">
            <div class="sidebar">
                <div class="box">
                      <a class="sidebar-item" id="admin-link" href="\admin">
                        <div class="icon">
                            <i class="fas fa-columns">
                            </i>
                        </div>
                        <span>
                            Home Page
                        </span>
                    </a>


                    <a class="sidebar-item" id="categorys-link"  href="<?= fullurl("admin/categorys") ?>">
                        <div class="icon">
                            <i class="fas fa-book">
                            </i>
                        </div>
                        <span>
                        categories
                        </span>
                    </a>
                    <a class="sidebar-item" id="users-groups-link"  href="<?= fullurl("admin/users-groups") ?>">
                        <div class="icon">
                            <i class="fas fa-users">
                            </i>
                        </div>
                        <span>
                        users groups
                        </span>
                    </a>
                    <a class="sidebar-item" id="users-link"  href="<?= fullurl("admin/users") ?>">
                        <div class="icon">
                            <i class="fas fa-user">
                            </i>
                        </div>
                        <span>
                        users 
                        </span>
                    </a>
                    <a class="sidebar-item" id="posts-link"  href="<?= fullurl("admin/posts") ?>">
                        <div class="icon">
                            <i class="fas fa-pen-alt">
                            </i>
                        </div>
                        <span>
                        posts 
                        </span>
                    </a>
                    <a class="sidebar-item" id="ads-link"  href="<?= fullurl("admin/ads") ?>">
                        <div class="icon">
                            <i class="fas fa-ad">
                            </i>
                        </div>
                        <span>
                        Ads 
                        </span>
                    </a>
                    <a class="sidebar-item" id="settings-link"  href="<?= fullurl("admin/settings") ?>">
                        <div class="icon">
                            <i class="fas fa-cog">
                            </i>
                        </div>
                        <span>
                        settings 
                        </span>
                    </a>

                </div>

            </div>
            <!-- end of sidebar -->
            
            <!-- start content -->
            <div class="content">

            <div class="breadcrumbnav">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=  fullurl("/admin")?>">  Dashboard <i class="fas fa-chart-line"></i></a></li>
                        <?php
                            if(isset($breadcrumb))
                            { ?>
                                  <li class='breadcrumb-item'><a href="<?= fullurl("admin/$breadcrumb") ?>">   <?= $breadcrumb ?>  <i class='fas fa-pen-alt'></i></a></li>
                            <?php }
                        ?>
                 
                    </ol>
                </div>
            </div>
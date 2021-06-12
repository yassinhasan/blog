
    <!-- start content and side bar -->
    <div class="wraper">
            <div class="sidebar">
                <div class="box">
                <div class="sidebar-item">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="\admin"><span>
                            Home Page
                        </span></a>
                    </div>
                    <div class="sidebar-item <?= $class == "categoires" ? "active" : "" ?>">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <span>
                        <a href="<?= fullurl("admin/categorys") ?>">categories</a>
                        </span>
                    </div>
                    <div class="sidebar-item <?=   $class == "users-group" ? "active" : "" ?>">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="<?= fullurl("admin/users-groups")?>"><span>
                        Users Groups 
                        </span></a>
                    </div>
                    <div class="sidebar-item">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="<?= fullurl("admin/users")?>"><span>
                            users
                        </span></a>
                    </div>
                </div>

            </div>
            <!-- end of sidebar -->
            
            <!-- start content -->
            <div class="content">
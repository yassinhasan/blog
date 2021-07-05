    <!-- ########### nav ################ -->
    <nav class="nav">
        <div class="nav-box flex-row">
            <div class="brand">
                <a href=""> PHarmacy </a>
            </div>
            <!-- collapse -->
            <div class="collapse">
                <div class="collapse-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <!-- collapse -->
            <div>
                
                <ul class="nav-menu">
                    <li class="nav-item" data-active="home-active">
                    <a href="<?= fullurl("/") ?>"> home  </a>
                    </li>
                    <li class="nav-item" data-active="Posts-active">
                    <a href="<?= fullurl("/blog/posts") ?>"> posts  </a>
                    </li>
                    <li class="nav-item has-menu" data-active="Category-active">
                    <a href="javascript:void(0)"> Category  
                    <i class="fas fa-chevron-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                            <?php 
                            foreach($categories as $cat){ ?>

                                <li class="dropdown-menu-item">
                                <a href="<?= fullurl("/blog/category/".seo($cat->category_name)."/".$cat->category_id) ?>"> <?= $cat->category_name ?> 
                                </a>
                                </li>                            

                              <?php }
                            ?>
                      </ul>


                    </li>
                    <li class="nav-item" data-active="contactus-active">
                    <a href="<?= fullurl("/blog/contactus") ?>">   contact us   </a>
                    </li>
                    <?php 
                        if($loged == 0)
                        { ?>
                            <li class="nav-item" data-active="register-active">
                                <a href="<?= fullurl("/blog/register") ?>"> Rgister  </a>
                            </li>
                            <li class="nav-item" data-active="login-active">
                            <a href="<?= fullurl("/blog/login") ?>"> login  </a>
                        </li>
                       <?php }
                       else
                       { ?>
                            <li class="nav-item has-menu" data-active="register-active">
                                <a href="<?= fullurl("/blog/profile") ?>"> <?= $user->first_name ?> 
                                <img src="<?= mlink("uploades/images/$user->image") ?>" alt="">
                                
                                 </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-item">
                                    <a href="<?= fullurl("/blog/profile") ?>"> profile 
                                    <i class="fas fa-user"></i>
                                    </a>
                                    </li>
                                    <li class="dropdown-menu-item">
                                    <a href="<?= fullurl("/blog/profile") ?>"> settings
                                    <i class="fas fa-cog"></i>
                                    </a>
                                    </li>
                                    <li class="dropdown-menu-item">
                                    <a href="<?= fullurl("users/logout") ?>"> logout 
                                    <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    </li>
                                </ul>
                            </li>
                      <?php }
                    ?>
                </ul>
            </div>

            <div class="social">
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- ####x####### nav ########x######## -->
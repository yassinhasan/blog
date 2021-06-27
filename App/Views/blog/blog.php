<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href= <?= mlink("blog/css/all.min.css") ?>>
    <link rel="stylesheet" href= <?= mlink("blog/css/slider.css") ?>>
    <link rel="stylesheet" href= <?= mlink("blog/css/style.css") ?>>
</head>
<body class="dark">

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
                    <li class="nav-item">
                        <a href=""> Home </a>
                    </li>
                    <li class="nav-item">
                        <a href=""> Posts </a>
                    </li>
                    <li class="nav-item">
                        <a href=""> Category </a>
                    </li>
                    <li class="nav-item">
                        <a href=""> Rgister  </a>
                    </li>
                    <li class="nav-item">
                        <a href=""> Contact Us </a>
                    </li>
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
    
    <!-- ########### main ################ -->
    <main>
        <section class="main-background">
            <h2 class="h2">wellcome </h2>
            <h2 class="h1">  All informaion about drugs</h2>
             <a href="#slider" class="btn btn-home">Explore</a>
        </section>
    </main>


    <!-- ####x####### main ########x######## -->


    <!-- ########### slider ################ -->

    <div class="slider" id="slider">
        <div class="box">
        <div class="slider-title center">
        <h2 class="h2 text-color">
                Common Posts
            </h2>
        </div>
        <div class="slider-box" >
            <div class="wrapper-slider">

                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->
                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->
                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (4).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->
                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->
                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->
                <!-- start slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("blog/images/background (1).jpg") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> this is test for post slider post </span></div> 
                        <div><span class="slider-post-category"> category </span></div>
                    <div><span   class="slider-post-time">  2 minute </span></div> 
                    </div>
                </div>
                <!-- end slides -->


            </div>
        </div>
            <!-- start slider naviagtion -->
            <div class="slider-navigation">
                  <div class="prev"><i class="fas fa-chevron-left"></i></div>
                 <div class="next"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
       
    </div>

    <!-- ####x####### slider ########x######## -->


    <!-- ########### posts and sidebar ################ -->

    <div class="container">
        <div class="main-post-box flex-row">
            <!-- posts -->
            <div class="posts">
                <?php 
                    foreach($posts as $post)
                    { ?>
                 <div class="posts-box">
                    <div class="post-img-box">
                        <div class="post-img">
                        <img src=" <?= mlink("uploades/posts/images/".$post->image)?>">
                        </div>
                        <div class="post-info">
                            <span >
                                <i class="fas fa-user"></i>
                                <?= $post->first_name ?> 
                            </span>
                            <span >
                                <i class="fas fa-calendar"></i>
                                <?= date(" Y - m - d" , $post->created) ?>
                            </span>
                            <span >
                                <i class="fas fa-comments"></i>
                                3 comments
                            </span>
                         </div>
                    </div>
                    <div class="post-title">
                    <h2 class="post-heading"> <?= $post->title; ?></h2>
                    </div>
                    <div class="post-content">
                        <p class="p">
                            <?= read_more($post->details , 40); ?>
                        </p>
                    </div>
                    <div>
                    <a href="#" class="btn read-more"> read more <i class="fas fa-arrow-right"></i>
                    </a>
                    </div>
                    <div>
                        <hr>
                    </div>
                </div>
                <?php  }
                ?>
            </div>                
            <!--x- end last posts -x-->             


            <!--x- posts  -x-->


            <!-- sidebar -->
            <aside class="sidebar-info">
                <div class="category-sidebar">
                        <div class="category-title">
                            <h2 class="h2 text-color">
                                category
                            </h2>
                            <div  class="category-lists">
                                <ul>
                                <?php
                                foreach($getcategory_posts as $getcategory_post)
                                { ?>
                                    <li>
                                        <a href="#"> <?= $getcategory_post->category_name ?> </a>
                                        <span> (<?= $getcategory_post->number_of_posts ?>) </span>
                                    </li>
                              <?php  }
                            ?>
                                </ul>
                            </div>
                        </div>

                        <!-- popular category -->
                        <div class="popular-category">
                            <div class="h2 text-color">
                                popular category
                            </div>
                            <?php
                            foreach($ads as $ad)
                            { ?>

                            <div class="posts-box">
                                <div>
                                    <div class="post-img-box">
                                        <div class="post-img">
                                        <img src=" <?= mlink("uploades/ads/images/".$ad->image)?>">
                                        </div>
                                        <div class="post-info">
                                            <span >
                                                <i class="fas fa-calendar"></i>
                                                <?= date("Y-m-d",$ad->start_at) ?>
                                            </span>
                                            <span >
                                                <i class="fas fa-calendar"></i>
                                                <?= date("Y-m-d",$ad->end_at) ?>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                <div class="post-title">
                                <h3 class="post-heading"><?= $ad->name?></h3>
                                </div>
                            </div>
                            <?php }
                            ?>
                        </div>

                        <!-- news letter -->
                        <div class="news-leeter">
                            <div class="h2 text-color">
                               news letter
                            </div>
                            <div class="news-box">
                                <input type="email" placeholder="Email">
                                <button type="submit" class="btn"> subscribe</button>
                            </div> 
                        </div>
                        <div class="popular-tags">
                            <div class="h2 text-color">
                                popular tags
                            </div>
                            <div class="popular-box flex-row">
                            <?php
                                $tags = [];
                               foreach($posts as $post)
                               { 
                                 $tags = array_merge($tags,explode(",",$post->tags));                                    
                               }
                              foreach($tags as $tag)
                              { ?>
                                <a href=""><span> <?=  $tag ?></span></a>
                            <?php  }
                            ?>
                            </div> 
                        </div>
                </div>
            </aside>
            <!--x- sidebar -x-->
        </div>
    </div>
    <!-- ####x####### posts and sidebar ########x######## -->
    <!-- ########### pagination  ################ -->
        <div class="pagination flex-row">
            <a href="#"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="pages">1</a>
            <a href="#" class="pages">2</a>
            <a href="#" class="pages">3</a>
            <a href="#" class="pages">4</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>

    <!-- ####x####### pagination ########x######## -->


    <!-- ########### footer  ################ -->
    <footer class="footer">
        <div class="footer-box flex-row">
            <div class="footer-aboutus">
               <h2 class="h2"> about us </h2>
               <p class="p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut molestiae cumque amet velit quod! Obcaecati reiciendis culpa sequi eum possimus</p>
            </h2>
            </div>
            <div class="footer-newletters">
                <h2 class="h2">  newletters </h2>
                <h3 class="h3"> stay update with our news</h3>
                <input type="email" placeholder="email">
                <i class="fas fa-arrow-right"></i>
            </div>
            <div class="footer-instagram">
                <h2 class="h2"> instagram </h2>
                <div class="instagram-img flex-row">
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (4).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (1).jpg") ?>" alt="">
                   </div> 
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (4).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (2).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                   </div> 
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (2).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                   </div> 
                </div>
           
            </div>
            <div class="footer-followus">
                <h2 class="h2">  follow us </h2>
                <h3 class="h3"> let us be special</h3>
                <div class="footer-social">
                   <a href="" > <i class="fab fa-facebook"></i>   </a>
                   <a href="" > <i class="fab fa-twitter"></i> </a>
                   <a href="" > <i class="fab fa-youtube"></i> </a>
                   <a href="" > <i class="fab fa-instagram"></i> </a>
                </div>
            </div>
        </div>
        <div class="rights">
            copytights &copy;2021 made by <i class="fas fa-heart"></i> yassin
        </div>
    </footer>

    <!-- ####x####### footer ########x######## -->





    



    <script src="<?= mlink("blog/js/slider.js")?>"></script>    
    <script src="<?= mlink("blog/js/main.js")?>"></script>    
</body>
</html>


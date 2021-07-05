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
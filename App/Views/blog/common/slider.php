
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
                
                <?php 
                    foreach($posts as $post){ ?>
                <!-- s tart slides -->
                <div class="slider-post">
                    <div class="img-slider">
                        <img src="<?= mlink("uploades/posts/images/$post->image") ?>" alt="">
                    </div>
                    <div class="slider-post-info">
                    <div><span  class="post-title"> <?= $post->title ?></span></div> 
                        <div><span class="slider-post-category"> <?=  $post->category_name?> </span></div>
                    <div><span   class="slider-post-time">  <?= date("Y-m-d h:i:s A" , $post->created) ?> </span></div> 
                    </div>
                </div>
                <!-- end slides -->                        
                  <?php  }
                ?>


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

                <div class="overlay"></div>

                <div class="popup posts">
                    <form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("admin/posts") ?> id="theform" class="posts-form">
                        <div class="box">
                            <div class="form-name"> 
                                Add New Posts

                              
                            </div>
                            <!--
                             -->
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group">
                                    <label for="postsname">
                                    title
                                    </label>
                                    <input type="text" name="title" placeholder=" "
                                    value="<?= isset($title) ? $title : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="details">
                                    details
                                    </label>
                                    <textarea name="details" id="details" class="details"><?= isset($details) ? $details : "" ?></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="tags">
                                    tags  
                                    </label>
                                    <div class="tag-container">
                                        <input class="tag-input" name="tags" type="text" data-value="<?= $tags ?>"/>
                                    </div>
                                </div>
                                <div class="divflex">
                                    <div class="form-group select">
                                        <label for="postsname">
                                            category
                                        </label>
                                        <select name="category_id">
                                            <option value="" >select your categorys</option>   
                                            <?php
                                            
                                            foreach($categorys as $category)
                                            {?>
                                            <option value="<?= $category->id ?>"  <?= (isset($post_category) && $category->id ==  $post_category ) ? "selected" : "" ?>> 
                                            <?= $category->name ?></option>
                                        <?php }
                                            ?>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group select">
                                        <label for="status">
                                            Status
                                        </label>
                                        <select name="status" id="status">
                                            <option value="" >select posts  status</option>
                                            <option value="enabled"  <?= (isset($status) &&  $status === 'enabled') ? 'selected' : "" ?>>Enabled</option>
                                            <option value="Disabled" <?= (isset($status) &&  $status === 'disabled') ? 'selected' : "" ?>>Disabled</option>                                          
                                        </select>
                                    </div>
                                    <div class="form-group multiple">
                                        <label for="related_posts">
                                        related_posts
                                        </label>
                                        <select name="related_posts[]" multiple class="multiple">
                                            <?php foreach($posts as $post){
                                             if( isset($id) && $post->id == $id)
                                             {
                                                 continue;
                                             }   
                                           ?> <option value="<?= $post->id ?>" <?=  (isset($related_posts) && in_array($post->id,$related_posts)  ) ? "selected" : "" ?>> <?= $post->title ?></option> ""
                                             <?php }  ?>
                                    
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">
                                    image  
                                    </label>
                                    <input type="file" name="image" 
                                    class="form-input"
                                    >
                                </div>

                                <?php if( isset($image)){ ?> 
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                <img src=" <?= mlink("uploades/posts/images/".$image)?>"
                                     class="table-avatar">    
                                </div>                                
                                <?php }
                                ?>
                            </div>
                            <div class="form-submit">
                                <button class="submit" name="submit" type="button">
                                   <?= isset($name) ? "Save" : "Submit" ?>
                                </button>
                            </div>
                            <div class="close-popup">
                                <button class="close-pop-button">
                                    close
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="loading"> loading ...</div>
                </div>
            
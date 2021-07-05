
            <!-- start content -->
            <div class="content">

            <?php 
            if (isset($session_results))
            { ?>

                <div class="session-results"> <?=  $session_results ?> </div>
            <?php } 
            ?>

                <div class="heading-content">
                    <span>Dashboard </span>
                    <small>Control Panael</small>
                </div>
                <div class="category-lists">
                    <div class="box">
                        <div class="category-head">
                            <span>Manage Posts Lists </span>
                        </div>
                        <div class="add-cat">
                            <button class="add-cat-button"
                            data-target-url="<?= fullurl("admin/posts/add") ?>"
                            > Add New Posts </button>
                        </div>
                        
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                   title
                                    </th>
                                    <th>
                                   author
                                    </th>
                                    <th>
                                    details
                                    </th>
                                    <th>
                                    category
                                    </th>
                                    <th>
                                    tags 
                                    </th>
                                    <th>
                                    image
                                    </th>
                                    <th>
                                    created
                                    </th>
                                    <th>
                                    status
                                    </th>
                                    <th>
                                    action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   
                                    foreach($allposts as $post)
                                    { ?>
                                    <tr>
                                    <td>
                                    <?= $post->id ?>
                                    </td>
                                    <td>
                                    <?= $post->title ?>
                                    </td>
                                    <td>
                                    <?= $post->first_name." ".$post->last_name ?>
                                    </td>
                                    <td>
                                    <?php
                                      if(strlen($post->details) > 100 )
                                    {
                                      echo  substr($post->details, 0 , 100);
                                    }
                                    else
                                    {
                                        echo $post->details;
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?= $post->name?>
                                    </td>
                                    <td>
                                    <?=  $post->tags?>
                                    </td>
                                    <td>
                                    <img src=" <?= mlink("uploades/posts/images/".$post->image)?>"
                                     class="table-avatar" alt="test">    
                                    </td>
                                    <td>
                                    <?= date("Y-m-d",$post->created)?>
                                    </td>
                                    <td>
                                    <?= $post->status ?>
                                    </td>
                                    <td>
                                        <button data-form-taregt="<?= fullurl("admin/posts/edit/".$post->id."") ?>" class="btn-edit">  <i class="fas fa-edit"
                                      
                                        ></i></button>

                                        <button data-form-taregt="<?= fullurl("admin/posts/delete/".$post->id."") ?>"  class="btn-delete">  <i class="fas fa-times delete-icon"
                                       
                                        ></i></button>

                                    </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                   
                </div>

  
        





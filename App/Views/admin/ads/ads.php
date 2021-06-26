

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
                            <span>Manage Ads Lists </span>
                        </div>
                        <div class="add-cat">
                        <button class="add-cat-button"
                            data-target-url="<?= fullurl("admin/ads/add") ?>"
                            > Add New Ads </button>
                        </div>
                    </div>
                        <table>
                            <theadd>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Ads Name
                                    </th>
                                    <th>
                                        Ads link
                                    </th>
                                    <th>
                                        Ads image
                                    </th>
                                    <th>
                                        Ads pages
                                    </th>
                                    <th>
                                        Ads start in
                                    </th>
                                    <th>
                                        adds end in
                                    </th>
                                    <th>
                                       status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </theadd>
                            <tbody>
                                <?php
                                    foreach($allads as $add)
                                    { ?>
                                    <tr>
                                    <td>
                                    <?= $add->id ?>
                                    </td>
                                    <td>
                                    <?= $add->name ?>
                                    </td>
                                    <td>
                                    <?= $add->link ?>
                                    </td>
                                    <td>
                                    <img src=" <?= mlink("uploades/ads/images/".$add->image)?>"
                                     class="table-avatar">    
                                    </td>
                                    <td>
                                    <?= str_replace(",","<br>",$add->pages) ?>
                                    </td>
                                    <td>
                                    <?= date("Y-m-d",$add->start_at)?>
                                    </td>
                                    <td>
                                    <?= date("Y-m-d",$add->end_at)?>
                                    </td>
                                    <td>
                                    <?= $add->status ?>
                                    </td>
                                    <td>
                                        <button data-form-taregt="<?= fullurl("admin/ads/edit/".$add->id."") ?>" class="btn-edit">  <i class="fas fa-edit"
                                      
                                        ></i></button>

                                        <button data-form-taregt="<?= fullurl("admin/ads/delete/".$add->id."") ?>"  class="btn-delete">  <i class="fas fa-times delete-icon"
                                       
                                        ></i></button>

                                    </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                   
                </div>

            <div class="popup-container hide">






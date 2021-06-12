
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
                            <span>Manage Category Lists </span>
                        </div>
                        <div class="add-cat">
                            <button class="add-cat-button"
                            data-target-url="<?= fullurl("admin/categorys/add") ?>"
                            > Add New Category </button>
                        </div>
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($allcategoryes as $cat)
                                    { ?>
                                    <tr>
                                    <td>
                                    <?= $cat->id ?>
                                    </td>
                                    <td>
                                    <?= $cat->name ?>
                                    </td>
                                    <td>
                                    <?= $cat->status ?>
                                    </td>
                                    <td>
                                        <button data-form-taregt="<?= fullurl("admin/categorys/edit/".$cat->id."") ?>" class="btn-edit">  <i class="fas fa-edit"
                                      
                                        ></i></button>

                                        <button data-form-taregt="<?= fullurl("admin/categorys/delete/".$cat->id."") ?>"  class="btn-delete">  <i class="fas fa-times delete-icon"
                                       
                                        ></i></button>

                                    </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                   
                </div>

            </div>
            <div class="popup-container">
            </div>





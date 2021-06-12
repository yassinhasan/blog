
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
                            <span>Manage usersgroup Lists </span>
                        </div>
                        <div class="add-cat">
                            <button class="add-cat-button"
                            data-target-url="<?= fullurl("admin/users-groups/add") ?>"
                            > Add New usersgroup </button>
                        </div>
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                    usersgroup Name
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($usersgroups as $usersgroup)
                                    { ?>
                                    <tr>
                                        <td>
                                        <?= $usersgroup->id ?>
                                        </td>
                                        <td>
                                        <?= $usersgroup->name ?>
                                        </td>
                                        <td>
                                            <button data-form-taregt="<?= fullurl("admin/users-groups/edit/".$usersgroup->id."") ?>" class="btn-edit">  <i class="fas fa-edit"
                                        
                                            ></i></button>

                                            <button data-form-taregt="<?= fullurl("admin/users-groups/delete/".$usersgroup->id."") ?>"  class="btn-delete">  <i class="fas fa-times delete-icon"
                                        
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





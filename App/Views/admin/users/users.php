
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
                            <span>Manage Users Lists </span>
                        </div>
                        <div class="add-cat">
                            <button class="add-cat-button"
                            data-target-url="<?= fullurl("admin/users/add") ?>"
                            > Add New Users </button>
                        </div>
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                   user name
                                    </th>
                                    <th>
                                    email
                                    </th>
                                    <th>
                                    gender
                                    </th>
                                    <th>
                                    birthday
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
                                    foreach($allusers as $user)
                                    { ?>
                                    <tr>
                                    <td>
                                    <?= $user->id ?>
                                    </td>
                                    <td>
                                    <?= $user->first_name." ".$user->last_name ?>
                                    </td>
                                    <td>
                                    <?= $user->email?>
                                    </td>
                                    <td>
                                    <?= $user->gender?>
                                    </td>
                                    <td>
                                    <?= date("Y-m-d",$user->birthday)?>
                                    </td>
                                    <td>
                                    <img src=" <?= mlink("uploades/images/".$user->image)?>"
                                     class="table-avatar">    
                                    </td>
                                    <td>
                                    <?= date("Y-m-d",$user->created)?>
                                    </td>
                                    <td>
                                    <?= $user->status ?>
                                    </td>
                                    <td>
                                        <button data-form-taregt="<?= fullurl("admin/users/edit/".$user->id."") ?>" class="btn-edit">  <i class="fas fa-edit"
                                      
                                        ></i></button>

                                        <button data-form-taregt="<?= fullurl("admin/users/delete/".$user->id."") ?>"  class="btn-delete">  <i class="fas fa-times delete-icon"
                                       
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





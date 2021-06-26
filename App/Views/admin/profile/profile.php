<div class="form-wraper">
        <?php 
            if (isset($success))
            { ?>

                <div class="session-results"> <?=  $success ?> </div>
            <?php } 
            ?>                
        <?php 
            if (isset($failed))
            { ?>

                <div class="session-results danger"> <?=  $failed ?> </div>
            <?php } 
            ?>                
                 
                    <form action="<?= $action; ?>" method="POST"  class="not-popup-form" enctype="multipart/form-data">
                        <div class="box">
                            <div class="form-name"> 
                               edit profile <i class="fas fa-cog"></i>
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group">
                                    <label for="usersname">
                                        fitdt  Name
                                    </label>
                                    <input type="text" name="first_name" placeholder="hasan,marwa..."
                                    value="<?= isset($first_name) ? $first_name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="usersname">
                                        last  Name
                                    </label>
                                    <input type="text" name="last_name" placeholder="hasan,marwa..."
                                    value="<?= isset($last_name) ? $last_name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="usersname">
                                        email  
                                    </label>
                                    <input type="text" name="email" placeholder="Enter Your Email..."
                                    value="<?= isset($email) ? $email : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="usersname">
                                        Status
                                    </label>
                                    <select name="status">
                                        <option value="" >select users  status</option>
                                        <option value="enabled"  <?= (isset($status) &&  $status === 'enabled') ? 'selected' : "" ?>>Enabled</option>
                                        <option value="Disabled" <?= (isset($status) &&  $status === 'disabled') ? 'selected' : "" ?>>Disabled</option>                                          
                                    </select>
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="birthday">
                                        birthday  
                                    </label>
                                    <input type="date" name="birthday" 
                                    value="<?= isset($birthday) ? date("Y-m-d",$birthday) : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="gender">
                                    gender
                                    </label>
                                    <select name="gender">
                                        <option value="" >select your gender</option>
                                        <option value="male"  <?= (isset($gender) &&  $gender === 'male')  ? 'selected' : "" ?>>male</option>
                                        <option value="female" <?= (isset($gender) &&  $gender === 'female')  ? 'selected' : "" ?>>female</option>                                          
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="image">
                                    image  
                                    </label>
                                    <input type="file" name ="image" 
                                    class="form-input"
                                    >
                                </div>

                                <?php if( isset($image)){ ?> 
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <img src=" <?= mlink("uploades/images/".$image)?>"
                                     class="table-avatar">    
                                </div>                                
                                <?php }
                                ?>
                            </div>


                        </div>
                         <div class="form-submit">
                                <button class="saveform" name="saveform" type="submit">
                                Save
                                </button>
                            </div>
                       
                    </form>

</div>
             
            
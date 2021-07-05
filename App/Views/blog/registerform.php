<form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("/blog/login") ?> id="theform" class="users-form">
                        <div class="box">
                            <div class="form-name"> 
                                Add New Users
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group">
                                    <label for="usersname">
                                        fitdt  Name
                                    </label>
                                    <input type="text" name="first_name" placeholder="hasan,marwa..."
                                    value="<?= isset($first_name) ? $first_name : "" ?>"
                                    data-check="<?= fullurl("blog/register/checkexistsdata") ?>"
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
                                    data-check="<?= fullurl("blog/register/checkexistsdata") ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                    password  
                                    </label>
                                    <input type="password" name="password"  class="form-input">
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">
                                    confirm  password  
                                    </label>
                                    <input type="password" name="cpassword"  class="form-input">
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="birthday">
                                        birthday  
                                    </label>
                                    <input type="date" name="birthday" 
                                    value="<?= isset($birthday) ? date("Y-m-d",$birthday) : "" ?>"
                                    data-check="<?= fullurl("blog/register/checkexistsdata") ?>"
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
                                    <input type="file" name="image" 
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
                            <div class="form-submit">
                                <button class="submit" name="submit" type="button">
                                   <?= isset($name) ? "Save" : "Submit" ?>
                                </button>
                            </div>
                        </div>
                    </form>
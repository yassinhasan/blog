
                <div class="overlay"></div>

                <div class="popup">
                    
                    <form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("admin/users-groups") ?> id="theform" >
                        <div class="box">
                            <div class="form-name"> 
                                Add New users group 
                            
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group fullwidth">
                                    <label for="categoryname">
                                    users group  Name
                                    </label>
                                    <input type="text" name="name" placeholder="users group ..."
                                    value="<?= isset($name) ? $name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                            </div>
                            <div class="form-group select">
                                    <label for="usersgroups">
                                        all pages 
                                     
                                    </label>
                                    <select name="pages[]" multiple id="usersgroups" class="multiple">
                                    <?php 
                                        foreach($allpages as $page)
                                        { ?>
                                            <option value="<?= $page?>"  
                                            <?php
                                                if(isset($selectedpages))
                                                {
                                                    echo in_array($page , $selectedpages) ? 'selected'  : ""  ;
                                                }
                                                
                                            
                                                ?>
                                            ><?= $page?></option>option>  
                                    <?php  }
                                    ?>
                                                                               
                                    </select>
                                    
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
            
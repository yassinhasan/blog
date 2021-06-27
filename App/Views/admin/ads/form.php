
                <div class="overlay"></div>

                <div class="popup ads">
                    <form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("admin/ads") ?> id="theform" class="ads-form">
                        <div class="box">
                            <div class="form-name"> 
                                Add New Adss
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group">
                                    <label for="categoryname">
                                        Adss Name
                                    </label>
                                    <input type="text" name="name" placeholder="ads name..."
                                    value="<?= isset($name) ? $name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="categoryname">
                                        Adss url
                                    </label>
                                    <input type="url" name="link" placeholder="ads url..."
                                    value="<?= isset($link) ? $link : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group fullwidth">
                                    <label for="image">
                                    image  
                                    </label>
                                    <input type="file" name="image" 
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group multiple">
                                    <label for="adsgroups">
                                        all pages 
                                     
                                    </label>
                                    <select name="pages[]" multiple id="adsgroups" class="multiple" >
                                    <?php 
                                        foreach($pages as $page)
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
                                <div class="form-group">
                                    <label for="start-at">
                                        start at  
                                    </label>
                                    <input type="date" name="start_at" 
                                    value="<?= isset($start_at) ? date("Y-m-d",$start_at) : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="end_at">
                                    end_at  
                                    </label>
                                    <input type="date" name="end_at" 
                                    value="<?= isset($end_at) ? date("Y-m-d",$end_at) : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group halfwidth">
                                    <label for="categoryname">
                                        Status
                                    </label>
                                    <select name="status">
                                        <option value="" >select ads  status</option>
                                        <option value="enabled"  <?=isset($status) AND $status=== 'enabled' ? 'selected' : "" ?>>Enabled</option>
                                        <option value="Disabled" <?= isset($status) AND $status=== 'enabled' ? 'disabled' : "" ?>>Disabled</option>                                          
                                        

                                    </select>
                                    
                                </div>
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
            
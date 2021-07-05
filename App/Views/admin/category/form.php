<div class="popup-container">
             
             <div class="overlay"></div>

                <div class="popup">
                    <form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("admin/categorys") ?> id="theform" >
                        <div class="box">
                            <div class="form-name"> 
                                Add New Category
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group fullwidth">
                                    <label for="categoryname">
                                        Category Name
                                    </label>
                                    <input type="text" name="name" placeholder="medicine,comsotics..."
                                    value="<?= isset($name) ? $name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group select">
                                    <label for="categoryname">
                                        Status
                                    </label>
                                    <select name="status" class="multiple">
                                        <option value="" >select category  status</option>
                                        <option value="enabled"  <?=isset($status) AND $status=== 'enabled' ? 'selected' : "" ?>>Enabled</option>
                                        <option value="Disabled" <?= isset($status) AND $status=== 'enabled' ? 'disabled' : "" ?>>Disabled</option>                                          
                                        

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
                        </div>
                    </form>
                    <div class="loading"> loading ...</div>
                </div>
</div>
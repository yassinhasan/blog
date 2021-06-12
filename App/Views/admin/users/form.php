
                <div class="overlay"></div>

                <div class="popup">
                    <form action="<?= $action; ?>" method="POST" data-target=<?= fullurl("admin/users") ?> id="theform" >
                        <div class="box">
                            <div class="form-name"> 
                                Add New Users
                            </div>
                            <div class="results"></div>
                            <div class="form-items">
                                <div class="form-group">
                                    <label for="usersname">
                                        Users Name
                                    </label>
                                    <input type="text" name="first_name" placeholder="hasan,marwa..."
                                    value="<?= isset($name) ? $name : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group select">
                                    <label for="usersname">
                                        Status
                                    </label>
                                    <select name="status">
                                        <option value="" >select users  status</option>
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
            
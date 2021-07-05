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
<form action="<?= $action; ?>" method="POST"  class="not-popup-form">
                        <div class="box">
                            <div class="form-name"> 
                               edit settings <i class="fas fa-cog"></i>
                            </div>
                            <div class="results"></div>

                            <div class="form-items mainpage-form-items">
                                 <div class="form-group fullwidth add-settings" style="margin: 0% 2%;">
                                    <button class="add-new-settings"
                                    data-target="<?= fullurl("/admin/settings/popup") ?>"
                                    > ad new settings</button>
                                </div>
                                <div class="form-group fullwidth">
                                    <label for="sitename">
                                        site name <i class="fas fa-edit"></i> 
                                    </label>
                                    <input type="text" name="sitename" placeholder="sitename.."
                                    value="<?= isset($sitename) ? $sitename : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group fullwidth">
                                    <label for="siteemail">
                                        site email <i class="fas fa-envelop"></i>
                                    </label>
                                    <input type="email" name="siteemail" placeholder="siteemail..."
                                    value="<?= isset($siteemail) ? $siteemail : "" ?>"
                                    class="form-input"
                                    >
                                </div>
                                <div class="form-group select fullwidth">
                                    <label for="autologin">
                                    autologin <i class="fas fa-sign-in-alt"></i>
                                    </label>
                                    <select name="autologin">
                                        <option value="" >select autologin  </option>
                                        <option value="enabled"  <?= (isset($autologin) &&  $autologin === 'enabled') ? 'selected' : "" ?>>Enabled</option>
                                        <option value="disabled" <?= (isset($autologin) &&  $autologin === 'disabled') ? 'selected' : "" ?>>Disabled</option>                                          
                                    </select>
                                </div>
                                <div class="form-group select fullwidth">
                                    <label for="status">
                                        status  <i class="fas fa-power-off"></i>
                                    </label>
                                    <select name="status">
                                        <option value="" >select   status</option>
                                        <option value="enabled"  <?= (isset($status) &&  $status === 'enabled') ? 'selected' : "" ?>>Enabled</option>
                                        <option value="disabled" <?= (isset($status) &&  $status === 'disabled') ? 'selected' : "" ?>>Disabled</option>                                          
                                    </select>
                                </div>
                                <div class="form-group fullwidth">
                                    <label for="details" >
                                    site close message <i class="fas fa-times"></i>
                                    </label>
                                    <textarea name="message" id="sitemessage" class="sitemessage" style="width: 100%"><?= isset($message) ? $message : "" ?></textarea> 
                                </div>
                                <div class="form-submit">
                                <button class="saveform" name="saveform" type="submit">
                                Save
                                </button>
                            </div>

                        </div>
                    </form>
</div>

             
            
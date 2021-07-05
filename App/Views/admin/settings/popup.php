
<div class="popup-container">
<div class="overlay"></div>

<div class="popup settings">
    <form action="<?= fullurl("admin/settings/savepopup") ?>"  method="POST" data-target=<?= fullurl("admin/settings") ?> id="theform" class="posts-form">
        <div class="box">
            <div class="form-name"> 
                Add New Posts

              
            </div>
            <!--
             -->
            <div class="columnresults"></div>
            <div class="form-items">
                <div class="form-group">
                    <label for="postsname">
                    add column
                    </label>
                    <input type="text" name="column" placeholder=" "
                    value="<?= isset($column) ? $column : "" ?>"
                    class="form-input"
                    >
                </div>

                <div class="form-group select">
                    <label for="columndesc">
                        Status
                    </label>
                    <select name="columndesc" id="columndesc">
                        <option value="" >select posts  status</option>
                        <option value="VARCHAR(255)"> VARCHAR(255)</option>option>                                          
                        <option value="INT(11)"> INT(11)</option>option>                                          
                        <option value="TEXT"> TEXT</option>option>                                          
                    </select>
                </div>
                <div class="form-group select">
                    <label for="inputtype">
                    input type
                    </label>
                    <select name="inputtype" id="inputtype">
                        <option value="" >select input type  </option>
                        <option value="text">text</option>option>                                          
                        <option value="select"> select</option>option>                                          
                        <option value="select/multiple"> multiselect</option>option>                                          
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
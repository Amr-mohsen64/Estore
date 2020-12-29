<form method = 'post'  enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend class='primary-color'><?= @$text_legend?></legend>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="form_wrap">
                            <div class="input_wrap form-group">
                                <input type="text" name = 'PrivilegeTitle' required />
                                <label><?= @$text_label_privilege_title?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form_wrap">
                            <div class="input_wrap">
                                <input type="text" name = 'Privilege' required />
                                <label><?= @$text_label_privilege_url?></label>
                            </div>
                        </div>
                    </div>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color"><?= @$text_label_save?></button>
    </fieldset>
</form>
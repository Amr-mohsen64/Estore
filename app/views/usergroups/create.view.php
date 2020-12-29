<form method = 'post'  enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend class='primary-color'><?= @$text_legend?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-6">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'GroupName' required />
                            <label><?= @$text_label_group_title?></label>
                        </div>
                    </div>
                </div>
                <?php if($privilegs !== false) : foreach ($privilegs as $privilege) : ?>
                    <div class="col-lg-12">
                        <div class="form-check form-check">
                            <input class="form-check-input" name = 'privilegs[]' type="checkbox" id="<?= $privilege->PrivilegeTitle ?>" value="<?= $privilege->PrivilegeId?>">
                            <label  class = 'checkbox-check' for="<?= $privilege->PrivilegeTitle?>"><?= $privilege->PrivilegeTitle?></label>
                        </div>
                    </div>
                <?php endforeach; endif;  ?>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color"><?= @$text_label_save?></button>
    </fieldset>
</form>
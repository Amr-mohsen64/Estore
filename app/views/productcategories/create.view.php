<form method = 'post'    enctype="multipart/form-data">
    <fieldset>
        <legend class='primary-color'><?= @$text_header?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-12">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Name' value = '<?= $this->showValue('Name') ?>'  />
                            <label><?= @$text_label_Name?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                        <input type="file" name = 'image' value = '<?= $this->showValue('image') ?>' accept ='image/*'/>
                        <label><?= @$text_label_Image?></label>
                </div>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color"><?= @$text_label_save?></button>
    </fieldset>
</form>
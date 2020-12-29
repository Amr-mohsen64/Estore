<form method = 'post'    enctype="multipart/form-data">
    <fieldset>
        <legend class='primary-color'><?= @$text_header?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-12">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Name' value = '<?= $this->showValue('Name' , $category) ?>'  />
                            <label><?= @$text_label_Name?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <input type="file" name = 'image'  accept ='image/*'/>
                    <label><?= @$text_label_Image?></label>
                </div>
            </div>
            
        <button type="submit"  name='submit' class="btn btn-primary primary-color mt-2"><?= @$text_label_save?></button>
        <div class="mt-4">
            <img src="/uploads/images/<?= $category->Image ?>" alt="">
        </div>  
    </fieldset>
</form>
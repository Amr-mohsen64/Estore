<form method = 'post'  enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend class='primary-color'><?= @$text_header?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Name' value = '<?= $this->showValue('Name' , $supplier) ?>'  required/>
                            <label><?= @$text_label_Name?></label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="email" name = 'Email'  value = '<?= $this->showValue('Email' ,$supplier) ?>' required/>
                            <label><?= @$text_label_Email?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'PhoneNumber'  value = '<?= $this->showValue('PhoneNumber' ,$supplier) ?>' required/>
                            <label><?= @$text_label_PhoneNumber?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Address'  value = '<?= $this->showValue('Address' ,$supplier) ?>' required/>
                            <label><?= @$text_label_Address?></label>
                        </div>
                    </div>
                </div>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color"><?= @$text_label_save?></button>
    </fieldset>
</form>
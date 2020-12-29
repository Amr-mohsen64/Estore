<form method = 'post'  enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend class='primary-color'><?= @$text_header?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-2">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'FirstName' value = '<?= $this->showValue('FirstName') ?>'  required/>
                            <label><?= @$text_label_FirstName?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'LastName' value = '<?= $this->showValue('LastName') ?>'  required/>
                            <label><?= @$text_label_LastName?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'UserName' value = '<?= $this->showValue('UserName') ?>'  required/>
                            <label><?= @$text_label_UserName?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="password" name = 'Password'  value = '<?= $this->showValue('Password') ?>' required/>
                            <label><?= @$text_label_Password?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="password" name = 'CPassword'  value = '<?= $this->showValue('CPassword') ?>' required/>
                            <label><?= @$text_label_CPassword?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="email" name = 'Email'  value = '<?= $this->showValue('Email') ?>' required/>
                            <label><?= @$text_label_Email?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="email" name = 'CEmail'  value = '<?= $this->showValue('CEmail') ?>' required/>
                            <label><?= @$text_label_CEmail?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'PhoneNumber'  value = '<?= $this->showValue('PhoneNumber') ?>' required/>
                            <label><?= @$text_label_PhoneNumber?></label>
                        </div>
                    </div>
                </div>
                <!-- select  -->
                <div class="col-lg-3">
                    <div class="select">
                        <select name="GroupId" id="GroupId">
                                <option value=""><?= @$text_user_GroupId?></option>
                                <?php 
                                    if(!empty($groups)):
                                        foreach($groups as $group):?>
                                            <option value="<?= $group->GroupId?>"><?= $group->GroupName?></option> 
                                <?php   endforeach; endif;?>
                            </select>
                    </div>
                </div>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color"><?= @$text_label_save?></button>
    </fieldset>
</form>
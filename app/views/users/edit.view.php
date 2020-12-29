<form method = 'post'  enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend class='primary-color'><?= @$text_header?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-6">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'PhoneNumber'  value = '<?= $this->showValue('PhoneNumber', $user) ?>' />
                            <label><?= @$text_label_PhoneNumber?></label>
                        </div>
                    </div>
                </div>
                <!-- select  -->
                <div class="col-lg-6">
                    <div class="select">
                        <select name="GroupId" id="GroupId">
                                <option value=""><?= @$text_user_GroupId?></option>
                                <?php 
                                    if(!empty($groups)):
                                        foreach($groups as $group):?>
                                            <option value="<?= $group->GroupId?>" <?= $this->selectedIf('GroupId' , $group->GroupId , $user) ?> ><?= $group->GroupName?></option> 
                                <?php   endforeach; endif;?>
                            </select>
                    </div>
                </div>
            </div>
            <button type="submit"  name='submit' class="btn btn-primary primary-color ml-auto"><?= @$text_label_save?></button>
    </fieldset>
</form>
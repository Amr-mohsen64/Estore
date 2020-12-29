<form method = 'post'    enctype="multipart/form-data">
    <fieldset>
        <legend class='primary-color'><?= @$text_legend?></legend>
            <div class="row flex-row-reverse mt-4">
                <div class="col-lg-6">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Name' value = '<?= $this->showValue('Name') ?>'  />
                            <label><?= @$text_label_Name?></label>
                        </div>
                    </div>
                </div>
                <!-- select  to get categoris -->
                <div class="col-lg-6">
                    <div class="select">
                        <select name="CategoryId" id="CategoryId">
                                <option value=""><?= @$text_label_Category?></option>
                                <?php 
                                    if(!empty($categories)):
                                        foreach($categories as $category):?>
                                            <option value="<?= $category->CategoryId?>"><?= $category->Name?></option> 
                                <?php   endforeach; endif;?>
                            </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'Quantity' value = '<?= $this->showValue('Quantity') ?>'  />
                            <label><?= @$text_label_Qunatity?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'BuyPrice' value = '<?= $this->showValue('BuyPrice') ?>'  />
                            <label><?= @$text_label_BuyPrice?></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form_wrap">
                        <div class="input_wrap form-group">
                            <input type="text" name = 'SellPrice' value = '<?= $this->showValue('SellPrice') ?>'  />
                            <label><?= @$text_label_SellPrice?></label>
                        </div>
                    </div>
                </div>
                <!-- select  to display units -->
                <div class="col-lg-3">
                    <div class="select">
                        <select name="Unit" id="Unit">
                            <option value="1" <?= $this->selectedIf('Unit' , 1) ?> ><?= @$text_unit_1?></option>
                            <option value="2" <?= $this->selectedIf('Unit' , 2) ?>><?= @$text_unit_2?></option>
                            <option value="3" <?= $this->selectedIf('Unit' , 3) ?>><?= @$text_unit_3?></option>
                            <option value="4" <?= $this->selectedIf('Unit' , 4) ?>><?= @$text_unit_4?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                        <input type="file" name = 'image' value = '<?= $this->showValue('image') ?>' accept ='image/*'/>
                        <label><?= @$text_label_Image?></label>
                </div>
            </div>
        <button type="submit"  name='submit' class="btn btn-primary primary-color mt-3"><?= @$text_label_Save?></button>
    </fieldset>
</form> 
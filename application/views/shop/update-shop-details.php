<div class="page-content header-clear-medium">
<div class="card card-style preload-img" data-src="images/pictures/8w.jpg" data-card-height="130">
<div class="card-center ml-3">
<h1 class="color-white mb-0">Get in Touch</h1>
<p class="color-white mt-n1 mb-0">We're always here for you!</p>
</div>
<div class="card-center mr-3">
<a href="#" data-back-button class="btn btn-m float-right rounded-xl shadow-xl text-uppercase font-800 bg-highlight">Back Home</a>
</div>
<div class="card-overlay bg-black opacity-80"></div>
</div>


<div class="card card-style contact-form">
<div class="content">
<?php echo form_open_multipart(); ?>
<fieldset>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Bussiness name:<span>(required)</span></label>
<input type="text" value="<?php echo $setArray->bname_?>" name="bname" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
<input type="text" name="email" value="<?php echo $setArray->email_?>" class="contactField round-small requiredField requiredEmailField" id="contactEmailField" />
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">Shop category:<span>(required)</span></label>
<input type="text" name="address" value="<?php echo $setArray->shop_category_?>" class="contactField round-small requiredField"  disabled />

</div>
<div class="form-field form-name">
<label class="contactNameField color-theme"  for="contactNameField">Shop contact number:<span>(required)</span></label>
<input type="text" name="shopnumber" value="<?php echo $setArray->shop_con_num_?>" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Owner name:<span>(required)</span></label>
<input type="text" name="ownername" value="<?php echo $setArray->owner_name_?>" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Owner contact number:<span>(required)</span></label>
<input type="text" name="ownernumber" value="<?php echo $setArray->owner_con_num_?>" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Adhar card number:<span>(required)</span></label>
<input type="text" name="adharnumber" value="<?php echo $setArray->adhar_num_?>" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">State:<span>(required)</span></label>
<input type="text" name="address" value="<?php echo $setArray->state_?>" class="contactField round-small requiredField"  disabled />
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">City:<span>(required)</span></label>

<input type="text" name="address" value="<?php echo $setArray->city_?>" class="contactField round-small requiredField"  disabled />
</div>



<div class="form-field form-name">
<label class="contactNameField color-theme"  for="contactNameField">Address:<span>(required)</span></label>
<input type="text" name="address" value="<?php echo $setArray->address_?>" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Landmark:<span>(required)</span></label>
<input type="text" name="landmark" value="<?php echo $setArray->landmark_?>" class="contactField round-small requiredField"  />
<input type="hidden" name="fileLocation" value="<?php echo $setArray->image_; ?>">
</div>

<div class="content mb-0">
<h4>Upload shop images</h4>
<div class="file-data">
<input type="file" name="image" class="upload-file bg-highlight shadow-s rounded-s " accept="image/*">
<p class="upload-file-text color-white">Upload Image</p>
<img src="<?php echo base_url()?>upload/<?php echo $setArray->image_; ?>">
</div>
</div>
<br/>
<br/>
<div class="divider"></div>



<div class="form-button">
<input type="submit" class="btn bg-highlight text-uppercase font-500 btn-m btn-full rounded-sm  shadow-xl" value="Submit" />
</div>
</fieldset>
<?php echo form_close() ?>

</form>
</div>
</div>
</div>


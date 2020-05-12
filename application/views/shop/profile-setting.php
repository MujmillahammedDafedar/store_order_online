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
<label class="contactNameField color-theme" for="contactNameField">Name:<span>(required)</span></label>
<input type="text" name="bname" value="<?php echo $setArray->name_?> " class="contactField round-small requiredField"  />
</div>
<?php if(empty($setArray->email_)){?>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
<input type="text" name="email"  class="contactField round-small requiredField requiredEmailField" id="contactEmailField" />
</div>
<?php } else { ?>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
<input type="text" value="<?php echo $setArray->name_?> "   class="contactField round-small requiredField requiredEmailField" id="contactEmailField" disabled/>
</div>
	<?php } ?>
	<?php if(empty($setArray->mobile_number)){?>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Mobile number:<span>(required)</span></label>
<input type="text" name="number"  class="contactField round-small requiredField requiredEmailField" id="contactEmailField" />
</div>
<?php } else { ?>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Mobile number:<span>(required)</span></label>
<input type="text" value="<?php echo $setArray->mobile_number?> "   class="contactField round-small requiredField requiredEmailField" id="contactEmailField" disabled/>
</div>
	<?php } ?>

<div class="content mb-0">
<h4>Upload shop images</h4>
<div class="file-data">
<input type="file" name="image" class="upload-file bg-highlight shadow-s rounded-s " accept="image/*">
<p class="upload-file-text color-white">Upload Image</p>
<img src="">
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


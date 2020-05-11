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
<input type="text" name="bname" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-email">
<label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
<input type="text" name="email" value="" class="contactField round-small requiredField requiredEmailField" id="contactEmailField" />
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">Shop category:<span>(required)</span></label>
<select name="category" class="form-control contactField round-small requiredField requiredEmailField">
  <option value="General store">General store</option>
  <option value="Medical store">Medical store</option>
  <option value="Vegitable store">Vegitable store</option>
  <option value="Ice cream parlour">Ice cream parlour</option>
  <option value="Bakery">Bakery</option>
  <option value="Appliances store">Appliances store</option>
  <option value="Clothes store">Clothes store</option>
  <option value="Book store">Book store</option>
  <option value="Spice store">Spice store</option>
  <option value="Household store">Household store</option>
  <option value="House decor store">House decor store</option>
  <option value="Furniture store">Furniture store</option>
  <option value="Construction material store">Construction material store</option>
  <option value="Mobile store">Mobile store</option>
  <option value="Vehicles showroom">Vehicles showroom</option>
  <option value="Local non branded superbazar">Local non branded superbazar</option>
</select>
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Shop contact number:<span>(required)</span></label>
<input type="text" name="shopnumber" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Owner name:<span>(required)</span></label>
<input type="text" name="ownername" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Owner contact number:<span>(required)</span></label>
<input type="text" name="ownernumber" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Adhar card number:<span>(required)</span></label>
<input type="text" name="adharnumber" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">State:<span>(required)</span></label>
<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="form-control" required></select>
</div>
<div class="form-field form-name">
<label class="contactEmailField color-theme" for="contactEmailField">City:<span>(required)</span></label>

<select id ="state" name="city" class="form-control" required></select>
<script language="javascript">print_state("sts");</script>
</div>



<div class="form-field form-name">
<label class="contactNameField color-theme"  for="contactNameField">Address:<span>(required)</span></label>
<input type="text" name="address" value="" class="contactField round-small requiredField"  />
</div>
<div class="form-field form-name">
<label class="contactNameField color-theme" for="contactNameField">Landmark:<span>(required)</span></label>
<input type="text" name="landmark" value="" class="contactField round-small requiredField"  />
</div>

<div class="content mb-0">
<h4>Upload shop images</h4>
<div class="file-data">
<input type="file" name="image" class="upload-file bg-highlight shadow-s rounded-s " accept="image/*">
<p class="upload-file-text color-white">Upload Image</p>
<img src="<?php echo base_url()?>assets/images/empty.png">
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

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form pure-form-aligned');?>
<?php //echo form_open('galleries/updatedatabase', $attributes) ?>
<?php echo form_open('galleries/create', $attributes) ?>
<fieldset>
    <div class="pure-control-group">
        <label for="gallery_id">ID</label>
        <input type="input" readonly name="gallery_id" /><br />
    </div>
     <div class="pure-control-group">
        <label for="gallery_name">Gallery name</label>
        <input type="input" name="gallery_name" id="gallery_name"  /><br />
        <label for="gallery_name">Street</label>
        <input type="input" name="street" id="street" /><br />
        <label for="gallery_name">Town</label>
        <input type="input" name="town" id="town"  /><br />
        <label for="gallery_name">Postcode</label>
        <input type="input" name="postcode" id="postcode" /><br />
    </div>
    <div class="pure-controls">
        <button type="submit" name="sbm" value="Update Gallery" class="pure-button pure-button-primary">Create Gallery</button>
        <button type="submit" name="sbm" value="Return to list" class="pure-button">Return to List</button>
    </div>
</fieldset>
<?php echo form_close(); ?>

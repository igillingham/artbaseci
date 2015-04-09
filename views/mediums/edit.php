<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form pure-form-aligned');?>
<?php //echo form_open('mediums/updatedatabase', $attributes) ?>
<?php echo form_open('mediums/edit', $attributes) ?>
<fieldset>
    <div class="pure-control-group">
        <label for="medium_id">ID</label>
        <input type="input" readonly name="medium_id" value="<?php echo set_value('medium_id', $medium_info['id']); ?> " /><br />
    </div>
     <div class="pure-control-group">
        <label for="medium_name">Medium name</label>
        <input type="input" name="medium_name" id="medium_name" value="<?php echo set_value('medium_name', $medium_info['medium']); ?>" /><br />
    </div>
    <div class="pure-controls">
        <button type="submit" name="sbm" value="Update Medium" class="pure-button pure-button-primary">Update Medium</button>
        <button type="submit" name="sbm" value="Return to list" class="pure-button">Return to List</button>
    </div>
</fieldset>
<?php echo form_close(); ?>


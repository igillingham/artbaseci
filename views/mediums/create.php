<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form');?>
<?php echo form_open('mediums/create', $attributes) ?>
<fieldset>
    <label for="medium_name">Medium name</label>
    <input type="input" name="medium_name" placeholder="Medium name" /><br />

    <input type="submit" class="pure-button pure-button-primary" name="submit" value="Create medium" />
</fieldset>
</form>

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form');?>
<?php echo form_open('artworks/edit', $attributes) ?>
<fieldset>
    <label for="artwork_name">Artwork name</label>
    <input type="input" name="artwork_name" value="<?php echo set_value('artwork_name', $artwork_info['name']); ?>" /><br />

    <input type="submit" class="pure-button pure-button-primary" name="submit" value="Update artwork" />
</fieldset>
</form>

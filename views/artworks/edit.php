<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form pure-form-aligned');?>
<?php echo form_open('artworks/edit', $attributes) ?>
<fieldset>
    <div class="pure-control-group">
        <label for="artwork_name">Artwork name</label>
        <input type="input" name="artwork_name" value="<?php echo set_value('artwork_name', $artwork_info['name']); ?>" /><br />
    </div>
    <div class="pure-control-group">
        <label for="select_medium">Medium</label>
        <select name="select_mediums" value="<?php echo set_value('medium', $artwork_info['medium']); ?>">
        <?php
        // First option in drop-down should imply empty.
        echo "<option selected='selected' value= -1>---</option>";
        foreach ($medium_list as $medium_item):
            if ($medium_item['id'] == $artwork_info['medium'])
                {
                echo "<option selected='selected' value=".$medium_item['id'].">".$medium_item['medium']."</option>";
                }
            else
                {
                echo "<option value=".$medium_item['id'].">".$medium_item['medium']."</option>";            
                }
        endforeach;
        ?>
        </select>
    </div>
        <div class="pure-control-group">
        <label for="select_location">Present location</label>
        <select name="select_location" value="<?php echo set_value('location', $artwork_info['present_location']); ?>">
        <?php
        // First option in drop-down should imply empty.
        echo "<option selected='selected' value= -1>---</option>";
        
        foreach ($location_list as $location_item):
            if ($location_item['id'] == $artwork_info['present_location'])
                {
                echo "<option selected='selected' value=".$location_item['id'].">".$location_item['gallery_name']."</option>";
                }
            else
                {
                echo "<option value=".$location_item['id'].">".$location_item['gallery_name']."</option>";            
                }
        endforeach;
        ?>
        </select>
    </div>
	<div class="pure-control-group">
	    <label for="original_payment_to_artist">Payment</label>
		<input type="input" name="original_payment_to_artist" id="original_payment_to_artist" value="<?php echo set_value('original_payment_to_artist', $artwork_info['original_payment_to_artist']); ?>" /><br />
	</div>
	<div class="pure-control-group">
	    <label for="original_payment_to_artist">Date of Sale</label>
            <input type="input" name="original_date_of_sale" id="original_date_of_sale" value="<?php echo set_value('original_date_of_sale', $artwork_info['original_date_of_sale']); ?>" /><br />
	</div>
	<div class="pure-control-group">
	    <label for="limited_edition">Limited Edition</label>
		<input type="input" name="limited_edition" id="limited_edition" value="<?php echo set_value('limited_edition', $artwork_info['limited_edition']); ?>" /><br />
	</div>
	<div class="pure-control-group">
	    <label for="number_sold">Number of Prints Sold</label>
		<input type="input" name="number_sold" id="number_sold" value="<?php echo set_value('number_sold', $artwork_info['number_sold']); ?>" /><br />
	</div>
	<div class="pure-control-group">
	    <label for="information">Information</label>
		<input type="input" name="information" id="information" value="<?php echo set_value('information', $artwork_info['information']); ?>" /><br />
	</div>
	<div class="pure-control-group">
	    <label for="image_filename">Image Filename</label>
		<input type="input" name="image_filename" id="image_filename" value="<?php echo set_value('image_filename', $artwork_info['image_filename']); ?>" /><br />
	</div>

    <div class="pure-controls">
        <!--<input type="submit" class="pure-button pure-button-primary" name="submit" value="Update artwork" />-->
		<button type="submit" name="sbm" value="Update artwork" class="pure-button pure-button-primary">Update Artwork</button>
		<button type="submit" name="sbm" value="Return to list" class="pure-button">Return to List</button>
    </div>
</fieldset>
</form>

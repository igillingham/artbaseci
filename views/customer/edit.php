<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form pure-form-aligned');?>
<?php //echo form_open('customer/updatedatabase', $attributes) ?>
<?php echo form_open('customer/edit', $attributes) ?>
<fieldset>
    <div class="pure-control-group">
        <label for="customer_id">ID</label>
        <input type="input" readonly name="customer_id" value="<?php echo set_value('customer_id', $customer_info['id']); ?> " /><br />
    </div>
     <div class="pure-control-group">
        <label for="customer_name">Customer name</label>
        <input type="input" name="customer_name" id="customer_name" value="<?php echo set_value('customer_name', $customer_info['name']); ?>" /><br />
        <label for="address">Address</label>
        <input type="input" name="address" id="address" value="<?php echo set_value('address', $customer_info['address']); ?>" /><br />
        <label for="phone_1">Phone 1</label>
        <input type="input" name="phone_1" id="phone_1" value="<?php echo set_value('phone_1', $customer_info['phone_1']); ?>" /><br />
        <label for="phone_2">Phone 2</label>
        <input type="input" name="phone_2" id="phone_2" value="<?php echo set_value('phone_2', $customer_info['phone_2']); ?>" /><br />
        <label for="email">Email</label>
        <input type="input" name="email" id="email" value="<?php echo set_value('email', $customer_info['email']); ?>" /><br />
         <label for="notes">Notes</label>
        <input type="input" name="notes" id="notes" value="<?php echo set_value('notes', $customer_info['notes']); ?>" /><br />
   </div>
    <div class="pure-controls">
        <button type="submit" name="sbm" value="Update Customer" class="pure-button pure-button-primary">Update Customer</button>
        <button type="submit" name="sbm" value="Return to list" class="pure-button">Return to List</button>
    </div>
</fieldset>
<?php echo form_close(); ?>


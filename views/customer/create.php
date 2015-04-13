<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'pure-form pure-form-aligned');?>
<?php //echo form_open('customer/updatedatabase', $attributes) ?>
<?php echo form_open('customer/edit', $attributes) ?>
<fieldset>
    <div class="pure-control-group">
        <label for="customer_id">ID</label>
        <input type="input" readonly name="customer_id"/><br />
    </div>
     <div class="pure-control-group">
        <label for="customer_name">Customer name</label>
        <input type="input" name="customer_name" id="customer_name" /><br />
        <label for="address">Address</label>
        <input type="input" name="address" id="address" /><br />
        <label for="phone1">Phone 1</label>
        <input type="input" name="phone1" id="phone1" /><br />
        <label for="phone2">Phone 2</label>
        <input type="input" name="phone2" id="phone2"/><br />
        <label for="email">Email</label>
        <input type="input" name="email" id="email" /><br />
         <label for="notes">Notes</label>
        <input type="input" name="notes" id="notes"/><br />
   </div>
    <div class="pure-controls">
        <button type="submit" name="sbm" value="Create Customer" class="pure-button pure-button-primary">Create Customer</button>
        <button type="submit" name="sbm" value="Return to list" class="pure-button">Return to List</button>
    </div>
</fieldset>
<?php echo form_close(); ?>


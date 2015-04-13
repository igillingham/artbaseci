<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('customer/delete') ?>
    <?php $m_id = $this->uri->segment(3); ?>

    <label for="title">Title</label>
    <label for="name">Customer ID: <?php echo $m_id;?></label>
    <label for="name">data: <?php echo $customer_id;?></label>
    <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>"/>
    <input type="checkbox" name="confirm" value="delete" checked="unchecked"/>Yes - delete customer<br>
    <input type="submit" name="submit" value="delete" />

</form>

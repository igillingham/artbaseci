<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('mediums/delete') ?>
    <?php $m_id = $this->uri->segment(3); ?>

    <label for="title">Title</label>
    <label for="name">Medium ID: <?php echo $m_id;?></label>
    <label for="name">data: <?php echo $medium_id;?></label>
    <input type="hidden" name="medium_id" value="<?php echo $medium_id;?>"/>
    <input type="checkbox" name="confirm" value="delete" checked="unchecked"/>Yes - delete medium<br>
    <input type="submit" name="submit" value="delete" />

</form>

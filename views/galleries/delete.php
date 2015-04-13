<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('galleries/delete') ?>
    <?php $m_id = $this->uri->segment(3); ?>

    <label for="title">Title</label>
    <label for="name">Gallery ID: <?php echo $m_id;?></label>
    <label for="name">data: <?php echo $gallery_id;?></label>
    <input type="hidden" name="gallery_id" value="<?php echo $gallery_id;?>"/>
    <input type="checkbox" name="confirm" value="delete" checked="unchecked"/>Yes - delete gallery<br>
    <input type="submit" name="submit" value="delete" />

</form>

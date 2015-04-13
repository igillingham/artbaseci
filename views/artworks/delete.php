<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('artworks/delete') ?>
    <?php $m_id = $this->uri->segment(3); ?>

    <label for="title">Title</label>
    <label for="name">Artwork ID: <?php echo $m_id;?></label>
    <label for="name">data: <?php echo $artwork_id;?></label>
    <input type="hidden" name="artwork_id" value="<?php echo $artwork_id;?>"/>
    <input type="checkbox" name="confirm" value="delete" checked="unchecked"/>Yes - delete artwork<br>
    <input type="submit" name="submit" value="delete" />

</form>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/prettytable.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css">

<script type="text/javascript" charset="utf-8">
                        $(document).ready(function() {
                                $('#galleries_list').dataTable( {
                                "bPaginate": true,
                                "sScrollY": 400,
                                "sScrollX": "90%",
                                "sScrollXInner": "100%"
                                } );
                        } );

function checkDelete()
    {
    if (confirm("are you sure?")) 
        {
        document.getElementById('actions').submit();
        }
    }
</script>


</head>
<?php $this->load->helper('form');?>
<div id='main'>
<div class="header">
            <h1>Artbase</h1>
            <h2>The Artworks Database for Professional Artists</h2>
        </div>
<h2><?php echo $title ?></h2>

<?php echo form_open('galleries/delete','id="actions"') ?>
<table id='galleries_list' class="pretty">
    <thead>
        <tr>
            <th>Id</th>
            <th>Gallery</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


<?php foreach ($galleries as $gallery_item): ?>
        <tr>            
            <td><?php echo $gallery_item['id'] ?></td>
            <td><?php echo $gallery_item['gallery_name'] ?></td>
            <td>
                <a href="<?php echo site_url();?>/galleries/view/<?php echo $gallery_item['id']?>">View</a>
                <a href="<?php echo site_url();?>/galleries/edit/<?php echo $gallery_item['id']?>">Edit</a>
                <a href="<?php echo site_url();?>/galleries/delete/<?php echo $gallery_item['id']?>">Delete</a>
                <!--<input type="button" value="delete" onClick="checkDelete()">-->
            </td>
        </tr>
<?php endforeach;?>

<a href="<?php echo site_url();?>/galleries/create">Create gallery</a>


    </tbody>
</table>
</form>
</div>



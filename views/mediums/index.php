<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/prettytable.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css">

<script type="text/javascript" charset="utf-8">
                        $(document).ready(function() {
                                $('#mediums_list').dataTable( {
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

<?php echo form_open('mediums/delete','id="actions"') ?>
<table id='mediums_list' class="pretty">
    <thead>
        <tr>
            <th>Id</th>
            <th>Medium</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


<?php foreach ($mediums as $medium_item): ?>
        <tr>            
            <td><?php echo $medium_item['id'] ?></td>
            <td><?php echo $medium_item['medium'] ?></td>
            <td>
                <a href="<?php echo site_url();?>/mediums/view/<?php echo $medium_item['id']?>">View medium</a>
                <a href="<?php echo site_url();?>/mediums/delete/<?php echo $medium_item['id']?>">Delete</a>
                <!--<input type="button" value="delete" onClick="checkDelete()">-->
            </td>
        </tr>
<?php endforeach;?>

<a href="<?php echo site_url();?>/mediums/create">Create medium</a>


    </tbody>
</table>
</form>
</div>



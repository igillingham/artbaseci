<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/prettytable.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css">

</head>
<div id='main'>
<div class="header">
            <h1>Artbase</h1>
            <h2>The Artworks Database for Professional Artists</h2>
        </div>
<h2><?php echo $title ?></h2>

<?php
echo '<h2>'.$gallery_info['id'].'</h2>';
echo $gallery_info['gallery_name'];


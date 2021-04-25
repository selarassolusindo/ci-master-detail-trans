<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T32_csheetd Read</h2>
        <table class="table">
	    <tr><td>Idcsheetm</td><td><?php echo $idcsheetm; ?></td></tr>
	    <tr><td>Idcost</td><td><?php echo $idcost; ?></td></tr>
	    <tr><td>Nilai</td><td><?php echo $Nilai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_32_csheetd') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
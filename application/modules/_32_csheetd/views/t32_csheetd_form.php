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
        <h2 style="margin-top:0px">T32_csheetd <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idcsheetm <?php echo form_error('idcsheetm') ?></label>
            <input type="text" class="form-control" name="idcsheetm" id="idcsheetm" placeholder="Idcsheetm" value="<?php echo $idcsheetm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idcost <?php echo form_error('idcost') ?></label>
            <input type="text" class="form-control" name="idcost" id="idcost" placeholder="Idcost" value="<?php echo $idcost; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Nilai <?php echo form_error('Nilai') ?></label>
            <input type="text" class="form-control" name="Nilai" id="Nilai" placeholder="Nilai" value="<?php echo $Nilai; ?>" />
        </div>
	    <input type="hidden" name="idcsheetd" value="<?php echo $idcsheetd; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('_32_csheetd') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> -->
        <style>
            body{
                padding: 15px;
            }
        </style>

        <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bootstrap/css/font-awesome.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap-theme.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>lib/select2/css/select2.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>lib/bootstrap/css/custom.css">

    	<script src="<?php echo base_url(); ?>lib/bootstrap/js/jquery.min.js"></script>
    	<script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.min.js"></script>
    	<script src="<?php echo base_url(); ?>lib/select2/js/select2.min.js"></script>
    	<script src="<?php echo base_url(); ?>lib/bootstrap/js/plugin2.js"></script>

    </head>
    <body>
        <h2 style="margin-top:0px">T31_csheetm <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NoCSheet <?php echo form_error('NoCSheet') ?></label>
            <input type="text" class="form-control" name="NoCSheet" id="NoCSheet" placeholder="NoCSheet" value="<?php echo $NoCSheet; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TglCSheet <?php echo form_error('TglCSheet') ?></label>
            <input type="text" class="form-control" name="TglCSheet" id="TglCSheet" placeholder="TglCSheet" value="<?php echo $TglCSheet; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idjo <?php echo form_error('idjo') ?></label>
            <input type="text" class="form-control" name="idjo" id="idjo" placeholder="Idjo" value="<?php echo $idjo; ?>" />
        </div>

        <div class="form-group">
            <label class="control-label">Address</label>
            <table class="table table-bordered" id="table-address">
                <thead>
                    <tr>
                        <th width="300">Cost</th>
                        <th>Nilai</th>
                        <th class="text-center" width="50">Remove</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><select class="form-control cost" name="idcost[]" required></select></td>
                        <td><input type="text" class="form-control" name="nilai[]" required></input></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm btn-delete-address"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">
                            <button type="button" class="btn btn-success btn-sm" id="add-address"><i class="fa fa-plus"></i> Add another address</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

	    <input type="hidden" name="idcsheetm" value="<?php echo $idcsheetm; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_31_csheetm') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>

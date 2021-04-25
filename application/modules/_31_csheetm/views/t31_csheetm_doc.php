<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T31_csheetm List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NoCSheet</th>
		<th>TglCSheet</th>
		<th>Idjo</th>
		
            </tr><?php
            foreach ($_31_csheetm_data as $_31_csheetm)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_31_csheetm->NoCSheet ?></td>
		      <td><?php echo $_31_csheetm->TglCSheet ?></td>
		      <td><?php echo $_31_csheetm->idjo ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
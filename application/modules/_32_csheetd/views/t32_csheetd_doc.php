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
        <h2>T32_csheetd List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idcsheetm</th>
		<th>Idcost</th>
		<th>Nilai</th>
		
            </tr><?php
            foreach ($_32_csheetd_data as $_32_csheetd)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_32_csheetd->idcsheetm ?></td>
		      <td><?php echo $_32_csheetd->idcost ?></td>
		      <td><?php echo $_32_csheetd->Nilai ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
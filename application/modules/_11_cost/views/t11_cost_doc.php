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
        <h2>T11_cost List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Idakun</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_11_cost_data as $_11_cost)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_11_cost->Kode ?></td>
		      <td><?php echo $_11_cost->Nama ?></td>
		      <td><?php echo $_11_cost->idakun ?></td>
		      <td><?php echo $_11_cost->created_at ?></td>
		      <td><?php echo $_11_cost->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
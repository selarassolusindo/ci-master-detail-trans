<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CI Master Detail Transaction</title>

	<link rel="stylesheet" href="lib/bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="lib/select2/css/select2.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/custom.css">

	<script src="lib/bootstrap/js/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/select2/js/select2.min.js"></script>
	<script src="lib/bootstrap/js/plugin.js"></script>
</head>
<body>
	<div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">CI Master Detail Transaction</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>CI Master Detail Transaction</h1>
            <p>This example is a quick exercise to illustrate how to perform simple master-detail transaction.</p>
        </div>

        <div class="row">
        	<div class="col-md-12">

		        <?php echo form_open_multipart('store'); ?>
	        		<div class="panel panel-default">
	        			<div class="panel-heading">
	        				<strong>
		        				Form customer
	        				</strong>
	        			</div>
	        			<div class="panel-body">
				        	<div class="form-group">
				        		<label class="control-label">Customer name</label>
				        		<input type="text" name="name" class="form-control" required></input>
				        	</div>
				        	<div class="form-group">
				        		<label class="control-label">Upload avatar</label>
				        		<input type="file" name="userfile" class="form-control" required></input>
				        	</div>
				        	<div class="form-group">
				        		<label class="control-label">Address</label>
					        	<table class="table table-bordered" id="table-address"> 
								    <thead> 
								        <tr> 
								            <th width="150">Title</th> 
								            <th>Address</th> 
								            <th class="text-center" width="50">Remove</th> 
								        </tr>         
								    </thead>     

								    <tbody>
								        <tr>
								        	<td><select class="form-control select2" name="title_id[]" required></select></td>
								            <td><input type="text" class="form-control" name="address[]" required></input></td> 
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
	        			</div>
	        			<div class="panel-footer">
				    		<button type="submit" class="btn btn-primary" value="save">Submit</button>
	        			</div>
	        		</div>
		        </form>

		        <?php echo $notification; ?>

		        <?php if (sizeof($data) > 0) : ?>
		        	<div class="panel panel-default">
	        			<div class="panel-heading">
	        				<strong>
		        				Recently added customer
	        				</strong>
	        			</div>
	        			<div class="panel-body">
        					<div class="row"> 
	        				<?php foreach($data as $index => $customer) : ?>
	        					<div class="col-md-4"> 
								    <div class="thumbnail">
								    	<a title="Remove" href="<?php echo site_url('delete/' . $customer->id); ?>" class="btn-remove-customer text-center">
								    		<i class="fa fa-trash-o"></i>
							    		</a>
								        <img src="<?php echo site_url('get/' . $customer->id); ?>"  alt=""> 
								        <div class="caption"> 
								            <h3><?php echo $customer->name; ?></h3>
								            <h5>Address list</h5>
								            <hr/>
					        				<ul class="list-group">
					        				<?php foreach($customer->address as $addr) : ?>
					        					<li class="list-group-item">
													<dt><?php echo $addr->title; ?></dt>
													<dd><?php echo $addr->address; ?></dd>
					        					</li>
					        				<?php endforeach; ?>
					        				</ul>
								        </div>         
								    </div>     
								</div>
	        				<?php endforeach; ?>
							</div>
	        			</div>
	    			</div>
        		<?php endif; ?>

        	</div>
        </div>
    </div> 
</body>
</html>
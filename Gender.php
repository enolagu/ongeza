<?php 
$mainClass = new Main(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gender</title>
</head>
<body>
	<center><h2>Gender</h2></center>
	<div class="tableHeader">
		<a class="btn btn-primary bottom-spaced btn-sm plusbtn" data-toggle="modal" data-target="#addgender">Add Gender</a>
	</div>
	<br /><br /><br />
	<!-- class="table table-bordered table-hover table-responsive table-condensed"  -->
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<th>ID</th>
			<th>Gender Name</th>
			<th>Action</th>
		</thead>
		<tfoot>
			<th>ID</th>
			<th>Gender Name</th>
			<th>Action</th>
		</tfoot>
		<tbody>
			<?php 
			$mainClass->getGender(); 
			?>
		</tbody>
	</table>
</body>
</html>

<div class="modal fade modal-centered" id="addgender">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">+ Add Gender</h3>
			</div>
			<form role="form" class="form-horizontal" method="post">
				<fieldset>
					<div class="modal-body">
						<div class="form-group">
							<label for="gendername" class="col-md-4 control-label">Gender Name</label>
							<div class="col-md-7">
								<input name="gendername" autofocus="true"  placeholder="Gender Name" class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button name="createGender" type="Submit" class="btn btn-primary">Save</button>
						</div>
					</fieldset>
				</form>
				<?php 
				$mainClass->genderinsert(); 
				?>
				<div class="clear"></div>
			</div>
		</div>
	</div>

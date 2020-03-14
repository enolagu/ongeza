<?php 
$mainClass = new Main();
?>
<script type="text/javascript">
	function checkfirstname() {
		var firstname = document.getElementById("firstname").value
		if(firstname.length >=3){
			document.getElementById("message").style.visibility = "hidden";
			document.getElementById("insertCustomer").disabled = false;
		}else{
			document.getElementById("insertCustomer").disabled = true;
			document.getElementById("message").style.visibility = "visible";
		}
	}

	

</script>
<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
</head>
<body>
	<center><h2>Customer</h2></center>
	<div class="tableHeader">
		<a href="?pageid=customer&#insert" class="btn plusbtn" title="New Institution">Add Customer</a>
	</div>
	<br />
	<br />
	<br />
	<table id="example" cellspacing="0" width="100%">
		<div id="tablename">
			<td>ID</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Town Name</td>
			<td>Gender</td>
			<td>Action</td>
		</div>

	</tr>
	<?php 
	$mainClass->customerDetails(); 
	?>
</table>
</body>
</html>
<!-- Models -->
<div id="insert" class="modalDialog">
	<div class="normalSize">
		<a href="?pageid=customer" title="close" class="closesign">X</a><br>
		<center>
			<h4>Customer</h4>
			<h5><p id="head"></p></h5>
			<form method="post" role="form">
				<input name="firstname" id="firstname" required type="text" placeholder="Enter First" onkeyup="checkfirstname();">
				<input name="lastname" required type="text"  placeholder="Enter Last Name ">
				<input name="townname" requiredtype="text"  placeholder="Enter Town Name ">
				<select name="gender" required>
					<option>Select Gender</option>
					<?php 
					$mainClass->getGenderNames(); 
					?>
				</select>
				<button name="insertCustomer" id="insertCustomer" type="Submit" class="btn mybtn fullbtn">Save</button>
			</form>
			<?php  
			$mainClass->createCustomer(); 
			?>
			<span id="message">First name must be at least 3 characters</span>
		</center>
		
	</div>
</div>
<div id="testing" class="modalDialog">
	<div class="normalSize">
		<a href="?pageid=customer" title="close" class="closesign">X</a><br>
		<center><h4>test <?php echo $_REQUEST['deleteID'];	?></h4>
			<form method="post" role="form">
				<?php 
				$mainClass->confirmdelete(); 
				?>
			</form>
			<?php $mainClass->deleteCustomer(); ?>
		</center>

	</div>
</div>
<div id="update" class="modalDialog">
	<div class="normalSize">
		<a href="?pageid=customer" title="close" class="closesign">X</a><br>
		<center><h4>Update customer Details</h4>
			<form method="post" role="form">
				<?php $mainClass->editCustomer(); ?>
			</form>

			<?php 
			$mainClass->updateCustomer(); 
			?>
		</center>

	</div>
</div>

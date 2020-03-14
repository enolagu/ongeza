<?php  
include "includes/mainHeader.php";	
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="mybody">
		<div class="mainmenu">
			<ul>
				<li><a href="index.php" class="dashboardLink"> Dashboard</a></li>
				<li class="Linkcustomer"><a href="?pageid=customer" > Customer</a></li>
			</ul>
		</div>
		<div class="maincontainer">
			<?php  
			if(isset($_REQUEST['pageid']))
			{
				$pageid=$_REQUEST['pageid'];
				if($pageid=='customer')
				{
					include "customer.php";
				}
			}
			else
			{
				include "dashboard.php";
			}
			?>
		</div>
	</div>
</body>
</html>

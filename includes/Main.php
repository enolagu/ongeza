<?php 
date_default_timezone_set('Africa/Nairobi');

Class Main{
	function dbconnect()
	{
		$server="localhost";
		$user="root";
		$password="root";
		$db="ongeza_test";
		$connection = mysqli_connect($server, $user, $password);
		if($connection)
		{
			if(!mysqli_select_db($connection,$db))
			{
				$this->ErrorMsg(mysqli_error());
			}
			return $connection;
		}
		else
		{
			$this->ErrorMsg(mysqli_error());
		}
	}

	function ErrorMsg($msg)
	{
		echo  $msg;
	}

	function SuccessMsg($msg)
	{
		echo $msg ;
	}
	public function getGenderNames()
	{

		$connection= $this->dbconnect();
		$query="SELECT * FROM gender";
		if($run=mysqli_query($connection,$query))
		{
			while($rows=mysqli_fetch_assoc($run))
			{
				echo '
				<option value='.$rows['id'].'>'.$rows['gender_name'].'</option>';
			}
		}
		else
		{
			ErrorMsg("Error occur! (".mysqli_error().")");
		}


	}
	public function customerDetails()
	{

		$connection= $this->dbconnect();
		$query="SELECT * FROM gender JOIN customer ON customer.gender_id = gender.id  WHERE is_deleted=0; ";

		if($run=mysqli_query($connection,$query))
		{
			while($rows=mysqli_fetch_assoc($run))
			{
				echo '<tr>
				<td>'.$rows['id'].'</td>
				<td>'.$rows['first_name'].'</td>
				<td>'.$rows['last_name'].'</td>
				<td>'.$rows['town_name'].'</td>
				<td>'.$rows['gender_name'].'</td>

				<td><a href="?pageid=customer&ID='.$rows['id'].'&#update" class="btn btn-success btn-sm btnControl">Edit</a><a href="?pageid=customer&deleteID='.$rows['id'].'&#testing" class="btn btn-danger btn-sm btnControl">Delete</a></td>
				</tr>';
			}
		}
		else
		{
			$this->ErrorMsg("Error occur! (".mysqli_error($connection).")");
		}


	}
	public function editCustomer()
	{
		$connection= $this->dbconnect();
		if(isset($_REQUEST['ID']))
		{
			$id=$_REQUEST['ID'];
			$query="SELECT * FROM customer WHERE id='$id'";
			$run=mysqli_query($connection,$query);
			while($rows=mysqli_fetch_assoc($run))
			{
				if($rows['gender_id']=1){
					$gendername= 'M';
				}else{
					$gendername= 'F';
				}
				echo '<div>
				<input name="customerID" type="hidden" value="'.$rows['id'].'" placeholder="Enter Customer ID">
				<input name="firstname" type="text" value="'.$rows['first_name'].'" placeholder="Enter First Name">
				<input name="lastname" type="text" value="'.$rows['last_name'].'" placeholder="Enter First Name">
				<input name="townname" type="text" value="'.$rows['town_name'].'" placeholder="Enter First Name">
				<input name="gender" type="text" value="'.$gendername.'" placeholder="Enter First Name">
				<button name="update" type="Submit" class="btn mybtn fullbtn">Update</button></div>';
			}

		}
		else
		{
			echo errorMsg("Sorry! You must edit the customer!");
		}

	}
	function createCustomer()
	{
		$connection= $this->dbconnect();
		if(isset($_POST['insertCustomer']))
		{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$townname=$_POST['townname'];
			$genderid=$_POST['gender'];
			

			$query="INSERT INTO customer(first_name,last_name,town_name,gender_id) VALUES('$firstname','$lastname','$townname','$genderid')";
			if(mysqli_query($connection,$query))
			{
				$this->SuccessMsg("Customer Added Successfully!");
			}
			else
			{
				$this->ErrorMsg("Sorry! an error occur.. ".mysqli_error($connection));
			}
		}

	}
	public function updateCustomer()
	{
		$connection= $this->dbconnect();
		if(isset($_POST['update']))
		{
			$ID=$_REQUEST['ID'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$townname=$_POST['townname'];
			if($_POST['gender']='M'){
				$genderid=1;
			}else{
				$genderid=2;
			}
			$query="UPDATE customer SET first_name='$firstname', last_name='$lastname', town_name='$townname', gender_id='$genderid' WHERE id='$ID'";
			if(mysqli_query($connection,$query))
			{
				$this->SuccessMsg("Customer Upadated Successfully!");
			}
			else
			{
				$this->ErrorMsg("Sorry! an error occur.. ".mysqli_error($connection));
			}

		}
	}
	public function confirmdelete()
	{ 
		if(isset($_REQUEST['deleteID']))
		{           			
			echo '<center><h4>Are You Sure You Want To Delete The Customer?</h4>
			<button name="deleteYes" type="Submit" class="btn mybtn">Yes</button>
			<a href="?pageid=customer" title="close" class="btn mybtn">No</a></center>';

		}
		else
		{
			$this->ErrorMsg("Sorry! Pleaes select the customer to Delete!");
		}

	}
	public	function deleteCustomer()
	{
		$connection= $this->dbconnect();
		if(isset($_POST['deleteYes']))
		{
			$ID=$_REQUEST['deleteID'];
			$query="UPDATE customer SET is_deleted=1 WHERE id='$ID'";
			if(mysqli_query($connection,$query))
			{
				$this->SuccessMsg("Customer Successfully Deleted!");
			}
			else
			{
				ErrorMsg("Sorry! an error occur.. ".mysqli_error($connection));
			}

		}
	}

}

?>
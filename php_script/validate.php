<?php
	require 'connect.inc.php';

	session_start();
		if(!empty($_POST['acc_id'])&&!empty($_POST['user_name'])&&!empty($_POST['pass_key']))
		{
			if(isset($_POST['acc_id'])&&isset($_POST['user_name'])&&isset($_POST['pass_key']))
			{
				$acc_id = stripslashes($_POST['acc_id']);
				$email_id = $_POST['user_name'];
				$password =$_POST['pass_key'];

				$query = "SELECT * FROM customers WHERE `acc_no`='$acc_id' AND `email_id`='$email_id' AND `password`='$password'";
				$data = $conn->query($query);
		    	$result = $conn->query($query);
		    	
				if (!$result){
					echo "<center> <p style='padding: 5px;background-color:red;'> Something went wrong.</p>	</center>";
					
				}
				while($row = $result->fetch_assoc()) 
				{
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$mobile_no = $row['mobile_no'];
					$doj = $row['doj'];
				}

				$count = $result->num_rows;
				if($count==1)
				{
					$_SESSION['acc_id']=$acc_id;
					$_SESSION['email_id']=$email_id;
					$_SESSION['password']=$password;
					$_SESSION['first_name']=$first_name;
					$_SESSION['last_name']=$last_name;
					$_SESSION['mobile_no']=$mobile_no;
					$_SESSION['doj']=$doj;
					header("location: ./acc_info.php");
				}
				else if($count==0)
				{
					echo "<center> <p style='padding: 5px;background-color:red;'> User or Password is wrong. Please try Again.</p>	</center>";
				}
				else
				{
					echo "<center> <p style='padding: 5px;background-color:red;'> Something went wrong.</p>	</center>";
				}
			}
		}
	
?>
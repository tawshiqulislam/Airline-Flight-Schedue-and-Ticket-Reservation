<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arif Airline</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/style_in.css" rel="stylesheet" />
</head>

<body>
<?php
	if(isset($_POST['Submit']))
	{
		$data_missing=array();
		if(empty($_POST['username']))
		{
			$data_missing[]='User Name';
		}
		else
		{
			$user_name=trim($_POST['username']);
		}
		if(empty($_POST['password']))
		{
			$data_missing[]='Password';
		}
		else
		{
			$password=$_POST['password'];
		}
		if(empty($_POST['email']))
		{
			$data_missing[]='Email ID';
		}
		else
		{
			$email_id=trim($_POST['email']);
		}

		if(empty($_POST['name']))
		{
			$data_missing[]='Name';
		}
		else
		{
			$name=$_POST['name'];
		}
		if(empty($_POST['phone_no']))
		{
			$data_missing[]='Phone No.';
		}
		else
		{
			$phone_no=trim($_POST['phone_no']);
		}
		if(empty($_POST['address']))
		{
			$data_missing[]='Address';
		}
		else
		{
			$address=$_POST['address'];
		}
		if(empty($_POST['id']))
		{
			$data_missing[]='ID number';
		}
		else
		{
			$id=$_POST['id'];
		}

		$id_type = strtoupper($_POST['id_type']);
		if(empty($data_missing))
		{
			require_once('Database Connection file/mysqli_connect.php');
			$query="INSERT INTO Customer (customer_id,pwd,name,email,phone_no,address,id,id_type) VALUES (?,?,?,?,?,?,?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ssssssis",$user_name,$password,$name,$email_id,$phone_no,$address,$id,$id_type);
			mysqli_stmt_execute($stmt);
			$affected_rows=mysqli_stmt_affected_rows($stmt);
			//echo $affected_rows."<br>";
			// mysqli_stmt_bind_result($stmt,$cnt);
			// mysqli_stmt_fetch($stmt);
			// echo $cnt;
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
			/*
			$response=@mysqli_query($dbc,$query);
			*/
			if($affected_rows==1)
			{
				header('location:user_reg_success.php');
			}
			else
			{
				echo "Submit Error";
			}
		}
		else
		{
			echo "The following data fields were empty! <br>";
			foreach($data_missing as $missing)
			{
				echo $missing ."<br>";
			}
		}
	}
	else
	{
		echo "Submit request not received";
	}
?>
</body>
</html>
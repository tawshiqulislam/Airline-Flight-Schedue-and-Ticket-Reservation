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
        $admin_type = $_POST['admin_type'];
        if(empty($data_missing))
		{
			require_once('Database Connection file/mysqli_connect.php');
			$query="INSERT INTO admin (admin_id, pwd, staff_id, name, email) VALUES (?,?,?,?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"sssss",$user_name,$password,$admin_type,$name,$email_id);
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
				header('location:sub_reg_success.php');
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
<?php
	session_start();
?>
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
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($_POST['jet_type']))
				{
					$data_missing[]='Jet Type';
				}
				else
				{
					$jet_type=$_POST['jet_type'];
				}

				if(empty($_POST['jet_capacity']))
				{
					$data_missing[]='Jet Capacity';
				}
				else
				{
					$jet_capacity=$_POST['jet_capacity'];
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="INSERT INTO Jet_Details (jet_id,jet_type,total_capacity,active) VALUES (?,?,?,'Yes')";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ssi",$jet_id,$jet_type,$jet_capacity);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// $response=@mysqli_query($dbc,$query);
					if($affected_rows==1)
					{
						echo "Successfully Submitted";
						header("location: add_jet_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						header("location: add_jet_details.php?msg=failed");
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
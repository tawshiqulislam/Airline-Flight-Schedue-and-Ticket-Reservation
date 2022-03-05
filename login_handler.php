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
			session_start();
			session_destroy();
			session_start();
			if(isset($_POST['Login']))
			{
				$data_missing=array();
				if(empty($_POST['username']))
				{
					$data_missing[]='Username';
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
					$pass_word=$_POST['password'];
				}
				if(empty($_POST['user_type']))
				{
					$data_missing[]='User Type';
				}
				else
				{
					$user_type=$_POST['user_type'];
					$_SESSION['user_type']=$user_type;
				}


				if(empty($data_missing))
				{
					if($user_type=='Customer')
					{
						require_once('Database Connection file/mysqli_connect.php');
						$query="SELECT count(*) FROM Customer where customer_id=? and pwd=?";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$cnt);
						mysqli_stmt_fetch($stmt);
						//echo $cnt;
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
						/*$affected_rows=mysqli_stmt_affected_rows($stmt);
						$response=@mysqli_query($dbc,$query);
						echo $affected_rows;
						*/
						if($cnt==1)
						{
							echo "Logged in <br>";
							$_SESSION['login_user']=$user_name;
							echo $_SESSION['login_user']." is logged in";
							header("location: customer_homepage.php");
						}
						else
						{
							echo "Login Error";
							session_destroy();
							header('location:login_page.php?msg=failed');
						}
					}
					else if($user_type=='Administrator')
					{
						if($user_name=="admin"){
							require_once('Database Connection file/mysqli_connect.php');
							$query="SELECT count(*) FROM Admin where admin_id=? and pwd=?";
							$stmt=mysqli_prepare($dbc,$query);
							mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt,$cnt);
							mysqli_stmt_fetch($stmt);
							//echo $cnt;
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
							/*$affected_rows=mysqli_stmt_affected_rows($stmt);
							$response=@mysqli_query($dbc,$query);
							echo $affected_rows;
							*/
							
							if($cnt==1)
							{
								echo "Logged in <br>";
								$_SESSION['login_user']=$user_name;
								echo $_SESSION['login_user']." is logged in";
								header('location:admin_homepage.php');
							}
							else
							{
								echo "Login Error";
								session_destroy();
								header('location:login_page.php?msg=failed');
							}
						}
						else{
							echo "Login Error";
							session_destroy();
							header('location:login_page.php?msg=failed');
						}
						
					}
					else if($user_type=='sub_admin')
					{
						require_once('Database Connection file/mysqli_connect.php');
						$query="SELECT count(*) FROM Admin where admin_id=? and pwd=?";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$cnt);
						mysqli_stmt_fetch($stmt);
						//echo $cnt;
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
						/*$affected_rows=mysqli_stmt_affected_rows($stmt);
						$response=@mysqli_query($dbc,$query);
						echo $affected_rows;
						*/
						if($cnt==1)
						{
							echo "Logged in <br>";
							$_SESSION['login_user']=$user_name;
							echo $_SESSION['login_user']." is logged in";
							header('location:sub_admin_homepage.php');
						}
						else
						{
							echo "Login Error";
							session_destroy();
							header('location:login_page.php?msg=failed');
						}
					}
				}
				else
				{
					echo "The following data fields were empty<br>";
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
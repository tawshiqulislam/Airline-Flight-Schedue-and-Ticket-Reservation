<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arif Airlines</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> 
    <link href="css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="fontawesome/css/all.min.css" rel="stylesheet" /> 
    <link href="css/templatemo-diagoona.css" rel="stylesheet" />
	<style>
		.filter{
			-webkit-backdrop-filter: blur(10px);
    		backdrop-filter: blur(10px);
    		background-color: rgba(255, 255, 255, 0.3);
		}
	</style>
</head>
<body>
    <div class="tm-container filter">
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
					<i class="fas fa-plane-departure fa-4x mt-0 tm-logo"></i>
                        <div class="media-body">
                            <h1 class="tm-sitename text-uppercase" style="font-family:Helvetica">Airline</h1>
                            <p class="tm-slogon" style="font-family:sarif">FLY BETTR</p>
                        </div>      
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                            data-toggle="collapse" data-target="#navbar-nav" 
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav filter" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="customer_homepage.php">Back To Homepage</a></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="book_tickets.php">Change Date or Destination</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="customer_flightlist.php">Check Flight Schedule</a></a>
                                </li>
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row filter">
                <div class="tm-col-left"></div>
                <main class="tm-col-right tm-contact-main">
                    <section class="tm-content tm-contact">
                        <h2 class="mb-4 tm-content-title">Book Filght</h2>
                        <?php
							$i=1;
							if(isset($_POST['Submit']))
							{
								$pnr=rand(1000000,9999999);
								$date_of_res=date("Y-m-d");
								$flight_no=$_SESSION['flight_no'];
								$journey_date=$_SESSION['journey_date'];
								$class=$_SESSION['class'];
								$booking_status="PENDING";
								$no_of_pass=$_SESSION['no_of_pass'];
								$lounge_access=$_POST['lounge_access'];
								$priority_checkin=$_POST['priority_checkin'];
								$insurance=$_POST['insurance'];
								$total_no_of_meals=0;
								$_SESSION['pnr']=$pnr;

								$_SESSION['lounge_access']=$lounge_access;
								$_SESSION['priority_checkin']=$priority_checkin;
								$_SESSION['insurance']=$insurance;

								$payment_id=NULL;
								$customer_id=$_SESSION['login_user'];

								require_once('Database Connection file/mysqli_connect.php');

								if($_SESSION['class']=='economy')
								{	
									$query="SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
									$stmt=mysqli_prepare($dbc,$query);
									mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
									mysqli_stmt_execute($stmt);
									mysqli_stmt_bind_result($stmt,$ticket_price);
									mysqli_stmt_fetch($stmt);
								}
								else if($_SESSION['class']=='business')
								{
									$query="SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
									$stmt=mysqli_prepare($dbc,$query);
									mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
									mysqli_stmt_execute($stmt);
									mysqli_stmt_bind_result($stmt,$ticket_price);
									mysqli_stmt_fetch($stmt);
								}
								mysqli_stmt_close($stmt);
								$ff_mileage=$ticket_price/10;

								$query="INSERT INTO Ticket_Details (pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,lounge_access,priority_checkin,insurance,payment_id,customer_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
								$stmt=mysqli_prepare($dbc,$query);
								mysqli_stmt_bind_param($stmt,"ssssssisssss",$pnr,$date_of_res,$flight_no,$journey_date,$class,$booking_status,$no_of_pass,$lounge_access,$priority_checkin,$insurance,$payment_id,$customer_id);
								mysqli_stmt_execute($stmt);
								$affected_rows=mysqli_stmt_affected_rows($stmt);
								echo $affected_rows.'<br>';
								// mysqli_stmt_bind_result($stmt,$cnt);
								// mysqli_stmt_fetch($stmt);
								// echo $cnt;
								/*
								$response=@mysqli_query($dbc,$query);
								*/
								if($affected_rows==1)
								{
									echo "Successfully Submitted<br>";
								}
								else
								{
									echo "Submit Error";
									echo mysqli_error();
								}
								
								for($i=1;$i<=$no_of_pass;$i++)
								{
									echo "frequent_flier_no=".$_POST['pass_ff_id'][$i-1].'<br>';
									if($_POST['pass_ff_id'][$i-1]=='')
										$_POST['pass_ff_id'][$i-1]=NULL;
									else
									{
										$query="SELECT count(*) from Customer c, Frequent_Flier_Details f WHERE c.name=? and f.frequent_flier_no=? and c.customer_id=f.customer_id";
										$stmt=mysqli_prepare($dbc,$query);
										mysqli_stmt_bind_param($stmt,"ss",$_POST['pass_name'][$i-1],$_POST['pass_ff_id'][$i-1]);
										mysqli_stmt_execute($stmt);
										$affected_rows=mysqli_stmt_affected_rows($stmt);
										mysqli_stmt_bind_result($stmt,$cnt);
										mysqli_stmt_fetch($stmt);
										echo "cnt=".$cnt."<br>";
										mysqli_stmt_close($stmt);
										
										if($cnt==1)
										{
											$query="UPDATE Frequent_Flier_Details SET mileage=mileage+? where frequent_flier_no=?";
											$stmt=mysqli_prepare($dbc,$query);
											mysqli_stmt_bind_param($stmt,"is",$ff_mileage,$_POST['pass_ff_id'][$i-1]);
											mysqli_stmt_execute($stmt);
											$affected_rows=mysqli_stmt_affected_rows($stmt);
											echo $affected_rows.'<br>';
											mysqli_stmt_close($stmt);
										}
									}

									$query="INSERT INTO Passengers (passenger_id,pnr,name,age,gender,meal_choice,frequent_flier_no) VALUES (?,?,?,?,?,?,?)";
									$stmt=mysqli_prepare($dbc,$query);

									if($_POST['pass_meal'][$i-1]=='yes')
										$total_no_of_meals++;
									mysqli_stmt_bind_param($stmt,"ississs",$i,$pnr,$_POST['pass_name'][$i-1],$_POST['pass_age'][$i-1],$_POST['pass_gender'][$i-1],$_POST['pass_meal'][$i-1],$_POST['pass_ff_id'][$i-1]);
									mysqli_stmt_execute($stmt);
									$affected_rows=mysqli_stmt_affected_rows($stmt);
									echo 'Passenger added '.$affected_rows.'<br>';
									// mysqli_stmt_bind_result($stmt,$cnt);
									// mysqli_stmt_fetch($stmt);
									// echo $cnt;
								}
								$_SESSION['total_no_of_meals']=$total_no_of_meals;
								mysqli_stmt_close($stmt);
								mysqli_close($dbc);

								header("location: payment_details.php");

				// 						else
				// 						{
				// 							echo "Submit Error";
				// 							echo mysqli_error();
				// 						}
				// 					}
				// 					else
				// 					{
				// 						echo "The following data fields were empty! <br>";
				// 						foreach($data_missing as $missing)
				// 						{
				// 							echo $missing ."<br>";
				// 						}
				// 					}
				// 				}
							}
							else
							{
								echo "Submit request not received";
							}
						?>
						<br>
                    </section>
                </main>
            </div>
        </div>        

        
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>
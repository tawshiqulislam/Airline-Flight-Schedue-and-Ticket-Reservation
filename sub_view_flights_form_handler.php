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
    <div class="tm-container">
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
                                    <a class="nav-link tm-nav-link" href="sub_admin_homepage.html">Back To Homepage</a></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="sub_book_tickets.php">Book A Ticket</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="sub_flightlist.php">Check Flight Schedule</a></a>
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
                        <h2 class="mb-4 tm-content-title">Available Filghts</h2>
                        <?php
							if(isset($_POST['Search']))
							{
								$data_missing=array();
								if(empty($_POST['origin']))
								{
									$data_missing[]='Origin';
								}
								else
								{
									$origin=$_POST['origin'];
								}
								if(empty($_POST['destination']))
								{
									$data_missing[]='Destination';
								}
								else
								{
									$destination=$_POST['destination'];
								}

								if(empty($_POST['dep_date']))
								{
									$data_missing[]='Departure Date';
								}
								else
								{
									$dep_date=trim($_POST['dep_date']);
								}
								if(empty($_POST['no_of_pass']))
								{
									$data_missing[]='No. of Passengers';
								}
								else
								{
									$no_of_pass=trim($_POST['no_of_pass']);
								}

								if(empty($_POST['class']))
								{
									$data_missing[]='Class';
								}
								else
								{
									$class=trim($_POST['class']);
								}

								if(empty($data_missing))
								{
									$_SESSION['no_of_pass']=$no_of_pass;
									$_SESSION['class']=$class;
									$count=1;
									$_SESSION['count']=$count;
									$_SESSION['journey_date']=$dep_date;
									require_once('Database Connection file/mysqli_connect.php');
									if($class=="economy")
									{
										$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
										$stmt=mysqli_prepare($dbc,$query);
										mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
										mysqli_stmt_execute($stmt);
										mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
										mysqli_stmt_store_result($stmt);
										if(mysqli_stmt_num_rows($stmt)==0)
										{
											echo "<h3>No flights are available !</h3>";
										}
										else
										{
											echo "<form action=\"sub_book_tickets2.php\" method=\"post\">";
											echo "<table cellpadding=\"10\"";
											echo "<tr><th>Flight No.</th>
											<th>Origin</th>
											<th>Destination</th>
											<th>Departure Date</th>
											<th>Departure Time</th>
											<th>Arrival Date</th>
											<th>Arrival Time</th>
											<th>Price(Economy)</th>
											<th>Select</th>
											</tr>";
											while(mysqli_stmt_fetch($stmt)) {
												echo "<tr>
												<td>".$flight_no."</td>
												<td>".$from_city."</td>
												<td>".$to_city."</td>
												<td>".$departure_date."</td>
												<td>".$departure_time."</td>
												<td>".$arrival_date."</td>
												<td>".$arrival_time."</td>
												<td>&#2547; ".$price_economy."</td>
												<td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
												</tr>";
											}
											echo "</table> <br>";
											echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
											echo "</form>";
										}
									}
									else if($class="business")
									{
										$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
										$stmt=mysqli_prepare($dbc,$query);
										mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
										mysqli_stmt_execute($stmt);
										mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
										mysqli_stmt_store_result($stmt);
										if(mysqli_stmt_num_rows($stmt)==0)
										{
											echo "<h3>No flights are available !</h3>";
										}
										else
										{
											echo "<form action=\"sub_book_tickets2.php\" method=\"post\">";
											echo "<table cellpadding=\"10\"";
											echo "<tr><th>Flight No.</th>
											<th>Origin</th>
											<th>Destination</th>
											<th>Departure Date</th>
											<th>Departure Time</th>
											<th>Arrival Date</th>
											<th>Arrival Time</th>
											<th>Price(Business)</th>
											<th>Select</th>
											</tr>";
											while(mysqli_stmt_fetch($stmt)) {
												echo "<tr>
												<td>".$flight_no."</td>
												<td>".$from_city."</td>
												<td>".$to_city."</td>
												<td>".$departure_date."</td>
												<td>".$departure_time."</td>
												<td>".$arrival_date."</td>
												<td>".$arrival_time."</td>
												<td>&#2547; ".$price_business."</td>
												<td><input type=\"radio\" name=\"select_flight\" value=".$flight_no."></td>
												</tr>";
											}
											echo "</table> <br>";
											echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
											echo "</form>";
										}
									}	
									mysqli_stmt_close($stmt);
									mysqli_close($dbc);
									// else
									// {
									// 	echo "Submit Error";
									// 	echo mysqli_error();
									// }
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
								echo "Search request not received";
							}
						?>
						<br>
                    </section>
                </main>
            </div>
        </div>        

        <div class="tm-row">
            <div class="tm-col-left text-center">            
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>            
            </div>        
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0">Copyright 2022</p>
                </footer>
            </div>  
        </div>

        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>
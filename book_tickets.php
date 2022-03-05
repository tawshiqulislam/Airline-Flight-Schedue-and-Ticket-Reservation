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
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                        <ul class="navbar-nav text-uppercase">
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="customer_homepage.php">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="customer_flightlist.php">Flight Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Manage Ticket</span></a>
                                        <div class="dropdown-content">
											<a class="nav-link tm-nav-link" href="book_tickets.php">Book Tickets</a>
                                            <a class="nav-link tm-nav-link" href="cancel_booked_tickets.php">Cancel Booked Tickets</a>
                                        </div>
                                    </div>
                                </li> 
								<li class="nav-item">
                                	<div class="dropdown">
                                        	<a class="nav-link tm-nav-link" href="#"><span>Check Ticket</span></a>
                                        	<div class="dropdown-content">
                                                <a class="nav-link tm-nav-link" href="customer_pnr.php">Check Ticket</a>
                                                <a class="nav-link tm-nav-link" href="view_booked_tickets.php">View Booked Flight Tickets</a>
                                    	</div>
                                	</div>
								</li>
                                <li class="nav-item">
                                	<div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Logout & More</span></a>
                                        <div class="dropdown-content">
                                            <a class='nav-link tm-nav-link' href="logout_handler.php">Logout</a>
                                            <a class="nav-link tm-nav-link" href="customer_about.php">About</a>
                                            <a class="nav-link tm-nav-link" href="customer_contact.php">Contact</a>
                                        </div>
                                	</div>
								</li>
                            </ul>                               
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Book Ticket<hr></h3>
                    
					<form action="view_flights_form_handler.php" method="post">
						<h2>SEARCH FOR AVAILABLE FLIGHTS</h2><hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Enter the Origin</td>
								<td class="fix_table">Enter the Destination</td>
							</tr>
							<tr>
								<td class="fix_table">
									<input list="origins" name="origin" placeholder="From" required>
									<datalist id="origins">
										<option value="Chittagong">
										<option value="Dhaka">
										<option value="America">
										<option value="India">
										<option value="London">
										<option value="Russia">
                                            
									</datalist>
									<!-- <input type="text" name="origin" placeholder="From" required> --></td>
								<td class="fix_table">
									<input list="destinations" name="destination" placeholder="To" required>
									<datalist id="destinations">
										<option value="Chittagong">
										<option value="Dhaka">
										<option value="America">
										<option value="India">
										<option value="London">
										<option value="Russia">
									</datalist>
									<!-- <input type="text" name="destination" placeholder="To" required> --></td>
							</tr>
						</table>
						<br>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Enter the Departure Date</td>
								<td class="fix_table">Enter the No. of Passengers</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="date" name="dep_date" min=
									<?php 
										$todays_date=date('Y-m-d'); 
										echo $todays_date;
									?> 
									max=
									<?php 
										$max_date=date_create(date('Y-m-d'));
										date_add($max_date,date_interval_create_from_date_string("90 days")); 
										echo date_format($max_date,"Y-m-d");
									?> required></td>
								<td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
							</tr>
						</table>
						<br>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Enter the Class</td>
							</tr>
							<tr>
								<td class="fix_table">
									<select name="class">
										<option value="economy">Economy</option>
										<option value="business">Business</option>
									</select>
								</td>
							</tr>
						</table>
						<br>
						<input type="submit" value="Search for Available Flights" name="Search">
					</form>
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
                    <p class="mb-0">Copyright 2021</p>
                </footer>
            </div>  
        </div>

        <!-- Diagonal background design -->
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
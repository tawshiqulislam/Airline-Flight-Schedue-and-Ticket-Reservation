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
                                    <a class="nav-link tm-nav-link" href="sub_admin_homepage.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Search</span></a>
                                        <div class="dropdown-content">
											<a class="nav-link tm-nav-link" href="sub_flightlist.php">Search Fligtlist</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Flight</span></a>
                                        <div class="dropdown-content">
											<a class="nav-link tm-nav-link" href="sub_add_flight_details.php">Add Flight Schedule Details</a>
											<a class="nav-link tm-nav-link" href="sub_delete_flight_details.php">Delete Flight Schedule Details</a>
                                        </div>
                                    </div>
                                </li> 
								<li class="nav-item">
                                	<div class="dropdown">
                                        	<a class="nav-link tm-nav-link" href="#"><span>Ticket</span></a>
                                        	<div class="dropdown-content">
											<a class="nav-link tm-nav-link" href="sub_book_tickets.php">Book Ticket</a>
											<a class="nav-link tm-nav-link" href="sub_cancel_booked_tickets.php">Cancel Ticket</a>
                                            <a class="nav-link tm-nav-link" href="sub_admin_pnr.php">Check Ticket By PNR</a>
                                            <a class="nav-link tm-nav-link" href="sub_admin_view_booked_tickets.php">View List of Booked Tickets for a Flight</a>
                                    	</div>
                                	</div>
								</li>                          
                                <li class="nav-item">
									<a class='nav-link tm-nav-link' href="logout_handler.php">Logout</a>
                                </li>
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                <h5 style="font-family: sarif">Welcome Staff!</h5>
                    <section class="tm-content">
                    <h3 style="text-align:center" class="mb-5 tm-content-title">ENTER THE FLIGHT SCHEDULE DETAILS<hr></h3>
                    
					<form action="sub_add_flight_details_form_handler.php" method="post">
						<?php
							if(isset($_GET['msg']) && $_GET['msg']=='success')
							{
								echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong>
									<br>
									<br>";
							}
							else if(isset($_GET['msg']) && $_GET['msg']=='failed')
							{
								echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
									<br>
									<br>";
							}
						?>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Flight Number</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="text" name="flight_no" required></td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Origin</td>
								<td class="fix_table">Destination</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="text" name="origin" required></td>
								<td class="fix_table"><input type="text" name="destination" required></td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Departure Date</td>
								<td class="fix_table">Arrival Date</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="date" name="dep_date" required></td>
								<td class="fix_table"><input type="date" name="arr_date" required></td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Departure Time</td>
								<td class="fix_table">Arrival Time</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="time" name="dep_time" required></td>
								<td class="fix_table"><input type="time" name="arr_time" required></td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Number of Seats in Economy Class</td>
								<td class="fix_table">Number of Seats in Business Class</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="number" name="seats_eco" required></td>
								<td class="fix_table"><input type="number"" name="seats_bus" required></td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Ticket Price(Economy Class)</td>
								<td class="fix_table">Ticket Price(Business Class)</td>
							</tr>
						</table>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">
									<input type="number" name="price_eco" required>
								</td>
								<td class="fix_table">
									<input type="number" name="price_bus" required>
								</td>
							</tr>
						</table>
						<br>
						<hr>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Jet ID</td>
							</tr>
							<tr>
								<td class="fix_table">
									<input type="text" name="jet_id" required>
								</td>
							</tr>
						</table>
						<br>
						<input type="submit" value="Submit" name="Submit">
					</form>
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
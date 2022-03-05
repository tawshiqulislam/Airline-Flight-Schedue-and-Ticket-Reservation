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
                                    <a class="nav-link tm-nav-link" href="admin_homepage.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Flight</span></a>
                                        <div class="dropdown-content">
                                            <a class="nav-link tm-nav-link" href="admin_flightlist.php">Search Flight Schedule</a>
											<a class="nav-link tm-nav-link" href="add_flight_details.php">Add Flight Schedule Details</a>
											<a class="nav-link tm-nav-link" href="delete_flight_details.php">Delete Flight Schedule Details</a>
                                        </div>
                                    </div>
                                </li> 
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link tm-nav-link" href="#"><span>Aircraft</span></a>
                                        <div class="dropdown-content">
                                        <a class="nav-link tm-nav-link" href="add_jet_details.php">Add Aircrafts Details</a>
                                        <a class="nav-link tm-nav-link" href="activate_jet_details.php">Activate Aircraft</a>
                                        <a class="nav-link tm-nav-link" href="deactivate_jet_details.php">Deactivate Aircraft</a>
                                        </div>
                                    </div>
                                </li>
								<li class="nav-item">
                                	<div class="dropdown">
                                        	<a class="nav-link tm-nav-link" href="#"><span>Ticket</span></a>
                                        	<div class="dropdown-content">
                                            <a class="nav-link tm-nav-link" href="admin_pnr.php">Check Ticket By PNR</a>
                                            <a class="nav-link tm-nav-link" href="admin_view_booked_tickets.php">View List of Booked Tickets for a Flight</a>
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
                    <section class="tm-content">
                    <h3><i class="fa fa-user-plus" aria-hidden="true"></i> CREATE SUB ADMIN ACCOUNT</h3><hr>
                    <form class="center_form" action="sub_reg_form_handler.php" method="POST" id="sub_reg_form">
						
						<br>
						<table cellpadding='10'>
							<tr>
								<td>Enter a valid username  </td>
								<td><input type="text" name="username" required><br><br></td>
							</tr>
							<tr>
								<td>Enter desired password  </td>
								<td><input type="password" name="password" required><br><br></td>
							</tr>
							<tr>
								<td>Enter email </td>
								<td><input type="email" name="email" required><br><br></td>
							</tr>
                            <tr>
								<td>Enter name  </td>
								<td><input type="text" name="name" required><br><br></td>
                            </tr>
                            <tr>
								<td>Admin Type</td>
								<td>Sub-Admin&nbsp;&nbsp;<input type="radio" name="admin_type" value="sub_admin" checked>
							</tr>
						</table>
						<br>
						<hr>
						<br>
						<input type="submit" value="Submit" name="Submit">
						<br>
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
                    <p class="mb-0">Copyright 2021
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
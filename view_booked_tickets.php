<?php
	session_start();
	$con=mysqli_connect("localhost","root","","airline");
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
		body{
			margin:20px;
		}
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
                                    <a class="nav-link tm-nav-link" href="book_tickets.php">Book A Ticket</a>
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
                    <section class="tm-content tm-contact" style="margin:20px">
                        <h2 class="mb-4 tm-content-title">VIEW BOOKED FLIGHT TICKETS<hr></h2>
						<h3 style='text-align:center;'><u>Upcoming Trips</u></h3>
						<?php
							$todays_date=date('Y-m-d');
							$thirty_days_before_date=date_create(date('Y-m-d'));
							date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
							$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
							
							$customer_id=$_SESSION['login_user'];
							require_once('Database Connection file/mysqli_connect.php');
							$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
							$stmt=mysqli_prepare($dbc,$query);
							mysqli_stmt_bind_param($stmt,"ss",$customer_id,$todays_date);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id);							
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt)==0)
							{
								echo "<h3 style='text-align:center;'>No upcoming trips!</h3>";
							}
							else
							{
								echo "<table cellpadding=\"10\"";
								echo "<tr><th>PNR</th>
								<th>Date of Reservation</th>
								<th>Flight No.</th>
								<th>Journey Date</th>
								<th>Class</th>
								<th>Booking Status</th>
								<th>No. of Passengers</th>
								<th>Payment ID</th>
								</tr>";
								while(mysqli_stmt_fetch($stmt)) {
									echo "<tr>
									<td>".$pnr."</td>
									<td>".$date_of_reservation."</td>
									<td>".$flight_no."</td>
									<td>".$journey_date."</td>
									<td>".$class."</td>
									<td>".$booking_status."</td>
									<td>".$no_of_passengers."</td>
									<td>".$payment_id."</td>
									</tr>";
								}
								echo "</table> <br>";
							}
							echo "<br><h3 class=\"set_nice_size\" style='text-align:center;'><u>Completed Trips</u></h3>";

							$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? and journey_date<? and journey_date>=? ORDER BY  journey_date";
							$stmt=mysqli_prepare($dbc,$query);
							mysqli_stmt_bind_param($stmt,"sss",$customer_id,$todays_date,$thirty_days_before_date);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt)==0)
							{
								echo "<h3><center>No trips completed in the past 30 days!</center></h3>";
							}
							else
							{
								echo "<table cellpadding=\"10\"";
								echo "<tr><th>PNR</th>
								<th>Date of Reservation</th>
								<th>Flight No.</th>
								<th>Journey Date</th>
								<th>Class</th>
								<th>Booking Status</th>
								<th>No. of Passengers</th>
								<th>Payment ID</th>
								</tr>";
								while(mysqli_stmt_fetch($stmt)) {
									echo "<tr>
									<td>".$pnr."</td>
									<td>".$date_of_reservation."</td>
									<td>".$flight_no."</td>
									<td>".$journey_date."</td>
									<td>".$class."</td>
									<td>".$booking_status."</td>
									<td>".$no_of_passengers."</td>
									<td>".$payment_id."</td>
									</tr>";
								}
								echo "</table> <br>";
							}
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
						?>
						<br>
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
	<script type="text/javascript">
      function printpage()
      {
        var printButton = document.getElementById("print");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
      }
    </script>

<!-- 
•	Booking_Status
•	Payment_ID -->

		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS
-->

</body>
</html>
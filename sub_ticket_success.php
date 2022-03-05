<?php

    session_start();
    error_reporting(1);
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
                                    <a class="nav-link tm-nav-link" href="sub_admin_homepage.php">Back To Homepage</a></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="sub_book_tickets.php">Book Another Ticket</a>
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
                    <section class="tm-content tm-contact" style="margin:20px">
                        <h2 class="mb-4 tm-content-title">Payment Result<hr></h2>
						<h2>BOOKING SUCCESSFUL</h2><br>
						<h3>Your payment of <strong>&#2547; <?php echo $_SESSION['total_amount']; ?> </strong>has been received.<br><br> Your PNR is <strong><?php echo $_SESSION['pnr'];?></strong>. Your tickets have been booked successfully.</h3>
                        <br>
                        <h3>Your Payment/Transaction ID is <strong><?php echo $_SESSION['payment_id']; ?></strong> Please note it down for future reference.</h3>;
                        <br>
						<span><input style="text-align:center;" type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></span>
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
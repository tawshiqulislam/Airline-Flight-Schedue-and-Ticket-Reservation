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
                                    <a class="nav-link tm-nav-link" href="sub_admin_homepage.php">Back To Homepage</a></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="sub_book_tickets.php">Change Date or Destination</a>
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
                        <h2 class="mb-4 tm-content-title">Book Filght</h2>
                        <?php
						$no_of_pass=$_SESSION['no_of_pass'];
						$class=$_SESSION['class'];
						$count=$_SESSION['count'];
						$flight_no=$_POST['select_flight'];
						$_SESSION['flight_no']=$flight_no;
						//$pass_name=array();
						echo "<h2>ADD PASSENGERS DETAILS</h2>";
						echo "<form action=\"sub_add_ticket_details_form_handler.php\" method=\"post\">";
						while($count<=$no_of_pass)
						{
								echo "<p><strong>PASSENGER ".$count."<strong></p>";
								echo "<table cellpadding=\"0\">";
								echo "<tr>";
								echo "<td class=\"fix_table_short\">Passenger's Name</td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\">Passenger's Age</td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\">Passenger's Gender</td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\">Passenger's Inflight Meal</td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\">Passenger's Frequent Flier ID (if applicable)</td>&nbsp;&nbsp;";
								echo "&nbsp;&nbsp;</tr>";
								echo "<tr>";
								echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>&nbsp;&nbsp;";
								echo "<td class=\"fix_table_short\">&nbsp;&nbsp;";
								echo "<select name=\"pass_gender[]\">&nbsp;&nbsp;";
								echo "<option value=\"male\">Male</option>&nbsp;&nbsp;";
								echo "<option value=\"female\">Female</option>&nbsp;&nbsp;";
								echo "<option value=\"other\">Other</option>&nbsp;&nbsp;";
								echo "</select>";
								echo "</td>";
								echo "<td class=\"fix_table_short\">";
								echo "<select name=\"pass_meal[]\">";
								echo "<option value=\"yes\">Yes</option>";
								echo "<option value=\"no\">No</option>";
								echo "</select>";
								echo "</td>";
								echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_ff_id[]\"></td>";
								echo "</tr>";
								echo "</table>";
								echo "<br><hr>";
								$count=$count+1;
							}
							echo "<br><h2>ENTER TRAVEL DETAILS</h2>";
							echo "<table cellpadding=\"5\">";
							echo "<tr>";
							echo "<td class=\"fix_table_short\">Do you want access to our Premium Lounge?</td>";
							echo "<td class=\"fix_table_short\">Do you want to opt for Priority Checkin?</td>";
							echo "<td class=\"fix_table_short\">Do you want to purchase Travel Insurance?</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td class=\"fix_table\">";
							echo "Yes <input type='radio' name='lounge_access' value='yes' checked/> No <input type='radio' name='lounge_access' value='no'/>";
							echo "</td>";
							echo "<td class=\"fix_table\">";
							echo "Yes <input type='radio' name='priority_checkin' value='yes' checked/> No <input type='radio' name='priority_checkin' value='no'/>";
							echo "</td>";
							echo "<td class=\"fix_table\">";
							echo "Yes <input type='radio' name='insurance' value='yes' checked/> No <input type='radio' name='insurance' value='no'/>";
							echo "</td>";
							echo "</tr>";
							echo "</table>";
							echo "<br><br>";
							echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\"><br>";
							echo "</form>";
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
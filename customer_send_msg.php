<?php

    session_start();
    error_reporting(0);

    if (isset($_POST['Submit'])) 
    {
        $country = $_POST['country'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lasttname'];
        $email = $_POST['email'];
        if(empty($country) && empty($fname) && empty($lname) && empty($email)){
            echo "<script>";
            echo "alert('Message Not Sent')";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('Message Send')";
            echo "</script>";
        }
         
      }
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
    <style>
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: white;
  color: green;
  padding: 5px 7px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: black;
}

.container {
  border-radius: 5px;
  background-color: #0c304b;
  padding: 20px;
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
                <div class="container">
                    <form action="customer_send_msg.php" method="post">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                        <label for="lname">Email</label><br>
                        <input type="email" id="email" name="email" placeholder="Your Email.." required><br>

                        <label for="country">Country</label>
                        <select id="country" name="country">
                        <option value="australia">Bangladesh</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                        </select>

                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                        <input type="submit" name="Submit" value="Submit">
                    </form>
                    </div>
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
                    <p class="mb-0">Copyright 2022
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
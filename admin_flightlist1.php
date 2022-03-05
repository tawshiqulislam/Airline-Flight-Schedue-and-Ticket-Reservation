<?php
session_start();

$con=mysqli_connect("localhost","root","","airline");
if(!isset($con))
{
    die("Database Not Found");
}


if(isset($_REQUEST["u_sub"]))
{
    
    $id=$_POST['pnr'];

    if($id!='')
    {
        $query=mysqli_query($con ,"select * from flight_details where departure_date='".$id."'");
        $res=mysqli_fetch_row($query);
        $query0=mysqli_query($con ,"select * from flight_details where departure_date='".$id."'");
        $res0=mysqli_fetch_row($query0);
        $query1=mysqli_query($con ,"select * from flight_details where departure_date='".$id."'");
        $res1=mysqli_fetch_row($query1);

    if($res)
    {
        $_SESSION['user']=$id;
    header('location:admin_flightcheck1.php');
    }
    else
    {

    echo '<script>';
    echo 'alert("No Flight")';
    echo '</script>';
    }
    if($res0)
    {
        $_SESSION['user']=$id;
    header('location:admin_flightcheck1.php');
    }
    else
    {

    echo '<script>';
    echo 'alert("No Flight")';
    echo '</script>';
    }



    if($res1)
    {
        $_SESSION['user']=$id;
    header('location:admin_flightcheck1.php');
    }
    else
    {

    echo '<script>';
    echo 'alert("No Flight")';
    echo '</script>';
    }
    }
    else
    {
        echo '<script>';
    echo 'alert("No Flight")';
    echo '</script>';

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
.drbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.drop {
  position: relative;
  display: inline-block;
}

.drop-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.drop-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.drop-content a:hover {background-color: #f1f1f1}

.drop:hover .drop-content {
  display: block;
}

.drop:hover .drbtn {
  background-color: #3e8e41;
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
                    <div class="drop">
                        <a class="nav-link tm-nav-link drbtn" href="#" style="background: black"><b>Search By Different Module</b></a>
                        <div class="drop-content filter">
                            <a class="nav-link tm-nav-link" href="admin_flightlist.php">Search By Date, Origin and Destination</a>
                            <a class="nav-link tm-nav-link" href="admin_flightlist1.php">Search Only By Date</a>
                            <a class="nav-link tm-nav-link" href="admin_flightlist2.php">Search By Origin</a>
                            <a class="nav-link tm-nav-link" href="admin_flightlist3.php">Search By Destination</a>
                        </div>
                    </div>
                    <section class="tm-content">
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Search Flight By Date<hr></h3>
                    <form id="index" action="admin_flightlist1.php" method="post">
                        <div  id="divtop"><br><br>
                        <br>
                        <div class="form-group mb-4">
                            <input type="date" id="u_id" name="pnr" class="form-control" placeholder="YYYY-MM-DD" min=
                            <?php 
                                $todays_date=date('Y-m-d'); 
                                echo $todays_date;
                            ?> 
                            max=
                            <?php 
                                $max_date=date_create(date('Y-m-d'));
                                date_add($max_date,date_interval_create_from_date_string("90 days")); 
                                echo date_format($max_date,"Y-m-d");
                            ?> required>
                            <br>
                            <div class="text-right">
                                <input type="submit" id="u_sub" name="u_sub" value="Check Flights" class="btn btn-big btn-primary"><br>
                            </div>
                            <br>
                            <br>
                            
                        </div>
                        </div>
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
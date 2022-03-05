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
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Current Date Flight<hr></h3>
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Bangladesh AirPort Authority<hr></h3>
                    <?php 
                    $id=date("y/m/d");
                    $query=mysqli_query($con ,"SELECT * FROM flight_details WHERE departure_date='".$id."'");
                    $res=mysqli_fetch_row($query);
                    if($res)
                    {
                        $_SESSION['user']=$id;
                    }
                    else
                    {
                        echo "No Flight";
                    }
                    ?>

                    <?php
                        $q=mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."'");
                        $n=  mysqli_fetch_assoc($q);
                        $stname= $id;
                        $id=$_SESSION['user'];
                        
                        $result = mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."'");
                                            
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>


                        <table class="filter">
                        <p style="font-family:Verdana; font-size:18px; text-align:center">Flight Running on <?php echo ''. $row[3]. '   ' ?>   [ From: <?php echo ''. $row[1]. '   ' ?> To: <?php echo ''. $row[2]. '   ' ?>]</p>
                        <tr class="list-table">  
                          <td colspan="20" width="3%" >
                  
                </td>
            </tr>       
            <tr class="list-table">
              <td>
                <p style="font-family: Verdana;"><b>Flight</b></p></td><b>Jet ID:<i><?php echo ' '. $row[11]. '   ' ?></i></b>
                <td colspan="3">
                  <?php echo ''. $row[0]. '   ' ?>
            </tr>
                  
            <tr class="to-from list-table">
              <td > <p style="font-family: Verdana;"><b>From</b></p></td>
              <td colspan="3"> <?php echo ''. $row[1]. '   ' ?> <?php echo ''. $row[5]. '   ' ?></td>
              <td > <p style="font-family: Verdana;"><b>To</b></p>  </td>
              <td colspan="3"><?php echo ''. $row[2]. '   ' ?> <?php echo ''. $row[6]. '   ' ?></td>
            </tr>
            <tr class="list-table">
              <td> <p style="font-family: Verdana;"><b>Arrival Date</b></p></td>
              <td> <?php echo '' .$row[4] ?></td><br>&nbsp&nbsp
            </tr>
            <br>
          </table>
          <hr>

          <?php
                        }
                    ?>
                        <!--<marquee direction="up" height="89%">
                                       
                        </marquee>-->
                        <br><br>
                        <a href="customer_flightlist.php" class="btn btn-primary">Search More Flight</a>
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
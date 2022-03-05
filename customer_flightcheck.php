<?php

    session_start();
    error_reporting(0);

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
                                    <a class="nav-link tm-nav-link" href="customer_homepage.php"><strong>Back To Homepage</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="book_tickets.php"><strong>Book Ticket</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="customer_flightlist.php"><strong>Check Another Flight Schedule</strong></a>
                                </li>
                                
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            <?php
              $q=mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."' and from_city='".$_SESSION['user1']."' and to_city='".$_SESSION['user2']."'");
              $n=  mysqli_fetch_assoc($q);
              $stname= $n['pnr'];
              $id=$_SESSION['user'];
              
              $result = mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."' and from_city='".$_SESSION['user1']."' and to_city='".$_SESSION['user2']."'");
                                  
              while($row = mysqli_fetch_array($result))
              {
            ?>
            
            <div class="tm-row filter">
                <div class="tm-col-left"></div>
                <main class="tm-col-right tm-contact-main">
                    <section class="tm-content tm-contact" style="margin:20px">
                        <h2 class="mb-4 tm-content-title">Flight Result<hr></h2>
                        <table>
                        <p style="text-align:center;"><img src='img/air-logo.jpg' class='img-thumbnail' width='100px' style='height:100px;'></p>
                  <h3 style="text-align:center" class="mb-5 tm-content-title">Bangladesh AirPort Authority<hr></h3>
			            <p style="font-family:Verdana; font-size:18px; text-align:center">Flight Running on <?php echo ''. $row[3]. '   ' ?>   [ From : <?php echo ''. $row[1]. '   ' ?> To : <?php echo ''. $row[2]. '   ' ?>]</p>
                  <tr class="list-table">  
                  <td colspan="20" width="3%" >
                  <?php
                    $picfile_path ='images/maxx';
                    $result1 = mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."'");
                    while($row1 = mysqli_fetch_array($result1))
                    {                  
                      $picsrc=$picfile_path.$row1['s_pic'];
                          
                      //echo "<center><img src='images/' class='img-thumbnail' width='180px' style='height:180px;'></center>";
                      //echo"<div>";
                    }
                  ?>
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
              <td><p style="font-family: Verdana;"><b>Price Economy Class</b></p></td>
              <td> <?php echo '&#2547 ' .$row[9] ?> </td>
              <td><p style="font-family: Verdana;"><b>Price Business class</b></p></td>
              <td> <?php echo '&#2547 ' .$row[10] ?> </td>
            </tr>
            <br>
            
          </table>
        </div>
      </div>
    </div>
    <hr>
<?php
  }
?>
        <div>
          <span><input style="text-align:center;" type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></span>
          
        </div>
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
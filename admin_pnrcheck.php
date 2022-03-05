<?php
	session_start();
  $con=mysqli_connect("localhost","root","","airline");
  $q=mysqli_query($con,"select pnr,flight_no,journey_date, class, booking_status, no_of_passengers, lounge_access, priority_checkin, insurance, payment_id, customer_id from ticket_details where pnr='".$_SESSION['user']."'");
  $n=  mysqli_fetch_assoc($q);
  $stname= $n['pnr'];
  $flight_no= $n['flight_no'];
  $journey_date= $n['journey_date'];
  $class= $n['class'];
  $booking_status= $n['booking_status'];
  $no_of_passengers= $n['no_of_passengers'];
  $lounge_access= $n['lounge_access'];
  $priority_checkin= $n['priority_checkin'];
  $insurance= $n['insurance'];
  $payment_id= $n['payment_id'];
  $customer_id= $n['customer_id'];
  $id=$_SESSION['user'];
  $x = mysqli_query($con,"SELECT departure_time, from_city, to_city FROM flight_details WHERE flight_no='".$flight_no."' and departure_date='".$journey_date."'");
  $y=  mysqli_fetch_assoc($x);
  $departure_time = $y['departure_time'];
  $from_city = $y['from_city'];
  $to_city = $y['to_city'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arif Airlines</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">
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
                                    <a class="nav-link tm-nav-link" href="admin_homepage.php"><strong>Back To Homepage</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="admin_pnr.php"><strong>Check Another Ticket</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="admin_flightlist.php"><strong>Check Flight Schedule</strong></a>
                                </li>
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row filter">
                <div class="tm-col-left"></div>
                <main class="tm-col-right tm-contact-main">
                  <?php
                    $result = mysqli_query($con,"SELECT * FROM passengers WHERE pnr='".$_SESSION['user']."'");           
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <hr style="border: 1px solid black;border-style: dashed;">
                    <section class="tm-content tm-contact" style="margin:20px">
                    
                    <h4 style="text-align:center; font-family: Arvo, serif;">Airpot Authority of Bangladesh</h4><hr><br>
                    <h2 style="text-align:center; font-family: Chakra Petch, sans-serif;">Boarding Pass - Flight Reservation Slip<h2><h4 style="font-family: Times New Roman"><?php echo $booking_status;?></h4>
                    
                    
                    <table class="table table-bordered" style="font-family: Verdana">
                        <tr>
                        <td colspan="2" width="10%" >
                        <div id="qrcode">
                        <?php
                        require_once 'qr/qrlib.php';
                        $path = 'qr-image/';
                        $file = $path.uniqid().".png";
                            $text = "PNR: ".$stname." ";
                            $text .= "Payment ID: " .$payment_id. " \n";
                            $text .= "Flight Number: " .$flight_no. " \n";
                            $text .= "Journey Date: " .$journey_date. " \n";
                            $text .= "From: " .$from_city. " \n";
                            $text .= "To: " .$to_city. " \n";
                            $text .= "Class: " .$class. " \n";
                            $text .= "Cunstomer ID: " .$customer_id. " \n";
                            $text .= "No. of Passanger: " .$no_of_passengers. " \n";
                            QRcode::png($text, $file, 'L', 9, 2);
                            echo "<center><img src='".$file."'></center>";
                        ?>
                        </div>
                        <?php
                          
                        
                                //$picfile_path ='img/air-logo.jpg';
                                //$result1 = mysqli_query($con,"SELECT * FROM passengers where pnr='".$_SESSION['user']."'");
                                //$row1 = mysqli_fetch_array($result1)  ; 
                                //$picsrc=$picfile_path.$row1['s_pic'];
                                //echo "<center><img src='images/air-logo.jpg' class='img-thumbnail' width='180px' style='height:180px;'></center>";
                        ?>
                        <td style="width:3%;" style="font-family: Verdana;">PNR :<hr>Flight No :<hr>Date of journey :<hr>Class :<hr>Payment ID :<hr>Lounge Access :<hr>Priority Checkin :<hr>Status:<hr>No. of Passengers:</td>
                        <td style="width:3%;" colspan="3"> <?php echo $id;?><hr><?php echo $flight_no;?><hr><?php echo $journey_date;?>(<?php echo $departure_time;?>)<hr><?php echo $class;?><hr><?php echo $payment_id;?><hr><?php echo $lounge_access;?><hr><?php echo $priority_checkin;?><hr><?php echo $booking_status;?><hr><?php echo $no_of_passengers;?></td>
                        </td>
                        </tr>


            
                        
                        <tr style="width:5%">
                            <td style="width:4%;">PNR :</td>
                            <td style="width:5%;" colspan="3"> <?php echo $stname;?> </td>
                        </tr>
                        <tr>
                            <td >From :</td>
                            <td colspan="1"> <?php echo $from_city;?> </td>
                            <td >To :</td>
                            <td> <?php echo $to_city;?> </td>
                        </tr>
                        
                        <tr>
                            <td>Passenger No :</td>
                            <td colspan="3"> <?php echo ''. $row[0]. '   ' ?>
                        </tr>
                        
                        <tr>
                            <td >Name</td>
                            <td colspan="3"> <?php echo ''. $row[2]. '   ' ?><br>
                            <?php echo ' Age - '.$row[3] ?></td>
                        </tr>
                        
                        <tr>
                            <td>Gender</td>
                            <td  colspan="3"><?php echo $row[4] ?> </td>
                        </tr>
                        
                        <tr>
                            <td>Meail Choice</td>
                            <td> <?php echo $row[5] ?></td>
                            <td>Insurance :<hr>Booked By (Username) :<hr>Frequent Flier No. (If any)</td>
                            <td> <?php echo $insurance;?><hr><?php echo $customer_id;?><hr><?php echo $row[6] ?></td>

                        </tr>
                    </table>
                    </section>
                    <hr style="border: 1px solid black;border-style: dashed;">
                    <?php
                      }
                    ?>
                </main>
            </div>
        </div>        

        
    </div>

    <input style="text-align:center;margin:20px" type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();">

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

</body>
</html>
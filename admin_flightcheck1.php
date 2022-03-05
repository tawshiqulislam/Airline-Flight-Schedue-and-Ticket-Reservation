<?php

    session_start();
    error_reporting(0);

$con=mysqli_connect("localhost","root","","airline");
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arif Airline</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/style_in.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
    <script type="text/javascript">
      function printpage()
      {
        var printButton = document.getElementById("print");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
      }
    </script>
  </head>
  <body>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <?php
          $q=mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."'");
          $n=  mysqli_fetch_assoc($q);
          $stname= $n['pnr'];
          $id=$_SESSION['user'];
          
          $result = mysqli_query($con,"SELECT * FROM flight_details WHERE departure_date='".$_SESSION['user']."'");
                              
                              while($row = mysqli_fetch_array($result))
                                {
          ?>
          <p style="text-align:center;"><img src='img/air-logo.jpg' class='img-thumbnail' width='100px' style='height:100px;'></p>
          <table>
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
            
          </table>
        </div>
      </div>
    </div>
    <hr>
<?php
  }
?>
        <div class="check_another">
          <br>
          <br>
          <span><input style="text-align:center;" type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></span>
          <h3><a href="admin_flightlist1.php">Check other Date</a></h3>
          <h3><a href="admin_homepage.php">Back To Homepage</a></h3>
        </div>
    
    </body>
</html>


 
            
    </body>
</html>
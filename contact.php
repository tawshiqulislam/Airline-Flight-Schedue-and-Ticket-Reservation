<?php

    session_start();
    error_reporting(0);
?>

<?php
    if(isset($_POST['"Send Message"'])){
        echo "<script>";
        echo "alert('You need to Log in First')";
        echo "</script>";
        echo "<a class='nav-link tm-nav-link' href=\"login_page.php\">Login & Sign Up</a>";
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
                                    <a class="nav-link tm-nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="flightlist.php">Search Flight</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                        if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Customer')
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"book_tickets.php\">Book Ticket</a>";
                                        }
                                        else if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Administrator')
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"admin_ticket_message.php\">Book Ticket</a>";
                                        }
                                        else
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"login_page.php\">Book Ticket</a>";
                                        }
                                    ?>
                                </li>                            
                                <li class="nav-item">
                                    <?php
                                        if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Customer')
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"customer_homepage.php\">Login & Sign Up</a>";
                                        }
                                        else if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Administrator')
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"admin_homepage.php\">Login & Sign Up</a>";
                                        }
                                        else
                                        {
                                            echo "<a class='nav-link tm-nav-link' href=\"login_page.php\">Login & Sign Up</a>";
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="about.php">About</a>
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
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Contact<hr></h3>
                            <p>Location:  7-14, Nikunja Housing Society, South Khulshi, Chittagong .</P>
                            <p>Permanent Campus:  Plot# S-1, CDA Kolpolok Residential Area, Bakalia, Chittagong.  </P>                        
                            <p>Contact :  88 02333369877, 88 02333369899</p>
                            <p>Mobile  : 01851120791, 01773225500, 01773225511</P>
                            <p>Fax         : +880312869966</P>
                            <p>Email:      admission@portcity.edu.bd</P>
                    </section>
                    <a href="send_msg.php" class="btn btn-primary">Send Us a message</a>
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
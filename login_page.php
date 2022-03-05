<?php
	session_start();
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
                                    <div class="dropdown">
                                            <a class="nav-link tm-nav-link">More</a>
                                            <div class="dropdown-content">
                                                <a class="nav-link tm-nav-link" href="about.php">About</a>
                                                <a class="nav-link tm-nav-link" href="contact.php">Contact</a> 
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
                    <h3 style="text-align:center" class="mb-5 tm-content-title">Login<hr></h3>
                    <!-- UNDER CONSTRUCTION -->
                    <form class="float_form" style="padding-left: 40px" action="login_handler.php" method="POST">
						<fieldset>
							<legend>Login Details</legend>
							<strong>Username:</strong><br>
							<input type="text" name="username" placeholder="Enter your username" required><br><br>
							<strong>Password:</strong><br>
							<input type="password" name="password" placeholder="Enter your password" required><br><br>
							<strong>User Type:</strong><br>
							Customer <input type='radio' name='user_type' value='Customer' checked/> &nbsp;&nbsp;&nbsp;&nbsp;
                            Sub-Admin <input type='radio' name='user_type' value='sub_admin'/> &nbsp;&nbsp;&nbsp;&nbsp;
                            Administrator <input type='radio' name='user_type' value='Administrator'/> &nbsp;&nbsp;&nbsp;&nbsp;
							<br><br>
							<?php
								if(isset($_GET['msg']) && $_GET['msg']=='failed')
								{
									echo "<br>
									<strong style='color:red'>Invalid Username/Password</strong>
									<br><br>";
								}
							?>
							<input type="submit" name="Login" value="Login">
						</fieldset>
						<br>
						<a href="new_user.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Create New User Account?</a>
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
                    <p class="mb-0">Copyright 2022</p>
                </footer>
            </div>  
        </div>


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
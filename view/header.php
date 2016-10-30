
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
	<title>Spring Hotel</title>
    <!-- link to CSS -->
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../view/ajax/jquery-1.2.6.min.js"></script>
    <script src="js/javascript.js" type="text/javascript"></script>
   
    <link rel="stylesheet" href="../view/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" href="../view/jquery-ui-1.12.1/jquery-ui.structure.css">
    
    <script src="../view/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="../view/jquery-ui-1.12.1/jquery-ui.js"></script>
      <script>

    
          $( function() {
            $( "#datepicker_in" ).datepicker({ minDate: -0, maxDate: "+1Y +10D", dateFormat: 'yy-mm-dd' });
        
          } );
          
          $( function() {
            $( "#datepicker_out" ).datepicker({ minDate: +1, maxDate: "+1Y +10D", dateFormat: 'yy-mm-dd' });
          } );
          
           
          //Book Now Button
          function bookNow() {
                document.getElementById("panel").style.display = "block";
            }
             
      </script>

</head>
<body>

	<header>
				
		<nav>
			<div class="container">
				<div class="left">
					<p class="logo"><img src="images/logo.png" alt="logo"></p>
				</div> <!-- end left -->
                
				<div class="right">
					<ul>
						<li class="active"><a href="../view/home.php">Home</a></li>
						<li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact us</a></li>
                        <?php
                       
                        if (isset($_SESSION['user'])) {
                            $user_type = $_SESSION['user'];
                            echo '<li><a href="../view/user_account.php">My Account</a></li>';
                            
                        }
                        else {
                            $user_type = 'Anonymous';
                            echo '<li><a href="../view/loginreg.php">Login</a></li>';
                        }
                         if (isset($_SESSION['admin'])) {
                            $user_type = $_SESSION['admin'];
                            echo '<li><a href="../view/memdata.php">My Account</a></li>';
                            
                        }
                         if (isset($_SESSION['reservation_cart'])) {
                            echo '<li><a href="../view/reservation.php">My Cart</a></li>';
                            
                        } 
                             
                        
        
                        ?>
                        
				    </ul>
				</div> <!-- end right -->
			</div> <!-- end container -->
		</nav>	
 		</header>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
	<title>Spring Hotel</title>
    <!-- link to CSS -->
    <link rel="stylesheet" href="css/main.css">
     <script src="js/javascript.js" type="text/javascript"></script>
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
                        <?php
						if (isset($_SESSION['admin'])) {
                            $user_type = $_SESSION['admin'];
                            echo '<li><a href="../view/memdata.php">My Account</a></li>';
                            
                        }
                        ?>
				    </ul>
				</div> <!-- end right -->
			</div> <!-- end container -->
		</nav>	
 		</header>
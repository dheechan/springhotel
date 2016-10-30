
	<footer>
			<section id="copyright">
				<div class="container">
					<div class="left">
						<p class="logo"><img src="images/logoFooter.png" alt="logo"></p>
					</div> <!-- end left -->
					<div class="right">
						<p class="copyright">Spring Hotel &copy; 2016</p>
					</div> <!-- end right -->
				</div> <!-- end container -->
			</section> <!-- end copyright -->
	</footer>
<?php

    // DEBUG
   
    echo '<p>GET    : ' . var_dump($_GET) . '</p>';
    echo '<p>POST   : ' . var_dump($_POST) . '</p>';
    echo '<p>SESSION: ' . var_dump($_SESSION) . '</p>';
        
if (isset($_SESSION['user'])) {
    $user_type = $_SESSION['user'];
    echo ' USER TYPE: ' . $user_type; 
} else {
    $user_type = 'Anonymous';
    echo ' USER TYPE: ' . $user_type; 

}
if (isset($_SESSION['admin'])){
    $user_id = $_SESSION['admin'];
    echo ' USER ID: ' . $user_id;
    
}
    
?>
</body>
</html>

 
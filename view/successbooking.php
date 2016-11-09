<?php
//	start session management
session_start();
    
    if(isset($_POST['check_in']) && isset($_POST['check_out'])) {
        $check_in = $_SESSION['check_in'] = $_POST['check_in'];
        $check_out = $_SESSION['check_out'] = $_POST['check_out'];
        unset($_SESSION['reservation_cart']);
    } else {
        if(!isset($_SESSION['check_in']) && !isset($_SESSION['check_out'])) {
            header('Location: home.php');
        } else {
             $check_in = $_SESSION['check_in'];
             $check_out = $_SESSION['check_out'];
        }
    }
    
//	//include authorisation management
//	require('../controller/authorisation.php');
	//connect to the database
//	require('../model/database.php');
	//retrieve the functions
//	require('../model/functions_rooms.php');
//	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Success Booking";
	
	//retrieve the navigation
    require('header.php');
//    require('banner.php');
//    require('checkdate.php');

?>
    
    <div class="container">
       
    <h1>THANK YOU FOR BOOKING! HAVE A GREAT DAY</h1>  
    
            
   
    </div>



<!--        </div>-->
 <div class="spacediv"></div>
        
<?php
    
    require('footer.php');
    

    ?>
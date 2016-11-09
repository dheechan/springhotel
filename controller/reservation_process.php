<?php
	//start session management
	session_start();

 
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_reservation.php');
?>

<?php
	//retrieve the registration details into the form
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $phone = ($_POST['phone']);
    $email = ($_POST['email']);

    
  
    if(isset($_SESSION['user'])){
            
            $result = add_booking($firstName, $lastName, $phone, $email);
        //    $add_items =  add_bookingitems();
//        	var_dump($result);
//            exit;
            //create user messages
                if($result)
                {  

                    unset($_SESSION['reservation_cart']);
                    header('location:../view/successbooking.php');

                }
                else
                {

                    header('location:../view/booking.php');
                }
        } 


        if(!isset($_SESSION['user'])){
        $result_an = add_booking_anonymous($firstName, $lastName, $phone, $email);
        if($result_an)
            {  

                unset($_SESSION['reservation_cart']);
                header('location:../view/successbooking.php');

            }
            else
            {

                header('location:../view/booking.php');
            }
    }

    
?>
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

    
  

	//call the add_user() function
	$result = add_booking($firstName, $lastName, $phone, $email);
	var_dump($result);
    exit;
	//create user messages
	if($result)
	{
		//redirect to loginreg.php
		header('location:../view/reservation.php');
	}
    else
	{

		header('location:../view/booking.php');
	}
?>
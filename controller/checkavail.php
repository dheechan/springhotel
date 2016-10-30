<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_rooms.php');
	
	//retrieve the username and password entered into the form
	$check_in = $_POST['check_in'];
//    $check_in->format('Y-m-d');
	$check_out = $_POST['check_out']; 
//	$check_out->format('Y-m-d');
	
	//call the login() function
	$result = avail_date($check_in, $check_out);
	var_dump($result);
    exit;
	//if there is one matching record
	if($result == 1) 
	{ 
        
		echo "NOT AVAILABLE";
	}
	else
	{
        header('location:../view/bookroom.php');
} 

?>    
	

    
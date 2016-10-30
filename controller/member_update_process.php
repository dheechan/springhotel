<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_memberdata.php');
	
	//retrieve the data that was entered into the form fields using the $_POST array
	$memberID = $_POST['memberID']; //the value in the hidden form field
	$memberfirstname = $_POST['firstName'];
    $memberlastname = $_POST['lastName'];
	$memberemail = $_POST['email'];

	
	//END SERVER-SIDE VALIDATION
		
		
		$result = update_member($memberID, $memberfirstname, $memberlastname, $memberemail);
       // var_dump($result);
        //exit;
		//create user messages
		if($result == true)
		{
			
			$_SESSION['success'] = 'Member successfully updated.';
			
			header('location:../view/memdata.php');
		}
		else
		{
			
			$_SESSION['error'] = 'An error has occurred. Please try again.';
		
			header('location:../view/memdata.php');
		}

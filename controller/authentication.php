<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_users.php');
	
	//retrieve the username and password entered into the form
	$adminusername = $_POST['username_two'];
	$adminpassword = $_POST['password_two']; 
	
	
	//call the login() function
	$count = login_admin($adminusername, $adminpassword);
	//var_dump($count);
   // exit;
	//if there is one matching record
	if($count == 1)
	{ 
        
		//start the user session to allow authorised access to secured web pages
		$_SESSION['admin'] = $adminusername;

		//if login is successful
		$_SESSION['success'] = 'Hello ' . $adminusername . '. Have a great day!';
		//redirect to memdata.php
		header('location:../view/memdata.php');
	}
	else
	{
		//if login not successful, create an error message to display on the login page
		$_SESSION['error']= 'Incorrect username or password. Please try again.';
		//redirect to login.php
		header('location:../view/loginreg.php');
	}

    
?>
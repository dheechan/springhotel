<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_users.php');
    require('../model/functions_memberdata.php');
	
	//retrieve the username and password entered into the form
	$username = $_POST['username_mem'];
	$password = $_POST['password_mem']; 
	
    //call the retrieve_salt() function
	$result = retrieve_salt($username);
	
	//retrieve the random salt from the database
	//generate the hashed password with the salt value
    $password = hash('sha256', $password); 	

	//call the login() function
	$count = login_member($username, $password);
    $result = get_bookings($username);
	//var_dump($count);
    //exit;
	//if there is one matching record
	if($count == 1)
	{ 
        
		//start the user session to allow authorised access to secured web pages
		$_SESSION['user'] = $username;
    
        
		//if login is successful
		$_SESSION['success'] = 'Hello ' . $username . '. Have a great day!';
		//redirect to memdata.php
		header('location:../view/user_account.php');
	}
	else
	{
		//if login not successful, create an error message to display on the login page
		$_SESSION['error']= 'Incorrect username or password. Please try again.';
		//redirect to login.php
		header('location:../view/loginreg.php');
	}

    
?>
<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_memberdata.php');
?>

<?php
	//retrieve the memberID from the URL	
	$memberID = $_GET['memberID'];

	//call the delete_member() function
	$result = delete_member($memberID);
	//var_dump($result);
    //exit;
	//create user messages
	if($result){
		//if member is successfully added
		$_SESSION['success'];
		//redirect to memdata.php
		header('location:../view/memdata.php');
	}else{
		//if product is not successfully added
		$_SESSION['error'];
		//redirect to memdata.php
		header('location:../view/memdata.php');
	}
?>

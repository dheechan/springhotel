<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_rooms.php');
	
	//retrieve the data that was entered into the form fields using the $_POST array
	$roomID = $_POST['roomID']; //the value in the hidden form field
	$roomtype = $_POST['roomtype'];
    $roomdescription = $_POST['roomdescription'];
	$roomcapacity = $_POST['roomcapacity'];
    $roomprice = $_POST['roomprice'];
    $roomavailquantity = $_POST['roomavailquantity'];     
    $roomimage = $_POST['roomimage'];
    
//    if (empty($roomtype) || empty($roomdescription) || empty($roomprice)) 
//	{ 
//		//if required fields are empty initialise a session called 'error' with an appropriate user message
//		$_SESSION['error'] = 'All * fields are required.'; 
//		//redirect to the product_update_form page to display the message
//		header("location:../view/updateroom.php");
//		exit();
//	}
//	//check if a valid price has been entered
//	elseif(!is_numeric($roomprice))
//	{
//		//if invalid data is entered into the price field initialise a session called 'error' with an appropriate user message
//		$_SESSION['error'] = 'Please enter a valid price.'; 
//		//redirect to the product_update_form page to display the message
//		header("location:../view/updateroom.php");
//		exit();
//	}

    if(!empty($_FILES['roomimage']['name']))
	{
		$roomimage = $_FILES['roomimage']['name']; //the PHP file upload variable for a file
		$randomDigit = rand(0000,9999); //generate a random numerical digit <= 4 characters
		$newPhotoName = strtolower($randomDigit . "_" . $roomimage); //attach the random digit to the front of uploaded images to prevent overriding files with the same name in the images folder and enhance security
		$target = "../view/images/" . $newPhotoName; //the target for uploaded images

		$allowedExts = array('jpg', 'jpeg', 'gif', 'png'); //create an array with the allowed file extensions
		$tmp = explode('.', $_FILES['productPhoto']['name']); //split the file name from the file extension
		$extension = end($tmp); //retrieve the extension of the photo e.g., png
		
		//check if the file is less than the maximum size of 500kb
		if($_FILES['roomimage']['size'] > 512000)
		{
			//if file exceeds maximum size initialise a session called 'error' with an appropriate user message
			$_SESSION['error'] = 'Your file size exceeds maximum of 500kb.'; 
			//redirect to the product_update_form page to display the message
			header("location:../view/updateroom.php");
			exit();
		}
		//check that only accepted image formats are being uploaded
		elseif(($_FILES['roomimage']['type'] == 'image/jpg') || ($_FILES['roomimage']['type'] == 'image/jpeg') || ($_FILES['roomimage']['type'] == 'image/gif') || ($_FILES['roomimage']['type'] == 'image/png') && in_array($extension, $allowedExts))
		{			
			move_uploaded_file($_FILES['roomimage']['tmp_name'], $target); //move the image to images folder
		}
		else
		{
			//if a disallowed image format is uploaded initialise a session called 'error' with an appropriate user message
			$_SESSION['error'] = 'Only JPG, GIF and PNG files allowed.'; 
			//redirect to the product_update_form page to display the message
			header("location:../view/updateroom.php");
			exit();
		}

    //END SERVER-SIDE VALIDATION
		$result = update_room_with_photo($roomID,$roomtype, $roomdescription, $roomcapacity, $roomprice, $roomavailquantity, $roomimage);
        
		if($result)
		{
			$_SESSION['success'] = 'Room successfully updated.';
			header('location:../view/memdata.php');
		}
		else
		{
			
			$_SESSION['error'] = 'An error has occurred. Please try again.';
			
			header('location:../view/memdata.php');
		}
	}
else
	{
		$result = update_room($roomID,$roomtype, $roomdescription, $roomcapacity, $roomprice, $roomavailquantity);
       // var_dump($result);
        //exit;
		//create user messages
		if($result == true)
		{
			
			$_SESSION['success'] = 'Room successfully updated.';
			
			header('location:../view/memdata.php');
		}
		else
		{
			
			$_SESSION['error'] = 'An error has occurred. Please try again.';
		
			header('location:../view/memdata.php');
		}
    }
?>
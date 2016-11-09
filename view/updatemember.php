<?php
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation_admin.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_memberdata.php');
	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Update Member";
	
	//retrieve the header
	require('header_two.php');
    
?>

<div class="container">  

    <?php
            $memberID = $_GET['memberID'];
            $result = get_memdetails();

        ?>
      
        <form action="../controller/member_update_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="memberID" id="memberID" value="<?php echo $memberID ?>" />
        First Name<br>
        <input type="text" name="firstName" value="<?php echo $result['memberfirstname'] ?>" /><br>
        Last Name<br>
        <input type="text" name="lastName" value="<?php echo $result['memberlastname'] ?>" /><br>
        Email<br>
        <input type="text" name="email" value="<?php echo $result['memberemail'] ?>" /><br> 

           
        
        <input type="submit" value="Save" />
         <div class="smbreak"></div>   
        <h3> <a href = "../view/memdata.php">&#8592; Go Back</a></h3>  
            
        </form>
       
    </div>

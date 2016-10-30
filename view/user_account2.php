<?php
session_start();
	//include authorisation management
	require('../controller/authorisation.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions

	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Member Database";
	
	//retrieve the navigation
    require('header_two.php');

?>
<div class="container">
<?php
    echo "Hello user!"
?>

<div><a class="buttondel" href = "../controller/logout_process.php"> logout</a></div>
</div>
<?php
    
    require('footer.php');
    

    ?>
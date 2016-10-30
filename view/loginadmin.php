<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_messages.php');
	
	//provide the value of the $title variable for this page
	$title = "Registration and Login";
	
	//retrieve the header
	require('header_two.php');

	if(isset($_SESSION['user']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the login page
		header('location:../view/user_account.php');
	} 
     if(isset($_SESSION['admin']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the login page
		header('location:../view/memdata.php');
	}    
        
?>
  

    <div class="container">  
        	<h1 class="centertext">Welcome</h1>
        <p class="centertext">We're happy to see you return! Please login to continue.</p>
        <p class="centertext">*Registration is for members only*</p>
         <p class="centertext">*Only admin can login at this moment*</p>
        <p class="centertext">*Username: admin | Password: password*</p>
        
	
	<?php
		//call user_message() function
		$message = user_message();
	?>
        <div class="containerlogin">
            
       <form action="../controller/authentication.php" onsubmit="return(A());" method="post" >
            
            Username<br>
            <input type="text" size="30" name="username_two" /required > <br/>
            Password<br>
            <input type="password" name="password_two" size="30" maxlength="10" /required> <br/>
            <input type="submit" name="login" value="Login"> 
            <a id="opendiv" onclick="A()"><h4>Create New Account</h4></a>  
        </form>             
        </div>
     </div>   
	
<?php
	//retrieve the footer
	require('footer.php');
?>
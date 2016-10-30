<?php
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_memberdata.php');
	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Member Database";
	
	//retrieve the navigation
    require('header.php');
//    require('banner.php');
    

?>

<!--
<p style="display:none;" onClick="dontpopUp()" id="exit">x</p>
        <div style="display:none;" onClick="popUp()" id="open">
       
        </div>
-->

  
        <div class="container">
                        
            
         <div class="spacediv">Welcome</div> 
            <ul>
                <li><a href="#" id="myProfile">View Profile</a></li>
                <li><a href="#" id="myBookings">My Bookings</a></li>
            </ul> 
         <a href = "../controller/logout_process.php">Logout</a>   
            <div class="spacediv"></div>   
            
        <form id="hiddenForm" method="post">
            <div class="spacediv">My Bookings</div>  
        <table border="1" cellspacing="2" cellpadding="4" >
            <thead>
                <tr>
                    <th> Booking Date </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Checkin Date </th>
                    <th> Checkout Date </th>
                    <th> Total Rooms </th>
                    <th> Total Nights </th>
                    <th> Total Cost</th>
                    <th> Tax Amount </th>
                </tr>
            </thead>
            <tbody>
            
            
        <?php
        
        $result = get_bookings();
//        var_dump($result);
//    exit;
		
	   ?>            
                
         <?php foreach($result as $row):?>
         <tr class="record">
        
        <td><?php echo $row['date']; ?></td>     
        <td><?php echo $row['firstname']; ?></td>
		<td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['checkindate']; ?></td>
		<td><?php echo $row['checkoutdate']; ?></td>
        <td><?php echo $row['totalrooms']; ?></td>
        <td><?php echo $row['totalnights']; ?></td>
        <td>$<?php echo $row['totalcost']; ?></td>
        <td>$<?php echo $row['taxamount']; ?></td>     
	</tr>
	<?php endforeach; ?>
        </tbody>        
        </table>   
            <br/>

              
        </form>
        
 

       <div id="profile_hidden">

         <?php
        
        $result_mem = member_profile();
//        var_dump($result);
//    exit;
		
	   ?>   
        <?php foreach($result_mem as $row):?>
    
        <div>Name:<?php echo $row['memberfirstname']; ?></div>
        <div>Last Name:<?php echo $row['memberlastname']; ?></div>
        <div>Street Address:<?php echo $row['memberstreet']; ?></div>
        <div>Street Address:<?php echo $row['membersuburb']; ?></div>
        <div>Street Address:<?php echo $row['membercountry']; ?></div>    
        <div>Street Address:<?php echo $row['memberpostcode']; ?></div>    
    

	<?php endforeach; ?>
    </div>

    </div> 
<?php
    
    require('footer.php');
    

    ?>
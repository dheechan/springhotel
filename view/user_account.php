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
<script>
        // Bookings show/hide

        $(document).ready(function(){
            $("#myBookings").click(function(){
//                $("#hiddenForm").toggle();
                hiddenForm.style.display="block";
                profile_hidden.style.display="none";
            });
        });
    // Profile show/hide

        $(document).ready(function(){
            $("#myProfile").click(function(){
//                $("#profile_hidden").toggle();
                profile_hidden.style.display="block";
                hiddenForm.style.display="none";
            });
        });
</script>          
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
            <div class="break"></div>
      

            
        <form id="hiddenForm" method="post">
            <div class="spacediv">My Bookings</div>  
        <table border="1" cellspacing="2" cellpadding="4" >
            <thead>
                <tr>
                    <th> Booking Date </th>
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
	       foreach($result as $row):
    ?>
         <tr class="record">
        
        <td><?php echo $row['date']; ?></td>     
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
    
        <div><h3>Name: <?php echo $row['memberfirstname']; ?></h3></div>
        <div><h3>Last Name: <?php echo $row['memberlastname']; ?></h3></div>
        <div><h3>Street Address: <?php echo $row['memberstreet']; ?></h3></div>
           <div><h3>Suburb: <?php echo $row['membersuburb']; ?></h3></div>
           <div><h3>Country: <?php echo $row['membercountry']; ?></h3></div>    
           <div><h3>Postcode: <?php echo $row['memberpostcode']; ?></h3></div>    
    

	<?php endforeach; ?>
    </div>

    </div> 

<div class="break"></div>
<?php
    
    require('footer.php');
    

    ?>
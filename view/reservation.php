<?php
//	start session management
	session_start();

       if(isset($_POST['check_in']) && isset($_POST['check_out'])) {
        $check_in = $_SESSION['check_in'] = $_POST['check_in'];
        $check_out = $_SESSION['check_out'] = $_POST['check_out'];
        unset($_SESSION['reservation_cart']);
    } else {
        if(!isset($_SESSION['check_in']) && !isset($_SESSION['check_out'])) {
            header('Location: home.php');
        } else {
             $check_in = $_SESSION['check_in'];
             $check_out = $_SESSION['check_out'];
        }
    }
//	//include authorisation management
//	require('../controller/authorisation.php');
	//connect to the database
	require('../model/database.php');
//	//retrieve the functions
//	require('../model/functions_rooms.php');
//	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Pay Reservation";
	
	//retrieve the navigation
    require('header.php');
    require('banner.php');

    

?>
 <div class="container">
      <div class="spacediv"></div>
 <div class="left_info">
    
      <h2>Guest Details</h2>
     <div class="break"></div>
     
<form class="leftform" action="../controller/reservation_process.php" method="post" target="_self">
            
            <input type="text" name="firstName" id="firstName" required placeholder="  First name*" /><br />
            <input type="text" name="lastName" id="lastName"  required placeholder="  Last name*" /><br />
            <input type="tel" name="phone" id="phone" required placeholder="  Phone number*" pattern=".{10,}" title="Include your area code. Numbers only." /><br />
            <input type="email" name="email" id="email" placeholder="  Email address*" required /><br />               <div class="break"></div> 
            Payment Method:*
            <select>
            <option value="paypal">Paypal</option>
            </select><br/>
    
            <input id="roomtype" name="hidden_roomtype" type="hidden" value="<?php echo $values['roomtype']; ?>">          
            <input id="roomprice" name="hidden_roomprice" type="hidden" value="<?php echo $row['roomprice']; ?>">
            <input type="submit" name= "paynow" value="Pay Now" id="paynow"> 
                    
        </form>
     </div>
        <div class="spacediv"></div>
      <div class="right_room">
        <h2>SUMMARY</h2>
        <div class="break"></div>
  
        <h3>Check-in Date: <?php echo $_SESSION['check_in']; ?></h3>
        <h3>Check-out Date: <?php echo $_SESSION['check_out']; ?></h3>
 
        <div class="break"></div>
         
   

     <?php
        $total = 0;
       foreach($_SESSION["reservation_cart"] as $keys => $values)
		{
			?>

            <h4>Room Name: <?php echo $values["roomtype"]; ?></h4>
            <h4>Room Quantity: <?php echo $values["quantity"] ?></h4>
            <h4>Price per night: $<?php echo $values["roomprice"]; ?></h4>
            <h4>Total: $ <?php echo number_format($values["quantity"] * $values["roomprice"], 2); ?></h4><br/>
   
          
            <?php 
			$total = $total + ($values["quantity"] * $values["roomprice"]);
            $tax = $total / 10; 
		} 
     ?>  
       <div></div>
       <h3>Total Number of Nights: <?php $diff = strtotime($_SESSION['check_in']) - strtotime($_SESSION['check_out']);
            echo $diff/86400*(-1); ?></h3>
       <h3>Tax Included: $<?php echo number_format($tax, 2);?></h3>
       <h3>Total: $<?php echo number_format($total, 2); ?></h3>
       
   <br/>
        
  
        </div>



     </div>
 <div class="spacediv"></div>
        
<?php
    
    require('footer.php');
    

    ?>
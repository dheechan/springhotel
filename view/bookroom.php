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
	//retrieve the functions
	require('../model/functions_rooms.php');
//	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Book Room";
	
	//retrieve the navigation
    require('header.php');
    require('banner.php');
    require('checkdate.php');

?>
    
    <div class="container">
        <div class="left_room2">
        <div class="room_container">
                        
            
         <div class="spacediv"></div>    
    
            
    <?php

            
    $result = get_rooms();
    foreach($result as $row):      
      
    $check_avail = check_avail($check_in, $check_out, $row['roomtype']);   
      //
    $get_roomtype = get_roomtype($row['roomtype']); 
//    echo $check_avail;
//    exit;        
//    $room_result = get_roomdata();        
    foreach ($get_roomtype as $bookings):
           // echo $bookings['roomavailquantity']-$check_avail;

    if(($bookings['roomavailquantity'] - $check_avail) != 0) { 
      
	?>
       
        <div class="spacediv"></div>
       
        <div class="left_room"><?php echo ('<img src="data:image/jpeg;base64,' .base64_encode ( $row['roomimage'] ).'"/>'); ?></div> 
        <h2><?php echo $row['roomtype']; ?></h2>
        <div class="spacediv_room"></div>    
        <h5><?php echo $row['roomdescription']; ?></h5>
<!--        <div class="spacediv_room"></div>     -->
        <h3>Room Capacity: Max <?php echo $row['roomcapacity']; ?> people </h3>
        <h3>Rate: $<?php echo $row['roomprice']; ?> </h3>
         <form  class="leftform_book" action="bookroom.php?action=add&roomID=<?php echo $row['roomID']; ?>" class="book_form" name="book_rooms" method="POST"> 
             
     <?php if(isset($_POST['booknow']))
        {
            
            if(isset($_SESSION["reservation_cart"]))
            {
                
               $item_array_roomID = array_column($_SESSION["reservation_cart"], "roomID");
                if(!in_array($_GET['roomID'], $item_array_roomID)){
                    $count = count($_SESSION["reservation_cart"]);
                    $item_array = array(
                    'roomID' => $_GET["roomID"],
                    'roomtype' => $_POST["hidden_roomtype"],
                    'roomprice' => $_POST["hidden_roomprice"],
                    'quantity' => $_POST["quantity"] 
                    );
                    $_SESSION["reservation_cart"][$count] = $item_array;
//                    echo '<script>window.location="bookroom.php"</script>';
                }
//                else{
//                    echo '<script>alert("Item Already Added")</script>';
//                    echo '<script>window.location="../view/bookroom.php")</script>';
//                }
            }else{
                $item_array = array(
                'roomID' => $_GET["roomID"],
                'roomtype' => $_POST["hidden_roomtype"],
                'roomprice' => $_POST["hidden_roomprice"],
                'quantity' => $_POST["quantity"]      
                );
                $_SESSION["reservation_cart"][0] = $item_array;
            }
        }
        if(isset($_GET["action"]))
        {
            if($_GET["action"] == "delete")
            {
                foreach($_SESSION["reservation_cart"] as $keys => $values)
                {
                    if($values["roomID"] == $_GET["roomID"])
                    {
                        
                        unset($_SESSION["reservation_cart"][$keys]);
                         $_SESSION["reservation_cart"] = array_values($_SESSION["reservation_cart"]);
//                        echo '<script>window.location="bookroom.php"</script>';

                    }
                }
            }
        }
        ?>

        <input id="roomtype" name="hidden_roomtype" type="hidden" value="<?php echo $row['roomtype']; ?>">            
        <input id="roomprice" name="hidden_roomprice" type="hidden" value="<?php echo $row['roomprice']; ?>">
           
        Room Quantity:
        <input id="roomtype" name="quantity" type="text" maxlength="1" size="4" value="1">     
             
         <input type="submit" name= "booknow" value="Book Now" id="booknow" >
           
<!--           <div class="break"></div>  -->
<!--        <a class="bookfont">BOOK THIS ROOM</a>    -->
        </form>
        
<!--        <div class="spacediv"></div>-->
            
            
        

	   <?php 
        }  endforeach;   
           endforeach;      
 
            ?>  
            </div>
            
        </div>
    <div class="spacediv"></div>
<!--       <div id="panel">-->
    <?php if(isset($_SESSION['reservation_cart'])): ?>
        <div class="right_room">
        <h2>My Reservation Cart</h2>
        
 
        <h3>Check-in Date: <?php echo $_SESSION['check_in']; ?></h3>
        <h3>Check-out Date: <?php echo $_SESSION['check_out']; ?></h3>
    <br/>
        
         
    <div class="leftform">

     <?php
        $total = 0;
       foreach($_SESSION["reservation_cart"] as $keys => $values)
		{
			?>
             <h4><a href="bookroom.php?action=delete&roomID=<?php echo $values["roomID"]; ?>"> <span>REMOVE X</span></a></h4>
            <h4>Room Name: <?php echo $values["roomtype"]; ?></h4>
            <h4>Room Quantity: <?php echo $values["quantity"] ?></h4>
            <h4>Price per night: $<?php echo $values["roomprice"]; ?></h4>
            <h4>Amount: $ <?php echo number_format($values["quantity"] * $values["roomprice"], 2); ?></h4><br/>
   
          
            <?php 
			$total = $total + ($values["quantity"] * $values["roomprice"]);
//            $tax = $total / 10; 
		} 
     ?>  
       <div></div>
<!--       <h3>Tax Included: $<?php echo number_format($tax, 2);?></h3>-->
       <h3>Total: $<?php echo number_format($total, 2); ?></h3>
       
   <br/>
        
    <form class="reservebutton" action="../view/reservation.php" method="POST">
    
             
         <input type="submit" name= "reservenow" value="RESERVE NOW" id="reservenow">      
<!--        <a class="bookfont">BOOK THIS ROOM</a>    -->
        </form> 
        </div>

</div>
<?php endif; ?>
           </div>



<!--        </div>-->
 <div class="spacediv"></div>
        
<?php
    
    require('footer.php');
    

    ?>
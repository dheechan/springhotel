<?php
require('../model/database.php');
	//retrieve the functions
        
		global $conn;

        $getbooking = $_GET['bookingID'];
//        var_dump($getbooking);
//        exit();
		//query the database to select all data from the membertable
//		$sql = "SELECT A.bookingID, A.date, A.firstname, A.lastname, A.checkindate, A.checkoutdate, A.totalrooms, A.totalnights, A.totalcost  FROM booking as A JOIN booking_items as B ON A.bookingID=B.bookingID  ORDER BY date DESC";	
            
        $sql = "SELECT bookingID, date, firstname, lastname, checkindate, checkoutdate, totalrooms, totalnights, totalcost FROM booking WHERE bookingID = '$getbooking'";

		//use a prepared statement to enhance security
        $statement = $conn->query($sql);
//        $statement->bindValue(':bookingID', $_GET['bookingID']);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
    
//        $json=json_encode($results);
//        echo $json; 
?>
 <?php foreach($results as $row):?>
<div class="mid_div">
<h2>BOOKING DETAILS</h2>
<div class="smbreak"></div>
<div><h3>Booking Ref#: <?php echo $row['bookingID']; ?></h3></div>
<div><h3>Date of Booking: <?php echo $row['date']; ?></h3</div>
<div><h4>Name: <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h4></div>
<div><h4>Check-in Date: <?php echo $row['checkindate']; ?></h4></div>
<div><h4>Check-out Date: <?php echo $row['checkoutdate']; ?></h4></div>
<div><h4>Number of Rooms: <?php echo $row['totalrooms']; ?></h4></div>
<div><h4>Number of Nights: <?php echo $row['totalnights']; ?></h4></div>
<div><h4>Total Cost: <?php echo $row['totalcost']; ?></h4></div>
</div>
<?php endforeach; ?>
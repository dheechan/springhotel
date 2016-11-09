<?php
	function get_rooms()
	{
		global $conn;
		//query the database to select all data from the product table
		$sql = "SELECT * FROM room";		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}
function get_roomtype($roomtype)
	{
		global $conn;
		//query the database to select all data from the product table
		$sql = "SELECT roomavailquantity FROM room WHERE roomtype=:roomtype";		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
        $statement->bindValue(':roomtype', $roomtype);
       	$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
    
		return $result;
	}

function check_avail($check_in, $check_out, $roomtype)
	{
		global $conn;
		//query the database to select all data from the product table
		$sql="SELECT COUNT(B.itemsroomtype) AS booked_rooms FROM booking_items AS B JOIN booking as C ON B.bookingID=C.bookingID WHERE C.checkindate >= :check_in AND C.checkoutdate <= :check_out AND B.itemsroomtype= :roomtype";
//        $sql="SELECT SUM(itemsroomquantity) AS booked_rooms FROM booking_items AS B JOIN booking as C ON B.bookingID=C.bookingID WHERE (C.checkindate BETWEEN :checkin AND :checkout) AND (C.checkoutdate BETWEEN :checkin AND :checkout) AND (B.itemsroomtype= :roomtype)";
    
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
        $statement->bindValue(':check_in', $check_in);
        $statement->bindValue(':check_out', $check_out);
        $statement->bindValue(':roomtype', $roomtype);    
  		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
         foreach($result as $row){
             $count = $row['booked_rooms'];
         }
    //    $return_val = $result['booked_rooms'];
    //    $count = count($result);
      //  $count = $statement->rowCount();	
		return $count;

    }


function update_room($roomID,$roomtype, $roomdescription, $roomcapacity, $roomprice, $roomavailquantity, $roomimage)
	{
       
        global $conn;
		$sql = "UPDATE room SET roomtype = :roomtype, roomdescription = :roomdescription, roomcapacity = :roomcapacity, roomprice = :roomprice, roomavailquantity = :roomavailquantity WHERE roomID = :roomID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':roomtype', $roomtype);
		$statement->bindValue(':roomdescription', $roomdescription);
        $statement->bindValue(':roomcapacity', $roomcapacity);
        $statement->bindValue(':roomprice', $roomprice);
        $statement->bindValue(':roomavailquantity', $roomavailquantity);
        $statement->bindValue(':roomID', $roomID);
 		$result = $statement->execute();
		$statement->closeCursor();
		return $result;		
	}


function get_roomdetails()
	{
	
		global $conn;
		
		//retrieve the memberID from the URL
		$roomID = $_GET['roomID'];
		
		//query the database to select all data from the member table
		$sql = 'SELECT * FROM room WHERE roomID = :roomID';		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':roomID', $roomID);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;

	}
function update_room_with_photo($roomID,$roomtype, $roomdescription, $roomcapacity, $roomprice, $roomavailquantity, $roomimage)
	{
       
        global $conn;
		$sql = "UPDATE room SET roomtype = :roomtype, roomdescription = :roomdescription, roomcapacity = :roomcapacity, roomprice = :roomprice, roomavailquantity = :roomavailquantity, roomimage = :roomimage WHERE roomID = :roomID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':roomtype', $roomtype);
		$statement->bindValue(':roomdescription', $roomdescription);
        $statement->bindValue(':roomcapacity', $roomcapacity);
        $statement->bindValue(':roomprice', $roomprice);
        $statement->bindValue(':roomavailquantity', $roomavailquantity);
        $statement->bindValue(':roomimage', $roomimage);
        $statement->bindValue(':roomID', $roomID);
 		$result = $statement->execute();
		$statement->closeCursor();
		return $result;		
	}


?>
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
		$sql = "SELECT COUNT(*) AS booked_rooms FROM booking WHERE checkindate >= :check_in  AND checkoutdate <= :check_out AND bookingroomtype = :roomtype";	
    
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




//function avail_date($check_in, $check_out)
//	{
//		global $conn;
//		//query the database to select all data from the product table
//		$sql = 'SELECT * FROM booking WHERE checkindate >= :check_in AND checkoutdate <= :check_out';		
//		//use a prepared statement to enhance security
//		$statement = $conn->prepare($sql);
//        $statement->bindValue(':check_in', $check_in);
//        $statement->bindValue(':check_out', $check_out);
////       var_dump($statement);
////        exit;
//		$statement->execute();
//		$result = $statement->fetchAll();
//		$statement->closeCursor();
//		$count = $statement->rowCount();	
//		return $count;
//	}
?>
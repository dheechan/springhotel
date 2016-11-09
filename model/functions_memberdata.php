<?php
	//create a function to retrieve all members data
	function get_memdata()
	{
        
		global $conn;
		//query the database to select all data from the membertable
		$sql = 'SELECT * FROM member ORDER BY memberID DESC    ';		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
  		$statement->closeCursor();
		return $result;
	}

    function get_bookings()
	{
        
		global $conn;
        
        
		//query the database to select all data from the membertable
		$sql = "SELECT * FROM booking as A JOIN member as B ON A.memberID=B.memberID WHERE B.memberusername = '". $_SESSION['user']."' ORDER BY date DESC";		
		//use a prepared statement to enhance security
		$statement = $conn->query($sql);
//        echo $sql;
//        die();
//        $statement->bindValue(':memberID', $memberID);
//		$statement->execute();
		$result = $statement->fetchAll();
  		$statement->closeCursor();
		return $result;
        
      
	}
    
     function member_profile()
        {
            global $conn;
            $sql = "SELECT * FROM member WHERE memberusername = '". $_SESSION['user']."'";
            $statement = $conn->query($sql);
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
    
    function get_memdetails()
	{
	
		global $conn;
		
		//retrieve the memberID from the URL
		$memberID = $_GET['memberID'];
		
		//query the database to select all data from the member table
		$sql = 'SELECT * FROM member WHERE memberID = :memberID';		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberID', $memberID);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;

	}

	//create a function to update an existing member
	function update_member($memberID,$memberfirstname, $memberlastname, $memberemail)
	{
       
        global $conn;
		$sql = "UPDATE member SET memberfirstname = :memberfirstname, memberlastname = :memberlastname, memberemail = :memberemail WHERE memberID = :memberID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberfirstname', $memberfirstname);
		$statement->bindValue(':memberlastname', $memberlastname);
        $statement->bindValue(':memberemail', $memberemail);
        $statement->bindValue(':memberID', $memberID);
 		$result = $statement->execute();
		$statement->closeCursor();
		return $result;		
	}

	
	//create a function to delete an existing member
	function delete_member($memberID)
	{
       
        $memberID = $_GET['memberID'];
		global $conn;
		$sql = "DELETE FROM member WHERE memberID = :memberID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberID', $memberID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;		
	}

     function get_bookingdata()
	{
        
		global $conn;
        
        
		//query the database to select all data from the membertable
		$sql = "SELECT * FROM booking as A JOIN booking_items as B ON A.bookingID=B.bookingID ORDER BY date DESC";		
		//use a prepared statement to enhance security
		$statement = $conn->query($sql);
//        echo $sql;
//        die();
//        $statement->bindValue(':memberID', $memberID);
//		$statement->execute();
		$result = $statement->fetchAll();
  		$statement->closeCursor();
		return $result;
        
      
	}

//    function get_datainfo()
//	{
//        
//		global $conn;
//        
//        
//		//query the database to select all data from the membertable
//		$sql = "SELECT * FROM booking as A JOIN booking_items as B ON A.bookingID=B.bookingID WHERE B.bookingID = :bookingID ORDER BY date DESC";		
//		//use a prepared statement to enhance security
//		$statement = $conn->query($sql);
////        echo $sql;
////        die();
//        $statement->bindValue(':bookingID', $_GET['bookingID']);
//		$statement->execute();
//		$result = $statement->fetchAll();
//  		$statement->closeCursor();
//		return $result;
//        
//      
//	}
    
    

?>


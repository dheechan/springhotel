<?php
	function add_booking($firstName, $lastName, $phone, $email)
	{
		global $conn;
     
     
		$sql = "INSERT INTO booking (firstname, lastname, contact, email) VALUES (:firstName, :lastName, :phone, :email)"; 
    
		$statement = $conn->prepare($sql);
		$statement->bindValue(':fistName', $firstName);
		$statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
//        var_dump($statement);
//        exit;
//        $statement->bindValue(':check_in',$_SESSION['check_in']);
//        $statement->bindValue(':check_out',$_SESSION['check_out']);
        $result = $statement->execute();
		$statement->closeCursor();
		return $result;	
      
	}


?>
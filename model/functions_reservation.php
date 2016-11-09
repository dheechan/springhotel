<?php
    


function add_booking($firstName, $lastName, $phone, $email)
	{

	global $conn;
    
        $sql = "SELECT memberID FROM member WHERE memberusername = :memberusername";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':memberusername', $_SESSION['user']);
       	$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
        foreach($result as $row){
             $memberID = $row['memberID'];
         }
	    
        $totalrooms = 0;
        $total = 0;
         foreach($_SESSION["reservation_cart"] as $keys => $values)
		{  
        $diff = strtotime($_SESSION['check_in']) - strtotime($_SESSION['check_out']);
        $nights = $diff/86400*(-1);
             
        $total = $total + $nights * ($values["quantity"] * $values["roomprice"]);
        $totalcost =  number_format($total,2, '.', '');
             
        $totalrooms = $totalrooms + $values["quantity"];     
        $tax = $total / 10;
        $taxamount = number_format($tax,2, '.', '');
	
         }
    
     
		$sql = "INSERT INTO booking (memberID,date,firstname, lastname, contact, email, checkindate, checkoutdate, totalrooms, totalnights, totalcost, taxamount) VALUES (:memberID, now(),:firstName, :lastName, :phone, :email, :check_in, :check_out, :totalrooms, :totalnights, :totalcost, :taxamount)"; 
    
		$statement = $conn->prepare($sql);
        $statement->bindValue(':memberID', $memberID);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
//        var_dump($statement);
//        exit;
        $statement->bindValue(':check_in',$_SESSION['check_in']);
        $statement->bindValue(':check_out',$_SESSION['check_out']);
        $statement->bindValue(':totalrooms',  $totalrooms);
        $statement->bindValue(':totalnights',  $nights);
        $statement->bindValue(':totalcost',  $totalcost);
        $statement->bindValue(':taxamount', $taxamount);
        $statement->execute();
        $lastID = $conn->lastInsertId(); 

 
       foreach($_SESSION["reservation_cart"] as $rooms)
		{  
           $result = add_booking_items($lastID, $rooms['roomID'], $rooms['roomtype'],$rooms['quantity'],$rooms['roomprice']);
       }
        return $result;
           
    }



function add_booking_anonymous($firstName, $lastName, $phone, $email)
	{

	global $conn;
        $totalrooms = 0;
        $total = 0;
         foreach($_SESSION["reservation_cart"] as $keys => $values)
		{  
        $diff = strtotime($_SESSION['check_in']) - strtotime($_SESSION['check_out']);
        $nights = $diff/86400*(-1);
             
        $total = $total + $nights * ($values["quantity"] * $values["roomprice"]);
        $totalcost =  number_format($total,2, '.', '');
             
        $totalrooms = $totalrooms + $values["quantity"];     
        $tax = $total / 10;
        $taxamount = number_format($tax,2, '.', '');
	
         }
    
           
		$sql = "INSERT INTO booking (date,firstname, lastname, contact, email, checkindate, checkoutdate, totalrooms, totalnights, totalcost, taxamount) VALUES (now(),:firstName, :lastName, :phone, :email, :check_in, :check_out, :totalrooms, :totalnights, :totalcost, :taxamount)"; 
    
		$statement = $conn->prepare($sql);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
//        var_dump($statement);
//        exit;
        $statement->bindValue(':check_in',$_SESSION['check_in']);
        $statement->bindValue(':check_out',$_SESSION['check_out']);
        $statement->bindValue(':totalrooms',  $totalrooms);
        $statement->bindValue(':totalnights',  $nights);
        $statement->bindValue(':totalcost',  $totalcost);
        $statement->bindValue(':taxamount', $taxamount);
        $statement->execute();
        $lastID = $conn->lastInsertId(); 

 
       foreach($_SESSION["reservation_cart"] as $rooms)
		{  
           $result = add_booking_items($lastID, $rooms['roomID'], $rooms['roomtype'],$rooms['quantity'],$rooms['roomprice']);
       }
        return $result;
           
    }


function add_booking_items($lastID, $roomID, $roomtype, $roomquantity, $roomprice)
	{
          global $conn;
        
		  $sql = "INSERT INTO booking_items (bookingID, roomID, itemsroomtype, itemsroomquantity, itemsroomprice) VALUES (:lastID, :roomID , :roomtype, :roomquantity, :roomprice)"; 
            
          $statement = $conn->prepare($sql);
          $statement->bindValue(':lastID', $lastID);   	    
          $statement->bindValue(':roomID', $roomID);
		  $statement->bindValue(':roomtype', $roomtype);
          $statement->bindValue(':roomquantity', $roomquantity);
          $statement->bindValue(':roomprice', $roomprice); 
          $add_items = $statement->execute();
          $statement->closeCursor();
          return $add_items;
       
       }
         
        
    
       
?>
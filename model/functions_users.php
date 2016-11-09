<?php
	//create a function to retrieve the total number of matching usernames
	function count_username($username)
	{
		global $conn;
		$sql = 'SELECT * FROM member WHERE memberusername = :username';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
	}

   function get_member()
	{
		global $conn;
		//query the database to select all data from the product table
		$sql = "SELECT * FROM member WHERE memberusername = :username";		
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
        $statement->bindValue(':username', $_SESSION['user']);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

   function get_username()
	{
		global $conn;
		$sql = 'SELECT memberID FROM member WHERE memberusername = :username';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	//create a function to add a new user
	function add_member($firstName, $lastName, $street, $suburb, $country, $postcode, $email, $phone, $username, $password)
	{
		global $conn;
		$sql = "INSERT INTO member (memberfirstname, memberlastname,memberstreet, membersuburb, membercountry, memberpostcode, memberemail, membercontact, memberusername, memberpassword) VALUES (:firstName, :lastName, :street, :suburb, :country, :postcode, :email, :phone, :username, :password)";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':suburb', $suburb);
        $statement->bindValue(':country', $country);
        $statement->bindValue(':postcode', $postcode);
		$statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;			
	}



	//create a function to login
	function login_admin($adminusername, $adminpassword)
	{
		global $conn;
		$sql = 'SELECT * FROM admin WHERE adminusername = :adminusername AND adminpassword = :adminpassword';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':adminusername', $adminusername);
		$statement->bindValue(':adminpassword', $adminpassword);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
	}

    //create a function to login for members
	function login_member($username, $password)
	{
		global $conn;
		$sql = "SELECT * FROM member WHERE memberusername = :username AND memberpassword = :password";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
	}

    //create a function to retrieve salt
	function retrieve_salt($username)
	{
		global $conn;
		$sql = 'SELECT * FROM member WHERE memberusername = :username';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	}
?>
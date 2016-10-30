<?php
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation_admin.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_memberdata.php');
	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Member Database";
	
	//retrieve the navigation
    require('header_two.php');
  
    

?>

<p style="display:none;" onClick="dontpopUp()" id="exit">x</p>
        <div style="display:none;" onClick="popUp()" id="open">
       
        </div>
        
  
        <div class="container">
          
        <form action="../view/loginadmin.php" method="post" onsubmit="return(A());">
            <div class="spacediv">SPRING HOTEL CUSTOMER DATABASE</div>  
        <table border="1" cellspacing="2" cellpadding="4" >
            <thead>
                <tr>
                    <th> Delete </th>
                     <th> Edit </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Email </th>
                </tr>
            </thead>
            <tbody>
            
            
        <?php
        $result = get_memdata();
		
	   ?>
         <?php foreach($result as $row):?>
         <tr class="record">
		<td><input name="selector[]" type="checkbox" value="<?php echo $row['memberID']; ?>"></td>
        <td><a id="opendiv" onClick="popUp()" href="../view/updatemember.php?memberID=<?php echo $row['memberID']; ?>">&#8680;</a></td>
        <td><?php echo $row['memberfirstname']; ?></td>
		<td><?php echo $row['memberlastname']; ?></td>
		<td><?php echo $row['memberemail']; ?></td>
	</tr>
	<?php endforeach; ?>
        </tbody>        
        </table>   
            <br/>
            
           <a class="buttondel" href = "../controller/member_delete_process.php?memberID=<?php echo $row['memberID']; ?>"> delete </a>
            <a class="buttondel" href = "../controller/logout_process_admin.php"> logout</a>
          <div class="spacediv"></div>   
        </form>
        

        </div>
<?php
    
    require('footer.php');
    

    ?>
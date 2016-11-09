<?php
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation_admin.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_rooms.php');
	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Update Rooms";
	
	//retrieve the header
	require('header_two.php');
    
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<!--<script>tinymce.init({ selector:'textarea' });</script>-->
<script>
    
tinymce.init({
        // General options
        selector:'textarea',
        width: "50",
        height: "100",

        
});

        var cc_name = /^[A-Za-z\s]{5,15}$/;
//      var cc_name = /^[a-zA-Z]*$/;
         function checkroom() {
//            var firstName = document.getElementById ("firstName");
             var jerror = document.getElementsByClassName("jerror")[0];
            if (!cc_name.test(roomtype.value)) {                
                jerror.innerHTML="The name character must have 5 characters and must not contain any numbers!";
                jerror.style.display="block";
                document.getElementById("savebutton").style.backgroundColor="gray";
                document.getElementById("savebutton").disabled = true;
                return false;
            }
             else {
                 jerror.style.display="none";
                document.getElementById("savebutton").style.backgroundColor="";
                document.getElementById("savebutton").disabled = false;
                 return true;
             } 
           
        }
        var cc_name = /^\d+$/;;
    //      var cc_name = /^[a-zA-Z]*$/;
         function checkroomprice() {
//            var firstName = document.getElementById ("firstName");
             var jerror = document.getElementsByClassName("jerror")[0];
            if (!cc_name.test(roomprice.value)) {                
                jerror.innerHTML="Room price must be filled out!";
                jerror.style.display="block";
                document.getElementById("savebutton").style.backgroundColor="gray";
                document.getElementById("savebutton").disabled = true;
                return false;
            }
             else {
                 jerror.style.display="none";
                document.getElementById("savebutton").style.backgroundColor="";
                document.getElementById("savebutton").disabled = false;
                 return true;
             } 
           
        }

</script>

<div class="container"> 
    
       <div class="spacediv"></div>
    <?php
            $roomID = $_GET['roomID'];
            $result = get_roomdetails();

        ?>
      <div class="jerror"></div> 
        <form action="../controller/room_update_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="roomID" id="memberID" value="<?php echo $roomID ?>" /><div class="xsbreak"></div>
        Room Name<div class="xsbreak"></div>
        <input type="text" name="roomtype" id="roomtype" onblur="return checkroom()" value="<?php echo $result['roomtype'] ?>" size="12" /><div class="xsbreak"></div>
        Room Description<div class="xsbreak"></div>
        <div class="textroom"><textarea name="roomdescription"  /><?php echo $result['roomdescription'] ?></textarea></div>
        Room Capacity<div class="xsbreak"></div>
        <select name='roomcapacity'>
                    <option value="<?php echo  $result['roomcapacity']; ?>">-<?php echo $result['roomcapacity']; ?>-</option>
                <?php
                    for ($i=1; $i<=8; $i++)
                    {
                        ?>  
                            <option><?php echo $i;?></option>
                        <?php
                    }
                ?>
                </select><div class="xsbreak"></div>
    
        Room Price<div class="xsbreak"></div>
        <input type="text" name="roomprice" id="roomprice" onblur="return checkroomprice()" value="<?php echo $result['roomprice']; ?>" size="4" /><div class="xsbreak"></div>
        Room Quantity<div class="xsbreak"></div>
        <select name='roomavailquantity'>
                    <option value="<?php echo  $result['roomavailquantity']; ?>">-<?php echo $result['roomavailquantity']; ?>-</option>
                <?php
                    for ($i=1; $i<=20; $i++)
                    {
                        ?>  
                            <option><?php echo $i;?></option>
                        <?php
                    }
                ?>
                </select><div class="xsbreak"></div>
        Room Image<div class="xsbreak"></div>
        <?php
				//if the productPhoto field in the database is NULL or empty
				if((is_null($result['roomimage'])) || (empty($result['roomimage'])))
				{
					//display the default photo
					echo "<p><img src='images/default.jpg' width=300 height=200 alt='default photo' /></p>";
				}
				else
				{ 
					//else display the appropriate product photo
					echo "<p><img src='images/" . ($result['roomimage']) . "'" . ' width=300 height=200 alt="product photo"'  . "/></p>"; 
				}
			?>
        <input type="file" name="roomimage"/><br>    

             <div class="spacediv"></div> 
        
        <input type="submit" value="Save" id="savebutton" />
         <div class="smbreak"></div>   
        <h3> <a href = "../view/memdata.php">&#8592; Go Back</a></h3>  
            
        </form>
       
    </div>

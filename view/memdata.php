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
    require('../model/functions_rooms.php');

	//provide the value of the $title variable for this page
	$title = "Member Database";
	
	//retrieve the navigation
    require('header_two.php');
  
    
    

?>
 <script src="../view/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script>
  // Bookings show/hide

        $(document).ready(function(){
            $("#CusData").click(function(){
//                $("#hiddenForm").toggle();
                $('#form_hidden').hide();
                $('#data_hidden').hide();
                $('#memberdata_hidden').show();
//                profile_hidden.style.display="none";
            });
        });
    // Profile show/hide

        $(document).ready(function(){
            $("#Rooms").click(function(){
//                $("#profile_hidden").toggle();
//                profile_hidden.style.display="block";
                $('#data_hidden').hide();
                $('#form_hidden').show();
                $('#memberdata_hidden').hide();
            });
        });
    
        $(document).ready(function(){
            $("#CusBookings").click(function(){
//                $("#profile_hidden").toggle();
//                profile_hidden.style.display="block";
                $('#data_hidden').show();
                $('#memberdata_hidden').hide();
                $('#form_hidden').hide();
            });
        });

    
</script>
<script>
       function A() {
                        tinttwo.style.display="block";
                        boxtwo.style.display="block";

                    }
                     function B() {
                        tinttwo.style.display="none";
                        boxtwo.style.display="none";

                    }
                    window.onkeydown = function (event)
                    {
                    if ( event.keyCode == 27 ) {
                        console.log( 'escape pressed' );
                        {
                            alert('You have pressed ESC key');
                            tinttwo.style.display="none";
                            boxtwo.style.display="none";
                        }
                    }
                };  
</script>
<script src="../view/ajax/jquery-3.1.1.min.js"></script>
<script>
    
////    var div1 = $('div.div1');
//$(function () {
//    $('#get').click(function(){
////     e.preventDefault();
////        $.ajax('../controller/getdatainfo.php', function(data){
////            console.log(data);
////        });
//        
//    $.ajax({
//        type: 'GET',
//        url: '../controller/getdatainfo.php',
//        dataType: 'json',
//        success: function(data){
////         $.each(data.function(index,item){
////                $.each(item.function(key,value){
////                $('#div1').append(key +':' + value + '</br>');
////         });
////             $('#div1').append('<br/></br>');
////                })
////             $('#div1').append(data);
//            console.log(data);
//            $('#div1').html('');
//            $.each(data,function(key,val){
//                 $('#div1').append(val.bookingID);  
////            alert(data);
//                    });
//                }
//           });
//        });
//    });
     $(document).ready(function() {
    $('a.bookingitems').bind('click', function(e) {           
  var url = $(this).attr('href');
  $('#div1').load(url); // load the html response into a DOM element
  e.preventDefault(); // stop the browser from following the link
});
 });   
    
   
</script>
<?php
//        $result = get_bookingdata();
//		foreach($result as $row):
	   ?>

   <div id="tinttwo"></div>  
        <div id="boxtwo"><span id="exit" onclick="B()" onkeydown="return function (event)">&times</span>
             <div id="div1"></div>
            </div>


<?php 
//endforeach;
?>

<!--ADMIN PANEL-->
        <div class="container">
         
        <div class="spacediv">Welcome Admin</div> 
            <ul>
                <li><h3><a href="#" id="Rooms">View Rooms</a></h3></li>
                <li><h3><a href="#" id="CusData">View Member Profile</a></h3></li>
                <li><h3><a href="#" id="CusBookings">View Customer Bookings</a></h3></li>
            </ul> 
        <h3> <a href = "../controller/logout_process_admin.php">Logout</a></h3>   
            <div class="break"></div>
            

<!--  EDIT ROOM          -->
         <div class="left_room2">
        <div class="room_container">
        <div id="form_hidden">
        <div class="spacediv"><h1>SPRING HOTEL ROOMS</h1></div>
            <?php 
                $result = get_rooms();
                foreach($result as $row):   
            ?>   
            
        <div class="spacediv"></div>
              
            <div class="left_room"><?php echo "<img src='images/" . ($row['roomimage']) . "'" . ' width=300 height=200 alt="product photo"'  . "/>"; ?></div> 
            <h2><?php echo $row['roomtype']; ?></h2>
            <div class="spacediv_room"></div>    
            <h5><?php echo $row['roomdescription']; ?></h5>
    <!--        <div class="spacediv_room"></div>     -->
            <h3>Room Capacity: Max <?php echo $row['roomcapacity']; ?> people </h3>
            <h3>Rate: $<?php echo $row['roomprice']; ?>/NIGHT </h3>
            <h3 class="smbreak"><a href="../view/updateroom.php?roomID=<?php echo $row['roomID']; ?>" id="update_room" > || Update this Room | </a> <a href="#" id="update_room" >| Delete this Room ||</a> </h3>
                 <?php 
                 endforeach; 
                 ?>
        <div class="spacediv"></div>         
        </div>    
        </div>
        </div>
<!--END EDIT ROOM            -->
 <!--  Member Database          -->
        <div id="memberdata_hidden">  
        <form  action="../view/loginadmin.php" method="post">
            <div class="spacediv"><h2>SPRING HOTEL MEMBER DATABASE</h2></div>  
     
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
        $resulttwo = get_memdata();
		
	   ?>
         <?php foreach($resulttwo as $row2):?>
         <tr class="record">
            <td><a class="buttondel" href = "../controller/member_delete_process.php?memberID=<?php echo $row2['memberID']; ?>"> delete </a></td> 
<!--		<td><input name="selector[]" type="button" value="<?php// echo $row2['memberID']; ?>"></td>-->
        <td><a href="../view/updatemember.php?memberID=<?php echo $row2['memberID']; ?>">&#8680;</a></td>
        <td><?php echo $row2['memberfirstname']; ?></td>
		<td><?php echo $row2['memberlastname']; ?></td>
		<td><?php echo $row2['memberemail']; ?></td>
	</tr>
	<?php endforeach; ?>
        </tbody>        
        </table>   
            <br/>
<!--
            
           <a class="buttondel" href = "../controller/member_delete_process.php?memberID=<?php// echo $row2['memberID']; ?>"> delete </a>
-->
           <div class="spacediv"></div>   
        </form>
        </div>             
<!--  End Member Database          -->            
            
<!--  Booking History Table          -->
            <div id="data_hidden">  
        <form  action="../view/loginadmin.php" method="post">
            <div class="spacediv"><h2>SPRING HOTEL BOOKING HISTORY</h2></div>  
     
        <table border="2" cellspacing="3" cellpadding="6" >
            <thead>
                <tr>
                     <th> Date </th>
                    <th> Booking Number </th>
                   
                </tr>
            </thead>
            <tbody>
            
            
        <?php
        $result = get_bookingdata();
		
	   ?>
         <?php foreach($result as $row):?>
         <tr class="record">
             <td><?php echo $row['date']; ?></td>
            <td><a href="../controller/getdatainfo.php?bookingID=<?php echo $row['bookingID']; ?>" onclick="A()" id="get" class="bookingitems">Booking Ref#: <?php echo $row['bookingID']; ?></a></td>
           	</tr>
	<?php endforeach; ?>
        </tbody>        
        </table> 
           <div class="spacediv"></div>
           
        </form>
        </div>  
            
            
            

        </div>
<?php
    
    require('footer.php');
    

    ?>
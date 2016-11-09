<script type="text/javascript">

   
//          $( function() {
//            $( "#datepicker_in" ).datepicker({ 
//                minDate: -0, 
//                maxDate: "+1Y +10D", 
//                dateFormat: 'yy-mm-dd',
////                onClose: function (selectedDate) {
////                $("#datepicker_in").datepicker("option", "minDate", selectedDate);
////                }
//            });
//             
//        
//          });
//          
//          $( function() {
//            $( "#datepicker_out" ).datepicker({ 
//                minDate: +1, 
//                maxDate: "+1Y +10D", 
//                dateFormat: 'yy-mm-dd',
////                onClose: function (selectedDate) {
////                $("#datepicker_out").datepicker("option", "minDate", selectedDate);
////        }
//            });
//            
//          });
    
         $(function () {
            $("#datepicker_in").datepicker({
                 minDate: -0,
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#datepicker_out").datepicker("option", "minDate", dt);
                }
            });
            $("#datepicker_out").datepicker({
                minDate: +1,
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#datepicker_in").datepicker("option", "maxDate", dt);
                }
            });
        });   
            
          
//          if ('#datepicker_in' == '#datepicker_out') {
//            document.getElementById("#datepicker_out").disabled = true;
//          }
 
             
      </script>

<section class="datebar">
        <div class="container">
            <div class="left_bar"><p>BOOK ONLINE AND SAVE</p></div>
            <div class="center_bar">
                    <div class="centerdate" >
                        <form action="../view/bookroom.php" method="POST">
                            
                            Check-in: 
                            <input type="text" id="datepicker_in" name="check_in" value="<?php if(isset($_SESSION['check_in'])) { echo $_SESSION['check_in'];} ?>" required/>
                            <div class="float_date">
                            Check-out:
                            <input type="text" id="datepicker_out" name="check_out" value="<?php if(isset($_SESSION['check_out'])) { echo $_SESSION['check_out'];} ?>" required/></div>
                    </div>
            </div>
                 <div class="right_bar"><p><input type="submit" value="Book Now"></p></div>
<!--            <div class="right_bar"><p><a href="#">BOOK NOW</a></p></div>-->
                  </form> <!-- end date form -->
        </div>
    </section>	<!-- end date bar -->
	
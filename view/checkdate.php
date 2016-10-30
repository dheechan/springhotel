

<section id="datebar">
        <div class="container">
            <div class="left_bar"><p>BOOK ONLINE AND SAVE</p></div>
            <div class="center_bar">
                    <div class="centerdate" >
                        <form action="../view/bookroom.php" method="POST">
                            Check-in: 
                            <input type="text" id="datepicker_in" name="check_in" value="<?php if(isset($_SESSION['check_in'])) { echo $_SESSION['check_in'];} ?>" required/>
                            Check-out:
                            <input type="text" id="datepicker_out" name="check_out" value="<?php if(isset($_SESSION['check_out'])) { echo $_SESSION['check_out'];} ?>" required/>
                    </div>
            </div>
                 <div class="right_bar"><p><input type="submit" value="Book Now"></p></div>
<!--            <div class="right_bar"><p><a href="#">BOOK NOW</a></p></div>-->
                  </form> <!-- end date form -->
        </div>
    </section>	<!-- end date bar -->
	

<?php
//	start session management
//	session_start();
//
//       if(isset($_POST['check_in']) && isset($_POST['check_out'])) {
//        $check_in = $_SESSION['check_in'] = $_POST['check_in'];
//        $check_out = $_SESSION['check_out'] = $_POST['check_out'];
//        unset($_SESSION['reservation_cart']);
//    } else {
//        if(!isset($_SESSION['check_in']) && !isset($_SESSION['check_out'])) {
//            header('Location: home.php');
//        } else {
//             $check_in = $_SESSION['check_in'];
//             $check_out = $_SESSION['check_out'];
//        }
//    }


	//provide the value of the $title variable for this page
	$title = "Contact Us";
	
	//retrieve the navigation
    require('header.php');
    require('banner.php');

    

?>

<div class="container">
      
 <div class="spacediv"></div>
     
<h1>CONTACT US</h1>
    <div class="smbreak"></div>
<div id="contactform">
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>


  <textarea></textarea>
    </div>
</div>
 <div class="spacediv"></div>
        
<?php
    
    require('footer.php');
    

    ?>  
		<section class="banner">
			<img class="mySlides" src="images/banner.jpg" alt="banner"> 
            <img class="mySlides" src="images/banner_4.jpg" alt="bannerthree">
            <img class="mySlides" src="images/banner_5.jpg" alt="bannerthree">
            <img class="mySlides" src="images/banner_6.jpg" alt="bannerthree">

		</section> <!-- end banner -->
	
	<script>

         // Carousel
            
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                x[myIndex-1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
            
    </script>
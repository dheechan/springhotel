<?php
	//start session management
	 session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_messages.php');
	
	//provide the value of the $title variable for this page
	$title = "Registration and Login";
	
	//retrieve the header
	require('header.php');

	if(isset($_SESSION['user']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the login page
		header('location:../view/user_account.php');
	}
  if(isset($_SESSION['admin']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the login page
		header('location:../view/memdata.php');
	}    
?>
<script type="text/javascript" src="./ajax/jquery-1.2.6.min.js"></script>
<script>
    //display/hide registration div
    function A() {
       tint.style.display = "block";
       box.style.display = "block";

   }

   function B() {
       tint.style.display = "none";
       box.style.display = "none";

   }
   window.onkeydown = function(event) {
       if (event.keyCode == 27) {
           console.log('escape pressed'); {
               alert('You have pressed ESC key');
               tint.style.display = "none";
               box.style.display = "none";
           }
       }
   };



   // AJAX

   pic1 = new Image(16, 16);
   pic1.src = "../view/ajax/loader.gif";

   $(document).ready(function() {

       $("#username").change(function() {

           var usr = $("#username").val();

           if (usr.length >= 4 && checkusername()) {
               $("#userstats").html('<img src="../view/ajax/loader.gif" align="absmiddle">&nbsp;Checking availability...');

               $.ajax({
                   type: "POST",
                   url: "../controller/checkdetails.php",
                   data: "username=" + usr,
                   success: function(msg) {

                       $("#userstats").ajaxComplete(function(event, request, settings) {

                           if (msg == 'OK') {
                               $("#username").removeClass("object_error"); // if necessary
                               $("#username").addClass("object_ok");
                               $("#button").css("background-color", "darkblue").click(function() {
                                   return true;
                                   //                                                                                           console.log("true");
                               });
                               $(this).html('&nbsp;<img src="../view/ajax/checkbox.png" align="absmiddle">');
                           } else {
                               $("#username").removeClass("object_ok"); // if necessary
                               $("#username").addClass("object_error");
                               $("#button").css("background-color", "gray").click(function() {
                                   return false;
                                   //                                                                                       console.log("false");
                               });
                               $(this).html(msg);
                           }

                       });

                   }

               });

           } else {
               $("#userstats").html('');
//               $("#userstats").html('<font color="white" size="1px">The username should have at least <strong>4</strong> characters.</font>');
               $("#username").removeClass("object_ok"); // if necessary
               $("#username").addClass("object_error");
               $("#button").css("background-color", "gray").click(function() {
                   return false;
               });
           }

           //disable submit


       });

   });



   // EMAIL 
   // 

   $(document).ready(function() {
       $("#email").change(function() {

           var eml = $("#email").val();

           if (eml.length >= 2 && checkemail()) {
               $("#emailstats").html('<img src="../view/ajax/loader.gif" align="absmiddle">&nbsp;Checking availability...');

               $.ajax({
                   type: "POST",
                   url: "../controller/checkdetails.php",
                   data: "email=" + eml,
                   success: function(msg) {

                       $("#emailstats").ajaxComplete(function(event, request, settings) {

                           if (msg == 'GOOD') {
                               $("#email").removeClass("object_error"); // if necessary
                               $("#email").addClass("object_ok");
                               $("#button").css("background-color", "darkblue").click(function() {
                                   return true;
                                   //                                                                                           console.log("true");
                               });
                               $(this).html('&nbsp;<img src="../view/ajax/checkbox.png" align="absmiddle">');
                           } else {
                               $("#email").removeClass("object_ok"); // if necessary
                               $("#email").addClass("object_error");
                               $("#button").css("background-color", "gray").click(function() {
                                   return false;
                                   //                                                                                       console.log("false");
                               });
                               $(this).html(msg);
                           }

                       });

                   }

               });

           } else {
               $("#emailstats").html('');
               $("#email").removeClass("object_ok"); // if necessary
               $("#email").addClass("object_error");
               $("#button").css("background-color", "gray").click(function() {
                   return false;
               });
           }

           //disable submit


       });


   });


   //check each form



   function checklastname() {
       var cc_name = /^[A-Za-z]{3,15}$/;
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(lastName.value)) {
           jerror.innerHTML = "Field must not contain any numbers!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }




   function checkname() {
       var cc_name = /^[A-Za-z]{3,15}$/;
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(firstName.value)) {
           jerror.innerHTML = "Field must not contain any numbers!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }


   function checkemail() {
       var cc_name = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(email.value)) {
           jerror.innerHTML = "This email is not accepted!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }
    
   function checkphone() {
       var cc_name = /^[0-9]{10,15}$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(phone.value)) {
           jerror.innerHTML = "Phone number is not accepted!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }    

   function checkstreet() {
       var cc_name = /^[a-zA-Z0-9\-\s]+$/
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(street.value)) {
           jerror.innerHTML = "Street Address is not accepted!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }      

   function checksuburb() {
       var cc_name = /^[A-Za-z]{3,15}$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(suburb.value)) {
           jerror.innerHTML = "Field must not contain any numbers!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   } 
    
   function checkcountry() {
       var cc_name = /^[A-Za-z]$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(country.value)) {
           jerror.innerHTML = "Field must not contain any numbers!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }     

   function checkpostcode() {
       var cc_name = /^[0-9]{10,15}$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(postcode.value)) {
           jerror.innerHTML = "Postcode is not accepted!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   } 
   function checkusername() {
       var cc_name = /^[A-Za-z]$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(username.value)) {
           jerror.innerHTML = "Username must not contain any numbers!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }       
   function checkpassword() {
       var cc_name = /^[a-zA-Z0-9]{8,}$/;
       //            var firstName = document.getElementById ("firstName");
       var jerror = document.getElementsByClassName("jerror")[0];
       if (!cc_name.test(password.value)) {
           jerror.innerHTML = "Password must have at least 8 characters!";
           jerror.style.display = "block";
           document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
           return false;
       } else {
           jerror.innerHTML = "Hello";
           jerror.style.display = "none";
           document.getElementById("button").style.backgroundColor = "";
           document.getElementById("button").disabled = false;
           return true;
       }

   }  
    
$(document).ready(function() {
    
    if ($('#firstName').val()=="" || $('#lastName').val()=="" || $('#email').val()=="" || $('#phone').val()=="" || $('#street').val()=="" || $('#suburb').val()=="" || $('#country').val()=="" || $('#postcode').val()=="" || $('#username').val()=="" || $('#password').val()==""){
       document.getElementById("button").style.backgroundColor = "gray";
           document.getElementById("button").disabled = true;
    }
    
});
                  
        
</script>

<div id="tint"></div>

<div id="box"><span id="exit" onclick="B()" onkeydown="return function (event)">&times</span>

    <?php
		//user messages
		if(isset($_SESSION['error'])) //if session error is set
		{ 
			echo '<div class="error">';
			echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
			echo '</div>';
			unset($_SESSION['error']); //unset session error
		}
	?>
        <div class="jerror"></div>
        <form action="../controller/registration_process.php" name="form1" method="post" id="form2" target="_self">

            <input type="text" name="firstName" id="firstName" onblur="return checkname()" placeholder="  First name*" />
            <div class="smbreak"></div>
            <input type="text" name="lastName" id="lastName" onblur="return checklastname()" placeholder="  Last name*" />
            <div class="smbreak"></div>
            <input type="email" name="email" id="email" onblur="return checkemail()" placeholder="  Email address*" />
            <div id="emailstats"></div>
            <div class="smbreak"></div>
            <input type="tel" name="phone" id="phone" onblur="return checkphone()" placeholder="  Phone number*" />
            <div class="smbreak"></div>
            <input type="text" name="street" id="street" onblur="return checkstreet()" placeholder="  Street address*" />
            <div class="smbreak"></div>
            <input type="text" name="suburb" id="suburb" onblur="return checksuburb()" placeholder="  Suburb*" />
            <div class="smbreak"></div>

            <select name="country" id="country" onblur="return checkcountry()">
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                    </select>
            <div class="smbreak"></div>

            <input type="text" name="postcode" id="postcode" onblur="return checkpostcode()" placeholder="  Postcode*" />
            <div class="smbreak"></div>
            <input type="text" name="username" id="username" onblur="return checkusername()" placeholder="  Username*"/>
            <div id="userstats"></div>
            <div class="smbreak"></div>
            <input type="password" id="password" name="password" onblur="return checkpassword()" placeholder="  Password*" />
            <div class="smbreak"></div>

            <input type="submit" name="register" value="Register" id="button">

        </form>
</div>

<div class="container">
    <h1 class="centertext">Welcome</h1>
    <p class="centertext">We're happy to see you return! Please login to continue.</p>



    <?php
		//call user_message() function
		$message = user_message();
	?>
        <div class="containerlogin">

            <form action="../controller/authentication_member.php" onsubmit="return(A());" method="post">

                Username<br>
                <input type="text" size="25" name="username_mem" /required> <br/> Password
                <br>
                <input type="password" name="password_mem" size="30" maxlength="10" /required> <br/>

                <input type="submit" name="login" value="Login">
                <a id="opendiv" onclick="A()">
                    <h4>Create New Account</h4>
                </a>
            </form>
        </div>
</div>

<?php
	//retrieve the footer
	require('footer.php');
?>
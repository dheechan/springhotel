//
//                function A() {
//                                    
//                    if( document.login.username.value == "" )
//                     {
//                        alert( "Please provide your username!" );
//                        document.login.username.focus() ;
//                        return false;
//                     }
//                    if( document.login.password.value == "" )
//                     {
//                        alert( "Please provide your password!" );
//                        document.login.password.focus() ;
//                        return false;
//                     }
//                    
//                    
//                    return( true );
//                    }
                
//                    function A() {
//                        tint.style.display="block";
//                        box.style.display="block";
//
//                    }
//                     function B() {
//                        tint.style.display="none";
//                        box.style.display="none";
//
//                    }
//                    window.onkeydown = function (event)
//                    {
//                    if ( event.keyCode == 27 ) {
//                        console.log( 'escape pressed' );
//                        {
//                            alert('You have pressed ESC key');
//                            tint.style.display="none";
//                            box.style.display="none";
//                        }
//                    }
//                };
//         
//            // AJAX
//                    
//                pic1 = new Image(16, 16); 
//                pic1.src = "../ajax/loader.gif";
//
//                $(document).ready(function(){
//
//                $("#username").change(function() { 
//
//                var usr = $("#username").val();
//
//                if(usr.length >= 2)
//                {
//                $("#userstats").html('<img src="../ajax/loader.gif" align="absmiddle">&nbsp;Checking availability...');
//
//                    $.ajax({  
//                    type: "POST",  
//                    url: "../controller/checkdetails.php",  
//                    data: "username="+ usr,  
//                    success: function(msg){  
//
//                   $("#userstats").ajaxComplete(function(event, request, settings){ 
//
//                    if(msg == 'OK')
//                    { 
//                        $("#username").removeClass('object_error'); // if necessary
//                        $("#username").addClass("object_ok");
//                        $("#button").css("background-color", "aquamarine").click(function() {return true; console.log("true");});
//                        $(this).html('&nbsp;<img src="../ajax/checkbox.png" align="absmiddle">');
//                    }  
//                    else  
//                    {  
//                        $("#username").removeClass('object_ok'); // if necessary
//                        $("#username").addClass("object_error");
//                        $("#button").css("background-color", "gray").click(function() {return false; console.log("false");});
//                        $(this).html(msg);
//                    }
//                   
//                   });
//
//                 } 
//
//                  }); 
//
//                }
//                else
//                    {
//                    $("#userstats").html('<font color="white">The username should have at least <strong>4</strong> characters.</font>');
//                    $("#username").removeClass('object_ok'); // if necessary
//                    $("#username").addClass("object_error");
//                    $("#button").css("background-color", "gray").click(function() {return false;});    
//                    }
//                    
//                    //disable submit
//                   
//
//                });
//
//                });
//            
//                    // EMAIL 
//                
//                $(document).ready(function(){
//
//                $("#email").change(function() { 
//
//                var eml = $("#email").val();
//
//                if(eml.length >= 2)
//                {
//                $("#emailstats").html('<img src="../ajax/loader.gif" align="absmiddle">&nbsp;Checking availability...');
//
//                    $.ajax({  
//                    type: "POST",  
//                    url: "../controller/checkdetails.php",  
//                    data: "email="+ eml,  
//                    success: function(msg){  
//
//                   $("#emailstats").ajaxComplete(function(event, request, settings){ 
//
//                     if(msg == 'OK')
//                        {
//                            $("#email").removeClass('object_error');
//                            $("#email").addClass("object_ok");
//                            $("#button").css("background-color", "aquamarine").click(function() {return true;});
//                            $(this).html('&nbsp;<img src="../ajax/checkbox.png" align="absmiddle">');
//                        }
//                    else  
//                    {  
//                        $("#email").removeClass('object_ok'); // if necessary
//                        $("#email").addClass("object_error");
//                        $("#button").css("background-color", "gray").click(function() {return false;});
//                        $(this).html(msg);
//                    }
//                   
//                   });
//
//                 } 
//
//                  }); 
//
//                }
//                else
//                    {
//                    $("#emailstats").html('<font color="white">The email should have.</font>');
//                    $("#email").removeClass('object_ok'); // if necessary
//                    $("#email").addClass("object_error");
//                    $("#button").css("background-color", "gray").click(function() {return false;});    
//                    }
//                    
//               
//
//                });
//
//                });
//            
//    // Bookings show/hide
//
//        $(document).ready(function(){
//            $("#myBookings").click(function(){
////                $("#hiddenForm").toggle();
//                hiddenForm.style.display="block";
//                profile_hidden.style.display="none";
//            });
//        });
//    // Profile show/hide
//
//        $(document).ready(function(){
//            $("#myProfile").click(function(){
////                $("#profile_hidden").toggle();
//                profile_hidden.style.display="block";
//                hiddenForm.style.display="none";
//            });
//        });



   

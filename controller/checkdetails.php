<?php
require('../model/database.php');
	//retrieve the functions

    
 if(isset($_POST['username'])){
$memberusername = ($_POST['username']);

 $sql  = "SELECT COUNT(memberusername) as usercount FROM member WHERE memberusername = '$memberusername'";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
    foreach($result as $row){
             $count = $row['usercount'];
        
    if($count >= 1) {
                echo'<font color="white" size="1px">The username <STRONG>'.$memberusername.'</STRONG> is already in use</font>';
                
            } 
            else {
                echo "OK";
              
            }
    
}
     }
       
 if(isset($_POST['email'])){
$memberemail = ($_POST['email']);

 $sql  = "SELECT COUNT(memberemail) as emailcount FROM member WHERE memberemail = '$memberemail'";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
    foreach($result as $row){
             $count = $row['emailcount'];
        
    if($count >= 1) {
                echo'<font color="white" size="1px">(The email <STRONG>'.$memberemail.'</STRONG> is already in use)</font>';
                
            } 
            else {
                echo "GOOD";
              
            }
    
}
     }   
    
    
    
    

//    $num_rows = $conn->prepare($sql_check);
//    $num_rows->execute();
//    $result = $num_rows->fetchAll();
//		$num_rows->closeCursor();
//         foreach($result as $row){
//             $count = $row['emailcount'];
//         
////    $statement->bindValue(':memberemail', $memberemail);
//    
////    $result = $num_rows->fetchAll();
//            if($count >= 1) {
//                echo'<font color="white">(The nickname <STRONG>'.$memberemail.'</STRONG> is already in use)</font>';
//                echo $count;
//            } 
//            else {
//                echo "OK";
//                echo $count;
//            }
//}
//    }

//if(isset($_POST['username'])){
//$memberusername = ($_POST['username']);
//
// $sql_check = "SELECT memberID FROM member WHERE memberusername = '.$memberusername.'";
//
//    $num_rows = $conn->query($sql_check);
////    $statement->bindValue(':memberemail', $memberemail);
//    $result = $num_rows->fetchAll();
//            if(empty($result)) {
//                echo'<font color="white">(The nickname <STRONG>'.$memberusername.'</STRONG> is already in use)</font>';
//            } 
//        
//            else {
//                echo "OK";
//            }
//}
?>

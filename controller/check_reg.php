<?php

    $num_rows = count_username();
    $result = $num_rows->fetchAll();
            if(!empty($result)) {
                echo'<font color="white">(The nickname <STRONG>'.$username.'</STRONG> is already in use)</font>';
            } 
        
            else {
                echo "OK";
            }

?>

<?php 
        //create connection
        $dbc = new mysqli("localhost", "root", "", "wst");
        
        // Check connection
        if($dbc === false){
            die("ERROR: Could not connect. " . $dbc->connect_error);
        }      
         mysqli_set_charset($dbc, 'utf8');
 ?>
<?php
#Bader Alotaibi 53306
#Fatemah Abbas 50174
#Andre Thomas 53453
     
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "csis255 project";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    mysqli_set_charset($con,"utf8");


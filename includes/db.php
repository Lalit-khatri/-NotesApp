<?php

   $servername = "localhost";
   $username = "lalitkhatri";
   $password = "khatri";
   $dbname = "todosdb";

   $connection = new mysqli($servername , $username , $password , $dbname );
     
      if ($connection->connect_error) 
    {
      die("Connection failed: " . $connection->connect_error);
    }

     $query ="CREATE TABLE todos (
     id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(30) NOT NULL,
     content VARCHAR(500) NOT NULL,
     important TINYINT(1) NOT NULL,
     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
     )";
     if(mysqli_query($connection, $query))
     {
      echo "Table MyGuests created successfully";
      
     }


     $query ="CREATE TABLE workdone (
     id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(30) NOT NULL,
     content VARCHAR(500) NOT NULL,
     important TINYINT(1) NOT NULL,
     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
     )";

     if(mysqli_query($connection, $query))
     {
      echo "Table MyGuests created successfully";
      
     }
   
   


     ?>

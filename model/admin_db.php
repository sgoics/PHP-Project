<?php


    $dsn = 'mysql:host=localhost;dbname=project1';
    $username = 'root';
    $password = 'Pa$$w0rd';
    
    
        try{
            $db = new PDO($dsn, $username,$password);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
            
            }




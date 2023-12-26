<?php
    $host = 'localhost';
    $dbname = 'khun_aoun';
    $username = 'root';
    $password = '';

    // Create a connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // else {
    //     echo "Connected to the database successfully!";
    // }
?>
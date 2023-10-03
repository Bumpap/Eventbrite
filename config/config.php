<?php
    $mysqli = new mysqli('localhost','root','','appstore');

    if($mysqli-> connect_error)
    {
        echo "Failed to connect to MYSQL: " . $mysqli->connect_error;
        exit();
    }
?> 
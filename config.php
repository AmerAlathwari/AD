<?php

//database credentials
$db_host = 'localhost';
$db_name = 'grocerysystem';
$db_username = 'root';
$db_password = 'root';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

//Display error if failed to connect
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $db->connect_error);
    exit();
    } 
?>
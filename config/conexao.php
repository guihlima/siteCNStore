<?php

$db_name = 'ecommerce';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if($mysqli->connect_errno){
    echo "Connect failed: " . $mysqli->connect_error;
}
    
?>
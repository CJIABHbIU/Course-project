<?php

$user = "root";
$password = "9260809906Ruslan";

try {
    $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
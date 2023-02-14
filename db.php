<?php

$link = 'mysql:host=localhost;dbname=php_hr';
$user="userhr";
$password="user1234";

try{
    $pdo= new PDO($link, $user, $password);
}catch(Exception $e){
    print "Error!" . $e->getMessage(). "<br>";
}

?>
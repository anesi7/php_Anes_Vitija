<?php

session_start();

$user="root";
$pass="";
$server="localhost";
$username="dbanes";





try{
    $conn= new PDO("mysql:host = $server; dbname=$dbname",$user,$pass );
    echo "connected";

}catch(PDOException $e){
    echo "error: ". $e->getMessage();
}













?>
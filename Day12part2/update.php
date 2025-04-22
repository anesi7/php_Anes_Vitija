<?php
include_once('config.php');	

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    
    $sql = "insert into users (name, surname, email) values (:name, :surname, :email)";
    $sqlQuery = $conn->prepare($sql);

    $sqlQuery->bindParam(':name', $name); 
    $sqlQuery->bindParam(':surname', $surname); 
    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':username', $username);

    $sqlQuery->execute();

    echo "Data saved successfully ...<br>";
}
?>
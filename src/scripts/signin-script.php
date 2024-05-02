<?php

session_start();

//connect to db with PDO
$connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
//prepare request (SELECT)
$request = $connectDatabase->prepare("SELECT * FROM users WHERE username = :username ");
//bind params
$request->bindParam(':username', $_POST['username']);
//execute request    
$request->execute();

//fetch
$result = $request-> fetch(PDO::FETCH_ASSOC);


$_SESSION['id'] = $result["id"];
header('Location: ../recipe.php?');


?>
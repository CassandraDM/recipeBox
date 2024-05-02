<?php
$connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
// prepare request
$request = $connectDatabase->prepare("DELETE FROM recipes WHERE id = :id");
// bind param
$request->bindParam(':id', $_GET['id']);
// execute request
$request->execute();

header('Location: ../recipe.php');

?>
<?php
session_start();

$title_recipe = $_POST['title'];
$img_recipe = $_POST['img'];
$ingredients_recipe = $_POST['ingredients'];
$steps_recipe = $_POST['steps'];

if(empty($title_recipe)) {
    header("Location: ../create-recipe.php");
    die(); 
}

if(empty($img_recipe)) {
    header("Location: ../create-recipe.php");
    die(); 
}

if(empty($ingredients_recipe)) {
    header("Location: ../create-recipe.php");
    die(); 
}

if(empty($steps_recipe)) {
    header("Location: ../create-recipe.php");
    die(); 
}

if(!empty($title_recipe) && !empty($img_recipe) && !empty($ingredients_recipe) && !empty($steps_recipe)){
    $connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
    $request = $connectDatabase->prepare("INSERT INTO recipes (title, image, ingredients, steps, user_id) VALUES (:title, :image, :ingredients, :steps, :user_id)");
    $request->bindParam(':title', $title_recipe);
    $request->bindParam(':image', $img_recipe);
    $request->bindParam(':ingredients', $ingredients_recipe);
    $request->bindParam(':steps', $steps_recipe);
    $request->bindParam(':user_id', $_SESSION['id']);
    $request->execute();
    
    header('Location: ../recipe.php');
}



?>
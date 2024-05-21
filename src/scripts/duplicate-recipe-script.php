<?php
    session_start();


    $connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
    
    $recipe_id = $_GET['id'];
    $request = $connectDatabase->prepare("SELECT * FROM recipes WHERE id = :id");
    $request->bindParam(':id', $recipe_id);
    $request->execute();
    $recipe = $request->fetch(PDO::FETCH_ASSOC);

    $duplicateRequest = $connectDatabase->prepare("INSERT INTO recipes (title, image, ingredients, steps, user_id) VALUES (:title, :image, :ingredients, :steps, :user_id)");
    $duplicateRequest->bindParam(':title', $recipe['title']);
    $duplicateRequest->bindParam(':image', $recipe['image']);
    $duplicateRequest->bindParam(':ingredients', $recipe['ingredients']);
    $duplicateRequest->bindParam(':steps', $recipe['steps']);
    $duplicateRequest->bindParam(':user_id', $_SESSION['id']);
    $duplicateRequest->execute();

     header('Location: ../recipe.php');

?>
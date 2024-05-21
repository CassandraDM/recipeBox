<?php

    $title_recipe = $_POST['title'];
    $img_recipe = $_POST['img'];
    $ingredients_recipe = $_POST['ingredients'];
    $steps_recipe = $_POST['steps'];

    $connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
    $request = $connectDatabase->prepare("UPDATE recipes SET title = :title, image = :image, ingredients = :ingredients, steps = :steps WHERE id = :id");
    $request->bindParam(':title', $title_recipe);
    $request->bindParam(':image', $img_recipe);
    $request->bindParam(':ingredients', $ingredients_recipe);
    $request->bindParam(':steps', $steps_recipe);
    $request->bindParam(':id', $_POST['id']);
    $request->execute();

    header('Location: ../recipe.php');

?>
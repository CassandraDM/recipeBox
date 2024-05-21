<?php
    require_once __DIR__ . '/parts/header.php';

     // Connect to the database
     $connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");

     // Get the ID of the recipe from the URL or any other source
     $recipe_id = $_GET['id'];
 
     // Prepare the SQL query
     $request = $connectDatabase->prepare("SELECT * FROM recipes WHERE id = :id");
     $request->bindParam(':id', $recipe_id);
 
     // Execute the query
     $request->execute();
 
     // Fetch the recipe data
     $recipe = $request->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Edit your recipe</h1>

    <form action="scripts/replace-recipe-script.php" method="POST" class="form-create-recipe">
        <div class="form-row">        
            <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $recipe['title']; ?>">
            <input type="text" class="form-control" placeholder="Image url" name="img" value="<?php echo $recipe['image']; ?>">
        </div>
        <div class="form-row" >        
            <textarea class="form-control" placeholder="Ingredients 1; ingredients 2; ..." name="ingredients"><?php echo $recipe['ingredients']; ?></textarea>
            <textarea class="form-control" placeholder="Steps 1; steps 2; ..." name="steps"><?php echo $recipe['steps']; ?></textarea>
        </div>
        <div >        
            <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
            <input type="submit" value="Update" class="btn btn-primary w-100">
        </div>
    </form>

</div>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>
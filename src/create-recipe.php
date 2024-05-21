<?php
    require_once __DIR__ . '/parts/header.php'
?>

<div class="container">
    <h1>Create a recipe</h1>

    <form action="scripts/create-recipe-script.php" method="POST" class="form-create-recipe">
        <div class="form-row">        
            <input type="text" class="form-control" placeholder="Title" name="title">
            <input type="text" class="form-control" placeholder="Image url" name="img">
        </div>
        <div class="form-row" >        
            <textarea class="form-control" placeholder="Ingredients 1; ingredients 2; ..." name="ingredients"></textarea>
            <textarea class="form-control" placeholder="Steps 1; steps 2; ..." name="steps"></textarea>
        </div>
        <div >        
            <input type="submit" value="Create" class="btn btn-primary w-100">
        </div>
    </form>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>
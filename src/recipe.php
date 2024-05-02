<?php
    require_once __DIR__ . '/parts/header.php'
?>

<?php 
    
    if(!isset($_SESSION['id'])){
        header('Location: ../index.php'); 
    }
?>



<div class="recipeList">
    <h1>Recipes list<h1>
<div>

<div class="recipe-list">
<?php
    $connectDatabase = new PDO("mysql:host=db;dbname=recipeBox","root", "admin");
    // prepare request
    $request = $connectDatabase->prepare("SELECT * FROM recipes WHERE user_id = :user_id");
    $request->bindParam(':user_id', $_SESSION['id']);
    // execute request
    $request->execute();

    // fetch All data from table posts
    $recipes = $request->fetchAll(PDO::FETCH_ASSOC);
    

?>

<?php if(isset($_GET['error'])) :?>
    <div class="alert alert-danger">
        <?php echo $_GET['error']; ?>
    </div>
<?php endif; ?>

<?php
    foreach($recipes as $index => $recipes):
?>

<div class="recipe">
    <div>
        <h1><?php echo htmlspecialchars($recipes['title']); ?></h1>
        <div>
            <ul>
                <?php $recipes['ingredients'] = explode(";",$recipes['ingredients']) ?>
                <?php foreach($recipes['ingredients'] as $ingredient) : ?>
                    <li><?php echo htmlspecialchars($ingredient); ?></li>
                <?php endforeach ?>
            </ul>
            <ul>
                <?php $recipes['steps'] = explode(";",$recipes['steps']) ?>
                <?php foreach($recipes['steps'] as $steps) : ?>
                    <li><?php echo htmlspecialchars($steps); ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <img src="<?php echo $recipes['image']; ?>" alt="">
</div>
<?php endforeach ?>
</div>


<?php
    require_once __DIR__ . '/parts/footer.php'
?>
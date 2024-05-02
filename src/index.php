<?php
    require_once __DIR__ . '/parts/header.php'
?>

<div class="container">
    <h1>Login page</h1>

    

    <form action="scripts/signin-script.php" method="POST">
        <div class="mb-3">        
            <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="mb-3">        
            <input type="submit" value="Signin" class="btn btn-primary w-100">
        </div>
    </form>
</div>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>


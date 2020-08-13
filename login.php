<?php
    require_once "included/header.php";
?>

<div class="m-5 p-3 text-center">
    <h1 class="mb-3">Log In</h1>
    <p>Have you aleady registerd ?<span> </span><a style="text-decoration: none;" href="register.php">You have to regist.</a></p>

    <form action="included/backendOfLogIn.php" method="POST">
        <input class="form-control mt-5 mb-3" type="text" name="name" placeholder="name">
        <input class="form-control mt-3 mb-5" type="password" name="password" placeholder="password">
        <button class="btn btn-info mt-3 mb-5" type="submit" name="submit">Log In</button>
    </form>
</div>

<?php
    require_once "included/footer.php";
?>

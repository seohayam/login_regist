<?php
    require_once "included/header.php";
?>

<div class="m-5 p-3 text-center">
    <h1 class="mb-3">Regist</h1>
    <p>Did you regist ?<span> </span><a style="text-decoration: none;" href="login.php">You shuld go to Log In.</a></p>

    <form action="included/backendOfRegister.php" method="POST">
        <input class="form-control mt-5 mb-3" type="text" name="name" placeholder="name">
        <input class="form-control mt-3 mb-3 " type="password" name="password" placeholder="password">
        <input class="form-control mt-3 mb-5" type="password" name="confirmedPassword" placeholder="パスワードを再入力">
        <button class="btn btn-info mt-3 mb-5" type="submit" name="submit">Regist</button>
    </form>
</div>

<?php
    require_once "included/footer.php";
?>

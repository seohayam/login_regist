<?php
    if(isset($_SESSION['id'],$_SESSION['name'])){
        unset($_SESSION);
        session_destroy();
    }
    require_once "included/header.php";
?>
<div id="body" style="height: 550px">
    <h1 class="m-5 text-center">welcome secret diary!</h1>
    <div class="row d-flex justify-content-md-center text-center">
        <div class="col-md-6">
            <a href="register.php" class="m-5 btn btn-info">登録をされていない方はこちら！</a>
        </div>
        <div class="col-md-6">
            <a href="login.php" class="m-5 btn btn-secondary">ログインする方はこちら！</a>
        </div>
    </div>
</div>
<?php
    require_once "included/footer.php";
?>




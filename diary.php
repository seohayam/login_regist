<?php
session_start();
// 1.header.php
// ログアウト画面をindex.phpのheaderに設ける（そこで、destroyされる様にする）

// *データを送信する時は、２と３の方法がある

// 2.fotter.php
// jqueryを使って非同期システムを作る
// input propertychangeを使って、#textがinputされたら
// data{text:$(#text).value()}をpostメソッドで、diary.phpに送信する

// 3.diary.php
// database.phpと接続
// もしsubmitされたら
// コネクトする（データベースに）
// mysqli_real_escapeを入れて特殊文字を省く
// UpdateをSETする（ポストされたtext）limit1で使用する（whereのidはSESSIONidを使用）
// こう言う時はmysqli_queryを使う
require "included/header.php";
?>
<h1 class="text-center m-5 bg-info rounded p-3">ここにあなたの日記を書いてください</h1>
<form class="form-group m-5" action="included/diaryOfBE.php" method="POST">
    <div><textarea style="height: 15rem;" class="form-control border border-info" id="textarea"  name="text"></textarea></div>
    <div class="text-center m-5"><button class="btn btn-info" type="submit" name="submit">記録する</button></div>
</form>






<!-- ここからは真ん中だよ -->
<!-- <div style="height: 405px">
    <h1 class="text-center text-info m-5">ここに今日の日記を書きましょう！</h1>
    <form action="included/diaryOfBE.php" method="POST">
        <div class="row text-center m-5 p-5">
            <div class="col-md-5 my-3">
                <p style="font-size: 2rem;">名前：<?php echo $_SESSION['name'];?></p>
            </div>
            <div class="col-md-5">
                <textarea id="diary" name="content" style="width: 400px; height: 70px;"></textarea>
            </div>
            <div class="col-md-5">
                <button type="submit" name="submit">記録する</button>
            </div>
        </div>
    </form>
</div> -->
<div id="logOut" class="text-center">
    <a class="btn btn-info m-5" href="index.php">ログアウトする</a>
</div>

<?php
    include "included/footer.php";
?>
<?php
session_start();
require "dataBase.php";

$text = $_POST['text'];
$id = $_SESSION['id'];

if(isset($_POST['submit'])){

    $query = "UPDATE `users` SET `text` = '$text' WHERE `id`= '$id' LIMIT 1 ";
    
    $query = mysqli_query($conection,$query);

    if($query){
        header("Location:../diary.php?complete");
    }else{
        header("Location:../diary.php?again"); 
    }
}
?>
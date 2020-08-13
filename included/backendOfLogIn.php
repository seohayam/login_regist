<?php
//     require 'dataBase.php';
// $sql = "SELECT * FROM users WHERE id = 1";
// $link = $conection;
// $query = mysqli_query($link,$sql);
// $result = mysqli_fetch_array($query);
// print_r($result);


if(isset($_POST['submit'])){
    require "dataBase.php";
    $name = $_POST['name'];
    $password = $_POST['password'];

    if(empty($name) || empty($password)){
        header("Location:../login.php?goback");
        exit();

    }else{
        $sql = "SELECT * FROM users WHERE name = ?";
        $stmt = mysqli_stmt_init($conection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?ERROR");
            exit();

        }else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($rows = mysqli_fetch_assoc($result)){
                $PC = password_verify($password,$rows['password']);
                if($PC == false){
                    header("Location: ../login.php?whatNotCorectPassword");
                    exit();

                }elseif($PC == true){
                    session_start();
                    session_regenerate_id(true);
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['name'] = $rows['name'];
                    header("Location: ../diary.php?succeFul");
                    exit();

                }else{
                    header("Location: ../login.php?notCorectPassword");
                    exit();
                }
            }else{
                header("Location: ../login.php?notingYourName");
                exit();
            }

        }
    }
}

?>
<?php
//     require 'dataBase.php';
// $sql = "SELECT * FROM users WHERE id = 1";
// $link = $conection;
// $query = mysqli_query($link,$sql);
// $result = mysqli_fetch_array($query);
// print_r($result);

if(isset($_POST['submit'])){
    require 'dataBase.php';
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmed = $_POST['confirmedPassword'];

    if(empty($name) || empty($password) || empty($confirmed)){
        header("Location: ../register.php?notEnterd");
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9]*/",$name)){
        header("Location:../register.php?notMachCharacterAtName");
        exit();
    }elseif($password !== $confirmed){
        header("Location:../register.php?notSamePassword");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE name = ?"; 
        $stmt = mysqli_stmt_init($conection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../register.php?conectionError");
            exit();     
        }else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rows = mysqli_stmt_num_rows($stmt);

            if($rows > 0){
                header("Location:../register.php?alreadyExsit");
                exit();

            }else{
                $sql = "INSERT INTO users (name,password,text) VALUES (?,?,'')";
                $stmt = mysqli_stmt_init($conection);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:../register.php?conectonError");
                    exit();

                }else{
                    $hashpas = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ss",$name,$hashpas);
                    mysqli_stmt_execute($stmt);

                    // mysqli_stmt_store_result($stmt);
                    // $rows = mysqli_stmt_num_rows($stmt);        
                    header("Location:../login.php?suceceed");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conection);

}


?>
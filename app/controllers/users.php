<?php
include "app/db/db.php";
include  "path.php";

$errMsg = '';

//reg
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']) ){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passFirst = trim($_POST['pass-first']);
    $passSecond = trim($_POST['pass-second']);


    if($login === '' || $email === '' || $passFirst === ''){
        $errMsg = "Не все поля заполнены";
    }elseif(mb_strlen($login, 'UTF-8') < 2){
        $errMsg = "Логин должен быть более двух символов";
    }elseif(mb_strlen($passFirst, 'UTF-8') < 7){
        $errMsg = "Пароль должен быть болееьше 7-ми символов";
    }elseif($passFirst !== $passSecond){
        $errMsg = "Пароли должны соответсвовать";
    }else{
        $pass = password_hash($passFirst, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];
        $id = insert('users', $post);
        $user = selectOne('users', ['id' => $id]);
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        header('location: ' . BASE_URL);


    }
}else{
    $login = '';
    $email = '';
}

//log
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];
            header('location: ' . BASE_URL);
        }else{
           $errMsg ="Почта или пароль введены неверно!";
        }

    }


}else{
    $email = '';
}








<?php

// контроллер
include_once SITE_ROOT . "/app/db/db.php";

$page = $_GET['post'];
$username = '';
$comment = '';
$errMsg = '';
$comments = [];


// Код для формы создания комментария
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])) {


    $username = trim($_POST['username']);
    $comment = trim($_POST['comment']);


    if ($username === '' || $comment === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($comment, 'UTF8') < 20) {
        $errMsg = "Комментарий должен быть длинее 20 символов";
    } else {
        $comment = [
            'page' => $page,
            'username' => $username,
            'comment' => $comment
        ];

        $comment = insert('comments', $comment);
    }
} else {
    $email = '';
    $comment = '';
}
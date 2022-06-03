<?php
include "../../path.php";
include SITE_ROOT . "/app/db/db.php";

$errMsg = '';
$id = '';
$title = '';
$img = '';
$content = '';
$topic = '';


$topics = selectAll('topics');
$posts = selectAll('posts');


// Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])){

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $destination = ROOT_PATH . "\assets\images\Posts\\" . $imgName;

        $result = move_uploaded_file($fileTmpName, $destination);

        if($result){
            $_POST['img'] = $imgName;
        }else{
            $errMsg = "Загрузка не удалась";
        }
    }else{
        $errMsg = "Ошибка получение картинки";
    }
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = trim($_POST['publish']);

    $publish = trim($_POST['publish']) !== null ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 7){
        $errMsg = "Название статьи должно быть более 7-ми символов";
    }else{
        $post = [
            'id_users' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
            $post = insert('posts', $post);
            $post = selectOne('posts', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/topics/index.php');
        }
}else{
    $title = '';
    $content = '';
}
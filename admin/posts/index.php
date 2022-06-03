<?php
include "../../app/controllers/posts.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>

<?php include "../../app/include/header-admin.php"; ?>

<div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>

    <div class="posts col-9">
        <div class="button row">
            <a href="create.php" class="col-2 btn btn-success">Создать</a>
            <span class="col-1"></span>
            <a href="index.php" class="col-3 btn btn-warning">Редактировать</a>
        </div>
        <div class="row title-table">
            <h2>Управление записями</h2>
            <div class="col-1">ID</div>
            <div class="col-3">Название</div>
            <div class="col-2">Автор</div>
            <div class="col-6">Управление</div>
        </div>
        <?php foreach ($posts as $key => $post): ?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1; ?></div>
                <div class="title col-3"><?=$post['title']; ?></div>
                <div class="author col-2"><?=$post['id_users']; ?></div>
                <div class="red col-1"><a href="">edit</a></div>
                <div class="del col-2"><a href="">delete</a></div>
                <?php if($post['status']): ?>
                    <div class="del col-2"><a href="">Задержать</a></div>
                <?php else: ?>
                    <div class="del col-2"><a href="">Опубликовать</a></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
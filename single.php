<?php include("path.php");

include "app/controllers/topics.php";
include "app/controllers/reviews.php";
$post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/single.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>
<!-- header -->
<!-- header -->
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL . "logout.php"; ?>">JProperties</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href = "<?php echo BASE_URL . "logout.php"; ?>">Главная</a></li>
                    <li>
                        <?php if(isset($_SESSION['id'])): ?>
                            <a href = "#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if($_SESSION['admin']): ?>
                                    <li><a href = "<?php echo BASE_URL . "admin/posts/create.php"; ?>">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href = "<?php echo BASE_URL . "logout.php"; ?>">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href = "<?php echo BASE_URL . "log.php"; ?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                                <li><a href = "<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- блок main-->
<div class="container">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2><?php echo $post['title']; ?></h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user"> <?=$post['username'];?></i>
                    <i class="far fa-calendar"> <?=$post['created_data'];?></i>
                </div>
                <div class="single_post_text col-12">
                    <?=$post['content'];?>
                </div>
                <div class="cpl-md-12 col-12 comments">
                    <div class="w-100"></div>
                    <h3 class="text_12">Оставить комментарий</h3>
                    <form action="<?=BASE_URL . "single.php?post=$page"?>" method="post">
                        <input type="hidden" name="page" value="<?=$page; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Укажите ваше имя</label>
                            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите ваше имя">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Напишите ваш отзыв</label>
                            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>


            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li>
                            <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>
<?php
    include("app/controllers/users.php");
?>


<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Styling -->
    <link rel="stylesheet" href="assets/css/Style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">

</head>
<body>

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


<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="log.php">
        <h2>Авторизация</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?=$email?>">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-secondary" name="button-log">Отправить</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>


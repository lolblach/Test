<?php
    include 'path.php';
    include "app/controllers/topics.php";
    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');

?>

<!doctype html>
<html lang="en">
<head>
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Styling -->
  <link rel="stylesheet" href="assets/css/style.css">
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

<!-- carousel -->
<div class="container">
  <div class="row">
    <h2 class = "slider-title">Выберите квартиры по городам</h2>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption-hack carousel-caption d-none d-md-block">
          <h5><a href="">Квартиры в Москве</a></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/images/16486910.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption-hack carousel-caption d-none d-md-block">
          <h5><a href="">Квартиры в Сочи</a></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/images/kupit-kvartiru-v-kryimu.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption-hack carousel-caption d-none d-md-block">
          <h5><a href="">Квартиры в Туле</a></h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- Main block -->
<div class ="container">
  <div class = "content row">
    <!-- Main Content -->
    <div class ="main-content col-md-9 col-12">
      <h2>Выгодные предложения</h2>
    <?php foreach ($posts as $post): ?>
      <div class="post row">
        <div class="img col-12 col-md-4">
          <img src="<?= BASE_URL . 'assets/images/Posts/' . $post['img'] ?>" class="img-fluid" alt="<?=$post['img']?>">
        </div>
        <div class="post_text col-12 col-mb-8">
          <h3>
            <a href="<?= BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 120)?></a>
          </h3>
          <i class="far fa-user"> <?=$post['username'];?></i>
          <i class="far fa-calendar"> <?=$post['created_data'];?></i>
          <p class="preview-text">
              <?=mb_substr($post['content'], 0, 120, 'UTF-8') . "..."?>
          </p>
        </div>
      </div>
     <?php endforeach; ?>
    </div>

    <!-- sidebar Content -->
    <div class="sidebar col-md-3">
       <div class="section search">
         <h3>Поиск</h3>
           <from action="/" method="post">
             <input type="text" name="search-term" class="text-input" placeholder="Искать">
           </from>
       </div>


      <div class="category">
        <h3>Категории</h3>
        <ul>
          <?php foreach ($topics as $key => $topic): ?>
              <li>
                  <a href="#"><?=$topic['name']?></a>
              </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
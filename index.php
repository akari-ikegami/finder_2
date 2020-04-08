<?php

require_once('./dbconnect.php');
require_once('./Models/Post.php');
require_once('./function.php');


$post = new Post();

if(isset($_GET['title'])){
  $title = $_GET['title'];
  // LIKE関数
  // findByTitleをTask.phpに作る
  $posts = $post->findByTitle(["%$title%"]);
} else {
  $posts = $post->getAll();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark" style="background:radial-gradient(#F2B9A1,#EA6264)fixed;">
                    <a href="index.php" class="navbar-brand">Finder</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="create.php">新規作成</a>
                        </li>
                        <li class="nav-item">
                            <form action="" class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="キーワード" aria-label="Search" name="title">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">検索</button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>

        <div class="row p-3">
        <?php foreach ($posts as $post): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 py-3 py-3">
                <div class="card">
                <img class="user-img" src="<?= $post['img_at'] ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= h($post['title']); ?></h5>
                        <p class="card-text">
                            <?= h($post['contents']); ?>
                        </p>
                        <div class="text-right d-flex justify-content-end">
                            <a href="edit.php?id=<?= h($post['id']); ?>" class="btn text-success">EDIT</a>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= h($post['id']); ?>">
                                <button type="submit" class="btn text-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>
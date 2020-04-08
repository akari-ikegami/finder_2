
<?php

require_once('./Models/Post.php');

$title = $_POST['title'];
$contents = $_POST['contents'];

$file = $_FILES['image']['tmp_name'];



if ($_FILES['image']['error'] !== 4) {
  $imgPath = 'images/' . $_FILES['image']['name'];
  // 画像の保存
  // 第一引数が対象のファイル、第2引数が保存先
  move_uploaded_file($file, $imgPath);
// そうでなければ(画像がアップロードされていない場合)
} else {
  $imgPath = 'images/default.php';
}

// var_dump($imgPath);
// DBへの保存
// $stmt = $dbh->prepare('INSERT INTO posts (`title`, contents) VALUES (?, ?)');
// $stmt->execute([$title, $contents, $imgPath]);

// $stmt = $dbh->prepare('INSERT INTO users (`name`, image_at) VALUES (?, ?)');

$post = new Post();
$post->create([$title, $contents, $imgPath]);

header('Location:index.php');
exit;

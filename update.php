<?php

require_once('./Models/Post.php');

$title = $_POST['title'];
$contents = $_POST['contents'];
$id = $_POST['id'];
// var_dump($id);

$post = new Post();
$post->update([$title, $contents, $id]);

header('location:index.php');
exit;
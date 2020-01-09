<?php
require_once 'db_connection.php';

$id = $_GET['id'];
$title = $_GET['title'];
$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $book['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="flex">
        <div class="inf">
            <h1><?= $book['title']; ?></h1><br>
            <p>Released: <?= $book['release_date']; ?></p><br>
            <p>Language: <?= $book['language']; ?></p><br>
            <p>Pages: <?= $book['pages']; ?></p><br>
            <p>Price: <?= round($book['price'], 2); ?>€</p><br>
            <p>Available now: <?= $book['stock_saldo']; ?></p><br>
            <p>Type: <?= $book['type']; ?></p><br>
            <p>Summary: <br> <?= $book['summary']; ?></p><br>
        </div>
        <img src="<?= $book['cover_path']; ?>" alt="" style="align-self: flex-start">
    </div>
</body>
</html>

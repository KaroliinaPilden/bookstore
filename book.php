<?php
require_once 'db_connection.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM books b LEFT JOIN book_authors ba ON book_id = b.id LEFT JOIN authors a ON author_id = a.id WHERE b.id = :id');
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
    <button id='back' onclick='history.back()'>⮕</button>
    <div class="flex">
        <div class="inf">
        
            <h1><?= $book['title']; ?></h1>
            <h2><?= $book['first_name'];?> <?= $book['last_name'];?></h2>
            <p>Released: <?= $book['release_date']; ?></p>
            <p>Language: <?= $book['language']; ?></p>
            <p>Pages: <?= $book['pages']; ?></p>
            <p>Price: <?= round($book['price'], 2); ?>€</p>
            <p>Available now: <?= $book['stock_saldo']; ?></p>
            <p>Type: <?= $book['type']; ?></p>
            <p>Summary: <br> <?= $book['summary']; ?></p>
        </div>
        <img src="<?= $book['cover_path']; ?>" alt="" style="align-self: flex-start">
    </div>
    <a id='editing' href='edit.php?id=<?=$id?>'>Edit</a>
    <a id='editing' href='delete.php?id=<?=$id?>'>Delete</a>
</body>
</html>

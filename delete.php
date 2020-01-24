<?php
require_once ('db_connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM books WHERE id = :id');
    $stmt->execute(['id' => $id]);
    echo('Kustutatud');
    header('Location: index.php');
}

else {
    echo ('id viga');
}

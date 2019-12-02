<?php
$host = '127.0.0.1';
$db   = 'books';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<form method="GET" action="/index.php">
    <input type="text" name="year">
</form>

<?php
$stmt = $pdo->prepare('SELECT * FROM books WHERE release_date = :year');
$stmt->execute(['year' => 2000]);
while ($row = $stmt->fetch())
{
    echo $row['title'] . "<br>" ;
}
?>
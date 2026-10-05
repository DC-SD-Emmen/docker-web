<?php
// Testpagina: controleert of PHP en de MySQL-verbinding werken.
// Je mag de bestanden in de map /src gerust verwijderen en aanpassen.
// Deze bestanden zijn puur ter demonstratie.

try {
    $dsn = 'mysql:host='. $_ENV['DB_HOST'] .';dbname='. $_ENV['DB_NAME'] .';charset=utf8mb4';
    $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    $db = 'Verbonden met MySQL ' . $pdo->query('SELECT VERSION()')->fetchColumn();
} catch (PDOException $e) {
    $db = 'Geen verbinding met MySQL: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>DCTerra Software Developer - Docker Container</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="images/dct-logo.svg" alt="DCTerra Logo">
        </div>
        <div class="card info-card">
            <h1>Docker Container running!</h1>
            <p>PHP <?= PHP_VERSION ?></p>
            <p><?= htmlspecialchars($db) ?></p>
            <div class="buttons">
                <a href="info.php" target="_blank">phpinfo()</a>
                <a href="http://localhost:8081" target="_blank">phpMyAdmin</a>
                <a href="https://www.w3schools.com/php/default.asp" target="_blank">W3 Schools</a>
            </div>
        </div>
    </div>      
</body>
</html>

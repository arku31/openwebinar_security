<?php
$q = isset($_POST['q']) ? $_POST['q'] : '';
$dsn = "mysql:host=localhost;charset=utf8;";
$pdo = new PDO($dsn, 'root', '123');
$pdo->query("CREATE DATABASE IF NOT EXISTS `loftschoolsecurity`");
$pdo->query('use loftschoolsecurity;');
$pdo->query("CREATE TABLE IF NOT EXISTS `xss` (
  `text` TEXT CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример XSS</title>
</head>
<body>

<h1>Значение в базе:</h1>
<?php
$query = $pdo->query('SELECT * FROM xss;');
$result = $query->fetch();
echo $result['text'];
?>
<form action="" method="post">
    <input type="text" name="q" placeholder="Начните поиск">
    <input type="submit" value="Найти">
</form>
</body>
</html>

<?php if (!empty($q)) {
    //Всегда очищаем
    $pdo->query("truncate table xss;");
    $pdo->query("insert into xss (text) VALUES ('{$q}');");
}
?>

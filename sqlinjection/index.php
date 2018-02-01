<?php
$q = isset($_POST['q']) ? $_POST['q'] : '';
$dsn = "mysql:host=localhost;charset=utf8;";
$pdo = new PDO($dsn, 'root', '123');
$pdo->query("CREATE DATABASE IF NOT EXISTS `loftschoolsecurity`");
$pdo->query('use loftschoolsecurity;');
$pdo->query("CREATE TABLE IF NOT EXISTS `sqlinjection` (
  `text` TEXT CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
if (!empty($q)) {
    $pdo->query("insert into sqlinjection (text) VALUES ('{$q}');");
    header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?')); //Переадресация чтобы не было дубляжа
}
//if (!empty($_GET['clean'])) {
//    $pdo->query("truncate table sqlinjection");
//    header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?')); //Переадресация чтобы не было дубляжа
//}
if (!empty($_POST['f'])) {
    $userinput =  $_POST['f'];

    $query = "SELECT * FROM sqlinjection WHERE `text` = '{$_POST['f']}'";

    $injection = $pdo->query($query);
    if ($injection) {
        print_r($injection->fetchAll());
    }

//    header('Location: '.strtok($_SERVER["REQUEST_URI"],'?')); //Переадресация чтобы не было дубляжа
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример SQL-Injection</title>
</head>
<body>
<h1>Добавить пользователя</h1>
<form action="" method="post">
    <input type="text" name="q" placeholder="" value="123">
    <input type="submit" value="add">
</form>

<h1>Эксплуатация уязвимости</h1>
<form action="" method="post">
    <input type="text" name="f" placeholder="" value="1; truncate table sqlinjection;">
    <input type="submit" value="Поиск">
</form>

<a href="?clean=1">Очистить таблицу</a>
<h1>Значение в базе:</h1>
<?php
$query = $pdo->query('SELECT * FROM sqlinjection;');
$result = $query->fetchAll();
echo "<pre>";
print_r($result);
echo "</pre>";
?>

</body>
</html>


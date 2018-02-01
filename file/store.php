<?php
$file = $_FILES['file'];

if (preg_match('/jpg/', $file['name']) or preg_match('/png/', $file['name']) or preg_match('/gif/', $file['name'])) {
    //Проверяем имя файла. У нас PNG - файл проходит
    if (preg_match('/jpg/', $file['type']) or preg_match('/png/', $file['type']) or preg_match('/gif/', $file['type'])) {
        //Проверяем mime type - у нас GIF. Все Ок
        echo 'Файл имеет верный mime-type. "Доверяем" и загружаем его' . PHP_EOL;
        move_uploaded_file($file['tmp_name'], 'uploads/' . $file['name']);
        echo "Выводим результат проверки: file-type: " . mime_content_type('uploads/' . $file['name']) . PHP_EOL;
    }
} else {
    die("Ошибка итд");
}
echo "<a href='index.html'>Назад</a>";
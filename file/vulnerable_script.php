Этот скрипт принимает в качестве параметра некий файл, например файл шаблона который необходимо подключить.

<div style="border: 1px solid red;">
    Вывод файла, php код не выполняет:
    <img src="<?=$_GET['filename']?>" alt="" style="border: 20px green solid">
</div>
<br><br>
<div style="border: 1px solid red;">
    Вывод файла, php код не выполняет:
    <div style="border: 20px green solid">
        <?php
        include_once ($_GET['filename']);?>
    </div>
</div>

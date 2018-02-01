<?php
$filename = 'image.png';

$string=base64_decode('R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==').
    "<?php echo 'THIS IS ACTUALLY PHP FILE';?>";

$handle=fopen($filename,'w+');
fwrite($handle,$string);
fclose($handle);

echo "Файл с именем ".$filename." имеет Mimetype:".mime_content_type($filename).PHP_EOL;





<?php
    $xml='<?xml version="1.0" encoding="UTF-8"?>';
    $xml.='<settings>';
    $xml.='<text_path>'.$_POST['text_path'].'</text_path>';
    $xml.='<theme_path>'.$_POST['theme_path'].'</theme_path>';
    $xml.='<theme_num>'.$_POST['theme_num'].'</theme_num>';
    $xml.='<period_min>'.$_POST['period_min'].'</period_min>';
    $xml.='<period_max>'.$_POST['period_max'].'</period_max>';
    $xml.='<post_time>0</post_time>';
    $xml.='<post_num>1</post_num>';
    $xml.='</settings>';
    $dom = new DOMDocument();
    $dom->loadXML($xml);
    $dom->save('autopost-settings.xml');
?>
<!DOCTYPE html>
<html>
<body>

<h1>Autopost Admin</h1>
<p>Разместите файлы скрипта в корень сайта</p>
<p>
   Каждый путь должен заканчиваться на /, если путь локальный начальный слеш не надо ставить и начинать из корня сайта.
</p>
<form method="post">
    Путь к текстовым файлам<br>
    <input type="text" id="text_path" name="text_path" <?php  ?>><br>
    Путь к файлам шаблонам<br>
    <input type="text" id="theme_path" name="theme_path"><br>
    Количество файлов шаблонов<br>
    <input type="text" id="theme_num" name="theme_num"><br>
    Минимальный период между постами в днях<br>
    <input type="text" id="period_min" name="period_min"><br>
    Максимальный период между постами в днях<br>
    <input type="text" id="period_max" name="period_max"><br>
    <input type="submit">
</form>

</body>
</html>

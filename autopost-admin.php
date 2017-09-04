<?php
function value_of($dom,$tag_name){
    return $dom->getElementsByTagName($tag_name)->item(0)->nodeValue;
}
$settings = new DOMDocument();
$text_path=''; $theme_path=''; $theme_num=''; $period_min=''; $period_max=''; $result_path=''; $post_time='0'; $post_num='1';
if(isset($_POST['text_path'],$_POST['theme_path'],$_POST['period_min'],$_POST['period_max'],$_POST['result_path'],$_POST['post_time'],$_POST['post_num'])){
    $xml='<?xml version="1.0" encoding="UTF-8"?>';
    $xml.='<settings>';
    $xml.='<text_path>'.$_POST['text_path'].'</text_path>';
    $xml.='<theme_path>'.$_POST['theme_path'].'</theme_path>';
    $xml.='<theme_num>'.$_POST['theme_num'].'</theme_num>';
    $xml.='<period_min>'.$_POST['period_min'].'</period_min>';
    $xml.='<period_max>'.$_POST['period_max'].'</period_max>';
    $xml.='<result_path>'.$_POST['result_path'].'</result_path>';
    $xml.='<post_time>'.$_POST['post_time'].'</post_time>';
    $xml.='<post_num>'.$_POST['post_num'].'</post_num>';
    $xml.='</settings>';
    $dom = new DOMDocument();
    $dom->loadXML($xml);
    $dom->save('autopost-settings.xml');
}
if($settings->load('autopost-settings.xml')){
    $text_path = value_of($settings,'text_path');
    $theme_path = value_of($settings,'theme_path');
    $theme_num = value_of($settings,'theme_num');
    $period_min = value_of($settings,'period_min');
    $period_max = value_of($settings,'period_max');
    $result_path = value_of($settings,'result_path');
    $post_time = value_of($settings,'post_time');
    $post_num = value_of($settings,'post_num');
}
?>
<!DOCTYPE html>
<html>
<body>
<div style="margin: 0 auto; width: 80%">
    <h1>Autopost Admin</h1>
    <p>Разместите файлы скрипта в корень сайта, заполните и отправьте форму настроек, затем приступайте к настройке cron на запуск autopost.php</p>
    <p>
        Пример локального пути: blog/beauty/ (для папки результата будут создаваться файлы по типу mysite.com/blog/beauty/first-title.html)<br>
        Пример удаленного пути http://somesite.com/some-folder/ (если так указать папку темы или текстов то будут браться файлы http://somesite.com/some-folder/1.txt)<br>
        Путь для результата обязательно должен быть локальным.
    </p>
    <form method="post">
        Путь к текстовым файлам<br>
        <input type="text" id="text_path" name="text_path" value="<?php echo $text_path ?>"><br>
        Путь к файлам шаблонам<br>
        <input type="text" id="theme_path" name="theme_path" value="<?php echo $theme_path ?>"><br>
        Количество файлов шаблонов<br>
        <input type="text" id="theme_num" name="theme_num" value="<?php echo $theme_num ?>"><br>
        Минимальный период между постами в днях<br>
        <input type="text" id="period_min" name="period_min" value="<?php echo $period_min ?>"><br>
        Максимальный период между постами в днях<br>
        <input type="text" id="period_max" name="period_max" value="<?php echo $period_max ?>"><br>
        Путь, куда сохранять результат<br>
        <input type="text" id="result_path" name="result_path" value="<?php echo $result_path ?>"><br>
        <strong>Следующие значения можно настраивать только при полной уверенности в своих действиях</strong><br>
        Время следующего поста в timestamp (0 - запостить при первом запуске):<?php echo date('M d, Y h:i:sa',$post_time) ?><br>
        <input type="text" id="post_time" name="post_time" value="<?php echo $post_time ?>"><br>
        Номер следующего текста для поста<br>
        <input type="text" id="post_num" name="post_num" value="<?php echo $post_num ?>"><br>
        <input type="submit">
    </form>
    <h2>Log</h2>
    <p><?php echo nl2br(file_get_contents('autopost-log.txt')); ?>
    </p>
</div>

</body>
</html>

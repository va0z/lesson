<?php
/**
 * Класс вспомогательных программ
 */
class tools{

    public $fc=null;        # poetp-count.inc aes-count.inc файл счетчика 
    public $file=null;      # ссылка на скачку файла
    public $e_name=null;    # имя отправителя
    public $e_address=null; # адрес почты отправителя
    public $e_text=null;    # текст письма
    public $cap_rez=null;    #

    /**
     * Запись счетчика скачанных программ
     */
    public function count($fc) {
        if(file_exists($fc)) {
            $link=fopen($fc,"r");
            $counter=fread($link,filesize($fc));
            fclose($link);
        }
        else{
            $counter="0";
        }
        $counter++;
        if($link=fopen($fc,"w")){
            fwrite($link,$counter);
            fclose($link);
        }

    }

    /**
     * Считывание счетчика скачанных программ
     */
    public function count_r($fc){
        if(file_exists($fc)) {
            $link=fopen($fc,"r");
            echo fread($link,filesize($fc));
            fclose($link);
        }
    }

    /**
     * Код скачки взят с Хабра
     */

    function file_force_download($file) {
        if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
            ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            // читаем файл и отправляем его пользователю
            if ($fd = fopen($file, 'rb')) {
            while (!feof($fd)) {
                print fread($fd, 1024);
            }
            fclose($fd);
            }
            exit;
        }
    }

    /**
     * Отправка почты $e_name,$e_address,$e_text
     */
    function email_send($e_name,$e_address,$e_text){
        $to  = "<va0z@ya.ru>" ; 
        $subject = "Запрос с сайта :lesson:"; 
        $message = ' <p>'.$e_text.'</p><p>'.$e_name.'</p>';
        $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
        $headers .= "From: От кого письмо ".$e_address."\r\n"; 
    //echo $e_address."<br>";
    //$str="-> ".$to." | ".$subject." | ".$message." | ".$headers; 
    //var_dump($str);
        mail($to, $subject, $message, $headers); 
    }

    /** Функция генерации капчи 
     * исходник:https://habr.com/ru/post/120615/ */ 
    public function generate_code() 
	{    
		  $chars = 'abdefhknrstyz23456789'; // Задаем символы, используемые в капче. Разделитель использовать не надо.
		  $length = rand(4, 7); // Задаем длину капчи, в нашем случае - от 4 до 7
		  $numChars = strlen($chars); // Узнаем, сколько у нас задано символов
		  $str = '';
		  for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, rand(1, $numChars) - 1, 1);
		  } // Генерируем код

		// Перемешиваем, на всякий случай
			$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
			shuffle ($array_mix);
		// Возвращаем полученный код
		return implode("", $array_mix);
    }

    /** Пишем функцию генерации изображения
     * исходник:https://habr.com/ru/post/120615/ */ 
     function imageTest()
     {
        header('Content-Type: image/png');
        // Создание изображения
        $im = imagecreatetruecolor(400, 30);
        // Создание цветов
        $white = imagecolorallocate($im, 255, 255, 255);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 399, 29, $white);
        // Текст надписи
        $text = 'Тест...';
        // Замена пути к шрифту на пользовательский
        $font = 'arial.ttf';
        // Тень
        imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
        // Текст
        imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
        imagepng($im);
        imagedestroy($im);
    }
     

}
?>
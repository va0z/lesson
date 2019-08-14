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
        $subject = "Запрос с сайта"; 
        $message = ' <p>'.$e_text.'</p>';
        $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
   //     $headers .= "From: От кого письмо ".$this->e_address."\r\n"; 
    //echo $e_address."<br>";
    //$str="-> ".$to." | ".$subject." | ".$message." | ".$headers; 
    //var_dump($str);
    
        mail($to, $subject, $message, $headers); 
    }
}


?>
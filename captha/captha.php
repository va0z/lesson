<?php
define("img_dir", __DIR__."/"); // папка с подложкой
// Количество линий. Обратите внимание, что они накладываться будут дважды (за текстом и на текст). Поставим рандомное значение, от 3 до 7.
$linenum = rand(3, 7); 
// Задаем фоны для капчи. Можете нарисовать свой и загрузить его в папку /img. Рекомендуемый размер - 150х70. Фонов может быть сколько угодно
$img_arr = array(
                "1.png"
);
// Шрифты для капчи. Задавать можно сколько угодно, они будут выбираться случайно
$font_arr = array();
$font_arr[0]["fname"] = "papyrus.ttf";	// Имя шрифта. Я выбрал Droid Sans, он тонкий, плохо выделяется среди линий.
$font_arr[0]["size"] = rand(20, 30);				// Размер в pt

$dir=opendir(img_dir);//directory with fonts
if($dir)
while($f=readdir($dir)){
    if(preg_match('/.ttf$/',$f)){
    $font=explode('.',$f);
    define($font[0],realpath('./font/'.$f));
    }
}
if($dir)
closedir($dir);

// Генерируем "подстилку" для капчи со случайным фоном
$n = rand(0,sizeof($font_arr)-1);
$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
$im = imagecreatefrompng (img_dir . $img_fn); 

// Рисуем линии на подстилке
for ($i=0; $i<$linenum; $i++)
{
    $color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
    imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
}
$color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200)); // Опять случайный цвет. Уже для текста.

// Накладываем текст капчи	
$code="ds34";			
$x = rand(0, 35);
for($i = 0; $i < strlen($code); $i++) {
    $x+=15;
    $letter=substr($code, $i, 1);
    //putenv( 'GDFONTPATH='.realpath('.') );
//            putenv('GDFONTPATH=D:\distr\OSPanel\domains\lesson\img');
           imagettftext ($im, $font_arr[$n]["size"], rand(2, 4), $x, rand(50, 55), $color, img_dir . $font_arr[$n]["fname"], $letter);
//            imagettftext ()
}

// Опять линии, уже сверху текста
for ($i=0; $i<$linenum; $i++)
{
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
    imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
}
// Возвращаем получившееся изображение
// Отправляем браузеру Header'ы
header("Content-Type:image/png");
ImagePNG ($im);
ImageDestroy ($im);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data['TitleName']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/soft.css">
    <link rel="stylesheet" type="text/css" href="css/faq.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <script type='text/javascript'>
        function click(link) {
//            document.querySelector(link).style.display = document.querySelector(link).style.display=='none'? 'block' : 'none';
            let perem = document.querySelector(link);
            if (perem.classList.contains('p-disp-on')){
                perem.classList.add('p-disp-off');
                perem.classList.remove('p-disp-on');               
            }
            else {
                perem.classList.add('p-disp-on');
                perem.classList.remove('p-disp-off');               
            }
        }   
    </script>
</head>
<body>

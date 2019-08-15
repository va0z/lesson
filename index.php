<?php
require ("req/prog.php");

$data = array();

$act=isset($_POST['act']) ? $_POST['act'] : "" ;

switch ($act) {
    case 'poetp':
        poetp();
        break;
    case 'poetp_free';
        poetp_free();
        break;
    case 'aes':
        aes();
        break;
    case 'faq':
        faq();
        break;
    case 'about':
        about();
        break;
    case 'email':
        email();
        break;
    case 'homepage':
        homepage();
        break;
    
    default:
        homepage();
        break;
}

function poetp() {
    $data['TitleName'] = "ПО ЭТП :: ПО ЕТП";
    $data['nav-poetp']="nav-menu-act";
    require ("inc/head.php");
    require ("inc/header.php");
    require ("inc/poetp.php");
    require ("inc/footer.php");
}
function poetp_free(){
    tools::count("poetp.inc");
    tools::file_force_download('arh/poetp.rar');
    poetp();
}
function aes() {
    $data['TitleName'] = "ПО ЭТП :: Auto ES";
    $data['nav-aes']="nav-menu-act";
    require ("inc/head.php");
    require ("inc/header.php");
    require ("inc/aes.php");
    require ("inc/footer.php");
}
function faq() {
    $data['TitleName'] = "ПО ЭТП :: Вопросы";
    $data['nav-faq']="nav-menu-act";
    require ("inc/head.php");
    require ("inc/header.php");
    require ("inc/faq.php");
    require ("inc/footer.php");
}
function about() {
    $data['TitleName'] = "ПО ЭТП :: О нас";
    $data['nav-about']="nav-menu-act";
    require ("inc/head.php");
    require ("inc/header.php");
    require ("inc/about.php");
    require ("inc/footer.php");
}
function email() {
//    $tools=new tools();
//    $tools->e_name=isset($_POST['e_name']) ? $_POST['e_name'] : "" ;
    $e_name=isset($_POST['e_name']) ? $_POST['e_name'] : "" ;
    $e_address=isset($_POST['e_address']) ? $_POST['e_address'] : "" ;
    $e_text=isset($_POST['e_text']) ? $_POST['e_text'] : "" ;

//    echo $e_address."<br>";
    tools::email_send($e_name,$e_address,$e_text);
    about();
}


function homepage() {
    $data['TitleName'] = "ПО ЭТП :: Главная страница";
    $data['nav-homepage']="nav-menu-act";
    require ("inc/head.php");
    require ("inc/header.php");
    require ("inc/main.php");
    require ("inc/footer.php");
}

?>
<div class="aticle-cont">
    <div class="aticle-wrp">
        <div class="col-head">О нас</div>
        <p>Мы создаем програмное обеспечение, которое помогает и автоматизирует рутинные процессы. Наша команда профессионалов имеет многолетний опыт работы.</p>
        <p>Наши программы используются во многих компаниях и домашних компьютерах во многих странах.</p>
        
        <div class="col-main">Для того чтобы связаться с нами, воспользуйтесь формой:</div>
        <hr>
        <form action="/" method="post">
            <input type="hidden" name="act" value="email">
            <input class="email e_input" name="e_name" placeholder="Введите ваше имя" type="text" value="">
            <input class="email e_input" name="e_address" type="email" placeholder="mail@example.com" value="">
            <input class="email e_text" name="e_text" type="textarea" placeholder="напишите тут чего-нибудь."></textarea>
            <?php 
            // session_start();
            // echo session_id();
            // echo session_name();
            $tool=new Tools;
            $_SESSION['code_cap']=$tool->generate_code();
            // echo $_SESSION['code_cap'];
            //            tools::img_code($code_cap);
            ?>

            <img class="email e_img" src="/captha/captha.php" alt="">
            <input class="email e_cap" name="e_cap" type="text" placeholder="введите код с картинки.">
            <input class="email e_sub" type="submit" value="Отправить">
        </form>

    </div>
</div>

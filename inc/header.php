<div class="top">
    <div class="logo-txt">Цените Ваше время, а автоматизицию доверьте нам!</div>
    <div class="logo"><img src="img/logo.png" alt=""></div>
        <div class="menu-gamb"></div>
    <div class="tel">8(962) 226-21-78</div>
</div>
<div class="header-wrp">
    <div class="header">
            
    </div>     
</div>
<div class="nav-wrp">
<!--
    <div class="nav">
        <a href="" class="nav-menu">Home</a>
        <a href="" class="nav-menu">ПО ЭТП</a>
        <a href="" class="nav-menu">Auto Email Sendler</a>
        <a href="" class="nav-menu-act">Вопросы</a>
        <a href="" class="nav-menu">О нас</a>
    </div>
-->
    <div class="nav">
        <form action="index.php" method="post">
            <input type="hidden" name="act" value="homepage">
            <input class="<?php echo $data['nav-homepage']; ?>" type="submit" name="button" value="Главная">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="act" value="poetp">
            <input class="<?php echo $data['nav-poetp']; ?>" type="submit" name="button" value="ПО ЕТП">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="act" value="aes">
            <input class="<?php echo $data['nav-aes']; ?>" type="submit" name="button" value="Auto ES">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="act" value="faq">
            <input class="<?php echo $data['nav-faq']; ?>" type="submit" name="button" value="Вопросы">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="act" value="about">
            <input class="<?php echo $data['nav-about']; ?>" type="submit" name="button" value="О нас">
        </form>

    </div>

</div>


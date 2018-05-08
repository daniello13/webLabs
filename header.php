<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="<?php echo $style; ?>">
    <link rel="stylesheet" href="css/animation-logo.css">
    
    <script type="text/javascript">var dom ="/lab7v2/";</script>
    <script src="https://js.cx/libs/animate.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
   

    <?php 
        if(isset($jq))
            echo $jq; 
        else {
            echo"<script src=\"js/modal.js\"></script>";
        }
    
    ?>
    
    <!--Link to fancy-box-->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/fency-show.js"></script>
    <!--Link to fancy-box-->
    <title>
        <?php echo $title; 
		date_default_timezone_set('Europe/Kiev');?>
    </title>
</head>
 <body>
     
   <div class="wrapper clearfix">
   <div id="head_wrap">
   <div class="reiteration-block1">
    <div class="header">
        <div class="logo" id="logo"><a href="#"><img src="img/logo.jpg" id="logo_img" alt="logo" style="position: absolute; box-shadow: 0 0 10px rgba(0,0,0,0.5);"></a></div>
        <!-- bottom: 100px; -->
    </div>
    <div class="pannel clearfix">
        <form action="#" class="form">
            <div class="input-wrap">
                <div class="login">
                    <span class="log">ЛОГИН</span>
                    <input type="text" name="login" class="log_in">
                </div>
                <div class="pass">
                    <span class="log">ПАРОЛЬ</span>
                    <input type="password" name="pass" class="log_in">
                </div>
            </div>
            <input type="submit" name="log_in" id="Log_in_btn" value="Войти">
        </form>
        <div class="links-analog clearfix">
            <a href="index3.php" class="link1"><span class="links">ГАЗЕТА ></span></a>
            <a href="#" class="link2"><span class="links">ТОВАРЫ ></span></a>
            <a href="#" class="link3"><span class="links">ПАРТНЕРЫ ></span></a>
            <a href="#" class="link4"><span class="links">ПОДПИСКА ></span></a>
            <a href="index2.php" class="link5"><span class="links">РЕГИСТРАЦИЯ ></span></a>
        </div>
    </div>
    <div class="menu">
        <ul class="menu-left">
            <li>
                <a href="#">
                        <img src="img/1.gif" alt="">
                        <span>подписка</span>
                    </a>
            </li>
            <li>
                <a href="#">
                        <img src="img/2.gif" alt="">
                        <span>прайс</span>
                    </a>
            </li>
            <li>
                <a href="#">
                        <img src="img/5.gif" alt="">
                        <span>заказы</span>
                    </a>
            </li>
            <li>
                <a href="#">
                        <img src="img/3.gif" alt="">
                        <span>интернет магазин</span>
                    </a>
            </li>
            <li>
                <a href="#">
                        <img src="img/4.gif" alt="">
                        <span>отчеты</span>
                    </a>
            </li>
        </ul>
    </div>
</div>
 <div class="news-head">
                <span class="title"><?php echo $news_title; ?></span>
            </div>
        </div>
        <div class="content-wrap clearfix">
        <?php
            require_once "menu-analog.php"
        ?>
  <div class="news">

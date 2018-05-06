<?php
    $title = "ShopSql.php";
    $style = "css/style.css";
    $news_title = "Магазин";
?>
<?php
    require_once "header.php";
    $link=mysqli_connect('localhost', 'root', '', 'shop') or die("Ошибка " . mysqli_error($link));
    $query ="SELECT * FROM tovar";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    echo $result;
?>
<?php
	require_once "header.php"
?>
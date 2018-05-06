<?php
    $title = "ShopSql.php";
    $style = "css/style.css";
    $news_title = "Магазин";
?>
<?php
    require_once "header.php";
    $link=mysqli_connect('localhost', 'root', '', 'shop') or die("Ошибка " . mysqli_error($link));
    $query ="SELECT types.names FROM types";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $types = array();
    if($result){
        $rows = mysqli_num_rows($result); // количество полученных строк
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            $types[$i]=$row[0];
            //echo "<tr>";
            
        }
        
        // очищаем результат
        mysqli_free_result($result);
    }
    //вывод формы на экран
    echo "<form action = 'ShopSql.php' method='POST'>";
    echo "<p><strong>Выберите тип лекарства</strong></p>";
    echo "<p><select name='select' size='1'>";
    for($i=0; $i<count($types);++$i){
        $name=$i.'s';
        echo "<option value='";
        echo $name;
        echo "'selected>";
        echo $types[$i];
        echo "</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Отправить'></p>";
    echo "</form>";
    //конец вывода формы

?>
<?php
	require_once "header.php"
?>
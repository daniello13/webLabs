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
    echo "<p><strong><br>Выберите тип лекарства</strong></p>";
    echo "<p><select name='selectq' size='1'>";
    for($i=0; $i<count($types);++$i){
        $name=$i.'s';
        echo "<option value='";
        echo $name;
        if (isset($_POST['selectq']) && $_POST['selectq']==$name){
            echo "'selected>";
        }
        else echo "'>";
        echo $types[$i];
        echo "</option>";
        
    }
    
    echo "</select>";
    echo "<input type='submit' value='Отправить'></p>";
    echo "</form>";
    //конец вывода формы

    //старт обработчика
    if (isset($_POST['selectq']))
    {
        $sq=$_POST['selectq'];
       switch($sq){
            case "0s":
                $query= "SELECT * FROM tovar WHERE type_id=1";
                break;
            case "1s":
                $query= "SELECT * FROM tovar WHERE type_id=2";
                break;
            case "2s":
                $query= "SELECT * FROM tovar WHERE type_id=3";
                break;
            default: 
                echo "Ты долбоеб";
                break;
        }
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result)
        {
            $rows = mysqli_num_rows($result); // количество полученных строк
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "<div class='boroda'>";
                //изображение
                echo "<img class='img-big' width= '200px' align= 'left' hspace='5' src="; 
                echo $row[1];
                echo ">";
                //текст
                echo "<div class='text-opis'>";
                echo "Название препарата: ";
                echo $row[2]; 
                echo "<br>Производитель: ";
                echo $row[3]; 
                echo "<br>Описание: ";
                echo $row[4]; 
                echo "<br>Цена: ";
                echo $row[6]; 
                echo "$";
                echo "</div>";
                echo "<br>Комментарии: ";
                
                $id_tovar=$row[0];
                $comments="SELECT * FROM comment WHERE id_tovar=".$id_tovar.";";
                $result_com = mysqli_query($link, $comments) or die("Ошибка " . mysqli_error($link));
                if($result_com){
                    $kolvo_comments = mysqli_num_rows($result_com);
                    echo "<table class='tbly' border='2' cellpadding='3'><tr><th class='tbly'>Name</th><th class='tbly'>Email</th><th class='tbly'>IP</th><th class='tbly'>Комментарий</th></tr>";
                    for ($k = 0 ; $k < $kolvo_comments ; ++$k)
                    {
                        $ans = mysqli_fetch_row($result_com);
                        echo "<tr class='tbly'>";
                            for ($c = 1 ; $c < 5 ; ++$c) echo "<td class='tbly'>$ans[$c]</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                echo "</div>";
                
            }
            // очищаем результат
            mysqli_free_result($result);
        }
    }
    

?>
<?php
	require_once "header.php"
?>
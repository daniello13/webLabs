<?php
    $title = "AdminPanel.php";
    $style = "css/style.css";
    $news_title = "Admin";
?>
<?php
    require_once "header.php";
    $link=mysqli_connect('localhost', 'root', '', 'shop') or die("Ошибка " . mysqli_error($link));
?>
<br>
<?php
    if(isset($_POST['val'])){
        $sq=$_POST['val'];
        $query= "UPDATE `comment` SET `enabled`=!`enabled` WHERE id='".$sq."'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    }
?>
<?php
    $comments="SELECT * FROM comment".";";
    $result_com = mysqli_query($link, $comments) or die("Ошибка " . mysqli_error($link));
    $kolvo_comments = mysqli_num_rows($result_com);
     echo "<table class='tbly' border='2' cellpadding='3'><tr><th class='tbly'>id</th><th class='tbly'>Name</th><th class='tbly'>Email</th><th class='tbly'>IP</th><th class='tbly'>Комментарий</th><th class='tbly'>enabled</th></tr>";
     for ($k = 0 ; $k < $kolvo_comments ; ++$k)
     {
         $ans = mysqli_fetch_row($result_com);
         echo "<tr class='tbly'>";
             for ($c = 0 ; $c < 5 ; ++$c) echo "<td class='tbly'>$ans[$c]</td>";
             if($ans[6]!=0) 
                echo "<td class='tbly'>true</td>";
             else 
                echo "<td class='tbly'>false</td>";
         echo "</tr>";
     }
     echo "</table>";
?>
<form action = 'AdminPanel.php' method='POST'>
    <p><strong><br>Введите id инверсии enabled</strong></p>
    <input type="text" name ="val">
    <input type="submit" value ="Изменить">
</form>
<?php
    require_once "footer.php";
?>